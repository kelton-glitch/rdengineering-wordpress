<?php

/* Options for ThemeStek Servicebox */
$bgcolor_custom = array();
$bgcolor_custom[__( 'Transparent', 'labtechco' )] = 'transparent';
$bgcolor_custom[__( 'Skin color', 'labtechco' )]  = 'skincolor';
$boxcolor =   array_merge( $bgcolor_custom , ts_getVcShared( 'colors-dashed' ) ) ;

$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Content','labtechco'),
	array(
		'exclude' => array(
			'txt_align',
			'seperator',
			'reverse_heading',
			'el_class',
			'css_animation',
			'css',
		),
	)
);
if ( is_array( $heading_element ) && ! empty( $heading_element ) ) {
	foreach ( $heading_element as $key => $param ) {
		
		if ( is_array( $param ) && isset( $param['param_name'] ) ){
			
			if( $param['param_name'] == 'content' ){
				$heading_element[$key]['value'] = esc_attr('Lorem ipsum dolor sit amet,con sec tetur adipisicing elit,sed do.');
				$heading_element[$key]['type'] = 'textarea';
				
			} else if( $param['param_name'] == 'reverse_heading' ){
				$heading_element[$key]['std'] = 'no';
				$heading_element[$key]['value'] = 'no';
				
			}
			
			
		}
	}
}

$btn_element = vc_map_integrate_shortcode( 'ts-btn', 'btn_', esc_attr__('Button','labtechco'),
	array(
		'exclude' => array(
			'style',
			'shape',
			'color',
			'size',
			'font_weight',
			'align',
			'i_align',
			'gradient_color_1',
			'gradient_color_2',
			'gradient_custom_color_1',
			'gradient_custom_color_2',
			'gradient_text_color',
			'custom_background',
			'custom_text',
			'outline_custom_color',
			'outline_custom_hover_background',
			'outline_custom_hover_text',
			'button_block',
			'css_animation',
			'css',
		),
	),
	array(
		'element' => 'show_btn',
		'value'   => 'yes',
	)
);

// Extra Class Name
$ts_extra_class = ts_vc_ele_extra_class_option();
$ts_extra_class['group'] = esc_attr__( 'Content', 'labtechco' );

