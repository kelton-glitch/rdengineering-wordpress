<?php
// [ts-skincolor]This text will be in skin color[/ts-skincolor]
if( !function_exists('themestek_sc_skincolor') ){
function themestek_sc_skincolor( $atts, $content=NULL ) {
	return '<span class="themestek-skincolor ts-skincolor">'.$content.'</span>';
}
}
add_shortcode( 'ts-skincolor', 'themestek_sc_skincolor' );