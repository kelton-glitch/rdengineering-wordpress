<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

// Get current theme name and vesion
$ts_theme = wp_get_theme();
$ts_theme_name = $ts_theme->get( 'Name' );
$ts_theme_ver  = $ts_theme->get( 'Version' );


// Getting all theme options again if variable is not defined
global $labtechco_theme_options;
if( empty($labtechco_theme_options) || !is_array($labtechco_theme_options) ){
	if( function_exists('themestek_load_default_theme_options') ){
		themestek_load_default_theme_options();
	} else {
		$labtechco_theme_options = get_option('labtechco_theme_options');
	}
}

// variables
$team_member_title          = ( !empty($labtechco_theme_options['team_type_title']) ) ? esc_attr($labtechco_theme_options['team_type_title']) : esc_attr__('Team Members', 'labtechco') ;
$team_member_title_singular = ( !empty($labtechco_theme_options['team_type_title_singular']) ) ? esc_attr($labtechco_theme_options['team_type_title_singular']) : esc_attr__('Team Member', 'labtechco') ;
$team_group_title           = ( !empty($labtechco_theme_options['team_group_title']) ) ? esc_attr($labtechco_theme_options['team_group_title']) : esc_attr__('Team Groups', 'labtechco') ;
$team_group_title_singular  = ( !empty($labtechco_theme_options['team_group_title_singular']) ) ? esc_attr($labtechco_theme_options['team_group_title_singular']) : esc_attr__('Team Group', 'labtechco') ;

$pf_title               = ( !empty($labtechco_theme_options['pf_type_title']) ) ? esc_attr($labtechco_theme_options['pf_type_title']) : esc_attr__('Research', 'labtechco') ;
$pf_title_singular      = ( !empty($labtechco_theme_options['pf_type_title_singular']) ) ? esc_attr($labtechco_theme_options['pf_type_title_singular']) : esc_attr__('Research', 'labtechco') ;
$pf_cat_title           = ( !empty($labtechco_theme_options['pf_cat_title']) ) ? esc_attr($labtechco_theme_options['pf_cat_title']) : esc_attr__('Research Categories', 'labtechco') ;
$pf_cat_title_singular  = ( !empty($labtechco_theme_options['pf_cat_title_singular']) ) ? esc_attr($labtechco_theme_options['pf_cat_title_singular']) : esc_attr__('Research Category', 'labtechco') ;

$service_title               = ( !empty($labtechco_theme_options['service_type_title']) ) ? esc_attr($labtechco_theme_options['service_type_title']) : esc_attr__('Service', 'labtechco') ;
$service_title_singular      = ( !empty($labtechco_theme_options['service_type_title_singular']) ) ? esc_attr($labtechco_theme_options['service_type_title_singular']) : esc_attr__('Service', 'labtechco') ;
$service_cat_title           = ( !empty($labtechco_theme_options['service_cat_title']) ) ? esc_attr($labtechco_theme_options['service_cat_title']) : esc_attr__('Service Categories', 'labtechco') ;
$service_cat_title_singular  = ( !empty($labtechco_theme_options['service_cat_title_singular']) ) ? esc_attr($labtechco_theme_options['service_cat_title_singular']) : esc_attr__('Service Category', 'labtechco') ;


/**
 *  FRAMEWORK SETTINGS
 */
$ts_framework_settings = array(
	'menu_title' 	  => esc_attr__('LabtechCO Options', 'labtechco'),
	'menu_type'  	  => 'menu',
	'menu_slug'  	  => 'themestek-theme-options',
	'ajax_save'  	  => true,
	'show_reset_all'  => false,
	'framework_title' => esc_attr($ts_theme_name).'  <small>'.esc_attr($ts_theme_ver).'</small>',
	'menu_position'   => 2, // See below comment for proper number
);

/**
 *  FRAMEWORK OPTIONS
 */
$ts_framework_options = array();


