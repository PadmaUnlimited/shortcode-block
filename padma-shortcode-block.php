<?php
/*
Plugin Name: Padma Shortcode Block
Plugin URI: https://www.padmaunlimited.com/plugins/shortcode-block
Description: Padma Shortcode block, based on Shortcode block for Headway 1.0.0.2
Version: 1.0.11
Author: Padma Unlimited
Author URI: https://www.padmaunlimited.com/
License: GNU GPL v2
*/

add_action('after_setup_theme', 'register_shortcode_block');
function register_shortcode_block() {

    if ( !class_exists('Padma') )
		return;

	require_once 'block.php';
	require_once 'block-options.php';
	
	if (!class_exists('PadmaBlockAPI') )
		return false;

	$class = 'PadmaShortcodesBlock';
	$block_type_url = substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1);		
	$class_file = __DIR__ . '/block.php';
	$icons = array(
			'path' => __DIR__,
			'url' => $block_type_url
		);

	return padma_register_block(
		$class,
		$block_type_url,
		$class_file,
		$icons
	);

}
