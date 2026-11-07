<?php
// [ts-wpml-language-switcher]
if( !function_exists('themestek_sc_wpml_language_switcher') ){
function themestek_sc_wpml_language_switcher( $atts ) {
	$return = '';
	if( function_exists('icl_get_languages') ){
		ob_start();
		do_action('icl_language_selector');
		$langDropdown = ob_get_clean();
		$return .= '<div class="ts-wpml-lang-switcher">'.$langDropdown.'</div>';
	}
	return $return;
}
}
add_shortcode( 'ts-wpml-language-switcher', 'themestek_sc_wpml_language_switcher' );