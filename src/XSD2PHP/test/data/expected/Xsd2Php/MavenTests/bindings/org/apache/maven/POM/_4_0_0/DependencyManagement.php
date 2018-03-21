<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName DependencyManagement
 * @var org\apache\maven\POM\_4_0_0\DependencyManagement
 * @xmlDefinition
                Section for management of default dependency information for use in a group of
                POMs.

 */
class DependencyManagement
{

    
    /**
     * @Definition
                        The dependencies specified here are not used until they
                        are referenced in a POM within the group. This allows the
                        specification of a "standard" version for a particular
                        dependency.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName dependencies
     */
    public $dependencies;
} // end class DependencyManagement