// Layout Settings
$ts_framework_options[] = array(
	'name'   => 'layout_settings', // like ID
	'title'  => esc_attr__('Layout Settings', 'labtechco'),
	'icon'   => 'fa fa-gear',
	
	'sections' => array(
	
	
		// Layout Settings - General Settings
		array(
			'name'   => 'general_settings', // like ID
			'icon'   => 'fa fa-gear',
			'title'  => esc_attr__('General Settings', 'labtechco'),
			'fields' => array( // begin: fields
				array(
					'type'    	=> 'heading',
					'content'	=> esc_attr__('General settings like logo, header, skincolor etc.', 'labtechco'),
				),
				array(
					'id'      => 'skincolor',
					'type'    => 'themestek_skin_color',
					'title'   => esc_attr__( 'Select Skin Color', 'labtechco' ),
					'after'   	=> '<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Select the main color. This color will be used globally.', 'labtechco').'</div>',
					'default' => '#3368c6',
					'options' => array(
						'Rio Grande'		=> '#3368c6', /* Default skin color */
						'Science Blue'		=> '#0073cc',
						'Red Orange'		=> '#ff4229',
						'Vivid Violet'		=> '#af33bb',
						'Tan Hide'			=> '#f9a861',
						'Selective Yellow'	=> '#ffb901',
						'Red'				=> '#ff0b09',
						'Purple Heart'		=> '#6c33bb',
						'Azure Radiance'	=> '#0095eb',
						'Mountain Meadow'	=> '#18c47c',
						
					),
					'rgba'    => false,
				),
				array(
					'id'     		 => 'skincolor_dark',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Dark variation of Skin Color', 'labtechco' ),
					'default'		 => '#031b4e',
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select color that is darker than the skin color', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'skincolor_light',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Light variation of Skin Color', 'labtechco' ),
					'default'		 => '#f6faff',
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select color that is darker than the skin color', 'labtechco').'</div>',
				),
				array(
					'type'    	=> 'heading',
					'content'	=> esc_attr__('Select Gradient Color, skincolor etc.', 'labtechco'),
				),
				array(
					'id'     		 => 'first_gradient',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Select first Gradient Color', 'labtechco' ),
					'default'		 => '#68b13b',
				),
				array(
					'id'     		 => 'second_gradient',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Select Second Gradient Color', 'labtechco' ),
					'default'		 => '#138e55',
				),
				array(
					'id'		=> 'layout',
					'type'		=> 'image_select',//themestek_pre_color_packages
					'title'		=> esc_attr__('Pages Layout', 'labtechco'), 
					'options'	=> array(
						'wide'		=> get_template_directory_uri() . '/includes/images/layout-wide.png',
						'boxed'		=> get_template_directory_uri() . '/includes/images/layout-box.png',
						'framed'	=> get_template_directory_uri() . '/includes/images/layout-frame.png',
						'rounded'	=> get_template_directory_uri() . '/includes/images/layout-rounded.png',
						'fullwide'	=> get_template_directory_uri() . '/includes/images/layout-fullwide.png',
					),
					'default'	=> 'wide',
					'after'		=> '<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Specify the layout for the pages', 'labtechco').'</div>',
					'radio'		=> true,
				),
				
				array(
					'id'        => 'full_wide_elements',
					'type'      => 'checkbox',
					'title'     => esc_attr__('Select Elements for Full Wide View (in above option)', 'labtechco'),
					'options'   => array(
						'floatingbar' => esc_attr__('Floatbar', 'labtechco'),
						'topbar'      => esc_attr__('Pre Header', 'labtechco'),
						'header'      => esc_attr__('Header', 'labtechco'),
						'content'     => esc_attr__('Content Area', 'labtechco'),
						'footer'      => esc_attr__('Footer', 'labtechco'),
					),
					'default'    => array( 'header', 'footer' ),
					'after'    	 => '<small>'.esc_attr__('Select elements that you want to show in full-wide view', 'labtechco').'</small>',
					'dependency' => array( 'layout_fullwide', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Logo', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Select or upload your logo. You can also show text logo from here.', 'labtechco').'<br /> <span class="ts-toptions-head-highlight">'.esc_attr__('You can go to "Header Settings" tab from the left menu for more options.', 'labtechco') . '</span></small>',
				),
				array(
				  'id'      	 	 => 'logotype',
				  'type'     		 => 'radio',
				  'title'    		 => esc_attr__('Logo type', 'labtechco'), 
				  'options' 		 => array( 
						'text'			=> esc_attr__('Logo as Text', 'labtechco'), 
						'image'			=> esc_attr__('Logo as Image', 'labtechco') 
					),
				  'default'  		 => 'image',
				  'after'  			 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Specify the type of logo. It can Text or Image', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'logotext',
					'type'    		 => 'text',
					'title'   		 => esc_attr__('Logo Text', 'labtechco'),
					'default' 		 => esc_attr('LabtechCO'),
					'dependency'  	 => array( 'logotype_text', '==', 'true' ),
					'after'  			 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Enter the text to be used instead of the logo image', 'labtechco').'</div>',
				),
				array(
					'id'             => 'logo_font',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Logo Font', 'labtechco'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to false
					'color'          => true,
					'all-varients'   => false,
					'output'         => '.headerlogo a.home-link', // An array of CSS selectors to apply this font style to dynamically
					'default'        => array(
						'family'		 => 'Arimo',
						'backup-family'	 => 'Arial, Helvetica, sans-serif',
						'variant'		 => 'regular',
						'font-size'		 => '26',
						'line-height'	 => '27',
						'letter-spacing' => '0',
						'color'			 => '#202020',
						'font'			 => 'google',
					),
					'dependency'  	=> array( 'logotype_text', '==', 'true' ),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This will be applied to logo text only. Select Logo font-style and size', 'labtechco').'</div>',
				),
				array(
					'id'       		 => 'logoimg',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_attr__('Logo Image', 'labtechco'),
					'dependency'  	 => array( 'logotype_image', '==', 'true' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Upload image that will be used as logo for the site ', 'labtechco') . sprintf(esc_attr__('%1$sNOTE:%2$s Upload image that will be used as logo for the site', 'labtechco'),'<strong>', '</strong>').'</div>',
					'add_title'		 => esc_attr__('Upload Site Logo','labtechco'),
					'default'		 => array(
						'thumb-url'	=> get_template_directory_uri() . '/images/logo.png',
						'full-url'	=> get_template_directory_uri() . '/images/logo.png',
					),
				),
				array(
					'id'       		 => 'logoimg_crossover',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_attr__('Logo Image (on cross effect and classic header style only)', 'labtechco'),
					'dependency'  	 => array( 'logotype_image', '==', 'true' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Upload image that will be used as logo for the site ', 'labtechco') . sprintf(esc_attr__('%1$sNOTE:%2$s Upload image that will be used as logo for the site only when crossing effect is available', 'labtechco'),'<strong>', '</strong>').'</div>',
					'add_title'		 => esc_attr__('Upload Site Logo for crossing effect header','labtechco'),
					'default'		 => array(
						'thumb-url'	=> get_template_directory_uri() . '/images/logo-white.png',
						'full-url'	=> get_template_directory_uri() . '/images/logo-white.png',
					),
				),
				array(
					'id'       		 => 'logoimg_sticky',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_attr__('Logo Image for Sticky Header (optional)', 'labtechco'),
					'dependency'  	 => array( 'sticky_header|logotype_image', '==|==', 'true|true' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('This logo will appear only on sticky header only.', 'labtechco') . '</div>',
					'add_title'		 => esc_attr__('Upload Sticky Logo','labtechco'),
				),
				
				array(
					'type'      	=> 'heading',
					'content'     	=> esc_attr__('Background Settings', 'labtechco'),
					'after'  		=> '<small>'.esc_attr__('Set below background options. Background settings will be applied to Boxed layout only', 'labtechco').'</small>',
				),
				array(
					'id'     		=> 'global_background',
					'type'   		=> 'themestek_background',
					'title' 		=> esc_attr__('Body Background Properties', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'labtechco').'</div>',
					'default'		=> array(
						'color'			=> '#ffffff',
					),
					'output'        => 'body',
				),
				array(
					'id'     		=> 'inner_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Content Area Background Properties', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for content area', 'labtechco').'</div>',
					'default' 	=> array(
						'color' 		=> '#ffffff',
					),
					'output'        => 'body .site-content-wrapper',
				),
				
				array(
					'type'		=> 'heading',
					'content'	=> esc_attr__('Pre-loader Image', 'labtechco'),
					'after'		=> '<small>'.esc_attr__('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices', 'labtechco').'</small>',
				),
				array(
					'id'     		=> 'preloader_show',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Pre-loader animation', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide pre-loader animation.', 'labtechco') . '</div>',
				),
				array(
					'id'		=> 'loaderimg',
					'type'		=> 'image_select',
					'title'		=> esc_attr__('Pre-loader Image', 'labtechco'), 
					'options'	=> array(
						'1'   		=> get_template_directory_uri() . '/images/loader1.svg',
						'2'   		=> get_template_directory_uri() . '/images/loader2.svg',
						'3'   		=> get_template_directory_uri() . '/images/loader3.svg',
						'4'   		=> get_template_directory_uri() . '/images/loader4.svg',
						'5'   		=> get_template_directory_uri() . '/images/loader5.svg',
						'6'   		=> get_template_directory_uri() . '/images/loader6.svg',
						'7'   		=> get_template_directory_uri() . '/images/loader7.svg',
						'8'   		=> get_template_directory_uri() . '/images/loader8.svg',
						'9'   		=> get_template_directory_uri() . '/images/loader9.svg',
						'10'   		=> get_template_directory_uri() . '/images/loader10.svg',
						'custom'	=> get_template_directory_uri() . '/images/loader-custom.gif',
					),
					'radio'		=> true,
					'default'	=> '1',
					'after'		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Please select pre-loader image.', 'labtechco') . '</div>',
					'dependency' => array( 'preloader_show', '==', 'true' ),
				),
				array(
					'id'       		=> 'loaderimage_custom',
					'type'      	=> 'image',
					'title'    		=> esc_attr__('Upload Page-loader Image', 'labtechco'),
					'add_title' 	=> 'Select/Upload Page-loader image',
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Custom page-loader image that you want to show. You can create animated GIF image from your logo from Animizer website.', 'labtechco') . ' <a href="'. esc_url('http://animizer.net/en/animate-static-image') .'" title="' . esc_attr__('Click here to go to Animizer website.', 'labtechco') . '" target="_blank">' . esc_attr__('Click here to go to Animizer website.', 'labtechco') . '</a></div>',
					'dependency'    => array( 'loaderimg_custom|preloader_show', '==|==', 'true|true' ),
				),
				array(
					'type'		=> 'heading',
					'content'	=> esc_html__('Totop Button', 'labtechco'),
					'after'		=> '<small>'.esc_html__('Show or hide Totop Button', 'labtechco').'</small>',
				),
				array(
					'id'     		=> 'hide_totop_button',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Hide Totop Button', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Show or hide Totop Button.', 'labtechco') . '</div>',
				),
				array(
					'type'		=> 'heading',
					'content'	=> esc_html__('Container Width', 'labtechco'),
				),
				array(
					'id'     		=> 'container_width',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Container Width (1270)', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Show or hide Totop Button.', 'labtechco') . '</div>',
				),
				array(
					'id'     		=> 'container_width2',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Container Width (1600)', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Show or hide Totop Button.', 'labtechco') . '</div>',
				),
			),
		),
		
		// Layout Settings - Floatbar Settings
		array(
			'name'   => 'floatingbar_settings', // like ID
			'title'  => esc_attr__('Floatbar Settings', 'labtechco'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Floatbar Settings', 'labtechco'),
				),
				array(
					'id'     		=> 'fbar_show',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Floatbar', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Show or hide Floatbar', 'labtechco').'</div>',
				),
				array(
					'id'      => 'fbar-position',
					'type'    => 'radio',
					'title'   => esc_attr__('Floating bar position', 'labtechco'),
					'options' => array(
						'default' => esc_attr__('Top','labtechco'),
						'right'   => esc_attr__('Right', 'labtechco'),
					),
					'default'    => 'right',
					'after'      => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Position for Floating bar', 'labtechco').'</div>',
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'            => 'fbar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Background Color', 'labtechco'),
					'options'  		=> array(
						'darkgrey'    => esc_attr__('Dark grey', 'labtechco'),
						'grey'        => esc_attr__('Grey', 'labtechco'),
						'white'       => esc_attr__('White', 'labtechco'),
						'skincolor'   => esc_attr__('Skincolor', 'labtechco'),
						'custom'      => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'skincolor',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Floatbar background color', 'labtechco').'</div>',
				),
				array(
					'id'      		=> 'fbar_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Floatbar Background Properties', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for Floating bar. You can set color or image and also set other background related properties', 'labtechco').'</div>',
					'color'			=> true,
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'default'		=> array(
						'size'				=> 'cover',
						'color'				=> '#3368c6',
					),
					'output' 	        => '.themestek-fbar-box-w',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'fbar_bg_color',   // color dropdown to decide which color
					
				),
				array(
					'id'            => 'fbar_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Text Color', 'labtechco'),
					'options' 		=> array(
						'white'			=> esc_attr__('White', 'labtechco'),
						'darkgrey'		=> esc_attr__('Dark', 'labtechco'),
						'custom'		=> esc_attr__('Custom color', 'labtechco'),
									),
					'default'		=> 'white',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'fbar_text_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Floatbar Custom Color for text', 'labtechco' ),
					'default'		 => '#dd3333',
					'dependency'  	 => array( 'fbar_show|fbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Floatbar', 'labtechco').'</div>',
				),
				
				array(
					'type'    	 => 'heading',
					'content'	 => esc_attr__('Floatbar Open/Close Button Settings', 'labtechco'),
					'after'		 => '<small>' . esc_attr__('Settings for Floatbar Open/Close Button', 'labtechco') . '</small>',
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'      => 'fbar_handler_icon',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_attr__('Open Link Icon', 'labtechco' ),
					'default' => array(
						'library'				=> 'themify',
						'library_fontawesome'	=> 'fa fa-arrow-down',
						'library_linecons'		=> 'vc_li vc_li-bubble',
						'library_themify'		=> 'themifyicon ti-menu',
					),
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'      => 'fbar_handler_icon_close',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_attr__('Close Link Icon', 'labtechco' ),
					'default' => array(
						'library'				=> 'themify',
						'library_fontawesome'	=> 'fa fa-arrow-up',
						'library_linecons'		=> 'vc_li vc_li-bubble',
						'library_themify'		=> 'themifyicon ti-close',
					),
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				
				array(
					'id'            => 'fbar_icon_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Open Icon Color', 'labtechco'),
					'options' 		=> array(
							'dark'       => esc_attr__('Dark grey', 'labtechco'),
							'grey'       => esc_attr__('Grey', 'labtechco'),
							'white'      => esc_attr__('White', 'labtechco'),
							'skincolor'  => esc_attr__('Skincolor', 'labtechco'),
					),
					'default'		=> 'white',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'labtechco').'</div>',
				),
				
				array(
					'id'            => 'fbar_icon_color_close',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Close Icon Color', 'labtechco'),
					'options' 		=> array(
							'dark'       => esc_attr__('Dark grey', 'labtechco'),
							'grey'       => esc_attr__('Grey', 'labtechco'),
							'white'      => esc_attr__('White', 'labtechco'),
							'skincolor'  => esc_attr__('Skincolor', 'labtechco'),
					),
					'default'		=> 'dark',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'labtechco').'</div>',
				),
				
				array(
					'type'    	 => 'heading',
					'content'	 => esc_attr__('Floatbar Widget Settings', 'labtechco'),
					'after'		 => '<small>' . esc_attr__('Settings for Floatbar Widgets', 'labtechco') . '</small>',
					'dependency' => array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
				),
				array(
					'id'			=> 'fbar_widget_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_attr__('Floatbar Widget Columns', 'labtechco'),
					'options'      	=> array(
							'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
							'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
							'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
							'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
							'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
							'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
							'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
							'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
							'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
							'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
							'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
							'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
					),
					'default'		=> '3_3_3_3',
					'dependency' 	=> array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Floatbar Column layout View for widgets.', 'labtechco').'</div>',
					'radio'      	=> true,
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Hide Floatbar in Small Devices', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Hide Floatbar in small devices like mobile, tablet etc.', 'labtechco').'</small>',
					'dependency'     => array('fbar_show','==','true'),
				),
				array(
					'id'       => 'floatingbar-breakpoint',
					'type'     => 'radio',
					'title'    => esc_attr__('Show/Hide Floatbar in Responsive Mode', 'labtechco'), 
					'subtitle' => esc_attr__('Change options for responsive behaviour of Floatbar.', 'labtechco'),
					'options'  => array(
						'all'      => esc_attr__('Show in all devices','labtechco'),
						'1200'     => esc_attr__('Show only on large devices','labtechco').' <small>'.esc_attr__('show only on desktops (>1200px)', 'labtechco').'</small>',
						'992'      => esc_attr__('Show only on medium and large devices','labtechco').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'labtechco').'</small>',
						'768'      => esc_attr__('Show on some small, medium and large devices','labtechco').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'labtechco').'</small>',
						'custom'   => esc_attr__('Custom (select pixel below)', 'labtechco'),
					),
					'dependency' => array('fbar_show','==','true'),
					'default'    => '1200'
				),
				array(
					'id'            => 'floatingbar-breakpoint-custom',
					'type'          => 'number',
					'title'         => esc_attr__( 'Custom screen size to hide Floatbar (in pixel)', 'labtechco' ),
					'subtitle'      => esc_attr__( 'Select after how many pixels the Floatbar will be hidden.', 'labtechco' ),
					'after'         => esc_attr(' px'),
					'default'       => '1200',
					'dependency' 	=> array( 'fbar_show|floatingbar-breakpoint_custom', '==|==', 'true|true' ),
				),
				
			)
		),
		
		// Layout Settings - Pre Header Settings
		array(
			'name'   => 'preheader_settings', // like ID
			'title'  => esc_attr__('Pre Header Settings', 'labtechco'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Pre Header settings', 'labtechco'),
				),
				array(
					'id'     		=> 'show_topbar',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Pre Header', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Show or hide Pre Header', 'labtechco').'</div>',
				),
				array(
					'id'            => 'topbar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Pre Header Background Color', 'labtechco'),
					'options'  		=> array(
						'transparent' => esc_attr__('Transparent', 'labtechco'),
						'darkgrey'    => esc_attr__('Dark grey', 'labtechco'),
						'grey'        => esc_attr__('Grey', 'labtechco'),
						'white'       => esc_attr__('White', 'labtechco'),
						'skincolor'   => esc_attr__('Skincolor', 'labtechco'),
						'custom'      => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'white',
					'dependency' 	=> array( 'show_topbar', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Pre Header background color', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'topbar_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Pre Header Custom Background Color', 'labtechco' ),
					'default'		 => '#ffffff',
					'dependency'  	 => array( 'show_topbar|topbar_bg_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Pre Header', 'labtechco').'</div>',
				),
				array(
					'id'            => 'topbar_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Pre Header Text Color', 'labtechco'),
					'options'  		=> array(
						'white'     	=> esc_attr__('White', 'labtechco'),
						'dark'      	=> esc_attr__('Dark', 'labtechco'),
						'skincolor' 	=> esc_attr__('Skin Color', 'labtechco'),
						'custom'   		=> esc_attr__('Custom color', 'labtechco'),
					),
					'default'       => 'dark',
					'dependency' 	=> array( 'show_topbar', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'topbar_text_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Pre Header Custom Color for text', 'labtechco' ),
					'default'		 => '#000000',
					'dependency'  	 => array( 'show_topbar|topbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom color for Pre Header Text', 'labtechco').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Pre Header Content Options', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Content for Pre Header', 'labtechco').'</small>',
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
				),
				array(
					'id'       		 => 'topbar_left_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('Pre Header Left Content', 'labtechco'),
					'shortcode'		 => true,
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
					'desc'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Left side of Pre Header area', 'labtechco').'</div>',
					'default'        => themestek_wp_kses('<ul class="top-contact">
<li><i class="ts-labtechco-icon-phone"></i><strong>Telphone</strong> : 123456789</li>
<li><i class="ts-labtechco-icon-mail-alt"></i><a href="#"><strong>Email Address</strong>: Info@Alphabet.com</a></li>
<li><i class="ts-labtechco-icon-location-pin"></i><a href="#"><strong>Office Address</strong>: 12 Tottins,NY,USA</a></li>
</ul>'),
				),
				array(
					'id'       		 => 'topbar_right_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('Pre Header Right Content', 'labtechco'),
					'shortcode'		 => true,
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
					'desc'  	 	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Right side of Pre Header area', 'labtechco').'</div>',
					'after'  	 	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('html tags and shortcodes are allowed', 'labtechco') . sprintf( esc_attr__('%1$s Click here to know more %2$s about shortcode description','labtechco') , '<a href="'. esc_url('http://labtechco.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ).'</div>',
					'default'		=> themestek_wp_kses('<div class="ts-last-sep-none">[ts-social-links]</div>'),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Hide Pre Header Bar in Small Devices', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Hide Pre Header Bar in small devices like mobile, tablet etc.', 'labtechco').'</small>',
					'dependency'     => array('show_topbar','==','true'),
				),
				array(
					'id'       => 'topbar-breakpoint',
					'type'     => 'radio',
					'title'    => esc_attr__('Show/Hide Pre Header Bar in Responsive Mode', 'labtechco'), 
					'subtitle' => esc_attr__('Change options for responsive behaviour of Pre Header Bar.', 'labtechco'),
					'options'  => array(
						'all'      => esc_attr__('Show in all devices','labtechco'),
						'1200'     => esc_attr__('Show only on large devices','labtechco').' <small>'.esc_attr__('show only on desktops (>1200px)', 'labtechco').'</small>',
						'992'      => esc_attr__('Show only on medium and large devices','labtechco').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'labtechco').'</small>',
						'768'      => esc_attr__('Show on some small, medium and large devices','labtechco').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'labtechco').'</small>',
						'custom'   => esc_attr__('Custom (select pixel below)', 'labtechco'),
					),
					'dependency' => array('show_topbar','==','true'),
					'default'    => '1200'
				),
				array(
					'id'            => 'topbar-breakpoint-custom',
					'type'          => 'number',
					'title'         => esc_attr__( 'Custom screen size to hide Pre Header (in pixel)', 'labtechco' ),
					'subtitle'      => esc_attr__( 'Select after how many pixels the Pre Header will be hidden.', 'labtechco' ),
					'after'         => esc_attr(' px'),
					'default'       => '1200',
					'dependency' 	=> array( 'show_topbar|topbar-breakpoint_custom', '==|==', 'true|true' ),
				),
				
			)
		),
		
		// Layout Settings - Header Settings
		array(
			'name'   => 'header_settings', // like ID
			'title'  => esc_attr__('Header Settings', 'labtechco'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
					
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Header Style', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change header style. Also you can set other header related changes too.', 'labtechco'). '</small>',
				),
				array(
					'id'			=> 'headerstyle',
					'type' 			=> 'image_select',
					'title'			=> esc_attr__('Select Header Style', 'labtechco'),
					'desc'     		=> esc_attr__('Please select header style', 'labtechco').'<div class="themestek-alert-message">'.esc_html__( 'NOTE: This will also change other options (like background color, menu color, logo etc) to set it with this header.', 'labtechco' ).'</div>',
					'wrap_class'    => 'ts-header-style',
					'options'      	=> array(
						'1'			=> get_template_directory_uri() . '/includes/images/header-style-1.png', // demo1
						'2'			=> get_template_directory_uri() . '/includes/images/header-style-2.png', // demo2
						'3'	        => get_template_directory_uri() . '/includes/images/header-style-3.png', // demo3
						'4'   	    => get_template_directory_uri() . '/includes/images/header-style-4.png', // demo4
						'5'	        => get_template_directory_uri() . '/includes/images/header-style-5.png', // demo5
						'6'	        => get_template_directory_uri() . '/includes/images/header-style-6.png', // demo6
						'7'	        => get_template_directory_uri() . '/includes/images/header-style-7.png', // demo7
						'8'	        => get_template_directory_uri() . '/includes/images/header-style-8.png', // demo8
						'9'	        => get_template_directory_uri() . '/includes/images/header-style-9.png', // demo9
						'10'      	=> get_template_directory_uri() . '/includes/images/header-style-10.png', // demo10
						'11'      	=> get_template_directory_uri() . '/includes/images/header-style-11.png', // demo11
						'12'      	=> get_template_directory_uri() . '/includes/images/header-style-12.png', // demo12
						'13'      	=> get_template_directory_uri() . '/includes/images/header-style-13.png', // demo13
						'14'		=> get_template_directory_uri() . '/includes/images/header-style-14.png', // demo13
						
					),
					'default'		=> '1',
					'attributes' 	=> array(
						'data-depend-id' => 'header_style'
					),
					'radio' 		=> true,
				),
				
				// Options for selected header
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Options for selected header', 'labtechco'),
					'dependency'	=> array( 'header_style', 'any', '1,3,2,4,6,7,8,9,10' ),
					'after'  	  	 => '<small>'.esc_attr__('These options will appear for selected header style only.', 'labtechco').'</small>',
				),
				
				// Button

				array(
					'id'		=> 'third_sty_header_btn',
					'type'		=> 'fieldset',
					'title'		=> esc_attr__('Header Button', 'labtechco'),
					'fields'	=> array(
						array(
							'id'     		=> 'third_sty_header_btn_text',
							'type'    		=> 'text',
							'title'   		=> esc_attr__('Header Button Text', 'labtechco'),
							'default' 		=> '',
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Header Button text', 'labtechco') . '</div>',
						),
						array(
							'id'     		=> 'third_sty_header_btn_link',
							'type'    		=> 'text',
							'title'   		=> esc_attr__('Header Button Link', 'labtechco'),
							'default' 		=> '',
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Header Button link', 'labtechco') . '</div>',
						),
					),
					'dependency'	=> array( 'header_style', 'any', '3' ),
				),
				
				// Group
				array(
					'id'		=> 'header_btn',
					'type'		=> 'fieldset',
					'title'		=> esc_attr__('Header Button', 'labtechco'),
					'fields'	=> array(
						array(
							'id'     		=> 'header_btn_text',
							'type'    		=> 'text',
							'title'   		=> esc_attr__('Header Button Text', 'labtechco'),
							'default' 		=> esc_attr__('CONSULTATION', 'labtechco'),
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Header Button text', 'labtechco') . '</div>',
						),
						array(
							'id'     		=> 'header_btn_link',
							'type'    		=> 'text',
							'title'   		=> esc_attr__('Header Button Link', 'labtechco'),
							'default' 		=> esc_attr('#'),
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Header Button link', 'labtechco') . '</div>',
						),
						array(
							'id'     		 => 'header_btn_bg_color',
							'type'   		 => 'color_picker',
							'title'  		 => esc_attr__('Header Button Background Color', 'labtechco' ),
							'default'		 => '#3368c6',
							'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select background color for header button', 'labtechco').'</div>',
							'output'		 => '.ts-header-style-infostack .ts-header-block .ts-vc_btn3',
							'output_mode'	 => 'background-color',
						),
						array(
							'id'     		 => 'header_btn_bg_color_hover',
							'type'   		 => 'color_picker',
							'title'  		 => esc_attr__('Header Button Hover Background Color', 'labtechco' ),
							'default'		 => '#3368c6',
							'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This background color will be applied on mouse over', 'labtechco').'</div>',
							'output'		 => '.ts-header-style-infostack .ts-header-block .ts-vc_btn3:hover',
							'output_mode'	 => 'background-color',
						),
					),
					'dependency'	=> array( 'header_style', 'any', '2,4,5,6,8,10,11,12,13,14' ),
				),
				array(
					'type'				=> 'text',
					'id'			=> 'header-btn2-text',
					'title'				=> esc_attr__( 'Header Button Second Text', 'labtechco' ),
					'default'		=> esc_attr__( 'Have any Question ?', 'labtechco' ),
					'dependency'	=> array( 'header_style', 'any', '13' ),
				),
	
				array(
					'type'				=> 'text',
					'id'			=> 'header-btn2-url',
					'title'				=> esc_attr__( 'Header Button Second Link (URL)', 'labtechco' ),
					'default'		=> esc_attr__( 'Have any Question ?', 'labtechco' ),
					'dependency'	=> array( 'header_style', 'any', '13' ),
				),
				array(
					'type'				=> 'text',
					'id'				=> 'header-btn3-text1',
					'title'				=> esc_attr__( 'Header Button Third Text 1', 'labtechco' ),
					'default'		=> esc_attr__( 'Have any Question ?', 'labtechco' ),
					'dependency'	=> array( 'header_style', 'any', '14' ),
				),
				array(
					'type'				=> 'text',
					'id'				=> 'header-btn3-text2',
					'title'				=> esc_attr__( 'Header Button Third Text 2', 'labtechco' ),
					'default'		=> esc_attr__( 'Have any Question ?', 'labtechco' ),
					'dependency'	=> array( 'header_style', 'any', '14' ),
				),
	
				array(
					'type'				=> 'text',
					'id'				=> 'header-btn3-url',
					'title'				=> esc_attr__( 'Header Button Third Link (URL)', 'labtechco' ),
					'default'		=> esc_attr__( '#', 'labtechco' ),
					'dependency'	=> array( 'header_style', 'any', '14' ),
				),
				array(
					'id'            => 'header_menu_position',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Menu Position', 'labtechco'),
					'options'  		=> array(
						'left'			=> esc_attr__('Left Align', 'labtechco'),
						'right'			=> esc_attr__('Right Align', 'labtechco'),
						'center'		=> esc_attr__('Center Align', 'labtechco'),
					),
					'default'       => 'right',
					'dependency'  	=> array( 'header_style', 'any', '1,3' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Menu Position. This option will work for currently selected header style only ', 'labtechco').'</div>',
				),
				array(
					'id'     		=> 'overlay_show_social',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Social Links', 'labtechco'),
					'default' 		=> true,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide social links in header.', 'labtechco') . '</div>',
					'dependency'  	=> array( 'header_style', 'any', '3,7,8,10' ),
				),
				
				array(
					'id'       		 => 'infostack_left_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('InfoStack First Box Content', 'labtechco'),
					'shortcode'		 => true,
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Left side of logo', 'labtechco').'</div>',
					'default'        => themestek_wp_kses('<div class="media-left"><div class="icon"> <i class="ts-labtechco-icon-phone-call"></i></div></div><div class="media-right"><h6>Telephone </h6><h3>+123456789 </h3> </div>'),
					'dependency'  	 => array( 'header_style', 'any', '2,8,9' ),
				),
				array(
					'id'       		 => 'infostack_right_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('InfoStack Second Box Content', 'labtechco'),
					'shortcode'		 => true,
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Right side of logo', 'labtechco').'</div>',
					'default'        => themestek_wp_kses('<div class="media-left"><div class="icon"> <i class="ts-labtechco-icon-envelope"></i></div></div><div class="media-right"><h6>Email Address </h6><h3>info@labtechco.com </h3> </div>'),
					'dependency'  	 => array( 'header_style', 'any', '2,8' ),
				),
				array(
					'id'       		 => 'infostack_phone_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('InfoStack Phone Number Area Content', 'labtechco'),
					'shortcode'		 => true,
					'desc'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear after menu. This will appear only on InfoStack header only.', 'labtechco').'</div>',
					'default'        => themestek_wp_kses('<div class="media-left"><div class="icon"> <i class="ts-labtechco-icon-location-pin"></i></div></div><div class="media-right"><h6>Office Address </h6><h3>12 Tottina, NY, USA </h3> </div>'),
					'dependency'  	 => array( 'header_style', 'any', '2,8' ),
				),
				array(
					'id'     		 => 'header_menuarea_height',
					'type'    		 => 'number',
					'title'   		 => esc_attr__('Menu area height', 'labtechco'),
					'default' 		 => '60',
					'after'          => esc_attr(' px'),
					'attributes'     => array(
						'min'       	 => 40,
					),
					'subtitle'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Height for menu area only', 'labtechco').'</div>',
					'dependency'     => array( 'header_style', 'any', '2,8' ),
				),
				array(
					'id'            => 'header_menu_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Menu Background Color', 'labtechco'),
					'options'  		=> array(
						'darkgrey'		=> esc_attr__('Dark grey', 'labtechco'),
						'grey'			=> esc_attr__('Grey', 'labtechco'),
						'white'			=> esc_attr__('White', 'labtechco'),
						'skincolor'		=> esc_attr__('Skincolor', 'labtechco'),
						'gradient'		=> esc_attr__('Gradient', 'labtechco'),
						'custom'		=> esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'skincolor',
					'dependency'	=> array( 'header_style', 'any', '2,8' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined background color for Menu area in header', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'header_menu_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Header Menu Background Custom Background Color', 'labtechco' ),
					'default'		 => 'rgba(0,0,0,0.31)',
					'dependency'  	 => array( 'header_menu_bg_color|header_style', '==|any', 'custom|2,8' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header Menu area', 'labtechco').'</div>',
				),
				array(
					'id'            => 'sticky_header_menu_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Sticky Header Menu Background Color', 'labtechco'),
					'options'  		=> array(
						'darkgrey'   => esc_attr__('Dark grey', 'labtechco'),
						'grey'       => esc_attr__('Grey', 'labtechco'),
						'white'      => esc_attr__('White', 'labtechco'),
						'skincolor'  => esc_attr__('Skincolor', 'labtechco'),
						'custom'     => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'darkgrey',
					'dependency'	=> array( 'header_style', 'any', '2' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined background color for Menu area in header when header is sticky', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'sticky_header_menu_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Sticky Header Menu Background Custom Background Color', 'labtechco' ),
					'default'		 => '#ffffff',
					'dependency'  	 => array( 'sticky_header_menu_bg_color|header_style', '==|any', 'custom|2' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header Menu area when header is sticky', 'labtechco').'</div>',
				),
				
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Header Settings', 'labtechco'),
				),
				array(
					'id'     		 => 'header_height',
					'type'   		 => 'number',
					'title'          => esc_attr__('Header Height (in pixel)', 'labtechco' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('You can set height of header area from here', 'labtechco').'</div>',
					'default'		 => '105',
				),
				array(
					'id'            => 'header_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Background Color', 'labtechco'),
					'options'		=> array(
						'transparent'	=> esc_attr__('Transparent', 'labtechco'),
						'darkgrey'		=> esc_attr__('Dark grey', 'labtechco'),
						'grey'			=> esc_attr__('Grey', 'labtechco'),
						'white'			=> esc_attr__('White', 'labtechco'),
						'skincolor'		=> esc_attr__('Skincolor', 'labtechco'),
						'custom'		=> esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Header background color', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Header Custom Background Color', 'labtechco' ),
					'default'		 => 'rgba(0,0,0,0)',
					'dependency'  	 => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'responsive_header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Responsive Header Custom Background Color', 'labtechco' ),
					'default'		 => 'rgba(21,21,21,0.96)',
					'dependency'  	 => array( 'header_bg_color|header_style', '==|any', 'custom|3,centerlogo-overlay,toplogo-overlay,classic-box-overlay,classic-box-overlay-rtl,classic-overlay-rtl,infostack-overlay,infostack-overlay-rtl' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header in responsive mode only. Like Mobile, tablet etc small screen devices.', 'labtechco').'</div>',
				),
				array(
					'id'            => 'header_responsive_icon_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Responsive Icon Color', 'labtechco'),
					'options'		=> array(
						'dark'			=> esc_attr__('Dark', 'labtechco'),
						'white'			=> esc_attr__('White', 'labtechco'),
					),
					'default'       => 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select color for responsive menu icon, cart icon, search icon. This is becuase PHP code cannot understand if you selected dark or light color as background. Will work in responsive only.', 'labtechco').'</div>',
					'dependency'    => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
				),
				
				array(
					'id'     		 => 'logo_max_height',
					'type'   		 => 'number',
					'title'          => esc_attr__('Logo Max Height', 'labtechco' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('If you feel your logo looks small than increase this and adjust it', 'labtechco').'</div>',
					'default'		 => '60',
					'dependency'  	 => array( 'logotype_image', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Sticky Header', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options for sticky header', 'labtechco').'</small>',
				),
				array(
					'id'     		=> 'sticky_header',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Enable Sticky Header', 'labtechco'),
					'default' 		=> true,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Select ON if you want the sticky header on page scroll', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'header_height_sticky',
					'type'   		 => 'number',
					'title'          => esc_attr__('Sticky Header Height (in pixel)', 'labtechco' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('You can set height of header area when it becomes sticky', 'labtechco').'</div>',
					'default'		 => '90',
					'dependency'     => array( 'sticky_header', '==', 'true' ),
				),
				array(
					'id'            => 'sticky_header_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Sticky Header Background Color', 'labtechco'),
					'options'		=> array(
						'darkgrey'		=> esc_attr__('Dark grey', 'labtechco'),
						'grey'			=> esc_attr__('Grey', 'labtechco'),
						'white'			=> esc_attr__('White', 'labtechco'),
						'skincolor'		=> esc_attr__('Skincolor', 'labtechco'),
						'custom'		=> esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'white',
					'dependency'    => array( 'sticky_header', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Sticky Header background color', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'sticky_header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Sticky Header Custom Background Color', 'labtechco' ),
					'default'		 => '#ffffff',
					'dependency'  	 => array( 'sticky_header_bg_color|sticky_header', '==|==', 'custom|true' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Sticky Header', 'labtechco').'</div>',
				),
				
				array(
					'id'     		 => 'logo_max_height_sticky',
					'type'   		 => 'number',
					'title'          => esc_attr__('Logo Max Height when Sticky Header', 'labtechco' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set logo when the header is sticky', 'labtechco').'</div>',
					'default'		 => '60',
					'dependency'     => array( 'sticky_header', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Search Button in Header', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Option to show or hide search button in header area', 'labtechco').'</small>',
				),
				array(
					'id'     		=> 'header_search',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Search Button', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to show search button in header. The icon will be at the right side (after menu)', 'labtechco').'</div>',
				),
				array(
					'id'			=> 'search_input',
					'type'			=> 'text',
					'title'			=> esc_attr__('Search Form Input Word', 'labtechco'),
					'default'		=> esc_attr__('Type Word Then Press Enter', 'labtechco'),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Write the search form input word here. <br> Default: "WRITE SEARCH WORD..."', 'labtechco').'</div>',
					'dependency'	=> array( 'header_search', '==', 'true' ),
				),
				array(
					'id'     		 => 'searchform_title',
					'type'    		 => 'text',
					'title'   		 => esc_attr__('Search Form Title', 'labtechco'),
					'default' 		 => '',
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Write the title for search form. Default: "Hi, How Can We Help You?"', 'labtechco').'</div>',
					'dependency'     => array( 'header_search', '==', 'true' ),
				),
				array(
					'id'       		 => 'logoimg_search',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_attr__('Logo on search form', 'labtechco'),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Upload logo image that will be shown above the search form.', 'labtechco').'</div>',
					'add_title'		 => esc_attr__('Upload Logo','labtechco'),
					'default'		 => array(
						'thumb-url'	=> get_template_directory_uri() . '/images/logo-white.png',
						'full-url'	=> get_template_directory_uri() . '/images/logo-white.png',
					),
					'dependency'	=> array( 'header_search', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Logo SEO', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options for Logo SEO', 'labtechco').'</small>',
				),
				array(
					'id'      		=> 'logoseo',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Logo Tag for SEO', 'labtechco'),
					'options' 		=> array(
						'h1homeonly' => esc_attr__('H1 for home, SPAN on other pages', 'labtechco'),
						'allh1'      => esc_attr__('H1 tag everywhere', 'labtechco'),
						'allspan'    => esc_attr__('SPAN tag everywhere', 'labtechco'),
					),
					'default'		=> 'h1homeonly',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select logo tag for SEO purpose', 'labtechco').'</div>',
				),
			
			)
		),
		
		// Layout Settings - Menu Settings
		array(
			'name'   => 'menu_settings', // like ID
			'title'  => esc_attr__('Menu Settings', 'labtechco'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Menu Settings', 'labtechco'),
					'after'  	  	=> '<small>'.esc_attr__('Responsive Menu Breakpoint: Change Options for responsive menu.', 'labtechco').'</small>',
				),
				array(
					'id'      		=> 'menu_breakpoint',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Responsive Menu Breakpoint', 'labtechco'),
					'options'  		=> array(
						'1200'   => esc_attr__('Large devices','labtechco').' <small>'.esc_attr__('Desktops (>1200px)', 'labtechco').'</small>',
						'992'    => esc_attr__('Medium devices','labtechco').' <small>'.esc_attr__('Desktops and Tablets (>992px)', 'labtechco').'</small>',
						'768'    => esc_attr__('Small devices','labtechco').' <small>'.esc_attr__('Mobile and Tablets (>768px)', 'labtechco').'</small>',
						'custom' => esc_attr__('Custom (select pixel below)', 'labtechco'),
					),
					'default'		=> '1200',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Change options for responsive menu breakpoint', 'labtechco').'</div>',
				),
				
				array(
					'id'     		=> 'megamenu-override',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Override Max Mega Menu Style', 'labtechco'),
					'default' 		=> true,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('We need to override some of the Max mega Menu plugin\'s settings to match with our theme. If you like to use the default vanilla look of Max Mega Menu than turn this option off.', 'labtechco').'</div>',
				),
				
				array(
					'id'     		 => 'menu_breakpoint-custom',
					'type'   		 => 'number',
					'title'          => esc_attr__('Custom Breakpoint for Menu (in pixel)', 'labtechco' ),
					'dependency'  	 => array( 'menu_breakpoint_custom', '==', 'true' ),
					'default'		 => '1200',
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select after how many pixels the menu will become responsive', 'labtechco').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Main Menu Options', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options for main menu in header', 'labtechco').'</small>',
				),
				array(
					'id'             => 'mainmenufont',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Main Menu Font', 'labtechco'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to false
					'color'          => true,
					'all-varients'   => false,
					'output'         => '#site-header-menu #site-navigation div.nav-menu > ul > li > a, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Roboto Condensed',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> '700',
						'text-transform'	=> 'uppercase',
						'font-size'			=> '14',
						'line-height'		=> '16',
						'letter-spacing'	=> '1',
						'color'				=> '#031b4e',
						'font'				=> 'google',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select main menu font, color and size', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'stickymainmenufontcolor',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Main Menu Font Color for Sticky Header', 'labtechco' ),
					'default'		 => '#031b4e',
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Main menu font color when the header becomes sticky', 'labtechco').'</div>',
				),
				array(
					'id'           	=> 'mainmenu_active_link_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Main Menu Active Link Color', 'labtechco'),
					'options'  		=> array(
						'skin'			=> esc_attr__('Skin color (default)', 'labtechco'),
						'custom'		=> esc_attr__('Custom color (select below)', 'labtechco'),
					),
					'default'      	=> 'skin',
					'after'  		=> themestek_wp_kses('<div class="cs-text-muted cs-text-desc"><br>
											<strong>' . esc_attr__('Tips:', 'labtechco') . '</strong>
											<ul>
												<li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'labtechco') . '</li>
												<li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'labtechco') . '</li>
											</ul>
										</div>'),
				),
				array(
					'id'     		 => 'mainmenu_active_link_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Main Menu Active Link Custom Color', 'labtechco' ),
					'default'		 => '#fff',
					'dependency'  	 => array( 'mainmenu_active_link_color', '==', 'custom' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom color for main menu active active link', 'labtechco').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Drop Down Menu Options', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options for drop down menu in header', 'labtechco').'</small>',
				),
				array(
					'id'             => 'dropdownmenufont',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Dropdown Menu Font', 'labtechco'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to false
					'color'          => true,
					'all-varients'   => false,
					'output'         => 'ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, .ts-mmmenu-override-yes #page #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, 
					.ts-mmmenu-override-yes #page #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, 
					.ts-mmmenu-override-yes #page #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, 
					.ts-mmmenu-override-yes #page #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, 
					.ts-mmmenu-override-yes #page #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, 
					.ts-mmmenu-override-yes #page #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, 
					.ts-mmmenu-override-yes #page #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family' => 'Roboto',
						'backup-family' => 'Arial, Helvetica, sans-serif',
						'variant' => '500',
						'text-transform' => 'uppercase',
						'font-size' => '12',
						'line-height' => '16',
						'letter-spacing' => '0.5',
						'color' => '#09162a',
						'font' => 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select dropdown menu font, color and size', 'labtechco').'</div>',
				),
				
				
				array(
					'id'           	=> 'dropmenu_active_link_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Dropdown Menu Active Link Color', 'labtechco'),
					'options'  		=> array(
						'skin'			=> esc_attr__('Skin color (default)', 'labtechco'),
						'custom'		=> esc_attr__('Custom color (select below)', 'labtechco'),
					),
					'default'      	=> 'skin',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . '<strong>' . esc_attr__('Tips:', 'labtechco') . '</strong>' . '<ul><li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'labtechco') . '</li><li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'labtechco') . '</li></ul></div>',
				),
				array(
					'id'     		=> 'dropmenu_active_link_custom_color',
					'type'   		=> 'color_picker',
					'title'  		=> esc_attr__('Dropdown Menu Active Link Custom Color', 'labtechco' ),
					'default'		=> '#3368c6',
					'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom color for dropdown menu active menu text', 'labtechco').'</div>',
				),
				array(
					'id'      		=> 'dropmenu_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Dropdown Menu Background Properties (for all dropdown menus)', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'labtechco').'</div>',
					'default'		=> array(
						'image'			=> '',
						'repeat'		=> 'no-repeat',
						'position'		=> 'center top',
						'size'			=> 'cover',
						'color'			=> '#eef1f5',
					),
					'output' 	    => '.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, #site-header-menu #site-navigation div.nav-menu > ul > li ul',
				),
				array(
					'id'      		=> 'dropdown_menu_separator',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Separator line between dropdown menu links', 'labtechco'),
					'options'  		=> array(
						'grey'			=> esc_attr__('Grey color as border color (default)', 'labtechco'),
						'white'			=> esc_attr__('White color as border color (for dark background color)', 'labtechco'),
						'no'			=> esc_attr__('No separator border', 'labtechco'),
					),
					'default'		=> 'grey',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br> <strong>' . esc_attr__('Tips:', 'labtechco') . '</strong>
										<ul>
											<li>' . esc_attr__('"Grey color as border color (default):" This is default border view.', 'labtechco') . '</li>
											<li>' . esc_attr__('"White color:" Select this option if you are going to select dark background color (for dropdown menu)', 'labtechco') . '</li>
											<li>' . esc_attr__('"No separator border:" Completely remove border. This will make your menu totally flat', 'labtechco') . '</li>
										</ul></div>',
				),
				array(
					'id'             => 'megamenu_widget_title',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('MegaMenu Widget Title Font', 'labtechco'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to false
					'color'          => true,
					'all-varients'   => false,
					'output'         => '#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family' => 'Vollkorn',
						'backup-family' => 'Arial, Helvetica, sans-serif',
						'variant' => '700',
						'text-transform' => '',
						'font-size' => '17',
						'line-height' => '16',
						'letter-spacing' => '1',
						'color' => '#ffffff',
						'font' => 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Font settings for mega menu widget title. <br><br> <strong>NOTE: </strong> This will work only if you installed "Max Mega Menu" plugin and also activated in the main (primary) menu', 'labtechco').'</div>',
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => '',
					'after'  	  	 => '<strong>'.esc_attr__('Individual Drop Down Menu Options', 'labtechco').'</strong>',
				),
				array(
					'id'      		=> 'dropmenu_background_1',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('First dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for first dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_2',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Second dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for second dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_3',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Third dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for third dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_4',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Fourth dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for fourth dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_5',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Fifth dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for fifth dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_6',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Sixth dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for sixth dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_7',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Seventh dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for seventh dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_8',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Eighth dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for eighth dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_9',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Ninth dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for ninth dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_10',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Tenth dropdown menu background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for tenth dropdown menu.', 'labtechco') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu:before',
				),
				
			)
		),
		
		// Layout Settings - Titlebar Settings
		array(
			'name'   => 'titlebar_settings', // like ID
			'title'  => esc_attr__('Titlebar Settings', 'labtechco'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Background Options', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'labtechco').'</small>',
				),
				array(
					'id'            => 'titlebar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Titlebar Background Color', 'labtechco'),
					'options'  => array(
						'transparent' => esc_attr__('Transparent', 'labtechco'),
						'darkgrey'    => esc_attr__('Dark grey', 'labtechco'),
						'grey'        => esc_attr__('Grey', 'labtechco'),
						'white'       => esc_attr__('White', 'labtechco'),
						'skincolor'   => esc_attr__('Skincolor', 'labtechco'),
						'custom'      => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'labtechco').'</div>',
				),
				array(
					'id'      		=> 'titlebar_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Titlebar Background Image', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'labtechco').'</div>',
					'color'			=> true,
					'default'		=> array(
						'image'			=> get_template_directory_uri() . '/images/titlebar-bg.jpg',
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'size'			=> 'cover',
						'color'			=> 'rgba(0,0,0,0)',
					),
					'output' 	    => 'div.ts-titlebar-wrapper',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'titlebar_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'        => 'titlebar_bg_featured_img',
					'type'      => 'checkbox',
					'title'     => esc_attr__('Featured Image as Titlebar Background', 'labtechco'),
					'options'   => array(
						'post'				=> sprintf( esc_attr__('For %1$s', 'labtechco') , '<strong>Post</strong>' ),
						'page'				=> sprintf( esc_attr__('For %1$s', 'labtechco') , '<strong>Page</strong>' ),
						'ts-portfolio'		=> sprintf( esc_attr__('For %1$s', 'labtechco') , '<strong>'.$pf_title_singular.'</strong>' ),
						'ts-team-member'	=> sprintf( esc_attr__('For %1$s', 'labtechco') , '<strong>'.$team_member_title_singular.'</strong>' ),
					),
					'default'    => array(),
					'after'    	 => '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Select which section (CPT) will show featured image as background image in Titlebar.', 'labtechco'). '<br>' . esc_attr__('NOTE: This will work for Single view only.', 'labtechco').'</div>',
					
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Font Settings', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'labtechco').'</small>',
				),
				array(
					'id'            => 'titlebar_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Titlebar Text Color', 'labtechco'),
					'options'  => array(
						'white'  => esc_attr__('White', 'labtechco'),
						'dark'   => esc_attr__('Dark', 'labtechco'),
						'custom' => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'labtechco').'</div>',
				),
				array(
					'id'             => 'titlebar_heading_font',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Heading Font', 'labtechco'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to false
					'color'          => true,
					'all-varients'   => true,
					'output'         => '.ts-titlebar h1.entry-title, .ts-titlebar-textcolor-custom .ts-titlebar-main .entry-title', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family' => 'Roboto Condensed',
						'backup-family' => 'Arial, Helvetica, sans-serif',
						'variant' => '700',
						'text-transform' => 'uppercase',
						'font-size' => '48',
						'line-height' => '58',
						'letter-spacing' => '1',
						'color' => '#dd9933',
						'all-varients' => 'on',
						'font' => 'google',
					),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'labtechco').'</div>',
				),
				array(
					'id'             => 'titlebar_subheading_font',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Sub-heading Font', 'labtechco'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to false
					'color'          => true,
					'all-varients'   => true,
					'output'         => '.ts-titlebar .entry-subtitle, .ts-titlebar-textcolor-custom .ts-titlebar-main .entry-subtitle', // An array of CSS selectors to apply this font style to dynamically
					'units'			 => 'px', // Defaults to px
					'default'        => array(
						'family' => 'Roboto Condensed',
						'backup-family' => 'Arial, Helvetica, sans-serif',
						'variant' => 'regular',
						'text-transform' => '',
						'font-size' => '19',
						'line-height' => '22',
						'letter-spacing' => '1',
						'color' => '#dd9933',
						'all-varients' => 'on',
						'font' => 'google',
					),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'labtechco').'</div>',
				),
				array(
					'id'             => 'titlebar_breadcrumb_font',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Breadcrumb Font', 'labtechco'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to false
					'color'          => true,
					'all-varients'   => false,
					'output'         => '.ts-titlebar .breadcrumb-wrapper, .ts-titlebar .breadcrumb-wrapper a', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family' => 'Roboto',
						'backup-family' => 'Arial, Helvetica, sans-serif',
						'variant' => '500',
						'text-transform' => '',
						'font-size' => '14',
						'line-height' => '24',
						'letter-spacing' => '0',
						'color' => '#eeee22',
						'font' => 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'labtechco').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Content Options', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'labtechco').'</small>',
				),
				array(
					'id'            => 'titlebar_view',
					'type'          => 'select',
					'title'         =>  esc_attr__('Titlebar Text Align', 'labtechco'),
					'options'       => array(
						'default'  => esc_attr__('All Center (default)', 'labtechco'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'labtechco'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 'labtechco'),
						'allleft'  => esc_attr__('All Left', 'labtechco'),
						'allright' => esc_attr__('All Right', 'labtechco'),
					),
					'default'       => 'left',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select text align in Titlebar', 'labtechco').'</div>',
				),
				array(
					'id'     		 => 'titlebar_height',
					'type'   		 => 'number',
					'title'          => esc_attr__( 'Titlebar Height', 'labtechco' ),
					'after'  	  	 => ' px<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Set height of the Titlebar. In pixel only', 'labtechco').'</div>',
					'default'		 => '200',
				),
				array(
					'id'        	=> 'breadcrumb_on_bottom',
					'type'      	=> 'checkbox',
					'title'     	=> esc_attr__('Show Breadcrumb on bottom of Titlebar area', 'labtechco'),
					'label'     	=> esc_attr__('YES', 'labtechco'),
					'default'   	=> false,
					'dependency'  	=> array( 'titlebar_view', 'any', 'default,allleft,allright' ),//Multiple dependency
					'after'    		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select this option if you like to show breadcrumbs on bottom of Titlebar area. This option will only work when Titlebar Text Align option above is set to (All Center, All Left or All Right)', 'labtechco').'</div>',
				),
				array(
					'id'            => 'titlebar_hide_breadcrumb',
					'type'          => 'select',
					'title'         =>  esc_attr__('Hide Breadcrumb', 'labtechco'),
					'options' 		=> array(
						'no'			=> esc_attr__('NO, show the breadcrumb', 'labtechco'),
						'yes'			=> esc_attr__('YES, Hide the Breadcrumb', 'labtechco'),
					),
					'default'       => 'no',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('You can show or hide the breadcrumb', 'labtechco').'</div>',
				),
				
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Extra Options', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Change settings for some extra options in Titlebar', 'labtechco').'</small>',
				),
				array(
					'id'      => 'adv_tbar_catarc',
					'type'    => 'text',
					'title'   => esc_attr__('Post Category "Category Archives:" Label Text', 'labtechco'),
					'default' => esc_attr__('Category Archives: ', 'labtechco'),
				),
				array(
					'id'      => 'adv_tbar_tagarc',
					'type'    => 'text',
					'title'   => esc_attr__('Post Tag "Tag Archives:" Label Text', 'labtechco'),
					'default' => esc_attr__('Tag Archives: ', 'labtechco'),
				),
				array(
					'id'      => 'adv_tbar_postclassified',
					'type'    => 'text',
					'title'   => esc_attr__('Post Taxonomy "Posts classified under:" Label Text', 'labtechco'),
					'default' => esc_attr__('Posts classified under: ', 'labtechco'),
				),
				array(
					'id'      => 'adv_tbar_authorarc',
					'type'    => 'text',
					'title'   => esc_attr__('Post Author "Author Archives:" Label Text', 'labtechco'),
					'default' => esc_attr__('Author Archives: ', 'labtechco'),
				),

			)
		),
		
		// Layout Settings - Footer Settings
		array(
			'name'   => 'footer_settings', // like ID
			'title'  => esc_attr__('Footer Settings', 'labtechco'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'			=> 'heading',
					'content'    	=> esc_attr__('Footer Style', 'labtechco'),
					'after'  	  	=> '<small>'.esc_attr__('Select Footer Style', 'labtechco').'</small>',
				),
				array(
					'type'			=> 'image_select',
					'id'		=> 'footer-style',
					'label'			=> esc_html__( 'Select Footer Style', 'labtechco' ),
					'default'		=> '1',
					'options'		=> array(
						'1'				=> get_template_directory_uri() . '/includes/images/footer-style-1.jpg',
						'2'				=> get_template_directory_uri() . '/includes/images/footer-style-2.jpg',
						'3'				=> get_template_directory_uri() . '/includes/images/footer-style-3.jpg',
					)
				),
				array(
					'type'			=> 'heading',
					'content'    	=> esc_attr__('Sticky Footer', 'labtechco'),
					'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'labtechco').'</small>',
				),
				array(
					'id'     		=> 'stickyfooter',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Sticky Footer', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'labtechco').'</div>',
				),
				
				// Footer common background
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Background (full footer elements)', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('This background property will apply to full footer area. You can add', 'labtechco').'</small>',
				),
				array(
					'id'            => 'full_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color (all area)', 'labtechco'),
					'options'		=> array(
						'transparent' => esc_attr__('Transparent', 'labtechco'),
						'darkgrey'    => esc_attr__('Dark grey', 'labtechco'),
						'grey'        => esc_attr__('Grey', 'labtechco'),
						'white'       => esc_attr__('White', 'labtechco'),
						'skincolor'   => esc_attr__('Skincolor', 'labtechco'),
						'custom'      => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'grey',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'labtechco').'</div>',
				),
				array(
					'id'      		 => 'full_footer_bg_all',
					'type'    		 => 'themestek_background',
					'title'  		 => esc_attr__('Footer Background (all area)', 'labtechco' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'labtechco').'</div>',
					'default'		 => array(
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'attachment'	=> 'fixed',
						'size'			=> 'cover',
						'color'			=> 'rgba(30,115,190,0.9)',
					),
					'output' 	     => '.footer',
					'output_bglayer' => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'full_footer_bg_color',   // color dropdown to decide which color
				),
				
				// Footer CTA
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Call-To-Action Area', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Modify elements like title, icon, button link, button title etc in footer Call-To-Action area.', 'labtechco').'</small>',
				),
				array(
					'id'     		=> 'footer_cta',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Footer CTA', 'labtechco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'labtechco').'</div>',
				),
				array(
					'id'      => 'footer_cta_icon',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_attr__('Open Link Icon', 'labtechco' ),
					'default' => array(
						'library'				=> 'ts_labtechco_business_icon',
						'library_fontawesome'	=> 'fa fa-arrow-down',
						'library_themify'		=> 'themifyicon ti-menu',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon ts-labtechco-business-icon-engineer',
					),
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_title',
					'type'    		=> 'textarea',
					'title'   		=> esc_attr__('Footer CTA Title', 'labtechco'),
					'default' 		=> esc_attr__('WE ARE AVAILABLE FOR YOU', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Title for the Footer CTA area', 'labtechco') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_subtitle',
					'type'    		=> 'textarea',
					'title'   		=> esc_attr__('Footer CTA Sub-title', 'labtechco'),
					'default' 		=> '',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Sub-title for the Footer CTA area', 'labtechco') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_button_text',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Footer CTA Button Text', 'labtechco'),
					'default' 		=> esc_attr__('CONTACT US', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Button text for the Footer CTA', 'labtechco') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_button_link',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Footer CTA Button Link', 'labtechco'),
					'default' 		=> esc_attr__('#', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Button link for the Footer CTA', 'labtechco') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				
				// First Footer Widget Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('First Footer Widget Area', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer widget area', 'labtechco').'</small>',
				),
				array(
					'id'			=> 'first_footer_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_attr__('Footer Widget Columns', 'labtechco'),
					'options'      	=> array(
						'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
						'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
						'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
						'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
						'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
						'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
						'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
						'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
						'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
						'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
						'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
						'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
						'3_4_5'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
					),
					'default'		=> '3_3_3_3',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'labtechco').'</div>',
					'radio'      	=> true,
				),
				
				array(
					'id'            => 'first_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color', 'labtechco'),
					'options'  => array(
						'transparent' => esc_attr__('Transparent', 'labtechco'),
						'darkgrey'    => esc_attr__('Dark grey', 'labtechco'),
						'grey'        => esc_attr__('Grey', 'labtechco'),
						'white'       => esc_attr__('White', 'labtechco'),
						'skincolor'   => esc_attr__('Skincolor', 'labtechco'),
						'custom'      => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'grey',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'labtechco').'</div>',
				),
				array(
					'id'      			=> 'first_footer_bg_all',
					'type'    			=> 'themestek_background',
					'title'  			=> esc_attr__('Footer Background', 'labtechco' ),
					'after'  			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'labtechco').'</div>',
					'default'			=> array(
						'repeat'			=> 'no-repeat',
						'attachment'		=> 'fixed',
						'color'				=> '#1f1f1f',
					),
					'output'			=> '.first-footer',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'first_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'first_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Text Color', 'labtechco'),
					'options'  		=> array(
						'white'			=> esc_attr__('White', 'labtechco'),
						'dark'			=> esc_attr__('Dark', 'labtechco'),
					),
					'default'      	=> 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'labtechco').'</div>',
				),

				// Second Footer Widget Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Second Footer Widget Area', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change settings for second footer widget area', 'labtechco').'</small>',
				),
				array(
					'id'			=> 'second_footer_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_attr__('Footer Widget Columns', 'labtechco'),
					'options'      	=> array(
						'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
						'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
						'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
						'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
						'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
						'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
						'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
						'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
						'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
						'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
						'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
						'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
						'3_4_5'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
					),
					'default'		=> '4_4_4',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'labtechco').'</div>',
					'radio'      	=> true,
				),
				array(
					'id'            => 'second_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color', 'labtechco'),
					'options'		=> array(
						'transparent' => esc_attr__('Transparent', 'labtechco'),
						'darkgrey'    => esc_attr__('Dark grey', 'labtechco'),
						'grey'        => esc_attr__('Grey', 'labtechco'),
						'white'       => esc_attr__('White', 'labtechco'),
						'skincolor'   => esc_attr__('Skincolor', 'labtechco'),
						'custom'      => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'labtechco').'</div>',
				),
				array(
					'id'      		=> 'second_footer_bg_all',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Footer Background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'labtechco').'</div>',
					'default'		=> array(
						'color'			=> '#191b1b',
					),
					'output' 	    => '.second-footer',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'second_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'second_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Text Color', 'labtechco'),
					'options'  		=> array(
						'white'  		=> esc_attr__('White', 'labtechco'),
						'dark'   		=> esc_attr__('Dark', 'labtechco'),
					),
					'default'      	=> 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'labtechco').'</div>',
				),

				// Footer Text Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Text Area', 'labtechco'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer text area. This contains copyright info', 'labtechco').'</small>',
				),
				array(
					'id'            => 'bottom_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color', 'labtechco'),
					'options'  => array(
						'transparent' => esc_attr__('Transparent', 'labtechco'),
						'darkgrey'    => esc_attr__('Dark grey', 'labtechco'),
						'grey'        => esc_attr__('Grey', 'labtechco'),
						'white'       => esc_attr__('White', 'labtechco'),
						'skincolor'   => esc_attr__('Skincolor', 'labtechco'),
						'custom'      => esc_attr__('Custom Color', 'labtechco'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'labtechco').'</div>',
				),
				array(
					'id'      		=> 'bottom_footer_bg_all',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Footer Background', 'labtechco' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'labtechco').'</div>',
					'default'		=> array(
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'attachment'	=> 'fixed',
						'color'			=> '#060604',
					),
					'output' 	    => '.bottom-footer-text',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'bottom_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'bottom_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Text Color', 'labtechco'),
					'options'  		=> array(
						'white'			=> esc_attr__('White', 'labtechco'),
						'dark'			=> esc_attr__('Dark', 'labtechco'),
					),
					'default'      	=> 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'labtechco').'</div>',
				),
				array(
				  'id'				=> 'footer_copyright_left',
				  'type'			=> 'wysiwyg',
				  'title'			=>  esc_attr__('Footer Text Left', 'labtechco'),
				  'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'labtechco')
				  . '<br>   <code>[ts-site-url]</code> <code>[ts-site-title]</code> <code>[ts-site-tagline]</code> <code>[ts-current-year]</code> <code>[ts-footermenu]</code> <br><br> '
				  . sprintf( esc_attr__('%1$s Click here to know more%2$s  about details for each shortcode.','labtechco') , '<a href="'. esc_url('http://labtechco.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
				  'default'         => themestek_wp_kses('Copyright &copy; 2018 <a href="' . site_url() . '">' . get_bloginfo('name') . '</a>. All rights reserved.'),
				),
				array(
				  'id'       		=> 'footer_copyright_right',
				  'type'     		=> 'wysiwyg',
				  'title'   		=>  esc_attr__('Footer Text Right', 'labtechco'),
				  'after'  			=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'labtechco')
				  . '<br>   <code>[ts-site-url]</code> <code>[ts-site-title]</code> <code>[ts-site-tagline]</code> <code>[ts-current-year]</code> <code>[ts-footermenu]</code> <br><br> '
				  . sprintf( esc_attr__('%1$s Click here to know more%2$s about details for each shortcode.','labtechco') , '<a href="'. esc_url('http://labtechco.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
				  'default'         => '',
				),
				
			)
		)
	),
	
	
);


