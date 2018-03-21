<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Profile
 * @var org\apache\maven\POM\_4_0_0\Profile
 * @xmlDefinition
                Modifications to the build process which is activated based on environmental parameters
                or command line arguments.

 */
class Profile
{

    
    /**
     * @Definition The identifier of this build
                        profile. This used both for command line activation, and identifies
                        identical profiles to merge with during inheritance.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName id
     * @var string
     */
    public $id;
    /**
     * @Definition The conditional logic which will
                        automatically
                        trigger the inclusion of this profile.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName activation
     * @var org\apache\maven\POM\_4_0_0\Activation
     */
    public $activation;
    /**
     * @Definition Information required to build the
                        project.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName build
     * @var org\apache\maven\POM\_4_0_0\BuildBase
     */
    public $build;
    /**
     * @Definition
                        The modules (sometimes called subprojects) to build as a part of this
                        project.
                        Each module listed is a relative path to the directory containing the module.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName modules
     */
    public $modules;
    /**
     * @Definition The lists of the remote
                        repositories for discovering dependencies and
                        extensions.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName repositories
     */
    public $repositories;
    /**
     * @Definition
                        The lists of the remote repositories for discovering plugins for builds and
                        reports.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName pluginRepositories
     */
    public $pluginRepositories;
    /**
     * @Definition
                        This element describes all of the dependencies associated with a
                        project.
                        These dependencies are used to construct a classpath for your
                        project during the build process. They are automatically downloaded from the
                        repositories defined in this project.
                        See <a
                        href="http://maven.apache.org/guides/introduction/introduction-to-dependency-mechanism.html">the
                        dependency mechanism</a> for more information.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName dependencies
     */
    public $dependencies;
    /**
     * @Definition
                        <b>Deprecated</b>. Now ignored by Maven.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName reports
     */
    public $reports;
    /**
     * @Definition
                        This element includes the specification of report plugins to use to generate
                        the reports on the
                        Maven-generated site. These reports will be run when a user executes <code>mvn
                        site</code>. All of the
                        reports will be included in the navigation bar for browsing.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName reporting
     * @var org\apache\maven\POM\_4_0_0\Reporting
     */
    public $reporting;
    /**
     * @Definition
                        Default dependency information for projects that inherit from
                        this one. The dependencies in this section are not immediately resolved.
                        Instead, when a POM derived from this one declares a dependency
                        described by a matching groupId and artifactId, the version and other values from
                        this
                        section are used for that dependency if they were not already specified.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName dependencyManagement
     * @var org\apache\maven\POM\_4_0_0\DependencyManagement
     */
    public $dependencyManagement;
    /**
     * @Definition Distribution information for a
                        project that enables deployment of the site
                        and artifacts to remote web servers and repositories respectively.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName distributionManagement
     * @var org\apache\maven\POM\_4_0_0\DistributionManagement
     */
    public $distributionManagement;
    /**
     * @Definition
                        Properties that can be used throughout the POM as a substitution, and are used as
                        filters in resources
                        if enabled. The format is
                        <code>&lt;name&gt;value&lt;/name&gt;</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName properties
     */
    public $properties;
} // end class Profile
