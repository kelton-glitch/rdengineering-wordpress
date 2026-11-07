<?php
// [ts-contactbox]
if( !function_exists('themestek_sc_contactbox') ){
function themestek_sc_contactbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_contactbox;
		$options_list = ts_create_options_list($ts_sc_params_contactbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		$class = array( 'labtechco_contact_widget_wrapper', 'themestek_vc_contact_wrapper' );
		
		
		// CSS Animation
		if ( !empty( $css_animation ) ) {
			$class[] = ts_getCSSAnimation( $css_animation );
		}
		
		// Extra Class
		if( !empty($el_class) ){
			$class[] = $el_class;
		}
		
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = ts_vc_shortcode_custom_css_class( $css );
		}
		$class = implode(' ', $class );

		if(!empty($phone) || (!empty($email)) || (!empty($website)) || (!empty($address)) || (!empty($time)) ){

		$return = '<ul class="' . $class . '">';
		if( trim($phone)!='' ) {
			$return .= '<li class="themestek-contact-phonenumber ts-labtechco-icon-mobile">'.esc_attr($phone).'</li>';
		}
		if( trim($email)!='' ) {
			$return .= '<li class="themestek-contact-email ts-labtechco-icon-comment-1"><a href="mailto:'.trim($email).'">'.trim($email).'</a></li>';
		}
		if( trim($website)!='' ) {
			$return .= '<li class="themestek-contact-website ts-labtechco-icon-world"><a href="'.esc_url(themestek_addhttp($website)).'">'.esc_url($website).'</a></li>';
		}
		if( trim($address)!='' ) {
			$return .= '<li class="themestek-contact-address  ts-labtechco-icon-location-pin">' . themestek_wp_kses($address) . '</li>';
		}
		if( trim($time)!='' ) {
			$return .= '<li class="themestek-contact-time ts-labtechco-icon-clock">' . themestek_wp_kses($time) . '</li>';
		}
		$return .= '</ul>';
		
		} else {
			$return .= '<div class="data-fill-message">' . esc_attr__('Please Fill the conatct details', 'labtechco') . '</div>';
		}
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'ts-contactbox', 'themestek_sc_contactbox' );