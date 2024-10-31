<?php
/*
Plugin Name: QuickShop Updater
Plugin URI: http://www.zackdesign.biz/wp-plugins/34
Description: Updates QuickShop post/page tags v1 to v2, run once.
Author: ElbertF
Version: 2.3.1
Author URI: http://elbertf.com
	Copyright (c) 2005, 2006 Isaac Rowntree (http://zackdesign.biz)
	QuickShop is released under the GNU General Public
	License (GPL) http://www.gnu.org/licenses/gpl.txt
	This is a WordPress plugin (http://wordpress.org).
*/
add_action('admin_menu', 'qsupdate_admin');
function qsupdate_admin()
{
	add_management_page('Quick Shop Updater', 'Quick Shop Updater', 'manage_options', __FILE__, 'qsupdate_options');
}
function qsupdate_options()
{
	?>
	<div id="icon-options-general" class="icon32"><br /></div>
	<div class="wrap">
		<h2>QuickShop Updater</h2>
		<?php
		if ( isset($_POST['qsupdater_submit']) )
		{
			global $wpdb;
			$sql = '
				SELECT
					`ID`,
					`post_content`
				FROM `' . $wpdb->prefix . 'posts`
				ORDER BY `ID`
				;';
			$r = $wpdb->get_results($sql, ARRAY_A);
			$pageCount    = count($r);
			$updateCount  = 0;
			$productCount = 0;
			if ( $r )
			{
				foreach ( $r as $d )
				{
					preg_match_all('/\[quickshop:(.+?):end\]/', $d['post_content'], $m);
					if ( $m )
					{
						foreach ( $m[0] as $i => $tag )
						{
							foreach ( $d2 = explode(':', preg_replace('/^\[|\:end]$/', '', $tag)) as $j => $v )
							{
								if ( !( $j % 2 ) ) $param[$v] = explode('|', $d2[$j + 1]);
							}
							$product =
								$param['quickshop'][0] . ' | ' . 
								$param['price'][0]     . ' | ' .
								$param['shipping'][0]  . ( count($param['quickshop']) > 1 ? ' | Property: ' .
								implode(', ', $param['quickshop']) : ''
								);
							$d['post_content'] = str_replace($tag, '[quickshop product=' . $param['quickshop'][0] . ']', $d['post_content']);
						}
						$sql = '
							UPDATE
								`' . $wpdb->prefix . 'posts`
							SET
								`post_content` = "' . $d['post_content'] . '"
							WHERE
								`ID` = ' . $d['ID'] . '
							LIMIT 1										
							;';
						if ( mysql_query($sql) && mysql_affected_rows() && $product )
						{
							if ( !preg_match('/' . preg_quote($param['quickshop'][0], '/') . ' \|/', get_option('quickshop_products')) )
							{							
								update_option('quickshop_products', get_option('quickshop_products') . "\n" . $product);
								$productCount ++;
							}
							$updateCount ++;
						}
					}
				}
			}
			?>
			<h3>Done!</h3>
			<p>Rows (posts, pages, revisions) scanned: <strong><?php echo $pageCount ?></strong></p>
			<p>Rows updated: <strong><?php echo $updateCount ?></strong></p>
			<p>Products found: <strong><?php echo $productCount ?></strong></p>
			<p><em>You may deactivate and remove this plug-in now, you won't need it anymore:</em></p>
			<?php
		if (function_exists('wp_nonce_url')) 
			echo "<p><a href=\"" . wp_nonce_url('plugins.php?action=deactivate&amp;plugin='.__FILE__, 'deactivate-plugin_'.__FILE__) . "\" title=\"" . __('Deactivate this plugin') . "\" class=\"delete\">" . __('Deactivate') . "</a>.</p>";
		else
			_e('Go to the <a href="plugins.php">Plugins page</a> and deactivate it.', 'quick-shop-updater');
		}
		else
		{
			?>
			<p>The updater will go through all posts and replace old QuickShop tags with new ones. You only need to run this once, you can remove this plug-in after.</p>
			<form method="post" action="">
				<p class="submit">
					<input type="submit" name="qsupdater_submit" value="Run the updater" class="button-primary"/>
				</p>
			</form>
			<?php
		}
		?>
	</div>
	<?php
}
?>
