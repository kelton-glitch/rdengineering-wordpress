<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Color Picker
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_themestek_skin_color extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

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
	
	// Pre colors
	$options = ( !empty($this->field['options']) ) ? $this->field['options'] : '' ;


	
	// for Customizer.. Customizer will not fetch Options array so we need to fetch it directly
	if( !is_array($options) || empty($options) ){
		include get_template_directory() . '/cs-framework-override/config/framework-options.php';
		foreach( $ts_framework_options as $framework_option ){
			if( $framework_option['name']=='layout_settings' ){
				foreach( $framework_option['fields'] as $field ){
					if( isset($field['id']) && $field['id']=='skincolor' ){
						$options = $field['options'];
						break;
					}
				}
			}
		}
	}



	echo '<div class="themestek-skin-color-w">';
	
	echo '<div class="themestek-skin-color-list">';
	if( is_array($options) && count($options)>0 ){
		$half = ceil( count($options)/2 );
		$i=1;
		foreach($options as $name => $color){
			echo '<a href="javascript:void(0)" title="'.esc_attr($name).'" style="background-color:'.esc_attr($color).'">'.esc_attr($name).'</a>';
			if( $i==$half ){ echo '<br>'; }
			$i++;
		}
	}
	
	echo '<div class="clear"></div></div> <!-- .themestek-skin-color-list --> ';
	echo '<div class="themestek-or-text-wrapper"><span></span><div class="themestek-or-text">OR</div></div>';
	
	echo '<div class="themestek-skin-color-picker-w">';
    echo '<input type="text" name="'. esc_attr($this->element_name()) .'" value="'. esc_attr($this->element_value()) .'"'. $this->element_class( 'cs-field-color-picker' ) . $this->element_attributes( $this->extra_attributes() ) .'/>';
    
	echo '</div>';
	echo '<div class="clear clr"></div>';
	echo '</div><!-- .themestek-skin-color-w -->';
	
	
	
	
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

  public function extra_attributes() {

    $atts = array();

    if( isset( $this->field['id'] ) ) {
      $atts['data-depend-id'] = $this->field['id'];
    }

    if ( isset( $this->field['rgba'] ) &&  $this->field['rgba'] === false ) {
      $atts['data-rgba'] = 'false';
    }

    if( isset( $this->field['default'] ) ) {
      $atts['data-default-color'] = $this->field['default'];
    }

    return $atts;

  }

}
