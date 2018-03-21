<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Dependency
 * @var org\apache\maven\POM\_4_0_0\Dependency
 * @xmlDefinition 3.0.0+
 */
class Dependency
{

    
    /**
     * @Definition
                        The project group that produced the dependency, e.g.
                        <code>org.apache.maven</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
    /**
     * @Definition
                        The unique id for an artifact produced by the project group, e.g.
                        <code>maven-artifact</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition
                        The version of the dependency, e.g. <code>3.2.1</code>. In Maven
                        2, this can also be
                        specified as a range of versions.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
    /**
     * @Definition
                        The type of dependency. This defaults to <code>jar</code>. While
                        it usually represents the extension on
                        the filename of the dependency, that is not always the case. A type can be
                        mapped to a different
                        extension and a classifier.
                        The type often correspongs to the packaging used, though this is also not
                        always the case.
                        Some examples are <code>jar</code>, <code>war</code>,
                        <code>ejb-client</code> and <code>test-jar</code>.
                        New types can be defined by plugins that set
                        <code>extensions</code> to <code>true</code>, so
                        this is not a complete list.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName type
     * @var string
     */
    public $type;
    /**
     * @Definition
                        The classifier of the dependency. This allows distinguishing two artifacts
                        that belong to the same POM but
                        were built differently, and is appended to the filename after the version. For
                        example,
                        <code>jdk14</code> and <code>jdk15</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName classifier
     * @var string
     */
    public $classifier;
    /**
     * @Definition
                        The scope of the dependency - <code>compile</code>,
                        <code>runtime</code>, <code>test</code>,
                        <code>system</code>, and <code>provided</code>.
                        Used to
                        calculate the various classpaths used for compilation, testing, and so on. It also
                        assists in determining
                        which artifacts to include in a distribution of this project. For more
                        information, see
                        <a
                        href="http://maven.apache.org/guides/introduction/introduction-to-dependency-mechanism.html">the
                        dependency mechanism</a>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName scope
     * @var string
     */
    public $scope;
    /**
     * @Definition
                        FOR SYSTEM SCOPE ONLY. Note that use of this property is
                        <b>discouraged</b> and may be replaced in later
                        versions. This specifies the path on the filesystem for this dependency.
                        Requires an absolute path for the value, not relative.
                        Use a property that gives the machine specific absolute path,
                        e.g. <code>${java.home}</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName systemPath
     * @var string
     */
    public $systemPath;
    /**
     * @Definition
                        Lists a set of artifacts that should be excluded from this dependency's
                        artifact list when it comes to
                        calculating transitive dependencies.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName exclusions
     */
    public $exclusions;
    /**
     * @Definition
                        Indicates the dependency is optional for use of this library. While the version of
                        the dependency will be
                        taken into account for dependency calculation if the library is used elsewhere,
                        it will not be passed on
                        transitively.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName optional
     * @var boolean
     */
    public $optional;
} // end class Dependency
