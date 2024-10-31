=== Quick Shop ===

Contributors: zackdesign, ElbertF, RavanH

http://wp.zackdesign.biz/quick-shop/

Donate link: http://wp.zackdesign.biz/quick-shop/

Tags: cart, shop, widget, paypal, e-commerce, shopping cart, commerce, webshop

Requires at least: 2.8

Tested up to: 3.3.2

Stable tag: 2.3.1



Quick Shop is a Wordpress Shopping Cart with both Paypal and Email functionality built-in.



== Description ==

Note: This plugin requires PHP 5



Quick Shop supports any Wordpress that has the Sidebar Widgets installed, really. It adds a SideBar widget that shows the user what 

they currently have in the cart and allows them to remove the items, not to mention a TinyMCE button to easily allow you to add products to your posts/pages.



Also, you will need to make your own CSS for this. I've included enough classes/ids for you.



Features:



 * Inventory listing tied in to TinyMCE

 * Integrates automatically with CFormsII (and uses CFormsII API so you can edit it easily yourself)

 * Full range of formatting for widget layout in Admin -> Options -> Quick Shop

 * Shopping cart Widget

 * Checkout page

 * Ability to create different product options in a drop-down 

 * WordPress MU compatible


One of my clients required a quick and dirty shopping cart for Wordpress. The background:



 1. They had more than one product per post

 2. They only wanted orders to be sent via email

 3. They only needed EFT (Electronic Fund Transfer - like Direct Debit or Internet Banking)

 

Thus, Quick Shop was born thanks to the excellent way in which the Wordpress Plugin API is set up.



List of possible future features:



 * AJAX implementation

 * Inventory quantities  

 

Please be aware that I'll only be updating this if I need to or if I'm paid to. Feel free to come on board and contribute!



== Installation ==



1. Upload the 'quick-shop' folder to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Edit your Quick Shop settings in Settings -> Quick Shop

4. Edit your Quick Shop inventory in Tools - > Quick Shop 

5. Add tags to your post text using the TinyMCE button



If the TinyMCE Quick Shop button doesn't appear, simply type: 
`[quickshop product="WHATEVER_YOUR_PRODUCT_NAME_IS"]`

As of version 2.1, Quick Shop is compatible with WordPress MU again. However, sitewide activation has not been tested.



Also, you must enable the widget and a payment option for those items to appear on the checkout page.



* Please note that when using the CFormsII plugin email payment request it assumes that the first CFormsII form (number 1 or the default one) is the one to use. Please tell it to redirect to a 'Thank You' page in Wordpress in the Core Form Admin / Email Options so that it has time to show that your cart is empty. All other options are also editable here so you can fine tune your email. I recommend turning Auto Confirmation on as well. Edit checkout.php email section to add new fields or change the default form used!

   

= Upgrade Information =



Activate the Quick Shop Updater plugin that is included with plugin to automatically upgrade all your old tags from Quick Shop v1 to v2. Once activated, visit the Tools > Quick Shop Updater page to initiate the update process. The content of the Quick Shop tags in all posts and pages will be placed in the new inventory list and the tags will be updated to the new notation. The Quick Shop Updater plugin can then be deactivated and deleted.

On WordPress MU, sitewide activation of the Quick Shop Updater plugin has *not* been tested! 



== Screenshots ==



