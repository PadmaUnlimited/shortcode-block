<?php
/*
Plugin Name: Padma Shortcode Block
Plugin URI: https://www.padmaunlimited.com/plugins/shortcode-block
Description: Padma Shortcode block, based on Shortcode block for Headway 1.0.0.2
Version: 1.0.8
Author: Padma Unlimited
Author URI: https://www.padmaunlimited.com/
License: GNU GPL v2
*/

define('SHORTCODES_BLOCK_VERSION', '1.0.8');


add_action('after_setup_theme', 'register_shortcode_block');
function register_shortcode_block() {

    if ( !class_exists('Padma') )
		return;

	require_once 'block.php';
	require_once 'block-options.php';
	
	if (!class_exists('PadmaBlockAPI') )
		return false;

	
	return padma_register_block('PadmaShortcodesBlock', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

}

// Updates
if(is_admin()){
	add_action('after_setup_theme', 'padma_shortcode_block_updates');
	function padma_shortcode_block_updates(){
		if ( ! empty ( $GLOBALS[ 'PadmaUpdater' ] ) ){
		    $GLOBALS[ 'PadmaUpdater' ]->updater('padma-shortcode-block',__DIR__);
		}
	}
}