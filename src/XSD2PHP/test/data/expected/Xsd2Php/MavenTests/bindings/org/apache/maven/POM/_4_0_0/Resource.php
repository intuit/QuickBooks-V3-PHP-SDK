<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Resource
 * @var org\apache\maven\POM\_4_0_0\Resource
 * @xmlDefinition
                This element describes all of the classpath resources associated with a project
                or
                unit tests.

 */
class Resource
{

    
    /**
     * @Definition
                        Describe the resource target path. For example, if you want that
                        resource to appear in a specific package
                        (<code>org.apache.maven.messages</code>), you must specify
                        this
                        element with this value: <code>org/apache/maven/messages</code>.
                        This is not required if you simply put the resources in that directory
                        structure at the source, however.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName targetPath
     * @var string
     */
    public $targetPath;
    /**
     * @Definition
                        Whether resources are filtered to replace tokens with parameterised values or
                        not.
                        The values are taken from the <code>properties</code> element and
                        from the properties in the files listed
                        in the <code>filters</code> element.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName filtering
     * @var boolean
     */
    public $filtering;
    /**
     * @Definition
                        Describe the directory where the resources are stored.
                        The path is relative to the POM.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName directory
     * @var string
     */
    public $directory;
    /**
     * @Definition A list of patterns to include,
                        e.g. <code>**&#47;*.xml</code>.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName includes
     */
    public $includes;
    /**
     * @Definition A list of patterns to exclude,
                        e.g. <code>**&#47;*.xml</code>
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName excludes
     */
    public $excludes;
} // end class Resource
