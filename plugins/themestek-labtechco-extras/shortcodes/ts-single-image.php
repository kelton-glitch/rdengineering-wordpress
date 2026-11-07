<?php
// [ts-single-image]
if( !function_exists('themestek_sc_single_image') ){
function themestek_sc_single_image( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_single_image;
		$options_list = ts_create_options_list($ts_sc_params_single_image);
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		// extracting thumb image, full image and image id
		$image_array = explode('|', $image );
		
		$full_img  = ( isset($image_array[0]) ) ? $image_array[0] : '' ;
		$thumb_img = ( isset($image_array[1]) ) ? $image_array[1] : '' ;
		$img_id    = ( isset($image_array[2]) ) ? $image_array[2] : '' ;

		$alignment = (!empty($alignment)) ? $alignment : 'left' ;
		

		
		$return .= '<div class="ts-single-image-wrapper ts_align_' . esc_attr($alignment) . ' ' . esc_attr($el_class) . '">';
		if( !empty($title) ){
			$return .= '<h2 class="ts-single-image-title">'.$title.'</h2>';
		}
		if( !empty($full_img) ){
			$return .= '<div class="ts-single-image-img-w"><img src="' . $full_img . '" class="ts-single-image-img" alt="" /></div>';
		}
		$return .= '</div>';
		
		
		
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;
}
}
add_shortcode( 'ts-single-image', 'themestek_sc_single_image' );