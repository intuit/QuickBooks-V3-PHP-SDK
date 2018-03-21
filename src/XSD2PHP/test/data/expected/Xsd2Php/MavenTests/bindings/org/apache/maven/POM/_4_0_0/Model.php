<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Model
 * @var org\apache\maven\POM\_4_0_0\Model
 * @xmlDefinition
                The <code>&lt;project&gt;</code> element is the root of the
                descriptor.
                The following table lists all of the possible child elements.

 */
class Model
{

    
    /**
     * @Definition
                        The location of the parent project, if one exists. Values from the
                        parent project will be the default for this project if they are
                        left unspecified. The location is given as a group ID, artifact ID and
                        version.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName parent
     * @var org\apache\maven\POM\_4_0_0\Parent
     */
    public $parent;
    /**
     * @Definition Declares to which version of
                        project descriptor this POM conforms.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName modelVersion
     * @var string
     */
    public $modelVersion;
    /**
     * @Definition
                        A universally unique identifier for a project. It is normal to
                        use a fully-qualified package name to distinguish it from other projects with
                        a similar name
                        (eg. <code>org.apache.maven</code>).

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
    /**
     * @Definition
                        The identifier for this artifact that is unique within the group given by the
                        group ID.
                        An artifact is something that is either produced or used by a project.
                        Examples of artifacts produced by
                        Maven for a project include: JARs, source and binary distributions, and WARs.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition
                        The type of artifact this project produces, for example
                        <code>jar</code>
                        <code>war</code>
                        <code>ear</code>
                        <code>pom</code>.
                        Plugins can create their own packaging, and
                        therefore their own packaging types,
                        so this list does not contain all possible types.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName packaging
     * @var string
     */
    public $packaging;
    /**
     * @Definition
                        The full name of the project.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition
                        The current version of the artifact produced by this project.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
    /**
     * @Definition
                        A detailed description of the project, used by Maven whenever it needs to
                        describe the project,
                        such as on the web site. While this element can be specified as CDATA to
                        enable
                        the use of HTML tags within the description, it is discouraged to allow plain
                        text representation.
                        If you need to modify the index page of the generated web site, you are able
                        to specify your own instead
                        of adjusting this text.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName description
     * @var string
     */
    public $description;
    /**
     * @Definition
                        The URL to the project's homepage.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
    /**
     * @Definition
                        Describes the prerequisites in the build environment for this project.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName prerequisites
     * @var org\apache\maven\POM\_4_0_0\Prerequisites
     */
    public $prerequisites;
    /**
     * @Definition The project's issue
                        management system information.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName issueManagement
     * @var org\apache\maven\POM\_4_0_0\IssueManagement
     */
    public $issueManagement;
    /**
     * @Definition The project's continuous
                        integration information.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName ciManagement
     * @var org\apache\maven\POM\_4_0_0\CiManagement
     */
    public $ciManagement;
    /**
     * @Definition
                        The year of the project's inception, specified with 4 digits.
                        This value is used when generating copyright notices as well as being
                        informational.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName inceptionYear
     * @var string
     */
    public $inceptionYear;
    /**
     * @Definition
                        Contains information about a project's mailing lists.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName mailingLists
     */
    public $mailingLists;
    /**
     * @Definition
                        Describes the committers of a project.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName developers
     */
    public $developers;
    /**
     * @Definition
                        Describes the contributors to a project that are not yet committers.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName contributors
     */
    public $contributors;
    /**
     * @Definition
                        This element describes all of the licenses for this project.
                        Each license is described by a <code>license</code> element, which
                        is then described by additional elements.
                        Projects should only list the license(s) that applies to the project
                        and not the licenses that apply to dependencies.
                        If multiple licenses are listed, it is assumed that the user can select any
                        of them, not that they
                        must accept all.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName licenses
     */
    public $licenses;
    /**
     * @Definition
                        Specification for the SCM used by the project, such as CVS, Subversion, etc.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName scm
     * @var org\apache\maven\POM\_4_0_0\Scm
     */
    public $scm;
    /**
     * @Definition
                        This element describes various attributes of the organization to
                        which the project belongs. These attributes are utilized when
                        documentation is created (for copyright notices and links).

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName organization
     * @var org\apache\maven\POM\_4_0_0\Organization
     */
    public $organization;
    /**
     * @Definition Information required to build the
                        project.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName build
     * @var org\apache\maven\POM\_4_0_0\Build
     */
    public $build;
    /**
     * @Definition
                        A listing of project-local build profiles which will modify the build
                        process when activated.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName profiles
     */
    public $profiles;
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
} // end class Model
