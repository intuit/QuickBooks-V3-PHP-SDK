<?php
namespace QuickBooksOnline\API\DataService;

/**
 * This file contains enumerations related to CRUD Operations and batch processing.
 */

/**
 * status of response for delete and void operation
 */
class IntuitResponseStatus
{
    /**
     * Entity has been made void.
     */
    const VOIDED = 1;

    /**
     * Entity has been deleted.
     */
    const DELETED = 2;
}
