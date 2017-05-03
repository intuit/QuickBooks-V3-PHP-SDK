<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName License
 * @var org\apache\maven\POM\_4_0_0\License
 * @xmlDefinition
                Describes the licenses for this project. This is used to generate
                the license page of the project's web site, as well as being taken into
                consideration in other reporting and
                validation. The licenses listed for the project are that of the project itself, and not
                of dependencies.

 */
class License
{

    
    /**
     * @Definition The full legal name of the
                        license.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition The official url for the license
                        text.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
    /**
     * @Definition
                        The primary method by which this project may be distributed.
                        <dl>
                        <dt>repo</dt>
                        <dd>may be downloaded from the Maven repository</dd>
                        <dt>manual</dt>
                        <dd>user must manually download and install the dependency.</dd>
                        </dl>
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName distribution
     * @var string
     */
    public $distribution;
    /**
     * @Definition
                        Addendum information pertaining to this license.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName comments
     * @var string
     */
    public $comments;
} // end class License
