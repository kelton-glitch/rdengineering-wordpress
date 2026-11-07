<?php
/**
 * LabtechCO functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since LabtechCO 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 847;
}


if ( ! function_exists( 'labtechco_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since LabtechCO 1.0
 */
function labtechco_setup() {

	global $labtechco_theme_options;
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on labtechco, use a find and replace
	 * to change 'labtechco' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'labtechco', get_template_directory() . '/languages' );

	/**
	 * WooCommerce Support
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid html5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'gallery', 'audio', 'video', 'quote', 'link', 'status', 'chat'
	) );
	
	
	/*
	 * This theme uses wp_nav_menu() in four locations.
	 */
	register_nav_menus( array(
		'themestek-main-menu'			=> esc_html__( 'Main Menu', 'labtechco' ),
		'themestek-footer-menu'			=> esc_html__( 'Footer Menu', 'labtechco' ),
		'themestek-topbar-left-menu'	=> esc_html__( 'Topbar Left Menu', 'labtechco' ),
		'themestek-topbar-right-menu'	=> esc_html__( 'Topbar Right Menu', 'labtechco' ),
	) );
	
}
endif; // labtechco_setup()
add_action( 'after_setup_theme', 'labtechco_setup' );

/**
 * Favorites
 */
function ts_elementor_add_to_fav(){
	$fav_added = get_user_meta( get_current_user_id(), 'ts_add_to_fav', true );
	if( function_exists('is_user_logged_in') && is_user_logged_in() && $fav_added != 'yes' ){
		$data = get_user_meta( get_current_user_id(), 'wp_elementor_editor_user_favorites', true);
		if( is_string($data) ){
			$data = array();
		}
		if( !isset($data['widgets']) ){
			$data['widgets'] = array();
		}
		$existing_widgets = $data['widgets'];
		if( is_array($existing_widgets) ){
			$new_widgets = array(
				'ts_heading',
				'ts_icon_heading',
				'ts_multiple_icon_heading',
				'ts_blog_element',
				'ts_portfolio_element',
				'ts_service_element',
				'ts_team_element',
				'ts_testimonial_element',
				'ts_client_element',
				'ts_staticbox_element',
				'ts_fid_element',
				'ts_timeline_element',
				'ts_action_box_element',
				'ts_ptable_element',
			);
			if( !empty($existing_widgets) ){
				// Favorites is not empty
				$existing_widgets = array_merge($new_widgets, $existing_widgets );
			} else {
				// Favorites is empty
				$existing_widgets = $new_widgets;
			}
			$data['widgets'] = $existing_widgets;
			update_user_meta( get_current_user_id(), 'wp_elementor_editor_user_favorites', $data);
		}
		update_user_meta( get_current_user_id(), 'ts_add_to_fav', 'yes' );
	}
}
add_action( 'init', 'ts_elementor_add_to_fav' );
add_action( 'admin_init', 'ts_elementor_add_to_fav' );

/************************* Custom Files ************************/

// LabtechCO Template Kits
if ( did_action( 'elementor/loaded' ) ) {
	require_once ( get_template_directory() . '/includes/labtechco-template-kits/class-labtechco-template-kits.php' );
}

// Load theme function

require get_template_directory() . '/includes/core.php';

// filters and actions
require get_template_directory() . '/includes/actions.php';

// WooCommerce
require get_template_directory() . '/includes/wc-settings.php';

// Load framework
require get_template_directory() . '/includes/framework.php';

// Theme Widgets
require get_template_directory() . '/includes/widgets/widgets.php';

// Add our shortcodes as addons for Visual Composer
if( function_exists('vc_map') ){
	require get_template_directory() . '/includes/visual-composer.php';
}

// Enqueue styles and scripts
require get_template_directory() . '/includes/enqueue.php';

// Enqueue styles and scripts for admin section
require get_template_directory() . '/includes/admin-enqueue.php';

// Extra plugins
require get_template_directory() . '/includes/class-tgm-plugin-activation.php';
require get_template_directory() . '/includes/extra-plugins.php';

/* *** Envato Theme Setup Wizard settings **** */
//require_once get_template_directory().'/setup/envato_setup_init.php';
// Please don't forgot to change filters tag.
// It must start from your theme's name.
add_filter('labtechco_theme_setup_wizard_username', 'labtechco_set_theme_setup_wizard_username', 10);
if( ! function_exists('labtechco_set_theme_setup_wizard_username') ){
    function labtechco_set_theme_setup_wizard_username($themestek){
        return 'themestek';
    }
}

add_filter('labtechco_theme_setup_wizard_oauth_script', 'labtechco_set_theme_setup_wizard_oauth_script', 10);
if( ! function_exists('labtechco_set_theme_setup_wizard_oauth_script') ){
    function labtechco_set_theme_setup_wizard_oauth_script($oauth_url){
        return 'https://themestek.com/envato-api/server-script.php';
    }
}

if ( ! defined( 'labtechco_theme_version' ) ) {
	define( 'labtechco_theme_version', '1.0' );
}