// hide_demo_content_option
$hide_demo_content_option = false;
if( isset($labtechco_theme_options['hide_demo_content_option']) ){
	$hide_demo_content_option = $labtechco_theme_options['hide_demo_content_option'];
}

if( $hide_demo_content_option == true ){
	// Removing one click demo setup option
	if( !empty($ts_framework_options[0]["sections"][0]["fields"]) ){
		foreach( $ts_framework_options[0]["sections"][0]["fields"] as $index => $option ){
			if( !empty($option['type']) && $option['type'] == 'themestek_one_click_demo_import' ){
				unset($ts_framework_options[0]["sections"][0]["fields"][$index]);
			}
		}
	}
}

// Typography Settings
$ts_framework_options[] = array(
	'name'   => 'typography_settings', // like ID
	'title'  => esc_attr__('Typography Settings', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Typography Settings', 'labtechco'),
			'after'  	=> '<small>'.esc_attr__('General Element Fonts/Typography', 'labtechco').'</small>',
        ),
		array(
			'id'             => 'general_font',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('General Font', 'labtechco'),
			'chosen'         => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'backup-family'  => true, // Select a backup non-google font in addition to a google font
			'font-size'      => true,
			'color'          => true,
			'variant'        => true, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-align'     => false,  // This is still not available
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => 'body', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px - Currently not working
			'subtitle'       => esc_attr__('Select font family, size etc. for H2 heading tag.', 'labtechco'),
			'default'        => array (
				'family'			=> 'Work Sans',
				'backup-family'		=> 'Tahoma, Geneva, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> '',
				'font-size'			=> '15',
				'line-height'		=> '24',
				'letter-spacing'	=> '0',
				'color'				=> '#8893b9',
				'all-varients'		=> 'on',
				'font'				=> 'google',
				
			),
		),
		
		array(
			'id'        => 'link-color',
			'type'      => 'radio',
			'title'     => esc_attr__('Select Link Color', 'labtechco'), 
			'options'  	=> array(
				'default'   => esc_attr__('Dark color as normal color and Skin color as hover color', 'labtechco'),
				'darkhover' => esc_attr__('Skin color as normal color and Dark color as hover color', 'labtechco'),
				'custom'    => esc_attr__('Custom color (select below)', 'labtechco'),
				
			),
			'default'   => 'darkhover',
			'std'       => 'darkhover',
			'after'   	=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Select normal link color effect. This will change normal text link color and hover color', 'labtechco') . '</div>',
        ),
		array(
			'id'         => 'link-color-regular',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Regular)', 'labtechco' ),
			'default'    => '#000',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'         => 'link-color-hover',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Hover)', 'labtechco' ),
			'default'    => '#b1c903',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('H1 Heading Font', 'labtechco'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h1', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Roboto Condensed',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'text-transform'	=> '',
				'font-size'			=> '30',
				'line-height'		=> '40',
				'letter-spacing'	=> '0',
				'color'				=> '#031b4e',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H1 heading tag.', 'labtechco').'</div>',
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H2 Heading Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h2', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '700',
				'text-transform' => '',
				'font-size' => '26',
				'line-height' => '36',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H2 heading tag.', 'labtechco').'</div>',
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'themestek_typography',
			'chosen'      => false,
			'title'       => esc_attr__('H3 Heading Font', 'labtechco'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h3', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '700',
				'text-transform' => '',
				'font-size' => '22',
				'line-height' => '32',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H3 heading tag.', 'labtechco').'</div>',
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H4 Heading Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h4', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '700',
				'text-transform' => '',
				'font-size' => '18',
				'line-height' => '28',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H4 heading tag.', 'labtechco').'</div>',
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H5 Heading Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h5', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '700',
				'text-transform' => '',
				'font-size' => '14',
				'line-height' => '24',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H5 heading tag.', 'labtechco').'</div>',
		),
		
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H6 Heading Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h6', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '700',
				'text-transform' => '',
				'font-size' => '10',
				'line-height' => '20',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H6 heading tag.', 'labtechco').'</div>',
		),
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Heading and Subheading Font Settings', 'labtechco'),
			'after'  	  => '<small>'.esc_attr__('Select font settings for Heading and subheading of different title elements like Blog Box, Research Box etc', 'labtechco').'</small>',
		),
		
		array(
			'id'          => 'heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Heading Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => '.ts-element-heading-wrapper .ts-vc_general .ts-vc_cta3_content-container .ts-vc_cta3-content .ts-vc_cta3-content-header h2, .ts-heading-subheading h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '300',
				'text-transform' => '',
				'font-size' => '40',
				'line-height' => '50',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'all-varients' => 'on',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for heading title', 'labtechco').'</div>',
		),
		array(
			'id'          => 'subheading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Subheading Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,							
			'output'         => '.ts-element-heading-wrapper .ts-vc_general .ts-vc_cta3_content-container .ts-vc_cta3-content .ts-vc_cta3-content-header h4, .ts-vc_general.ts-vc_cta3.ts-vc_cta3-color-transparent.ts-cta3-only .ts-vc_cta3-content .ts-vc_cta3-headers h4, .ts-heading-subheading .ts-custom-subtitle, .ts-ihbox .ts-ihbox-contents .ts-ihbox-subheading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => 'regular',
				'text-transform' => 'uppercase',
				'font-size' => '18',
				'line-height' => '20',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'all-varients' => 'on',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for heading title', 'labtechco').'</div>',
		),
		array(
			'id'          => 'content_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Content Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.ts-element-heading-wrapper .ts-vc_general.ts-vc_cta3 .ts-vc_cta3-content p, .ts-heading-subheading .ts-heading-desc', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Work Sans',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '500',
				'text-transform' => '',
				'font-size' => '18',
				'line-height' => '24',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'font' => 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for content', 'labtechco').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Specific Element Fonts', 'labtechco'),
			'after'  	  => '<small>'.esc_attr__('Select Font for specific elements', 'labtechco').'</small>',
		),
		array(
			'id'          => 'widget_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Widget Title Font', 'labtechco'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.widget-area.sidebar .widget_search .wp-block-search__label, .widget-area.sidebar .widget_block .wp-block-group h2, body .widget .widget-title, body .widget .widgettitle, #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title, .portfolio-description h2, .themestek-portfolio-details h2, .themestek-portfolio-related h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => '700',
				'text-transform' => 'uppercase',
				'font-size' => '20',
				'line-height' => '24',
				'letter-spacing' => '0',
				'color' => '#031b4e',
				'font' => 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for widget title', 'labtechco').'</div>',
		),
		
		
		array(
			'id'             => 'button_font',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('Button Font', 'labtechco'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'font-size'      => false,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.woocommerce button.button, .woocommerce-page button.button, input, .ts-vc_btn, .ts-vc_btn3, .ts-header-text-area.ts-header-button-w a, .woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .themestek-post-readmore a, .elementor-widget-button .elementor-button, .ts-ptablebox-style-1 .ts-ptable-btn a span, .ts-ihbox-btn a, .ts-header-style-14 .ts-header-button-text-2, .ts-blogbox-style-9 .themestek-blogbox-footer-left a, .ts-header-style-11 .ts-header-text-area.ts-header-button-w a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => 'regular',
				'text-transform' => '',
				'letter-spacing' => '0',
				'font' => 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This fonts will be applied to all buttons in this site', 'labtechco').'</div>',
		),
		array(
			'id'             => 'element_title',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('Element Title Font', 'labtechco'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.wpb_tabs_nav a.ui-tabs-anchor, body .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a, .vc_progress_bar .vc_label, .vc_tta.vc_general .vc_tta-tab > a, .vc_toggle_title > h4, .elementor-widget-progress .elementor-title, .elementor-widget-tabs .elementor-tabs .elementor-tab-title, .elementor-widget-accordion .elementor-accordion .elementor-tab-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Roboto Condensed',
				'backup-family' => 'Arial, Helvetica, sans-serif',
				'variant' => 'regular',
				'text-transform' => 'uppercase',
				'font-size' => '14',
				'font' => 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'labtechco').'</div>',
		),	
		array(
			'id'             => 'extra_typo_one',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('Elements heading', 'labtechco'),
			'description'    => esc_attr__('Typo for elements heading like Icon Heading and otehr box headings etc.', 'labtechco'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.entry-content .themestek-box h3, .ts-ihbox .ts-ihbox-contents .ts-ihbox-heading, .ts-ihbox .ts-vc_general.ts-vc_cta3 .ts-custom-heading, .ts-fidbox-style-12 .ts-circle-number, .ts-fidbox-style-10 .ts-circle-number, .ts-contact-details .ts-contact-line1, .ts-ihbox-style-21 .ts-ihbox-contents::before', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'Roboto Condensed',
				'backup-family' => '',
				'variant' => '700',
				'text-transform' => 'uppercase',
				'font-size' => '16',
				'font' => 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'labtechco').'</div>',
		),	
		array(
			'id'             => 'extra_typo_two',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('Elements Text', 'labtechco'),
			'description'    => esc_attr__('Typo for elements text like Testimonial, Icon Heading Description text etc.', 'labtechco'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.ts-testimonialbox-style-7 blockquote.themestek-testimonial-text, .ts-ihbox-style-14.ts-ihbox .ts-ihbox-icon-wrapper, .ts-servicebox-style-9.themestek-box .themestek-box-category a, .ts-servicebox-style-9:before, .ts-ihbox-style-15 .ts-ihbox-icon-wrapper.ts-ihbox-icon-type-text, .ts-servicebox-style-10 .themestek-box-desc li, .ts-servicebox-style-11.themestek-box-service .themestek-box-category a, .ts-servicebox-style-11:before, .ts-testimonialbox-style-8 blockquote.themestek-testimonial-text, .ts-blogbox-style-6 .ts-meta-line.cat-links a, .ts-blogbox-style-7 .ts-meta-line.cat-links a, .ts-portfoliobox-style-7 .themestek-box .themestek-box-category a, .ts-marquestyle-01 li, .ts-marquestyle-02 li, .ts-tab-new-home.elementor-widget-tabs .elementor-tab-title, .ts-ihbox.ts-ihbox-style-16 .ts-ihbox-inner svg text, .ts-action-box-style-1 .ts-action-box-circle-wrap .ts-svg-btn span, .ts-header-style-13 .ts-header-button-wrap .ts-header-button a, .ts-footer-menu-split.widget_nav_menu.widget ul>li a, .ts-vc_btn-large .ts-vc_btn3.ts-vc_btn3-size-lg.ts-vc_btn3-style-classic, .themestek-hover-inner li::before, .ts-testimonialbox-style-10 blockquote', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'League Spartan',
				'backup-family' => '',
				'variant' => '400',
				'text-transform' => 'uppercase',
				'font-size' => '',
				'font' => 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'labtechco').'</div>',
		),
		array(
			'id'             => 'extra_typo_three',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('Heading for Icon Heading Box (Style-15 only)', 'labtechco'),
			'description'    => esc_attr__('Typo for Icon heading box specially for Style-15 only.', 'labtechco'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.ts-ihbox-style-15.ts-ihbox  .ts-ihbox-contents h2.ts-ihbox-heading, .ts-ihbox-style-15.ts-ihbox .ts-ihbox-contents h2.ts-custom-heading, .ts-ihbox-style-17 .ts-ihbox-icon-type-text', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family' => 'League Spartan',
				'backup-family' => '',
				'variant' => '300',
				'text-transform' => 'uppercase',
				'font-size' => '',
				'font' => 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'labtechco').'</div>',
		),
	)
);

