<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Reporting
 * @var org\apache\maven\POM\_4_0_0\Reporting
 * @xmlDefinition Section for management of reports
                and their configuration.
 */
class Reporting
{

    
    /**
     * @Definition If true, then the default reports
                        are not included in the site generation. This includes the
                        reports in the "Project Info" menu.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName excludeDefaults
     * @var boolean
     */
    public $excludeDefaults;
    /**
     * @Definition
                        Where to store all of the generated reports. The default is
                        <code>${project.build.directory}/site</code>
                        .

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName outputDirectory
     * @var string
     */
    public $outputDirectory;
    /**
     * @Definition The reporting plugins to use and
                        their configuration.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName plugins
     */
    public $plugins;
} // end class Reporting
