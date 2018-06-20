<?php 

/**
 *
 * Plugin Name: MPF Post Notice
 * Plugin URI:	https://htmlfivedev.com 
 * Description: Display a short notice above the post content.
 * Version: 	1.0
 * Author URI: 	https://www.linkedin.com/in/ahmedmusawir
 * License: 	GPL-2.0+ 
 *
 */


//If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die("Cannot Access Directly");
}

define( "POST_NOTICE_MPF_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );


require_once( plugin_dir_path( __FILE__ ) . 'class-post-notice-mpf-display.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-post-notice-mpf-editor.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-post-notice-mpf.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );


// INSTANTIATE CLASSES

	//Enqueue Styles & Scripts
	$setup_styles = new PostNoticeMPFEnqueue();
	$setup_styles->initialize();


	if ( is_admin() ) {
		// Post Notice Editor Class 
		$post_editor = new PostNoticeMPFEditor();
		//Calling Plugin Main Class 
		$post_notice = new PostNoticeMPF( $post_editor );
	} else {
		// Post Notice Display Class 
		$post_notice = new PostNoticeMPFDisplay();
	}

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'PostNoticeMPFActivate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_deactivation_hook( __FILE__, array( 'PostNoticeMPFDeactivate', 'deactivate' ) );