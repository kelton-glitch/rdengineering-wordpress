<?php
/*
 * Plugin Name: ThemeStek Extras for LabtechCO Theme
 * Plugin URI: http://www.pbminfotech.com
 * Description: ThemeStek Plugin for LabtechCO Theme
 * Version: 7.2
 * Author: ThemeStek
 * Author URI: http://www.pbminfotech.com
 * Text Domain: tste
 * Domain Path: /languages
 */
 
/**
 *  TSTE = ThemeStek Theme Extras
 */
define( 'THEMESTEK_LABTECHCO_VERSION', '7.2' );
define( 'THEMESTEK_LABTECHCO_DIR', trailingslashit( dirname( __FILE__ ) ) );
define( 'THEMESTEK_LABTECHCO_URI', plugins_url( '', __FILE__ ) );

function themestek_labtechco_one_click_html(){
	// do nothing
}

/**
 *  Codestar Framework core files
 */
function tste_labtechco_cs_framework_init(){
	defined('CS_OPTION'          ) or define('CS_OPTION',           'labtechco_theme_options');
	defined('CS_ACTIVE_FRAMEWORK') or define('CS_ACTIVE_FRAMEWORK', true    ); // default true
	defined('CS_ACTIVE_METABOX'  ) or define('CS_ACTIVE_METABOX',   true    ); // default true
	defined('CS_ACTIVE_SHORTCODE') or define('CS_ACTIVE_SHORTCODE', true    ); // default true
	defined('CS_ACTIVE_CUSTOMIZE') or define('CS_ACTIVE_CUSTOMIZE', true    ); // default true
	
	// CS Framework
	include THEMESTEK_LABTECHCO_DIR.'cs-framework/cs-framework.php';
	
	// VC Section templates
	include THEMESTEK_LABTECHCO_DIR.'vc-templates/vc-templates-functions.php';
	
	// Make shortcode work in text widget
	add_filter('widget_text', 'do_shortcode', 11);
	
}
add_action( 'init', 'tste_labtechco_cs_framework_init', 2 );

/**
 *  Codestar Framework core files
 */
function tste_header_css(){
	echo '
<style>
th#themestek_featured_image, td.themestek_featured_image {
    width: 115px !important;
}
td.themestek_featured_image img{
    max-width: 75px;
	height: auto;
}
</style>
';
}
add_action( 'admin_head', 'tste_header_css' );


add_action( 'plugins_loaded', 'themestek_labtechco_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function themestek_labtechco_load_textdomain() {
	load_plugin_textdomain( 'tste', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}


/**
 *  Icon picker
 */

if( is_admin() ){
	
	global $pagenow;
	if( $pagenow == 'post.php' || ( $pagenow == 'admin.php' && $_GET['page'] == 'themestek-theme-options' ) || ( $pagenow == 'admin-ajax.php' && strpos($_SERVER['HTTP_REFERER'], 'post.php') !== false ) ){
		require_once THEMESTEK_LABTECHCO_DIR . 'icon-picker/icon-picker.php';
	}

} else {
	require_once THEMESTEK_LABTECHCO_DIR . 'icon-picker/icon-picker.php';
}


/**
 *  Custom Post Types - With Post Meta Boxes
 */
if( function_exists('vc_map') ){
    require_once THEMESTEK_LABTECHCO_DIR . 'vc/themestek_attach_image/themestek_attach_image.php';
	require_once THEMESTEK_LABTECHCO_DIR . 'vc/themestek_iconpicker/themestek_iconpicker.php';
	require_once THEMESTEK_LABTECHCO_DIR . 'vc/themestek_imgselector/themestek_imgselector.php';
	require_once THEMESTEK_LABTECHCO_DIR . 'vc/themestek_css_editor/themestek_css_editor.php';
}
if( file_exists( get_template_directory() . '/includes/core.php' ) ){
	require_once get_template_directory() . '/includes/core.php';
} else {
	require_once THEMESTEK_LABTECHCO_DIR . 'core.php';
}
require_once THEMESTEK_LABTECHCO_DIR . 'custom-post-types/ts-portfolio.php';
require_once THEMESTEK_LABTECHCO_DIR . 'custom-post-types/ts-service.php';
require_once THEMESTEK_LABTECHCO_DIR . 'custom-post-types/ts-team.php';
require_once THEMESTEK_LABTECHCO_DIR . 'custom-post-types/ts-testimonial.php';
require_once THEMESTEK_LABTECHCO_DIR . 'custom-post-types/ts-client.php';


/**
 *  Shortcodes
 */
require_once THEMESTEK_LABTECHCO_DIR . 'shortcodes.php';


/**
 * rewrite flush
 */
function tste_rewrite_flush() {
    // ATTENTION: This is *only* done during plugin activation hook
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'tste_rewrite_flush' );



/**
 * Enqueue scripts and styles
 */
if( !function_exists('tste_labtechco_scripts_styles') ){
function tste_labtechco_scripts_styles() {
	wp_enqueue_script( 'jquery-resize', THEMESTEK_LABTECHCO_URI . '/js/jquery-resize.min.js', array( 'jquery' ) );
}
}
add_action( 'wp_enqueue_scripts', 'tste_labtechco_scripts_styles' );



/**
 * Admin Enqueue scripts and styles
 */
function tste_labtechco_admin_scripts_styles(){
	wp_register_script( 'tste-labtechco-vc-templates', THEMESTEK_LABTECHCO_URI . '/vc-templates/ts-custom-vc-templates.js' , array( 'jquery' ) );
	wp_register_style( 'tste-labtechco-style', THEMESTEK_LABTECHCO_URI . '/css/tmte-style.css' );
	
	wp_localize_script( 'tste-labtechco-vc-templates', 'THEMESTEK_LABTECHCO_EXTRAS',
		array(
			'THEMESTEK_LABTECHCO_URI' => esc_url( THEMESTEK_LABTECHCO_URI ),
			'THEMESTEK_LABTECHCO_DIR' => esc_url( THEMESTEK_LABTECHCO_DIR ),
		)
		
	);

	wp_enqueue_script( 'tste-labtechco-vc-templates' );
	wp_enqueue_style( 'tste-labtechco-style' );
}
add_action( 'admin_enqueue_scripts', 'tste_labtechco_admin_scripts_styles' );



/**
 * @param $param_value
 * @param string $prefix
 *
 * @since 4.2
 * @return string
 */
if( !function_exists('ts_vc_shortcode_custom_css_class') ){
function ts_vc_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
}
}


