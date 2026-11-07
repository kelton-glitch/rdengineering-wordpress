<?php

/**
 * Register widget areas.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if( !function_exists('tste_labtechco_widgets_init') ){
function tste_labtechco_widgets_init() {
	
	if( !function_exists('tste_labtechco_cs_framework_init') ){
		
		register_sidebar( array(
			'name' => esc_attr__( 'Right Sidebar for Blog', 'labtechco' ),
			'id' => 'sidebar-right-blog',
			'description' => esc_attr__( 'This is right sidebar for blog section', 'labtechco' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => esc_attr__( 'Right Sidebar for Pages', 'labtechco' ),
			'id' => 'sidebar-right-page',
			'description' => esc_attr__( 'This is right sidebar for pages', 'labtechco' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
	}
}
}
add_action( 'widgets_init', 'tste_labtechco_widgets_init' );


/*
 *  Adding Image sizes
 */

if( !function_exists('themestek_image_sizes') ){
function themestek_image_sizes(){
		
	/* Fixed image sizes */
	
	// 770x800
	add_image_size( 'themestek-img-600x712', '600', '712', true );

	// 800x800
	add_image_size( 'themestek-img-800x800', '800', '800', true );
	
	// 800x508
	add_image_size( 'themestek-img-800x508', '800', '508', true );
	
	// 800x715
	add_image_size( 'themestek-img-800x715', '800', '715', true );
	
	// 800x740
	add_image_size( 'themestek-img-800x740', '800', '740', true );
	
	// 800x650
	add_image_size( 'themestek-img-800x650', '800', '650', true );
	
	// 600x785
	add_image_size( 'themestek-img-600x785', '600', '785', true );

	// 600x720
	add_image_size( 'themestek-img-600x720', '600', '720', true );
	
	// 1170x575
	add_image_size( 'themestek-img-1170x575', '1170', '575', true );

	// 970x550
	add_image_size( 'themestek-img-970x550', '970', '550', true );

	// 770x770
	add_image_size( 'themestek-img-770x770', '770', '770', true );

	// 800x400
	add_image_size( 'themestek-img-800x400', '800', '400', true );

	// 500x800
	add_image_size( 'themestek-img-500x800', '500', '800', true );

	// 600x670
	add_image_size( 'themestek-img-600x670', '600', '670', true );
	
}
}
add_action( 'init', 'themestek_image_sizes' );


/**
 *  Wrap "Read More" link with some div so we can design it
 */
if( !function_exists('themestek_wrap_more_link') ){
function themestek_wrap_more_link($more) {
	return '<span class="more-link-wrapper">'.$more.'</span>';
}
}
add_filter('the_content_more_link','themestek_wrap_more_link');

// Slider Revoluiton Theme integration
add_action( 'init', 'themestek_set_rs_as_theme' );
function themestek_set_rs_as_theme() {
	// Setting options to hide Revoluiton Slider message
	if(get_option('revSliderAsTheme') != 'true'){
		update_option('revSliderAsTheme', 'true');
	}
	if(get_option('revslider-valid-notice') != 'false'){
		update_option('revslider-valid-notice', 'false');
	}
	if( function_exists('set_revslider_as_theme') ){
		set_revslider_as_theme();
	}
}


/**
 *  Page or Post: This will override the default "skin color" set in the page directly.
 */
if( !function_exists('themestek_single_skin_color') ){
function themestek_single_skin_color(){
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		//global $post;
		global $labtechco_theme_options;
		$page_meta = get_post_meta( $post_id, '_themestek_metabox_group', true );
		if( !empty($page_meta['skincolor']) ){
			$labtechco_theme_options['skincolor'] = esc_attr($page_meta['skincolor']);
		}
	}
}
}
add_action('wp','themestek_single_skin_color');

/**
 *  Override Theme Options value from single page/post/cpt. This is useful for demo purpose and for other users too.
 */
if( !function_exists('themestek_toptions_override') ){
function themestek_toptions_override(){
	
	if( is_singular() ){
		
		$page_meta = get_post_meta( get_the_ID() ); // fetching all post meta
		
		if( !empty($page_meta) && is_array($page_meta) && count($page_meta)>0 ){
			
			foreach( $page_meta as $meta=>$value ){
				
				// Define prefix here
				$prefix = 'ts_themeoptions_';
				
				if( substr($meta, 0, strlen($prefix) ) == $prefix ){
					
					// now process to get all theme options ID 
					if( !isset($all_options) ){
						// getting list of theme options
						if( !isset($ts_framework_options) ){
							include( get_template_directory() . '/cs-framework-override/config/framework-options.php' );
						}
						$all_options = array();
						foreach( $ts_framework_options as $key=>$val ){
							if( !empty($val['fields']) ){
								foreach( $val['fields'] as $field ){
									if( !empty($field['id']) ){
										$all_options[] = $field['id'];
									}
								}
							}
						}
					}
					// End now
					
					
					// Now checking if any value is available and overriding it
					global $labtechco_theme_options;
					$meta_name = substr( $meta, strlen($prefix) );
					
					if( in_array($meta_name, $all_options) ){
						if( themestek_is_json($value[0]) && !is_numeric($value[0]) ){
							// array
							$final_val    = json_decode($value[0]);
							$final_val    = (array) $final_val;
							$original_val = ( isset($labtechco_theme_options[$meta_name]) ) ? $labtechco_theme_options[$meta_name] : array() ;
							$final_val    = array_merge( $original_val, $final_val );
						} else {
							// string
							$final_val = $value[0];
						}
						$labtechco_theme_options[$meta_name] = $final_val;
					}
					
				}
			}  // foreach
			
		}  // if
		
	}
	
}
}
add_action('wp','themestek_toptions_override');


