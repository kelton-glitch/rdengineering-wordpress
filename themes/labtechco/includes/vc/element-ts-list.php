<?php

/* Options */

$allParams = array(
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'List Type', 'labtechco' ),
		'param_name' => 'type',
		'value'      => array(
			esc_attr__( 'None', 'labtechco' )                    => 'none',
			esc_attr__( 'Icon', 'labtechco' )                    => 'icon',
			esc_attr__( 'Disc', 'labtechco' )                    => 'disc',
			esc_attr__( 'Circle', 'labtechco' )                  => 'circle',
			esc_attr__( 'Square', 'labtechco' )                  => 'square',
			esc_attr__( 'Decimal (1, 2, 3, 4)', 'labtechco' )    => 'decimal',
			esc_attr__( 'Alphabetic (A, B, C, D)', 'labtechco' ) => 'upper-alpha',
			esc_attr__( 'Roman (I, II, III, IV)', 'labtechco' )  => 'roman',
		),
		'std'         => 'icon',
		'description' => esc_attr__( 'Select list style.', 'labtechco' ),
	),

	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'List icon color', 'labtechco' ),
		'param_name' => 'icon_color',
		'value'      => array( esc_attr__( 'Default (same as text color)', 'labtechco' ) => '' ) + ts_getVcShared( 'colors' ),
		'std'         => 'skincolor',
		'description' => esc_attr__( 'Select icon color.', 'labtechco' ),
		'param_holder_class' => 'ts_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Text Color", "labtechco"),
		"description" => esc_attr__("Select text color.", "labtechco"),
		"param_name"  => "ts_textcolor",
		'value'       => array( esc_attr__( 'Default', 'labtechco' ) => '' ) + ts_getVcShared( 'colors' ),
		'param_holder_class' => 'ts_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
	),
	
	
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'List Font size', 'labtechco' ),
		'param_name' => 'textsize',
		'value'      => array(
			esc_attr__( 'Default', 'labtechco' )     => '',
			esc_attr__( 'Small', 'labtechco' )       => 'small',
			esc_attr__( 'Medium', 'labtechco' )      => 'medium',
			esc_attr__( 'Large', 'labtechco' )       => 'large',
			esc_attr__( 'Extra Large', 'labtechco' ) => 'xlarge',
		),
		'std'         => '',
		'description' => esc_attr__( 'Select list font size. This will also apply to icon too', 'labtechco' ),
	),
);

$icon_options = vc_map_integrate_shortcode(
	'ts-icon',
	'icon_',
	'',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	),
	array(
		'element' => 'type',
		'value'   => 'icon',
	)
);

// Setting default icon for Font Awesome icon
foreach( $icon_options as $index=>$icon_option ){
	if( isset($icon_option['param_name']) && $icon_option['param_name']=='icon_icon_fontawesome' ){
		$icon_options[$index]['value'] = 'fa fa-angle-right';
	}
}

// each line
$lines = array();
$total = 20;
for( $x=1; $x <= $total ; $x++ ){
	$lines[] = array(
		'type'        => 'textarea_raw_html',
		'heading'     => sprintf( esc_attr__( 'List Line %s','labtechco' ), $x ),
		'param_name'  => 'line'.$x,
		'description' => esc_attr__( 'Enter text for the list line. Some html tags are allowed.', 'labtechco' ),
		'std'         => '',
		'value'       => '',
		'param_holder_class' => 'ts-simplify-textarea',
	);
}

// Merge all parameters
$params = array_merge( $allParams, $icon_options, $lines, array( vc_map_add_css_animation() ), array( ts_vc_ele_extra_class_option() ), array( ts_vc_ele_css_editor_option() ) );

// Changing default values
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'icon_type' ){
		$params[$i]['std']   = 'fontawesome';
	
	} else if( $param_name == 'icon_icon_fontawesome' ){
		$params[$i]['value'] = 'fa fa-caret-right';
		$params[$i]['std']   = 'fa fa-caret-right';
		
	} else if( $param_name == 'icon_icon_linecons' ){
		$params[$i]['value'] = 'vc_li vc_li-location';
		$params[$i]['std']   = 'vc_li vc_li-location';
	
	} else if( $param_name == 'icon_icon_themify' ){
		$params[$i]['value'] = 'themifyicon ti-angle-double-right';
		$params[$i]['std']   = 'themifyicon ti-angle-double-right';

	}
	
	$i++;
}

global $ts_sc_params_list;
$ts_sc_params_list = $params;

vc_map( array(
	'name'		=> esc_attr__( 'PBM List', 'labtechco' ),
	'base'		=> 'ts-list',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'PBM', 'labtechco' ),
	'params'	=> $params
) );