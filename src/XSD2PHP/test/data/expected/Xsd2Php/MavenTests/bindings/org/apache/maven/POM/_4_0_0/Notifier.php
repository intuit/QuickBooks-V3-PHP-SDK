<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Notifier
 * @var org\apache\maven\POM\_4_0_0\Notifier
 * @xmlDefinition
                Configures one method for notifying users/developers when a build breaks.

 */
class Notifier
{

    
    /**
     * @Definition The mechanism used to deliver
                        notifications.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName type
     * @var string
     */
    public $type;
    /**
     * @Definition Whether to send notifications on
                        error.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName sendOnError
     * @var boolean
     */
    public $sendOnError;
    /**
     * @Definition Whether to send notifications on
                        failure.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName sendOnFailure
     * @var boolean
     */
    public $sendOnFailure;
    /**
     * @Definition Whether to send notifications on
                        success.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName sendOnSuccess
     * @var boolean
     */
    public $sendOnSuccess;
    /**
     * @Definition Whether to send notifications on
                        warning.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName sendOnWarning
     * @var boolean
     */
    public $sendOnWarning;
    /**
     * @Definition
                        <b>Deprecated</b>. Where to send the notification to - eg email address.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName address
     * @var string
     */
    public $address;
    /**
     * @Definition Extended configuration specific
                        to this notifier goes here.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName configuration
     */
    public $configuration;
} // end class Notifier
