<?php
// [ts-topbar-right-menu]
if( !function_exists('themestek_sc_topbarrightsenu') ){
function themestek_sc_topbarrightsenu( $atts, $content=NULL ){
	$return = '';
	if( has_nav_menu('themestek-topbar-right-menu') ){
		$return .= wp_nav_menu( array( 'theme_location' => 'themestek-topbar-right-menu', 'menu_class' => 'topbar-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'ts-topbar-right-menu', 'themestek_sc_topbarrightsenu' );