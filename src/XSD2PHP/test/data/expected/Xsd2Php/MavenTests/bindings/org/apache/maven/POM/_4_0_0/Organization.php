<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Organization
 * @var org\apache\maven\POM\_4_0_0\Organization
 * @xmlDefinition Specifies the organization that
                produces this project.
 */
class Organization
{

    
    /**
     * @Definition The full name of the
                        organization.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition The URL to the
                        organization's home page.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
} // end class Organization
