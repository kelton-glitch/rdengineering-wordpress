<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *  Meta Boxes
 */
$ts_metabox_options = array();


/************************* Common Meta Boxes *****************************/



// Slier Area metabox options array
$slider_list_array = array();
$slider_list_array[''] = esc_attr__('No Slider', 'labtechco');
if ( class_exists( 'RevSlider' ) )    { $slider_list_array['revslider']   = esc_attr__('Slider Revolution', 'labtechco'); }
if ( function_exists('layerslider') ) { $slider_list_array['layerslider'] = esc_attr__('Layer Slider', 'labtechco'); }
$slider_list_array['custom']   = esc_attr__('Custom Slider', 'labtechco');

$ts_metabox_slider_area = array(
	array(
		'id'      	=> 'slidertype',
		'type'   	=> 'radio',
		'title'		=> esc_attr__('Select Slider Type', 'labtechco'),
		'desc'    	=> '<div class="cs-text-muted">'.esc_attr__('Select slider which you want to show on this page. The slider will appear in header area.', 'labtechco').'</div>',
		'options'	=> $slider_list_array,
		'default' 	 => '',
	)
);
$ts_metabox_slider_area[] = array(
	'id'      	 => 'revslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'labtechco'),
	'after'    	 => ( themestek_revslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="ts-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Slider Revolution section.', 'labtechco') . '<br><a href="'. admin_url( 'admin.php?page=revslider' ) .'">' . esc_attr__('Click here to go to Slider Revolution section and create your first slider or import demo slider.', 'labtechco') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Revolution Slider. The slider will appear in header area.', 'labtechco').'</div>',
	'options' 	 => themestek_revslider_array(),
	'dependency' => array( 'slidertype_revslider', '==', 'true' ),
);
$ts_metabox_slider_area[] = array(
	'id'      	 => 'layerslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'labtechco'),
	'after'    	 => ( themestek_layerslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="ts-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Layer Slider section.', 'labtechco') . '<br><a href="'. admin_url( 'admin.php?page=layerslider' ) .'">' . esc_attr__('Click here to go to Layer Slider section and create your first slider or import demo slider.', 'labtechco') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Layer Slider. The slider will appear in header area.', 'labtechco').'</div>',
	'options' 	 => themestek_layerslider_array(),
	'dependency' => array( 'slidertype_layerslider', '==', 'true' ),
);
$ts_metabox_slider_area[] = array(
	'id'       	 => 'customslider',
	'type'     	 => 'textarea',
	'title'    	 => esc_attr__('Custom Slider code', 'labtechco'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_attr__('You can paste custom slider shortcode or html code here. The output code will appear in header area.', 'labtechco').'</div>',
	'dependency' => array( 'slidertype_custom', '==', 'true' ),// Multiple dependency
);
$ts_metabox_slider_area[] = array(
	'id'         => 'slider_width',
	'type'       => 'select',
	'title'      => esc_attr__('Boxed or Wide Slider', 'labtechco'),
	'info'       => esc_attr__('Select slider width.', 'labtechco'),
	'options'    => array(
		'wide'      => esc_attr__('Wide Slider', 'labtechco'),
		'boxed'     => esc_attr__('Boxed Slider', 'labtechco'),
	),
	'default'    => 'wide',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);






// Background metabox options array
$ts_metabox_background = array(
	array(
		'id'      => 'custom_background_switcher',
		'title'   => esc_attr__('Custom Background', 'labtechco'),
		'type'    => 'switcher',
		'default' => false,
		'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'labtechco').'</div>',
	),
	array(
		'id'		 => 'custom_background',
		'type'		 => 'themestek_background',
		'title'		 => esc_attr__('Body Background Properties', 'labtechco'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only', 'labtechco').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
);






// Pre Header metabox options array
$ts_metabox_topbar = array(
	array(
		'id'      => 'show_topbar',
		'type'    => 'select',
		'title'   => esc_attr__('Show Pre Header', 'labtechco'),
		'info'    => esc_attr__('For this page only.', 'labtechco'),
		'options' => array(
			''      => esc_attr__('Global', 'labtechco'),
			'yes'   => esc_attr__('Yes, show Pre Header', 'labtechco'),
			'no'    => esc_attr__('No, hide Pre Header', 'labtechco'),
		),
		'default' => '',
	),
	array(
		'id'     	 => 'topbar_bg_color',
		'type'   	 => 'select',
		'title'  	 => esc_attr__('Background Color', 'labtechco'),
		'info'   	 => esc_attr__('Please select color for background', 'labtechco'),
		'options' 	 => array(
			''           => esc_attr__('Global', 'labtechco'),
			'darkgrey'   => esc_attr__('Dark grey', 'labtechco'),
			'grey'       => esc_attr__('Grey', 'labtechco'),
			'white'      => esc_attr__('White', 'labtechco'),
			'skincolor'  => esc_attr__('Skincolor', 'labtechco'),
			'custom'     => esc_attr__('Custom Color', 'labtechco'),
		),
		'default'	 => '',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'		 => 'topbar_bg_custom_color',
		'type'		 => 'color_picker',
		'title'		 => esc_attr__('Select Background Color', 'labtechco'),
		'default'	 => '#dd3333',
		'dependency' => array( 'show_topbar|topbar_bg_color', '!=|==', 'no|custom' ),
	),
	array(
		'id'		 => 'topbar_text_color',
		'type'		 => 'select',
		'title'		 => esc_attr__('Text Color', 'labtechco'),
		'info'		 => esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option.', 'labtechco'),
		'options'	 => array(
			''          => esc_attr__('Global', 'labtechco'),
			'white'     => esc_attr__('White', 'labtechco'),
			'dark'      => esc_attr__('Dark', 'labtechco'),
			'skincolor' => esc_attr__('Skin Color', 'labtechco'),
			'custom'    => esc_attr__('Custom color', 'labtechco'),
		),
		'default' 	 => esc_attr__('Global', 'labtechco'),
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_text_custom_color',
		'type'       => 'color_picker',
		'title'      => esc_attr__('Custom Text Color', 'labtechco' ),
		'default'    => 'rgba(0, 0, 255, 0.25)',
		'dependency' => array( 'show_topbar|topbar_text_color', '!=|==', 'no|custom' ),//Multiple dependency
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Please select custom color for text', 'labtechco').'</div>',
	),
	array(
		'id'       	 => 'topbar_left_text',
		'type'     	 => 'textarea',
		'title'    	 =>  esc_attr__('Pre Header Left Content (overwrite default text)', 'labtechco'),
		'shortcode'	 => true,
		'after'  	 => '<div class="cs-text-muted">'.esc_attr__('Add content for Pre Header text for left area. This will overwrite default text set in Theme Options', 'labtechco').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_right_text',
		'type'       => 'textarea',
		'title'      =>  esc_attr__('Pre Header Right Content (overwrite default text)', 'labtechco'),
		'shortcode'  => true,
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Add content for Pre Header text for right area. This will overwrite default text set in Theme Options', 'labtechco').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
);





// Titlebar metabox options array
$ts_metabox_titlebar = array(
	array(
		'id'       			=> 'hide_titlebar',
		'type'      		=> 'checkbox',
		'title'         	=> esc_attr__('Hide Titlebar', 'labtechco'),
		'label'		        =>  esc_attr__( 'YES, Hide the Titlebar', 'labtechco' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_attr__('If you want to hide Titlebar than check this option', 'labtechco').'</div>',
	),
	array(
		'id'		   		=> 'title',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Title', 'labtechco'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title', 'labtechco').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		   		=> 'subtitle',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Subtitle', 'labtechco'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Please fill page subtitle', 'labtechco').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Background Options', 'labtechco'),
		'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'labtechco').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		 => 'titlebar_bg_custom_options',
		'type'		 => 'select',
		'title'		 =>  esc_attr__('Titlebar Background Options', 'labtechco'),
		'options'	 => array(
			''       	=> esc_attr__('Use global settings', 'labtechco'),
			'custom' 	=> esc_attr__('Set custom settings', 'labtechco'),
		),
		'default'	 => '',
		'after'		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'labtechco').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_bg_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Background Color', 'labtechco'),
		'options'  => array(
			''           => esc_attr__('Global', 'labtechco'),
			'darkgrey'   => esc_attr__('Dark grey', 'labtechco'),
			'grey'       => esc_attr__('Grey', 'labtechco'),
			'white'      => esc_attr__('White', 'labtechco'),
			'skincolor'  => esc_attr__('Skincolor', 'labtechco'),
			'custom'     => esc_attr__('Custom Color', 'labtechco'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'labtechco').'</div>',
		'dependency'    => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),//Multiple dependency
	),
	array(
		'id'      		=> 'titlebar_background',
		'type'    		=> 'themestek_background',
		'title'  		=> esc_attr__('Titlebar Background Properties', 'labtechco' ),
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'labtechco').'</div>',
		'color'			=> true,
		'dependency'   => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Font Settings', 'labtechco'),
		'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'labtechco').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_font_custom_options',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Font Options', 'labtechco'),
		'options'  => array(
						''       => esc_attr__('Use global settings', 'labtechco'),
						'custom' => esc_attr__('Set custom settings', 'labtechco'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Ude global settings" to load global font settings.', 'labtechco').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),// Multiple dependency
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
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option', 'labtechco').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'labtechco').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'labtechco').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'labtechco').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Content Options', 'labtechco'),
		'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'labtechco').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            	=> 'titlebar_view',
		'type'          	=> 'select',
		'title'         	=>  esc_attr__('Titlebar Text Align', 'labtechco'),
		'options'       	=> array (
						''         => esc_attr__('Global', 'labtechco'),
						'default'  => esc_attr__('All Center', 'labtechco'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'labtechco'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 	'labtechco'),
						'allleft'  => esc_attr__('All Left', 'labtechco'),
						'allright' => esc_attr__('All Right', 'labtechco'),
		),
		'default'	 => '',
		'after'  			=> '<div class="cs-text-muted">'.esc_attr__('Select text align in Titlebar', 'labtechco').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'     		 => 'titlebar_height',
		'type'   		 => 'number',
		'title'          => esc_attr__( 'Titlebar Height', 'labtechco' ),
		'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set height of the Titlebar. In pixel only', 'labtechco').'</div>',
		'default'		 => '',
		'after'   		 => ' px',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_hide_breadcrumb',
		'type'          => 'select',
		'title'         =>  esc_attr__('Hide Breadcrumb', 'labtechco'),
		'options'  => array(
						''     => esc_attr__('Global', 'labtechco'),
						'no'   => esc_attr__('NO, show the breadcrumb', 'labtechco'),
						'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'labtechco'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'labtechco').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	
	
);


// Other Options
$ts_other_options =  array(
	array(
		'id'     		 	=> 'skincolor',
		'type'   		 	=> 'color_picker',
		'title'  		 	=> esc_attr__('Skin Color', 'labtechco' ),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'labtechco').'<br><br> <strong>' . esc_attr__( 'NOTE: ' ,'labtechco') . '</strong> ' . esc_attr__( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'labtechco') . '</div>',
	),
);









/**** Metabox options - Sidebar ****/

// Getting custom sidebars 
$all_sidebars = themestek_get_all_registered_sidebars();



$ts_metabox_sidebar = array(
	array(
		'id'       => 'sidebar',
		'title'    => esc_attr__('Select Sidebar Position', 'labtechco'),
		'type'     => 'image_select',
		'options'  => array(
			''          => get_template_directory_uri() . '/includes/images/layout_default.png',
			'no'        => get_template_directory_uri() . '/includes/images/layout_no_side.png',
			'left'      => get_template_directory_uri() . '/includes/images/layout_left.png',
			'right'     => get_template_directory_uri() . '/includes/images/layout_right.png',
			'both'      => get_template_directory_uri() . '/includes/images/layout_both.png',
			'bothleft'  => get_template_directory_uri() . '/includes/images/layout_left_both.png',
			'bothright' => get_template_directory_uri() . '/includes/images/layout_right_both.png',
		),
		'default'  => '',
	),
	array(
		'id'      => 'left_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Left Sidebar', 'labtechco'),
		'options' => $all_sidebars,
		'default' => '',
	),
	array(
		'id'      => 'right_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Right Sidebar', 'labtechco'),
		'options' => $all_sidebars,
		'default' => '',
	),
);



// Getting name of CPT from Theme Options
$labtechco_theme_options	  = get_option('labtechco_theme_options');
$pf_type_title_singular       = ( !empty($labtechco_theme_options['pf_type_title_singular']) ) ? $labtechco_theme_options['pf_type_title_singular'] : esc_attr__('Portfolio', 'labtechco') ;
$service_type_title_singular  = ( !empty($labtechco_theme_options['service_type_title_singular']) ) ? $labtechco_theme_options['service_type_title_singular'] : esc_attr__('Service', 'labtechco') ;
$team_type_title_singular     = ( !empty($labtechco_theme_options['team_type_title_singular']) ) ? $labtechco_theme_options['team_type_title_singular'] : esc_attr__('Team Member', 'labtechco') ;


// CPT list
$ts_cpt_list = array(
	'page'           => esc_attr__('Page', 'labtechco'),
	'post'           => esc_attr__('Post', 'labtechco'),
	'ts-portfolio'   => esc_attr($pf_type_title_singular),
	'ts-service'     => esc_attr($service_type_title_singular),
	'ts-team-member' => esc_attr($team_type_title_singular),
	'ts-testimonial' => esc_attr__('Testimonials', 'labtechco'),
);

// Foreach loop
foreach( $ts_cpt_list as $cpt_id=>$cpt_name ){
	
	$ts_metabox_options[] = array(
		'id'        => '_themestek_metabox_group',
		'title'     => sprintf( esc_attr__('LabtechCO - %s Single view Elements Options', 'labtechco'), $cpt_name ),
		'post_type' => $cpt_id,
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
		
		
			array(
				'name'   => '_themestek_slider_area_options',
				'title'  => esc_attr__('Header Slider Options', 'labtechco'),
				'icon'   => 'fa fa-picture-o',
				'fields' => $ts_metabox_slider_area,
			),
			
			
			array(
				'name'   => '_themestek_background_options',
				'title'  => esc_attr__(' Background Options', 'labtechco'),
				'icon'   => 'fa fa-paint-brush',
				'fields' => $ts_metabox_background,
			),
			
			
			array(
				'name'   => '_themestek_page_topbar_options',
				'title'  => esc_attr__('Pre Header Options', 'labtechco'),
				'icon'   => 'fa fa-tasks',
				'fields' => $ts_metabox_topbar,
			),
			
			
			
			array(
				'name'   => '_themestek_titlebar_options',
				'title'  => esc_attr__('Titlebar Options', 'labtechco'),
				'icon'   => 'fa fa-align-justify',
				'fields' => $ts_metabox_titlebar,
			),
			
			
			array(
				'name'   => '_themestek_page_customize',
				'title'  => esc_attr__('Other Options', 'labtechco'),
				'icon'   => 'fa fa-cog',
				'fields' => $ts_other_options,
			),
			
			
		),
	);
	
	
	
	/**
	 *  CPT - Sidebar
	 */
	$ts_metabox_options[]    = array(
		'id'        => '_themestek_metabox_sidebar',
		'title'     => esc_attr__('LabtechCO - Sidebar Options', 'labtechco'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'ts_sidebar_options',
				'fields' => $ts_metabox_sidebar,
			),
		),
	);
	
	$ts_metabox_options[]    = array(
		'id'        => 'themestek_page_row_settings',
		'title'     => esc_attr__('LabtechCO - Content ROW settings', 'labtechco'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'ts_content_row_settings',
				'fields' => array(
					array(
						'id'      => 'row_lower_padding',
						'title'   => esc_attr__('Lower ROW Spacing', 'labtechco'),
						'type'    => 'switcher',
						'default' => false,
						'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'labtechco').'</div>',
					)
				)
			)
		)
	);
	
	
	
	
	
} // foreach

