<?php

/* Options for ThemeStek Icon */

/*
 * Icon Element
 * @since 4.4
 */

/**
 *  Show selected icon library only
 */
global $labtechco_theme_options;

$icon_library = array();
if( function_exists('tste_labtechco_icon_libraries') ){
	$icon_library = tste_labtechco_icon_libraries();
}

$icon_dropdown_array = array();
$icon_element_array  = array();

if( is_array($icon_library) && count($icon_library)>0 ){
foreach( $icon_library as $library_id=>$library ){
	
	$icon_dropdown_array[$library[0]] = $library_id;
	
	$icon_element_array[]  = array(
		'type'        => 'themestek_iconpicker',
		'heading'     => esc_attr__( 'Icon', 'labtechco' ),
		'param_name'  => 'icon_'.$library_id,
		'value'       => $library[1], // default value to backend editor admin_label
		'settings'    => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => $library_id,
		),
		'dependency'  => array(
			'element'   => 'type',
			'value'     => $library_id,
		),
		'description' => esc_attr__( 'Select icon from library.', 'labtechco' ),
		'edit_field_class' => 'vc_col-sm-9 vc_column',
	);
	
}
}
/* Select icon library code end here */

// All icon related elements
$icon_elements = array_merge(
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon library', 'labtechco' ),
			'value'       => $icon_dropdown_array,
			'std'         => '',
			'admin_label' => true,
			'param_name'  => 'type',
			'description' => esc_attr__( 'Select icon library.', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		)
	),
	
	$icon_element_array
	
);

$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Icon color', 'labtechco' ),
		'param_name'  => 'color',
		'value'       => array_merge( 
			ts_getVcShared( 'colors' ),
			array(
				esc_attr__( 'Classic Grey', 'labtechco' )      => 'bar_grey',
				esc_attr__( 'Classic Blue', 'labtechco' )      => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'labtechco' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'labtechco' )     => 'bar_green',
				esc_attr__( 'Classic Orange', 'labtechco' )    => 'bar_orange',
				esc_attr__( 'Classic Red', 'labtechco' )       => 'bar_red',
				esc_attr__( 'Classic Black', 'labtechco' )     => 'bar_black',
			),
			array( esc_attr__( 'Custom color', 'labtechco' ) => 'custom' )
		),
		'std'         => 'skincolor',
		'description' => esc_attr__( 'Select icon color.', 'labtechco' ),
		'param_holder_class' => 'ts_vc_colored-dropdown',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom color', 'labtechco' ),
		'param_name'  => 'custom_color',
		'description' => esc_attr__( 'Select custom icon color.', 'labtechco' ),
		'dependency'  => array(
			'element'   => 'color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background shape', 'labtechco' ),
		'param_name'  => 'background_style',
		'value'       => array(
			esc_attr__( 'None', 'labtechco' ) => '',
			esc_attr__( 'Circle', 'labtechco' ) => 'rounded',
			esc_attr__( 'Square', 'labtechco' ) => 'boxed',
			esc_attr__( 'Rounded', 'labtechco' ) => 'rounded-less',
			esc_attr__( 'Outline Circle', 'labtechco' ) => 'rounded-outline',
			esc_attr__( 'Outline Square', 'labtechco' ) => 'boxed-outline',
			esc_attr__( 'Outline Rounded', 'labtechco' ) => 'rounded-less-outline',
		),
		'std'         => '',
		'description' => esc_attr__( 'Select background shape and style for icon.', 'labtechco' ),
		'param_holder_class' => 'ts-simplify-textarea',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background color', 'labtechco' ),
		'param_name'  => 'background_color',
		'value'       => array_merge( array( esc_attr__( 'Transparent', 'labtechco' ) => 'transparent' ), ts_getVcShared( 'colors' ), array( esc_attr__( 'Custom color', 'labtechco' ) => 'custom' ) ),
		'std'         => 'grey',
		'description' => esc_attr__( 'Select background color for icon.', 'labtechco' ),
		'param_holder_class' => 'ts_vc_colored-dropdown',
		'dependency'  => array(
			'element'   => 'background_style',
			'not_empty' => true,
		),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom background color', 'labtechco' ),
		'param_name'  => 'custom_background_color',
		'description' => esc_attr__( 'Select custom icon background color.', 'labtechco' ),
		'dependency'  => array(
			'element'   => 'background_color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Size', 'labtechco' ),
		'param_name'  => 'size',
		'value'       => array_merge( ts_getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
		'std'         => 'md',
		'description' => esc_attr__( 'Icon size.', 'labtechco' )
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Icon alignment', 'labtechco' ),
		'param_name' => 'align',
		'value'      => array(
			esc_attr__( 'Left', 'labtechco' )   => 'left',
			esc_attr__( 'Right', 'labtechco' )  => 'right',
			esc_attr__( 'Center', 'labtechco' ) => 'center',
		),
		'std'         => 'left',
		'description' => esc_attr__( 'Select icon alignment.', 'labtechco' ),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_attr__( 'URL (Link)', 'labtechco' ),
		'param_name'  => 'link',
		'description' => esc_attr__( 'Add link to icon.', 'labtechco' )
	),
	vc_map_add_css_animation(),
	ts_vc_ele_extra_class_option(),
	ts_vc_ele_css_editor_option(),
);


// All params
$params = array_merge( $icon_elements, $allparams );
	
global $ts_sc_params_icon;
$ts_sc_params_icon = $params;

vc_map( array(
	'name'     => esc_attr__( 'PBM Icon', 'labtechco' ),
	'base'     => 'ts-icon',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_attr__( 'PBM', 'labtechco' ) ),
	'params'   => $params,
	'js_view'  => 'VcIconElementView_Backend',
) );
