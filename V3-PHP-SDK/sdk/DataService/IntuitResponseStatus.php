<?php
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
    const Voided = 1;

	/**
	 * Entity has been deleted.
	 */
    const Deleted = 2;
} 
 

 
/**
 * type of batch response
 */
class ResponseType
{
	/**
	 * batch response has single entity 
	 */
    const Entity = 1;

	/**
	 * batch response has more than one enitity. 
	 */
    const Query = 2;

	/**
	 * batch response has exception.
	 */
    const Exception = 3;
} 
 