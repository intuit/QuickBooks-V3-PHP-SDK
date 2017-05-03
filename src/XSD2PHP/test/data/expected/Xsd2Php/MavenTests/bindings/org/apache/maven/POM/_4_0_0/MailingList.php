<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName MailingList
 * @var org\apache\maven\POM\_4_0_0\MailingList
 * @xmlDefinition
                This element describes all of the mailing lists associated with
                a project. The auto-generated site references this information.

 */
class MailingList
{

    
    /**
     * @Definition The name of the mailing list.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition
                        The email address or link that can be used to subscribe to the mailing list.
                        If this is an email address, a
                        <code>mailto:</code> link will automatically be created when
                        the documentation is created.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName subscribe
     * @var string
     */
    public $subscribe;
    /**
     * @Definition
                        The email address or link that can be used to unsubscribe to
                        the mailing list. If this is an email address, a
                        <code>mailto:</code> link will automatically be created
                        when the documentation is created.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName unsubscribe
     * @var string
     */
    public $unsubscribe;
    /**
     * @Definition
                        The email address or link that can be used to post to
                        the mailing list. If this is an email address, a
                        <code>mailto:</code> link will automatically be created
                        when the documentation is created.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName post
     * @var string
     */
    public $post;
    /**
     * @Definition
                        The link to a URL where you can browse the mailing list archive.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName archive
     * @var string
     */
    public $archive;
    /**
     * @Definition
                        The link to alternate URLs where you can browse the list archive.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName otherArchives
     */
    public $otherArchives;
} // end class MailingList
