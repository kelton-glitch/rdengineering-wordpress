<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: ThemeStek IconPicker
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_themestek_iconpicker extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){
	
	
	
    echo wp_kses( $this->element_before(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);
	
	
	
	
	// blank variables
	$icon_picker_html = '';
	$select_dropdown  = '';

	// current value
    $value                     = $this->element_value();
	$value_library             = ( isset( $value['library'] ) ) ? $value['library'] : 'fontawesome';
	$value_library_fontawesome = ( isset( $value['library_fontawesome'] ) ) ? $value['library_fontawesome'] : 'fa fa-ok';


	$icon_library = array();
	// Icon picker libraries
	if( function_exists('tste_labtechco_icon_libraries') ){
		$icon_library = tste_labtechco_icon_libraries();
	}

	
	// preparing icon picker html
	if( is_array($icon_library) && count($icon_library)>0 ){
	foreach( $icon_library as $library_id=>$library ){
		
		// show or hide the icon picker
		$display_class = ($value_library==$library_id) ? 'ts-show' : 'ts-hide' ;
		
		// current value
		$curr_value = ( isset( $value['library_'.$library_id] ) ) ? $value['library_'.$library_id] : $library[1];
		
		// Icon active in picker
		$i_value = explode( ' ', $curr_value );
		if( !empty($i_value[1]) ){
			$i_value = $i_value[1];
		} else {
			$i_value = 'fa';
		}
		
		
		// Dropdown 
		$selected = ($value_library==$library_id) ? ' selected="selected"' : '' ;
		$select_dropdown .= '<option value="' . $library_id . '"' . $selected . '>' . $library[0] . '</option>';
		
		
		// Icon picker
		$icon_picker_html .= '<div class="themestek-iconpicker-wrapper ts-iconpicker-' . esc_attr($library_id) . ' ' . esc_attr( $display_class ) . '">
				<input type="hidden" name="'. esc_attr($this->element_name( '[library_'.$library_id.']' )) .'" value="'. esc_attr($curr_value) .'"'. $this->element_class('themestek-iconpicker-input i_icon_'.$library_id.' themestek_iconpicker_field') .'/>
				<div class="ts-ipicker-selector-w">
					<div class="ts-ipicker-selector">
						<span class="ts-ipicker-selected-icon">
							<i class="' . esc_attr($curr_value) . '"></i>
						</span>
						<span class="ts-ipicker-selector-button">
							<i class="fip-fa fa fa-arrow-down"></i>
						</span>
					</div>
					<div class="themestek-iconpicker-list-w ts-hide">
						<div id="ts-ipicker-library-' . esc_attr($library_id) . '" class="themestek-iconpicker-list" data-iconset="' . esc_attr($library_id) . '" data-icon="' . esc_attr($i_value) . '" role="iconpicker"></div>
					</div>
				</div><!-- .ts-ipicker-selector-w -->
			</div>';
	}
	}
	
	$select_dropdown = '<select name="'. esc_attr($this->element_name( '[library]' )) .'" class="ts-iconpicker-library-selector" '. esc_attr( $this->element_class() . $this->element_attributes() ) .'>' . $select_dropdown . '</select>';
	
	
	
	// Output
	echo '<div class="themestek-iconpicker-element">';
		
		echo '<div class="ts-iconpicker-left">';
			echo themestek_wp_kses($select_dropdown);
		echo '</div>';
	
		echo '<div class="ts-iconpicker-right">';
			echo themestek_wp_kses( $icon_picker_html );  // icon picker
		echo '</div><!-- .ts-iconpicker-right -->';
		
		echo '<div class="clear clr"></div>';
	
	echo '</div><!-- .themestek-iconpicker-element -->';
	
	
	
	
	
	
    echo wp_kses( $this->element_after(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);

  }

}