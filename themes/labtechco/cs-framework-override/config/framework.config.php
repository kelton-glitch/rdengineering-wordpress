<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

if( !isset($ts_framework_settings) || !isset($ts_framework_options) ){
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
}

CSFramework::instance( $ts_framework_settings, $ts_framework_options );
