<?php

namespace QuickBooksOnline\API\Exception;

/**
 * Manages all the exceptions thrown to the user.
 */
class IdsExceptionManager
{
    /**
     * Handles exception thrown to the user.
     * @param string errorMessage Error Message
     */
    public static function HandleExceptionMessage($errorMessage)
    {
        throw new IdsException($errorMessage);
    }

    /**
     * Handles Exception thrown to the user.
     * @param IdsException idsException Ids Exception
     */
    public static function HandleExceptionObject($idsException)
    {
        throw $idsException;
    }

    /**
     * Handles Exception thrown to the user.
     * @param string errorMessage Error Message
     * @param string errorCode Error Code.
     * @param string source Source of the exception.
     * @param IdsException innerException Ids Exception
     */
    public static function HandleException($errorMessage=null, $errorCode=null, $source=null, $innerException=null)
    {
        $message = implode(", ", array($errorMessage, $errorCode, $source));
        throw new IdsException($message);
    }
}
