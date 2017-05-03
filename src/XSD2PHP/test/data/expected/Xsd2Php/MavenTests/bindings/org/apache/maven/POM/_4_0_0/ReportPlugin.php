<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName ReportPlugin
 * @var org\apache\maven\POM\_4_0_0\ReportPlugin
 * @xmlDefinition 4.0.0
 */
class ReportPlugin
{

    
    /**
     * @Definition The group ID of the reporting
                        plugin in the repository.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
    /**
     * @Definition The artifact ID of the reporting
                        plugin in the repository.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition The version of the reporting
                        plugin to be used.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
    /**
     * @Definition Whether the configuration in this
                        plugin should be made available to projects that
                        inherit from this one.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName inherited
     * @var string
     */
    public $inherited;
    /**
     * @Definition The configuration of the
                        reporting plugin.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName configuration
     */
    public $configuration;
    /**
     * @Definition Multiple specifications of a set
                        of reports, each having (possibly) different
                        configuration. This is the reporting parallel to an <code>execution</code>
                        in the build.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName reportSets
     */
    public $reportSets;
} // end class ReportPlugin
