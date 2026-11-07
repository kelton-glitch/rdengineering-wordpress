<?php

/* Options */

// Getting social list
$global_social_list = ts_shared_social_list();

$sociallist = array_merge(
	array('' => esc_attr__('Select service','labtechco')),
	$global_social_list,
	array('rss'     => 'Rss Feed')
);
$sociallist = array_flip($sociallist);


$params = array_merge(
	ts_vc_heading_params(),
	array(
		array(
			'type'        => 'param_group',
			'heading'     => esc_attr__( 'Social Services List', 'labtechco' ),
			'param_name'  => 'socialservices',
			'description' => esc_attr__( 'Select social service and add URL for it.', 'labtechco' ).'<br><strong>'.esc_attr__('NOTE:','labtechco').'</strong> '.esc_attr__("You don't need to add URL if you are selecting 'RSS' in the social service",'labtechco'),
			'group'       => esc_attr__( 'Social Services', 'labtechco' ),
			'params'     => array(
				array( // First social service
					'type'        => 'dropdown',
					'heading'     => esc_attr__( 'Select Social Service', 'labtechco' ),
					'param_name'  => 'servicename',
					'std'         => 'twitter',
					'value'       => $sociallist,
					'description' => esc_attr__( 'Select social service', 'labtechco' ),
					'group'       => esc_attr__( 'Social Services', 'labtechco' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-4 vc_column',
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_attr__( 'Social URL', 'labtechco' ),
					'param_name'  => 'servicelink',
					'dependency'  => array(
						'element'            => 'servicename',
						'value_not_equal_to' => array( 'rss' )
					),
					'std'         => '#',
					'value'       => '',
					'description' => esc_attr__( 'Fill social service URL', 'labtechco' ),
					'group'       => esc_attr__( 'Social Services', 'labtechco' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-8 vc_column',
				),
			),
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Select column', 'labtechco' ),
			'param_name'  => 'column',
			'value'       => array(
				esc_attr__('One column','labtechco')   => 'one',
				esc_attr__('Two column','labtechco')   => 'two',
				esc_attr__('Three column','labtechco') => 'three',
				esc_attr__('Four column','labtechco')  => 'four',
				esc_attr__('Five column','labtechco')  => 'five',
				esc_attr__('Six column','labtechco')   => 'six',
			),
			'std'         => 'six',
			'description' => esc_attr__( 'Select how many column will show the social icons', 'labtechco' ),
			'group'       => esc_attr__( 'Social Services', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Social icon size', 'labtechco' ),
			'param_name'  => 'iconsize',
			'std'         => 'large',
			'value'       => array(
				esc_attr__('Small icon','labtechco')  => 'small',
				esc_attr__('Medium icon','labtechco') => 'medium',
				esc_attr__('Large icon','labtechco')  => 'large',
			),
			'description' => esc_attr__( 'Select social icon size', 'labtechco' ),
			'group'       => esc_attr__( 'Social Services', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
	),
	
	array( vc_map_add_css_animation() ),
	array( ts_vc_ele_extra_class_option() ),
	array( ts_vc_ele_css_editor_option() )
	
);

global $ts_sc_params_socialbox;
$ts_sc_params_socialbox = $params;


vc_map( array(
	'name'        => esc_attr__( 'PBM Social Box', 'labtechco' ),
	'base'        => 'ts-socialbox',
	"icon"        => "icon-themestek-vc",
	'category'    => esc_attr__( 'PBM', 'labtechco' ),
	'params'      => $params,
) );