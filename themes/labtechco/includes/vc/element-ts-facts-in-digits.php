<?php

/* Options */

$icons_params = vc_map_integrate_shortcode( 'ts-icon', 'i_', esc_attr__('Icon','labtechco'), array(
	'include_only_regex' => '/^(type|icon_\w*)/',
	// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
), array(
	'element' => 'boxstyle',
	'value' => array( 'style-4' ),
) );

$icons_params_new = array();

/* Adding class for two column */
foreach( $icons_params as $param ){
	$icons_params_new[] = $param;
}

$allParams = array(

	array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Fact In Digits box Style', 'labtechco' ),
		'description'	=> esc_attr__( 'Select box style for Facts in Digits box. This will show rotating number with icon and heading.', 'labtechco' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> themestek_global_template_list('fidbox', false),
		'group'  	    => esc_attr__( 'Box Style', 'labtechco' ),
	),
	
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Subtitle Text', 'labtechco'),
		'param_name'	=> 'subtitle',
		'std'			=> esc_attr__('Subtitle Text', 'labtechco'),
		'description'	=> esc_attr__('Enter text for the subtitle. Leave blank if no title is needed.', 'labtechco'),
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
		'dependency'  => array(
			'element'	=> 'boxstyle',
			'value'		=> array( 'style-14' ),
		),
	),

	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Heading Text', 'labtechco'),
		'param_name'	=> 'title',
		'std'			=> esc_attr__('Title Text', 'labtechco'),
		'description'	=> esc_attr__('Enter text for the title. Leave blank if no title is needed.', 'labtechco'),
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
	),
	
	array(
		'type'        => 'textarea',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'     => esc_attr__( 'Small Description', 'labtechco' ),
		'param_name'  => 'desc',
		'std'			=> esc_attr__('Small Description', 'labtechco'),
		'description'	=> esc_attr__('Enter text for the Small Description', 'labtechco'),
		'group'		  => esc_attr__( 'Content', 'labtechco' ),
		'dependency'  => array(
			'element'	=> 'boxstyle',
			'value'		=> array( 'style-8', 'style-9', 'style-11', 'style-14' ),
		),
	),

	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'class'				=> '',
		'heading'			=> esc_attr__('Rotating Number', 'labtechco'),
		'param_name'		=> 'digit',
		'std'				=> '85',
		'description'		=> esc_attr__('Enter rotating number digit here.', 'labtechco'),
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'heading'			=> esc_attr__('Text Before Number', 'labtechco'),
		'param_name'		=> 'before',
		'description'		=> esc_attr__('Enter text which appear just before the rotating numbers.', 'labtechco'),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"heading"		=> esc_attr__("Text Style",'labtechco'),
		"param_name"	=> "beforetextstyle",
		"description"	=> esc_attr__('Select text style for the text.', 'labtechco') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','labtechco') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','labtechco'),
		'value' => array(
			esc_attr__( 'Superscript', 'labtechco' ) => 'sup',
			esc_attr__( 'Subscript', 'labtechco' )   => 'sub',
			esc_attr__( 'Normal', 'labtechco' )      => 'span',
		),
		'std' => 'sup',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'class'				=> '',
		'heading'			=> esc_attr__('Text After Number', 'labtechco'),
		'param_name'		=> 'after',
		'description'		=> esc_attr__('Enter text which appear just after the rotating numbers.', 'labtechco'),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"class"			=> "",
		"heading"		=> esc_attr__("Text Style",'labtechco'),
		"param_name"	=> "aftertextstyle",
		"description"	=> esc_attr__('Select text style for the text.', 'labtechco') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','labtechco') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','labtechco'),
		'value' => array(
			esc_attr__( 'Superscript', 'labtechco' ) => 'sup',
			esc_attr__( 'Subscript', 'labtechco' )   => 'sub',
			esc_attr__( 'Normal', 'labtechco' )      => 'span',
		),
		'std' => 'sub',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
	),
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Rotating digit Interval', 'labtechco'),
		'param_name'	=> 'interval',
		'std'			=> '5',
		'description'	=> esc_attr__('Enter rotating interval number here.', 'labtechco'),
		'group'		    => esc_attr__( 'Content', 'labtechco' ),
	)
);

$extra_class = ts_vc_ele_extra_class_option();
$extra_class['group'] = esc_attr__( 'Content', 'labtechco' );

$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_attr__( 'Content', 'labtechco' );

// merging all options
$params = array_merge( $allParams, $icons_params_new );

// merging extra options like css animation, css options etc
$params = array_merge(
	$params,
	array( $css_animation ),
	array( $extra_class ),
	array( ts_vc_ele_css_editor_option() )
);

global $ts_sc_params_facts_in_digits;
$ts_sc_params_facts_in_digits = $params;

vc_map( array(
	'name'		=> esc_attr__( 'PBM Facts in digits', 'labtechco' ),
	'base'		=> 'ts-facts-in-digits',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'PBM', 'labtechco' ),
	'params'	=> $params
) );