$ts_metabox_options[] = array(
	'id'        => '_themestek_metabox_service_icon',
	'title'     => esc_html__('LabtechCO - Service Icon ', 'labtechco'),
	'post_type' => 'ts-service',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'themestek_metabox_service_icon',
			'fields' => array(
				array(
					'id'      => 'themestek_custom_icon_enabled',
					'type'    => 'switcher',
					'title'   => 'Select Custom Icon?',
					'default' => false,
				  ),
				array(
					'id'        => 'custom_service_icon',
					'type'      => 'image',
					'title'     => 'Select Custom Icon',
					'add_title' => 'Add Image',
					'after'  	=> '<div class="cs-text-muted cs-text-desc">' .esc_attr__('You can select SVG, JPG, PNG or GIF image here', 'labtechco') . ( ( !defined('BODHI_SVGS_PLUGIN_PATH') ) ? themestek_wp_kses('<br><strong>')  . esc_attr__('NOTE:', 'labtechco') . themestek_wp_kses('</strong>') . ' ' . sprintf( esc_attr__('For SVG selection, make sure you installed and activated the %1$s plugin.', 'labtechco'), '<a href="https://wordpress.org/plugins/svg-support/" target="_blank">SVG Support</a>' ) : '' ). '</div>',
					'dependency' => array( 'themestek_custom_icon_enabled', '==', 'true' ),
				),
				array(
					'id'      => 'service_icon',
					'type'    => 'themestek_iconpicker',
					'title'  		=> esc_html__('Service Icon', 'labtechco' ),
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select icon for the this single %s', 'labtechco'), $service_type_title_singular ) . '</div>',
					'dependency' => array( 'themestek_custom_icon_enabled', '==', 'false' )
				),
			)
		)
	),
);


/* Blog Post Format - Gallery meta box */
$ts_metabox_options[] = array(
	'id'        => '_themestek_metabox_gallery',
	'title'     => esc_attr__('LabtechCO - Gallery Images', 'labtechco'),
	'post_type' => 'post',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'themestek_metabox_gallery_sections',
			'fields' => array(
				array(
					'id'          => 'gallery_images',
					//'debug'       => true,
					'type'        => 'gallery',
					'title'       => esc_attr__('Slider Images', 'labtechco'),
					'add_title'   => esc_attr__('Add Images', 'labtechco'),
					'edit_title'  => esc_attr__('Edit Gallery', 'labtechco'),
					'clear_title' => esc_attr__('Remove Gallery', 'labtechco'),
					'after'       => '<br><div class="cs-text-muted">'.esc_attr__('Select images for gallery. Click on "Edit Gallery" button to add images, order images or remove images in gallery.', 'labtechco').'</div>',
				),
			)
		)
	),
);
