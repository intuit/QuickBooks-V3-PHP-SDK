<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName RepositoryPolicy
 * @var org\apache\maven\POM\_4_0_0\RepositoryPolicy
 * @xmlDefinition Download policy
 */
class RepositoryPolicy
{

    
    /**
     * @Definition Whether to use this repository
                        for downloading this type of artifact.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName enabled
     * @var boolean
     */
    public $enabled;
    /**
     * @Definition
                        The frequency for downloading updates - can be
                        <code>always,</code>
                        <code>daily</code>
                        (default),
                        <code>interval:XXX</code>
                        (in minutes) or
                        <code>never</code>
                        (only if it doesn't exist locally).

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName updatePolicy
     * @var string
     */
    public $updatePolicy;
    /**
     * @Definition
                        What to do when verification of an artifact checksum fails. Valid values are
                        <code>ignore</code>
                        ,
                        <code>fail</code>
                        or
                        <code>warn</code>
                        (the default).

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName checksumPolicy
     * @var string
     */
    public $checksumPolicy;
} // end class RepositoryPolicy
