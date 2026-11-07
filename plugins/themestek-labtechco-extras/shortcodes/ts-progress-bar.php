<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// [ts-progress-bar]
if( !function_exists('themestek_sc_progress_bar') ){
function themestek_sc_progress_bar( $atts, $content=NULL ) {

	$return = '';
	
	if( function_exists('vc_map') ){

		
		global $ts_sc_params_progressbar;
		$options_list   = ts_create_options_list($ts_sc_params_progressbar);
		
		extract( shortcode_atts( 
			$options_list
		, $atts ) );
		
		$return = '';
		
		// Required JS files
		wp_enqueue_script( 'vc_waypoints', array( 'jquery' ) );
		
		
		wp_enqueue_script( 'vc_waypoints' );

		//$el_class = '';
		//$el_class = $this->getExtraClass( $el_class );
		$css_class = 'themestek-progress-bar vc_progress_bar wpb_content_element vc_progress-bar-color-' . $bgcolor;

		
		// Extra Class
		if( !empty($el_class) ){
			$css_class .= ' ' . $el_class;
		}
		
		// CSS Options class
		if( function_exists('ts_vc_shortcode_custom_css_class') ){
			$custom_css_class = ts_vc_shortcode_custom_css_class($css);
			if( !empty($custom_css_class) ){
				$css_class .= ' ' . $custom_css_class;
			}
		}
		
		
		
		$bar_options = array();
		$options = explode( ',', $options );
		if ( in_array( 'animated', $options ) ) {
			$bar_options[] = 'animated';
		}
		if ( in_array( 'striped', $options ) ) {
			$bar_options[] = 'striped';
		}

		/*if ( 'custom' === $bgcolor && '' !== $custombgcolor ) {
			$custombgcolor = ' style="' . vc_get_css_color( 'background-color', $custombgcolor ) . '"';
			if ( '' !== $customtxtcolor ) {
				$customtxtcolor = ' style="' . vc_get_css_color( 'color', $customtxtcolor ) . '"';
			}
			$bgcolor = '';
		} else {*/
			$custombgcolor  = '';
			$customtxtcolor = '';
			$bgcolor_class  = 'vc_progress-bar-color-' . esc_attr( $bgcolor );
			$css_class     .= ' ' . $bgcolor_class;
		/*}*/
		
		
		$class_to_filter = 'vc_progress_bar wpb_content_element';
		//$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
		//$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
		//$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

		//$return = '<div class="' . esc_attr( $css_class ) . '">';

		//$return .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_progress_bar_heading' ) );

		
		
		
		

		$values = (array) vc_param_group_parse_atts( $values );
		$max_value = 0.0;
		$graph_lines_data = array();
		foreach ( $values as $data ) {
			$new_line = $data;
			$new_line['value']    = isset( $data['value'] ) ? $data['value'] : 0;
			$new_line['label']    = isset( $data['label'] ) ? $data['label'] : '';
			$new_line['bgcolor']  = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $custombgcolor;
			$new_line['txtcolor'] = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $customtxtcolor;
			if ( isset( $data['customcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
				$new_line['bgcolor'] = ' style="background-color: ' . esc_attr( $data['customcolor'] ) . ';"';
			}
			if ( isset( $data['customtxtcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
				$new_line['txtcolor'] = ' style="color: ' . esc_attr( $data['customtxtcolor'] ) . ';"';
			}

			if ( $max_value < (float) $new_line['value'] ) {
				$max_value = $new_line['value'];
			}
			$graph_lines_data[] = $new_line;
		}

		/*foreach ( $graph_lines_data as $line ) {
			$unit = ( '' !== $units ) ? ' <span class="ts-vc_label_units vc_label_units">' . $line['value'] . $units . '</span>' : '';
			$return .= '<div class="vc_general vc_single_bar' . ( ( isset( $line['color'] ) && 'custom' !== $line['color'] ) ?
					' vc_progress-bar-color-' . $line['color'] : '' )
				. '">';
			$return .= '<small class="vc_label"' . $line['txtcolor'] . '>' . $line['label'] . '</small>';
			if ( $max_value > 100.00 ) {
				$percentage_value = (float) $line['value'] > 0 && $max_value > 100.00 ? round( (float) $line['value'] / $max_value * 100, 4 ) : 0;
			} else {
				$percentage_value = $line['value'];
			}
			$return .= '<span class="vc_bar ' . esc_attr( implode( ' ', $bar_options ) ) . '" data-percentage-value="' . esc_attr( $percentage_value ) . '" data-value="' . esc_attr( $line['value'] ) . '"' . $line['bgcolor'] . '>' . $unit . '</span>';
			$return .= '</div>';
		}*/

		//$return .= '</div>';
		
		/* *********************************************************************** */
		
		

		$return .= '<div class="' . esc_attr( $css_class ) . '">';

		$return .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_progress_bar_heading' ) );
		


		foreach ( $graph_lines_data as $line ) {
			
			// added by ThemeStek START
			$ts_icon_exists = 'ts-pbar-icon-false';
			if( !empty($line['add_icon']) && $line['add_icon']=='true' ){
				$ts_icon_exists = 'ts-pbar-icon-true';
			}
			// added by ThemeStek END
			
			
			
			// Applying color to icon
			$icon_color = $bgcolor;
			if( empty($icon_color) ) {
				$icon_color = 'skincolor';
			}
			if( !empty($line['color']) ) {
				$icon_color = $line['color'];
			}

			
			
			
			
			$return .= '<div class="ts-pbar-single-bar-w ' . themestek_sanitize_html_classes($ts_icon_exists) . '">';
			
			$unit = ( '' !== $units ) ? ' <span class="ts-vc_label_units vc_label_units">' . $line['value'] . esc_attr($units) . '</span>' : '';
			// Icon
			if( !empty($line['add_icon']) && $line['add_icon']=='true' ){
				$return .= '<div class="ts-pbar-icon-w">';
				
				// Generate shortcode for icon
				$icon_sc = '[ts-icon  type="'.$line['i_type'].'"';
				foreach( $line as $key=>$val ){
					if( substr($key,0,7) == 'i_icon_' ){
						$icon_sc .= ' ' . substr($key,2) . '="' . $val . '"';
					}
				}
				$icon_sc .= ']';
				
				
				$return .= do_shortcode($icon_sc);
				$return .= '</div>';
			}
			
			
			$return .= '<div class="vc_general vc_single_bar' . ( ( isset( $line['color'] ) && 'custom' !== $line['color'] ) ? ' ' . sanitize_html_class('vc_progress-bar-color-'.$line['color']) : '' ) . '">';
						
				$return .= '<small class="vc_label"' . esc_attr($line['txtcolor']) . '>' . esc_attr($line['label']) . '</small>';
				
				if ( $max_value > 100.00 ) {
					$percentage_value = (float) $line['value'] > 0 && $max_value > 100.00 ? round( (float) $line['value'] / $max_value * 100, 4 ) : 0;
				} else {
					$percentage_value = $line['value'];
				}
				
				$return .= themestek_wp_kses($unit);
				$return .= '<span class="vc_bar ' . esc_attr( implode( ' ', $bar_options ) ) . '" data-percentage-value="' . esc_attr( $percentage_value ) . '" data-value="' . esc_attr( $line['value'] ) . '"' . esc_attr($line['bgcolor']) . '></span>';
				
			$return .= '</div>';
			
			$return .= '</div>';
			
		}
		
		
		// Display Options CSS code
		if( !empty($css) ){
			//$return .= '<style>' . $css . '</style>' ;
		}
		

		$return .= '</div>';
		
	
	
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	
	
	return $return;
	
}
}
add_shortcode( 'ts-progress-bar', 'themestek_sc_progress_bar' );