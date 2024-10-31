

<div class="wrap">

	<div id="icon-options-general" class="icon32"><br /></div>

	<h2>Quick Shop Options</h2>

	<form method="post" action="options.php">

<?php 

// edited by RavanH for MU compatibility >>

if(function_exists(settings_fields)) { 

	settings_fields('quickshop-options'); 

} else { 

	wp_nonce_field('update-options'); 

	echo '<input name="action" type="hidden" value="update" />'; 

	echo '<input name="page_options" type="hidden" value="quickshop_currency,quickshop_churl,quickshop_symbol,quickshop_decimal,quickshop_addcart,quickshop_total,quickshop_display,quickshop_location,quickshop_freeshipv,quickshop_title,quickshop_tc,quickshop_logged,quickshop_checkout_page,quickshop_paypal_email,quickshop_paypal_notify_url,quickshop_payment_return_url,quickshop_paypal_enabled,quickshop_email_enabled" />'; }

// <<

?>

		<table class="form-table">

			<tr valign="top">

				<th scope="row">

					<?php _e('Shopping cart title','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_title" value="<?php echo $title ?>"/>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					Currency

				</th>

				<td>

					<input type="text" name="quickshop_currency" value="<?php echo $currency ?>" size="5"/>

					e.g. USD, AUD

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Currency symbol','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_symbol" value="<?php echo $currencySymbol ?>" size="5"/>

					e.g. $, &#163; - 

					

					<label><?php _e('before','quick-shop'); ?> <input type="radio" name="quickshop_location" value="before" <?php echo $symbolBefore ?>></label> <?php _e('or','quick-shop'); ?>

					<label><?php _e('after','quick-shop'); ?>  <input type="radio" name="quickshop_location" value="after"  <?php echo $symbolAfter  ?>> <?php _e('the number?','quick-shop'); ?></label>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Decimal point','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_decimal" value="<?php echo $decimalPoint ?>" size="5"/>

				<?php _e('e.g. a period or comma','quick-shop'); ?>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Thousands seperator','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_seperator" value="<?php echo $thousandsSeperator ?>" size="5"/>

					<?php _e('e.g. a comma, period or space','quick-shop'); ?>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

				 <?php _e('Display shopping cart when empty?','quick-shop'); ?>

				</th>

				<td>

					<input type="checkbox" name="quickshop_display" value="1" <?php echo $displayEmpty ?>/>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Display total only?','quick-shop'); ?>

				</th>

				<td>

					<input type="checkbox" name="quickshop_total" value="1" <?php echo $totalOnly ?>/>

					<?php _e("e.g. when you don't use postage",'quick-shop'); ?>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Free shipping threshold','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_freeshipv" value="<?php echo $feeShippingValue ?>" size="5"/>

					<?php echo $currencySymbol ?>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Checkout page','quick-shop'); ?>

				</th>

				<td>

					<select name="quickshop_checkout_page">

						<option value=""><?php _e('Select a page..','quick-shop'); ?></option>

						<?php

						foreach ( get_pages() as $page )

							echo '

								<option value="' . $page->ID . '"' . ( $checkoutPageID == $page->ID ? ' selected="selected"' : '' ) . '>' . $page->post_title . '</option>

								';

						?>

					</select>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Terms and conditions URL','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_tc" value="<?php echo $termsURL ?>" size="70"/>

					<?php _e('Must begin with','quick-shop'); ?> "http://"

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Buy button for logged-in users only?','quick-shop'); ?>

				</th>

				<td>

					<input type="checkbox" name="quickshop_logged" value="1" <?php echo $loggedOnly ?>/>

				</td>

			</tr>

		</table>



		<h3><?php _e('Checkout options','quick-shop'); ?></h3>



		<table class="form-table">

			<tr valign="top">

				<th scope="row">

					<?php _e('Return URL after payment','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_payment_return_url" value="<?php echo $paymentReturnURL ?>"/>

				</td>

			</tr>

		</table>

		

		<h4><?php _e('Payment request per e-mail','quick-shop'); ?></h4>



		<table class="form-table">

			<tr valign="top">

				<th scope="row">

					<?php _e('Enabled','quick-shop'); ?>

				</th>

				<td>

					<input type="checkbox" name="quickshop_email_enabled" <?php echo $emailEnabled ? ' checked="checked"' : '' ?>"/>

				</td>

			</tr>

		</table>



		<h4>PayPal</h4>



		<table class="form-table">

			<tr valign="top">

				<th scope="row">

					<?php _e('Enabled','quick-shop'); ?>

				</th>

				<td>

					<input type="checkbox" name="quickshop_paypal_enabled" <?php echo $payPalEnabled ? ' checked="checked"' : '' ?>"/>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Paypal e-mail address','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_paypal_email" value="<?php echo $payPalEmail ?>"/>

				</td>

			</tr>

			<tr valign="top">

				<th scope="row">

					<?php _e('Notification URL','quick-shop'); ?>

				</th>

				<td>

					<input type="text" name="quickshop_paypal_notify_url" value="<?php echo $payPalNotifyURL ?>"/>

				</td>

			</tr>

		</table>



		<p class="submit">

			<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button-primary"/>

<!-- removed by RavanH for MU compatibility

			<input type="hidden" name="action" value="update"/>

			<input type="hidden" name="page_options" value="quickshop_currency,quickshop_churl,quickshop_symbol,quickshop_decimal,quickshop_addcart,quickshop_total,quickshop_display,quickshop_location,quickshop_freeshipv,quickshop_title,quickshop_tc,quickshop_logged,quickshop_checkout_page,quickshop_paypal_email,quickshop_paypal_notify_url,quickshop_payment_return_url,quickshop_paypal_enabled,quickshop_email_enabled"/> -->

		</p>



		<h3><?php _e('Do you like QuickShop?','quick-shop'); ?></h3>



		<h4><?php _e('Websites','quick-shop'); ?></h4>



		<p><?php _e('Zack Design has completed many websites, themes, and plugins. This one is free for you to use and has been perfected over countless hours. Please either <a href="http://zackdesign.biz/wp-plugins/34">donate</a> or <a href="http://zackdesign.biz/">consider using Zack Design for your next project!</a>','quick-shop'); ?></p>

</form>

</div>





