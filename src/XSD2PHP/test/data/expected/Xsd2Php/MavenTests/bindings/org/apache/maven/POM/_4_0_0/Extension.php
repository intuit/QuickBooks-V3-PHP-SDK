<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Extension
 * @var org\apache\maven\POM\_4_0_0\Extension
 * @xmlDefinition Describes a build extension to
                utilise.
 */
class Extension
{

    
    /**
     * @Definition The group ID of the
                        extension's artifact.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
    /**
     * @Definition The artifact ID of the extension.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition The version of the extension.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
} // end class Extension
