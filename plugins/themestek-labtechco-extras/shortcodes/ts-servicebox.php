<?php
// [ts-service]
if( !function_exists('themestek_sc_servicebox') ){
function themestek_sc_servicebox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_servicebox;
		
		$options_list = ts_create_options_list($ts_sc_params_servicebox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );

		$min = TS_MIN;
		if( is_child_theme() ){
			$min = '';
		}
		$style	= ( !empty( $atts['boxstyle'] ) ) ? $atts['boxstyle'] : 'style-1' ;  // Getting box style
		wp_enqueue_style( 'ts-servicebox-style-'.$style, get_template_directory_uri() . '/css/servicebox/servicebox-'.$style.TS_MIN.'.css' );
		
		// Starting wrapper of the whole arear
		$return .= themestek_box_wrapper( 'start', 'service', get_defined_vars() );
		
			// Heading element
			$return .= ts_vc_element_heading( get_defined_vars() );
			
			// Getting $args for WP_Query
			$args = themestek_get_query_args( 'service', get_defined_vars() );
			
			// Wp query to fetch posts
			$posts = new WP_Query( $args );
			if($boxstyle == 'style-14'){

				$return .= '<div class="themestek-main-hover">
								<div class="themestek-hover-slide-images">
									<div class="themestek-hover-image">';
										while ( $posts->have_posts() ) {
										$posts->the_post();
											$return .= themestek_get_featured_media('', 'themestek-img-600x670'); ?>
										<?php }
				$return .= 	'</div></div>';

				$return .=	'<div class="themestek-content-box">
								<div class= "themestek-hover-slide-nav">
									<ul class="themestek-hover-inner">';
										while ( $posts->have_posts() ) {
										$posts->the_post();
											$return .= '<li><h3><a title=" '.get_the_title().'" href=" '. get_permalink().'">'.get_the_title().'</a></h3><i class="ts-labtechco-icon-up-right-arrow"></i></li>';
										}
				$return .= 	'</ul></div></div></div>';
			} else {
				$return .= themestek_get_boxes( 'service', get_defined_vars() );
			}
		// Ending wrapper of the whole arear
		$return .= themestek_box_wrapper( 'end', 'service', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'ts-servicebox', 'themestek_sc_servicebox' );









