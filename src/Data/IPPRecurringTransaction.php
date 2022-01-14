<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPRecurringTransaction
 * @var IPPRecurringTransaction
 * @xmlDefinition The Recurrence Transaction Object
 */
class IPPRecurringTransaction
	extends IPPIntuitEntity	{

		/**
		* Initializes this object, optionally with pre-defined property values
		*
		* Initializes this object and it's property members, using the dictionary
		* of key/value pairs passed as an optional argument.
		*
		* @param dictionary $keyValInitializers key/value pairs to be populated into object's properties
		* @param boolean $verbose specifies whether object should echo warnings
		*/
		public function __construct($keyValInitializers=array(), $verbose=FALSE)
		{
			foreach($keyValInitializers as $initPropName => $initPropVal)
			{
				if (property_exists('IPPRecurringTransaction',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPRecurringTransaction',$initPropName))
				{
					$this->{$initPropName} = $initPropVal;
				}
				else
				{
					if ($verbose)
						echo "Property does not exist ($initPropName) in class (".get_class($this).")";
				}
			}
		}


	/**
	 * @xmlType element
	 * @xmlName IntuitObject
	 * @var com\intuit\schema\finance\v3\IntuitObject
	 */
	public $IntuitObject;


} // end class IPPRecurringTransaction