// Blog Settings
$ts_framework_options[] = array(
	'name'   => 'blog_settings', // like ID
	'title'  => esc_attr__('Blog Settings', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Settings', 'labtechco'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blog section', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'blog_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blog Content Limit (in words)', 'labtechco' ),
			'default'		=> '0',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set limit for main contentn. Select how many words you like to show.', 'labtechco') . '<br><strong>' . esc_attr__('TIP:', 'labtechco') . '</strong> ' . esc_attr__('Select "0" (zero) to show full content before READ MORE break. Also if you set Excerpt content than this will be ignored and full Excerpt will appear.', 'labtechco') . '</div>',
        ),
		array(
			'id'     		=> 'blog_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'labtechco'),
			'default' 		=> esc_attr__('Read More', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Text for the Read More link on the Blog page', 'labtechco').'</div>',
		),
		
		array(
			'id'           	=> 'blog_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog view', 'labtechco'),
			'options'  		=> array(
				'classic'		=> get_template_directory_uri() . '/includes/images/blog-view-style-classic.jpg',
				'box'			=> get_template_directory_uri() . '/includes/images/blog-view-style-box.jpg',
			),
			'default'      	=> 'classic',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select blog view. The default view is classic list view. Also we have total three differnt look for classic view. Select them in this option and see your BLOG page. For "Box view", you can select two, three or four columns box view too.', 'labtechco').'</div>',
			'radio'      	=> true,
			
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'labtechco'),
			'after'  		=> '<small>'.esc_attr__('Blog box style view settings. This is because you selected "BOX VIEW" in above option.', 'labtechco').'</small>',
			'dependency'    => array( 'blog_view_classic', '!=', 'true' ),
		),
		array(
			'id'           	=> 'blogbox_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Blog box column', 'labtechco'),
			'options'  		=> array(
				'one'			=> esc_attr__('One Column View', 'labtechco'),
				'two'			=> esc_attr__('Two Column view', 'labtechco'),
				'three'			=> esc_attr__('Three Column view (default)', 'labtechco'),
				'four'			=> esc_attr__('Four Column view', 'labtechco'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'labtechco').'</div>',
			'dependency'    => array( 'blog_view_classic', '!=', 'true' ),
        ),


		array(
			'id'           	=> 'blogbox_boxstyle',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog Style for Boxes', 'labtechco'),
			'options'  		=> array(
				'style-1'		=> get_template_directory_uri() . '/includes/images/blogbox-style-1.jpg',
				'style-2'		=> get_template_directory_uri() . '/includes/images/blogbox-style-2.jpg',
				'style-3'		=> get_template_directory_uri() . '/includes/images/blogbox-style-3.jpg',
				'style-4'		=> get_template_directory_uri() . '/includes/images/blogbox-style-4.jpg',
				'style-5'		=> get_template_directory_uri() . '/includes/images/blogbox-style-5.jpg',
				'style-6'		=> get_template_directory_uri() . '/includes/images/blogbox-style-6.jpg',
				'style-7'		=> get_template_directory_uri() . '/includes/images/blogbox-style-7.jpg',
			),
			'default'      	=> 'style-1',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select blog box style view.', 'labtechco').'</div>',
			'radio'      	=> true,
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
			
        ),



		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Single Settings', 'labtechco'),
			'after'  		=> '<small>'.esc_attr__('Settings for single view of blog post.', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'post_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'labtechco'),
			'default' 		=> esc_attr__('Share this post', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This text will appear in the social share box as title', 'labtechco').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'post_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'labtechco'),
			'options'   => array(
				'facebook'    => esc_attr__('Facebook', 'labtechco'),
				'twitter'     => esc_attr__('Twitter', 'labtechco'),
				'gplus'       => esc_attr__('Google Plus', 'labtechco'),
				'pinterest'   => esc_attr__('Pinterest', 'labtechco'),
				'linkedin'    => esc_attr__('LinkedIn', 'labtechco'),
				'stumbleupon' => esc_attr__('Stumbleupon', 'labtechco'),
				'tumblr'      => esc_attr__('Tumblr', 'labtechco'),
				'reddit'      => esc_attr__('Reddit', 'labtechco'),
				'digg'        => esc_attr__('Digg', 'labtechco'),
			),
			'after'    	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('The selected social service icon will be visible on single Post so user can share on social sites.', 'labtechco').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Classic Meta Settings', 'labtechco'),
			'after'  		=> '<small>'.esc_attr__('Settings for meta data for Blog classic view.', 'labtechco').'</small>',
		),
		array(
			'id'      => 'blogclassic_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','labtechco'),
			'after'   => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select which data you like to show in post meta details', 'labtechco').'</div>',
			'default' => array(
				'enabled' => array(
					'author'  => esc_attr__('Author', 'labtechco'),
					'tag'     => esc_attr__('Tags', 'labtechco'),
					
				),
				'disabled' => array(
					'date'    => esc_attr__('Date', 'labtechco'),
					'cat'     => esc_attr__('Categories', 'labtechco'),
					'comment' => esc_attr__('Comments', 'labtechco'),
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'labtechco'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'labtechco'),
		),
		array(
			'id'     		=> 'blogclassic_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'labtechco'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('By default, this is empty and it will get settings from "Settings > General > Date Format" option. You can write your own custom date format here.', 'labtechco'). ' <a href="' . esc_url('https://codex.wordpress.org/Formatting_Date_and_Time') . '" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'labtechco') . '</a></div>',
		),
		array(
			'id'     		=> 'blogclassic_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in tags', 'labtechco').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in categories', 'labtechco').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in author name', 'labtechco').'</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'labtechco'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blogbox (Visual Composer element)', 'labtechco').'</small>',
		),
		array(
			'id'      => 'blogbox_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','labtechco'),
			'after'   => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select which data you like to show in post meta details', 'labtechco').'</div>',
			'default' => array(
				'enabled' => array(
					'author'  	=> esc_attr__('Author', 'labtechco'),
					'date'    	=> esc_attr__('Date', 'labtechco'),
					
				),
				'disabled' => array(
					'cat'  		=> esc_attr__('Categories', 'labtechco'),
					'comment'	=> esc_attr__('Comments', 'labtechco'),
					'tag'  		=> esc_attr__('Tags', 'labtechco'),
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'labtechco'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'labtechco'),
		),
		array(
			'id'     		=> 'blogbox_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'labtechco'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('By default, this is empty and it will get settings from "Settings > General > Date Format" option. You can write your own custom date format here.', 'labtechco'). ' <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'labtechco') . '</a></div>',
		),
		array(
			'id'     		=> 'blogbox_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in tags', 'labtechco').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in categories', 'labtechco').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in author name', 'labtechco').'</div>',
        ),
		
	)
);

