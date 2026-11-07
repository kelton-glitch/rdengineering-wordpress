<?php
// [ts-topbar-left-menu]
if( !function_exists('themestek_sc_topbarleftsenu') ){
function themestek_sc_topbarleftsenu( $atts, $content=NULL ){
	$return = '';
	if( has_nav_menu('themestek-topbar-left-menu') ){
		$return .= wp_nav_menu( array( 'theme_location' => 'themestek-topbar-left-menu', 'menu_class' => 'topbar-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'ts-topbar-left-menu', 'themestek_sc_topbarleftsenu' );