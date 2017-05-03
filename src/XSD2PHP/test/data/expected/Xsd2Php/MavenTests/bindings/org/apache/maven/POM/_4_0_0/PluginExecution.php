<?php
namespace org\apache\maven\POM\_4_0_0;

/**
 * @xmlNamespace http://maven.apache.org/POM/4.0.0
 * @xmlType
 * @xmlName PluginExecution
 * @var org\apache\maven\POM\_4_0_0\PluginExecution
 * @xmlDefinition 4.0.0
 */
class PluginExecution
{

    
    /**
     * @Definition The identifier of this execution
                        for labelling the goals during the build, and for matching
                        exections to merge during inheritance.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName id
     * @var string
     */
    public $id;
    /**
     * @Definition The build lifecycle phase to bind
                        the goals in this execution to. If omitted, the goals will
                        be bound to the default specified in their metadata.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName phase
     * @var string
     */
    public $phase;
    /**
     * @Definition The goals to execute with the
                        given configuration.
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName goals
     */
    public $goals;
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
     * @Definition 0.0.0+
     * @xmlType element
     * @xmlNamespace http://maven.apache.org/POM/4.0.0
     * @xmlMinOccurs 0
     * @xmlName configuration
     */
    public $configuration;
} // end class PluginExecution