$params = array_merge(
	
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_attr__( 'Service Box Style', 'labtechco' ),
			'description'	=> esc_attr__( 'Select Service box style.', 'labtechco' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-1',
			'value'			=> themestek_global_template_list('iconheadingbox', false),
			'group'		  => esc_attr__( 'Box Style', 'labtechco' ),
		),
	),
	
	// ICON TYPE
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon', 'labtechco' ),
			'description' => esc_attr__( 'Show/hide icon or show text (in place of icon).', 'labtechco' ),
			'param_name'  => 'icon_type',
			'std'         => 'icon',
			'value'       => array(
				esc_attr__( 'Show icon', 'labtechco' )	=> 'icon',
				esc_attr__( 'Show Image', 'labtechco' )	=> 'image',
				esc_attr__( 'No icon', 'labtechco' )	=> 'none',
				esc_attr__( 'Show small text in place of icon', 'labtechco' )	=> 'text',
			),
			'group'		  => esc_attr__( 'Icon', 'labtechco' ),
		),
	),
	
	// ICON TYPE: ICON
	vc_map_integrate_shortcode( 'ts-icon', 'i_', esc_attr__( 'Icon', 'labtechco' ),
		array(
			'include_only_regex' => '/^(type|icon_\w*)/',
		),
		array(
			'element' => 'icon_type',
			'value'     => 'icon',
		)
	),
	
	// ICON TYPE: TEXT
	array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Small text', 'labtechco' ),
			'param_name'  => 'small_text',
			'value'		  => '01',
			'description' => esc_attr__( 'This text will appear in place of icon. This is useful if you like to show small text like "01" or "Hi" small texts.', 'labtechco' ),
			'group'		  => esc_attr__( 'Icon', 'labtechco' ),
			
			'dependency'  => array(
				'element'	=> 'icon_type',
				'value'		=> array('text'),
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Big Number After icon', 'labtechco' ),
			'param_name'  => 'big_number_text',
			'value'		  => '01',
			'description' => esc_attr__( 'This text will appear after the icon as big text.', 'labtechco' ),
			'group'		  => esc_attr__( 'Icon', 'labtechco' ),
			'dependency'  => array(
				'element'	=> 'boxstyle',
				'value'		=> array( 'style-4' ),
			)
		),
	),

	// ICON TYPE: IMAGE
	array(
		array(
			'type'        => 'attach_image',
			'heading'     => esc_attr__( 'Select Image (normal image)', 'labtechco' ),
			'param_name'  => 'image',
			'value'		  => '',
			'description' => esc_attr__( 'This image will appear in place of icon. ', 'labtechco' ),
			'group'		  => esc_attr__( 'Icon', 'labtechco' ),
			'dependency'  => array(
				'element'	=> 'icon_type',
				'value'		=> array('image'),
			)
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_attr__( 'Select Image (mouse over image)', 'labtechco' ),
			'param_name'  => 'image_hover',
			'value'		  => '',
			'description' => esc_attr__( 'This image will appear on mouse over.', 'labtechco' ) . '<br> <strong>' . esc_attr__( 'NOTE:', 'labtechco' ) . '</strong>' . esc_attr__( 'This must be same size as above image.', 'labtechco' ),
			'group'		  => esc_attr__( 'Icon', 'labtechco' ),
			'dependency'  => array(
				'element'	=> 'icon_type',
				'value'		=> array('image'),
			)
		),
	),

	// Heading
	$heading_element,
	
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Show button', 'labtechco' ),
			'description' => esc_attr__( 'Show/hide button', 'labtechco' ),
			'param_name'  => 'show_btn',
			'std'         => 'no',
			'value'       => array(
				esc_attr__( 'Yes', 'labtechco' )	=> 'yes',
				esc_attr__( 'No', 'labtechco' )	=> 'no',
			),
			'group'		  => esc_attr__( 'Content', 'labtechco' ),
		),
	),
	
	// Button
	$btn_element,
	
	array(
		/// cta3
		vc_map_add_css_animation(),
		$ts_extra_class,
		ts_vc_ele_css_editor_option(),
		ts_responsive_padding_margin_option(),
	)
	
	
);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'txt_align' ){ // Remove Text Alignment option
		$params[$i]['dependency'] = array(  // This is to hide this option forever
			'element'  => 'btn_style',
			'value'    => array( 'abcdefg' )
		);
	
	} else if( $param_name == 'h2' ){
		$params[$i]['std']         = esc_attr__( 'This is heading', 'labtechco' );
		
	} else if( $param_name == 'btn_title' ){
		$params[$i]['std']         = '';
		$params[$i]['description'] = esc_attr__( 'NOTE: Leave this blank to remove the button.', 'labtechco' );
	
	} else if( $param_name == 'btn_add_icon' ){
		$params[$i]['std']   = false;
	
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h2_google_fonts' ){
		$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
	
	} else if( $param_name == 'h4_google_fonts' ){
		$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
	
	} else if( $param_name == 'css_animation' ){
		$params[$i]['group'] = esc_attr__( 'Animations', 'labtechco' );
	
	}
	
	$i++;
} // Foreach

global $ts_sc_params_iconheadingbox;
$ts_sc_params_iconheadingbox = $params;

vc_map( array(
	'name'        => esc_attr__( 'PBM Icon Heading Box', 'labtechco' ),
	'base'        => 'ts-iconheadingbox',
	"icon"        => "icon-themestek-vc",
	'category'    => esc_attr__( 'PBM', 'labtechco' ),
	'params'      => $params,
) );