<?php
/**
 * Enqueue scripts and styles for the ADMIN section.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if( !function_exists('labtechco_wp_admin_scripts_styles') ){
function labtechco_wp_admin_scripts_styles() {
	
	/* Core files of the theme */
	wp_enqueue_style( 'ts-admin-css', get_template_directory_uri() . '/includes/admin.css', false, '1.0.0' );
	wp_enqueue_script( 'ts-admin-js', get_template_directory_uri() . '/includes/admin.js', array( 'jquery' ) );
	
	// Sticky Kit library
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/includes/libraries/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) );
	
}
}
add_action( 'admin_enqueue_scripts', 'labtechco_wp_admin_scripts_styles' );


