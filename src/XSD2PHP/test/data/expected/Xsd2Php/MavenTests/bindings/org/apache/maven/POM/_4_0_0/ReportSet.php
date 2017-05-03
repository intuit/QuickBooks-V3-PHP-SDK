<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName ReportSet
 * @var org\apache\maven\POM\_4_0_0\ReportSet
 * @xmlDefinition Represents a set of reports and
                configuration to be used to generate them.
 */
class ReportSet
{

    
    /**
     * @Definition The unique id for this report
                        set, to be used during POM inheritance.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName id
     * @var string
     */
    public $id;
    /**
     * @Definition Configuration of the report to be
                        used when generating this set.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName configuration
     */
    public $configuration;
    /**
     * @Definition
                        Whether any configuration should be propagated to child POMs.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName inherited
     * @var string
     */
    public $inherited;
    /**
     * @Definition
                        The list of reports from this plugin which should be generated from this set.

     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName reports
     */
    public $reports;
} // end class ReportSet
