<?php
/*
Plugin Name: Padma Shortcodes Block
Plugin URI: http://plasma.cr/
Description: Padma Shortcode block, based on Shortcode block for Headway 1.0.0.2
Version: 1.0.0
Author: Plasma
Author URI: http://www.plasma.cr
License: GNU GPL v2
*/

define('SHORTCODES_BLOCK_VERSION', '1.0.0');

/*require_once('wp-updates-plugin.php');
new WPUpdatesPluginUpdater_970( 'http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));*/

add_action('after_setup_theme', 'register_shortcodes_block');
function register_shortcodes_block() {
    if ( !class_exists('Padma') )
		return;
	require_once 'block.php';
	require_once 'block-options.php';
	
	if (!class_exists('PadmaBlockAPI') )
	{
		return false;
	}
	return padma_register_block('PadmaShortcodesBlock', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

}