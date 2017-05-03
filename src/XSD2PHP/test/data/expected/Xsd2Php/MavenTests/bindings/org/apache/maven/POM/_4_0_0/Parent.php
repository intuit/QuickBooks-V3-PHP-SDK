<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Parent
 * @var org\apache\maven\POM\_4_0_0\Parent
 * @xmlDefinition 4.0.0
 */
class Parent
{

    
    /**
     * @Definition The artifact id of the parent
                        project to inherit from.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName artifactId
     * @var string
     */
    public $artifactId;
    /**
     * @Definition The group id of the parent
                        project to inherit from.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName groupId
     * @var string
     */
    public $groupId;
    /**
     * @Definition The version of the parent project
                        to inherit.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName version
     * @var string
     */
    public $version;
    /**
     * @Definition
                        The relative path of the parent <code>pom.xml</code> file within
                        the check out.
                        The default value is <code>../pom.xml</code>.
                        Maven looks for the parent pom first in the reactor of currently building
                        projects, then in this location on
                        the filesystem, then the local repository, and lastly in the remote repo.
                        <code>relativePath</code> allows you to select a different
                        location,
                        for example when your structure is flat, or deeper without an intermediate
                        parent pom.
                        However, the group ID, artifact ID and version are still required,
                        and must match the file in the location given or it will revert to the
                        repository for the POM.
                        This feature is only for enhancing the development in a local checkout of that
                        project.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName relativePath
     * @var string
     */
    public $relativePath;
} // end class Parent
