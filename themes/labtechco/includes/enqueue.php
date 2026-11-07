<?php

/* For security */
if ( !defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}

/*
 *  Check if MIN css or not
 */
if( !function_exists('themestek_min_css') ){
function themestek_min_css(){
	global $labtechco_theme_options;
	// Checking if MIN enabled
	if( isset($labtechco_theme_options['minify']) && $labtechco_theme_options['minify']==true ){
		define('TS_MIN', '.min');
	} else {
		define('TS_MIN', '');
	}
}
}
add_action( 'init', 'themestek_min_css' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if( !function_exists('labtechco_scripts_styles') ){
function labtechco_scripts_styles() {
	global $labtechco_theme_options;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	$thread_comments_option = get_option( 'thread_comments' );
	
	if ( is_singular() && comments_open() && $thread_comments_option ){
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Base icon library
	wp_enqueue_style( 'ts-base-icons', get_template_directory_uri() . '/libraries/ts-labtechco-icons/css/ts-labtechco-icons.css' );
	
	// Animsition - Add page translation effect
	if( isset($labtechco_theme_options['pagetranslation']) && $labtechco_theme_options['pagetranslation']!='no'){
		wp_register_script( 'animsition', get_template_directory_uri() . '/libraries/animsition/js/jquery.animsition.min.js', array( 'jquery' ), '', true );
		wp_register_style( 'animsition', get_template_directory_uri() . '/libraries/animsition/css/animsition.min.css' );
	}
	
	// Perfect Scrollbar
	wp_enqueue_script( 'perfect-scrollbar', get_template_directory_uri() . '/libraries/perfect-scrollbar/perfect-scrollbar.jquery.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'perfect-scrollbar', get_template_directory_uri() . '/libraries/perfect-scrollbar/perfect-scrollbar.min.css' );
	
	
	// hower.css : Hover effect (we are using min version)
	wp_register_style( 'hover', get_template_directory_uri() . '/libraries/hover/hover-min.css' );
	
	// Chris Bracco Tooltip
	wp_enqueue_style( 'chrisbracco-tooltip', get_template_directory_uri() . '/libraries/chrisbracco-tooltip/chrisbracco-tooltip.min.css' );
	
	// multi-columns-row
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row.css' );
	
	// Select2
	wp_enqueue_script( 'ts-select2', get_template_directory_uri() . '/libraries/select2/select2.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'ts-select2', get_template_directory_uri() . '/libraries/select2/select2.min.css' );
	
	// IsoTope
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/libraries/isotope/isotope.pkgd.min.js', array( 'jquery' ), '', true );
	
	// jquery-mousewheel
	wp_enqueue_script( 'jquery-mousewheel', get_template_directory_uri() . '/libraries/jquery-mousewheel/jquery.mousewheel.min.js', array( 'jquery' ), '', true );
	
	// Flex Slider
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/libraries/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/libraries/flexslider/flexslider.css' );
	
	
	// Sticky
	if( !empty($labtechco_theme_options['sticky_header']) && $labtechco_theme_options['sticky_header']=='y' ){
		wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/libraries/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) , '', true );
	}
	
	// animate.css
	if ( !wp_style_is( 'animate-css', 'registered' ) ) { // If library is not registered
		wp_register_style( 'animate-css', get_template_directory_uri() . '/libraries/animate/animate.min.css' );
	}
	wp_register_script( 'nivo-slider', get_template_directory_uri() . '/libraries/nivo-slider/jquery.nivo.slider.pack.js', array( 'jquery' ), '', true );
	wp_register_style( 'nivo-slider-css', get_template_directory_uri() . '/libraries/nivo-slider/nivo-slider.css' );
	wp_register_style( 'nivo-slider-theme', get_template_directory_uri() . '/libraries/nivo-slider/themes/default/default.css' );
	
	// Numinate plugin
	if ( !wp_script_is( 'vc_waypoints', 'registered' ) ) { // If library is not registered
		wp_register_script( 'vc_waypoints', get_template_directory_uri() . '/libraries/vc_waypoints/vc-waypoints.min.js', array( 'jquery' ), '', true );
	}
	wp_register_script( 'numinate', get_template_directory_uri() . '/libraries/numinate/numinate.min.js', array( 'jquery' ), '', true );
	
	// circle-progress
	wp_register_script( 'jquery-circle-progress', get_template_directory_uri() . '/libraries/jquery-circle-progress/circle-progress.min.js', array( 'jquery' ), '', true );
	
	// Slick library
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/libraries/slick/slick.min.js', array('jquery'), '', true );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/libraries/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/libraries/slick/slick-theme.css', array('slick') );
	
	// PrettyPhoto
	if ( !wp_script_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		$prettyphoto_js = get_template_directory_uri() . '/libraries/prettyphoto/js/jquery.prettyPhoto.js';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/libraries/lib/prettyphoto/js/jquery.prettyPhoto.js') ){
			$prettyphoto_js = WP_PLUGIN_URL . '/js_composer/libraries/lib/prettyphoto/js/jquery.prettyPhoto.js';
		}
		wp_register_script( 'prettyphoto', $prettyphoto_js, array('jquery') , '', true);
	}
	if ( !wp_style_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		$prettyphoto_css = get_template_directory_uri() . '/libraries/prettyphoto/css/prettyPhoto.css';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/libraries/lib/prettyphoto/css/prettyPhoto.css') ){
			$prettyphoto_css = WP_PLUGIN_URL . '/js_composer/libraries/lib/prettyphoto/css/prettyPhoto.css';
		}
		wp_register_style( 'prettyphoto', $prettyphoto_css );
	}
	
	// CSSgram
	wp_register_style( 'cssgram', get_template_directory_uri() . '/libraries/cssgram/cssgram.min.css' );


	// Gsap
	wp_enqueue_script( 'ts-gsap', get_template_directory_uri() . '/js/gsap'.TS_MIN.'.js' , array('jquery') );

	// ScrollTrigger
	wp_enqueue_script( 'ts-scrolltrigger', get_template_directory_uri() . '/js/ScrollTrigger.js' , array('jquery') );

	// SplitText
	wp_enqueue_script( 'ts-splitsext', get_template_directory_uri() . '/js/SplitText'.TS_MIN.'.js' , array('jquery') );

	// gsap-effect
	wp_enqueue_script( 'ts-effects', get_template_directory_uri() . '/js/gsap-animation'.TS_MIN.'.js' , array('jquery') );

	// animated-counter
	wp_enqueue_script( 'ts-animated-counter', get_template_directory_uri() . '/js/animated-counter'.TS_MIN.'.js' , array('jquery') );
	
	// Loading prettyPhoto by default
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );

	// header style css
	$header_style = themestek_get_option('headerstyle');
	if( empty($header_style) ){ $header_style = '1'; }
	if( file_exists( get_template_directory() . '/css/header/header-style-'.$header_style.TS_MIN.'.css' ) ){
		wp_enqueue_style( 'tstk-labtechco-header-style', get_template_directory_uri() . '/css/header/header-style-'.$header_style.TS_MIN.'.css' );
	}

	// Blog box styles
	$blog_styles = themestek_global_template_list('blog', true);
	$total_blog_styles = count($blog_styles);
	if( is_array($blog_styles) && $total_blog_styles>0 ){
		$min = TS_MIN;
		if( is_child_theme() ){
			$min = '';
		}
		foreach( $blog_styles as $style=>$image ){

			if( file_exists( get_template_directory() . '/css/blogbox/blogbox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-blog-'.$style, get_template_directory_uri() . '/css/blogbox/blogbox-'.$style.TS_MIN.'.css' );
				}else {
					wp_register_style( 'ts-blog-'.$style, get_template_directory_uri() . '/css/blogbox/blogbox-'.$style.TS_MIN.'.css' );
				}

			}
		}
	}

	// blog but not classic
	if ( is_home() || is_category() || is_tag() ) {
		$blog_view = themestek_get_option('blog_view');
		if( $blog_view!='classic' ){
			$style = themestek_get_option('blogbox_boxstyle');
			if( empty($style) ){ $style = 'style-1'; }
			wp_enqueue_style( 'tste-blog-'.$style, get_template_directory_uri() . '/css/blogbox/blogbox-'.$style.TS_MIN.'.css' );
		}
	}

	// Client box styles
	$client_styles = themestek_global_template_list('clients', true);
	$total_client_styles = count($client_styles);
	if( is_array($client_styles) && $total_client_styles>0 ){
		foreach( $client_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/clientbox/clientbox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-client-'.$style, get_template_directory_uri() . '/css/clientbox/clientbox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-client-'.$style, get_template_directory_uri() . '/css/clientbox/clientbox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}

	// FID box styles
	$fid_styles = themestek_global_template_list('fidbox', true);
	$total_fid_styles = count($fid_styles);
	if( is_array($fid_styles) && $total_fid_styles>0 ){
		foreach( $fid_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/fidbox/fidbox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-fid-'.$style, get_template_directory_uri() . '/css/fidbox/fidbox-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'ts-fid-'.$style, get_template_directory_uri() . '/css/fidbox/fidbox-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Icon Heading box styles
	$icon_heading_styles = themestek_global_template_list('iconheadingbox', true);
	$total_icon_heading_styles = count($icon_heading_styles);
	if( is_array($icon_heading_styles) && $total_icon_heading_styles>0 ){
		foreach( $icon_heading_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/iconheadingbox/iconheadingbox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-icon-heading-'.$style, get_template_directory_uri() . '/css/iconheadingbox/iconheadingbox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-icon-heading-'.$style, get_template_directory_uri() . '/css/iconheadingbox/iconheadingbox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}
	// Portfolio box styles
	$portfolio_styles = themestek_global_template_list('portfolio', true);
	
	$total_portfolio_styles = count($portfolio_styles);
	if( is_array($portfolio_styles) && $total_portfolio_styles>0 ){
		foreach( $portfolio_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/portfoliobox/portfoliobox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-portfolio-'.$style, get_template_directory_uri() . '/css/portfoliobox/portfoliobox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-portfolio-'.$style, get_template_directory_uri() . '/css/portfoliobox/portfoliobox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}

	// Pricing Table box styles
	$pricing_table_styles = themestek_global_template_list('pricingtable', true);
	$total_pricing_table_styles = count($pricing_table_styles);
	if( is_array($pricing_table_styles) && $total_pricing_table_styles>0 ){
		foreach( $pricing_table_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/ptablebox/ptablebox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-ptable-'.$style, get_template_directory_uri() . '/css/ptablebox/ptablebox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-ptable-'.$style, get_template_directory_uri() . '/css/ptablebox/ptablebox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}

	// Service box styles
	$service_styles = themestek_global_template_list('service', true);
	$total_service_styles = count($service_styles);
	if( is_array($service_styles) && $total_service_styles>0 ){
		foreach( $service_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/servicebox/servicebox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-service-'.$style, get_template_directory_uri() . '/css/servicebox/servicebox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-service-'.$style, get_template_directory_uri() . '/css/servicebox/servicebox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}

	// Team box styles
	$team_styles = themestek_global_template_list('team', true);
	$total_team_styles = count($team_styles);
	if( is_array($team_styles) && $total_team_styles>0 ){
		foreach( $team_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/teambox/teambox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-team-'.$style, get_template_directory_uri() . '/css/teambox/teambox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-team-'.$style, get_template_directory_uri() . '/css/teambox/teambox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}

	// Testimonial box styles
	$testimonial_styles = themestek_global_template_list('testimonial', true);
	$total_testimonial_styles = count($testimonial_styles);
	if( is_array($testimonial_styles) && $total_testimonial_styles>0 ){
		foreach( $testimonial_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/testimonialbox/testimonialbox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-testimonial-'.$style, get_template_directory_uri() . '/css/testimonialbox/testimonialbox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-testimonial-'.$style, get_template_directory_uri() . '/css/testimonialbox/testimonialbox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}
	
	// Action box styles
	$actionbox_styles = themestek_global_template_list('actionbox', true);
	$total_actionbox_styles = count($actionbox_styles);
	if( is_array($actionbox_styles) && $total_actionbox_styles>0 ){
		foreach( $actionbox_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/actionbox/actionbox-'.$style.TS_MIN.'.css' ) ){
				if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
					wp_enqueue_style( 'ts-actionbox-'.$style, get_template_directory_uri() . '/css/actionbox/actionbox-'.$style.TS_MIN.'.css' );
				} else {
					wp_register_style( 'ts-actionbox-'.$style, get_template_directory_uri() . '/css/actionbox/actionbox-'.$style.TS_MIN.'.css' );
				}
			}
		}
	}

	if( is_singular( 'post' ) ){
		$style	= themestek_get_option('blog-related-style');
		wp_enqueue_style( 'ts-blog-'.$style);
	} else if ( is_singular( 'ts-portfolio' ) ){
		$style	= themestek_get_option('portfolio-related-style');
		wp_enqueue_style( 'ts-portfolio-'.$style);
	} else if ( is_singular( 'ts-service' ) ){
		$style	= themestek_get_option('service-related-style');
		wp_enqueue_style( 'ts-service-'.$style);
	}

	// Portfolio Category view styles
	if( is_tax('ts-portfolio-category') || is_post_type_archive('ts-portfolio') ){
		$portfolio_cat_style = themestek_get_option('pfcat_view');
		$portfolio_cat_style = ( empty($portfolio_cat_style) ) ? '1' : $portfolio_cat_style ;
		wp_enqueue_style( 'ts-portfolio-'.$portfolio_cat_style, get_template_directory_uri() . '/css/portfoliobox/portfoliobox-'.$portfolio_cat_style.TS_MIN.'.css' );
	}

	// Service Category view styles
	if( is_tax('ts-service-category') || is_post_type_archive('ts-service') ){
		$service_cat_style = themestek_get_option('services_cat_view');
		$service_cat_style = ( empty($service_cat_style) ) ? '1' : $service_cat_style ;
		wp_enqueue_style( 'ts-service-'.$service_cat_style, get_template_directory_uri() . '/css/servicebox/servicebox-'.$service_cat_style.TS_MIN.'.css' );
	}

	// Team Group view styles
	if( is_tax('ts-team-group') || is_post_type_archive('ts-team-member') ){
		$team_group_style = themestek_get_option('teamcat_view');
		$team_group_style = ( empty($team_group_style) ) ? '1' : $team_group_style ;
		wp_enqueue_style( 'ts-team-'.$team_group_style, get_template_directory_uri() . '/css/teambox/teambox-'.$team_group_style.TS_MIN.'.css' );
	}

	// Post Category view styles
	if( is_archive('category') || is_post_type_archive('post') ){
		$post_cat_style = themestek_get_option('blog_view');
		if( $post_cat_style!='classic') {
			$post_cat_style = ( empty($post_cat_style) ) ? '1' : $post_cat_style ;
			wp_enqueue_style( 'ts-post-category-'.$post_cat_style, get_template_directory_uri() . '/css/blogbox/blogbox-'.$post_cat_style.TS_MIN.'.css' );
		}
	}

	if( is_page() || is_singular() ){
		$elementor_data  = get_post_meta( get_the_ID() , '_elementor_data', true );
		$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
		if( !empty($elementor_data) && !empty($elementor_page) ){

			if( is_array($elementor_data) ){
				$contents_array = $elementor_data;
			} else {
				$contents_array = json_decode($elementor_data, true);
			}
			if( !empty($contents_array) && is_array($contents_array) ){
				$elements = ts_get_elements($contents_array);
				if( !empty($elements) && is_array($elements) && count($elements)>0 ){
					foreach( $elements as $element ){
						$ele = explode('___', $element);

						$css_id = $ele[0];
						$style = $ele[1];
						$css_id = str_replace('_element','-style', $css_id );
						$css_id = str_replace('_','-', $css_id );
						$css_id = str_replace('_','-', $css_id );
						$css_id = str_replace('_','-', $css_id );
						
						if( $css_id == 'ts-action-box-style' ){
							$css_id = 'ts-actionbox-style';
						}
						if( $css_id == 'ts-icon-heading' ){
							$css_id .= '-style';
						}
						if( $css_id == 'ts-multiple-icon-heading' ){
							$css_id = 'ts-icon-heading-style';
						}
						if( $css_id !='ts-heading' ){ // there is no style css for heading
							$css_id = $css_id.'-'.$style;
							
							wp_enqueue_style( esc_attr($css_id) );
						}

					}
				}
			}
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'labtechco_scripts_styles', 10 );


if( !function_exists('labtechco_scripts_styles_14') ){
function labtechco_scripts_styles_14() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row.min.css', array('bootstrap') );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array('bootstrap') );
	
	if ( file_exists( ABSPATH . 'wp-content/plugins/js_composer/libraries/css/js_composer_tta.min.css') ) {
		wp_enqueue_style( 'vc_tta_style',  plugins_url() . '/js_composer/libraries/css/js_composer_tta.min.css' );
	}
	
	wp_enqueue_style( 'labtechco-core-style', get_template_directory_uri() . '/css/core'.TS_MIN.'.css', array('bootstrap','bootstrap-theme') );
}
}
add_action( 'wp_enqueue_scripts', 'labtechco_scripts_styles_14', 14 );


if( !function_exists('labtechco_scripts_styles_15') ){
function labtechco_scripts_styles_15() {
	global $labtechco_theme_options;
	$min = TS_MIN;
	if( is_child_theme() ){
		$min = '';
	}
	if( defined( 'WPB_VC_VERSION' ) ){
		if( wp_style_is( 'js_composer_front', 'registered' ) ){
			wp_enqueue_style( 'labtechco-master-style', get_template_directory_uri() . '/css/master'.TS_MIN.'.css' , array('js_composer_front') );
			wp_register_style( 'labtechco-dark', get_template_directory_uri() . '/css/dark'.TS_MIN.'.css' , array('js_composer_front', 'labtechco-master-style') );
		} else {
			wp_enqueue_style( 'labtechco-master-style', get_template_directory_uri() . '/css/master'.TS_MIN.'.css' );
			wp_register_style( 'labtechco-dark', get_template_directory_uri() . '/css/dark'.TS_MIN.'.css' , array( 'labtechco-master-style' ) );
		}
	} else {
		wp_enqueue_style( 'labtechco-master-style', get_template_directory_uri() . '/css/master'.TS_MIN.'.css' );
		wp_register_style( 'labtechco-dark', get_template_directory_uri() . '/css/dark'.TS_MIN.'.css' , array( 'labtechco-master-style') );  // Dark
	}
	
	
	// Load dark.css if dark layout
	if( isset($labtechco_theme_options['inner_background']['background-color']) && trim($labtechco_theme_options['inner_background']['background-color'])!='' && ts_check_dark_color($labtechco_theme_options['inner_background']['background-color']) ){
		wp_enqueue_style('labtechco-dark');
	}
}
}
add_action( 'wp_enqueue_scripts', 'labtechco_scripts_styles_15', 15 );


if( !function_exists('labtechco_scripts_styles_17') ){
function labtechco_scripts_styles_17() {
	// Responsive
	global $labtechco_theme_options;
	
	// Responsive CSS
	wp_enqueue_style( 'labtechco-responsive-style', get_template_directory_uri() . '/css/responsive'.TS_MIN.'.css' );
	
	// Loads JavaScript file with functionality specific to LabtechCO.
	if ( wp_script_is( 'wpb_composer_front_js', 'registered' ) ) {
		wp_enqueue_script( 'labtechco-script', get_template_directory_uri() . '/js/scripts'.TS_MIN.'.js', array( 'jquery', 'wpb_composer_front_js' ), '1.0', true );
	} else {
		wp_enqueue_script( 'labtechco-script', get_template_directory_uri() . '/js/scripts'.TS_MIN.'.js', array( 'jquery' ), '1.0', true );
	}

	wp_enqueue_script( 'labtechco-elementor-script', get_template_directory_uri() . '/js/elementor'.TS_MIN.'.js' , array('jquery'), '1.0', true  );
}
}
add_action( 'wp_enqueue_scripts', 'labtechco_scripts_styles_17', 17 );

if( !function_exists('labtechco_scripts_styles_20') ){
	function labtechco_scripts_styles_20() {
		if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			//Pretty Photo
			wp_enqueue_script( 'prettyphoto' );
			wp_enqueue_style( 'prettyphoto' );
			//Isotop
			wp_enqueue_script( 'isotope' );
			// Slick library
			wp_enqueue_script( 'slick' );
			wp_enqueue_style( 'slick' );
			wp_enqueue_style( 'slick-theme' );
			// Perfect Scrollbar
			wp_enqueue_script( 'perfect-scrollbar' );
			wp_enqueue_style( 'perfect-scrollbar' );
			// Font awesome
			$file_path = WP_PLUGIN_DIR.'/elementor/assets/lib/font-awesome/css/all.min.css';
			$file_url = plugins_url().'/elementor/assets/lib/font-awesome/css/all.min.css';
			if( file_exists($file_path) ){
				wp_enqueue_style( 'font-awesome-5-all', $file_url );
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'labtechco_scripts_styles_20', 20 );