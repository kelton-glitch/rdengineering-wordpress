<?php

// Icon picker
$icons_params = vc_map_integrate_shortcode( 'ts-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);

// each progress bar options
$param_group = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'labtechco' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar.', 'labtechco' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Value', 'labtechco' ),
		'param_name' => 'value',
		'description' => esc_attr__( 'Enter value of bar.', 'labtechco' ),
		'admin_label' => true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'labtechco' ),
		'param_name' => 'color',
		'value' => array(
				esc_attr__( 'Default', 'labtechco' ) => '',
			) + array(
				esc_attr__( 'Classic Grey', 'labtechco' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'labtechco' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'labtechco' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'labtechco' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'labtechco' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'labtechco' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'labtechco' ) => 'bar_black',
			) + ts_getVcShared( 'colors-dashed' ),
		'description' => esc_attr__( 'Select single bar background color.', 'labtechco' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	
	// Show / Hide icon
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Show Icon?', 'labtechco' ),
		'param_name' => 'add_icon',
		'value'      => array(
			esc_attr__( 'Yes', 'labtechco' ) => 'true',
			esc_attr__( 'No', 'labtechco' )  => 'false',
		),
		'std'         => 'true',
		'description' => esc_attr__( 'Want to show icon with the progress bar.', 'labtechco' ),
	)
);

// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );

$params =  array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Widget title', 'labtechco' ),
		'param_name' => 'title',
		'description' => esc_attr__( 'Enter text used as widget title (Note: located above content element).', 'labtechco' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_attr__( 'Values', 'labtechco' ),
		'param_name' => 'values',
		'description' => esc_attr__( 'Enter values for graph - value, title and color.', 'labtechco' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => esc_attr__( 'REFRACTIVE SURGERY', 'labtechco' ),
				'value' => '90',
			),
			array(
				'label' => esc_attr__( 'CATARACT SURGERY', 'labtechco' ),
				'value' => '80',
			),
			array(
				'label' => esc_attr__( 'GLAUCOMA', 'labtechco' ),
				'value' => '70',
			),
		) ) ),
		'params' => $param_group,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Units', 'labtechco' ),
		'param_name' => 'units',
		'description' => esc_attr__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'labtechco' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'labtechco' ),
		'param_name' => 'bgcolor',
		'std' => 'skincolor',
		'value' => array(
				esc_attr__( 'Classic Grey', 'labtechco' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'labtechco' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'labtechco' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'labtechco' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'labtechco' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'labtechco' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'labtechco' ) => 'bar_black',
			) + ts_getVcShared( 'colors-dashed' ),
		'description' => esc_attr__( 'Select bar background color.', 'labtechco' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_attr__( 'Options', 'labtechco' ),
		'param_name' => 'options',
		'value' => array(
			esc_attr__( 'Add stripes', 'labtechco' ) => 'striped',
			esc_attr__( 'Add animation (Note: visible only with striped bar).', 'labtechco' ) => 'animated',
		),
	),
);

$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( ts_vc_ele_extra_class_option() ),
	array( ts_vc_ele_css_editor_option() )
);
		
global $ts_sc_params_progressbar;
$ts_sc_params_progressbar = $params;

vc_map( array(
	'name'		=> esc_attr__( 'PBM Progress Bar', 'labtechco' ),
	'base'		=> 'ts-progress-bar',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'PBM', 'labtechco' ),
	'params'	=> $params
) );
