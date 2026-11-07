<?php 

function tste_labtechco_cpt_ts_slides(){


	// Register Post Type
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'tste' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'tste' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'tste' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'tste' ),
		'add_new'            => _x( 'Add New', 'slide', 'tste' ),
		'add_new_item'       => esc_attr__( 'Add New Slide', 'tste' ),
		'new_item'           => esc_attr__( 'New Slide', 'tste' ),
		'edit_item'          => esc_attr__( 'Edit Slide', 'tste' ),
		'view_item'          => esc_attr__( 'View Slide', 'tste' ),
		'all_items'          => esc_attr__( 'All Slides', 'tste' ),
		'search_items'       => esc_attr__( 'Search Slide', 'tste' ),
		'parent_item_colon'  => esc_attr__( 'Parent Slide:', 'tste' ),
		'not_found'          => esc_attr__( 'No slide found.', 'tste' ),
		'not_found_in_trash' => esc_attr__( 'No slide found in Trash.', 'tste' )
	);
	$args = array(
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-images-alt2',
		'public'              => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'with_front' => false, 'slug' => 'slide' ),
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => null,
		'supports'            => array( 'title', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'ts_slide', $args );
	
	

	/* Category */

	$labels = array(
		'name'              => _x( 'Slide Group', 'taxonomy general name', 'tste' ),
		'singular_name'     => _x( 'Slide Group', 'taxonomy singular name', 'tste' ),
		'search_items'      => esc_attr__( 'Search Group', 'tste' ),
		'all_items'         => esc_attr__( 'All Groups', 'tste' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'tste' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'tste' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'tste' ),
		'update_item'       => esc_attr__( 'Update Group', 'tste' ),
		'add_new_item'      => esc_attr__( 'Add New Group', 'tste' ),
		'new_item_name'     => esc_attr__( 'New Group Name', 'tste' ),
		'menu_name'         => esc_attr__( 'Slide Group', 'tste' ),
	);
	
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		//'rewrite'           => array( 'slug' => $ts_pf_category_slug ),
	);
	
	register_taxonomy( 'ts_slide_group', 'ts_slide', $args  );
	
	
	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'tste_labtechco_ts_slides_featured_image_box');
	function tste_labtechco_ts_slides_featured_image_box() {
		remove_meta_box( 'postimagediv', 'ts_slide', 'normal' );
		add_meta_box('postimagediv', esc_attr__('Slide Image','tste'), 'post_thumbnail_meta_box', 'ts_slide', 'normal', 'high');
	}


}
add_action( 'init', 'tste_labtechco_cpt_ts_slides', 8 );


/**
 *  Meta Box: Clients
 */
if ( ! function_exists( 'tste_labtechco_ts_slides_metabox_options' ) ) {
function tste_labtechco_ts_slides_metabox_options( $options ) {
	

	
	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'themestek_slides_options',
		'title'     => esc_attr__('LabtechCO: Slide Options','tste'),
		'post_type' => 'ts_slide', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_sld_options',
				'title'  => esc_attr__('Slide Options', 'labtechco').'<small>'.__('Options for Slides', 'labtechco').'</small>',
				'fields' => array(
		
					array(
						'id'     		=> 'desc',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Description', 'tste'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Add description text for this slide", 'tste').'</div>',
					),
					array(
						'id'     		=> 'btntext',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Button Text', 'tste'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Add text for button", 'tste').'</div>',
					),
					array(
						'id'     		=> 'btnlink',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Button Link', 'tste'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Add URL for button", 'tste').'</div>',
					),
				),
			),
		),
	);
	return $options;
}
}
add_filter( 'cs_metabox_options', 'tste_labtechco_ts_slides_metabox_options' );