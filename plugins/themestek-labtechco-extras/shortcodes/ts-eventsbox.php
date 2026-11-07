<?php

// [ts-eventsbox]
if( !function_exists('themestek_sc_eventsbox') ){
function themestek_sc_eventsbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_eventsbox;
		
		$options_list = ts_create_options_list($ts_sc_params_eventsbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// Starting wrapper of the whole arear
		$return .= themestek_box_wrapper( 'start', 'events', get_defined_vars() );
		
			// Heading element
			$return .= ts_vc_element_heading( get_defined_vars() );
			
			
			
			// Getting $args for WP_Query
			$args = themestek_get_query_args( 'events', get_defined_vars() );
			
			// Wp query to fetch posts
			$posts = new WP_Query( $args );
			
			if ( $posts->have_posts() ) {
				$return .= themestek_get_boxes( 'events', get_defined_vars() );
			}
			
		
		// Ending wrapper of the whole arear
		$return .= themestek_box_wrapper( 'end', 'events', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'ts-eventsbox', 'themestek_sc_eventsbox' );





























/*
// [ts-eventsbox]
if( !function_exists('themestek_sc_eventsbox') ){
function themestek_sc_eventsbox( $atts, $content=NULL ){
	
	global $ts_sc_params_eventsbox;
	$options_list = ts_create_options_list($ts_sc_params_eventsbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	
	
	// Box width
	$boxwidth       = $column ;
	$headerCarslBtn = ( $view == 'carousel' ) ? 'carouselbtn="yes"' : '' ;
	$itemWrapper    = ( $view == 'carousel' ) ? 'themestek-carousel-items-wrapper owl-carousel owl-theme' : '' ;
	$itemCol        = ( $view == 'carousel' ) ? 'themestek-carousel-col-'.$column : '' ;
	$rowFix         = ( $view == 'carousel' ) ? '' : 'multi-columns-row' ;
	
	// Data tags
	$datatags = ts_carousel_data_html( get_defined_vars() );
	
	$rand = mt_rand(1000, 9999);
	$rand .= mt_rand(1000, 9999);
	
	if( !function_exists('tribe_get_start_date') ){
		return;
	}
	
	$return = '<div class="row '.$rowFix.' themestek-events-boxes-wrapper themestek-events-view-'.$view.' themestek-effect-'.$view.' themestek-items-col-'.$column.' '.$itemCol.' '.$el_class.'" id="themestek-events-id-'.$rand.'" '.$datatags.'>';
		
		$eventsWrapperStart = '<div class="themestek-events-boxes col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$eventsWrapperEnd   = '</div>';
		$contentWrapperStart = '<div class="themestek-events-text col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$contentWrapperEnd   = '</div>';

		$return .= $contentWrapperStart;
		$return .= ts_vc_element_heading( get_defined_vars() );
		$return .= $contentWrapperEnd;
		
		//Protect against arbitrary paged values
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			'post_type'      => 'tribe_events',
			'order'          => 'ASC',
			'meta_key'       => '_EventStartDate',
			'meta_type'      => 'DATE',
			'orderby'        => 'meta_value',
			'posts_per_page' => $show,
		);
		
		// Creating array for multiple catslug
		if(strpos($catslug, ',') !== false) {
			$catslug = explode(',',$catslug);
		}
		
		// Group
		if( $catslug!='' || is_array($catslug) ){
			$args['tax_query'] = array(
									array(
										'taxonomy' => 'tribe_events_cat',
										'field'    => 'slug',
										'terms'    => $catslug
									),
								);
		}
		
		
		$events = new WP_Query( $args );
		
		
		// The Loop
		if ( $events->have_posts() ) {
		
			$return          .= $eventsWrapperStart;
			
			$pagination_class = ( $pagination=='yes' ) ? ' themestek-with-pagination' : '' ; // Pagination
			$eventsBoxes   = '<div class="themestek-items-wrapper '.$itemWrapper.' themestek-events-boxes-inner events-wrapper row'.$pagination_class.'">';
			
			while ( $events->have_posts() ) {
				$events->the_post();
				$eventsBoxes .= themestek_eventsbox( $boxwidth, $design );
			} // while
			
			$eventsBoxes .= '</div>';

			$return .= $eventsBoxes;  // Portfolio Boxes
			if( $pagination=='yes' ){ $return .= ts_labtechco_paging_nav(true); }  // Pagination
			
			$return .= $eventsWrapperEnd;
		} // if
		
		// Restore original Post Data
		wp_reset_postdata();
		
	$return .= '</div>';
	
	return $return;
}
}
add_shortcode( 'ts-eventsbox', 'themestek_sc_eventsbox' );

*/