/**
 *  This function will do encoding things. The encode function is not allowed in theme so we created function in plugin
 */
if( !function_exists('themestek_enc_data') ){
function themestek_enc_data( $htmldata='' ) {
	return base64_encode($htmldata);
}
}


/**
 *  URL Encode
 */
if( !function_exists('themestek_url_encode') ){
function themestek_url_encode( $url='' ) {
	return urlencode($url);
}
}


/************** Start Plugin Options settings ************************/




/**
 *  This will create option link and option page
 */
if( !function_exists('tste_labtechco_register_options_page') ){
function tste_labtechco_register_options_page() {
	add_options_page(
		esc_attr__('LabtechCO Extra Options', 'tste'),  // Page title in TITLE tag
		esc_attr__('LabtechCO Extra Options', 'tste'),  // heading on page
		'manage_options',
		'tste-labtechco',
		'tste_labtechco_options_page'
	);
}
}
add_action('admin_menu', 'tste_labtechco_register_options_page');


/**
 *  Save plugin options
 */
if( !function_exists('tste_labtechco_register_settings') ){
function tste_labtechco_register_settings() {
	
	// Social share for Blog
	register_setting( 'tste_labtechco_options_group', 'tste_labtechco_social_share_blog', 'tste_labtechco_social_share_blog_callback' );
	
	// Social share for Portfolio
	register_setting( 'tste_labtechco_options_group', 'tste_labtechco_social_share_portfolio', 'tste_labtechco_social_share_portfolio_callback' );
	
	// Enable TGMPA update message
	$theme_name				= get_template();
	$theme_data				= wp_get_theme( $theme_name );
	$theme_version			= $theme_data->get( 'Version' );
	$stored_theme_version	= get_option('tste_labtechco_version');
	$user_id				= get_current_user_id();
	if( $theme_name == 'labtechco' && $theme_version != $stored_theme_version ){
		delete_user_meta( $user_id, 'tgmpa_dismissed_notice_tgmpa' );
		update_option( 'tste_labtechco_version', $theme_version );
	}

}
}
add_action( 'admin_init', 'tste_labtechco_register_settings' );




if( !function_exists('tste_labtechco_social_share_blog_callback') ){
function tste_labtechco_social_share_blog_callback( $data ){
	// Save settings to theme options so we can re-use it
	$labtechco_toptions = get_option('labtechco_theme_options');
	if( !empty($labtechco_toptions['post_social_share_services']) ){
		$labtechco_toptions['post_social_share_services'] = $data;
		update_option('labtechco_theme_options', $labtechco_toptions);
	}
	return $data;
}
}



if( !function_exists('tste_labtechco_social_share_portfolio_callback') ){
function tste_labtechco_social_share_portfolio_callback( $data ){
	// Save settings to theme options so we can re-use it
	$labtechco_toptions = get_option('labtechco_theme_options');
	if( !empty($labtechco_toptions['portfolio_social_share_services']) ){
		$labtechco_toptions['portfolio_social_share_services'] = $data;
		update_option('labtechco_theme_options', $labtechco_toptions);
	}
	return $data;
}
}






