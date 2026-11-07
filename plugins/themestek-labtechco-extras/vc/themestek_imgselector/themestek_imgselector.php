<?php


function themestek_imgselector_settings_field( $settings, $value ) {

	$output  = '';
	$imglist = '';
	
	$css_option = str_replace( '#', 'hash-', vc_get_dropdown_option( $settings, $value ) );
	
	$output .= '<div class="ts-imgselector-main-wrapper">';
	
	// Input type hidden
	/*
	$output .= '<input type="hidden" name="' 
	           . $settings['param_name']
	           . '" class="wpb_vc_param_value wpb-input ts-main-val-input '
	           . $settings['param_name']
	           . ' ' . $settings['type'] . '" value="'.$value.'" />';
	*/
	
	$output .= '<div style="display:none;">';
	$output .= '<select name="'
	           . $settings['param_name']
	           . '" class="wpb_vc_param_value wpb-input wpb-select ts-main-val-input'
	           . $settings['param_name']
	           . ' ' . $settings['type']
	           . ' ' . $css_option
	           . '" data-option="' . $css_option . '">';
	if ( is_array( $value ) ) {
		$value = isset( $value['value'] ) ? $value['value'] : array_shift( $value );
	}
	if ( ! empty( $settings['value'] ) ) {
		foreach ( $settings['value'] as $index => $data ) {
			if ( is_numeric( $index ) && ( is_string( $data ) || is_numeric( $data ) ) ) {
				$option_label = $data;
				$option_value = $data;
			} elseif ( is_numeric( $index ) && is_array( $data ) ) {
				$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
				$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
			} else {
				$option_value = $data;
				$option_label = $index;
			}
			$selected = '';
			//$imgselected = '';
			$option_value_string = (string) $option_value;
			$value_string = (string) $value;
			
			if ( '' !== $value && $option_value_string === $value_string ) {
				$selected = ' selected="selected"';
				//$imgselected = ' ts-imgselector-thumb-selected';
			}
			$option_class = str_replace( '#', 'hash-', $option_value );
			$output .= '<option class="' . esc_attr( $option_class ) . '" value="' . esc_attr( $option_value ) . '"' . $selected . '>' . htmlspecialchars( $option_label ) . '</option>';
			
			// Thumb images
			/*
			if( !empty( $data['thumb'] ) ){
				$width = ( !empty($data['width']) ) ? 'width:'.$data['width'] : '' ;
				
				$imglist .= '
					<div style="'.$width.'" class="ts-imgselector-thumb '.$imgselected.' ts-imgselector-thumb-' . esc_attr( $option_value ) . '" data-value="' . esc_attr( $option_value ) . '" data-selector="'.$settings['param_name'].'">
						<span class="ts-imgselector-thumb-link-inner"><img src="'.$data['thumb'].'" /></span><br>
					</div>';
			}
			*/
		}
	}
	$output .= '</select>';
	$output .= '</div>';
	
	
	
	
	
	
			   

	$output .= '<div class="ts-imgselector-thumb-w vc_row">';
	
	foreach ( $settings['value'] as $index => $data ) {
		
		$selected     = '';
		$imgselected  = '';
		$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
		$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
			
		// active thumb
		if ( !empty($value) && $option_value === $value ) {
			$imgselected = ' ts-imgselector-thumb-selected';
		}
		
		// Thumb images
		if( !empty( $data['thumb'] ) ){
			$width = ( !empty($data['width']) ) ? 'width:'.$data['width'] : '' ;
			
			$output .= '
				<div style="'.$width.'" class="vc_col-sm-6 ts-imgselector-thumb '.$imgselected.' ts-imgselector-thumb-' . esc_attr( $option_value ) . '" data-value="' . esc_attr( $option_value ) . '" data-selector="'.$settings['param_name'].'">
					<div class="ts-imgselector-thumb-inner">
						<img src="'.$data['thumb'].'" /><br>
					</div>
				</div>';
		}
			
		
		
		
	}
	
	
	$output .= '</div>';
	
	$output .= '</div> <!-- .ts-imgselector-main-wrapper -->';
	
	/*
	$output .= '<select name="'
	           . $settings['param_name']
	           . '" class="wpb_vc_param_value wpb-input wpb-select '
	           . $settings['param_name']
	           . ' ' . $settings['type']
	           . ' ' . $css_option
	           . '" data-option="' . $css_option . '">';
	if ( is_array( $value ) ) {
		$value = isset( $value['value'] ) ? $value['value'] : array_shift( $value );
	}
	if ( ! empty( $settings['value'] ) ) {
		foreach ( $settings['value'] as $index => $data ) {
			if ( is_numeric( $index ) && ( is_string( $data ) || is_numeric( $data ) ) ) {
				$option_label = $data;
				$option_value = $data;
			} elseif ( is_numeric( $index ) && is_array( $data ) ) {
				$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
				$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
			} else {
				$option_value = $data;
				$option_label = $index;
			}
			$selected = '';
			$imgselected = '';
			$option_value_string = (string) $option_value;
			$value_string = (string) $value;
			if ( '' !== $value && $option_value_string === $value_string ) {
				$selected = ' selected="selected"';
				$imgselected = ' ts-imgselector-thumb-selected';
			}
			$option_class = str_replace( '#', 'hash-', $option_value );
			$output .= '<option class="' . esc_attr( $option_class ) . '" value="' . esc_attr( $option_value ) . '"' . $selected . '>' . htmlspecialchars( $option_label ) . '</option>';
			
			// Thumb images
			if( !empty( $data['thumb'] ) ){
				$width = ( !empty($data['width']) ) ? 'width:'.$data['width'] : '' ;
				
				//$imglist .= '<div class="ts-imgselector-thumb-link-w">';
				$imglist .= '
					<div style="'.$width.'" class="ts-imgselector-thumb '.$imgselected.' ts-imgselector-thumb-' . esc_attr( $option_value ) . '" data-value="' . esc_attr( $option_value ) . '" data-selector="'.$settings['param_name'].'">
						<span class="ts-imgselector-thumb-link-inner"><img src="'.$data['thumb'].'" /></span><br>
						<!--<span class="ts-imgselector-thumb-title">
							<span class="ts-imgselector-thumb-title-inner">'.htmlspecialchars( $option_label ).'</span>
						</span>-->
					</div>';
				//$imglist .= '</div>';
			}
				
			
			
			
		}
	}
	$output .= '</select>';
	*/
	
	
	
	
	// Thumb images
	/*
	if( !empty($imglist) ){
		$output .= '<div class="ts-imgselector-thumb-wrapper">';
		$output .= '<div class="ts-imgselector-thumbs-heading">'.esc_attr__('PREVIEW','labtechco').':</div>';
		$output .= $imglist;
		$output .= '<div class="clear clr"></div> </div>';
	}
	*/
	
	
	return $output;
	
	
}
vc_add_shortcode_param( 'themestek_imgselector', 'themestek_imgselector_settings_field', THEMESTEK_LABTECHCO_URI . '/vc/themestek_imgselector/themestek_imgselector.js' );




