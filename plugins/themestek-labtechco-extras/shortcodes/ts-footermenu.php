<?php
// [ts-footermenu]
if( !function_exists('themestek_sc_footermenu') ){
function themestek_sc_footermenu( $atts, $content=NULL ){
	$return = '';
	if( has_nav_menu('themestek-footer-menu') ){
		$return .= wp_nav_menu( array( 'theme_location' => 'themestek-footer-menu', 'menu_class' => 'footer-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'ts-footermenu', 'themestek_sc_footermenu' );
