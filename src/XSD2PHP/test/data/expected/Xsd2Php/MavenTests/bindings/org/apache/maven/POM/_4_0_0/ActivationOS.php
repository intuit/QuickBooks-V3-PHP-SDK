<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName ActivationOS
 * @var org\apache\maven\POM\_4_0_0\ActivationOS
 * @xmlDefinition
                This is an activator which will detect an operating system's attributes in
                order to activate
                its profile.

 */
class ActivationOS
{

    
    /**
     * @Definition The name of the operating system
                        to be used to activate the profile. This must be an exact match
                        of the <code>${os.name}</code> Java property, such as
                        <code>Windows XP</code>.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition
                        The general family of the OS to be used to activate the profile, such as
                        <code>windows</code> or <code>unix</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName family
     * @var string
     */
    public $family;
    /**
     * @Definition The architecture of the operating
                        system to be used to activate the profile.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName arch
     * @var string
     */
    public $arch;
    /**
     * @Definition The version of the operating
                        system to be used to activate the profile.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
} // end class ActivationOS
