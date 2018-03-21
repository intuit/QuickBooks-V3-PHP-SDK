<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName PluginManagement
 * @var org\apache\maven\POM\_4_0_0\PluginManagement
 * @xmlDefinition
                Section for management of default plugin information for use in a group of POMs.

 */
class PluginManagement
{

    
    /**
     * @Definition
                        The list of plugins to use.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName plugins
     */
    public $plugins;
} // end class PluginManagement
