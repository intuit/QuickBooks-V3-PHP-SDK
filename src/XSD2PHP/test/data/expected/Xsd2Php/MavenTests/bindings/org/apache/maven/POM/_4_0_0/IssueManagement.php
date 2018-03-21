<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName IssueManagement
 * @var org\apache\maven\POM\_4_0_0\IssueManagement
 * @xmlDefinition
                Information about the issue tracking (or bug tracking) system used to manage this
                project.

 */
class IssueManagement
{

    
    /**
     * @Definition The name of the issue management
                        system, e.g. Bugzilla
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName system
     * @var string
     */
    public $system;
    /**
     * @Definition URL for the issue management
                        system used by the project.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
} // end class IssueManagement
