<?php
// [ts-servicebox]
if( !function_exists('themestek_sc_pricelitsbox') ){
function themestek_sc_pricelitsbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_vc_custom_element_pricelistbox;
		$options_list = ts_create_options_list($ts_vc_custom_element_pricelistbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		
		$return = $class = $iconcodeleft = $iconcoderight = '';
		
		// If hover effect is enabled
		if( $hover!='' && $hover!='none' ){
			wp_enqueue_style('hover');
		}
		
		
		
		// Icon Position changes
		$add_icon_new = $add_icon;
		$add_icon = 'top'; // by default, icon will be at top
		if( $add_icon_new=='bottom-center' ){
			$add_icon = 'bottom';
		}
		if( $add_icon_new=='left-spacing' ){
			$add_icon = 'left';
		}
		if( $add_icon_new=='right-spacing' ){
			$add_icon = 'right';
		}
		if( $add_icon_new=='before-heading' ){
			$add_icon = 'beforeheading';
		}
		if( $add_icon_new=='after-heading' ){
			$add_icon = 'afterheading';
		}
		
		
		
		
		
		// Service Box class structure
		$ts_sbox_class = array();
		$ts_sbox_class[] = 'ts-sbox';
		$ts_sbox_class[] = 'ts-sbox-iconalign-'.$add_icon_new;
		$ts_sbox_class[] = $hover;
		$ts_sbox_class[] = 'ts-sbox-bgcolor-' . $bgcolor . ' ts-bgcolor-' . $bgcolor;  // BG Color
		$ts_sbox_class[] = 'ts-sbox-textcolor-' . $textcolor . ' ts-textcolor-' . $textcolor;  // Text Color
		
		// icon size
		if( !empty($i_size) ){
			$ts_sbox_class[] = 	'ts-sbox-isize-' . $i_size;  // Icon size
		}
		
		// icon size
		if( !empty($i_size) ){
			$ts_sbox_class[] = 	'ts-sbox-isize-' . $i_size;  // Icon size
		}
		
		// icon background style
		if( !empty($i_background_style) ){
			$ts_sbox_class[] = 'ts-sbox-istyle-'.$i_background_style;
		}
		
		// Custom div and classes for overlay color if bgimage is set from design options tab
		$ts_smbox_custom_div = '';
		$ts_bgimage			 = false;
		$cssclass 			 = ts_vc_shortcode_custom_css_class($css);
		$ts_sbox_class[] 	 = $cssclass;
		
		// box effect
		if( !empty($box_effect) ){
			$ts_sbox_class[] = 'ts-sbox-effect-'.$box_effect;
		}
		
		// Check if bg image is set
		if( strpos($css, 'url(') !== false ){
			$ts_bgimage		 = true;
			$ts_sbox_class[] = 'ts-bg';
			$ts_sbox_class[] = 'ts-bgimage-yes';
			$ts_smbox_custom_div .= '<div class="ts-sbox-bgimage-layer ts-bgimage-layer"></div>';	
		}
		
		// Check if BG color set
		if( themestek_check_if_bg_color_in_css($css)==true || ( !empty($bgcolor) && $bgcolor!='transparent' ) ){
			$ts_sbox_class[] = 'ts-bgcolor-yes';
		}
		
		// Hower effect for background image
		if( !empty($hover_bg_effect) ){
			$ts_sbox_class[] = 'ts-sbox-bghover-' . sanitize_html_class($hover_bg_effect);
			//$ts_smbox_custom_div .= '<div class="ts-sbox-bgimage-layer ts-bgimage-layer"></div>';	
		}
		
		// Hover bg effect rotate
		if( $hover_bg_rotate=='yes' ){
			$ts_sbox_class[] = 'ts-sbox-hover-bgrotate-true';
		}
		
		// Hover bg effect blur
		if( $hover_bg_blur=='yes' ){
			$ts_sbox_class[] = 'ts-sbox-hover-bgblur-true';
		}
		
		
		
		
		if( $ts_bgimage == true ){
			$ts_smbox_custom_div .= '<div class="ts-sbox-wrapper-bg-layer ts-bg-layer"></div>';	
		}
		
		
		
		
		if( !empty($h2) && empty($h4) ){
			$ts_sbox_class[] = 'ts-sbox-heading-only';
		} else if( empty($h2) && !empty($h4) ){
			$ts_sbox_class[] = 'ts-sbox-subheading-only';
		} else if( !empty($h2) && !empty($h4) ){
			$ts_sbox_class[] = 'ts-sbox-both-headings';
		}
		
		// Custom Class
		if ( ! empty( $el_class ) ) {
			$ts_sbox_class[] = trim($el_class);
		}
		
		// CSS Animation
		if ( ! empty( $css_animation ) ) {
			$ts_sbox_class[] = ts_getCSSAnimation( $css_animation );
		}
		
		
		// Button align same as text align
		$options_list['btn_align'] = $add_icon_new;
		/*$btn_align                 = '';
		if( $txt_align!='justify' && $txt_align!='' ){
			$btn_align = $txt_align;
		}*/
		
		
		
		// Generating CTA shortcode
		$ctaShortcode = '[ts-cta servicebox="true" ';
		
		if( !isset($options_list['add_button']) || empty($options_list['add_button']) ){
			$ctaShortcode .= 'add_button="no" ';
		}
		
		foreach( $options_list as $key=>$val ){
			if( isset(${$key}) && trim( ${$key} )!='' && $key!='i_on_border' && $key!='el_class' && $key!='css' ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		if( !empty($ts_i_on_border) ){
			$ctaShortcode .= $ts_i_on_border;  // icon on border
		}
		$ctaShortcode .= ' i_css_animation="" css_animation=""]'.$content.'[/ts-cta]';
		
		$return = do_shortcode($ctaShortcode);
		
		
		// Wrapping custom class to slyle
		$return = '<div class="' . themestek_sanitize_html_classes( implode(' ',$ts_sbox_class) ) . '">'. $ts_smbox_custom_div . $return .'</div>';
		
		/* Added by ThemeStek - code start */
		$customStyle = '';
		if(trim($css)!= ''){
			
			/*
			$customStyle 	    .= '<div><style type="text/css">';
			
			// Remove BG image from main DIV
			$customStyle .= '.' . vc_shortcode_custom_css_class( $css, '' ) . '{background-image:none !important;}';
			
			// BG color layer
			$customStyle .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .ts-bg-layer{' . themestek_bg_only_from_css($css) . 'background-image: none !important;}';
			
			// BG image DIV for bg-hover effect
			$customStyle .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .ts-bgimage-layer{' . themestek_bg_only_from_css($css) . '}';
			
			$customStyle 		.= '</style></div>';
			
			$return .= trim($customStyle); // We are not sanitize this because we are expecting css and html both content
			*/
			
			/******************************************/
			// Inline css
			global $themestek_inline_css;
			if( empty($themestek_inline_css) ){
				$themestek_inline_css = '';
			}
			// Remove BG image from main DIV
			$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . '{background-image:none !important;}';
			// BG color layer
			$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .ts-bg-layer{' . themestek_bg_only_from_css($css) . 'background-image: none !important;}';
			// BG image DIV for bg-hover effect
			$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .ts-bgimage-layer{' . themestek_bg_only_from_css($css) . '}';
			/******************************************/
			
			
			
		}
		/* Added by ThemeStek - code end */
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	
	return $return;
}
}
add_shortcode( 'ts-pricelistbox', 'themestek_sc_pricelitsbox' );



if( !function_exists('themestek_bg_only_from_css') ){
function themestek_bg_only_from_css( $css ){
	// Check if '{' charactor exists
	if( strpos($css,'{' )!=false ){
		$css = substr($css, strpos($css,'{' )+1 ); // returns "d"
		$css = str_replace('}','', $css );
		$new_css_array = explode(';',$css);
		$bgonly_css = '';
		foreach( $new_css_array as $css_line ){
			if( substr($css_line,0,10)=='background' ){
				$bgonly_css .= $css_line.';';
			}
		}
	}
	return $bgonly_css;
}
}



if( !function_exists('themestek_check_if_bg_color_in_css') ){
function themestek_check_if_bg_color_in_css( $css ){
	$return = false;
	
	// Check if '{' charactor exists
	if( strpos($css,'{' )!=false ){
		$css = substr($css, strpos($css,'{' )+1 ); // returns "d"
		$css = str_replace('}','', $css );
		$new_css_array = explode(';',$css);
		foreach( $new_css_array as $css_line ){
			if( substr($css_line,0,11)=='background:' ){
				$css_line = explode(' ',$css_line);
				foreach($css_line as $line){
					if( substr($line,0,5)=='rgba(' || substr($line,0,5)=='#' ){
						$return = true;
					}
				}
			}
		}
	}
	
	return $return;
}
}