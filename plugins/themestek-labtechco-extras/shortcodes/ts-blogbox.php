<?php
// [ts-blogbox]
if( !function_exists('themestek_sc_blogbox') ){
function themestek_sc_blogbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_blogbox;
		
		$options_list = ts_create_options_list($ts_sc_params_blogbox);
		
		// extract array
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		$min = TS_MIN;
		if( is_child_theme() ){
			$min = '';
		}
		$style	= ( !empty( $atts['boxstyle'] ) ) ? $atts['boxstyle'] : 'style-1' ;  // Getting box style
		wp_enqueue_style( 'ts-blog-'.$style, get_template_directory_uri() . '/css/blogbox/blogbox-'.$style.TS_MIN.'.css' );
		// Starting wrapper of the whole arear
		$return .= themestek_box_wrapper( 'start', 'blog', get_defined_vars() );
		
			// Heading element
			$return .= ts_vc_element_heading( get_defined_vars() );
			
			
			// Getting $args for WP_Query
			$args = themestek_get_query_args( 'blog', get_defined_vars() );
			
			// Wp query to fetch posts
			$posts = new WP_Query( $args );
			
			if ( $posts->have_posts() ) {
				$return .= themestek_get_boxes( 'blog', get_defined_vars() );
			}
		
		// Ending wrapper of the whole arear
		$return .= themestek_box_wrapper( 'end', 'blog', get_defined_vars() );
		
			
		/* Restore original Post Data */
		wp_reset_postdata();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'ts-blogbox', 'themestek_sc_blogbox' );









