<?php
// [ts-site-tagline]
if( !function_exists('themestek_sc_site_tagline') ){
function themestek_sc_site_tagline( $atts, $content=NULL ){
	return get_bloginfo('description');
}
}
add_shortcode( 'ts-site-tagline', 'themestek_sc_site_tagline' );