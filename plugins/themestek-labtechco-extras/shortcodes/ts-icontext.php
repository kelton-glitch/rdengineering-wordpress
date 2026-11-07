<?php
// [ts-icontext icon="phone"]Welcome to site[/icontext]
if( !function_exists('themestek_sc_icontext') ){
function themestek_sc_icontext( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		'icon'    => '',   // Required
		'package' => 'fa', // Optional
	), $atts ) );
	
	$return = '<span class="themestek-icontext"><i class="fa fa-'.$package.'-'.$icon.'"></i> '.do_shortcode($content).'</span>';
	return $return;
}
}
add_shortcode( 'ts-icontext', 'themestek_sc_icontext' );
