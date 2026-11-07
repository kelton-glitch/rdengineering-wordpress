<?php

/**
 *  ThemeStek: Schedule Box
 */
	$params = array_merge(
		ts_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'labtechco' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'labtechco' ),
			),
			array(
			'type'			=> 'param_group',
			'heading'		=> esc_attr__( 'Timelist', 'labtechco' ),
			'param_name'	=> 'pricelist',
			'group'			=> esc_attr__( 'Timelist', 'labtechco' ),
			'description'	=> esc_attr__( 'Set Service price', 'labtechco' ),
			'value'			=> urlencode( json_encode( array(
				array(
					'service_name' => esc_attr__( 'Monday - Friday', 'labtechco' ),
					'price'        => esc_attr__('8:00am - 7:00pm', 'labtechco' ),
				),
			
			))),
			'params' => array(
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Week Days', 'labtechco' ),
						'param_name'  => 'service_name',
						'description' => esc_attr__( 'Fill Service information here', 'labtechco' ),
						// 'value'       => '',
						'group'       => esc_attr__( 'Timelist', 'labtechco' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Timing', 'labtechco' ),
						'param_name'  => 'price',
						// 'value'       => '',
						'description' => esc_attr__( 'Fill Price details here eg: $30', 'labtechco' ),
						'group'       => esc_attr__( 'Timelist', 'labtechco' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				
			),
		),
			
			
		)
	);
	
	global $ts_vc_custom_element_pricelistbox;
	$ts_vc_custom_element_pricelistbox = $params;
	
	vc_map( array(
		'name'        => esc_attr__( 'PBM Timelist Box', 'labtechco' ),
		'base'        => 'ts-pricelistbox',
		"class"    => "",
		"icon"        => "icon-themestek-vc",
		'category'    => esc_attr__( 'PBM', 'labtechco' ),
		'params'      => $params,
	) );

