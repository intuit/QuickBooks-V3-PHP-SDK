<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Repository
 * @var org\apache\maven\POM\_4_0_0\Repository
 * @xmlDefinition
                A repository contains the information needed for establishing connections
                with remote repoistory.

 */
class Repository
{

    
    /**
     * @Definition How to handle downloading of
                        releases from this repository.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName releases
     * @var org\apache\maven\POM\_4_0_0\RepositoryPolicy
     */
    public $releases;
    /**
     * @Definition How to handle downloading of
                        snapshots from this repository.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName snapshots
     * @var org\apache\maven\POM\_4_0_0\RepositoryPolicy
     */
    public $snapshots;
    /**
     * @Definition
                        A unique identifier for a repository. This is used to match the repository
                        to configuration in
                        the <code>settings.xml</code> file, for example.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName id
     * @var string
     */
    public $id;
    /**
     * @Definition
                        Human readable name of the repository.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition
                        The url of the repository, in the form
                        <code>protocol://hostname/path</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
    /**
     * @Definition
                        The type of layout this repository uses for locating and storing artifacts -
                        can be <code>legacy</code> or
                        <code>default</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName layout
     * @var string
     */
    public $layout;
} // end class Repository
