<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// [ts-pricing-table]
if( !function_exists('themestek_sc_pricing_table') ){
function themestek_sc_pricing_table( $atts, $content=NULL ) {

	$return = '';
	
	if( function_exists('vc_map') ){

		
		global $ts_sc_params_pricingtable;
		$options_list   = ts_create_options_list($ts_sc_params_pricingtable);
		
		// This global variable will be used in template file for design
		global $ts_global_ptbox_element_values;
		$ts_global_ptbox_element_values = array();
		
		extract( shortcode_atts( 
			$options_list
		, $atts ) );
		
		$min = TS_MIN;
		if( is_child_theme() ){
			$min = '';
		}
		$style	= ( !empty( $atts['boxstyle'] ) ) ? $atts['boxstyle'] : 'style-1' ;  // Getting box style
		wp_enqueue_style( 'ts-ptablebox-style-'.$style, get_template_directory_uri() . '/css/ptablebox/ptablebox-'.$style.TS_MIN.'.css' );
		
		$return = '';
		
		$css_class = 'themestek-ptables-w row wpb_content_element';

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
		
		
		
		/* *********************************************************************** */
		/* ************************** Generating Output ************************** */
		
		$return .= '<div class="' . esc_attr( $css_class ) . '">';
		
		$columns_data = array();
		foreach( $options_list as $option_key=>$option_val ){
			
			// First Column
			if( substr($option_key, 0,5)=='col1_' ){
				$columns_data['1_col'][$option_key] = ${$option_key};
			}
			
			// Second Column
			if( substr($option_key, 0,5)=='col2_' ){
				$columns_data['2_col'][$option_key] = ${$option_key};
			}
			
			// Third Column
			if( substr($option_key, 0,5)=='col3_' ){
				$columns_data['3_col'][$option_key] = ${$option_key};
			}
			
			// Fourth Column
			if( substr($option_key, 0,5)=='col4_' ){
				$columns_data['4_col'][$option_key] = ${$option_key};
			}
			
			// Fifth Column
			if( substr($option_key, 0,5)=='col5_' ){
				$columns_data['5_col'][$option_key] = ${$option_key};
			}
			
		}
		
		// Removing column if title is blank
		if( empty($columns_data['1_col']['col1_heading']) ){  unset($columns_data['1_col']); }
		if( empty($columns_data['2_col']['col2_heading']) ){  unset($columns_data['2_col']); }
		if( empty($columns_data['3_col']['col3_heading']) ){  unset($columns_data['3_col']); }
		if( empty($columns_data['4_col']['col4_heading']) ){  unset($columns_data['4_col']); }
		if( empty($columns_data['5_col']['col5_heading']) ){  unset($columns_data['5_col']); }
		
		
		
		// Pricing table column class
		$table_col_class = '';
		if( $boxstyle!='horizontal' ){
			switch( count($columns_data) ){
				case '1':
					$table_col_class = 'col-md-12';
					break;
					
				case '2':
				default:
					$table_col_class = 'col-md-6';
					break;
					
				case '3':
					$table_col_class = 'col-md-4';
					break;
					
				case '4':
					$table_col_class = 'col-md-3';
					break;
					
				case '5':
					$table_col_class = 'col-md-2';
					break;
			}
		}
		
		$col = 1;
		foreach( $columns_data as $column_data ){
			
			// Featured column
			$featured_text_html = '';
			$featured_class     = '';
			if( !empty($featured_col) && $col==$featured_col ){
				$featured_class = 'ts-ptablebox-featured-col';
				if( !empty($featured_text) ){
					$featured_text_html = '<div class="ts-ptablebox-featured-w ts-bgcolor-skincolor ts-white">'.esc_html($featured_text).'</div>';
				}
			}
			
			
			/** Icon **/
			$icon = '';
			
			
			// This is real icon code
			$icon_type = ${'col'.$col.'_i_type'};
			$icon_class = ( !empty( ${'col'.$col.'_i_icon_'.$icon_type } ) ) ? ${'col'.$col.'_i_icon_'.$icon_type} : '' ;
			$icon_html  = '<div class="ts-sbox-icon-wrapper"><i class="' . $icon_class . '"></i></div>';
			
			// each line
			$lines_html = '';
			$values     = ${'col'.$col.'_values' };
			$values     = (array) vc_param_group_parse_atts( $values );
			
			
			
			if( is_array($values) && count($values)>0 ){
				
				foreach ( $values as $data ) {
					
					$new_line = $data;
					
					
					// Icon
					$icon = '';
					if( !empty($data['list_icon']) && $data['list_icon']=='default' ){
						
						$icon = do_shortcode('[ts-icon type="fontawesome" size="xs" color="skincolor" align="left" icon_fontawesome="fa fa-check"]');
						
					} else if( !empty($data['list_icon']) && $data['list_icon']=='custom' ){
						
						$icon_shortcode = '[ts-icon size="xs"';
						
						if( !empty($data['i_type']) ){
							$icon_shortcode .= ' type="'.$data['i_type'].'"';
						}
						if( isset($data['i_icon_' . $data['i_type'] ]) ){
							$icon_shortcode .= ' icon_' . $data['i_type'] . '="'.$data['i_icon_' . $data['i_type'] ] . '"';
						}
						$icon_shortcode .= ' color="skincolor" align="left"]';
						
						$icon = do_shortcode($icon_shortcode);
						
					}
					
					
					$lines_html 		.= isset( $data['label'] ) ? '<div class="ts-ptable-line">'.$icon.$data['label'].'</div>' : '';
				}
				
			}
			
			if( !empty($lines_html) ){
				$lines_html = '<div class="ts-ptable-lines-w">'.$lines_html.'</div>';
			}
			
			
			$return .= '<div class="themestek-ptable-column-w ' . esc_attr($table_col_class) . ' ' . esc_attr($featured_class) . ' ">';
				$return .= '<div class="themestek-ptable-column-inner">';
				
					$ts_global_ptbox_element_values = array();
					// storing in global varibales to be used in template file
					$ts_global_ptbox_element_values['boxstyle']			= $boxstyle;
					$ts_global_ptbox_element_values['icon_html']		= $icon_html;
					$ts_global_ptbox_element_values['lines_html']		= $lines_html;
					$ts_global_ptbox_element_values['heading']			= $column_data['col' . $col . '_heading'];
					$ts_global_ptbox_element_values['price']			= '<div class="themestek-ptable-price">'.$column_data['col' . $col . '_price'].'</div>';
					$ts_global_ptbox_element_values['cur_symbol']		=  $column_data['col' . $col . '_cur_symbol'];
					$ts_global_ptbox_element_values['cur_symbol_before']	=  '';
					$ts_global_ptbox_element_values['cur_symbol_after']		=  '';
					if( isset($column_data['col' . $col . '_cur_symbol_position']) && $column_data['col' . $col . '_cur_symbol_position']=='before' ){
						$ts_global_ptbox_element_values['cur_symbol_before']	=  '<div class="themestek-ptable-cur-symbol-before">'.$column_data['col' . $col . '_cur_symbol'].'</div>';
					} else {
						$ts_global_ptbox_element_values['cur_symbol_after']		=  '<div class="themestek-ptable-cur-symbol-after">'.$column_data['col' . $col . '_cur_symbol'].'</div>';
					}
					$ts_global_ptbox_element_values['price_frequency']	= $column_data['col' . $col . '_price_frequency'];
					$ts_global_ptbox_element_values['btn_title']		= $column_data['col' . $col . '_btn_title'];
					$ts_global_ptbox_element_values['btn_link']			= $column_data['col' . $col . '_btn_link'];
					$ts_global_ptbox_element_values['featured_text']    = $featured_text_html;
					$ts_global_ptbox_element_values['main-class']		= ''; // Extra field
					
					// calling template depending on the selected VIEW option
					ob_start();
					get_template_part('theme-parts/ptablebox/ptablebox', $boxstyle);
					$return .= ob_get_contents();
					ob_end_clean();
					
					
				$return .= '</div>';
			$return .= '</div>';
			
			$col++;
		}
		
		$return .= '</div>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
	
}
}
add_shortcode( 'ts-pricing-table', 'themestek_sc_pricing_table' );
