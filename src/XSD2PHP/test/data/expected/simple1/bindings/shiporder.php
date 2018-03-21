<?php

/**
 * @xmlNamespace
 * @xmlType
 * @xmlName shiporder
 * @var shiporder
 */
class shiporder
{

    
    /**
     * @xmlType element
     * @xmlName orderperson
     * @var orderperson
     */
    public $orderperson;
    /**
     * @xmlType element
     * @xmlName shipto
     * @var shipto
     */
    public $shipto;
    /**
     * @xmlType element
     * @xmlMaxOccurs unbounded
     * @xmlName item
     * @var item
     */
    public $item;
    /**
     * @xmlType attribute
     * @xmlNamespace http://www.w3.org/2001/XMLSchema
     * @xmlName orderid
     * @var string
     */
    public $orderid;
} // end class shiporder