// Research Settings
$ts_framework_options[] = array(
	'name'   => 'portfolio_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'labtechco'), $pf_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'labtechco'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'labtechco'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_project_details',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'labtechco'), $pf_title_singular ),
			'default' 		=> esc_attr__('PROJECT DETAILS', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'labtechco'), $pf_title_singular ) . '</div>',
		),
		
		array(
			'id'           	=> 'portfolio_viewstyle',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('Single %s View Style', 'labtechco'), $pf_title ),
			'options'       => themestek_global_template_list( 'portfolio-single', true ),
			'default'      	=> 'style-2',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select view for single %s', 'labtechco'), $pf_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Related %1$s (on single %2$s) Settings', 'labtechco'), $pf_title, $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for related %1$s section on single %2$s page.', 'labtechco'), $pf_title, $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_attr__('Show Related %s', 'labtechco'), $pf_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . sprintf( esc_attr__('Select ON to show related %1$s on single %2$s page', 'labtechco'), $pf_title, $pf_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'portfolio_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Related %s Title', 'labtechco'), $pf_title ),
			'default' 		=> esc_attr__('RELATED PROJECTS', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Title for the Releated %1$s area. (For single %2$s only)', 'labtechco'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
		),
		array(
			'id'           	=> 'portfolio_related_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('Related %s Boxes template', 'labtechco'), $pf_title ),
			'options'       => themestek_global_template_list( 'portfolio', true ),
			'default'      	=> 'style-2',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'labtechco'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'portfolio_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_attr__('Select column', 'labtechco'),
			'options'		=> array(
				'two'			=> esc_attr__('Two column', 'labtechco'),
				'three'			=> esc_attr__('Three column', 'labtechco'),
				'four'			=> esc_attr__('Four column', 'labtechco'),
				'five'			=> esc_attr__('Five column', 'labtechco'),
				'six'			=> esc_attr__('Six column', 'labtechco'),
			),
			'default'		=> 'three',
			'after'			=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'labtechco'), $pf_title ) . '</div>',
			'dependency'	=> array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'portfolio_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('Show %s', 'labtechco'), $pf_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %2$s Boxes you like to show in Related %1$s area.', 'labtechco'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s List Details Settings', 'labtechco'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'labtechco'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'              => 'pf_details_line',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'labtechco'),
			'info'            => sprintf( esc_attr__('This will be added a new line in DETAILS box on single %s view.', 'labtechco'), $pf_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'labtechco'),
			'accordion_title' => esc_attr__('Details for the line', 'labtechco'),
			
			'default'		 => array(
				array(
					'pf_details_line_title'	=> 'Research Name',
					'pf_details_line_icon'	=> array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon-ethanol',
					),
					'data'					=> 'custom',
				),
				array(
					'pf_details_line_title'	=> 'Client',
					'pf_details_line_icon'	=> array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon-ethanol',
					),
					'data'					=> 'custom',
				),
				array (
					'pf_details_line_title'	=> 'Category',
					'pf_details_line_icon'	=> array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon-ethanol',
					),
					'data'					=> 'category',
				),
				array(
					'pf_details_line_title'	=> 'RESEARCH TYPE',
					'pf_details_line_icon'	=> array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon-nuclear',
					),
					'data'					=> 'custom',
				),
				array(
					'pf_details_line_title'	=> 'RESEARCH YEAR',
					'pf_details_line_icon'	=> array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon-nuclear',
					),
					'data'					=> 'custom',
				),
				array(
					'pf_details_line_title'	=> 'Delivery Mode',
					'pf_details_line_icon'	=> array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon-ethanol',
					),
					'data'					=> 'custom',
				),
				array(
					'pf_details_line_title'	=> 'Location',
					'pf_details_line_icon'	=> array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_ts_labtechco_business_icon' => 'ts-labtechco-business-icon-ethanol',
					),
					'data'					=> 'custom',
				),
			),
			'fields'          => array(
				array(
					'id'     		=> 'pf_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'labtechco'),
					'default' 		=> esc_attr__('Line Title will be here', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Title for the first line of the details in single %s', 'labtechco'), $pf_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'labtechco').'</div>',
				),
				array(
					'id'      => 'pf_details_line_icon',
					'type'    => 'themestek_iconpicker',
					'title'  		=> esc_attr__('Line Icon', 'labtechco' ),
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select icon for the first Line of the details in single %s', 'labtechco'), $pf_title_singular ) . '</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_attr__('Line Input Type', 'labtechco'),
					'options' 		=> array(
							'custom'        => esc_attr__('Custom text (single line)', 'labtechco'),
							'multiline'     => esc_attr__('Custom text with multiline', 'labtechco'),
							'date'          => sprintf( esc_attr__('Show date of the %s', 'labtechco'), $pf_title_singular ),
							'category'      => sprintf( esc_attr__('Show Category (without link) of the %s', 'labtechco'), $pf_title_singular ),
							'category_link' => sprintf( esc_attr__('Show Category (with link) of the %s', 'labtechco'), $pf_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select view for single %s', 'labtechco'), $pf_title_singular ) . '</div>',
				),
			)
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Select social sharing service for single %s', 'labtechco'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Select social service so site visitors can share the single %s on different social services', 'labtechco'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Social Share box', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Show or hide social share box.', 'labtechco').'</div>',
        ),
		array(
			'id'     		=> 'portfolio_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'labtechco'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This text will appear in the social share box as title', 'labtechco').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'portfolio_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'labtechco'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'labtechco'),
					'twitter'     => esc_attr__('Twitter', 'labtechco'),
					'gplus'       => esc_attr__('Google Plus', 'labtechco'),
					'pinterest'   => esc_attr__('Pinterest', 'labtechco'),
					'linkedin'    => esc_attr__('LinkedIn', 'labtechco'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'labtechco'),
					'tumblr'      => esc_attr__('Tumblr', 'labtechco'),
					'reddit'      => esc_attr__('Reddit', 'labtechco'),
					'digg'        => esc_attr__('Digg', 'labtechco'),
			),
			'after'    	 => '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('The selected social service icon will be visible on single %s so user can share on social sites.', 'labtechco'), $pf_title_singular ) . '</div>',
			'dependency' => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Title', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This button will appear after the social share links.', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_link',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Link', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This button will appear after the social share links.', 'labtechco').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'labtechco'), $pf_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'labtechco'), $pf_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'labtechco'), $pf_title_singular ),
			'options'       => themestek_global_template_list( 'portfolio', true ),
			'default'      	=> 'style-1',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'labtechco'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'labtechco'),
			'options'  => array(
				'two'     => esc_attr__('Two column', 'labtechco'),
				'three'   => esc_attr__('Three column', 'labtechco'),
				'four'    => esc_attr__('Four column', 'labtechco'),
				'five'    => esc_attr__('Five column', 'labtechco'),
				'six'     => esc_attr__('Six column', 'labtechco'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'labtechco'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'labtechco' ), $pf_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'labtechco'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
	)
);

