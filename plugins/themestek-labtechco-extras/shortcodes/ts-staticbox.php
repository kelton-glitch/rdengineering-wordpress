<?php
// [ts-staticbox]
if( !function_exists('themestek_sc_staticbox') ){
function themestek_sc_staticbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_staticbox;
		
		$options_list = ts_create_options_list($ts_sc_params_staticbox);
		
		
		// extract array
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		
		// Starting wrapper of the whole arear
		$return .= themestek_box_wrapper( 'start', 'static', get_defined_vars() );
		
			// Heading element
			$return .= ts_vc_element_heading( get_defined_vars() );
			
			
			// Getting $args for WP_Query
			$args = themestek_get_query_args( 'static', get_defined_vars() );
			
			// image size
			$img_size   = ( !empty($img_size) ) ? $img_size : 'full' ;
			
			if( !empty($values) ){
				$boxes = (array) vc_param_group_parse_atts( $values );
				
				$return .= '<div class="row multi-columns-row themestek-boxes-row-wrapper box-shadow-2">';
				foreach( $boxes as $box ){
					$smalltext  = ( !empty($box['smalltext']) ) ? '<div class="themestek-static-box-desc">'.$box['smalltext'].'</div>' : '' ;
					$image_html = '' ;
					
					
					if( !empty($box['boximage']) ){
						
						if( function_exists('wpb_getImageBySize') ){
							$image_html = wpb_getImageBySize( array(
								'attach_id'  => $box['boximage'],
								'thumb_size' => $img_size,
								'class'      => 'ts_vc_single_image-img',
							) );
							$image_html = ( !empty($image_html['thumbnail']) ) ? $image_html['thumbnail'] : '' ;
						} else {
							$image_html = wp_get_attachment_image( $box['boximage'], 'full' );
						}
						
					}
					$label      = ( !empty($box['label']) ) ? '<div class="themestek-box-title"><h4>'.$box['label'].'</h4></div>' : '' ;
					$return .= themestek_column_div('start', $column );
						$return .= '
						<div class="themestek-static-box-wrapper themestek-boxes-feature-plans ts-hover-style-2 themestek-box">
							<div class="themestek-static-box-image"> 
								' . $image_html . '
							</div>
							<div class="themestek-static-box-content" >
								'.$label.'
								'.$smalltext.'
							</div>
						</div>
						';
					$return .= themestek_column_div('end', $column );
				} // foreach
				$return .= '</div><!-- .row multi-columns-row themestek-boxes-row-wrapper -->  ';
				
			} // if
			
		
		// Ending wrapper of the whole arear
		$return .= themestek_box_wrapper( 'end', 'static', get_defined_vars() );
		
			
		/* Restore original Post Data */
		wp_reset_postdata();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'ts-staticbox', 'themestek_sc_staticbox' );









