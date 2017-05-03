<?php

namespace QuickBooksOnline\API\Core\Http\Serialization;

/**
 * This file contains serialization format enumeration.
 */
class SerializationFormat
{
    /**
     * Default value used to indicate that compression is not specified in the config.
     * @var string DEFAULT
     */
    //const DEFAULT = "DEFAULT";

    /**
     * Xml Serialization Format.
     * @var string
     */
    const Xml = "Xml";

    /**
     * Java Script Obejct Notation Serialization Format.
     * @var string
     */
    const Json = "Json";

    /**
     * Custom serialization format.
     * @var string
     */
    const Custom = "Custom";
}
