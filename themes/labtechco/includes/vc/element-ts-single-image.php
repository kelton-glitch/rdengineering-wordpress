<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$params = array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Widget title', 'labtechco' ),
		'param_name'	=> 'title',
		'description'	=> esc_attr__( 'Enter text used as widget title (Note: located above content element).', 'labtechco' ),
	),
	array(
		'type'			=> 'themestek_attach_image',
		'heading'		=> esc_attr__( 'Image', 'labtechco' ),
		'param_name'	=> 'image',
		'value'			=> '',
		'description'	=> esc_attr__( 'Select image from media library.', 'labtechco' ),
		'admin_label'	=> true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Image alignment', 'labtechco' ),
		'param_name' => 'alignment',
		'value' => array(
			esc_attr__( 'Left', 'labtechco' ) => 'left',
			esc_attr__( 'Right', 'labtechco' ) => 'right',
			esc_attr__( 'Center', 'labtechco' ) => 'center',
		),
		'description' => esc_attr__( 'Select image alignment.', 'labtechco' ),
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Extra class name', 'labtechco' ),
		'param_name' => 'el_class',
		'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'labtechco' ),
	),
	array(
		'type' => 'css_editor',
		'heading' => esc_attr__( 'CSS box', 'labtechco' ),
		'param_name' => 'css',
		'group' => esc_attr__( 'Design Options', 'labtechco' ),
	),
);
	
global $ts_sc_params_single_image;
$ts_sc_params_single_image = $params;

vc_map( array(
	'name'		=> esc_attr__( 'PBM Single Image', 'labtechco' ),
	'base'		=> 'ts-single-image',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> array( esc_attr__( 'PBM', 'labtechco' ) ),
	'params'	=> $params,
) );