/**
 *  Checking if Json code in the string
 */
if( !function_exists('themestek_is_json') ){
function themestek_is_json($string='') {
	json_decode($string);
	return (json_last_error() == JSON_ERROR_NONE);
}
}

 
/**
 *  Custom Google Analytics code in footer
 */
add_action( 'wp_footer', 'themestek_analytics_code' );
if( !function_exists('themestek_analytics_code') ){
function themestek_analytics_code(){
	
	// Custom JS code
	$custom_js_code = themestek_get_option('custom_js_code');
	
	// Google Analytics code
	$customhtml_bodyend = themestek_get_option('customhtml_bodyend');
	
	// Output
	if( !empty($custom_js_code) ){
		echo trim('<script> "use strict"; ' . $custom_js_code . '</script>');
	}
	if( !empty($customhtml_bodyend) ){
		echo trim($customhtml_bodyend);
	}
	
}
}

/**
 *  Single: Body Background
 */
if( !function_exists('themestek_single_body_background') ){
function themestek_single_body_background(){
	$css = '';
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') && is_woocommerce() ) {
		$post_id = get_option( 'woocommerce_shop_page_id' );
	}
	
	
	if( $post_id ){
		$single_meta = get_post_meta( $post_id, '_themestek_metabox_group' , true );
		
		if( isset($single_meta['custom_background_switcher']) && $single_meta['custom_background_switcher']==true && !empty($single_meta['custom_background']) ){
			
			$css = themestek_get_background_css( 'html body', $single_meta['custom_background'], array('output_bglayer') );
			
			// Add CSS code in page
			wp_add_inline_style( 'labtechco-responsive-style', $css );
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'themestek_single_body_background', 18 );


/**
 *  Custom Google Analytics code in footer
 */
add_action( 'wp_head', 'themestek_inline_css_header_code' );
if( !function_exists('themestek_inline_css_header_code') ){
function themestek_inline_css_header_code(){
	
	global $themestek_inline_css;
	
	// For Widget BG color and image
	global $wp_registered_sidebars;
	ob_start();
	foreach( $wp_registered_sidebars as $sidebar_id=>$sidebar_details ){
		dynamic_sidebar($sidebar_id);
	}
	ob_get_clean();

	
	global $post;
	if( !empty($post->post_content) ){
		if( ( function_exists('is_woocommerce') && is_woocommerce() ) || ( function_exists('is_account_page') && is_account_page() ) ){
			// do nothing 
		} else {
			do_shortcode( $post->post_content );
		}
	}
	
	if( !empty($themestek_inline_css) ){
		echo '<!-- Inline CSS Start --><style type="text/css">';
		echo trim($themestek_inline_css);
		echo '</style><!-- Inline CSS End -->';
	}
	
	
}
}

/**
 *  Custom code in HEAD tag
 */
add_action( 'wp_head', 'themestek_head_code' );
if( !function_exists('themestek_head_code') ){
function themestek_head_code(){
	
	// Google Analytics code
	$customhtml_head = themestek_get_option('customhtml_head');
	
	// Output
	if( !empty($customhtml_head) ){
		echo trim($customhtml_head);
	}
	
}
}

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since LabtechCO 1.1
 */
if( !function_exists('labtechco_javascript_detection') ){
function labtechco_javascript_detection() {
	
	$yith_js_code = '';
	$yith_wishlist_page_id = get_option('yith_wcwl_wishlist_page_id');
	
	if( !empty($yith_wishlist_page_id) ){
		$url = get_permalink($yith_wishlist_page_id);
		
		$yith_js_code .= 'var IMAGEURL = "' . get_template_directory_uri() . '/images";';
		
		

		$yith_js_code .= 'var MGK_ADD_TO_WISHLIST_SUCCESS_TEXT = \'' . esc_attr__('Product successfully added to wishlist.', 'labtechco') . ' <a href="' . esc_url($url) . '" title="' . esc_attr__('Browse Wishlist', 'labtechco') . '">' . esc_attr__('Browse Wishlist', 'labtechco') . '</a>\';';
		
		$yith_js_code .= 'var MGK_ADD_TO_WISHLIST_EXISTS_TEXT = \'' . esc_attr__('The product is already in the wishlist!', 'labtechco') . ' <a href="' . esc_url($url) . '" title="' . esc_attr__('Browse Wishlist', 'labtechco') . '">' . esc_attr__('Browse Wishlist', 'labtechco') . '</a>\';';
		
		$yith_js_code .= 'var MGK_PRODUCT_PAGE = false;';

	}
	
	echo "<script> 'use strict'; (function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);" . $yith_js_code . "</script>\n";
}
}
add_action( 'wp_head', 'labtechco_javascript_detection', 0 );


/**
 * Flush out the transients used in {@see labtechco_categorized_blog()}.
 *
 * @since LabtechCO 1.0
 */
if( !function_exists('labtechco_category_transient_flusher') ){
function labtechco_category_transient_flusher() {
	delete_transient( 'labtechco_categories' );
}
}
add_action( 'edit_category', 'labtechco_category_transient_flusher' );
add_action( 'save_post',     'labtechco_category_transient_flusher' );

/**
 *  Add inline Dynamic Style code
 */
if( !function_exists('themestek_add_inline_dynamic_css') ){
function themestek_add_inline_dynamic_css(){
	$labtechco_theme_options = get_option('labtechco_theme_options');
	$css = '';
	
	// this will load static theme css file
	if( !defined('THEMESTEK_LABTECHCO_VERSION') ){
		wp_enqueue_style( 'tste-labtechco-theme-style', get_template_directory_uri() . '/css/theme-style.min.css', array('labtechco-responsive-style') );
	}

	
	// Singuler of shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	if( is_home() ){
		$post_id = get_option( 'page_for_posts');
	}
	
	// Topbar custom css stylesheet
	$css .= themestek_topbar_inline_style();
	
	// Titlebar custom css stylesheet
	if( $post_id || is_tax() ){
		$css .= themestek_titlebar_inline_style();
	}
	
	// Minify CSS style
	if( isset( $labtechco_theme_options['minify'] ) && esc_attr($labtechco_theme_options['minify'])==true ){
		$css = themestek_minify_css( $css );
	}
	
	// labtechco main style
	if( !empty($css) ){
		wp_add_inline_style( 'labtechco-responsive-style', $css );
	}
	
}
}
add_action( 'wp_enqueue_scripts', 'themestek_add_inline_dynamic_css', 20 );


/**
 *  Breakpoint variable in head and ajaxurl
 */
if( !function_exists('themestek_breakpoint_js_vars') ){
function themestek_breakpoint_js_vars() {
	$breakpoint        = themestek_get_option('menu_breakpoint');
	$breakpoint_custom = themestek_get_option('menu_breakpoint-custom');
	$breakpoint        = ( $breakpoint=='custom' ) ? $breakpoint_custom : $breakpoint ;
	
	wp_localize_script( 'labtechco-script', 'ts_labtechco_js_vars',
		array(
			'ts_breakpoint' => esc_attr($breakpoint),
			'ajaxurl'       => admin_url( 'admin-ajax.php' ),
		)
	);
}
}
add_action( 'wp_enqueue_scripts', 'themestek_breakpoint_js_vars', 20 );

add_filter('wp_list_categories', 'themestek_cat_count_span');
if( !function_exists('themestek_cat_count_span') ){
function themestek_cat_count_span($links) {
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}
}

/**
 *  Register Google Fonts for footer
*/
if( !function_exists('themestek_footer_google_fonts_url') ){
function themestek_footer_google_fonts_url() {
	global $ts_global_footer_gfonts;
	$fontline = '';
    $font_url = '';
	
	if( !empty($ts_global_footer_gfonts) ){
		$fontline = array();
		if( is_array($ts_global_footer_gfonts) && count($ts_global_footer_gfonts)>0 ){
			foreach($ts_global_footer_gfonts as $gfonts=>$weight){
				$weight     = implode( ',', $weight );
				if( $weight == 'regular' || $weight == '400' ){
					$weight = '';
				}
				
				if( !empty($weight) ){
					$fontline[] =  $gfonts.':'.$weight;
				} else {
					$fontline[] =  $gfonts;
				}
			}
		}
		$fontline = implode( '|', $fontline );
	}
	
	/***/
	if( !empty($fontline) ){
		$font_url = add_query_arg( 'family', $fontline, "//fonts.googleapis.com/css" );
	}
    return $font_url;
}
}

if( !function_exists('themestek_enqueue_footer_google_fonts') ){
function themestek_enqueue_footer_google_fonts() {
    wp_enqueue_style( 'ts-footer-gfonts', themestek_footer_google_fonts_url(), array(), '1.0.0' );
}
}
// This need to be at footer as the content will add more google fonts.
add_action( 'wp_footer', 'themestek_enqueue_footer_google_fonts' );


if ( ! function_exists( 'labtechco_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since LabtechCO 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function labtechco_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link" title="%2$s">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( esc_attr__( 'Continue reading %s', 'labtechco' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'labtechco_excerpt_more' );
endif;

/*
 * Add some special classes on <body> tag.
 */
if( !function_exists('themestek_body_classes') ){
function themestek_body_classes($bodyClass){
	global $labtechco_theme_options;
	$hClass = '';
	
	// All ROW to 20px 
	if( is_singular() ){
		$singular_meta = get_post_meta( get_the_ID(), 'themestek_page_row_settings', true );
		if( isset($singular_meta['row_lower_padding']) && $singular_meta['row_lower_padding']==true ){
			$bodyClass[] = 'ts-all-row-20px';
		}
	}
	
	// Breadcrumb position in Titlebar
	if( isset($labtechco_theme_options['titlebar_view']) && 
		($labtechco_theme_options['titlebar_view'] == 'default' || $labtechco_theme_options['titlebar_view'] == 'allleft' || $labtechco_theme_options['titlebar_view'] == 'allright' ) &&
		isset($labtechco_theme_options['breadcrumb_on_bottom']) &&
		$labtechco_theme_options['breadcrumb_on_bottom'] == true
	){
		$bodyClass[] = 'ts-titlebar-bcrumb-bottom';
	}
	
	
	// check if dark background set for container.
	if( !empty($labtechco_theme_options['headerstyle']) ){
		$bodyClass[] = 'ts-headerstyle-'.esc_attr($labtechco_theme_options['headerstyle']);
	}
	
	// Check if slider exists for header style classic
	if( !empty($labtechco_theme_options['headerstyle']) && $labtechco_theme_options['headerstyle']=='1' && ( is_single() || is_page() ) ){
		$singular_meta = get_post_meta( get_the_ID(), '_themestek_metabox_group', true );
		if( !empty($singular_meta['slidertype']) && $singular_meta['slidertype']=='revslider' && !empty($singular_meta['revslider']) ){
			$bodyClass[] = 'ts-slider-yes';
		}
	}
	
	// check if dark background set for container.
	if( isset($labtechco_theme_options['inner_background']['background-color']) && trim($labtechco_theme_options['inner_background']['background-color'])!='' && ts_check_dark_color(esc_attr($labtechco_theme_options['inner_background']['background-color'])) ){
		$bodyClass[] = 'ts-dark-layout';
	}
	
	// show/hide separator line between links in dropdown menu
	if( isset($labtechco_theme_options['dropdown_menu_separator']) && trim($labtechco_theme_options['dropdown_menu_separator'])=='0' ){
		$bodyClass[] = 'ts-dropmenu-hide-sepline';
	}
	

	// Sticky Fotoer ON/OFF
	if( isset($labtechco_theme_options['stickyfooter']) && $labtechco_theme_options['stickyfooter']==true ){
		$bodyClass[] = 'themestek-sticky-footer';
	}
	
	// Single Portfolio
	if( is_singular('portfolio') ){
		$portfolioView        = esc_attr($labtechco_theme_options['portfolio_viewstyle']); // Global view
		$portfolioView_single = esc_attr(get_post_meta( get_the_ID(), '_themestek_portfolio_view_viewstyle', true)); // Single portfolio view
		if( is_array($portfolioView_single) ){ $portfolioView_single = $portfolioView_single[0]; }
		if( trim($portfolioView_single)!='' && trim($portfolioView_single)!='global' ){
			$portfolioView = $portfolioView_single;
		}
		$bodyClass[] = sanitize_html_class('themestek-portfolio-view-'.$portfolioView);
	}
	
	// Boxed / Wide
	if( isset($labtechco_theme_options['layout']) && trim($labtechco_theme_options['layout'])!='' ){
		if( $labtechco_theme_options['layout']=='boxed' || $labtechco_theme_options['layout']=='framed' || $labtechco_theme_options['layout']=='rounded' ){
			$bodyClass[] = 'themestek-boxed';
		}
		if( $labtechco_theme_options['layout']=='framed' || $labtechco_theme_options['layout']=='rounded' ){
			$bodyClass[] = 'themestek-boxed-'.sanitize_html_class($labtechco_theme_options['layout']);
		}
		
		$bodyClass[] = sanitize_html_class( 'themestek-'.trim($labtechco_theme_options['layout']));
		if( $labtechco_theme_options['layout']=='fullwide' ){
			if( isset($labtechco_theme_options['full_wide_elements']['content']) && $labtechco_theme_options['full_wide_elements']['content']=='1' ){
				$bodyClass[] = 'ts-layout-container-full';
			}
		}
		
	} else {
		$bodyClass[] = 'themestek-wide';
	}
	
	$themestek_retina_logo = 'off';
	if( isset($labtechco_theme_options['logoimg_retina']['url']) && $labtechco_theme_options['logoimg_retina']['url']!=''){
		$themestek_retina_logo = 'on';
	}

	
	// Header Style
	$headerstyle        = '';
	$headerstyle_global = '';
	$headerstyle_page   = '';
	if( isset($labtechco_theme_options['headerstyle']) && trim($labtechco_theme_options['headerstyle'])!='' ){
		$headerstyle_global = sanitize_html_class($labtechco_theme_options['headerstyle']);
	}
	if( is_page() ){
		$headerstyle_page = trim(get_post_meta(get_the_ID(), 'headerstyle', true));
	}
	if( $headerstyle_page!='' ){
		$headerstyle = $headerstyle_page;
	} else {
		$headerstyle = $headerstyle_global;
	}
	
	if($headerstyle == 'classic-vertical' ){
		$bodyClass[] = 'header-' . $headerstyle;
	}
	
	switch( $headerstyle ){
		case '1':
		case '2':
		case '3':
		case '9':
			if( $headerstyle=='9' ){ $headerstyle='1 ts-header-invert'; }
			$hClass = 'themestek-header-style-'.trim($headerstyle);
			break;
		case '4':
		case '10':
			$overlayClass = ' ts-header-overlay';
			if( $headerstyle=='10' ){ $overlayClass.=' ts-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-1' . $overlayClass;
			break;
		case '5':
			$overlayClass = ' ts-header-overlay';
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-2' . $overlayClass;
			break;
		case '6':
			$overlayClass = ' ts-header-overlay';
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-3' . $overlayClass;
			break;
		case '7':
		case '8':
			$overlayClass = ' ts-header-overlay';
			if( $headerstyle=='8' ){ $overlayClass.=' ts-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-4' . $overlayClass;
			break;
	}
	
	if( !empty($hClass) ){
		$bodyClass[] = $hClass;
	}
	
	// Sidebar classes
	$sidebar = themestek_get_sidebar_info();
	if( $sidebar=='' || $sidebar=='no' ){
		// The page is full width
		$bodyClass[] = 'themestek-page-full-width';
	} else {
		// Sidebar class for border
		$bodyClass[] = sanitize_html_class( 'themestek-sidebar-true' );
		$bodyClass[] = sanitize_html_class( 'themestek-sidebar-'.$sidebar );
	}
	
	// Check if empty sidebar.. so we can add class in body to make the content area center and cover the sidebar area.
	$themestek_check_empty_sidebar = themestek_get_sidebar_info( 'count_widgets' );
	if( empty($themestek_check_empty_sidebar) ){
		$bodyClass[] = 'ts-empty-sidebar';
	}
	
	// single portfolio view class
	if( is_singular('ts-portfolio') ){
		$view_single = get_post_meta( get_the_ID(), 'themestek_portfolio_view', true );
		$view_single = ( !empty( $view_single['viewstyle'] ) ) ? $view_single['viewstyle'] : '' ; 
		$view        = $labtechco_theme_options['portfolio_viewstyle'];
		$view        =  ( !empty($view_single) ) ? $view_single : $view ;
		$bodyClass[] = 'ts-pf-view-'.$view;
	}

	
	// Max Mega Menu style
	$mmmenu_override = themestek_get_option('megamenu-override');
	if( $mmmenu_override == 1 && defined('MEGAMENU_VERSION') ){
		$bodyClass[] = 'ts-mmmenu-override-yes';
	}
	
	// One Page website
	if( isset($labtechco_theme_options['one_page_site']) && $labtechco_theme_options['one_page_site']==true ){
		$bodyClass[] = 'themestek-one-page-site';
	}
	// Container Width
	if( isset($labtechco_theme_options['container_width']) && $labtechco_theme_options['container_width']==true ){
		$bodyClass[] = 'ts-container-wide';
	}
	if( isset($labtechco_theme_options['container_width2']) && $labtechco_theme_options['container_width2']==true ){
		$bodyClass[] = 'ts-container-extra-wide';
	}
	
	return $bodyClass;
}
}
add_filter('body_class', 'themestek_body_classes');


/*
 *  This is under construction message code
 */
if( !function_exists('themestek_uconstruction') ){
function themestek_uconstruction(){
	
	$uconstruction = themestek_get_option('uconstruction');
	
	if (!is_user_logged_in() && !is_admin() && isset($uconstruction) && esc_attr($uconstruction) == true ){
		
		// We are not sanitizing this as we are expecting any (html, CSS, JS) code here
		$uconstruction_html     = do_shortcode( themestek_get_option('uconstruction_html') );
		$uconstruction_title    = do_shortcode( themestek_get_option('uconstruction_title') );
		$uconstruction_css_code = themestek_get_option('uconstruction_css_code');
		$uconstruction_head     = '';
		
		
		if( !empty($uconstruction_title) ){
			$title_tag = 'title';
			$uconstruction_head .= '<' . $title_tag . '>' . $uconstruction_title . '</' . $title_tag . '>' . "\r\n";
		}
		
		// Background CSS
		$value = themestek_get_option('uconstruction_background'); // not escaping as value is array
		$css   = '';
		if ( ! empty( $value ) && is_array( $value ) ) {
			foreach ( $value as $key => $value ) {
				if ( ! empty( $value ) && $key != "media" ) {
					if ( $key == "image" ) {
						$css .= "background-image:url('" . esc_url($value) . "');";
					} else if ( $key == "color" ) {
						$css .= "background-color:" . esc_attr($value) . ";";
					} else if ( $key == "size" ) {
						$css .= "background-size:" . esc_attr($value) . ";";
					} else {
						if( $key!='imageid' ){
							$css .= 'background-' . esc_attr($key) . ":" . esc_attr($value) . ";";
						}
					}
				}
			}
		}
		if( $css!='' ){
			$css .= 'text-align:center;';
			$uconstruction_head .= '<style> ' . $uconstruction_css_code . ' body{'.$css.'} .stickylogo{display:none;} </style>';
		}
		
		$html_tag = 'html';
		$head_tag = 'head';
		$body_tag = 'body';
		
		// Final output
		$uconstruction_html_output = '
		<' . $html_tag . '>
			<' . $head_tag . '>
				' . $uconstruction_head . '
			</' . $head_tag . '>
			
			<' . $body_tag . '>
				' . $uconstruction_html . '
			</' . $body_tag . '>
			
		</' . $html_tag . '>
		';
		
		echo trim( $uconstruction_html_output );
		die();
		
	}
}
}
add_action('template_redirect', 'themestek_uconstruction');


/**
 * Setting limit to show number of Portfolios on Portfolio Category page
 */
if( !function_exists('themestek_number_of_posts_on_pcat') ){
function themestek_number_of_posts_on_pcat( $query ){
	$pfcat_show = themestek_get_option('pfcat_show');
	$pfcat_show = ( !empty($pfcat_show) ) ? esc_attr( $pfcat_show ) : '9' ;

	if( is_tax( 'ts-portfolio-category' ) && $query->is_main_query() ){
		$query->set('posts_per_page', $pfcat_show);
	}
	return $query;
}
}
add_filter('pre_get_posts', 'themestek_number_of_posts_on_pcat');


/**
 * Setting limit to show number of Portfolios on Portfolio Category page
 */
if( !function_exists('themestek_number_of_posts_on_teamgroup') ){
function themestek_number_of_posts_on_teamgroup( $query ){
	$teamcat_show = themestek_get_option('teamcat_show');
	$teamcat_show = ( !empty($teamcat_show) ) ? esc_attr( $teamcat_show ) : '9' ;
	
	if( is_tax( 'ts-team-group' ) && $query->is_main_query() ){
		$query->set('posts_per_page', $teamcat_show);
	}
	return $query;
}
}
add_filter('pre_get_posts', 'themestek_number_of_posts_on_teamgroup');


/**
 *  Search results page setup
 */
if( !function_exists('themestek_search_filter') ){
function themestek_search_filter( $query ) {
	
	if ( is_search() && !is_admin() && $query->is_main_query() && $query->is_search ){
		
		// by default we will show 10 posts
		$query->set( 'posts_per_page', get_option('posts_per_page') );
		
		$post_type = get_query_var('post_type');
		
		if ( empty($_GET['post_type']) ) {
			$query->set( 'post_type', 'post' );
			$post_type = 'post';
			
		} else if ( isset($_GET['post_type']) && $_GET['post_type']=='page' ) {
			$query->set( 'post_type', 'page' );
			$post_type = 'page';
			
		}
		
		if( !empty( $post_type ) ){
			
			switch( $post_type ){
				case 'ts-portfolio':
				case 'ts-team-member':
				case 'product':
				case 'tribe_events':
					$query->set( 'posts_per_page', 9 );
					break;
				case 'page':
					$query->set( 'posts_per_page', 20 );
					break;
			}
		}
	}
}
}
add_filter('pre_get_posts','themestek_search_filter');


/** Post Like ajax **/
add_action('wp_ajax_themestek-portfolio-likes', 'themestek_ajax_callback' );
add_action('wp_ajax_nopriv_themestek-portfolio-likes', 'themestek_ajax_callback' );

function themestek_ajax_callback(){
	if(isset($_POST['likes_id'])){
		$post_id = str_replace('pid-', '', $_POST['likes_id']);
		echo themestek_update_like( $post_id );
	}
	exit;
}

/**
 *  Reset LIKE counter
 */
function ts_pf_reset_like(){
    $screen = get_current_screen();
    if ( $screen->post_type == 'ts-portfolio' && isset($_GET['action']) && $_GET['action']=='edit' && !isset($_GET['taxonomy']) ){
        global $post;
        $postID = esc_attr($_GET['post']);
        $resetVal = get_post_meta($postID, 'themestek_portfolio_like' ,true );

        if( $resetVal==true ){
            // Do reset processs now
            update_post_meta($postID, 'themestek_likes' , '0' ); // Setting ZERO
            update_post_meta($postID, 'themestek_portfolio_like' ,'' ); // Removing checkbox
        }
    }
    
}
add_action('current_screen', 'ts_pf_reset_like');


function themestek_update_like( $post_id ){
	if(!is_numeric($post_id)) return;

	$return = '';
	$likes = get_post_meta($post_id, 'themestek_likes', true);
	if(!$likes){ $likes = 0; }
	$likes++;
	update_post_meta($post_id, 'themestek_likes', $likes);
	setcookie('themestek_likes_'.esc_attr($post_id), esc_attr($post_id), time()*20, '/');
	return '<i class="tsicon-fa-heart"></i> ' . esc_attr($likes) . '</i>';
}

// WooCommerce: Ensure cart contents update when products are added to the cart via AJAX
add_filter('woocommerce_add_to_cart_fragments', 'themestek_wc_header_add_to_cart_fragment');
if (!function_exists('themestek_wc_header_add_to_cart_fragment')) {
function themestek_wc_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?><span class="number-cart"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span><?php
	$fragments['span.number-cart'] = ob_get_clean();
	return $fragments;
}
}

/**
 * Elementor core things
 */
include( get_template_directory() . '/includes/elementor-core.php' );

/**
 * Elementor global settings
 */
add_filter( 'admin_init', 'ts_elementor_global_settings' );
if( !function_exists('ts_elementor_global_settings') ){
function ts_elementor_global_settings() {

	if(get_option('ts_elementor_global_done') === false){

		// change default color
		$default_color = array (
			1 => '',
			2 => '',
			3 => '',
			4 => '',
		);
		update_option('elementor_scheme_color', $default_color );

		// change default typo
		$default_typo = array (
			1 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			2 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			3 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			4 => array (
				'font_family' => '',
				'font_weight' => '',
			),
		);
		update_option('elementor_scheme_typography', $default_typo );

		// Set a flag if the theme activation happened
		update_option('ts_elementor_global_done', true, '', false);
	}
}
}



if( !function_exists('themestek_theme_update_corrections') ){
function themestek_theme_update_corrections(){

	// Header style
	if( is_multisite() ){
		$labtechco_theme_options = get_site_option('labtechco_theme_options');
	} else {
		$labtechco_theme_options = get_option('labtechco_theme_options');
	}
	
	if(
		is_array($labtechco_theme_options) &&
		isset($labtechco_theme_options['headerstyle']) &&
		in_array($labtechco_theme_options['headerstyle'], array(
			'classic',
			'infostack',
			'classic-overlay',
			'classic-2',
			'classic-overlay-2',
			'style-6',
			'style-7',
			'style-8',
			'style-9',
			'style-10',
		)
	) ){

		$headerstyle		= $labtechco_theme_options['headerstyle'];
		$new_headerstyle	= '1';

		switch($headerstyle){
			case 'infostack' :
				$new_headerstyle = '2';
				break;

			case 'classic-overlay' :
				$new_headerstyle = '3';
				break;

			case 'classic-2' :
				$new_headerstyle = '4';
				break;

			case 'classic-overlay-2' :
				$new_headerstyle = '5';
				break;

			case 'style-6' :
				$new_headerstyle = '6';
				break;

			case 'style-7' :
				$new_headerstyle = '7';
				break;

			case 'style-8' :
				$new_headerstyle = '8';
				break;

			case 'style-9' :
				$new_headerstyle = '9';
				break;
				
			case 'style-10' :
				$new_headerstyle = '10';
				break;

		} // switch

		$labtechco_theme_options['headerstyle'] = $new_headerstyle;
		update_option( 'labtechco_theme_options', $labtechco_theme_options );

	} // if

	// Blog view settings
	if( !empty($labtechco_theme_options['blog_view']) && $labtechco_theme_options['blog_view'] == 'style-2' ){
		$labtechco_theme_options['blog_view']			= 'box';
		$labtechco_theme_options['blogbox_boxstyle']	= 'style-2';
		update_option( 'labtechco_theme_options', $labtechco_theme_options );
	}

}
}
add_action( 'init', 'themestek_theme_update_corrections' );



if( !function_exists('tste_labtechco_theme_version_check') ){
function tste_labtechco_theme_version_check() {
	$stored_theme_version	= get_option('tste_labtechco_version');
	if( !empty($stored_theme_version) && $stored_theme_version < 6.0 ){
		update_option('tste_labtechco_existing_user', 'yes');
	}
}
}
add_action( 'init', 'tste_labtechco_theme_version_check', 1 );

/**
 * Elementor - Reset default colors
 */
if( !function_exists('tste_labtechco_reset_elementor_kit') ){
function tste_labtechco_reset_elementor_kit(){
	$elementor_kit_reseted = get_option('tste_elementor_kit_reseted');

	if( $elementor_kit_reseted != 'yes' ){

		// Reset Elementor Defailt Template Kit colors
		$elementor_active_kit = get_option('elementor_active_kit');
		if( !empty($elementor_active_kit) ){
			$default_options = array (
				'system_colors' => array (
					array (
						'_id' => 'primary',
						'title' => 'Primary',
					),
					array (
						'_id' => 'secondary',
						'title' => 'Secondary',
					),
					array (
						'_id' => 'text',
						'title' => 'Text',
					),
					array (
						'_id' => 'accent',
						'title' => 'Accent',
					),
				),
				'custom_colors' => array(),
				'system_typography' => array (
					array (
						'_id' => 'primary',
						'title' => 'Primary',
						'typography_typography' => 'custom',
					),
					array (
						'_id' => 'secondary',
						'title' => 'Secondary',
						'typography_typography' => 'custom',
					),
					array (
						'_id' => 'text',
						'title' => 'Text',
						'typography_typography' => 'custom',
					),
					array (
						'_id' => 'accent',
						'title' => 'Accent',
						'typography_typography' => 'custom',
					),
				),
			);
			update_post_meta( $elementor_active_kit, '_elementor_page_settings', $default_options );
		}
		update_option('tste_elementor_kit_reseted', 'yes');
	}

}
}
add_action( 'init', 'tste_labtechco_reset_elementor_kit' );
add_action( 'admin_init', 'tste_labtechco_reset_elementor_kit' );

/**
 * Widget custom class input
 */
function themestek_widget_custom_class( $widget, $return, $instance ){

	$id		= $widget->get_field_id( 'themestek-widget-class' );
	$name	= $widget->get_field_name( 'themestek-widget-class' );
	$value	= ( !empty($instance['themestek-widget-class']) ) ? $instance['themestek-widget-class'] : '' ;

	$id_image		= $widget->get_field_id( 'themestek-widget-bg-image' );
	$name_image		= $widget->get_field_name( 'themestek-widget-bg-image' );
	$value_image	= ( !empty($instance['themestek-widget-bg-image']) ) ? $instance['themestek-widget-bg-image'] : '' ;

	?>
	<div class="themestek-widget-option themestek-widget-class-wrapper">
		<p><label for="widget-text-2-classes">Custom CSS Class:</label><input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($value); ?>" class="widefat"></p>
	</div>

	<div class="themestek-widget-option themestek-widget-bg-image-wrapper">
		<p><label for="widget-text-2-classes">Custom Background Image for widget:</label><input type="text" name="<?php echo esc_attr($name_image); ?>" id="<?php echo esc_attr($id_image); ?>" value="<?php echo esc_attr($value_image); ?>" class="widefat"></p>
		<p class="themestek-widget-small-text">NOTE: Add image full path only. The background image size should be <code>500x580</code> pixel.</p>
	</div>

	<?php
}
add_action( 'in_widget_form', 'themestek_widget_custom_class', 10, 3 );

/**
 * Widget custom class store value
 */
function themestek_save_widget_custom_class( $instance, $new_instance, $old_instance, $object ) {
	// ID
	$instance['ids'] = sanitize_text_field( $new_instance['ids'] );

	// Widget Class
	$instance['themestek-widget-class'] = ( !empty( $new_instance['themestek-widget-class'] ) ) ? sanitize_text_field( $new_instance['themestek-widget-class'] ) : '' ;
	
	// Widget Background Image
	$instance['themestek-widget-bg-image'] = ( !empty( $new_instance['themestek-widget-bg-image'] ) ) ? sanitize_text_field( esc_url($new_instance['themestek-widget-bg-image']) ) : '' ;
	
	return $instance;
}
add_filter( 'widget_update_callback', 'themestek_save_widget_custom_class', 10, 4 );


/**
 * Add Class in frontend
 */
function themestek_frontend_class_event($params){
	global $wp_registered_widgets;
	
	$widget_id              = $params[0]['widget_id'];
	$widget_obj             = $wp_registered_widgets[ $widget_id ];
	$widget_num				= $widget_obj['params'][0]['number'];
	$widget_opt				= themestek_get_widget_info( $widget_obj );
	
	// Custom class
	if( !empty($widget_opt[ $widget_num ]['themestek-widget-class']) ){
		$custom_class	= trim($widget_opt[ $widget_num ]['themestek-widget-class']);

		$class						= 'class="'.$custom_class.' '; 
		$params[0]['before_widget']	= str_replace('class="', $class, $params[0]['before_widget']);

	}


	// Background image
	if( !empty($widget_opt[ $widget_num ]['themestek-widget-bg-image']) ){
		$bg_image	= trim($widget_opt[ $widget_num ]['themestek-widget-bg-image']);

		$bg_image_attr	= 'style="background-image:url(\''.$bg_image.'\');" class="'; 
		$params[0]['before_widget']	= str_replace('class="', $bg_image_attr, $params[0]['before_widget']);

	}

	return $params;
}
// add the action
add_action( "dynamic_sidebar_params", "themestek_frontend_class_event" , 10, 1);


/**
 * Get specific widget information
 */
function themestek_get_widget_info($widget_obj){
	global $post;
	$id = ( isset( $post->ID ) ? get_the_ID() : null );
	
	if( isset( $id ) && get_post_meta( $id, '_customize_sidebars' ) ){
		$custom_sidebarcheck = get_post_meta( $id, '_customize_sidebars' );
	}

	$option_name = '';
	if( isset( $widget_obj['callback'][0]->option_name ) ){
		$option_name = $widget_obj['callback'][0]->option_name;
	} else if( isset( $widget_obj['original_callback'][0]->option_name ) ){
		$option_name = $widget_obj['original_callback'][0]->option_name;
	}

	if( isset( $custom_sidebarcheck[0] ) && ( 'yes' === $custom_sidebarcheck[0] ) ){
		$widget_opt = get_option( 'widget_' . $id . '_' . substr( $option_name, 7 ) );
	} else if( $option_name ){
		$widget_opt = get_option( $option_name );
	}

	return $widget_opt;
}

if( !function_exists('themestek_arrange_blog_meta') ){
function themestek_arrange_blog_meta(){
	// blogclassic_meta_list

	$all_options = get_option('labtechco_theme_options');
	$blogclassic_meta_list_updated = get_option('blogclassic_meta_list_updated');

	if( $blogclassic_meta_list_updated != 'yes' ){
	
		if( !empty($all_options['blogclassic_meta_list']['enabled']) && is_array($all_options['blogclassic_meta_list']['enabled']) && count($all_options['blogclassic_meta_list']['enabled']) == 2 && isset($all_options['blogclassic_meta_list']['enabled']['author']) && isset($all_options['blogclassic_meta_list']['enabled']['tag']) ){

			$all_options['blogclassic_meta_list'] = array (
				'enabled' => array (
					'cat'		=> esc_attr__('Categories', 'labtechco'),
					'tag'		=> esc_attr__('Tags', 'labtechco'),
				),
				'disabled' => array (
					'author'	=> esc_attr__('Author', 'labtechco'),
					'date'		=> esc_attr__('Date', 'labtechco'),
					'comment'	=> esc_attr__('Comments', 'labtechco'),
				),
			);

			update_option('labtechco_theme_options', $all_options );
		}
		update_option('blogclassic_meta_list_updated', 'yes' );

	}
}
}
add_action( 'init', 'themestek_arrange_blog_meta' );