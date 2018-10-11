<?php
namespace QuickBooksOnline\API\Retry;
/**
 * Provides the retry mechanism for unreliable actions and transient conditions.
 */
class IntuitRetryPolicy
{
    /**
     * PHP support for threading is non-existing, and support for passing around
     * closures is limited; therefore, the concept of IntuitRetryPolicy doesn't
     * have a straightforward PHP equivalent.
     */
    public function __construct() {
        
    }
}
