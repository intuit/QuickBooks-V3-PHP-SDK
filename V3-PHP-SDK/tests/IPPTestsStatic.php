<?php


/**
* Generate a unique string useful for testing CREATE/UPDATE operations
*
* When unit tests need to test CREATE or UPDATE operations, it is helpful
* to have a way to easily generate unique strings that have some indication
* of timestamp, so that the outcome of the operation can easily be
* inspected in QBO or QBD manually.
*
* @return 	string	a relatively unique string that contains time of day
*/
function randTimestampString($prefixText)
{
	static $uniqueCount = 0;
	$uniqueCount = $uniqueCount % 10;
	return $prefixText . (int)($uniqueCount++) . ' ' . date('H i s') . (rand()%1000);
}

//
// Hard-coded field values for CRUD unit tests:
//
//  * 'Create' array contains attributes to be set during Create operation
//  * 'Update' array contains attributes to be set during Update operation
//  * 'Sparse' array contains attributes to REMOVE from XML when testing Sparse operation
//
function getStaticFieldTests()
{
	$FieldTests = array(

   'Attachable'=>
      array(
			/* 'Create' => defined via dynamic function method */
           'Update'=>
            array(
                 'Note'        => 'Some detailed note',
                 ),
           ),


   'Account'=>
      array(
			/* 'Create' => defined via dynamic function method */
           'Update'=>
            array(
                 'Description' => "Updated @ " . date(DATE_ATOM)
                 ),
           'Sparse'=>
			array(
			     'AccountType'
			     ),
           ),

   'Bill'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),
           
   'BillPayment'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),
		   
   'Class'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),
           
   'CompanyInfo'=>
      array(
           'Create'=>
            array(
                 'CompanyName' => 'MyCo Consulting LLC',
                 ),
           'Update'=>
            array(
                 'CompanyName' => 'MyCo Production LLC',
                 ),
           ),

   'CreditMemo'=>
      array(
           'Update'=>
            array(
                 'PrivateNote' => 'Private Note Update',
                 ),
           ),

   'Customer'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),

   'Department'=>
      array(
           'Create'=>
            array(
                 'Name'   => 'DeptName' . rand(),
                 'SubDepartment'        => false,
                 'FullyQualifiedName'   => 'DeptName' . rand(),
                 ),
           'Update'=>
            array(
                 'FullyQualifiedName'   => 'DeptName' . rand(),
                 )
           ),
		   
   'Deposit'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),

   'Employee'=>
      array(
           'Create'=>
            array(
                 'GivenName'   => 'Joe' . rand(),
                 'FamilyName'        => 'Smith' . rand(),
                 ),
           'Update'=>
            array(
                 'GivenName'   => 'Joe' . rand(),
                 'FamilyName'        => 'Smith' . rand(),
                 )
           ),

   'Estimate'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),

   'Item'=>
      array(
			/* 'Create' => defined via dynamic function method */
           'Update'=>
            array(
                 'Description' => randTimestampString('Some updated description')
                 )
           ),
           
   'Invoice'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),
           
   'JournalEntry'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),

   'Payment'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
			'Sparse'=>
				array(
				     'RemitToRef',
				     'ARAccountRef',
				     'PaymentMethodRef',
				     'TxnDate',
				     'Line'
				     ),
           ),

   'PaymentMethod'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),

   'PurchaseOrder'=>
      array(
			/* 'Create' => defined via dynamic function method */
           'Update'=>
            array(
				'ShipAddr'    => new IPPPhysicalAddress(array('Line1'=>'321 Main Street',
				                                              'Line2'=>'Suite 20',
				                                              'City'=>'New York',
				                                              'CountrySubDivisionCode'=>'NY')),
                 )
           ),

   'Preferences'=>
      array(
           'Create'=>
            array(
                 'TaxPrefs'    => new IPPTaxPrefs(array('UsingSalesTax'=>'false'))
                 ),
			/* 'Update' => defined via dynamic function method */
           ),


   'Purchase'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),
		   
   'SalesOrder'=>
      array(
           'Create'=>
            array(
                 'PrivateNote' => 'Concrete Sales Order',
                 ),
           'Update'=>
            array(
                 'PrivateNote' => 'Concrete Sales Order',
                 ),
           ),


   'SalesReceipt'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),

   'TaxCode'=>
      array(
			/* 'Create' => defined via dynamic function method */
           'Update'=>
            array(
                 'Description'    => 'some other description',
                 )
           ),

   'TaxRate'=>
      array(
           'Create'=>
            array(
                 'Name'           => randTimestampString('Tax'),
                 'RateValue'      => '1.0',
                 ),
           'Update'=>
            array(
                 'RateValue'      => '2.0',
                 )
           ),

   'Term'=>
      array(
           'Create'=>
            array(
                 'Name'           => randTimestampString('Net'),
                 'DiscountPercent'=> '50',
                 'DayOfMonthDue'        => '23',
                 'DiscountDayOfMonth'        => '2',
                 'Type'        => 'DateDriven',
                 ),
           'Update'=>
            array(
                 'Description'    => randTimestampString('Desc'),
                 'DueNextMonthDays'    => '10'
                 )
           ),

   'TimeActivity'=>
      array(
           'Create'=>
            array(
                 'Name'           => 'some name',
                 ),
           'Update'=>
            array(
                 'Name'           => 'some name 2',
                 )
           ),

   'UserAlert'=>
      array(
			/* 'Create' => defined via dynamic function method */
			/* 'Update' => defined via dynamic function method */
           ),

   'Vendor'=>
      array(
			/* 'Create' => defined via dynamic function method */
           'Update'=>
            array(
                 'PrimaryEmailAddr' => new IPPEmailAddress(array('Address'=>'me@example.com')),
                 )
           ),

   'VendorCredit'=>
      array(
			/* 'Create' => defined via dynamic function method */
           'Update'=>
            array(
                 'PrivateNote' => randTimestampString('PrivateNote'),
                 )
           )
	);    

	return $FieldTests;
} 


?>