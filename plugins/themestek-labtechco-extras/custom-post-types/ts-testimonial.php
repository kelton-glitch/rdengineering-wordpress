<?php 

function tste_labtechco_cpt_ts_testimonial(){

	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => _x( 'Testimonials', 'Testimonials post type general name', 'tste' ),
		'singular_name'      => _x( 'Testimonial', 'Testimonials post type singular name', 'tste' ),
		'menu_name'          => _x( 'Testimonials', 'Testimonials post type admin menu', 'tste' ),
		'name_admin_bar'     => _x( 'Testimonial', 'Testimonials post type - add new on admin bar', 'tste' ),
		'add_new'            => _x( 'Add New', 'testimonial', 'tste' ),
		'add_new_item'       => esc_attr__( 'Add New Testimonial', 'tste' ),
		'new_item'           => esc_attr__( 'New Testimonial', 'tste' ),
		'edit_item'          => esc_attr__( 'Edit Testimonial', 'tste' ),
		'view_item'          => esc_attr__( 'View Testimonial', 'tste' ),
		'all_items'          => esc_attr__( 'All Testimonials', 'tste' ),
		'search_items'       => esc_attr__( 'Search Testimonial', 'tste' ),
		'parent_item_colon'  => esc_attr__( 'Parent Testimonial:', 'tste' ),
		'not_found'          => esc_attr__( 'No testimonial found.', 'tste' ),
		'not_found_in_trash' => esc_attr__( 'No testimonial found in Trash.', 'tste' )
	);
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-format-status',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'ts-testimonial', $args );
	
	
	
	// Testimonial Group

	$labels = array(
		'name'              => _x( 'Testimonial Group', 'taxonomy general name', 'tste' ),
		'singular_name'     => _x( 'Testimonial Group', 'taxonomy singular name', 'tste' ),
		'search_items'      => esc_attr__( 'Search Group', 'tste' ),
		'all_items'         => esc_attr__( 'All Groups', 'tste' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'tste' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'tste' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'tste' ),
		'update_item'       => esc_attr__( 'Update Group', 'tste' ),
		'add_new_item'      => esc_attr__( 'Add New Group', 'tste' ),
		'new_item_name'     => esc_attr__( 'New Group Name', 'tste' ),
		'menu_name'         => esc_attr__( 'Testimonial Group', 'tste' ),
	);
	
	$args = array(
		'hierarchical'      => false,
		'public'			=> false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		//'rewrite'           => array( 'slug' => $ts_pf_category_slug ),
	);
	
	register_taxonomy( 'ts-testimonial-group', 'ts-testimonial', $args  );
	
	
	
	/* Change "Enter Title Here" */
	function tste_labtechco_ts_testimonial_enter_title_here( $title ){
		$screen = get_current_screen();
		if ( 'ts-testimonial' == $screen->post_type ) {
			$title = esc_attr__('Person or Company Name', 'tste');
		}
		return $title;
	}
	add_filter( 'enter_title_here', 'tste_labtechco_ts_testimonial_enter_title_here' );


	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'tste_labtechco_ts_testimonial_featured_image_box');
	function tste_labtechco_ts_testimonial_featured_image_box() {
		remove_meta_box( 'postimagediv', 'ts-testimonial', 'normal' );
		add_meta_box('postimagediv', esc_attr__('Select/Upload Image of Person or Company','tste'), 'post_thumbnail_meta_box', 'ts-testimonial', 'normal', 'high');
	}
		
}
add_action( 'init', 'tste_labtechco_cpt_ts_testimonial', 8 );








// Show Featured image in the admin section
add_filter( 'manage_ts-testimonial_posts_columns', 'tste_ts_testimonial_set_featured_image_column' );
add_action( 'manage_ts-testimonial_posts_custom_column' , 'tste_ts_testimonial_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'tste_ts_testimonial_set_featured_image_column' ) ) {
function tste_ts_testimonial_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['themestek_featured_image'] = esc_attr__( 'Featured Image', 'labtechco' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'tste_ts_testimonial_set_featured_image_column_content' ) ) {
function tste_ts_testimonial_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'themestek_featured_image' ){
		echo '<a href="'. get_permalink($post_id) .'">';
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img src="' . THEMESTEK_LABTECHCO_URI . '/images/admin-no-image.png" />';
		}
		echo '</a>';
	}
}
}





/**
 *  Meta Box: Clients
 */
if ( ! function_exists( 'tste_labtechco_ts_testimonials_metabox_options' ) ) {
function tste_labtechco_ts_testimonials_metabox_options( $options ) {
	

	
	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'themestek_testimonials_details',
		'title'     => esc_attr__('LabtechCO: Testimonial Details', 'tste'),
		'post_type' => 'ts-testimonial', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_testi_details',
				'fields' => array(
		
					array(
						'id'     		=> 'clienturl',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Website Link', 'tste'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("(Optional) Please fill person or company's website link", 'tste').'</div>',
					),
					array(
						'id'     		=> 'designation',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Person Designation or Company Name', 'tste'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("(Optional) Please fill designation of the person. Fill Company name if it is a company", 'tste').'</div>',
					),
					
					array(
						'id'           	=> 'star_ratings',
						'type'         	=> 'select',
						'title'        	=>  esc_html__('Select Star Ratings', 'tste'),
						'options'  		=> array(
							'1'				=> esc_html__('One star', 'tste'),
							'2'				=> esc_html__('Two stars', 'tste'),
							'3'				=> esc_html__('Three stars', 'tste'),
							'4'				=> esc_html__('Four stars', 'tste'),
							'5'				=> esc_html__('Five stars', 'tste'),
						),
						'default'      	=> '5',
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Please select star ratings.", 'tste').'</div>',
					),
					
				),
			),
		),
	);
	return $options;
}
}
add_filter( 'cs_metabox_options', 'tste_labtechco_ts_testimonials_metabox_options' );

