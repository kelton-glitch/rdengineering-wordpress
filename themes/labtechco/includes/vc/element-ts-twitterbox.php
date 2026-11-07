<?php
/* Options */
$allParams = array(
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Twitter handle (Twitter Username)",'labtechco'),
			"param_name"	=> "username",
			"description"	=> esc_attr__('Twitter user name. Example "envato".','labtechco')
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__('"Follow us" text after big icon','labtechco'),
			"param_name"	=> "followustext",
			"description"	=> esc_attr__('(optional) Follow us text after the big Twitter icon so user can click on it and go to Twitter profile page.','labtechco')
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Show Tweets",'labtechco'),
			"param_name"	=> "show",
			"description"	=> esc_attr__('How many Tweets you like to show.','labtechco'),
			'value' => array(
				esc_attr__( '1', 'labtechco' ) => '1',
				esc_attr__( '2', 'labtechco' ) => '2',
				esc_attr__( '3', 'labtechco' ) => '3',
				esc_attr__( '4', 'labtechco' ) => '4',
				esc_attr__( '5', 'labtechco' ) => '5',
				esc_attr__( '6', 'labtechco' ) => '6',
				esc_attr__( '7', 'labtechco' ) => '7',
				esc_attr__( '8', 'labtechco' ) => '8',
				esc_attr__( '9', 'labtechco' ) => '9',
				esc_attr__( '10', 'labtechco' ) => '10',
			),
			'std' => '3',
		),
		
	);

$boxParams  = ts_box_params();
$css_editor = array( ts_vc_ele_css_editor_option() );

$params = array_merge( $allParams, $boxParams, $css_editor );

// Changing default values
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'one';
	
	} else if( $param_name == 'view' ){
		$params[$i]['std'] = 'carousel';
		
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
		
	} else if( $param_name == 'carousel_nav' ){ // Removing "About Carousel" option as it's not used here.
		unset( $params[$i]['value']["Above Carousel"] );
		
	}
	
	$i++;
}

global $ts_sc_params_twitterbox;
$ts_sc_params_twitterbox = $params;

vc_map( array(
	"name"        => esc_attr__("PBM Twitter Box",'labtechco'),
	"base"        => "ts-twitterbox",
	"class"       => "",
	'category' => esc_attr__( 'PBM', 'labtechco' ),
	"icon"        => "icon-themestek-vc",
	"params"      => $params,
) );