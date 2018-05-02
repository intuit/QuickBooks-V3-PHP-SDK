<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPAttachable
 * @var IPPAttachable
 * @xmlDefinition
                Product: ALL
                Description: Describes the details of
                the attachment.

 */
class IPPAttachable extends IPPIntuitEntity
{

        /**
        * Initializes this object, optionally with pre-defined property values
        *
        * Initializes this object and it's property members, using the dictionary
        * of key/value pairs passed as an optional argument.
        *
        * @param dictionary $keyValInitializers key/value pairs to be populated into object's properties
        * @param boolean $verbose specifies whether object should echo warnings
        */
    public function __construct($keyValInitializers = array(), $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPAttachable', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPAttachable', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition FileName of the attachment
                                Max Length: 1000

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FileName
     * @var string
     */
    public $FileName;
    /**
     * @Definition FullPath FileAccess URI of the attachment,
                                output only

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FileAccessUri
     * @var string
     */
    public $FileAccessUri;
    /**
     * @Definition Output only. TempDownload URI which can be
                                directly downloaded by clients

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TempDownloadUri
     * @var string
     */
    public $TempDownloadUri;
    /**
     * @Definition  Size of the attachment

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Size
     * @var integer
     */
    public $Size;
    /**
     * @Definition  ContentType of the attachment

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ContentType
     * @var string
     */
    public $ContentType;
    /**
     * @Definition  Category of the attachment

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Category
     * @var string
     */
    public $Category;
    /**
     * @Definition  Latitude from where the attachment was
                                requested

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Lat
     * @var string
     */
    public $Lat;
    /**
     * @Definition  Longitude from where the attachment was
                                requested

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Long
     * @var string
     */
    public $Long;
    /**
     * @Definition  PlaceName from where the attachment was
                                requested

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PlaceName
     * @var string
     */
    public $PlaceName;
    /**
     * @Definition  Note for the attachment or standalone note

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Note
     * @var string
     */
    public $Note;
    /**
     * @Definition  Tag name for the requested attachment

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Tag
     * @var string
     */
    public $Tag;
    /**
     * @Definition FullPath FileAccess URI of the attachment
                                thumbnail if the attachment file is of a content type with
                                thumbnail support, output only

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ThumbnailFileAccessUri
     * @var string
     */
    public $ThumbnailFileAccessUri;
    /**
     * @Definition Output only. Thumbnail TempDownload URI which
                                can be directly downloaded by clients. This is only available if
                                the attachment file is of a content type with thumbnail support

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ThumbnailTempDownloadUri
     * @var string
     */
    public $ThumbnailTempDownloadUri;
    /**
     * @Definition  Specifies extension entity to allow extension

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AttachableEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $AttachableEx;
} // end class IPPAttachable
