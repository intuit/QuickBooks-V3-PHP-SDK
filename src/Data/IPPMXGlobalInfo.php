<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPMXGlobalInfo
 * @var IPPMXGlobalInfo
 * @xmlDefinition 
				Product: QBO
				Description: Global invoice data of a transaction which is required by CFDI4.0 in Mexico.
				Visit http://omawww.sat.gob.mx/tramitesyservicios/Paginas/anexo_20_version3-3.htm and find the catalogues that contain the accepted values of Exportation, Periodicity, and Year.
			
 */
class IPPMXGlobalInfo
	{

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
				if (property_exists('IPPMXGlobalInfo',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPMXGlobalInfo',$initPropName))
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
	 * @Definition 
						Product: QBO
						Description: Periodicity of global invoice data which is required by CFDI4.0 in Mexico. 
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Periodicity
	 * @var string
	 */
	public $Periodicity;
	/**
	 * @Definition 
						Product: QBO
						Description: Month of global invoice data which is required by CFDI4.0 in Mexico. 
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Month
	 * @var string
	 */
	public $Month;
	/**
	 * @Definition 
						Product: QBO
						Description: Year of global invoice data which is required by CFDI4.0 in Mexico. 
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Year
	 * @var string
	 */
	public $Year;


} // end class IPPMXGlobalInfo
