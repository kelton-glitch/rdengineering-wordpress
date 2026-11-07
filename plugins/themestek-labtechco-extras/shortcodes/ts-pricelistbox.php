<?php
// [ts-pricelistbox]
if( !function_exists('themestek_sc_pricelist') ){
function themestek_sc_pricelist( $atts, $content=NULL ){
	
	global $ts_vc_custom_element_pricelistbox;
	$options_list = ts_create_options_list($ts_vc_custom_element_pricelistbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	
	$ctaShortcode = '[ts-heading ';
	foreach( $options_list as $key=>$val ){
		if( trim( ${$key} )!='' ){
			$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
		}
	}
	$ctaShortcode .= 'el_width="100%" css_animation=""][/ts-heading]';
	
	
	
	$return = do_shortcode($ctaShortcode);
	

	// pricelist lists
	$pricelist = json_decode(urldecode($pricelist));
	
	
	$return .= '<div class="ts-pricelist-block-wrapper">';
	$return .= '<ul class="ts-pricelist-block">';
		foreach( $pricelist as $data ){
			
			$service_name 	= '';
			$timing = '';
			
			//service_name 
			if( !empty($data->service_name) ){
				$servicename = ( isset($data->service_name) ) ? $data->service_name : '';
			}
			
			//price
			if( !empty($data->price) ){
				$price = ( isset($data->price) ) ? $data->price : '';
				$prices= '<span class="service-price">'.$price.'</span>';
			}
			
			$return .= '<li>'.$servicename.$prices.'</li>';
			
		}
	$return .= '</ul> <!-- .ts-pricelist-block -->';
	$return .= '</div><!-- .ts-pricelist-block-wrapper -->  ';
	

	$wrapperStart = '<div class="themestek-pricelistbox-wrapper '.$el_class.'">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.$return.$wrapperEnd;
	
	
}
}
add_shortcode( 'ts-pricelistbox', 'themestek_sc_pricelist' );