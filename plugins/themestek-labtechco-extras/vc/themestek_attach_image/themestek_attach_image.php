<?php


function themestek_attach_image_settings_field( $settings, $value, $tag, $single = true  ) {
	$output = '';
	
	$val_array = explode('|', $value);
	
	$full_img  = ( isset($val_array[0]) ) ? $val_array[0] : '' ;
	$thumb_img = ( isset($val_array[1]) ) ? $val_array[1] : '' ;
	$img_id    = ( isset($val_array[2]) ) ? $val_array[2] : '' ;
	
	$noimg_class = ( empty($thumb_img) ) ? 'hidden' : '' ;
	
	$output .= '<div class="ts_image_selector_w">';
	$output .= '<input type="hidden" class="wpb_vc_param_value ts_gallery_widget_attached_image_val '
	           . $settings['param_name'] . ' '
	           . $settings['type'] . '" name="' . $settings['param_name'] . '" value="' . $value . '"/>';
	$output .= '<div class="gallery_widget_attached_images '.$noimg_class.'">';
	
	
	$output .= '<ul class="gallery_widget_attached_images_list">';
	$output .= '<li><div class="ts_inner"><img src="'.$thumb_img.'" /> <a href="#" class="ts_vc_icon-remove"><i class="vc-composer-icon vc-c-icon-close"></i></a> </div></li>';
	$output .= '</ul>';
	
	
	$output .= '</div>';
	$output .= '<div class="gallery_widget_site_images">';
	$output .= '</div>';
	if ( true === $single ) {
		$output .= '<a class="ts_gallery_widget_add_images" href="#" use-single="true" title="'
		           . esc_attr__( 'Add image', 'js_composer' ) . '"><i class="vc-composer-icon vc-c-icon-add"></i>' . esc_attr__( 'Add image', 'js_composer' ) . '</a>'; //class: button
	} else {
		$output .= '<a class="ts_gallery_widget_add_images" href="#" title="'
		           . esc_attr__( 'Add images', 'js_composer' ) . '"><i class="vc-composer-icon vc-c-icon-add"></i>' . esc_attr__( 'Add images', 'js_composer' ) . '</a>'; //class: button
	}
	
	$output .= '</div> <!-- .ts_image_selector_w --> ';
	
	return $output;
	
}
vc_add_shortcode_param( 'themestek_attach_image', 'themestek_attach_image_settings_field', THEMESTEK_LABTECHCO_URI . '/vc/themestek_attach_image/themestek_attach_image.js' );




