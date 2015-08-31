<?php
/*
Plugin Name: Cornerstone Library: Color Accordion
Plugin URI:  http://cornerstonelibrary.com/
Description: Duplicate of the base Accordion, with added features: color picker, extra content in title
Version:     0.1
Author:      BigWilliam
Author URI:  http://bigwilliam.com
Author Email: hello@bigwilliam.com
Text Domain: __x__
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/
function csl_color_accordion_scripts() {
	// wp_enqueue_script( 'csl-color-accordion-script', plugins_url('/assets/js/custom.js', __FILE__ ), array('jquery'), null, true );
	wp_enqueue_style('csl-color-accordion-styles', plugins_url('/assets/css/custom.css', __FILE__ ), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'csl_color_accordion_scripts', 100 );


/*
 * => Load Shortcodes
 * ---------------------------------------------------------------------------*/
require_once('includes/shortcodes.php');


/*
 * => ADD CUSTOM ELEMENTS TO CORNERSTONE
 * ---------------------------------------------------------------------------*/
function csl_color_accordion() {
	require_once( 'includes/color-accordion.php' );
	require_once( 'includes/color-accordion-item.php' );
  cornerstone_add_element( 'CSL_Color_Accordion' );
  cornerstone_add_element( 'CSL_Color_Accordion_Item' );
}
add_action( 'cornerstone_load_elements', 'csl_color_accordion' );
