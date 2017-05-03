<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Scm
 * @var org\apache\maven\POM\_4_0_0\Scm
 * @xmlDefinition 4.0.0
 */
class Scm
{

    
    /**
     * @Definition
                        The source control management system URL
                        that describes the repository and how to connect to the
                        repository. For more information, see the
                        <a href="http://maven.apache.org/scm/scm-url-format.html">URL
                        format</a>
                        and <a
                        href="http://maven.apache.org/scm/scms-overview.html">list of
                        supported SCMs</a>.
                        This connection is read-only.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName connection
     * @var string
     */
    public $connection;
    /**
     * @Definition
                        Just like <code>connection</code>, but for developers, i.e. this
                        scm connection
                        will not be read only.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName developerConnection
     * @var string
     */
    public $developerConnection;
    /**
     * @Definition
                        The tag of current code. By default, it's set to HEAD during
                        development.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName tag
     * @var string
     */
    public $tag;
    /**
     * @Definition
                        The URL to the project's browsable SCM repository, such as ViewVC or
                        Fisheye.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
} // end class Scm
