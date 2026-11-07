<?php

/* Options */
$params = array(
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Phone",'labtechco'),
		"description" => esc_attr__("Write phone number here. Example: (+01) 123 456 7890",'labtechco'),
		"param_name"  => "phone",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Email",'labtechco'),
		"description" => esc_attr__("Write email here. Example: info@example.com",'labtechco'),
		"param_name"  => "email",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Website",'labtechco'),
		"description" => esc_attr__("Write website URL here.",'labtechco'),
		"param_name"  => "website",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Address",'labtechco'),
		"description" => esc_attr__("Write address here. You can write in multi-line too.",'labtechco'),
		"param_name"  => "address",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Time",'labtechco'),
		"description" => esc_attr__("Write time here. You can write in multi-line too.",'labtechco'),
		"param_name"  => "time",
	),
);

$params    = array_merge( $params, array( vc_map_add_css_animation() ), array( ts_vc_ele_extra_class_option() ), array( ts_vc_ele_css_editor_option() ) );

global $ts_sc_params_contactbox;
$ts_sc_params_contactbox = $params;

vc_map( array(
	"name"     => esc_attr__("PBM Contact Details Box",'labtechco'),
	"base"     => "ts-contactbox",
	"class"    => "",
	'category' => esc_attr__( 'PBM', 'labtechco' ),
	"icon"     => "icon-themestek-vc",
	"params"   => $params
) );