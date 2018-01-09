<?php
/*
Plugin Name: Headway Shortcodes Block
Plugin URI: http://headwaythemesextend.com/
Description: Shortcode block for Headway
Version: 1.0.0.2
Author: Jon Mather
Author URI: http://www.carassiusproductions.com.au
License: GNU GPL v2
*/

define('SHORTCODES_BLOCK_VERSION', '1.0.0.2');

require_once('wp-updates-plugin.php');
new WPUpdatesPluginUpdater_970( 'http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));

add_action('after_setup_theme', 'register_shortcodes_block');
function register_shortcodes_block() {
    if ( !class_exists('Headway') )
		return;
	require_once 'block.php';
	require_once 'block-options.php';
	
	if (!class_exists('HeadwayBlockAPI') )
	{
		return false;
	}
	return headway_register_block('HeadwayShortcodesBlock', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

}