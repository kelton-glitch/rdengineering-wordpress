<?php

/* Options for ThemeStek Blogbox */

// Team Group
$teamGroupList = array();
if( taxonomy_exists('ts-team-group') ){
	$teamGroups    = get_terms( 'ts-team-group', array( 'hide_empty' => false ) );
	$teamGroupList = array();
	foreach($teamGroups as $teamGroup){
		$name                   = $teamGroup->name.' ('.$teamGroup->count.')';
		$teamGroupList[ $name ] = $teamGroup->slug;
	}
}

// Getting Options
$labtechco_theme_options      = get_option('labtechco_theme_options');
$team_type_title           = ( !empty($labtechco_theme_options['team_type_title']) ) ? $labtechco_theme_options['team_type_title'] : 'Team Members' ;
$team_type_title_singular  = ( !empty($labtechco_theme_options['team_type_title_singular']) ) ? $labtechco_theme_options['team_type_title_singular'] : 'Team Member' ;
$team_group_title          = ( !empty($labtechco_theme_options['team_group_title']) ) ? $labtechco_theme_options['team_group_title'] : 'Team Groups' ;
$team_group_title_singular = ( !empty($labtechco_theme_options['team_group_title_singular']) ) ? $labtechco_theme_options['team_group_title_singular'] : 'Team Group' ;


/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Headings','labtechco'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$boxParams = ts_box_params();

$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_attr__( 'Box View Style', 'labtechco' ),
			'description'	=> esc_attr__( 'Select box view style.', 'labtechco' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-1',
			
			'value'			=> themestek_global_template_list('team', false),
			
			'group'		  => esc_attr__( 'Box Style', 'labtechco' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Box Spacing", "labtechco"),
			"param_name"  => "box_spacing",
			"description" => esc_attr__("Spacing between each box.", "labtechco"),
			"value"       => array(
				esc_attr__("Default", "labtechco")                        => "",
				esc_attr__("0 pixel spacing (joint boxes)", "labtechco")  => "0px",
				esc_attr__("5 pixel spacing", "labtechco")                => "5px",
				esc_attr__("10 pixel spacing", "labtechco")               => "10px",
				esc_attr__("50 pixel spacing", "labtechco")               => "50px",
			),
			"std"         => "",
			'group'		  => esc_attr__( 'Box Style', 'labtechco' ),
		),
		
	),
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => sprintf( esc_attr__("Show Sortable %s Links",'labtechco'), $team_group_title ),
			"description" => sprintf( esc_attr__("Show sortable %s links above box items so user can sort by just single click.",'labtechco'), $team_group_title ),
			"param_name"  => "sortable",
			"value"       => array(
				esc_attr__('No','labtechco')  => 'no',
				esc_attr__('Yes','labtechco') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'            => 'boxview',
				'value_not_equal_to' => array( 'carousel' ),
			),
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Replace ALL word', 'labtechco' ),
			'param_name'  => 'allword',
			'description' => esc_attr__( 'Replace ALL word in sortable group links. Default is ALL word.', 'labtechco' ),
			"std"         => "All",
			'dependency'  => array(
				'element'   => 'sortable',
				'value'     => array( 'yes' ),
			),
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Pagination",'labtechco'),
			"description" => sprintf( esc_attr__("Show pagination links below %s boxes.",'labtechco'), $team_type_title_singular ),
			"param_name"  => "pagination",
			"value"       => array(
				esc_attr__('No','labtechco')  => 'no',
				esc_attr__('Yes','labtechco') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'    => 'sortable',
				'value_not_equal_to' => array( 'yes' ),
			),
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "checkbox",
			"heading"     => sprintf( esc_attr__("From %s", "labtechco"), $team_group_title_singular ),
			"param_name"  => "category",
			"description" => sprintf( esc_attr__('If you like to show %1$s from selected %2$s than select the category here.', 'labtechco'), $team_type_title, $team_group_title ),
			"value"       => $teamGroupList,
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order by",'labtechco'),
			"description" => sprintf( esc_attr__("Sort retrieved %s by parameter.",'labtechco'), $team_type_title_singular ),
			"param_name"  => "orderby",
			"value"       => array(
				esc_attr__('No order (none)','labtechco')           => 'none',
				esc_attr__('Order by post id (ID)','labtechco')     => 'ID',
				esc_attr__('Order by author (author)','labtechco')  => 'author',
				esc_attr__('Order by title (title)','labtechco')    => 'title',
				esc_attr__('Order by slug (name)','labtechco')      => 'name',
				esc_attr__('Order by date (date)','labtechco')      => 'date',
				esc_attr__('Order by last modified date (modified)','labtechco') => 'modified',
				esc_attr__('Random order (rand)','labtechco')       => 'rand',
				esc_attr__('Order by number of comments (comment_count)','labtechco') => 'comment_count',
				
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "date",
			'group'			   => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order",'labtechco'),
			"description" => esc_attr__("Designates the ascending or descending order of the 'orderby' parameter.",'labtechco'),
			"param_name"  => "order",
			"value"       => array(
				esc_attr__('Ascending (1, 2, 3; a, b, c)','labtechco')  => 'ASC',
				esc_attr__('Descending (3, 2, 1; c, b, a)','labtechco') => 'DESC',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "DESC",
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show", "labtechco"),
			"param_name"  => "show",
			"description" => sprintf( esc_attr__("How many %s item you want to show.", "labtechco"), $team_type_title ),
			"value"       => array(
				esc_attr__("All", "labtechco") => "-1",
				esc_attr__("1", "labtechco")  => "1",
				esc_attr__("2", "labtechco") => "2",
				esc_attr__("3", "labtechco") => "3",
				esc_attr__("4", "labtechco") => "4",
				esc_attr__("5", "labtechco") => "5",
				esc_attr__("6", "labtechco") => "6",
				esc_attr__("7", "labtechco") => "7",
				esc_attr__("8", "labtechco") => "8",
				esc_attr__("9", "labtechco") => "9",
				esc_attr__("10", "labtechco") => "10",
				esc_attr__("11", "labtechco") => "11",
				esc_attr__("12", "labtechco") => "12",
				esc_attr__("13", "labtechco") => "13",
				esc_attr__("14", "labtechco") => "14",
				esc_attr__("15", "labtechco") => "15",
				esc_attr__("16", "labtechco") => "16",
				esc_attr__("17", "labtechco") => "17",
				esc_attr__("18", "labtechco") => "18",
				esc_attr__("18", "labtechco") => "19",
				esc_attr__("20", "labtechco") => "20",
			),
			"std"  => "4",
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		
	),
	$boxParams,
	array(
		ts_vc_ele_css_editor_option(),
	)
	
);

$params = $allParams;

// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'three';
	
	} else if( $param_name == 'show' ){
		$params[$i]['std'] = '3';
	
	} else if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Team';
	
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
			
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
		
	}
	
	$i++;
}

global $ts_sc_params_teambox;
$ts_sc_params_teambox = $params;

vc_map( array(
	"name"     => sprintf( esc_attr__("PBM %s Box", "labtechco"), $team_type_title_singular ),
	"base"     => "ts-teambox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_attr__( 'PBM', 'labtechco' ),
	"params"   => $params,
) );
