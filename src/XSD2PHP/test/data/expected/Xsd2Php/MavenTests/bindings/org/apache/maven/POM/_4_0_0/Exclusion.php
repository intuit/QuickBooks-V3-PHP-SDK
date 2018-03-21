<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Exclusion
 * @var org\apache\maven\POM\_4_0_0\Exclusion
 * @xmlDefinition 4.0.0
 */
class Exclusion
{

    
    /**
     * @Definition The artifact ID of the project to
                        exclude.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition The group ID of the project to
                        exclude.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
} // end class Exclusion
