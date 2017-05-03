<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Plugin
 * @var org\apache\maven\POM\_4_0_0\Plugin
 * @xmlDefinition 4.0.0
 */
class Plugin
{

    
    /**
     * @Definition The group ID of the plugin in the
                        repository.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
    /**
     * @Definition The artifact ID of the plugin in
                        the repository.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition The version (or valid range of
                        verisons) of the plugin to be used.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
    /**
     * @Definition Whether to load Maven extensions
                        (such as packaging and type handlers) from this
                        plugin. For performance reasons, this should only be enabled when necessary.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName extensions
     * @var boolean
     */
    public $extensions;
    /**
     * @Definition Multiple specifications of a set
                        of goals to execute during the build lifecycle, each having
                        (possibly) different
                        configuration.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName executions
     */
    public $executions;
    /**
     * @Definition Additional dependencies that this
                        project needs to introduce to the plugin's
                        classloader.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName dependencies
     */
    public $dependencies;
    /**
     * @Definition
                        <b>Deprecated</b>. Unused by Maven.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName goals
     */
    public $goals;
    /**
     * @Definition
                        Whether any configuration should be propagated to child POMs.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName inherited
     * @var string
     */
    public $inherited;
    /**
     * @Definition 0.0.0+
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName configuration
     */
    public $configuration;
} // end class Plugin
