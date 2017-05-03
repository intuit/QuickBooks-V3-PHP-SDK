<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName ActivationProperty
 * @var org\apache\maven\POM\_4_0_0\ActivationProperty
 * @xmlDefinition
                This is the property specification used to activate a profile. If the value
                field is empty,
                then the existence of the named property will activate the profile, otherwise it
                does a case-sensitive
                match against the property value as well.

 */
class ActivationProperty
{

    
    /**
     * @Definition The name of the property to be
                        used to activate a profile.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition The value of the property
                        required to activate a profile.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName value
     * @var string
     */
    public $value;
} // end class ActivationProperty
