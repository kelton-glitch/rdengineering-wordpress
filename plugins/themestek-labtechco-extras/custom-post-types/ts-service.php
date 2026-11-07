<?php

function tste_labtechco_cpt_ts_service(){

	$labtechco_theme_options = get_option('labtechco_theme_options');
	
	$service_type_title          = ( !empty($labtechco_theme_options['service_type_title']) ) ? esc_attr($labtechco_theme_options['service_type_title']) : esc_attr__('Service', 'labtechco') ;
	$service_type_title_singular = ( !empty($labtechco_theme_options['service_type_title_singular']) ) ? $labtechco_theme_options['service_type_title_singular'] : esc_attr__('Service', 'labtechco') ;
	$service_type_slug           = ( !empty($labtechco_theme_options['service_type_slug']) ) ? $labtechco_theme_options['service_type_slug'] : esc_attr('service') ;
	
	$service_cat_title          = ( !empty($labtechco_theme_options['service_cat_title']) ) ? $labtechco_theme_options['service_cat_title'] : esc_attr__('Service Categories', 'labtechco') ;
	$service_cat_title_singular = ( !empty($labtechco_theme_options['service_cat_title_singular']) ) ? $labtechco_theme_options['service_cat_title_singular'] : esc_attr__('Service Category', 'labtechco') ;
	$service_cat_slug           = ( !empty($labtechco_theme_options['service_cat_slug']) ) ? $labtechco_theme_options['service_cat_slug'] : esc_attr('service-category') ;
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => _x( 'Service', 'post type general name', 'tste' ),
		'singular_name'      => _x( 'Service', 'post type singular name', 'tste' ),
		'menu_name'          => _x( 'Service', 'admin menu', 'tste' ),
		'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'tste' ),
		'add_new'            => _x( 'Add New', 'service', 'tste' ),
		'add_new_item'       => esc_attr__( 'Add New Service', 'tste' ),
		'new_item'           => esc_attr__( 'New Service', 'tste' ),
		'edit_item'          => esc_attr__( 'Edit Service', 'tste' ),
		'view_item'          => esc_attr__( 'View Service', 'tste' ),
		'all_items'          => esc_attr__( 'All Service', 'tste' ),
		'search_items'       => esc_attr__( 'Search Service', 'tste' ),
		'parent_item_colon'  => esc_attr__( 'Parent Service:', 'tste' ),
		'not_found'          => esc_attr__( 'No service found.', 'tste' ),
		'not_found_in_trash' => esc_attr__( 'No service found in Trash.', 'tste' )
	);
	
	
	
	
	if( trim($service_type_title)!='Service' || trim($service_type_title_singular)!='Service' ){
		// Getting Team Member Title
		
		$labels = array(
			'name'               => esc_attr_x( $service_type_title, 'post type general name', 'tste' ),
			'singular_name'      => esc_attr_x( $service_type_title_singular, 'post type singular name', 'tste' ),
			'menu_name'          => esc_attr_x( $service_type_title_singular, 'admin menu', 'tste' ),
			'name_admin_bar'     => esc_attr_x( $service_type_title_singular, 'add new on admin bar', 'tste' ),
			'add_new'            => esc_attr_x( 'Add New', 'service', 'tste' ),
			'add_new_item'       => esc_attr__( 'Add New '.$service_type_title_singular, 'tste' ),
			'new_item'           => esc_attr__( 'New '.$service_type_title_singular, 'tste' ),
			'edit_item'          => esc_attr__( 'Edit '.$service_type_title_singular, 'tste' ),
			'view_item'          => esc_attr__( 'View '.$service_type_title_singular, 'tste' ),
			'all_items'          => esc_attr__( 'All '.$service_type_title, 'tste' ),
			'search_items'       => esc_attr__( 'Search '.$service_type_title_singular, 'tste' ),
			'parent_item_colon'  => esc_attr__( 'Parent '.$service_type_title_singular.':', 'tste' ),
			'not_found'          => esc_attr__( 'No '.strtolower($service_type_title_singular).' found.', 'tste' ),
			'not_found_in_trash' => esc_attr__( 'No '.strtolower($service_type_title_singular).' found in Trash.', 'tste' )
		);
	}
	
	
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-welcome-widgets-menus',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => $service_type_slug ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'page-attributes', 'title', 'editor', 'thumbnail', 'excerpt' /*, 'custom-fields'*/ )
	);

	register_post_type( 'ts-service', $args );
	
	


	
	//Registaring Taxonomy for Post Type Service
	
	$labels = 	array(
		'name'              => esc_attr__('Service Category', 'tste'),
		'singular_name'     => esc_attr__('Service Category', 'tste'),
		'search_items'      => esc_attr__('Search Service Category', 'tste'),
		'all_items'         => esc_attr__('All Service Category', 'tste'), 
		'parent_item'       => esc_attr__('Parent Service Category', 'tste'),
		'parent_item_colon' => esc_attr__('Parent Service Category:', 'tste'), 
		'edit_item'         => esc_attr__('Edit Service Category', 'tste'),
		'update_item'       => esc_attr__('Update Service Category', 'tste'),
		'add_new_item'      => esc_attr__('Add New Service Category', 'tste'),
		'new_item_name'     => esc_attr__('New Service Category Name', 'tste'),
		'menu_name'         => esc_attr__('Service Category', 'tste'),
	);
	
	

	if($service_cat_title != '' && $service_cat_title != esc_attr__('Service Category', 'tste')){
		
		$labels = array(
			'name'              => sprintf( esc_attr__('%s', 'tste'), $service_cat_title ),
			'singular_name'     => sprintf( esc_attr__('%s', 'tste'), $service_cat_title_singular ),
			'search_items'      => sprintf( esc_attr__('Search %s', 'tste'), $service_cat_title ),
			'all_items'         => sprintf( esc_attr__('All %s', 'tste'), $service_cat_title ),
			'parent_item'       => sprintf( esc_attr__('Parent %s', 'tste'), $service_cat_title_singular ),
			'parent_item_colon' => sprintf( esc_attr__('Parent %s:', 'tste'), $service_cat_title_singular ),
			'edit_item'         => sprintf( esc_attr__('Edit %s', 'tste'), $service_cat_title_singular ),
			'update_item'       => sprintf( esc_attr__('Update %s', 'tste'), $service_cat_title_singular ),
			'add_new_item'      => sprintf( esc_attr__('Add New %s', 'tste'), $service_cat_title_singular ),
			'new_item_name'     => sprintf( esc_attr__('New %s Name', 'tste'), $service_cat_title_singular ),
			'menu_name'         => sprintf( esc_attr__('%s', 'tste'), $service_cat_title_singular ),
		);
	}
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $service_cat_slug ),
	);
	
	register_taxonomy( 'ts-service-category', 'ts-service', $args  );
	
	
}

