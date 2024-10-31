<?php		

class Quick_Shop_Cart extends WP_Widget {
	function Quick_Shop_Cart() {
		parent::WP_Widget(false, $name = 'Quick Shop Cart');
	}

	function widget($args, $instance) {
    extract($args);
    		// modified by RavanH >>
    
    // widget shopping cart form code cleanup + refresh icon
    // <<
    global $quickShop;
    if ( $quickShop->cart_has_items() )
    
    {
    
    	$currency           = get_option('quickshop_currency')       or $currency            = 'USD';
    
    	$currencySymbol     = get_option('quickshop_symbol')         or $currencySymbol      = '$';
    
    	$DecimalPoint       = get_option('quickshop_decimal')        or $defaultDecimalPoint = '.';
    
    	$thousandsSeperator = get_option('quickshop_thousands')      or $thousandsSeperator  = ',';
    
    	$freeShippingValue  = get_option('quickshop_freeshipv')      or $freeShippingValue   = 0;
    
    	$title              = get_option('quickshop_title')          or  __('Your Shopping Cart','quick-shop');
    
    	$shippingStart      = get_option('quickshop_shipping_start') or $shippingStart       = 0;
    
    	$checkoutPageID     = get_option('quickshop_checkout_page');
    
    
    
    	echo
    
    		$before_widget . '
    
    		<div class="quickshopcart" style="padding: 5px;">
    
    		' . $before_title . $title . $after_title
    
    		;
    
    
    
    	echo '
    
    
    
    		<table style="width: 100%;">
    
    		';
    
    
    
    	$count   = 1;
    
    	$total   = 0;
    
    	$postage = $shippingStart;
    
    
    
    	if ( !empty($_SESSION['qscart']) && is_array($_SESSION['qscart']) )
    
    	{
    
    		echo '
    
    			<tr>
    
    				<th>' . $quickShop->lang['product name'] . '</th>
    
    				<th>' . $quickShop->lang['quantity']     . '</th>
    
    				<th style="text-align: center;">' . $quickShop->lang['price']        . '</th>
    			</tr>
    
    			';
    
    
    
    		foreach ( $_SESSION['qscart'] as $item )
    
    		{
    
    			echo '
    
    				<tr>
    
    					<td style="overflow: hidden;">
    
    						<a href="' . $item['qslink'] . '">' . $item['name'] . '</a>
    
    					</td>
    
    					<td>
    
    						<form method="post" name="cquantity" action="#quickshop" style="display:inline;border:none">
    
    							<input type="hidden" name="product" value="' . $item['name'] . '"/>
    
    							<input type="text" name="quantity" value="' . $item['quantity'] . '" size="2"/>
    
    							<input type="submit" name="cquantity" style="text-indent:-999px;width:16px;height:16px;border:none;background-image:url(' . $quickShop->pluginURL . 'images/cart_refresh.png)" value="'.__('Update','quick-shop').'" title="'.__('Update','quick-shop').'"/>
    
    							<input type="submit" name="delcart" style="text-indent:-999px;width:16px;height:16px;border:none;background-image:url(' . $quickShop->pluginURL . 'images/cart_remove.png)" value="'.__('Remove','quick-shop').'" title="'.__('Remove','quick-shop').'"/>
    
    						</form>
    
    					</td>
    
    					<td style="text-align: right;">
    
    						' . $quickShop->output_currency($item['price'] * $item['quantity'], $currencySymbol, $decimalPoint, $thousandsSeperator) . '
    
    					</td>
    
    				</tr>
    
    				';
    
    
    
    			$total   += $item['price'] * $item['quantity'];
    
    			$count   += $item['quantity'];
    
    			$postage += $item['quantity'] * $item['shipping'];
    
    		}
    
    	}
    
    
    
    	if ( -- $count )
    
    	{
    
    		echo '
    
    			<tr>
    
    				<td><br/></td>
    
    				<td><br/></td>
    
    				<td><br/></td>
    
    			</tr>
    
    			';
    
    
    
    		if ( !get_option('quickshop_total') )
    
    		{
    
    			if ( $freeShippingValue && $freeShippingValue <= $total ) $postage = 0;
    
    
    
    			echo '
    
    				<tr>
    
    					<td colspan="2" style="font-weight: bold; text-align: right;">
    
    						' . $quickShop->lang['subtotal'] . ':
    
    					</td>
    
    					<td style="text-align: right;">
    
    						' . $quickShop->output_currency($total, $currencySymbol, $decimalPoint, $thousandsSeperator) . '
    
    					</td>
    
    				</tr>
    
    				<tr>
    
    					<td colspan="2" style="font-weight: bold; text-align: right;">
    
    						' . $quickShop->lang['shipping'] . ':
    
    					</td>
    
    					<td style="text-align: right">
    
    						' . $quickShop->output_currency($postage, $currencySymbol, $decimalPoint, $thousandsSeperator) . '
    
    					</td>
    
    				</tr>
    
    				';
    
    		}
    
    
    
    		echo '
    
    			<tr>
    
    				<td colspan="2" style="font-weight: bold; text-align: right;">
    
    					' . $quickShop->lang['total'] . ':
    
    				</td>
    
    				<td style="text-align: right;">
    
    					' . $quickShop->output_currency($total + $postage, $currencySymbol, $decimalPoint, $thousandsSeperator) . '
    
    				</td>
    
    			</tr>
    
    		</table>
    			';
    
    
    
    		$terms = get_option('quickshop_tc');
    
    
    
    		if ( !$_SESSION['qstc'] && $terms )
    
    		{
    
    			echo '
    
    		<form method="post" action="">
    
    			<p><a href="' . $terms . '" target="_blank">' . $quickShop->lang['terms agree'] . '</a></p>
    
    
    
    			<input type="hidden" value="true" name="qstc"/>
    
    			<input type="submit" value="' . $quickShop->lang['yes'] . '"/>
    
    		</form>
    
    				';
    
    		}
    
    		else 
    
    			echo '
    
    		<p style="font-weight: bold;text-align: right">
    
    			<a href="' . get_permalink($checkoutPageID) . '">
    
    				' . $quickShop->lang['to checkout'] . '
    
    				&nbsp;
    
    				<img src="' . get_bloginfo('wpurl') . '/wp-content/plugins/quick-shop/images/cart_go.png" style="border: 0px;" title="'.__('Checkout','quick-shop').'" alt="'.__('Checkout','quick-shop').'"/>
    				&nbsp;
    
    			</a>
    
    		</p>
    
    				';
    
    	}
    
    
    
    	echo '
    
    		</div>
    
    		
    
    		' . $after_widget
    
    		;
    
    }
    
    else
    
    {
    
    	if ( get_option('quickshop_display') )
    
    	{
    
    		$title = get_option('quickshop_title') or __('Your Shopping Cart','quick-shop');
    
    
    
    		echo
    
    			$before_widget . '
    
    			<div class="quickshopcart" style="padding: 5px;">
    
    				' . $before_title . $title . $after_title . '
    
    				
    
    				<p>' . $quickShop->lang['cart empty'] . '</p>
    
    			</div>
    
    			' . $after_widget
    
    			;
    
    	}
    
    }
	}

}


?>