[Zack Design Plugin Showcase](http://wp.zackdesign.biz/quick-shop/ "Plugin Showcase")



== Frequently Asked Questions ==



= How do I change the currency in Quick Shop? =



You may now do it in the Quick Shop admin options page. You can put in any currency you wish to set as the default currency.



= I Need HELP!!! =



That's what I'm here for. I do Wordpress sites for many people in a professional capacity and

can do the same for you. Check out www.zackdesign.biz



= Why didn't I include the changed WP-GBCF as well? =



Because they may upgrade it in future. Nothing worse than out-of-date code.



= Where do I get WP-GBCF? =



Weren't you paying attention? Read the Description again!!!



== Upgrade Notice ==



Please make sure that your checkout.php file is backed up if you've added any checkout options to it. Eventually I'll make it properly pluggable.


== Changelog ==

= 2.3.1 =

- Update to change some links
- Minor bugfix for including widget.php (thanks jtkt)
- Editors may now use the backend for Quickshop


= 2.3 =

- Thanks to Øyvind Sæther now includes internationalisation
- Lots of misc bugfixes
- Removal of deprecated widget creation
- Lots more planned for the next release! 

= 2.2 =



- Now uses CForms2 as the email form generator and sender



= 2.1 =


Thanks to RavanH for this release!
- WPMU 2.8+ compatibility
- Improved cart widget (for accessibility)
- Options/Products page improvements

= 2.0 =



- 90% of code rewritten and improved

- Added custom checkout page

- Added inventory editor

- Added starting shipping price and default shipping price

- Added WordPress shortcode support

- Added "thousands seperator" for amounts

- Added toggle for payment methods

- Added updater

- Improved TinyMCE button

- More...



= 1.3.12 =



- Addition of Paypal notification and return URLs. Also item number. 



= 1.3.11 =



- Minor bugfixes/updates to the code so that it works better when creating the 'add to cart' button

- Update to drop-downs so that you can now set multiple prices for each option



= 1.3.10 =



- Mature implementation of multiple tags with drop-downs in one post. There w0z bugz!

- Finally fixed the irksome free shipping bug in the paypal widget. Sorry about the wait Dietmar!

- If you're reading the changelog this far, please consider donating!



= 1.3.9 =



- Free shipping finally fixed properly. I don't know how/why but the previous implementation was wrong

- Added ability to do drop-downs with products (e.g. different options)



= 1.3.8 =



- Fixed Paypal shipping implementation - because Paypal wasn't doing the calculation!! (yet does it for second shipping prices, weird)

- Also fixed Paypal free shipping



= 1.3.7 =



- Added ability to use Terms and Conditions to both widgets

- Added ability to hide 'buy now' button if not logged in

- Changed CFormsII integration slightly (yourorder) due to user fix found (Thanks Zach!!)



= 1.3.6 =



- Fixed a small glitch with checkout page url - thanks Lionel!!

- CFormsII integration included - thanks aproxis!!!

- Paypal subscription added

- Paypal donations added

- Shopping cart links now send absolute URL of current page - this should now work in all situations



= 1.3.5 =



- Fixed numerous bugs in admin section as well as adding the ability to change the widget title

- Added javascript key checking and form submission to QTY changing field to make it less likely to fail - should work everywhere now!



= 1.3.4 =



- Added 'Free shipping at X amount' Admin setting

- Cleaned up admin for 2.5

- Fixed admin form bug

- Updated instructions for the new WP-GBCF form update



= 1.3.3 =



- Added 'Add to Cart' button text change in Admin



= 1.3.2 =



- Addition to Admin of setting where custom cart points



= 1.3.1 =



- Fixes for certain server configurations. All of you who report strange cart updates should now be right!



= 1.3 =



- Support for TinyMCE in 2.5



= 1.2.4.7 =



- Line 522 bug fixed - now properly checks the session. I can't believe this has taken so long to get right!!



= 1.2.4.6 =



- Added Display shopping cart when empty? checkbox - this functionality has also been fixed for PHP5

- Added Display total only? checkbox

- Added before or after currency symbol? radioboxes



= 1.2.4.4 =



- Renamed session from cart to 'qscart' in an attempt to stop other applications conflicting...



= 1.2.4.3 =



- Disappeared the widget when empty



= 1.2.4.2 =



- Added option for Paypal email

- Fixed slight bug in admin form submit which made it impossible to have nothing submitted in currency (defaults to USD)



= 1.2.4.1 =



- Added more options for currency (e.g. formatting for money)



= 1.2.4 =



- Admin page for setting currency (works with Paypal widget)

- Removed style for colouring the widget - you should do these yourselves as it looks bad in some themes



= 1.2.3.1 =



- Fixed Problem with linking back to product

- Ensured that Quick Shop Is Valid XHTML 1.0 Transitional



= 1.2.3 =



- Updated layout of widgets, added ability to link back to product item from the shopping cart

- Works out postage for you now



= 1.2.2 =



- Fixed changing product quantity on shopping cart widget

- Fixed Paypal form bug



= 1.2.1 =



- New TinyMCE Button



= 1.2 =



- Better Paypal integration. Now uses a new shopping cart widget instead!

- Quantity setting in sidebar widget

- Removal of extra Paypal tags to consolidate to just one tag.

- Added shipping by default



= 1.1 =



- Added product price

- Added tag for Paypal baskets


