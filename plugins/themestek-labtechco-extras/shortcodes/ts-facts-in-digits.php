<?php
// [ts-facts-in-digits]
if( !function_exists('themestek_sc_facts_in_digits') ){
function themestek_sc_facts_in_digits($atts, $content=NULL ) {
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_facts_in_digits;
		$options_list = ts_create_options_list($ts_sc_params_facts_in_digits);
		
		// This global variable will be used in template file for design
		global $ts_global_fid_element_values;
		$ts_global_fid_element_values = array();
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );

		$min = TS_MIN;
		if( is_child_theme() ){
			$min = '';
		}
		$style	= ( !empty( $atts['boxstyle'] ) ) ? $atts['boxstyle'] : 'style-1' ;  // Getting box style
		wp_enqueue_style( 'ts-fid-style-'.$style, get_template_directory_uri() . '/css/fidbox/fidbox-'.$style.TS_MIN.'.css' );
		
		// Required JS files
		wp_enqueue_script( 'vc_waypoints', array( 'jquery' ) );
		
		if( in_array($boxstyle, array( 'thin-progressbar', 'strong-progressbar' ) ) ){
			wp_enqueue_script( 'jquery-circle-progress', array( 'jquery' ) );
		} else {
			wp_enqueue_script( 'numinate',  array( 'jquery' ) );
		}
		
		
		/** ICON **/
		// We are calling this to add CSS file of the selected icon.
		
		$icon_sc = '[ts-icon  type="'.$i_type.'"';
		foreach( get_defined_vars() as $key=>$val ){
			if( substr($key,0,7) == 'i_icon_' ){
				$icon_sc .= ' ' . substr($key,2) . '="' . $val . '"';
			}
		}
		$icon_sc .= ' color="skincolor" align="left"]';

		//do_shortcode('[ts-icon type="'.$i_type.'" icon_fontawesome="'.$i_icon_fontawesome.'" icon_linecons="'.$i_icon_linecons.'" icon_themify="'.$i_icon_themify.'" color="skincolor" align="left"]');
		do_shortcode( $icon_sc );
		
		
		// This is real icon code
		$icon_class   = ( !empty( ${'i_icon_'.$i_type} ) ) ? ${'i_icon_'.$i_type} : '' ;
		$icon_html = '<div class="ts-sbox-icon-wrapper"><i class="' . $icon_class . '"></i></div>';
	
		
		
		
		
		//  Before or after text
		
		$before_text = '';
		$after_text  = '';
		if( !empty($before) ){
			if( in_array($beforetextstyle, array( 'sup', 'sub', 'span' ) ) ){
				$before_text = '<'.$beforetextstyle.'>'.$before.'</'.$beforetextstyle.'>';
			}
		}
		if( !empty($after) ){
			if( in_array($aftertextstyle, array( 'sup', 'sub', 'span' ) ) ){
				$after_text = '<'.$aftertextstyle.'>'.$after.'</'.$aftertextstyle.'>';
			}
		}
		
		
		
		
		$class   = array();
		if( !empty($boxstyle) ){
			$class[] = 'ts-fidbox-'.$boxstyle;
		}
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
		
		
		
		
		// storing in global varibales to be used in template file
		$ts_global_fid_element_values['subtitle']		= $subtitle;
		$ts_global_fid_element_values['title']			= $title;
		$ts_global_fid_element_values['desc']			= $desc;
		$ts_global_fid_element_values['icon_html']		= $icon_html;
		$ts_global_fid_element_values['main-class']		= implode(' ', $class);
		$ts_global_fid_element_values['skincolor']		= themestek_get_option('skincolor');
		
		$ts_global_fid_element_values['before_text']	= $before_text;
		$ts_global_fid_element_values['beforetextstyle']= $beforetextstyle;
		
		$ts_global_fid_element_values['after_text']		= $after_text;
		$ts_global_fid_element_values['aftertextstyle']	= $aftertextstyle;
		
		$ts_global_fid_element_values['digit']			= $digit;
		$ts_global_fid_element_values['interval']		= $interval;
		//$ts_global_fid_element_values['circle']        = ($circle/100);
		
		
		//$ts_global_fid_element_values['lefticoncode']  = $lefticoncode;
		//$ts_global_fid_element_values['righticoncode'] = $righticoncode;
		//$ts_global_fid_element_values['view']          = $view;
		
		//$ts_global_fid_element_values['before']          = $before;
		//$ts_global_fid_element_values['beforetextstyle'] = $beforetextstyle;
		//$ts_global_fid_element_values['after']           = $after;
		//$ts_global_fid_element_values['aftertextstyle']  = $aftertextstyle;
		
		
		// calling template depending on the selected VIEW option
		ob_start();
		get_template_part('theme-parts/fidbox/fidbox', $boxstyle);
		$return = ob_get_contents();
		ob_end_clean();
	
	
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'ts-facts-in-digits', 'themestek_sc_facts_in_digits' );