// Service CPT Settings
$ts_framework_options[] = array(
	'name'   => 'service_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'labtechco'), $service_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'labtechco'), $service_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'labtechco'), $service_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'services_cat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'labtechco'), $service_title_singular ),
			'options'       => themestek_global_template_list( 'service', true ),
			'default'      	=> 'style-2',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'labtechco'), $service_title_singular, $service_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'services_cat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'labtechco'),
			'options'  => array(
				'two'     => esc_attr__('Two column', 'labtechco'),
				'three'   => esc_attr__('Three column', 'labtechco'),
				'four'    => esc_attr__('Four column', 'labtechco'),
				'five'    => esc_attr__('Five column', 'labtechco'),
				'six'     => esc_attr__('Six column', 'labtechco'),
			),
			'default'      	=> 'two',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'labtechco'), $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'services_cat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'labtechco' ), $service_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'labtechco'), $service_title_singular, $service_cat_title_singular ) . '</div>',
        ),
	)
);

// Team Member Settings
$ts_framework_options[] = array(
	'name'   => 'team_member_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'labtechco'), $team_member_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr_x('%s\'s Extra Details Settings', 'Team Member', 'labtechco'), $team_member_title_singular ),
			'after'  		=> '<small>'.sprintf( esc_attr_x('You can fill this extra details and the details will be available on single %s page only. This will be shown as LIST with title and value design.', 'Team Member', 'labtechco'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'              => 'team_extra_details_lines',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'labtechco'),
			'info'            => sprintf( esc_attr_x('This will be added a new line in DETAILS box on single %s.', 'Team Member', 'labtechco'), $team_member_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'labtechco'),
			'accordion_title' => esc_attr__('Details for the line', 'labtechco'),
			'fields'          => array(
				array(
					'id'     		=> 'team_extra_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'labtechco'),
					'default' 		=> esc_attr__('Experience', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. sprintf( esc_attr_x('Title for the first line in the DETAILS box in single %s', 'Team Member', 'labtechco'), $team_member_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'labtechco').'</div>',
				),
				array(
					'id'      		=> 'data',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Line Data Type', 'labtechco'),
					'options' 		=> array(
						'custom'  => esc_attr__('Custom text (add anything)', 'labtechco'),
						'url'     => esc_attr__('URL link', 'labtechco'),
						'email'   => esc_attr__('Email address', 'labtechco'),
						'phone'   => esc_attr__('Phone number', 'labtechco'),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.sprintf( esc_attr_x('Select view for single %s', 'Team Member', 'labtechco'), $team_member_title_singular ).'</div>',
				),
			),
			'default' => array (
				array (
					'team_extra_details_line_title' => 'Address Info',
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Occupation:',
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Experience:',
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Core Skills:',
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Certificates:',
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Education:',
					'data' => 'custom',
				),
				
			),
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'labtechco'), $team_group_title_singular),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s page', 'labtechco'), $team_group_title_singular) . '</small>',
		),
		array(
			'id'           	=> 'teamcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'labtechco'), $team_member_title_singular ),
			'options'       => themestek_global_template_list( 'team', true ),
			'default'      	=> 'style-1',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s\'s Box view on %2$s page.', 'labtechco'), $team_member_title_singular, $team_group_title_singular ) . '</div>',
			'radio'      	=> true,
			
        ),
		array(
			'id'           	=> 'teamcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'labtechco'),
			'options'  => array(
				'two'   => esc_attr__('Two column', 'labtechco'),
				'three' => esc_attr__('Three column', 'labtechco'),
				'four'  => esc_attr__('Four column', 'labtechco'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf(esc_attr__('Select column to show %s', 'labtechco'), $team_member_title ) . '</div>',
        ),
		array(
			'id'     		=> 'teamcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to Show', 'labtechco' ), $team_member_title  ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %s you like to show on category page', 'labtechco'), $team_member_title  ) . '</div>',
        ),
		
	)
);

