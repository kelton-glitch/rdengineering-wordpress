<?php

/* Options for ThemeStek Call To Action */


$h2_custom_heading = vc_map_integrate_shortcode( 'ts-custom-heading', 'h2_', esc_attr__( 'Heading', 'labtechco' ),
	array(
		'exclude' => array(
			'source',
			'text',
			'css',
		),
	),
	array(
		'element' => 'use_custom_fonts_h2',
		'value'   => 'true',
	)
);

// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
	foreach ( $h2_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h2_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$h4_custom_heading = vc_map_integrate_shortcode( 'ts-custom-heading', 'h4_', esc_attr__( 'Subheading', 'labtechco' ),
	array(
		'exclude' => array(
			'source',
			'text',
			'css',
		),
	),
	array(
		'element' => 'use_custom_fonts_h4',
		'value' => 'true',
	)
);

// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
	foreach ( $h4_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h4_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$params = array_merge(
	array(
		array(
			'type'             => 'textfield',
			'heading'          => esc_attr__( 'Heading', 'labtechco' ),
			'admin_label'      => true,
			'param_name'       => 'h2',
			'value'            => '',
			'description'      => esc_attr__( 'Enter text for heading line.', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_attr__( 'Use custom font?', 'labtechco' ),
			'param_name'       => 'use_custom_fonts_h2',
			'description'      => esc_attr__( 'Enable Google fonts.', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		),

	),
	$h2_custom_heading,
	array(
		array(
			'type'             => 'textfield',
			'heading'          => esc_attr__( 'Subheading', 'labtechco' ),
			'param_name'       => 'h4',
			'value'            => '',
			'description'      => esc_attr__( 'Enter text for subheading line.', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_attr__( 'Use custom font?', 'labtechco' ),
			'param_name'       => 'use_custom_fonts_h4',
			'description'      => esc_attr__( 'Enable custom font option.', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		),
	),
	$h4_custom_heading,
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Text alignment', 'labtechco' ),
			'param_name'  => 'txt_align',
			'value'       => ts_getVcShared( 'text align' ), // default left
			'description' => esc_attr__( 'Select text alignment in "Call to Action" block.', 'labtechco' ),
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_attr__( 'Reverse heading order', 'labtechco' ),
			'param_name'       => 'reverse_heading',
			'description'      => esc_attr__( 'Show sub-heading before heading.', 'labtechco' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Shape', 'labtechco' ),
			'param_name' => 'shape',
			'std'        => 'rounded',
			'value'      => array(
				esc_attr__( 'Square', 'labtechco' )  => 'square',
				esc_attr__( 'Rounded', 'labtechco' ) => 'rounded',
				esc_attr__( 'Round', 'labtechco' )   => 'round',
			),
			'description' => esc_attr__( 'Select call to action shape.', 'labtechco' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Style', 'labtechco' ),
			'param_name' => 'style',
			'value' => array(
				esc_attr__( 'Classic', 'labtechco' ) => 'classic',
				esc_attr__( 'Flat', 'labtechco' )    => 'flat',
				esc_attr__( 'Outline', 'labtechco' ) => 'outline',
				esc_attr__( '3d', 'labtechco' )      => '3d',
			),
			'std'         => 'classic',
			'description' => esc_attr__( 'Select call to action display style.', 'labtechco' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Color', 'labtechco' ),
			'param_name'  => 'color',
			'value'       => array_merge( array( esc_attr__('Transparent', 'labtechco' ) => 'transparent' ), ts_getVcShared( 'colors-dashed' ) ),
			'std'         => 'transparent',
			'description' => esc_attr__( 'Select color for button.', 'labtechco' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_cta3-colored-dropdown',
			'dependency'  => array(
				'element'            => 'style',
				'value_not_equal_to' => array( 'custom' )
			),
		),
		array(
			'type'       => 'textarea_html',
			'heading'    => esc_attr__( 'Text', 'labtechco' ),
			'param_name' => 'content',
			'value'      => esc_attr__( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'labtechco' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Width', 'labtechco' ),
			'param_name' => 'el_width',
			'value'      => array(
					'100%' => '',
					'90%'  => 'xl',
					'80%'  => 'lg',
					'70%'  => 'md',
					'60%'  => 'sm',
					'50%'  => 'xs',
			),
			'description' => esc_attr__( 'Select call to action width (percentage).', 'labtechco' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Add button', 'labtechco' ) . '?',
			'description' => esc_attr__( 'Add button for call to action.', 'labtechco' ),
			'std'		  => 'right',
			'param_name'  => 'add_button',
			'value'       => array(
				esc_attr__( 'No', 'labtechco' )     => '',
				esc_attr__( 'Top', 'labtechco' )    => 'top',
				esc_attr__( 'Bottom', 'labtechco' ) => 'bottom',
				esc_attr__( 'Left', 'labtechco' )   => 'left',
				esc_attr__( 'Right', 'labtechco' )  => 'right',
			),
		),
	),
	vc_map_integrate_shortcode( 'ts-btn', 'btn_', esc_attr__( 'Button', 'labtechco' ),
		array(
			'exclude' => array( 'css' )
		),
		array(
			'element'   => 'add_button',
			'not_empty' => true,
		)
	),
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Add icon?', 'labtechco' ),
			'description' => esc_attr__( 'Add icon for call to action.', 'labtechco' ),
			'param_name'  => 'add_icon',
			'value'       => array(
				esc_attr__( 'No', 'labtechco' )     => '',
				esc_attr__( 'Top', 'labtechco' )    => 'top',
				esc_attr__( 'Bottom', 'labtechco' ) => 'bottom',
				esc_attr__( 'Left', 'labtechco' )   => 'left',
				esc_attr__( 'Right', 'labtechco' )  => 'right',
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Place icon on border?', 'labtechco' ),
			'description' => esc_attr__( 'Display icon on call to action element border.', 'labtechco' ),
			'param_name'  => 'i_on_border',
			'value'       => array(
				esc_attr__( 'No', 'labtechco' )     => 'false',
				esc_attr__( 'Yes', 'labtechco' )    => 'true',
			),
			'group'       => esc_attr__( 'Icon', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'add_icon',
				'not_empty' => true,
			),
		),
		
	),
	vc_map_integrate_shortcode( 'ts-icon', 'i_', esc_attr__( 'Icon', 'labtechco' ),
		array(
			'exclude' => array( 'align', 'css' )
		),
		array(
			'element'   => 'add_icon',
			'not_empty' => true,
		)
	),
	array(
		/// cta3
		vc_map_add_css_animation(),
		ts_vc_ele_extra_class_option(),
		ts_vc_ele_css_editor_option(),
	)
);

global $ts_sc_params_cta;
$ts_sc_params_cta = $params;

vc_map( array(
	'name'     => esc_attr__( 'PBM Call to Action', 'labtechco' ),
	'base'     => 'ts-cta',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_attr__( 'PBM', 'labtechco' ) ),
	'since'    => '4.5',
	'params'   => $params,
	'js_view'  => 'VcCallToActionView3',
) );