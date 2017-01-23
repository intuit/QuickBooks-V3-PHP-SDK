<?php

/**
* Class for generating a test summary.  Replace with JUnit style, soon.
*/
class IPPTestSummaryText {

	/**
	 * Create table formatting for row dividers in test output
	 *
	 * @param int $colCount numbe of columns to padd to
	 * @return string padded string
	 */
	private static function showDivider($colCount)
	{
		echo str_pad("", 20, "-") . '+';
		for($i=0;$i<$colCount;$i++)
		 echo str_pad("", 12, "-") . '+';
		echo "\n";
	}
	
	/**
	 * Output a table-based plaintext test suite summary
	 *
	 * @param $testResults outcome of the test cases
	 * @return false
	 */
	public static function showTestSummary($testResults)
	{
		echo "\n\n"."TEST SUMMARY:"."\n\n";
		$bFirstRow = TRUE;
		foreach($testResults as $objectName => $oneResult)
		{
			if ($bFirstRow)
			{
				echo str_pad("", 20, " ") . "| " . implode(" | ",array_map('pad10',array_keys($oneResult))) . " |\n";
				IPPTestSummaryText::showDivider(count($oneResult));
				$bFirstRow = FALSE;
			}
			
			echo str_pad($objectName, 20, " ") . "| " . implode(" | ",  array_map('pad10',array_map('binaryToText', array_values($oneResult)))) . " |\n";
			IPPTestSummaryText::showDivider(count($oneResult));
		}
	}
}


/**
 * Convert BOOL to readable PASS/FAIL
 *
 * @param boolean $val test result
 * @return string readable test result 
 */
function binaryToText($val)
{
	if ($val)
		return "PASS";
	else
		return "FAIL";
}

/**
 * Convert a string to a 10 character space-padded string
 *
 * @param string $val unpadded string
 * @return string padded string
 */
function pad10($val)
{
	return str_pad($val, 10, " ");
}


?>