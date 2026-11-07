<?php

/* Options for ThemeStek Heading and Subheading */


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
			'type'             => 'textarea',
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
			'type'             => 'textarea',
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
			'type'       => 'textarea_html',
			'heading'    => esc_attr__( 'Text', 'labtechco' ),
			'param_name' => 'content',
			'value'      => esc_attr__( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'labtechco' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Text alignment', 'labtechco' ),
			'param_name'  => 'txt_align',
			'std'		  => 'left',
			'value'       => ts_getVcShared( 'text align' ), // default left
			'description' => esc_attr__( 'Select text alignment in "Call to Action" block.', 'labtechco' ),
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_attr__( 'Reverse heading order', 'labtechco' ),
			'param_name'       => 'reverse_heading',
			'description'      => esc_attr__( 'Show sub-heading before heading.', 'labtechco' ),
			'std'			   => 'true',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Seperator', 'labtechco' ),
			'param_name'  => 'seperator',
			'value'       => array(
				esc_attr__( 'None', 'labtechco' )  							=> 'none',
				esc_attr__( 'Solid', 'labtechco' ) 							=> 'solid',
			),
			'description' => esc_attr__( 'Show separator between Heading and Subheading', 'labtechco' ),
			'std'		  => 'none',
		),

	),

	array(
		/// cta3
		vc_map_add_css_animation(),
		ts_vc_ele_extra_class_option(),
		ts_vc_ele_css_editor_option(),
	)
);

// Moving heading link option on main tab instead of inner tab
foreach( $params as $key=>$val ){
	// Heading
	if( !empty($val['param_name']) && $val['param_name']=='h2_link' ){
		unset($params[$key]['group']);
		unset($params[$key]['dependency']);
		$params[$key]['heading'] = esc_attr__('Heading Link (URL)','labtechco');
	}
	
	// Sub-heading
	if( !empty($val['param_name']) && $val['param_name']=='h4_link' ){
		unset($params[$key]['group']);
		unset($params[$key]['dependency']);
		$params[$key]['heading'] = esc_attr__('Subheading Link (URL)','labtechco');
	}
}

global $ts_sc_params_heading;
$ts_sc_params_heading = $params;

vc_map( array(
	'name'     => esc_attr__( 'PBM Heading and Subheading', 'labtechco' ),
	'base'     => 'ts-heading',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_attr__( 'PBM', 'labtechco' ) ),
	'since'    => '4.5',
	'params'   => $params,
	'js_view'  => 'VcCallToActionView3',
) );