// Creating Client Groups array 
$client_groups = array();
if( isset($labtechco_theme_options['client_groups']) && is_array($labtechco_theme_options['client_groups']) ){
foreach( $labtechco_theme_options['client_groups'] as $key => $val ){
	$name = $val['client_group_name'];
	$slug = str_replace(' ', '_', strtolower($name));
	$client_groups[$slug] = $name;
}
}

// Error 404 Page Settings
$ts_framework_options[] = array(
	'name'   => 'error404_page_settings', // like ID
	'title'  => esc_attr__('Error 404 Page Settings', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Error 404 Page Settings', 'labtechco'),
			'after'  		=> '<small>'.esc_attr__('Settings that determine how the error page will be looking', 'labtechco').'</small>',
		),
		array(
			'id'      		=> '404_background',
			'type'    		=> 'themestek_background',
			'title'  		=> esc_attr__('Content area background for 404 page only', 'labtechco' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for 404 page content area only.', 'labtechco').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/404-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> 'rgba(9,22,42,0.8)',
			),
			'output' 	    => '.error404 .site-content-wrapper',
		),
		array(
			'id'      => 'error404_big_icon',
			'type'    => 'themestek_iconpicker',
			'title'  		=> esc_attr__('Big icon', 'labtechco' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select icon that appear in top with big size', 'labtechco').'</div>',
			'default' =>  array (
				'library'			  => 'fontawesome',
				'library_fontawesome' => 'fa fa-thumbs-o-down',
				'library_linecons'	  => '',
				'library_themify'	  => 'ti-location-pin',
			),
		),
		array(
			'id'     		=> 'error404_big_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Big heading text', 'labtechco'),
			'default' 		=> esc_attr__('PAGE NOT FOUND', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This text will be shown with big font size below icon', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'error404_medium_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Description text', 'labtechco'),
			'default' 		=> esc_attr__('Sorry, but the page you are looking for does not exist or removed. Please use search given below to find what you are looking or use the main menu.', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This file may have been moved or deleted. Be sure to check your spelling', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'error404_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Form', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "YES" to show search form on the 404 page', 'labtechco').'</div>',
        ),
		
		
	)
);


// Search Page Settings
$ts_framework_options[] = array(
	'name'   => 'search_page_settings', // like ID
	'title'  => esc_attr__('Search Page Settings', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Search Page Settings', 'labtechco'),
		),
		array(
			'id'       		 => 'searchnoresult',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Content of the search page if no results found', 'labtechco'),
			'shortcode'		 => true,
			'after'  	     => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Specify the content of the page that will be displayed if while search no results found', 'labtechco') . '<br> ' . esc_attr__('html tags and shortcodes are allowed', 'labtechco').'</div>',
			'default'  		 => themestek_wp_kses( urldecode('%3Ch3%3ENothing+found%3C%2Fh3%3E%3Cp%3ESorry%2C+but+nothing+matched+your+search+terms.+Please+try+again+with+some+different+keywords.%3C%2Fp%3E') ),
        ),
		
	)
);


// Sidebar Settings
$ts_framework_options[] = array(
	'name'   => 'sidebar_settings', // like ID
	'title'  => esc_attr__('Sidebar Settings', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Settings', 'labtechco'),
		),
		array(
			'id'              => 'custom_sidebars',
			'type'            => 'group',
			'title'           => esc_attr__('Custom Sidebars', 'labtechco'),
			'info'            => esc_attr__('Specify the custom sidebars that can be used in the pages for a widgets', 'labtechco'),
			'button_title'    => esc_attr__('Add New Sidebar', 'labtechco'),
			'accordion_title' => esc_attr__('Custom Sidebar Properties', 'labtechco'),
			'fields'          => array(
				array(
					'id'     		=> 'custom_sidebar',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Custom Sidebar Name', 'labtechco'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write custom sidebar name here', 'labtechco').'</div>',
				),
			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Position', 'labtechco'),
			'after'  		=> '<small>'.esc_attr__('Select sidebar position for different sections', 'labtechco').'</small>',
		),
		array(
			'id'           	=> 'sidebar_post',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Blog Post/Category Sidebar', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for blog post. Also for Category, Tag and Archive view too. Technically, related to all blog post view.', 'labtechco').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_page',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Standard Pages Sidebar', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for standard pages', 'labtechco').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Sidebar', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'labtechco').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member_group',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Group Sidebar', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'labtechco').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'labtechco'), $pf_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'labtechco'), $pf_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'labtechco'), $pf_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'labtechco'), $pf_cat_title_singular ) . '</div>',
        ),
		// Service
		array(
			'id'           	=> 'sidebar_service',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'labtechco'), $service_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'labtechco'), $service_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_service_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'labtechco'), $service_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'labtechco'), $service_cat_title_singular ) . '</div>',
        ),
		
		array(
			'id'           	=> 'sidebar_search',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Search Page Sidebar', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for search page', 'labtechco').'</div>',
		),
		array(
			'id'           	=> 'sidebar_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('WooCommerce Sidebar', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for WooCommerce Shop page', 'labtechco').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_woocommerce_single',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('WooCommerce Sidebar for Single Product page', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for WooCommerce Single product view page', 'labtechco').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_bbpress',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('BBPress Sidebar', 'labtechco'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for BBPress pages', 'labtechco').'</div>',
        ),
	)
);

// Getting social list
$global_social_list = ts_shared_social_list();
	
// social service list
$sociallist = array_merge(
	$global_social_list,
	array('rss'     => 'Rss Feed')
);

