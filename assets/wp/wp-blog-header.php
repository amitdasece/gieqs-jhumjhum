<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( ! isset( $wp_did_header ) ) {

	$wp_did_header = true;
	//echo "kjeregvt";
	// Load the WordPress library.
	//var_dump(__DIR__);
	require(BASE_URI . '/assets/wp/wp-load.php');
	
	//require_once __DIR__ . '/wp-load.php';

	// Set up the WordPress query.
	//wp();

	// Load the theme template.
	require_once ABSPATH . WPINC . '/template-loader.php';

}
