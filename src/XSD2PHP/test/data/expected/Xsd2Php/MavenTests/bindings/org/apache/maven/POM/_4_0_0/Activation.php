<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Activation
 * @var org\apache\maven\POM\_4_0_0\Activation
 * @xmlDefinition
                The conditions within the build runtime environment which will trigger
                the automatic inclusion of the build profile.

 */
class Activation
{

    
    /**
     * @Definition Flag specifying whether this
                        profile is active by default.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName activeByDefault
     * @var boolean
     */
    public $activeByDefault;
    /**
     * @Definition
                        Specifies that this profile will be activated when a matching JDK is detected. For
                        example, <code>1.4</code>
                        only activates on JDKs versioned 1.4, while <code>!1.4</code>
                        matches any JDK that is not version 1.4.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName jdk
     * @var string
     */
    public $jdk;
    /**
     * @Definition
                        Specifies that this profile will be activated when matching operating system
                        attributes are detected.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName os
     * @var org\apache\maven\POM\_4_0_0\ActivationOS
     */
    public $os;
    /**
     * @Definition
                        Specifies that this profile will be activated when this system property is
                        specified.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName property
     * @var org\apache\maven\POM\_4_0_0\ActivationProperty
     */
    public $property;
    /**
     * @Definition
                        Specifies that this profile will be activated based on existence of a file.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName file
     * @var org\apache\maven\POM\_4_0_0\ActivationFile
     */
    public $file;
} // end class Activation
