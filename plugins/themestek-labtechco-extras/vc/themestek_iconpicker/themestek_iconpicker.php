<?php




function themestek_iconpicker_settings_field( $settings, $value ) {
	
	$type = ( !empty($settings['settings']['type']) ) ? $settings['settings']['type'] : 'fontawesome' ;
	
	$return = '<div class="themestek-iconpicker-wrapper">';
	
	$return .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput themestek-iconpicker-input ' .
	esc_attr( $settings['param_name'] ) . ' ' .
	esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
	
	
	
	$i_value = explode( ' ', $value );
	if( !empty($i_value[1]) ){
		$i_value = $i_value[1];
	} else {
		$i_value = 'fa-anchor';
	}
	
	
	$return .= '
		<!-- icon picker -->
		<div class="ts-ipicker-selector-w">
			<div class="ts-ipicker-selector">
				<span class="ts-ipicker-selected-icon">
					<i class="' . esc_attr( $value ) . '"></i>
				</span>
				<span class="ts-ipicker-selector-button">
					<i class="fip-fa fa fa-arrow-down"></i>
				</span>
			</div>
			<div class="themestek-iconpicker-list-w" style="display:none;">
				<div id="ts-ipicker-library-' . esc_attr( $type ) . '" class="themestek-iconpicker-list" data-iconset="' . esc_attr( $type ) . '" data-icon="' . esc_attr( $i_value ) . '" role="iconpicker"></div>
			</div>
		</div><!-- .ts-ipicker-selector-w -->
	';
	
	$return .= '</div><!-- .themestek-iconpicker-wrapper -->';
	
	return $return; // New button element
}
vc_add_shortcode_param( 'themestek_iconpicker', 'themestek_iconpicker_settings_field', THEMESTEK_LABTECHCO_URI . '/vc/themestek_iconpicker/themestek_iconpicker.js');




