<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$labtechco_theme_options		   = get_option('labtechco_theme_options');
$pf_cat_title_singular     = ( !empty($labtechco_theme_options['pf_cat_title_singular']) ) ? esc_attr($labtechco_theme_options['pf_cat_title_singular']) : esc_attr__('Portfolio Category', 'labtechco') ;
$service_cat_title_singular     = ( !empty($labtechco_theme_options['service_cat_title_singular']) ) ? esc_attr($labtechco_theme_options['service_cat_title_singular']) : esc_attr__('Service Category', 'labtechco') ;
$team_group_title_singular = ( !empty($labtechco_theme_options['team_group_title_singular']) ) ? esc_attr($labtechco_theme_options['team_group_title_singular']) : esc_attr__('Team Group', 'labtechco') ;



// Taxonomy Options
$ts_taxonomy_options     = array();


// For Portfolio Category
$ts_taxonomy_options[]   = array(
	'id'       => 'ts_taxonomy_options',
	'taxonomy' => 'ts-portfolio-category', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_attr__('Featured Image URL', 'labtechco'),
			'after' => '<p>' . sprintf( esc_attr__('Select featured image for this %s. Please upload the image first from media section.', 'labtechco'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'labtechco'),
				'frame_title'  => esc_attr__('Select an image', 'labtechco'),
				'insert_title' => esc_attr__('Use this image', 'labtechco'),
			),
		),
		array(
			'id'            => 'tax_titlebar_image',
			'type'          => 'upload',
			'title' => esc_attr__('Titlebar Bakground Image URL', 'labtechco'),
			'after' => '<p>' . sprintf( esc_attr__('Select Titlebar background image for this %s. Please upload the image first from media section.', 'labtechco'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'labtechco'),
				'frame_title'  => esc_attr__('Select an image', 'labtechco'),
				'insert_title' => esc_attr__('Use this image', 'labtechco'),
			),
		),
	),
);


// For Service Category
$ts_taxonomy_options[]   = array(
	'id'       => 'ts_taxonomy_options',
	'taxonomy' => 'ts-service-category', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_attr__('Featured Image URL', 'labtechco'),
			'after' => '<p>' . sprintf( esc_attr__('Select featured image for this %s. Please upload the image first from media section.', 'labtechco'), $service_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'labtechco'),
				'frame_title'  => esc_attr__('Select an image', 'labtechco'),
				'insert_title' => esc_attr__('Use this image', 'labtechco'),
			),
		),
		array(
			'id'            => 'tax_titlebar_image',
			'type'          => 'upload',
			'title' => esc_attr__('Titlebar Bakground Image URL', 'labtechco'),
			'after' => '<p>' . sprintf( esc_attr__('Select Titlebar background image for this %s. Please upload the image first from media section.', 'labtechco'), $service_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'labtechco'),
				'frame_title'  => esc_attr__('Select an image', 'labtechco'),
				'insert_title' => esc_attr__('Use this image', 'labtechco'),
			),
		),
	),
);


// For Team Group
$ts_taxonomy_options[]   = array(
	'id'       => 'ts_taxonomy_options',
	'taxonomy' => 'ts-team-group', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_attr__('Featured Image URL', 'labtechco'),
			'after' => '<p>' . sprintf( esc_attr__('Select featured image for this %s. Please upload the image first from media section.', 'labtechco'), $team_group_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'labtechco'),
				'frame_title'  => esc_attr__('Select an image', 'labtechco'),
				'insert_title' => esc_attr__('Use this image', 'labtechco'),
			),
		),
		array(
			'id'            => 'tax_titlebar_image',
			'type'          => 'upload',
			'title' => esc_attr__('Titlebar Bakground Image URL', 'labtechco'),
			'after' => '<p>' . sprintf( esc_attr__('Select Titlebar background image for this %s. Please upload the image first from media section.', 'labtechco'), $team_group_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'labtechco'),
				'frame_title'  => esc_attr__('Select an image', 'labtechco'),
				'insert_title' => esc_attr__('Use this image', 'labtechco'),
			),
		),
	),
);
