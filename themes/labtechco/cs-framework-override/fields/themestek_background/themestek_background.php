<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Background
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_themestek_background extends CSFramework_Options {

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
	

    $value_defaults = array(
      'image'       => '',
      'repeat'      => '',
      'position'    => '',
      'attachment'  => '',
	  'size'        => '',
      'color'       => '',
    );

    $this->value    = wp_parse_args( $this->element_value(), $value_defaults );

    $upload_type    = ( isset( $upload_type  ) ) ? $upload_type  : 'image';
    $button_title   = ( isset( $button_title ) ) ? $button_title : esc_attr__( 'Upload', 'labtechco' );
    $frame_title    = ( isset( $frame_title  ) ) ? $frame_title  : esc_attr__( 'Upload', 'labtechco' );
    $insert_title   = ( isset( $insert_title ) ) ? $insert_title : esc_attr__( 'Use Image', 'labtechco' );
	
	
	
	$preview = '';
    $value   = ( isset($this->value['image']) ) ? $this->value['image'] : '' ;
	$valueid = ( isset($this->value['imageid']) ) ? $this->value['imageid'] : '' ;
    $hidden       = ( empty( $value ) )  ? ' hidden' : '';
	$hidden_text  = ( !empty( $value ) ) ? ' hidden' : '';
	
	$btntext_add    = esc_attr__('Add image','labtechco');
	$btntext_change = esc_attr__('Change image','labtechco');
	$btntext        = ( empty( $value ) )  ? esc_attr__('Add image','labtechco') : esc_attr__('Change image','labtechco');
	
	
	
    if( ! empty( $value ) ) {
      $attachment = wp_get_attachment_image_src( $valueid, 'thumbnail' );
       //$preview = $attachment[0];
		if( !empty($attachment[0]) ){
			$preview = $attachment[0];
		}
		else{
			$preview = '';
		}
    }
	
	if( empty($preview) ){
		$preview = $value;
	}
	
	echo '<div class="ts-cs-background-wrapper">';
	
	// Translation ready button text
	echo '<span class="ts-cs-background-text-add-image" style="display:none;">'.esc_attr__('Add image','labtechco').'</span>';
	echo '<span class="ts-cs-background-text-change-image" style="display:none;">'.esc_attr__('Change image','labtechco').'</span>';
	
	// Image selector wrapper
	echo '<div class="ts-cs-background-image-picker">';
	
	echo '<div class="ts-cs-background-image-picker-inner">';
	
	echo '<div class="cs-image-preview"><div class="cs-preview"><div class="cs-preview-inner">
			<i class="fa fa-times cs-remove ts-cs-remove'. $hidden .'"></i>
			<img src="'. esc_url($preview) .'" alt="' . esc_attr__('Preview','labtechco') . '" class="'. esc_attr($hidden) .'" />
			<div class="ts-cs-background-heading-noimg'. esc_attr($hidden_text) .'"> ' . esc_attr__('No image selected for background','labtechco') . ' </div>
		</div></div></div>';
	
    echo '<a href="javascript:void(0)" class="button button-primary cs-add">'. ( ( empty( $value ) ) ? esc_attr__('Add image','labtechco') : esc_attr__('Change image','labtechco') ) .'</a>';
    echo '<input type="text" name="'. esc_attr($this->element_name('[image]')) .'" value="'. esc_url($this->value['image']) .'"'. $this->element_class('ts-background-image') . $this->element_attributes() .'/>';
	echo '<input type="text" name="'. esc_attr($this->element_name('[imageid]')) .'" value="'. esc_attr($valueid) .'" class="ts-background-imageid"/>';
	
	echo '</div> <!-- .ts-cs-background-image-picker-inner --> ';
	
	echo '</div> <!-- .ts-cs-background-image-picker --> ';
	
    // background attributes
    echo '<fieldset>';
	
	echo '<div class="ts-cs-background-options-wrapper-top">';
	
	echo '<div class="ts-background-option">';
	echo '<label class="ts-background-repeat">';
	echo '<small>BG image repeat</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_attr($this->element_name( '[repeat]' )),
        'options'         => array(
          ''              => 'repeat',
          'repeat-x'      => 'repeat-x',
          'repeat-y'      => 'repeat-y',
          'no-repeat'     => 'no-repeat',
          'inherit'       => 'inherit',
        ),
        'attributes'      => array(
          'data-atts'     => 'repeat',
        ),
        'value'           => esc_attr($this->value['repeat'])
    ) );
	echo '</label>';
	echo '</div>';
	
	
	echo '<div class="ts-background-option">';
	echo '<label class="ts-background-position">';
	echo '<small>'. esc_attr__('BG image position','labtechco') .'</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_attr($this->element_name( '[position]' )),
        'options'         => array(
          ''              => 'left top',
          'left center'   => 'left center',
          'left bottom'   => 'left bottom',
          'right top'     => 'right top',
          'right center'  => 'right center',
          'right bottom'  => 'right bottom',
          'center top'    => 'center top',
          'center center' => 'center center',
          'center bottom' => 'center bottom'
        ),
        'attributes'      => array(
          'data-atts'     => 'position',
        ),
        'value'           => esc_attr($this->value['position'])
    ) );
	echo '</label>';
	echo '</div>';
	
	
    echo '<div class="ts-background-option">';
	echo '<label class="ts-background-attachment">';
	echo '<small>'. esc_attr__('BG image attachment','labtechco') .'</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_attr($this->element_name( '[attachment]' )),
        'options'         => array(
          ''              => 'scroll',
          'fixed'         => 'fixed',
        ),
        'attributes'      => array(
          'data-atts'     => 'attachment',
        ),
        'value'           => esc_attr($this->value['attachment'])
    ) );
	echo '</label>';
	echo '</div>';
	
	
	echo ' <div class="clr clear"></div> ';
	echo '</div> <!-- .ts-cs-background-options-wrapper-top --> ';
	
	echo '<div class="ts-cs-background-options-wrapper-bottom">';
	
	
	echo '<div class="ts-background-option">';
	echo '<label class="ts-background-size">';
	echo '<small>'. esc_attr__('BG image size','labtechco') .'</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_attr($this->element_name( '[size]' )),
        'options'         => array(
		  ''                => 'Auto',
          'cover'           => 'Cover',
          'fixed'           => 'Contain',
        ),
        'attributes'      => array(
          'data-atts'     => 'size',
        ),
        'value'           => esc_attr($this->value['size'])
    ) );
	echo '</label>';
	echo '</div>';
	
	
	
	
	if( isset($this->field['color']) && $this->field['color']==false ){
		// Do nothing
	} else {
		echo '<div class="ts-background-option ts-background-color-w">';
		echo '<label class="ts-background-color">';
		echo '<small>'. esc_attr__('BG image color','labtechco') .'</small>';
		echo cs_add_element( array(
			'pseudo'          => true,
			'id'              => esc_attr($this->field['id'].'_color'),
			'type'            => 'color_picker',
			'name'            => esc_attr($this->element_name('[color]')),
			'attributes'      => array(
			  'data-atts'     => 'bgcolor',
			),
			'value'           => esc_attr($this->value['color']),
			'default'         => ( isset( $this->field['default']['color'] ) ) ? $this->field['default']['color'] : '',
			'rgba'            => ( isset( $this->field['rgba'] ) && $this->field['rgba'] === false ) ? false : '',
		) );
		echo '</label>';
		echo '</div>';
	};
	
	
	
	
	
	
	
	
				echo '<div class="clear clr"></div> <!-- clear --> ';
			echo '</div> <!-- .ts-cs-background-options-wrapper-bottom --> ';
		echo '</fieldset>';
		echo '<div class="clear clr"></div> <!-- clear --> ';
	echo '</div> <!-- .ts-cs-background-wrapper --> ';
	
	
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
