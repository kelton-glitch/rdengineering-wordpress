<?php

$params = array(
	
	array(
		'type'			=> 'textarea',
		'heading'		=> esc_attr__( 'Action Box title', 'labtechco' ),
		'param_name'	=> 'title',
		'description'	=> esc_attr__( 'Enter text used as Action box title.', 'labtechco' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Action Box Subtitle', 'labtechco' ),
		'param_name'	=> 'subtitle',
		'description'	=> esc_attr__( 'Enter text used as Action box SUbtitle.', 'labtechco' ),
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
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Action Box Button title', 'labtechco' ),
		'param_name'	=> 'btn_title',
		'description'	=> esc_attr__( 'Enter text used as Action box Button title.', 'labtechco' ),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Action Box Button Link', 'labtechco' ),
		'param_name'	=> 'btn_link',
		'description'	=> esc_attr__( 'Enter text used as Action box Button Link.', 'labtechco' ),
	),
	array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Fact In Digits box Style', 'labtechco' ),
		'description'	=> esc_attr__( 'Select box style for Facts in Digits box. This will show rotating number with icon and heading.', 'labtechco' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> themestek_global_template_list('actionbox', false),
		'group'  	    => esc_attr__( 'Box Style', 'labtechco' ),
	),
	
);
	
global $ts_sc_params_action_box;
$ts_sc_params_action_box = $params;

vc_map( array(
	'name'		=> esc_attr__( 'PBM Action Box', 'labtechco' ),
	'base'		=> 'ts-action-box',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> array( esc_attr__( 'PBM', 'labtechco' ) ),
	'params'	=> $params,
) );
