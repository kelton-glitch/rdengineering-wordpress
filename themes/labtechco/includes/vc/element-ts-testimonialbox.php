<?php
/* Options for ThemeStek Testimonial box */

// Fetching all Testsonial group names
$testimonialGroups = array();
if( taxonomy_exists('ts-testimonial-group') ){
	$testimonial_groups = get_terms( 'ts-testimonial-group', array('hide_empty'=>false) );
	$testimonialGroups  = array();
	foreach( $testimonial_groups as $group ){
		$totalcount = 0;
		if( trim($group->count) > 0 ){
			$totalcount = $group->count;
		}
		$testimonialGroups[ $group->name.' ('.$totalcount.')' ] = $group->slug;
	}
}

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
$boxParams = ts_box_params('testimonial');

$allParams = array_merge(

	$heading_element,
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_attr__( 'Box View Style', 'labtechco' ),
			'description'	=> esc_attr__( 'Select box view style.', 'labtechco' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-1',
			'value'			=> themestek_global_template_list('testimonial', false),
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
		),
		
	),
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Sortable Category Links",'labtechco'),
			"description" => esc_attr__("Show sortable category links above Testimonial boxes so user can sort by category by just single click.",'labtechco'),
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
			"description" => esc_attr__("Show pagination links below Testimonial boxes.",'labtechco'),
			"param_name"  => "pagination",
			"value"       => array(
				esc_attr__('No','labtechco')  => 'no',
				esc_attr__('Yes','labtechco') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'            => 'sortable',
				'value_not_equal_to' => array( 'yes' ),
			),
			'group'		  => esc_attr__('Box Options','labtechco'),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_attr__("From Group", "labtechco"),
			"param_name"  => "category",
			"description" => esc_attr__("Select group so it will show Testimonials from selected group only.", "labtechco"),
			"value"       => $testimonialGroups,
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
			'group'	    	   => esc_attr__('Box Options','labtechco'),
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
			"description" => esc_attr__("Total Testimonials you want to show.", "labtechco"),
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
			"std"  => "3",
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
		$params[$i]['std'] = 'Testimonials';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
			
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
		
	} else if( $param_name == 'content' ){
		$params[$i]['std'] = '';
		
	}
	
	$i++;
}

global $ts_sc_params_testimonialbox;
$ts_sc_params_testimonialbox = $params;

vc_map( array(
	"name"     => esc_attr__("PBM Testimonial Box", "labtechco"),
	"base"     => "ts-testimonialbox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_attr__( 'PBM', 'labtechco' ),
	"params"   => $params,
) );
