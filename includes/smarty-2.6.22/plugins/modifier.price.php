<?php

/**
 * Smarty price modifier plugin
 *
 * Type:     modifier<br>
 * Name:     price<br>
 * Purpose:  same functionality as number_format() function
 * @author Magomaev Dzhanbulat
 * @param string
 * @param string
 * @return string
 */

function smarty_modifier_price($string, $decimals = 0, $currency = "rub", $showCurrency = true)
{
	if(is_numeric(trim($string)))
	{
		$number = $decimals ? round(floatval(trim($string)), $decimals) : intval(trim($string));
		
		if($currency == "rub")
		{
			return number_format($number, $decimals, ".", " ").($showCurrency ? " руб." : "");
		}
		if($currency == "dol")
		{
			return ($showCurrency ? "$" : "").number_format($number, $decimals, ".", ",");
		}
	}
	else
	{
	 return $string;
	}
}

?>
