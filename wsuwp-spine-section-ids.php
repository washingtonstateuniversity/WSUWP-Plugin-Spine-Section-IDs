<?php
/*
Plugin Name: WSU Spine Section IDs
Version: 0.0.1
Description: Add section IDs to the Spine Parent Theme's builder interface.
Author: washingtonstateuniversity, jeremyfelt
Author URI: https://web.wsu.edu/
Plugin URI: https://github.com/washingtonstateuniversity/WSUWP-Spine-Section-IDs
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// The core plugin class.
require dirname( __FILE__ ) . '/includes/class-wsuwp-spine-section-ids.php';

add_action( 'after_setup_theme', 'WSUWP_Spine_Section_Ids' );
/**
 * Start things up.
 *
 * @return \WSUWP_Spine_Section_Ids
 */
function WSUWP_Spine_Section_Ids() {
	return WSUWP_Spine_Section_Ids::get_instance();
}
