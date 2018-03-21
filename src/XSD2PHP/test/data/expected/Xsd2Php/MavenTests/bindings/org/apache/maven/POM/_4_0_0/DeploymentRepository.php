<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName DeploymentRepository
 * @var org\apache\maven\POM\_4_0_0\DeploymentRepository
 * @xmlDefinition
                Repository contains the information needed for deploying to the remote repoistory.

 */
class DeploymentRepository
{

    
    /**
     * @Definition Whether to assign snapshots a
                        unique version comprised of the timestamp and build number, or to
                        use the same version each time
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName uniqueVersion
     * @var boolean
     */
    public $uniqueVersion;
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
} // end class DeploymentRepository