if( !function_exists('tste_labtechco_options_page') ){
function tste_labtechco_options_page(){
	
	// Commong elements
	$labtechco_toptions	= get_option('labtechco_theme_options');
	$social_list	= array(
						'Facebook'		=> 'facebook',
						'Twitter'		=> 'twitter',
						'Google Plus'	=> 'gplus',
						'Pinterest'		=> 'pinterest',
						'LinkedIn'		=> 'linkedin',
						'Stumbleupon'	=> 'stumbleupon',
						'Tumblr'		=> 'tumblr',
						'Reddit'		=> 'reddit',
						'Digg'			=> 'digg',
					);
	
	
	
	?>
	<div class="wrap"> 
		<?php screen_icon(); ?>
		<h1>LabtechCO Extra Options</h1>
		
		<form method="post" action="options.php">
		
			<?php settings_fields( 'tste_labtechco_options_group' ); ?>

			<p>This page will set some extra options for LabtechCO theme. So it will be stored even when you change theme.</p>
			<br><br>
			
			
			<h2>Select Social Share Service (for single Post or Portfolio)</h2>
			<p>The selected social service icon will be visible on single view so user can share on social sites.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="tste_labtechco_option_name"> Select Social Share Service for Blog Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tste_labtechco_social_share_blog = array();
						if( !empty($labtechco_toptions['post_social_share_services']) ){
							$tste_labtechco_social_share_blog = $labtechco_toptions['post_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tste_labtechco_social_share_blog) && in_array( $social_slug, $tste_labtechco_social_share_blog ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tste_labtechco_social_share_blog[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
				
				<!-- ---------- -->
				<tr valign="top">
					<th scope="row"><label for="tste_labtechco_option_name"> Select Social Share Service for Portfolio Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tste_labtechco_social_share_portfolio = array();
						if( !empty($labtechco_toptions['portfolio_social_share_services']) ){
							$tste_labtechco_social_share_portfolio = $labtechco_toptions['portfolio_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tste_labtechco_social_share_portfolio) && in_array( $social_slug, $tste_labtechco_social_share_portfolio ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tste_labtechco_social_share_portfolio[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
			</table>
			<?php  submit_button(); ?>
		</form>
		
	</div>
	<?php
}
}



/*******
 *  Social Share links creations
 */
if ( !function_exists( 'themestek_social_share_links' ) ){
function themestek_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);
	
	if( !empty($post_type) ){
		
		$post_type = esc_attr($post_type);
		
		${ $post_type.'_social_share_services' } = themestek_get_option( $post_type.'_social_share_services' );
		
		$return = '';
		
		if( !empty( ${ $post_type.'_social_share_services' } ) && is_array( ${$post_type.'_social_share_services'} ) && count( ${$post_type.'_social_share_services'} > 0 ) ){
			foreach( ${$post_type.'_social_share_services'} as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="ts-social-share ts-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TSSocialWindow=window.open(\''. esc_url($link) .'\',\'TSSocialWindow\',width=600,height=100); return false;"><i class="ts-labtechco-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="ts-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}





// Show Featured image in the admin section
add_filter( 'manage_post_posts_columns', 'themestek_post_set_featured_image_column' );
add_action( 'manage_post_posts_custom_column' , 'themestek_post_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'themestek_post_set_featured_image_column' ) ) {
function themestek_post_set_featured_image_column($columns) {
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
if ( ! function_exists( 'themestek_post_set_featured_image_column_content' ) ) {
function themestek_post_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'themestek_featured_image' ){
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img style="max-width:75px;height:auto;" src="' . THEMESTEK_LABTECHCO_URI . '/images/admin-no-image.png" />';
		}
	}
}
}





if( !function_exists('themestek_author_socials') ){
function themestek_author_socials( $contactsethods ) {
	$contactsethods['twitter']  = esc_html__( 'Twitter Link', 'labtechco' );  // Add Twitter
	$contactsethods['facebook'] = esc_html__( 'Facebook Link', 'labtechco' );  //add Facebook
	$contactsethods['linkedin'] = esc_html__( 'LinkedIn Link', 'labtechco' );  //add LinkedIn
	$contactsethods['gplus']    = esc_html__( 'Google Plus Link', 'labtechco' );  //add Google Plus
	return $contactsethods;
}
}
add_filter('user_contactmethods','themestek_author_socials', 20);





/**
 *  Login page logo link
 */
if( !function_exists('ts_loginpage_custom_link') ){
function ts_loginpage_custom_link() {
	return esc_url( home_url( '/' ) );
}
}
add_filter('login_headerurl','ts_loginpage_custom_link');






/**
 * Login page logo link title
 */
if( !function_exists('ts_change_title_on_logo') ){
function ts_change_title_on_logo() {
	return esc_attr( get_bloginfo( 'name', 'display' ) );
}
}
add_filter('login_headertext', 'ts_change_title_on_logo');






/**
 *  add skincolor class style
 */
add_action( 'admin_head', 'themestek_admin_skincolor_css' );
function themestek_admin_skincolor_css(){
	global $labtechco_theme_options;
	
	$labtechco_theme_options = get_option('labtechco_theme_options');
	
	$skincolor_default = '#000';  //change this with default skin color
	
	if( function_exists('themestek_get_option') ){
		$skincolor_default = themestek_get_option('skincolor');
	}
	
	if( !empty($labtechco_theme_options['skincolor']) && empty($skincolor_default) ){
		$skincolor_default = $labtechco_theme_options['skincolor'];
	}
	
	$skincolor = (!empty($labtechco_theme_options['skincolor'])) ? $labtechco_theme_options['skincolor'] : $skincolor_default ;
	
	?>
	<style>
	
		.cs-framework.cs-option-framework .button:not(.wp-color-result):not(.ed_button){
			width: auto !important;
			text-shadow: none !important;
			box-shadow: none !important;
			color: #ffffff !important;
			border: none;
		}
		.cs-framework.cs-option-framework .button.button-primary:not(.wp-color-result):not(.ed_button){
			width: auto !important;
			text-shadow: none !important;
			box-shadow: none !important;
			color: #fff !important;
			border: none;
		}
		.cs-framework.cs-option-framework .button span.wp-media-buttons-icon:before{
			color: inherit;
		}
	
	
	
		.ts_vc_colored-dropdown .skincolor,
		.vc_colored-dropdown .skincolor,
		.vc_btn3.vc_btn3-color-skincolor{  /* VC button */
			background-color: <?php echo esc_attr($skincolor); ?> !important;
			color: #fff !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-outline{
			color: <?php echo esc_attr($skincolor); ?> !important;
			border-color: <?php echo esc_attr($skincolor); ?> !important;
			background-color: transparent !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-3d {
			box-shadow: 0 4px rgba(<?php echo themestek_hex2rgb($skincolor); ?>, 0.73), 0 4px rgb(0, 0, 0) !important;
		}
		
		.vc_btn3.vc_btn3-style-text.vc_btn3-color-skincolor{ /* Normal Text style button */
			color: <?php echo esc_attr($skincolor); ?> !important;
			background-color: transparent !important;
		}
		
		/* VC Templates - Section template box style */
		body .vc_ui-panel-header-container,
		.ts_vc_filters .ts_active,
		
		/* VC editor - in post page etc */
		.composer-switch,
		.vc_navbar,
		.wp-pointer-content h3,

		/* VC Editor - new page message buttons */
		.vc_ui-button.vc_ui-button-info{
			background-color: <?php echo ts_adjustBrightness($skincolor, '-25'); ?> !important;
		}
		
		
		/* Theme Options - buttons */
		.cs-framework .button:not(.wp-color-result):not(.ed_button){
			background-color: <?php echo ts_adjustBrightness($skincolor, '-25'); ?> !important;
			color: white;
			border: none;
		}
		
		/* CS WYSIWYG editor - Add Media button */
		.cs-framework .wp-media-buttons .add_media span.wp-media-buttons-icon:before{
			color:white;
		}
		
		/* CS WYSIWYG editor - Add Shortcode button (primary) */
		.cs-framework a.button.button-primary.cs-shortcode{
			text-shadow:none;
			color: white;
			border: none !important;
			box-shadow: none !important;
		}
		
		.cs-framework .button.button-primary:not(.wp-color-result):not(.ed_button) {
			background-color: <?php echo ts_adjustBrightness($skincolor, '-75'); ?> !important;
		}
		
		
		/*** VC Message Box - Border Color - Skincolor ***/
		.wp-pointer-content h3{
			border-color: <?php echo ts_adjustBrightness($skincolor, '-25'); ?> !important;
		}
		
		
		/*** VC Message Box - Icon Color - Skincolor ***/
		.wp-pointer-content h3:before{
			color: <?php echo ts_adjustBrightness($skincolor, '-25'); ?> !important;
		}
		
		
		.composer-switch .logo-icon,
		.composer-switch a, .composer-switch a:visited,
		.composer-switch a.wpb_switch-to-front-composer, .composer-switch a:visited.wpb_switch-to-front-composer {
			background-color: transparent !important;
		}
		.vc_navbar .vc_icon-btn:hover,
		.composer-switch a.wpb_switch-to-composer:hover,
		.composer-switch a:visited.wpb_switch-to-composer:hover,
		.composer-switch a.wpb_switch-to-front-composer:hover,
		.composer-switch a:visited.wpb_switch-to-front-composer:hover {
			background-color: rgba(255, 255, 255, 0.27) !important;
		}
		#wpb_visual_composer .vc_navbar,
		.wp-pointer-content h3{
			border-bottom: none !important;
		}
		
		/* VC - ThemeStek tab on instert element */
		.ts-tab-main {
			font-weight: bold !important;
		}
	</style>
	
	<script>
	jQuery( document ).ready(function($) {
		$( "button:contains('THEMESTEK')" ).addClass('ts-tab-main');
	});
	</script>
	
	<?php
	
}



if( !function_exists('ts_adjustBrightness') ){
function ts_adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}
}

/**
 *  Create New Param Type : Info
 */
if( function_exists('vc_add_shortcode_param') ){
	vc_add_shortcode_param( 'themestek_info', 'themestek_vc_param_info' );
	function themestek_vc_param_info( $settings, $value ) {
		$return  = '';
		$head    = ( !empty($settings['head']) ) ? '<h2 class="ts_vc_info_heading">'.$settings['head'].'</h2>' : '' ;
		$subhead = ( !empty($settings['subhead']) ) ? '<h4 class="ts_vc_info_subheading">'.$settings['subhead'].'</h4>' : '' ;
		$desc    = ( !empty($settings['desc']) ) ? '<div class="ts_vc_info_desc">'.$settings['desc'].'</div>' : '' ;
		
		
		
		
		$return .= '<div class="themestek_vc_param_info '.$settings['param_name'].'">'
					. '<div class="themestek_vc_param_info_inner">'
						. $head
						. $subhead
						. $desc 
					. '</div>'
			   . '</div>'; // This is html markup that will be outputted in content elements edit form
	   return $return;
	}
}


/*************** theme-style.css generator *******************/
function themestek_theme_css() {
	$labtechco_theme_options = get_option('labtechco_theme_options');
	
	header("Content-Type: text/css");
	ob_start();
	include get_template_directory().'/css/theme-style.php'; // Fetching theme-style.php output and store in a variable
	$css    = ob_get_clean();
	
	
	// Minify CSS style
	if( isset( $labtechco_theme_options['minify'] ) && esc_attr($labtechco_theme_options['minify'])==true && function_exists('themestek_minify_css') ){
		$css = themestek_minify_css( $css );
	}
	
	// output
	echo $css;
	
	exit;
}
add_action('wp_ajax_themestek_theme_css', 'themestek_theme_css');
add_action('wp_ajax_nopriv_themestek_theme_css', 'themestek_theme_css');


function tmte_load_dynamic_style(){
	$labtechco_theme_options = get_option('labtechco_theme_options');
	$mu_dir = '';
	if( is_multisite() ){
		$site_id = get_current_blog_id();
		if( !empty($site_id) ){
			$mu_dir = '/'.$site_id;
		}
	}
	$skincolor = '';
	if( is_page() || is_singular() ){
		$themestek_metabox_group = get_post_meta( get_the_ID(), '_themestek_metabox_group', true ); // fetching all post meta
		if( !empty($themestek_metabox_group['skincolor']) ){
			$skincolor = '&color=' . str_replace('#', '', $themestek_metabox_group['skincolor'] );
		}
	}

	
	// If minify true
	$min="";
	if( ( isset( $labtechco_theme_options['minify'] ) && esc_attr($labtechco_theme_options['minify'])==true ) && ( function_exists('is_customize_preview') && !is_customize_preview() ) ){

		$version			= get_option('tste-theme-style-version', '111111');

		$css_path		= ( is_multisite() ) ? WP_CONTENT_DIR . '/tste-labtechco-css/' . get_current_blog_id() . '/theme-style.css' : WP_CONTENT_DIR . '/tste-labtechco-css/theme-style.css' ;
		$css_min_path	= ( is_multisite() ) ? WP_CONTENT_DIR . '/tste-labtechco-css/' . get_current_blog_id() . '/theme-style.min.css' : WP_CONTENT_DIR . '/tste-labtechco-css/theme-style.min.css' ;
		$css_url		= ( is_multisite() ) ? content_url() . '/tste-labtechco-css/' . get_current_blog_id() . '/theme-style' . $min . '.css' : content_url() . '/tste-labtechco-css/theme-style.min.css' ;

		if( function_exists('tste_labtechco_create_css') && ( !file_exists($css_path) || !file_exists($css_min_path) ) ){
			tste_labtechco_create_css();
		}
		
		// load static css file
		wp_enqueue_style('tste-labtechco-theme-style', esc_url($css_url), '', $version );
		
	} else {

		// Load Ajax css file
		wp_enqueue_style('tste-labtechco-theme-style', admin_url('admin-ajax.php').'?action=themestek_theme_css'.$skincolor);

	}
}

add_action( 'wp_enqueue_scripts', 'tmte_load_dynamic_style', 20 );
add_action( 'cs_validate_save_after', 'tste_labtechco_create_css', 99, 1 );
add_action( 'import_end', 'tste_labtechco_create_css' );

if( !function_exists('tste_labtechco_create_css') ){
function tste_labtechco_create_css( $data=array() ) {

	global $labtechco_theme_options;
	$labtechco_theme_options = $data;

	if( empty($labtechco_theme_options) ){
		$labtechco_theme_options = get_option('labtechco_theme_options');
	}

	if( file_exists( get_template_directory() . '/css/theme-style.php' ) ){
		$content = '';
		ob_start();
		include( get_template_directory() . '/css/theme-style.php' );
		$content = ob_get_contents();
		ob_end_clean();

		// get site ID if multisite
		$blog_id = '';

		$css_dir_path	= ( is_multisite() ) ? WP_CONTENT_DIR . '/tste-labtechco-css/' . get_current_blog_id() . '/' : WP_CONTENT_DIR . '/tste-labtechco-css/' ;
		$css_path		= ( is_multisite() ) ? WP_CONTENT_DIR . '/tste-labtechco-css/' . get_current_blog_id() . '/theme-style.css' : WP_CONTENT_DIR . '/tste-labtechco-css/theme-style.css' ;
		$css_min_path	= ( is_multisite() ) ? WP_CONTENT_DIR . '/tste-labtechco-css/' . get_current_blog_id() . '/theme-style.min.css' : WP_CONTENT_DIR . '/tste-labtechco-css/theme-style.min.css' ;

		// create directory if not exists
		wp_mkdir_p( $css_dir_path );

		if( !function_exists('WP_Filesystem') ){
			require_once(ABSPATH . 'wp-admin/includes/file.php');
		}

		WP_Filesystem();
		global $wp_filesystem;
		$wp_filesystem->put_contents( $css_path, $content );
		$wp_filesystem->put_contents( $css_min_path, themestek_minify_css($content) );

		// add unique version code for this css file
		$version = rand(100,999) . rand(100,999);
		update_option( 'tste-theme-style-version', $version );

	}
	return $data;
}
}


if( !function_exists('tste_labtechco_check_dynamic_css') ){
function tste_labtechco_check_dynamic_css(){
	$tste_theme_version		= get_option('tste-labtechco-theme-version');
	$current_theme			= wp_get_theme();
	$current_theme_version	= $current_theme->Version;
	if( $tste_theme_version != $current_theme_version ){
		tste_labtechco_create_css();
		update_option( 'tste-labtechco-theme-version', $current_theme_version );
	}
}
}

add_action( 'wp', 'tste_labtechco_check_dynamic_css', 26 );

function tmte_labtechco_generate_css_file(){
	global $labtechco_theme_options;
	
	$labtechco_theme_options = get_option('labtechco_theme_options');
	
	ob_start();
	include get_template_directory().'/css/theme-style.php';
	$css    = ob_get_clean();

	// create directory
	if( !file_exists(WP_CONTENT_DIR . '/themestek') ){
		mkdir( WP_CONTENT_DIR . '/themestek' );
	}

	// Minify CSS style
	if( isset( $labtechco_theme_options['minify'] ) && esc_attr($labtechco_theme_options['minify'])==true ){
		$css = themestek_minify_css( $css );
	}

	$mu_dir = '';
	if( is_multisite() ){
		$site_id = get_current_blog_id();
		
		if( !empty($site_id) ){
			$mu_dir = '/'.$site_id;
			if( !file_exists(WP_CONTENT_DIR . '/themestek' . $mu_dir ) ){
				mkdir( WP_CONTENT_DIR . '/themestek' . $mu_dir );
			}
			
		}
	}
	
	// write css file
	$file = fopen( WP_CONTENT_DIR . '/themestek'.$mu_dir.'/theme-style.css' , 'w' );
	fwrite($file, $css);
	fclose($file);
	
}
add_action( 'cs_validate_save_after', 'tmte_labtechco_generate_css_file' );


/**
 *  Remove type attribute from script and style tags
 */
function themestek_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if( !themestek_is_login_page() && !is_admin() ){
	add_filter('style_loader_tag', 'themestek_remove_type_attr', 10, 2);
	add_filter('script_loader_tag', 'themestek_remove_type_attr', 10, 2);
	
	// remove from all script and style tags
	if( !function_exists('themestek_remove_type_attr') ){
	function themestek_remove_type_attr($tag, $handle) {
		return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
	}
	}
	
	// Remove form body content and head content
	add_action('wp_loaded', 'themestek_output_buffer_start');
	function themestek_output_buffer_start() { 
		ob_start("themestek_output_callback"); 
	}
	add_action('shutdown', 'themestek_output_buffer_end');
	function themestek_output_buffer_end() { 
		if (ob_get_contents()){ ob_end_flush(); }
	}
	function themestek_output_callback($buffer) {
		return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
	}
	
}


/**
 *  Disabling VC welcome page redirection
 */
function themestek_disable_vc_welcome(){
	delete_transient( '_vc_page_welcome_redirect' );
}
add_action( 'admin_init', 'themestek_disable_vc_welcome', 1 );


/**
 * Register widget areas.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
function labtechco_widgets_init() {
	
	$labtechco_theme_options = get_option('labtechco_theme_options');
	
	$pf_type_title_singular     = ( !empty($labtechco_theme_options['pf_type_title_singular'])      ) ? $labtechco_theme_options['pf_type_title_singular']               : esc_attr__('Portfolio', 'labtechco' ) ;
	$pf_cat_title_singular      = ( !empty($labtechco_theme_options['pf_cat_title_singular'])       ) ? $labtechco_theme_options['pf_cat_title_singular']                : esc_attr__('Portfolio Category', 'labtechco' ) ;
	$service_title_singular     = ( !empty($labtechco_theme_options['service_type_title_singular']) ) ? $labtechco_theme_options['service_type_title_singular']          : esc_attr__('Service', 'labtechco' ) ;
	$service_cat_title_singular = ( !empty($labtechco_theme_options['service_cat_title_singular'])  ) ? esc_attr($labtechco_theme_options['service_cat_title_singular']) : esc_attr__('Service Category', 'labtechco') ;
	$team_member_title_singular = ( !empty($labtechco_theme_options['team_type_title_singular'])    ) ? esc_attr($labtechco_theme_options['team_type_title_singular'])   : esc_attr__('Team Member', 'labtechco') ;
	$team_group_title_singular  = ( !empty($labtechco_theme_options['team_group_title_singular'])   ) ? esc_attr($labtechco_theme_options['team_group_title_singular'])  : esc_attr__('Team Group', 'labtechco') ;

	
	register_sidebar( array(
		'name'			=> esc_attr__( 'Left Sidebar for Blog', 'labtechco' ),
		'id'			=> 'sidebar-left-blog',
		'description'	=> esc_attr__( 'This is left sidebar for blog section', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name'			=> esc_attr__( 'Right Sidebar for Blog', 'labtechco' ),
		'id'			=> 'sidebar-right-blog',
		'description'	=> esc_attr__( 'This is right sidebar for blog section', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	register_sidebar( array(
		'name'			=> esc_attr__( 'Left Sidebar for Pages', 'labtechco' ),
		'id'			=> 'sidebar-left-page',
		'description'	=> esc_attr__( 'This is left sidebar for pages', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name'			=> esc_attr__( 'Right Sidebar for Pages', 'labtechco' ),
		'id'			=> 'sidebar-right-page',
		'description'	=> esc_attr__( 'This is right sidebar for pages', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	// Portfolio - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'labtechco' ), $pf_type_title_singular ),
		'id'			=> 'sidebar-left-portfolio',
		'description'	=> esc_attr__( 'This is left sidebar for Portfolio', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Portfolio - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'labtechco' ), $pf_type_title_singular ),
		'id'			=> 'sidebar-right-portfolio',
		'description'	=> esc_attr__( 'This is right sidebar for Portfolio', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Portfolio Category - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'labtechco' ), $pf_cat_title_singular ),
		'id'			=> 'sidebar-left-portfoliocat',
		'description'	=> esc_attr__( 'This is left sidebar for Portfolio Category pages.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Portfolio Category - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'labtechco' ), $pf_cat_title_singular ),
		'id'			=> 'sidebar-right-portfoliocat',
		'description'	=> esc_attr__( 'This is right sidebar for Portfolio Category pages.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	// Service - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'labtechco' ), $service_title_singular ),
		'id'			=> 'sidebar-left-service',
		'description'	=> esc_attr__( 'This is left sidebar for Service', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Service - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'labtechco' ), $service_title_singular ),
		'id'			=> 'sidebar-right-service',
		'description'	=> esc_attr__( 'This is right sidebar for Service', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Service Category - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'labtechco' ), $service_cat_title_singular ),
		'id'			=> 'sidebar-left-servicecat',
		'description'	=> esc_attr__( 'This is left sidebar for Service Category pages.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Service Category - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'labtechco' ), $service_cat_title_singular ),
		'id'			=> 'sidebar-right-servicecat',
		'description'	=> esc_attr__( 'This is right sidebar for Service Category pages.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	
	// Team Member - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'labtechco' ), $team_member_title_singular ),
		'id'			=> 'sidebar-left-team-member',
		'description'	=> esc_attr__( 'This is left sidebar for Team Member', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	// Team Member - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'labtechco' ), $team_member_title_singular ),
		'id'			=> 'sidebar-right-team-member',
		'description'	=> esc_attr__( 'This is right sidebar for Team Member', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Team Member Group - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'labtechco' ), $team_group_title_singular ),
		'id'			=> 'sidebar-left-team-member-group',
		'description'	=> esc_attr__( 'This is left sidebar for Team Member Group.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Team Member Group - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'labtechco' ), $team_group_title_singular ),
		'id'			=> 'sidebar-right-team-member-group',
		'description'	=> esc_attr__( 'This is right sidebar for Team Member Group', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	register_sidebar( array(
		'name'			=> esc_attr__( 'Left Sidebar for Search', 'labtechco' ),
		'id'			=> 'sidebar-left-search',
		'description'	=> esc_attr__( 'This is left sidebar for search', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Right Sidebar for search', 'labtechco' ),
		'id'			=> 'sidebar-right-search',
		'description'	=> esc_attr__( 'This is right sidebar for search', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	if( function_exists('is_woocommerce') ){
		// WooCommerce - Left
		register_sidebar( array(
			'name' => esc_html__( 'Left Sidebar for WooCommerce Shop Page', 'labtechco' ),
			'id' => 'sidebar-left-woocommerce',
			'description' => esc_html__( 'This is left sidebar for WooCommerce shop pages.', 'labtechco' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		// WooCommerce - Right
		register_sidebar( array(
			'name' => esc_html__( 'Right Sidebar for WooCommerce Shop Page', 'labtechco' ),
			'id' => 'sidebar-right-woocommerce',
			'description' => esc_html__( 'This is right sidebar for WooCommerce shop pages.', 'labtechco' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}

	if( function_exists('is_bbpress') ){
		// BBPress - Left
		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar for BBPress', 'labtechco' ),
			'id'            => 'sidebar-left-bbpress',
			'description'   => esc_html__( 'This is left sidebar for BBPress.', 'labtechco' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// BBPress - Right
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar for BBPress', 'labtechco' ),
			'id'            => 'sidebar-right-bbpress',
			'description'   => esc_html__( 'This is right sidebar for BBPress.', 'labtechco' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	// First Footer widgets
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 1st Widget Area', 'labtechco' ),
		'id'			=> 'first-footer-1-widget-area',
		'description'	=> esc_attr__( 'This is first footer widget area for first row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 2nd Widget Area', 'labtechco' ),
		'id'			=> 'first-footer-2-widget-area',
		'description'	=> esc_attr__( 'This is second footer widget area for first row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 3rd Widget Area', 'labtechco' ),
		'id'			=> 'first-footer-3-widget-area',
		'description'	=> esc_attr__( 'This is third footer widget area for first row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 4th Widget Area', 'labtechco' ),
		'id'			=> 'first-footer-4-widget-area',
		'description'	=> esc_attr__( 'This is fourth footer widget area for first row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	// Second Footer widgets
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 1st Widget Area', 'labtechco' ),
		'id'			=> 'second-footer-1-widget-area',
		'description'	=> esc_attr__( 'This is first footer widget area for second row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 2nd Widget Area', 'labtechco' ),
		'id'			=> 'second-footer-2-widget-area',
		'description'	=> esc_attr__( 'This is second footer widget area for second row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 3rd Widget Area', 'labtechco' ),
		'id'			=> 'second-footer-3-widget-area',
		'description'	=> esc_attr__( 'This is third footer widget area for second row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 4th Widget Area', 'labtechco' ),
		'id'			=> 'second-footer-4-widget-area',
		'description'	=> esc_attr__( 'This is fourth footer widget area for second row of footer.', 'labtechco' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	
	// Dynamic Sidebars (Unlimited Sidebars)
	global $labtechco_theme_options;
	$labtechco_theme_options = get_option('labtechco_theme_options');
	if( isset($labtechco_theme_options['custom_sidebars']) && is_array($labtechco_theme_options['custom_sidebars']) && count($labtechco_theme_options['custom_sidebars'])>0 ){
		foreach( $labtechco_theme_options['custom_sidebars'] as $custom_sidebar ){
			
			if( isset($custom_sidebar['custom_sidebar']) && trim($custom_sidebar['custom_sidebar'])!='' ){
				$custom_sidebar = $custom_sidebar['custom_sidebar'];
				if( trim($custom_sidebar)!='' ){
					$custom_sidebar_key = sanitize_title($custom_sidebar);
					register_sidebar( array(
						'name'          => $custom_sidebar,
						'id'            => $custom_sidebar_key,
						'description'   => esc_attr__( 'This is custom widget developed from "LabtechCO Options".', 'labtechco' ),
						'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>',
					) );
				}
			}
			
		}
	}
	
}
add_action( 'widgets_init', 'labtechco_widgets_init' );

/**
 * Clear Elementor cache
 */
if( !function_exists('ts_addons_clear_elementor_cache') ){
function ts_addons_clear_elementor_cache(){
	update_option( 'elementor_css_print_method', 'external' );
	$folder = WP_CONTENT_DIR. 'uploads/elementor/css';
	if( file_exists($folder) && is_dir($folder) ){
		foreach ( glob( $folder ) as $file_path ) {
			unlink( $file_path );
		}
	}
}
}