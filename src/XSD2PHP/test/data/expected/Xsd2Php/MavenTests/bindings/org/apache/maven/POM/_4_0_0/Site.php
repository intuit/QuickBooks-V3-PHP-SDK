<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName Site
 * @var org\apache\maven\POM\_4_0_0\Site
 * @xmlDefinition
                Contains the information needed for deploying websites.

 */
class Site
{

    
    /**
     * @Definition
                        A unique identifier for a deployment locataion. This is used to match the
                        site to configuration in
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
                        Human readable name of the deployment location.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Definition
                        The url of the location where website is deployed, in the form
                        <code>protocol://hostname/path</code>.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName url
     * @var string
     */
    public $url;
} // end class Site
