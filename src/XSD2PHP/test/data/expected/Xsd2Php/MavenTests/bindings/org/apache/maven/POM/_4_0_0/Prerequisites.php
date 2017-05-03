<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Prerequisites
 * @var org\apache\maven\POM\_4_0_0\Prerequisites
 * @xmlDefinition Describes the prerequisites a
                project can have.
 */
class Prerequisites
{

    
    /**
     * @Definition The minimum version of Maven
                        required to build the project, or to use this plugin.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName maven
     * @var string
     */
    public $maven;
} // end class Prerequisites
