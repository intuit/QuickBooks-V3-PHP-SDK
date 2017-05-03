<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Developer
 * @var org\apache\maven\POM\_4_0_0\Developer
 * @xmlDefinition
                Information about one of the committers on this project.

 */
class Developer
{

    
    /**
     * @Definition The unique ID of the developer in
                        the SCM.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName id
     * @var string
     */
    public $id;
    /**
     * @Definition The full name of the contributor.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition The email address of the
                        contributor.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName email
     * @var string
     */
    public $email;
    /**
     * @Definition The URL for the homepage of the
                        contributor.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
    /**
     * @Definition The organization to which the
                        contributor belongs.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName organization
     * @var string
     */
    public $organization;
    /**
     * @Definition The URL of the organization.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName organizationUrl
     * @var string
     */
    public $organizationUrl;
    /**
     * @Definition
                        The roles the contributor plays in the project. Each role is
                        described by a <code>role</code> element, the body of which is a
                        role name. This can also be used to describe the contribution.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName roles
     */
    public $roles;
    /**
     * @Definition
                        The timezone the contributor is in. This is a number in the range -11 to 12.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName timezone
     * @var string
     */
    public $timezone;
    /**
     * @Definition
                        Properties about the contributor, such as an instant messenger handle.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName properties
     */
    public $properties;
} // end class Developer
