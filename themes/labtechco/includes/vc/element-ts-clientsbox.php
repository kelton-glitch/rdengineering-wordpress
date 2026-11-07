<?php

/* Options */

$clientsGroupList = array();
if( taxonomy_exists('ts-client-group') ){
	$clientsGroupList_data = get_terms( 'ts-client-group', array( 'hide_empty' => false ) );
	$clientsGroupList      = array();
	foreach($clientsGroupList_data as $cat){
		$clientsGroupList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
	}
}


/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Main Heading','labtechco'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

/**
 * Boxes Appearance options
 */
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
			'value'			=> themestek_global_template_list('clients', false),
			'group'		  => esc_attr__( 'Box Style', 'labtechco' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show HOVER image?",'labtechco'),
			"description" => esc_attr__("Show HOVER image too. This will work only if you set hover image for each client logo.",'labtechco'),
			"param_name"  => "show_hover",
			"value"       => array(
				esc_attr__('Yes','labtechco') => 'yes',
				esc_attr__('No','labtechco')  => 'no',
			),
			"std"         => "yes",
			'group'		  => esc_attr__( 'Box Style', 'labtechco' ),
			'edit_field_class' => 'vc_col-sm-8 vc_column',
		),
	),
	
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Sortable GROUP Links",'labtechco'),
			"description" => esc_attr__("Show sortable GROUP links above logos so user can sort by just single click.",'labtechco'),
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
			'description' => esc_attr__( 'Replace ALL word in sortable category links. Default is ALL word.', 'labtechco' ),
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
			"description" => esc_attr__("Show pagination links below each logo boxes.",'labtechco'),
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
			"heading"     => esc_attr__("From Group", "labtechco"),
			"param_name"  => "category",
			"description" => esc_attr__("Select group so it will show client logo from selected group only.", "labtechco"),
			"value"       => $clientsGroupList,
			"std"         => "",
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order by",'labtechco'),
			"description" => esc_attr__("Sort retrieved portfolio by parameter.",'labtechco'),
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
			'group'		  => esc_attr__('Box Options','labtechco'),
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
			"description" => esc_attr__("Total Clients Logos you want to show.", "labtechco"),
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
				esc_attr__("19", "labtechco") => "19",
				esc_attr__("20", "labtechco") => "20",
			),
			"std"  => "10",
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Tooltip on Logo?",'labtechco'),
			"description" => esc_attr__("Select YES to show Tooltip on the logo.",'labtechco'),
			"param_name"  => "show_tooltip",
			"value"       => array(
				esc_attr__("Yes", "labtechco") => "yes",
				esc_attr__("No", "labtechco")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Add link to all logos?",'labtechco'),
			"description" => esc_attr__("Select YES to add link to all logos. Please note that link should be added to each client logo. If no link found than the logo will appear without link.",'labtechco'),
			"param_name"  => "add_link",
			"value"       => array(
				esc_attr__("Yes", "labtechco") => "yes",
				esc_attr__("No", "labtechco")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
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
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Clients';
	
	} else if( $param_name == 'column' ){
		$params[$i]['std'] = 'five';
		
	} else if( $param_name == 'boxview' ){
		$params[$i]['std'] = 'carousel';
		
	} else if( $param_name == 'content' ){
		$params[$i]['std'] = '';
		
	} else if( $param_name == 'carousel_loop' ){
		$params[$i]['std'] = '1';
		
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
		
	} else if( $param_name == 'carousel_nav' ){
		$params[$i]['std'] = '0';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
			
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
		
	}
	
	$i++;
}

global $ts_sc_params_clients;
$ts_sc_params_clients = $params;

vc_map( array(
	"name"     => esc_attr__("PBM Client Logo Box", "labtechco"),
	"base"     => "ts-clientsbox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_attr__( 'PBM', 'labtechco' ),
	"params"   => $params,
) );
