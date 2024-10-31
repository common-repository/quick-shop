<?php

/*

Plugin Name: Quick Shop

Plugin URI: http://wp.zackdesign.biz/quick-shop/

Description: Quick and easy shopping cart with widget!

Author: Isaac Rowntree, ElbertF & RavanH

Version: 2.3.1

Author URI: http://zackdesign.biz

	Copyright (c) 2009 Isaac Rowntree (http://zackdesign.biz)

	QuickShop is released under the GNU General Public

	License (GPL) http://www.gnu.org/licenses/gpl.txt

	This is a WordPress plugin (http://wordpress.org).

*/

require_once('quickshop_class.php');
load_plugin_textdomain('quick-shop', false, dirname(plugin_basename(__FILE__)) . '/language');

global $quickShop;

if ( class_exists('quickShop') ) $quickShop = new quickShop();

if ( isset($quickShop) )

{

	$quickShop->pluginPath = str_replace('\\', '/', ABSPATH) . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__)) . '/';

  require_once(dirname(__FILE__) . '/widget.php');

// added by RavanH for MU compatibility >>

	if ( dirname(dirname(plugin_basename(__FILE__))) == WPMU_PLUGIN_URL )

		$quickShop->pluginURL = WPMU_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/';

	else

		$quickShop->pluginURL = WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/';

//<<

	add_action('init',           array($quickShop, 'init'));
	
	add_action('widgets_init', create_function('', 'return register_widget("Quick_Shop_Cart");'));

	add_action('admin_menu',  array($quickShop, 'quickshop_pages'));

	add_filter('the_content', array($quickShop, 'content_filter'));

	add_filter('whitelist_options', array($quickShop, 'whitelist_options')); // added by RavanH for MU compatibility

	add_shortcode('quickshop', array($quickShop, 'shortcode'));

	// CForms2 API for Emailer

	if (!function_exists('my_cforms_action()'))

	{

	    function my_cforms_action($cformsdata)

	    {

	        global $quickShop;

	        $_SESSION['qscart'] = array();				

	        $quickShop->update_quantity();

	    }

	}

}

?>
