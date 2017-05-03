<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName ActivationFile
 * @var org\apache\maven\POM\_4_0_0\ActivationFile
 * @xmlDefinition
                This is the file specification used to activate the profile. The missing value
                will be the location
                of a file that needs to exist, and if it doesn't the profile will be
                activated. On the other hand exists will test
                for the existence of the file and if it is there the profile will be activated.

 */
class ActivationFile
{

    
    /**
     * @Definition The name of the file that must be
                        missing to activate the profile.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName missing
     * @var string
     */
    public $missing;
    /**
     * @Definition The name of the file that must
                        exist to activate the profile.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName exists
     * @var string
     */
    public $exists;
} // end class ActivationFile
