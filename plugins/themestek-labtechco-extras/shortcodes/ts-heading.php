<?php
// [ts-heading tag="h1" text="This is heading text"]
if( !function_exists('themestek_sc_heading') ){
function themestek_sc_heading( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_heading;
		$options_list = ts_create_options_list($ts_sc_params_heading);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// Getting a unique class name applied by the Custom CSS box (via "css_editor") and also custom class name via "el_class".
		$css_class = '';
		if( !empty($css) ){
			$css_class = vc_shortcode_custom_css_class( $css, ' ' );
		}
		
		
		// CSS Animation
		if( ! empty( $css_animation ) ) {
			$css_class .= ' ' . ts_getCSSAnimation( $css_animation );
		}
		
		
		// Custom Class
		if( ! empty( $el_class ) ) {
			$css_class .= ' ' . esc_attr($el_class);
		}
		
		
		
		$ctaShortcode = '[ts-cta';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!=''  ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= ' add_button="no" i_css_animation="" css="" css_animation=""]'.$content.'[/ts-cta]';

		
		$cta = do_shortcode($ctaShortcode);
	
		// Changing header order if reverser order
		/*if($reverse_heading == 'true' && $h4 != ''){
			$cta = themestek_change_heading_order($cta);
		}*/
		
		$return .= '<div class="ts-element-heading-wrapper ts-heading-inner ts-element-align-'.$txt_align.' ts-seperator-'.$seperator.' '.$css_class.'">';
		$return .= $cta;
		$return .= '</div> <!-- .ts-element-heading-wrapper container --> ';
		
		
		
		/******************************************/
		// Inline css
		global $themestek_inline_css;
		if( empty($themestek_inline_css) ){
			$themestek_inline_css = '';
		}
		if( !empty($css) ){
			$themestek_inline_css .= $css; // Custom CSS style like padding, margin etc.
		}
		
		/******************************************/
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	
	return $return;
}
}
add_shortcode( 'ts-heading', 'themestek_sc_heading' );