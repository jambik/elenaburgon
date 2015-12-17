<?php

/**
 * Smarty {cart} function plugin
 *
 * Type:     function
 * Name:     cart
 * Date:     June 4, 2012
 * Purpose:  session cart information.
 * Input:
 *         - type = number of pages
 *
 * Examples:
 * {pagination type="count"}
 * {pagination type="sum"}
 * 
 * @version  1.0
 * @author   Dzhanbulat Magomaev
 * @param    array
 * @param    Smarty
 * @return   string
 */
function smarty_function_cart($params, &$smarty)
{
		$type = $params['type'];
		$html = "";
		
		if($_SESSION["user"]) // user registered
		{
			$cart = (isset($_SESSION["user"]["user_cart"])) ? unserialize($_SESSION["user"]["user_cart"]) : false;
		}
		elseif(isset($_SESSION["cart"])) // user not registered
		{
			$cart = unserialize($_SESSION["cart"]);
		}
		
		if($type == "count")
		{
			$count = 0;
			if($cart) foreach($cart as $value) $count += $value["quantity"];
			return $count;
		}
		
		if($type == "sum")
		{
			$sum = 0;
			//foreach($cart as $value) $sum += $value["quantity"];
			return $count;
		}
}

?>
