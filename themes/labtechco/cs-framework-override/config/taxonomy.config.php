<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

if( !isset($ts_taxonomy_options) ){
	include( get_template_directory() .'/cs-framework-override/config/taxonomy-options.php' );
}

CSFramework_Taxonomy::instance( $ts_taxonomy_options );
