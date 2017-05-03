<?php

/**
 * @xmlNamespace
 * @xmlType
 * @xmlName item
 * @var item
 */
class item
{

    
    /**
     * @xmlType element
     * @xmlName title
     * @var title
     */
    public $title;
    /**
     * @xmlType element
     * @xmlMinOccurs 0
     * @xmlName note
     * @var note
     */
    public $note;
    /**
     * @xmlType element
     * @xmlName quantity
     * @var quantity
     */
    public $quantity;
    /**
     * @xmlType element
     * @xmlName price
     * @var price
     */
    public $price;
} // end class item
