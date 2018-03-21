<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName CiManagement
 * @var org\apache\maven\POM\_4_0_0\CiManagement
 * @xmlDefinition 4.0.0
 */
class CiManagement
{

    
    /**
     * @Definition
                        The name of the continuous integration system, e.g.
                        <code>continuum</code>.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName system
     * @var string
     */
    public $system;
    /**
     * @Definition
                        URL for the continuous integration system used by the project if it has a web
                        interface.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
    /**
     * @Definition
                        Configuration for notifying developers/users when a build is
                        unsuccessful, including user information and notification mode.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName notifiers
     */
    public $notifiers;
} // end class CiManagement
