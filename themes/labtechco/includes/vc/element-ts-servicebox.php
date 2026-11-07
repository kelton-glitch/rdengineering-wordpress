<?php

/* Options for ThemeStek Blogbox */

$serviceCatList = array();
if( taxonomy_exists('ts-service-category') ){
	$serviceCatList_data = get_terms( 'ts-service-category', array( 'hide_empty' => false ) );
	$serviceCatList      = array();
	foreach($serviceCatList_data as $cat){
		$serviceCatList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
	}
}

$serviceList = array();
if( taxonomy_exists('ts-portfolio-category') ){
	$serviceList_data = get_posts( array(
		'post_type'        => 'ts-service',
		'numberposts'      => -1,
	) );
	$serviceList      = array();
	foreach($serviceList_data as $post_array){
		$serviceList[ esc_attr($post_array->post_title) ] = esc_attr($post_array->ID);
	}
}

// Getting Options
$labtechco_theme_options   = get_option('labtechco_theme_options');
$service_type_title          = ( !empty($labtechco_theme_options['service_type_title']) ) ? $labtechco_theme_options['service_type_title'] : 'Service' ;
$service_type_title_singular = ( !empty($labtechco_theme_options['service_type_title_singular']) ) ? $labtechco_theme_options['service_type_title_singular'] : 'Service' ;
$service_cat_title           = ( !empty($labtechco_theme_options['service_cat_title']) ) ? $labtechco_theme_options['service_cat_title'] : 'Service Categories' ;
$service_cat_title_singular  = ( !empty($labtechco_theme_options['service_cat_title_singular']) ) ? $labtechco_theme_options['service_cat_title_singular'] : 'Service Category' ;


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
				'value'			=> themestek_global_template_list('service', false),
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
				),
				"std"  => "",
				'group'		  => esc_attr__( 'Box Style', 'labtechco' ),
			)
		),
		
		array( 
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show Sortable Category Links",'labtechco'),
				"description" => sprintf( esc_attr__("Show sortable category links above %s items so user can sort by just single click.",'labtechco'), $service_type_title_singular ),
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
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
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
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show Pagination",'labtechco'),
				"description" => sprintf( esc_attr__("Show pagination links below %s boxes.",'labtechco'), $service_type_title ),
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
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
			),
			array(
				"type"        => "checkbox",
				"heading"     => sprintf( esc_attr__("From %s", "labtechco"), $service_cat_title_singular ),
				"description" => sprintf( esc_attr__('If you like to show %1$s from selected %2$s than select the category here.', 'labtechco'), $service_type_title, $service_cat_title ),
				"param_name"  => "category",
				"value"       => $serviceCatList,
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
			),
			array(
				"type"        => "checkbox",
				"heading"     => sprintf( esc_attr__('Selected %1$s (Posts) Only', "labtechco"), $service_type_title ),
				"description" => sprintf( esc_attr__('Select %1$s (Posts) that will appear.', 'labtechco'), $service_type_title ),
				"param_name"  => "selected_posts",
				"value"       => $serviceList,
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Order by",'labtechco'),
				"description" => esc_attr__("Sort retrieved service by parameter.",'labtechco'),
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
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
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
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show",'labtechco'),
				"description" => sprintf( esc_attr__("How many %s item you want to show.", "labtechco"), $service_type_title ),
				"param_name"  => "show",
				"value"       => array(
					esc_attr__("All", "labtechco") => "-1",
					esc_attr__('1', "labtechco")   => "1",
					esc_attr__('2', "labtechco")   => "2",
					esc_attr__('3','labtechco')    =>'3',
					esc_attr__('4','labtechco')    =>'4',
					esc_attr__('5','labtechco')    =>'5',
					esc_attr__('6','labtechco')    =>'6',
					esc_attr__('7','labtechco')    =>'7',
					esc_attr__('8','labtechco')    =>'8',
					esc_attr__('9','labtechco')    =>'9',
					esc_attr__('10','labtechco')   =>'10',
					esc_attr__('11','labtechco')   =>'11',
					esc_attr__('12','labtechco')   =>'12',
					esc_attr__('13','labtechco')   =>'13',
					esc_attr__('14','labtechco')   =>'14',
					esc_attr__('15','labtechco')   =>'15',
					esc_attr__('16','labtechco')   =>'16',
					esc_attr__('17','labtechco')   =>'17',
					esc_attr__('18','labtechco')   =>'18',
					esc_attr__('19','labtechco')   =>'19',
					esc_attr__('20','labtechco')   =>'20',
					esc_attr__('21','labtechco')   =>'21',
					esc_attr__('22','labtechco')   =>'22',
					esc_attr__('23','labtechco')   =>'23',
					esc_attr__('24','labtechco')   =>'24',
				),
				"std"  => "3",
				'group'		  => esc_attr__( 'Box Options', 'labtechco' ),
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
		$params[$i]['std'] = 'Our Work';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
	}
	$i++;
}

global $ts_sc_params_servicebox;
$ts_sc_params_servicebox = $params;

vc_map( array(
	"name"     => sprintf( esc_attr__("PBM %s Box",'labtechco'), $service_type_title_singular ),
	"base"     => "ts-servicebox",
	"class"    => "",
	'category' => esc_attr__( 'PBM', 'labtechco' ),
	"icon"     => "icon-themestek-vc",
	"params"   => $params,
) );
