<?php

/* Options for ThemeStek Button */

global $ts_pixel_icons;
$icons_params = vc_map_integrate_shortcode( 'ts-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);
// populate integrated ts-icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	foreach ( $icons_params as $key => $param ) {
		if ( is_array( $param ) && ! empty( $param ) ) {
			if ( 'i_type' === $param['param_name'] ) {
				// Do nothing
			}
			if ( isset( $param['admin_label'] ) ) {
				// remove admin label
				unset( $icons_params[ $key ]['admin_label'] );
			}

		}
	}
}
$params = array_merge(
	array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_attr__( 'Text', 'labtechco' ),
			'param_name' => 'title',
			'value'      => esc_attr__( 'Text on the button', 'labtechco' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_attr__( 'URL (Link)', 'labtechco' ),
			'param_name' => 'link',
			'description' => esc_attr__( 'Add link to button.', 'labtechco' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Style', 'labtechco' ),
			'description' => esc_attr__( 'Select button display style.', 'labtechco' ),
			'param_name' => 'style',
			'std'		 => 'flat',
			'value' => array(
				esc_attr__( 'Flat', 'labtechco' ) => 'flat',
				esc_attr__( 'Modern', 'labtechco' ) => 'modern',
				esc_attr__( 'Classic', 'labtechco' ) => 'classic',
				esc_attr__( 'Outline', 'labtechco' ) => 'outline',
				esc_attr__( '3d', 'labtechco' ) => '3d',
				esc_attr__( 'Simple Text', 'labtechco' ) => 'text',
				esc_attr__( 'Custom', 'labtechco' ) => 'custom',
				esc_attr__( 'Outline custom', 'labtechco' ) => 'outline-custom',
				esc_attr__( 'Gradient', 'labtechco' ) => 'gradient',
				esc_attr__( 'Gradient Custom', 'labtechco' ) => 'gradient-custom',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 1', 'labtechco' ),
			'param_name' => 'gradient_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'labtechco' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => ( ( function_exists('vc_get_shared') ) ? vc_get_shared( 'colors-dashed' ) : getVcShared( 'colors-dashed' ) ),
			'std' => 'turquoise',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 2', 'labtechco' ),
			'param_name' => 'gradient_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'labtechco' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => ( ( function_exists('vc_get_shared') ) ? vc_get_shared( 'colors-dashed' ) : getVcShared( 'colors-dashed' ) ),
			'std' => 'blue',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 1', 'labtechco' ),
			'param_name' => 'gradient_custom_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'labtechco' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#dd3333',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 2', 'labtechco' ),
			'param_name' => 'gradient_custom_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'labtechco' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#eeee22',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Button Text Color', 'labtechco' ),
			'param_name' => 'gradient_text_color',
			'description' => esc_attr__( 'Select button text color.', 'labtechco' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#ffffff',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Background', 'labtechco' ),
			'param_name' => 'custom_background',
			'description' => esc_attr__( 'Select custom background color for your element.', 'labtechco' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#ededed',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Text', 'labtechco' ),
			'param_name' => 'custom_text',
			'description' => esc_attr__( 'Select custom text color for your element.', 'labtechco' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Outline and Text', 'labtechco' ),
			'param_name' => 'outline_custom_color',
			'description' => esc_attr__( 'Select outline and text color for your element.', 'labtechco' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover background', 'labtechco' ),
			'param_name' => 'outline_custom_hover_background',
			'description' => esc_attr__( 'Select hover background color for your element.', 'labtechco' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover text', 'labtechco' ),
			'param_name' => 'outline_custom_hover_text',
			'description' => esc_attr__( 'Select hover text color for your element.', 'labtechco' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#fff',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Shape', 'labtechco' ),
			'description' => esc_attr__( 'Select button shape.', 'labtechco' ),
			'param_name'  => 'shape',
			'std'		  => 'rounded',
			'value'       => array(
				esc_attr__( 'Square', 'labtechco' ) => 'square',
				esc_attr__( 'Rounded', 'labtechco' ) => 'rounded',
				esc_attr__( 'Round', 'labtechco' ) => 'round',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Color', 'labtechco' ),
			'param_name' => 'color',
			'description' => esc_attr__( 'Select button color.', 'labtechco' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
							esc_attr__( '[Skin Color]', 'labtechco' ) => 'skincolor',
							esc_attr__( 'Classic Grey', 'labtechco' ) => 'default',
							esc_attr__( 'Classic Blue', 'labtechco' ) => 'primary',
							esc_attr__( 'Classic Turquoise', 'labtechco' ) => 'info',
							esc_attr__( 'Classic Green', 'labtechco' ) => 'success',
							esc_attr__( 'Classic Orange', 'labtechco' ) => 'warning',
							esc_attr__( 'Classic Red', 'labtechco' ) => 'danger',
							esc_attr__( 'Classic Black', 'labtechco' ) => 'inverse'
					   ) + ts_getVcShared( 'colors-dashed' ),
			'std' => 'skincolor',
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array( 'custom', 'outline-custom' )
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Button Size', 'labtechco' ),
			'param_name' => 'size',
			'description' => esc_attr__( 'Select button display size.', 'labtechco' ),
			'std' => 'md',
			'value' => ts_getVcShared( 'sizes' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Button Text Bold?', 'labtechco' ),
			'param_name'  => 'font_weight',
			'description' => esc_attr__( 'Select YES if you like to bold the font text.', 'labtechco' ),
			'std'         => 'yes',
			'value'       => array(
				esc_attr__( 'Yes', 'labtechco' ) => 'yes',
				esc_attr__( 'No', 'labtechco' )  => 'no',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Alignment', 'labtechco' ),
			'param_name' => 'align',
			'description' => esc_attr__( 'Select button alignment.', 'labtechco' ),
			'value' => array(
				esc_attr__( 'Inline', 'labtechco' ) => 'inline',
				esc_attr__( 'Left', 'labtechco' ) => 'left',
				esc_attr__( 'Right', 'labtechco' ) => 'right',
				esc_attr__( 'Center', 'labtechco' ) => 'center'
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Set full width button?', 'labtechco' ),
			'param_name' => 'button_block',
			'dependency' => array(
				'element'            => 'align',
				'value_not_equal_to' => 'inline',
			),
			'value'      => array(
				esc_attr__( 'No', 'labtechco' )  => 'false',
				esc_attr__( 'Yes', 'labtechco' ) => 'true',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Add icon?', 'labtechco' ),
			'param_name' => 'add_icon',
			'value'      => array(
				esc_attr__( 'No',  'labtechco' ) => '',
				esc_attr__( 'Yes', 'labtechco' ) => 'true',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Icon Alignment', 'labtechco' ),
			'description' => esc_attr__( 'Select icon alignment.', 'labtechco' ),
			'param_name' => 'i_align',
			'value' => array(
				esc_attr__( 'Left', 'labtechco' ) => 'left',
				// default as well
				esc_attr__( 'Right', 'labtechco' ) => 'right',
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
		),
	),
	
	$icons_params,
	
	array(
		vc_map_add_css_animation(),
		ts_vc_ele_extra_class_option(),
		ts_vc_ele_css_editor_option(),
	)
);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	// Button Icon
	if( $param_name == 'i_align' ){
		$params[$i]['std'] = 'right';
	
	} else if( $param_name == 'i_type' ){
		$params[$i]['std'] = 'themify';
		
	} else if( $param_name == 'i_icon_themify' ){
		$params[$i]['std']   = 'themifyicon ti-arrow-right';
		$params[$i]['value'] = 'themifyicon ti-arrow-right';

	}
	
	
	$i++;
} // Foreach

	
global $ts_sc_params_btn;
$ts_sc_params_btn = $params;

vc_map( array(
	'name'     => esc_attr__( 'PBM Button', 'labtechco' ),
	'base'     => 'ts-btn',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_attr__( 'PBM', 'labtechco' ) ),
	'params'   => $params,
	'js_view'  => 'VcButton3View',
	'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
) );