add_action( 'init', 'tste_labtechco_cpt_ts_service', 8 );







// Show Featured image in the admin section
add_filter( 'manage_ts-service_posts_columns', 'tste_ts_service_set_featured_image_column' );
add_action( 'manage_ts-service_posts_custom_column' , 'tste_ts_service_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'tste_ts_service_set_featured_image_column' ) ) {
function tste_ts_service_set_featured_image_column($columns) {
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
if ( ! function_exists( 'tste_ts_service_set_featured_image_column_content' ) ) {
function tste_ts_service_set_featured_image_column_content( $column, $post_id ) {
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
 *  Meta Boxes: Service
 */

if ( ! function_exists( 'tste_labtechco_ts_service_metabox_options' ) ) {
function tste_labtechco_ts_service_metabox_options( $options ) {
	
	// Praparing List options array
	$labtechco_theme_options = get_option('labtechco_theme_options');
	
	// Title of CPT
	$service_type_title_singular = ( !empty($labtechco_theme_options['service_type_title_singular']) ) ? $labtechco_theme_options['service_type_title_singular'] : 'Service' ;
	
	
	
	$post_id = !empty($_GET['post']) ? $_GET['post'] : get_the_ID() ;
	
	
	$list_array    = array();
	$options_array = array();
	if( isset($labtechco_theme_options['service_details_line']) && is_array($labtechco_theme_options['service_details_line']) && count( $labtechco_theme_options['service_details_line'] ) > 0 ){
		foreach( $labtechco_theme_options['service_details_line'] as $key=>$val ){
			
			// Icon classs
			$icon_class = $val['service_details_line_icon']['library_' . $val['service_details_line_icon']['library'] ];
			
			$option_array = array(
				'id'         => 'service_details_line_'.$key,
				'type'       => 'text',
				'title'      => '<span class="ts-admin-pf-list-icon"> <i class="'. $icon_class .'"></i></span> &nbsp; '. esc_attr__($val['service_details_line_title'], 'labtechco'),
			);
			
			switch( $val['data'] ){
				
				case 'custom' :
				default :
					$option_array['type']         = 'text';
					break;
				
				case 'multiline' :
					$option_array['type']       = 'textarea';
					break;
				
				case 'date' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['value']      = get_the_date( '', $post_id );
					break;
				
				case 'category' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'ts-input-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'ts-service-category', '', ', ', '' ) );
					break;
				
				
				case 'category_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'ts-input-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'ts-service-category', '', ', ', '' ) );
					break;
					
				case 'tag' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'ts-input-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'ts-service-category', '', ', ', '' ) );
					break;
					
				case 'tag_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'ts-input-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'ts-service-category', '', ', ', '' ) );
					break;
					
			}
			
			// merging with main array
			$options_array[] = $option_array;
			
		}
	}
	
	
	
	if( count($options_array)==0 ){
		// No options created in Service Settings section.
		$list_array[] = array(
			'type'    => 'notice',
			'class'   => 'success',
			'content' => esc_attr__('There is no option to show. Please create some options from "Theme Options > Service Settings" section.', 'tste'),
		);
	} else {
		
		// Options created in Service Settings section.
		$list_array = $options_array;
		
	}
	
	
	
	
	

	
	// Service List options
	/*
	$options[]    = array(
		'id'        => 'themestek_service_list_data',
		'title'     => sprintf( esc_attr__('LabtechCO: %s List Options', 'tste'), $service_type_title_singular ),
		'post_type' => 'ts-service', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_service_list_data',
				'fields' => array(
		
					array(
						'id'        => 'ts_service_list_data',
						'type'      => 'fieldset',
						'title'     => esc_attr__('List Values','tste'),
						'fields'    => $list_array,
						//'debug'     => true
						'after'   		=> '<br><div class="cs-text-muted">'.__('You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'tste'). '<br>' . sprintf( esc_attr__('You can manage (change icon or title of the line) from "Theme Opitons > %s Settings" section.', 'tste'), $service_type_title_singular ).'</div>',
					),
					
				),
			),
		),
	);
	*/
	
	
	// Service Featured Image / Video / Slider Metabox
	$options[]    = array(
		'id'        => 'themestek_service_featured',
		'title'     => esc_attr__('LabtechCO: Featured Image / Video / Slider', 'tste'),
		'post_type' => 'ts-service', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_service_featured',
				'fields' => array(
		
					array(
						'id'       		=> 'featuredtype',
						'type'     		=> 'radio',
						'title'    		=>  esc_attr__('Featured Image / Video / Slider', 'tste'),
						'options'       => array(
											'image'       => esc_attr__('Featured Image', 'tste'),
											'video'       => esc_attr__('Video (YouTube or Vimeo)', 'tste'),
											'audioembed'  => esc_attr__('Audio (SoundCloud embed code)', 'tste'),
											'slider'	  => esc_attr__('Image Slider', 'tste'),
										),
						'default'		=> 'image',
						'after'   		=> '<div class="cs-text-muted">'.__('Select what you want to show as featured. Image or Video', 'tste').'</div>',
					),
					/* Video (YouTube or Vimeo) */
					array(
						'id'     		=> 'video_code',
						'type'    		=> 'textarea',
						'title'   		=> '',
						'dependency' => array( 'featuredtype_video', '==', 'true' ),
						'after'  		=> '<div class="cs-text-muted"><br>'.__('Paste video url (oembed) or embed code.', 'tste').'</div>',
					),
					/* Audio (SoundCloud embed code) */
					array(
						'id'     		=> 'audio_code',
						'type'    		=> 'wysiwyg',
						'title'   		=> esc_attr__('SoundCloud (or any other service) Embed Code or MP3 file path.', 'tste'),
						'dependency' => array( 'featuredtype_audioembed', '==', 'true' ),
						'after'  		=> '<div class="cs-text-muted"><br>'.__('Paste SoundCloud or any other service embed code here', 'tste').'</div>',
						'settings'      => array(
							'textarea_rows' => 5,
							'tinymce'       => false,
							'media_buttons' => false,
							'quicktags'     => false,
						)
					),
					/* Image Slider */
					array(
						'id'          => 'slide_images',
						//'debug'       => true,
						'type'        => 'gallery',
						'title'       => esc_attr__('Slider Images', 'tste'),
						'add_title'   => 'Add Images',
						'edit_title'  => 'Edit Images',
						'clear_title' => 'Remove Images',
						'dependency'  => array( 'featuredtype_slider', '==', 'true' ),
						'after'       => '<br><div class="cs-text-muted">'.__('Select images for Slider gallery.', 'tste').'</div>',
					),
					
					
				),
			),
			
		),
	);
	
	
	
	// Service View Style Meta Box
	/*
	$options[]    = array(
		'id'        => 'themestek_service_view',
		'title'     => sprintf( esc_attr__('LabtechCO: %s View Style', 'tste'), $service_type_title_singular ),
		'post_type' => 'ts-service', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_service_view',
				'fields' => array(
		
					array(
						'id'       		=> 'viewstyle',
						'type'     		=> 'radio',
						'title'    		=> sprintf( esc_attr__('%s View Style', 'tste'), $service_type_title_singular ),
						'options'       => array(
							''     			=> esc_attr__('Global', 'tste'),
							'left' 			=> esc_attr__('Left image and right content (default)', 'tste'),
							'top'  			=> esc_attr__('Top image and bottom content', 'tste'),
							'full' 			=> esc_attr__('No image and full-width content (without details box)', 'tste'),
						),
						'default'		=> '',
						'after'   		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select view for single %s', 'tste'), $service_type_title_singular ) . '</div>',
					),
				),
			),
		),
	);
	*/
	
	
	// Service Reset Likes metabox
	/*
	$options[]    = array(
		'id'        => 'themestek_service_like',
		'title'     => esc_attr__('LabtechCO: Service Like Option','tste'),
		'post_type' => 'ts-service', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_service_resetlike',
				'fields' => array(
		
					array(
						'id'       		=> 'pflikereset',
						'type'     		=> 'checkbox',
						'title'    		=> esc_attr__('Service Reset Likes', 'tste'),
						'options'  		=> array(
											'header'  => esc_attr__('YES, Reset Likes', 'tste'),	
										),
						'after'   		=> '<div class="cs-text-muted">'.__('This will make the LIKE count to zero. For this service only. If you like to reset LIKE for all service than please go to "Theme Options > Advanced Settings" section', 'tste').'<br><br>'.'To reset, just check this checkbox and save this page.'.'</div>',
					),
				),
			),
		),
	);
	*/
	
	return $options;
}
}
add_filter( 'cs_metabox_options', 'tste_labtechco_ts_service_metabox_options' );
