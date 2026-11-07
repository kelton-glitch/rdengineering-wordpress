<?php
// [ts-iconheadingbox]
if( !function_exists('themestek_sc_iconheadingbox') ){
function themestek_sc_iconheadingbox( $atts, $content=NULL ){
	
	$return = '';
	$hover_image_html = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_iconheadingbox;
		$options_list = ts_create_options_list($ts_sc_params_iconheadingbox);
		
		// This global variable will be used in template file for design
		global $ts_global_sbox_element_values;
		$ts_global_sbox_element_values = array();
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		$min = TS_MIN;
		if( is_child_theme() ){
			$min = '';
		}
	
		$style	= ( !empty( $atts['boxstyle'] ) ) ? $atts['boxstyle'] : 'style-1' ;  // Getting box style
		wp_enqueue_style( 'ts-iconheadingbox-style-'.$style, get_template_directory_uri() . '/css/iconheadingbox/iconheadingbox-'.$style.TS_MIN.'.css' );

		$icon_image = 'This is image';
		
		/** ICON **/
		$icon_type_class = '';
		if( !empty($icon_type) && $icon_type=='image' ){ // image as icon
			$image_html = '';
			if( !empty($image) ){
				$img = wp_get_attachment_image_src( $image, 'full' );

				if( !empty($img) && !empty($img[0]) ){
					$image_html = '<img class="ts-ihbox-icon-image" src="' . esc_url($img[0]). '" alt="'.esc_attr($h2).'" />';
				}

				if( !empty($image_hover) ){
					$img_hover = wp_get_attachment_image_src( $image_hover, 'full' );
					if( !empty($img_hover) && !empty($img_hover[0]) ){
						$hover_image_html = 'ts-ihbox-icon-image-hover-yes';
						$image_html .= '<div class="ts-ihbox-icon-image-hover-div"><img class="ts-ihbox-icon-image-hover" src="' . esc_url($img_hover[0]). '" alt="'.esc_attr($h2).'" /></div>';
					}
				}

			}
			$icon_html = '<div class="ts-ihbox-icon-wrapper ts-ihbox-icon-type-image">'.$image_html.'</div>';
			$icon_type_class = 'image';
		} else if( !empty($icon_type) && $icon_type=='text' ){
			$icon_html = '<div class="ts-ihbox-icon-wrapper ts-ihbox-icon-type-text" data-text="' . $small_text . '">'.$small_text.'</div>';
			$icon_type_class = 'text';
		} else if( !empty($icon_type) && $icon_type=='none' ){
			$icon_html = '';
			$icon_type_class = 'none';
		} else {
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
			$icon_html = '<div class="ts-ihbox-icon-wrapper"><i class="' . $icon_class . '"></i></div>';
			$icon_type_class = 'icon';
		}
		
		
		
		
		/** HEADING AND SUBHEADING ***/
		//$add_button_sc = ( !empty($show_btn) && $show_btn=='yes' ) ? 'add_button="bottom" btn_style="text"' : 'add_button="no"' ;
		
		$ctaShortcode = '[ts-cta';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!=''  ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= ' add_button="no" i_css_animation="" css="" css_animation=""] [/ts-cta]';
		$heading_html = do_shortcode($ctaShortcode);

		/** CONTENT **/
		$content_html = ( !empty($content) ) ? '<div class="ts-cta3-content-wrapper">'.$content.'</div>' : '' ;
		
		/** BUTTON **/
		$button_html = '';
		if( $show_btn=='yes' ){
			$btnShortcode = '[ts-btn';
			foreach( $options_list as $key=>$val ){
				if( trim( ${$key} )!='' && substr( $key, 0, 4 ) == 'btn_' && $key!='btn_style' ){
					$btnShortcode .= ' '.substr( $key, 4 ).'="'.${$key}.'"';
				}
			}
			$btnShortcode .= ' style="text" add_icon="true" i_icon_themify="themifyicon ti-arrow-circle-right"]';
			$button_html = do_shortcode($btnShortcode);
		}
		
		
		// BigNumber
		$bignumber_html = '';
		if( !empty($big_number_text) ){
			$bignumber_html = '<div class="ts-ihbox-big-number-text">' . $big_number_text . '</div>';
		}
		
		
		
		// storing in global varibales to be used in template file
		$ts_global_sbox_element_values['boxstyle']		= $boxstyle;
		$ts_global_sbox_element_values['icon_html']		= $icon_html;
		$ts_global_sbox_element_values['image']		    = $image;
		$ts_global_sbox_element_values['heading_html']	= $heading_html;
		$ts_global_sbox_element_values['content_html']	= $content_html;
		$ts_global_sbox_element_values['button_html']	= $button_html;
		$ts_global_sbox_element_values['bignumber_html']	= $bignumber_html;
		$ts_global_sbox_element_values['main-class']	= 'ts-ihbox-itype-'.$icon_type_class; // Extra field

		if( !empty($hover_image_html) ){
			$ts_global_sbox_element_values['main-class'] = $ts_global_sbox_element_values['main-class'] . ' ' . $hover_image_html;
		}
		
		
		// Extra Class
		if( !empty($el_class) ){
			$ts_global_sbox_element_values['main-class'] .= ' '.esc_attr($el_class);
		}
		
		// Custom Class
		if( function_exists('vc_shortcode_custom_css_class') && !empty($css) ){
			$ts_global_sbox_element_values['main-class'] .= ' ' . vc_shortcode_custom_css_class( $css );
		}
		
		// ThemeStek Reponsive padding/margin option
		if( function_exists('ts_responsive_padding_margin_class') ){
			$ts_global_sbox_element_values['main-class'] .= ' ' . ts_responsive_padding_margin_class( $ts_responsive_css );
		}
		
		// ThemeStek Reponsive padding/margin option - custom css code
		if( !empty($ts_responsive_css) ){
			global $themestek_inline_css;
			if( empty($themestek_inline_css) ){
				$themestek_inline_css = '';
			}
			$themestek_inline_css .= ts_responsive_padding_margin( $ts_responsive_css, '.ts-ihbox' );
		}
		
		
		
		
		/******************************************/
		if( function_exists('vc_shortcode_custom_css_class') && !empty($css) ){
			
			// Inline css
			global $themestek_inline_css;
			if( empty($themestek_inline_css) ){
				$themestek_inline_css = '';
			}
			// Remove BG image from main DIV
			//$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . '{background-image:none !important;}';
			// BG color layer
			$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .ts-bg-layer{' . themestek_bg_only_from_css($css) . 'background-image: none !important;}';
			// BG image DIV for bg-hover effect
			$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .ts-bgimage-layer{' . themestek_bg_only_from_css($css) . '}';
			// Removing padding and margin from ts-sbox div
			//$themestek_inline_css .= '.wpb_wrapper > .' . vc_shortcode_custom_css_class( $css, '' ) . '{padding:0 !important; margin:0 !important; border:none !important;}';

			
			
			// Applying custom CSS to inner layer too
			$new_bgimage_element2 = vc_shortcode_custom_css_class( $css, '' ). ' > .ts-vc_cta3-container';
			$newCSS2   			  = str_replace( vc_shortcode_custom_css_class( $css, '' ), $new_bgimage_element2, $css );
			$themestek_inline_css    .= str_replace( '}', 'background-image:none !important;}', $newCSS2 );
			
		}
		
		/******************************************/
		
		
		
		
		// calling template depending on the selected VIEW option
		ob_start();
		get_template_part('theme-parts/iconheadingbox/iconheadingbox', $boxstyle);
		$return = ob_get_contents();
		ob_end_clean();
	
		
		
		
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	
	return $return;
}
}
add_shortcode( 'ts-iconheadingbox', 'themestek_sc_iconheadingbox' );



if( !function_exists('themestek_bg_only_from_css') ){
function themestek_bg_only_from_css( $css ){
	$bgonly_css = '';
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