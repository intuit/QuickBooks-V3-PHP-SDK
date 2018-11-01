<?php

namespace QuickBooksOnline\API\Diagnostics;

use QuickBooksOnline\API\Exception\SdkException;

/**
 * Writes temporary file
 *
 * @author amatiushkin
 */
class ContentWriter
{

    /**
     * Contains content to write
     * @var mixed (string or binary)
     */
    private $content = null;

    /**
     * Prefix which will be added at the beginning of a filename.
     * @see setPrefix() for details
     * @var string
     */
    private $prefix = null;

    /**
     * Number of bytes in content
     * @var type
     */
    private $bytes = null;

    /**
     * Full path including filename for created temporary file
     * @var string
     */
    private $tempPath = null;

    /**
     * Contains reference to resource (if applicable)
     * @var type
     */
    private $handler = null;

    public function __construct($content = null)
    {
        $this->content = $content;
    }

    /**
     * Set prefix for a temporary filename.
     * It is used only by saveTemp()
     * @param string $prefix
     *
     * @return $this
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * Returns prefix
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Returns content
     * @return mixed (string or binary)
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Deletes content, however everything else remains available
     * This method is intented to use for better memory management
     */
    public function resetContent()
    {
        $this->content = null;
    }

    /**
     * Returns unique filename with prefix (if applicable)
     * note: This method is not intented to generate unpredictable strings,
     * even with very low likelihood it may happen with garbaged tmp folder.
     * Suggestion is to clean up php temp folder (which is usually sys temp folder).
     * @return string
     */
    protected function getUniqId()
    {
        return uniqid($this->getPrefix(), true);
    }

    /**
     * Creates temporary file in system temporary folder.
     * It returns path to the file
     * @return string path
     */
    private function createTempFile()
    {
        return tempnam(sys_get_temp_dir(), $this->getUniqId());
    }

    /**
     * Returns path to temporary file
     * @return string
     */
    public function getTempPath()
    {
        return $this->tempPath;
    }

    /**
     * Returns number of bytes, which were written
     * @return type
     */
    public function getBytes()
    {
        return $this->bytes;
    }

    /**
     * Returns true if this writer instance refers to file by stream reference
     * @return bool
     */
    public function isHandler()
    {
        return !is_null($this->getHandler())
               && is_resource($this->getHandler());
    }

    /**
     * Returns file handler to temporary file
     * It is the same kind as ones, which are returned by @see fopen()
     * @return resource
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Writes content into temporary file. It always creates new temp file.
     * Use getTempPath() to retrieve actual path.
     * This method doesn't delete the file after script termination.
     * @return boolean
     * @throws SdkException
     */
    public function saveTemp()
    {
        $this->tempPath = $this->createTempFile();
        if (is_writable($this->getTempPath())) {
            $result = file_put_contents($this->getTempPath(), $this->getContent());
            if (false === $result) {
                throw new SdkException('Unable to put content into temp file: ' . $this->getTempPath());
            }
            if (empty($result)) {
                throw new SdkException('Empty or zero file was received: ' . $this->getTempPath());
            }
            $this->bytes = $result;
            return true;
        }

        throw new SdkException('Unable to write temp file: ' . $path);
    }

    /**
     * Writes content into temporary file and returns open handler to it.
     * The temporary file is removed when closed (e.g. by calling fclose()) or
     * there are no more references (e.g. variables) or with script termination.
     * @throws SdkException
     */
    public function saveAsHandler()
    {
        $this->handler = tmpfile();
        if (false === $this->handler) {
            throw new SdkException('Unable to create a handler for tempfile in ' . sys_get_temp_dir());
        }
        if (empty($this->handler)) {
            throw new SdkException('Handler has an invalid state. It is empty.');
        }
        $this->tempPath = $this->getPathFromHandler();
        if (empty($this->tempPath)) {
            throw new SdkException('Unable to locate path from stream source');
        }
        $result = fwrite($this->handler, $this->getContent());
        if (false === $result) {
            throw new SdkException('Unable to write content into temp file: ' . $this->getTempPath());
        }
        if (empty($result)) {
            throw new SdkException('Empty or zero file was received: ' . $this->getTempPath());
        }
        if (-1 === fseek($this->handler, 0)) {
            throw new SdkException('Unable to reset file pointer in the file ' . $this->getTempPath());
        }
        $this->bytes = $result;
    }

    /**
     * Moves file from temp location to specified folder and name
     * @param type $dir
     * @param type $name (option) if not speicifed it will be moved with temp name
     * @throws SdkException
     */
    public function saveFile($dir, $name=null)
    {
        if (empty($dir)) {
            throw new SdkException("Directory is empty.");
        }

        if (!file_exists($dir)) {
            throw new SdkException("Directory ($dir) doesn't exist.");
        }

        if (!is_writable($dir)) {
            throw new SdkException("Directory ($dir) is not writable");
        }
        $this->tempPath = $dir . DIRECTORY_SEPARATOR . $this->generateFileName($name);
        if (file_exists($this->tempPath)) {
            throw new SdkException("File ($this->tempPath) already exists");
        }
        try {
            $result = file_put_contents($this->tempPath, $this->getContent());
        } catch (Exception $e) {
            if (!is_writable($this->tempPath)) {
                throw new SdkException("File ({$this->tempPath}) is not writable");
            }
            throw new SdkException("Error was thrown: " . $e->getMessage() . "\File: " .$e->getFile() ." on line " . $e->getLine());
        }
        if (false === $result) {
            throw new SdkException('Unable to write content into temp file: ' . $this->tempPath);
        }
        $this->bytes = $result;
    }

    /**
     * Creates filename based on name and prefix.
     * It generates uniqid-like string if name is ommited
     * @param type $name
     * @return type
     */
    private function generateFileName($name)
    {
        $filename = is_null($name) ? $this->getUniqId() : $name;
        return is_null($this->getPrefix()) ? $filename : $this->getPrefix() . $filename;
    }


    /**
     * Returns actual path from actual file handler
     * @return type
     */
    private function getPathFromHandler()
    {
        $metaDatas = stream_get_meta_data($this->handler);
        if (array_key_exists('uri', $metaDatas)) {
            return $metaDatas['uri'];
        }
        return null;
    }
}