// Social Links
$ts_framework_options[] = array(
	'name'   => 'social_links', // like ID
	'title'  => esc_attr__('Social Links', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Social Links', 'labtechco'),
			'after'			=> '<small>' . sprintf(__('You can use %1$s[ts-social-links]%2$s shortcode to show social links.', 'labtechco'), '<code>' , '</code>' ) . '</small>',
		),
		array(
			'id'              => 'social_icons_list',
			'type'            => 'group',
			'title'           => esc_attr__('Social Links', 'labtechco'),
			'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder as per your choice', 'labtechco'),
			'button_title'    => esc_attr__('Add New Social Service', 'labtechco'),
			'accordion_title' => esc_attr__('Social Service Properties', 'labtechco'),
			'fields'          => array(
					array(
						'id'            => 'social_service_name',
						'type'          => 'select',
						'title'         =>  esc_attr__('Social Service', 'labtechco'),
						'options'  		=> $sociallist,
						'default'       => 'twitter',
						'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Social icon from here', 'labtechco').'</div>',
					),
					array(
						'id'     		=> 'social_service_link',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Link to Social icon selected above', 'labtechco'),
						'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Paste URL only', 'labtechco').'</div>',
						'dependency' 	=> array( 'social_service_name', '!=', 'rss' ),
					),

			),
			'default' => array (
				
				array (
					'social_service_name' => 'facebook',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'twitter',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'flickr',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'linkedin',
					'social_service_link' => '',
				),
				
			),
        ),
	),
);

// WooCommerce Settings
if( function_exists('is_woocommerce') ){
	$ts_framework_options[] = array(
		'name'   => 'woocommerce_settings', // like ID
		'title'  => esc_html__('WooCommerce Settings', 'labtechco'),
		'icon'   => 'fa fa-shopping-cart',
		'fields' => array( // begin: fields
			array(
				'type'       	=> 'heading',
				'content'    	=> esc_html__('WooCommerce Settings', 'labtechco'),
				'after'  		=> '<small>'. esc_html__('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin', 'labtechco').'</small>',
			),
			array(
				'id'     		=> 'wc-header-icon',
				'type'   		=> 'switcher',
				'title'   		=> esc_html__('Show Cart Icon in Header', 'labtechco'),
				'default' 		=> true,
				'label'  		=> '<div class="cs-text-muted">'.esc_html__('Select "On" to show the cart icon in header. Select "OFF" to hide the cart icon.', 'labtechco') . ' <br><br> ' . '<strong>' . esc_html__('NOTE:','labtechco') . '</strong> ' . esc_html__('Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected "ON" in this option.', 'labtechco').'</div>',
			),
			array(
				'id'     		=> 'woocommerce-column', 
				'type'   		=> 'radio',
				'title'  		=> esc_html__('WooCommerce Product List Column', 'labtechco'),
				'options'  		=> array(
					'1'				=> esc_html__('One Column', 'labtechco'),
					'2'				=> esc_html__('Two Columns', 'labtechco'),
					'3'				=> esc_html__('Three Columns', 'labtechco'),
					'4'				=> esc_html__('Four Columns', 'labtechco'),
				),
				'default'  		 => '3',
				'after'   		 => '<div class="cs-text-muted">'.esc_html__('Select how many column you want to show for product list view', 'labtechco').'</div>',
			),
			array(
				'id'     		=> 'woocommerce-product-per-page',
				'type'   		=> 'number',
				'title'         => esc_html__('Products Per Page', 'labtechco' ),
				'default'		=> '12',
				'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select how many product you want to show on SHOP page', 'labtechco').'</div>',
			),
			array(
				'type'       	=> 'heading',
				'content'    	=> esc_html__('Single Product Page Settings', 'labtechco'),
				'after'  		=> '<small>'. esc_html__('Options for Single product page', 'labtechco').'</small>',
			),
			array(
				'id'     		=> 'wc-single-show-related',
				'type'   		=> 'switcher',
				'title'   		=> esc_html__('Show Related Products', 'labtechco'),
				'default' 		=> true,
				'label'  		=> '<div class="cs-text-muted">'.esc_html__('Select "ON" to show Related Products below the product description on single page', 'labtechco').'</div>',
			),
			array(
				'id'     		=> 'wc-single-related-column', 
				'type'   		=> 'radio',
				'title'  		=> esc_html__('Column for Related Products', 'labtechco'),
				'options'  		=> array(
					'1'				=> esc_html__('One Column', 'labtechco'),
					'2'				=> esc_html__('Two Columns', 'labtechco'),
					'3'				=> esc_html__('Three Columns', 'labtechco'),
					'4'				=> esc_html__('Four Columns', 'labtechco'),
				),
				'default'  		 => '3',
				'after'   		 => '<div class="cs-text-muted">'.esc_html__('Select how many column you want to show for product list of related products', 'labtechco').'</div>',
				'dependency'     => array( 'wc-single-show-related', '==', 'true' ),
			),
			array(
				'id'     		=> 'wc-single-related-count',
				'type'   		=> 'number',
				'title'         => esc_html__('Related Products Show', 'labtechco' ),
				'default'		=> '3',
				'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select how many products you want to show in the Related prodcuts area on single product page', 'labtechco').'</div>',
				'dependency'    => array( 'wc-single-show-related', '==', 'true' ),
			),
		)
	);
}

// Under Construction
$ts_framework_options[] = array(
	'name'   => 'under_construction', // like ID
	'title'  => esc_attr__('Under Construction', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Under Construction', 'labtechco'),
			'after'  		=> '<small>'. esc_attr__('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'uconstruction',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Under Construciton Message', 'labtechco'),
			'default' 		=> false,
			'label'  		=> esc_attr__('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'labtechco'). '<br>' . esc_attr__('Please note that admin (when logged in) can view live site and not Under Construction message.', 'labtechco'),
        ),
		array(
			'id'     		=> 'uconstruction_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Title for Under Construction page', 'labtechco'),
			'default'  		=> esc_attr__('This site is Under Construction', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write TITLE for the Under Construction page', 'labtechco').'</div>',
			'dependency'	=> array('uconstruction','==','true'),
		),
		array(
			'id'       		 => 'uconstruction_html',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Page Content', 'labtechco'),
			'shortcode'		 => true,
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => themestek_wp_kses( '<div class="un-main-page-content">
<div class="un-page-content">
<div>[ts-logo]</div>
<div class="sepline"></div>
<h1 class="heading">UNDER CONSTRUCTION</h1>
<h4 class="subheading">Something awesome this way comes. Stay tuned!</h4>
</div>
</div>' ),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write your html code for Under Construction page body content', 'labtechco').'</div>',
        ),
		array(
			'id'      		=> 'uconstruction_background',
			'type'    		=> 'themestek_background',
			'title'  		=> esc_attr__('Background Properties', 'labtechco' ),
			'dependency'	 => array('uconstruction','==','true'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background options. This is for main body background', 'labtechco').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/uconstruction-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'fixed',
				'size'			=> 'cover',
				'color'			=> '#222222',
			),
			'output'      	=> '.uconstruction_background',
        ),
		array(
			'id'       		 => 'uconstruction_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Under Construction page', 'labtechco'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write your custom CSS code here', 'labtechco').'</div>',
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => urldecode('%40import+url%28%5C%27https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DOswald%3A200%2C300%2C400%2C500%2C600%2C700%5C%27%29%3B%0D%0A.un-page-content%7B%0D%0A%09position%3A+absolute%3B%0D%0A++++top%3A+50%25%3B%0D%0A++++left%3A+50%25%3B%0D%0A++++-khtml-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++-moz-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++-ms-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++-o-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A%7D%0D%0A.ts-sc-logo+img%7B%0D%0A%09max-height%3A+72px%3B%0D%0A%7D%0D%0Ah1.heading%2C%0D%0Ah4.subheading%7B%0D%0A%09margin%3A0%3B%0D%0A%09padding%3A0%3B%0D%0Afont-family%3A+%5C%27Oswald%5C%27%2C+sans-serif%3B%0D%0A%7D%0D%0Ah1.heading%7B%0D%0A++++font-size%3A+60px%3B%0D%0A++++line-height%3A+70px%3B%0D%0A++++font-weight%3A+700%3B%0D%0A++++margin-top%3A+50px%3B%0D%0A++++margin-bottom%3A+5px%3B%0D%0Afont-family%3A+%5C%27Oswald%5C%27%2C+sans-serif%3B%0D%0A%0D%0A%7D%0D%0Ah4.subheading%7B%0D%0A%09margin-top%3A+0%3B%0D%0A%7D'),
        ),
		
		
	)
);

// One page website
$ts_framework_options[] = array(
	'name'   => 'one_page_site', // like ID
	'title'  => esc_attr__('One Page Site option', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'      => 'heading',
			'content'   => esc_attr__('One Page Website', 'labtechco'),
			'after'  	=> '<small>'.esc_attr__('Options for One Page website', 'labtechco').'</small>',
		),
		array(
			'type'    		=> 'notice',
			'class'   		=> 'info',
			'content'		=> '<p><strong>' . esc_attr__('More information about how to set one page site', 'labtechco') . '</strong> <br> <a href="#" target="_blank"> ' . esc_attr__('Please read our documentation for how to set one-page website by clicking here.', 'labtechco') . '</a> </p>',
		),
		array(
			'id'      	=> 'one_page_site',
			'type'    	=> 'switcher',
			'title'   	=> esc_attr__('One Page Site', 'labtechco'),
			'default' 	=> false,
			'label'   	=> '<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" if your site is one page website', 'labtechco').' <a target="_blank" href="#">'.esc_attr__('Click here to know more about how to setup one-page site.', 'labtechco').'</a></div>',
		),
	)
);

// Seperator
$ts_framework_options[] = array(
	'name'   => 'ts_seperator_1',
	'title'  => esc_attr__('Advanced', 'labtechco'),
	'icon'   => 'fa fa-gear',
);

$cssfile = (is_multisite()) ? 'php' : 'css' ;


// Advanced Settings
$ts_framework_options[] = array(
	'name'   => 'advanced_settings', // like ID
	'title'  => esc_attr__('Advanced Settings', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Portfolio) Settings', 'labtechco'), $pf_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Portfolio custom post type', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'pf_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio) Post Type', 'labtechco'), $pf_title_singular ),
			'default'  		=> esc_attr__('Research', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Portfolio post type section', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'pf_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Portfolio) Post Type', 'labtechco'), $pf_title_singular ),
			'default'  		=> esc_attr__('Research', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Portfolio post type section. Only for singular title.', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'pf_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio) Post Type', 'labtechco'), $pf_title_singular ),
			'default'  		=> esc_attr('research'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Portfolio post type section', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio Category) List', 'labtechco'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Research Categories', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Portfolio Category) List', 'labtechco'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Research Category', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio Category) Link', 'labtechco'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('research-category', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Portfolio Category link', 'labtechco').'</div>',
		),
		
		// Service CPT
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Service) Settings', 'labtechco'), $service_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Service custom post type', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'service_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service) Post Type', 'labtechco'), $service_title_singular ),
			'default'  		=> esc_attr__('Services', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Service post type section', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'service_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Service) Post Type', 'labtechco'), $service_title_singular ),
			'default'  		=> esc_attr__('Service', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Service post type section. Only for singular title.', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'service_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service) Post Type', 'labtechco'), $service_title_singular ),
			'default'  		=> esc_attr('service'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Service post type section', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service Category) List', 'labtechco'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Categories', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Service Category) List', 'labtechco'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Category', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'service_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service Category) Link', 'labtechco'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('service-category', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Service Category link', 'labtechco').'</div>',
		),
		
	
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Team member) Settings', 'labtechco'), $team_member_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Team Member custom post type', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'team_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Member) Post Type', 'labtechco'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Team Member post type section', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'team_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Team Member) Post Type', 'labtechco'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Team Member post type section. Only for singular title.', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'team_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Member) Post Type', 'labtechco'), $team_member_title_singular ),
			'default'  		=> esc_attr__('team', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Team Member post type section', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'team_group_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Group) List', 'labtechco'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Groups', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'team_group_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Team Group) List', 'labtechco'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Group', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'labtechco').'</div>',
		),
		array(
			'id'     		=> 'team_group_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Group) Link', 'labtechco'), $team_group_title_singular ),
			'default'  		=> esc_attr__('team-group', 'labtechco'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Team Group link', 'labtechco').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Minify Options', 'labtechco'),
			'after'  		=> '<small>'. esc_attr__('Options to minify html/JS/CSS files', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'minify',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Minify JS and CSS files', 'labtechco'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working', 'labtechco').'</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Show or hide Demo Content Setup option', 'labtechco'),
			'after'  		=> '<small>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'labtechco').'</small>',
		),
		array(
			'id'     		=> 'hide_demo_content_option',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Hide "Demo Content Setup" option', 'labtechco'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'labtechco').'</div>',
        ),
		
		
	)
);


// CSS/JS Code
$ts_framework_options[] = array(
	'name'   => 'custom_code', // like ID
	'title'  => esc_attr__('CSS/JS Code', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		
		// Custom Code
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom CSS or JS Code', 'labtechco'),
			'after'  		=> '<small>'. esc_attr__('Add custom JS and CSS code', 'labtechco').'</small>',
		),
		array(
			'id'       		 => 'custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code', 'labtechco'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style', 'labtechco').'</div>',
        ),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('JS Code', 'labtechco'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Paste your JS code here', 'labtechco').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom html Code', 'labtechco'),
			'after'  		=> '<small>'. sprintf(__('Custom html Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here', 'labtechco'),'<strong>', '</strong>').'</small>',
		),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code for &lt;head&gt; tag', 'labtechco'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This code will appear in &lt;head&gt; tag. You can add your custom tracking code here', 'labtechco').'</div>',
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code after &lt;body&gt; tag', 'labtechco'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This code will appear after &lt;body&gt; tag. You can add your custom tracking code here', 'labtechco').'</div>',
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code before &lt;/body&gt; tag', 'labtechco'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here', 'labtechco').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code for Login page', 'labtechco'),
			'after'  		=> '<small>'. esc_attr__('Custom Code for Login pLogin page only. This will effect only login page and not effect any other pages or admin section', 'labtechco').'</small>',
		),
		array(
			'id'       		 => 'login_custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Login Page', 'labtechco'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write your custom CSS code here', 'labtechco').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Advanced Custom CSS Code Option', 'labtechco'),
		),
		array(
			'id'       		 => 'custom_css_code_top',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code (at top of the file)', 'labtechco'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at top of the css code. specially for "@import" style tag.', 'labtechco').'</div>',
        ),
		
		
	)
);


// Backup
$ts_framework_options[]   = array(
	'name'     => 'backup_section',
	'title'    => esc_attr__('Backup / Restore', 'labtechco'),
	'icon'   => 'fa fa-gear',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_attr__('You can save your current options. Download a Backup and Import', 'labtechco'),
		),
		array(
			'type'    => 'backup',
		),
	)
);
