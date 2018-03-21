<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Relocation
 * @var org\apache\maven\POM\_4_0_0\Relocation
 * @xmlDefinition Describes where an artifact has
                moved to. If any of the values are omitted, it is assumed to be the
                same as it was before.
 */
class Relocation
{

    
    /**
     * @Definition The group ID the artifact has
                        moved to.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
    /**
     * @Definition The new artifact ID of the
                        artifact.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition The new version of the artifact.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
    /**
     * @Definition An additional message to show the
                        user about the move, such as the reason.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName message
     * @var string
     */
    public $message;
} // end class Relocation
