<?php
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'ts_vcSetAsTheme' );
function ts_vcSetAsTheme() {
	vc_set_as_theme();
	if( function_exists('vc_set_default_editor_post_types') ){
		vc_set_default_editor_post_types(array('page', 'ts-portfolio', 'ts-service', 'ts-team-member'));
	}
}

/** ------------------------------------------------------ **/
/**                  Shared Library start                  **/
class ts_VcSharedLibrary {
	// Here we will store plugin wise (shared) settings. Colors, Locations, Sizes, etc...
	/**
	 * @var array
	 */
	public static $colors = array(
		'[Skin Color]' => 'skincolor',
		'Blue' => 'blue',
		'Turquoise' => 'turquoise',
		'Pink' => 'pink',
		'Violet' => 'violet',
		'Peacoc' => 'peacoc',
		'Chino' => 'chino',
		'Mulled Wine' => 'mulled_wine',
		'Vista Blue' => 'vista_blue',
		'Black' => 'black',
		'Grey' => 'grey',
		'Orange' => 'orange',
		'Sky' => 'sky',
		'Green' => 'green',
		'Juicy pink' => 'juicy_pink',
		'Sandy brown' => 'sandy_brown',
		'Purple' => 'purple',
		'White' => 'white'
	);

	/**
	 * @var array
	 */
	public static $predefined_text_colors = array(
		'Grey'       => 'grey',
		'Dark Grey'  => 'darkgrey',
		'White'      => 'white',
		'Skin Color' => 'skincolor'
	);
	
	/**
	 * @var array
	 */
	public static $predefined_bg_colors = array(
		'Grey'       => 'grey',
		'Dark Grey'  => 'darkgrey',
		'White'      => 'white',
		'Skin Color' => 'skincolor'
	);
	
	/**
	 * @var array
	 */
	public static $icons = array(
		'Glass' => 'glass',
		'Music' => 'music',
		'Search' => 'search'
	);

	/**
	 * @var array
	 */
	public static $sizes = array(
		'Mini' => 'xs',
		'Small' => 'sm',
		'Normal' => 'md',
		'Large' => 'lg'
	);

	/**
	 * @var array
	 */
	public static $button_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'3D' => '3d',
		'Square Outlined' => 'square_outlined'
	);

	/**
	 * @var array
	 */
	public static $message_box_styles = array(
		'Standard' => 'standard',
		'Solid' => 'solid',
		'Solid icon' => 'solid-icon',
		'Outline' => 'outline',
		'3D' => '3d',
	);

	/**
	 * Toggle styles
	 * @var array
	 */
	public static $toggle_styles = array(
		'Default' => 'default',
		'Simple' => 'simple',
		'Round' => 'round',
		'Round Outline' => 'round_outline',
		'Rounded' => 'rounded',
		'Rounded Outline' => 'rounded_outline',
		'Square' => 'square',
		'Square Outline' => 'square_outline',
		'Arrow' => 'arrow',
		'Text Only' => 'text_only',
	);

	/**
	 * Animation styles
	 * @var array
	 */
	public static $animation_styles = array(
		'Bounce' => 'easeOutBounce',
		'Elastic' => 'easeOutElastic',
		'Back' => 'easeOutBack',
		'Cubic' => 'easeinOutCubic',
		'Quint' => 'easeinOutQuint',
		'Quart' => 'easeOutQuart',
		'Quad' => 'easeinQuad',
		'Sine' => 'easeOutSine'
	);

	/**
	 * @var array
	 */
	public static $cta_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'Square Outlined' => 'square_outlined'
	);

	/**
	 * @var array
	 */
	public static $txt_align = array(
		'Left' => 'left',
		'Right' => 'right',
		'Center' => 'center',
		'Justify' => 'justify'
	);

	/**
	 * @var array
	 */
	public static $el_widths = array(
		'100%' => '',
		'90%' => '90',
		'80%' => '80',
		'70%' => '70',
		'60%' => '60',
		'50%' => '50',
		'40%' => '40',
		'30%' => '30',
		'20%' => '20',
		'10%' => '10'
	);

	/**
	 * @var array
	 */
	public static $sep_widths = array(
		'1px' => '',
		'2px' => '2',
		'3px' => '3',
		'4px' => '4',
		'5px' => '5',
		'6px' => '6',
		'7px' => '7',
		'8px' => '8',
		'9px' => '9',
		'10px' => '10'
	);

	/**
	 * @var array
	 */
	public static $sep_styles = array(
		'Border' => '',
		'Dashed' => 'dashed',
		'Dotted' => 'dotted',
		'Double' => 'double',
		'Shadow' => 'shadow'
	);

	/**
	 * @var array
	 */
	public static $box_styles = array(
		'Default' => '',
		'Rounded' => 'vc_box_rounded',
		'Border' => 'vc_box_border',
		'Outline' => 'vc_box_outline',
		'Shadow' => 'vc_box_shadow',
		'Bordered shadow' => 'vc_box_shadow_border',
		'3D Shadow' => 'vc_box_shadow_3d'
	);

	/**
	 * Round box styles
	 *
	 * @var array
	 */
	public static $round_box_styles = array(
		'Round' => 'vc_box_circle',
		'Round Border' => 'vc_box_border_circle',
		'Round Outline' => 'vc_box_outline_circle',
		'Round Shadow' => 'vc_box_shadow_circle',
		'Round Border Shadow' => 'vc_box_shadow_border_circle'
	);

	/**
	 * Circle box styles
	 *
	 * @var array
	 */
	public static $circle_box_styles = array(
		'Circle' => 'vc_box_circle_2',
		'Circle Border' => 'vc_box_border_circle_2',
		'Circle Outline' => 'vc_box_outline_circle_2',
		'Circle Shadow' => 'vc_box_shadow_circle_2',
		'Circle Border Shadow' => 'vc_box_shadow_border_circle_2'
	);

	/**
	 * @return array
	 */
	public static function ts_getColors() {
		return self::$colors;
	}
	
	/**
	 * @return array
	 */
	public static function ts_getPreTextColors() {
		return self::$predefined_text_colors;
	}
	
	/**
	 * @return array
	 */
	public static function ts_getPreBgColors() {
		return self::$predefined_bg_colors;
	}
	
	/**
	 * @return array
	 */
	public static function ts_getIcons() {
		return self::$icons;
	}

	/**
	 * @return array
	 */
	public static function ts_getSizes() {
		return self::$sizes;
	}

	/**
	 * @return array
	 */
	public static function ts_getButtonStyles() {
		return self::$button_styles;
	}

	/**
	 * @return array
	 */
	public static function ts_getMessageBoxStyles() {
		return self::$message_box_styles;
	}

	/**
	 * @return array
	 */
	public static function ts_getToggleStyles() {
		return self::$toggle_styles;
	}

	/**
	 * @return array
	 */
	public static function ts_getAnimationStyles() {
		return self::$animation_styles;
	}

	/**
	 * @return array
	 */
	public static function ts_getCtaStyles() {
		return self::$cta_styles;
	}

	/**
	 * @return array
	 */
	public static function ts_getTextAlign() {
		return self::$txt_align;
	}

	/**
	 * @return array
	 */
	public static function ts_getBorderWidths() {
		return self::$sep_widths;
	}

	/**
	 * @return array
	 */
	public static function ts_getElementWidths() {
		return self::$el_widths;
	}

	/**
	 * @return array
	 */
	public static function ts_getSeparatorStyles() {
		return self::$sep_styles;
	}

	/**
	 * Get list of box styles
	 *
	 * Possible $groups values:
	 * - default
	 * - round
	 * - circle
	 *
	 * @param array $groups Array of groups to include. If not specified, return all
	 *
	 * @return array
	 */
	public static function ts_getBoxStyles( $groups = array() ) {
		$list = array();
		$groups = (array) $groups;

		if ( ! $groups || in_array( 'default', $groups ) ) {
			$list += self::$box_styles;
		}

		if ( ! $groups || in_array( 'round', $groups ) ) {
			$list += self::$round_box_styles;
		}

		if ( ! $groups || in_array( 'cirlce', $groups ) ) {
			$list += self::$circle_box_styles;
		}

		return $list;
	}

	public static function ts_getColorsDashed() {
		$colors = array(
			esc_attr__( '[Skin Color]', 'labtechco' ) => 'skincolor',
			esc_attr__( 'Blue', 'labtechco' ) => 'blue',
			esc_attr__( 'Turquoise', 'labtechco' ) => 'turquoise',
			esc_attr__( 'Pink', 'labtechco' ) => 'pink',
			esc_attr__( 'Violet', 'labtechco' ) => 'violet',
			esc_attr__( 'Peacoc', 'labtechco' ) => 'peacoc',
			esc_attr__( 'Chino', 'labtechco' ) => 'chino',
			esc_attr__( 'Mulled Wine', 'labtechco' ) => 'mulled-wine',
			esc_attr__( 'Vista Blue', 'labtechco' ) => 'vista-blue',
			esc_attr__( 'Black', 'labtechco' ) => 'black',
			esc_attr__( 'Grey', 'labtechco' ) => 'grey',
			esc_attr__( 'Orange', 'labtechco' ) => 'orange',
			esc_attr__( 'Sky', 'labtechco' ) => 'sky',
			esc_attr__( 'Green', 'labtechco' ) => 'green',
			esc_attr__( 'Juicy pink', 'labtechco' ) => 'juicy-pink',
			esc_attr__( 'Sandy brown', 'labtechco' ) => 'sandy-brown',
			esc_attr__( 'Purple', 'labtechco' ) => 'purple',
			esc_attr__( 'White', 'labtechco' ) => 'white'
		);

		return $colors;
	}
}

/**
 * @param string $asset
 *
 * @return array
 */
function ts_getVcShared( $asset = '' ) {
	switch ( $asset ) {
		case 'colors':
			return ts_VcSharedLibrary::ts_getColors();
			break;

		case 'pre-text-colors':
			return ts_VcSharedLibrary::ts_getPreTextColors();
			
		case 'pre-bg-colors':
			return ts_VcSharedLibrary::ts_getPreBgColors();
			
		case 'colors-dashed':
			return ts_VcSharedLibrary::ts_getColorsDashed();
			break;

		case 'icons':
			return ts_VcSharedLibrary::ts_getIcons();
			break;

		case 'sizes':
			return ts_VcSharedLibrary::ts_getSizes();
			break;

		case 'button styles':
		case 'alert styles':
			return ts_VcSharedLibrary::ts_getButtonStyles();
			break;
		case 'message_box_styles':
			return ts_VcSharedLibrary::ts_getMessageBoxStyles();
			break;
		case 'cta styles':
			return ts_VcSharedLibrary::ts_getCtaStyles();
			break;

		case 'text align':
			return ts_VcSharedLibrary::ts_getTextAlign();
			break;

		case 'cta widths':
		case 'separator widths':
			return ts_VcSharedLibrary::ts_getElementWidths();
			break;

		case 'separator styles':
			return ts_VcSharedLibrary::ts_getSeparatorStyles();
			break;

		case 'separator border widths':
			return ts_VcSharedLibrary::ts_getBorderWidths();
			break;

		case 'single image styles':
			return ts_VcSharedLibrary::ts_getBoxStyles();
			break;

		case 'single image external styles':
			return ts_VcSharedLibrary::ts_getBoxStyles( array( 'default', 'round' ) );
			break;

		case 'toggle styles':
			return ts_VcSharedLibrary::ts_getToggleStyles();
			break;

		case 'animation styles':
			return ts_VcSharedLibrary::ts_getAnimationStyles();
			break;

		default:
			# code...
			break;
	}

	return '';
}

global $ts_pixel_icons;
$ts_pixel_icons = array(
	array( 'vc_pixel_icon vc_pixel_icon-alert' => esc_attr__( 'Alert', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-info' => esc_attr__( 'Info', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-tick' => esc_attr__( 'Tick', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-explanation' => esc_attr__( 'Explanation', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-address_book' => esc_attr__( 'Address book', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-alarm_clock' => esc_attr__( 'Alarm clock', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-anchor' => esc_attr__( 'Anchor', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-application_image' => esc_attr__( 'Application Image', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-arrow' => esc_attr__( 'Arrow', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-asterisk' => esc_attr__( 'Asterisk', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-hammer' => esc_attr__( 'Hammer', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon' => esc_attr__( 'Balloon', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_buzz' => esc_attr__( 'Balloon Buzz', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_facebook' => esc_attr__( 'Balloon Facebook', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_twitter' => esc_attr__( 'Balloon Twitter', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-battery' => esc_attr__( 'Battery', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-binocular' => esc_attr__( 'Binocular', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_excel' => esc_attr__( 'Document Excel', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_image' => esc_attr__( 'Document Image', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_music' => esc_attr__( 'Document Music', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_office' => esc_attr__( 'Document Office', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_pdf' => esc_attr__( 'Document PDF', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_powerpoint' => esc_attr__( 'Document Powerpoint', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_word' => esc_attr__( 'Document Word', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-bookmark' => esc_attr__( 'Bookmark', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camcorder' => esc_attr__( 'Camcorder', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camera' => esc_attr__( 'Camera', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart' => esc_attr__( 'Chart', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart_pie' => esc_attr__( 'Chart pie', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-clock' => esc_attr__( 'Clock', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-fire' => esc_attr__( 'Fire', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-heart' => esc_attr__( 'Heart', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-mail' => esc_attr__( 'Mail', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-play' => esc_attr__( 'Play', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-shield' => esc_attr__( 'Shield', 'labtechco' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-video' => esc_attr__( 'Video', 'labtechco' ) ),
);

/*
 *  GLOBAL: Carousel Options
 */
function ts_box_params($boxtype=''){
	
	$boxview = array(
		esc_attr__('Row and Column','labtechco')  => 'default',
		esc_attr__('Carousel effect','labtechco') => 'carousel',
	);
	
	// CSS Animation
	$vc_map_add_css_animation = vc_map_add_css_animation();
	$vc_map_add_css_animation['group'] = esc_attr__( 'Boxes Appearance', 'labtechco' );
	
	if( $boxtype=='blog' ){
		// Nothing to do
	}
	
	// Testimonial changes for box option
	$std_column  = 'three';
	$std_boxview = 'default';
	if( $boxtype == 'testimonial' ){
		$std_column  = 'one';
		$std_boxview = 'carousel';
	}
	
	$boxOprions = array(
		
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Column", "labtechco"),
			"param_name"  => "column",
			"description" => esc_attr__("Select column.", "labtechco"),
			"value"       => array(
				esc_attr__("One Column",    "labtechco") => "one",
				esc_attr__("Two Columns",   "labtechco") => "two",
				esc_attr__("Three Columns", "labtechco") => "three",
				esc_attr__("Four Columns",  "labtechco") => "four",
				esc_attr__("Five Columns",  "labtechco") => "five",
				esc_attr__("Six Columns",   "labtechco") => "six",
			),
			'std'         => esc_attr($std_column),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Box View",'labtechco'),
			"description" => esc_attr__("Select box view. Show as normal row and column or show with carousel effect.",'labtechco'),
			"param_name"  => "boxview",
			"value"       => $boxview,
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'std'         => esc_attr($std_boxview),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Timeline: Group by', 'labtechco' ),
			'param_name' => 'timeline_groupby',
			'value'      => array(
				esc_attr__( 'Monthly grouping', 'labtechco' ) => 'monthly',
				esc_attr__( 'Yearly grouping', 'labtechco' )  => 'yearly'
			),
			'description' => esc_attr__( 'Timeline: Show timeline view in which group by.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Timeline: Box view', 'labtechco' ),
			'param_name' => 'timeline_boxview',
			'value'      => array(
				esc_attr__( 'Simple view - without featured image', 'labtechco' ) => 'simple',
				esc_attr__( 'Simple view - with featured image', 'labtechco' )    => 'simple_with_fetured',
				esc_attr__( 'Box view', 'labtechco' )                             => 'box',
			),
			'description' => esc_attr__( 'Timeline: Show timeline view in which group by.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		
		/*** Carousel Options start ***/
		
		// speed
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Carousel: Transaction speed', 'labtechco' ),
			'param_name'  => 'carousel_speed',
			'description' => esc_attr__( 'Carousel Effect: Slide/Fade animation speed.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1500',
		),
		
		// Auto Play
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Autoplay', 'labtechco' ),
			'param_name' => 'carousel_autoplay',
			'value'      => array(
				esc_attr__( 'Yes', 'labtechco' ) => '1',
				esc_attr__( 'No', 'labtechco' )  => '0'
			),
			'description' => esc_attr__( 'Carousel Effect: Enable/disable Autoplay', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		
		// autoplaySpeed
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Carousel: autoplaySpeed', 'labtechco' ),
			'param_name'  => 'carousel_autoplayspeed',
			'description' => esc_attr__( 'Carousel Effect: autoplay speed. Inert numbers only. Default value is "4500".', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '4500',
		),
		
		// loop
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Loop Item', 'labtechco' ),
			'param_name' => 'carousel_loop',
			'value'      => array(
				esc_attr__( 'No', 'labtechco' )  => '0',
				esc_attr__( 'Yes', 'labtechco' ) => '1',
			),
			'description' => esc_attr__( 'Carousel Effect: Infinite loop sliding.', 'labtechco' ).'<br><strong>'.esc_attr__( 'NOTE:', 'labtechco' ).' </strong> '.esc_attr__( 'If you select NO than the carousel will rewind all and start from 1st item. Also this will work if you enabled "Autoplay".', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		
		// Dots
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: dots', 'labtechco' ),
			'param_name' => 'carousel_dots',
			'value'      => array(
				esc_attr__('No', 'labtechco')  => '0',
				esc_attr__('Yes', 'labtechco') => '1',
				
			),
			'description' => esc_attr__( 'Carousel Effect: Show dots navigation.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		// Next/Prev links
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Next/Prev Arrows', 'labtechco' ),
			'param_name' => 'carousel_nav',
			'value'      => array(
				esc_attr__('Above Carousel', 'labtechco')       => 'above',
				esc_attr__('Below Carousel', 'labtechco')       => 'below',
				esc_attr__('Before / After boxes', 'labtechco') => '1',
				esc_attr__('Hide', 'labtechco')                 => 'hide',
				
			),
			'description' => esc_attr__( 'Carousel Effect: Show dots navigation.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'below',
		),
		
		// centerMode
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: centerMode', 'labtechco' ),
			'param_name' => 'carousel_centermode',
			'value'      => array(
				esc_attr__('No', 'labtechco')  => '0',
				esc_attr__('Yes', 'labtechco') => '1',
				
			),
			'description' => esc_attr__( 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		
		// pauseOnFocus
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: pauseOnFocus', 'labtechco' ),
			'param_name' => 'carousel_pauseonfocus',
			'value'      => array(
				esc_attr__('Yes', 'labtechco') => '1',
				esc_attr__('No', 'labtechco')  => '0',
			),
			'description' => esc_attr__( 'Carousel Effect: Pause Autoplay On Focus.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		
		// pauseOnHover
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: pauseOnHover', 'labtechco' ),
			'param_name' => 'carousel_pauseonhover',
			'value'      => array(
				esc_attr__('Yes', 'labtechco') => '1',
				esc_attr__('No', 'labtechco')  => '0',
			),
			'description' => esc_attr__( 'Carousel Effect: Pause on mouse hover.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		
		// 
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: slidesToScroll', 'labtechco' ),
			'param_name' => 'carousel_slidestoscroll',
			'value'      => array(
				esc_attr__( '1 Slide', 'labtechco' )        => '1',
				esc_attr__( 'Same as column', 'labtechco' ) => 'column',
			),
			'description' => esc_attr__( '# of slides to scroll.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'column',
		),
		// Box trasaction effect
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Box transaction effect', 'labtechco' ),
			'param_name' => 'carousel_effecttype',
			'value'      => array(
				esc_attr__( 'Slide', 'labtechco' )  => 'slide',
				esc_attr__( 'fade', 'labtechco' )   => 'fade',
			),
			'description' => esc_attr__( 'Select Fade or Slide effect for carousel.', 'labtechco' ) . '<br><strong>' . esc_attr__( 'NOTE:', 'labtechco' ) . esc_attr__( 'The FADE effect will work with one column view only.', 'labtechco' ) . '</strong>',
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'slide',
		),
		
		$vc_map_add_css_animation,
		
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Extra class name', 'labtechco' ),
			'param_name'  => 'el_class',
			'description' => esc_attr__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'labtechco' ),
			'group'       => esc_attr__( 'Boxes Appearance', 'labtechco' ),
		),
		
	);
	
	return $boxOprions;
}


/**
 *  GLOBAL: Heading Options in Visual Composer element
 */
function ts_vc_heading_params($data=''){
	$h2_custom_heading = vc_map_integrate_shortcode( 'ts-custom-heading', 'h2_', esc_attr__( 'Heading', 'labtechco' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h2',
			'value'   => 'true',
		)
	);
	

	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
		foreach ( $h2_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}

	$h4_custom_heading = vc_map_integrate_shortcode( 'ts-custom-heading', 'h4_', esc_attr__( 'Subheading', 'labtechco' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h4',
			'value' => 'true',
		)
	);

	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
		foreach ( $h4_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}

	$params = array_merge(
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Heading', 'labtechco' ),
				'admin_label' => true,
				'param_name'  => 'h2',
				'save_always' => true,
				'value'       => esc_attr__( 'Welcome', 'labtechco' ),
				'description' => esc_attr__( 'Enter text for heading line.', 'labtechco' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_attr__( 'Use custom font?', 'labtechco' ),
				'param_name' => 'use_custom_fonts_h2',
				'description' => esc_attr__( 'Enable Google fonts.', 'labtechco' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),

		),
		$h2_custom_heading,
		array(
			array(
				'type'             => 'textfield',
				'heading'          => esc_attr__( 'Subheading', 'labtechco' ),
				'param_name'       => 'h4',
				'description'      => esc_attr__( 'Enter text for subheading line.', 'labtechco' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_attr__( 'Use custom font?', 'labtechco' ),
				'param_name'       => 'use_custom_fonts_h4',
				'description'      => esc_attr__( 'Enable custom font option.', 'labtechco' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
		),
		$h4_custom_heading,
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_attr__( 'Text alignment', 'labtechco' ),
				'param_name'  => 'txt_align',
				'value'		  => ( ( function_exists('vc_get_shared') ) ? vc_get_shared( 'text align' ) : getVcShared( 'text align' ) ), // default left
				'description' => esc_attr__( 'Select text alignment.', 'labtechco' ),
				'std'         => 'left',
			),
		)
	);
	
	// Setting default font settings.. Make sure you change this when change default value in Redux Options
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'h2_google_fonts' ){
			$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
		} else if( $param_name == 'h4_google_fonts' ){
			$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
		}
		$i++;
	}; // Foreach
	
	return $params;
}


function ts_vc_ele_extra_class_option(){
	
	$return = array(
		'type'        => 'textfield',
		'heading'     => esc_attr__( 'Extra class name', 'labtechco' ),
		'param_name'  => 'el_class',
		'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'labtechco' )
	);
			
	return $return;
			
}

function ts_vc_ele_css_editor_option(){
	
	$return = array(
		'type'       => 'css_editor',
		'heading'    => esc_attr__( 'CSS box', 'labtechco' ),
		'param_name' => 'css',
		'group'      => esc_attr__( 'Design Options', 'labtechco' )
	);
			
	return $return;
			
}

function ts_responsive_padding_margin_option( $for=''){
	$return = array(
		"type"			=> "themestek_css_editor",
		"heading"		=> esc_attr__("Responsive Padding/Margin Options", "labtechco"),
		"description"	=> esc_attr__("You can mange padding/margin from here. For differnt screen sizes", "labtechco"),
		"param_name"	=> "ts_responsive_css",
		'group'			=> esc_attr__( 'Responsive Padding/Margin Options', 'labtechco' ),
	);
	
	if( $for=='column' ){
		$return['break_column_option'] = 'no';
	}
	
	return $return;
}

/**
 * @param $value
 *
 * @since 4.2
 * @return array
 */
function ts_vc_build_link( $value ) {
	return ts_vc_parse_multi_attribute( $value, array( 'url' => '', 'title' => '', 'target' => '' ) );
}


/**
 * Parse string like "title:Hello world|weekday:Monday" to array('title' => 'Hello World', 'weekday' => 'Monday')
 *
 * @param $value
 * @param array $default
 *
 * @since 4.2
 * @return array
 */
function ts_vc_parse_multi_attribute( $value, $default = array() ) {
	$result = $default;
	$params_pairs = explode( '|', $value );
	if ( ! empty( $params_pairs ) ) {
		foreach ( $params_pairs as $pair ) {
			$param = preg_split( '/\:/', $pair );
			if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
				$result[ $param[0] ] = rawurldecode( $param[1] );
			}
		}
	}

	return $result;
}


 /*
 * Enqueue icon element font
 * @todo move to separate folder
 * @since 4.4
 *
 * @param $font
 */
function ts_vc_icon_element_fonts_enqueue( $font ) {
	switch ( $font ) {
		case 'themify':
			wp_enqueue_style( 'themify' );  // added by ThemeStek
			break;
		case 'fontawesome':
		default:
			wp_enqueue_style( 'font-awesome' );
			break;
		case 'linecons':
			wp_enqueue_style( 'vc_linecons' );
			break;
	}
}

function ts_getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $atts ) {
	$styles = array();
	if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
		foreach ( $font_container_data['values'] as $key => $value ) {
			if ( 'tag' !== $key && strlen( $value ) ) {
				if ( preg_match( '/description/', $key ) ) {
					continue;
				}
				if ( 'font_size' === $key || 'line_height' === $key ) {
					$value = preg_replace( '/\s+/', '', $value );
				}
				if ( 'font_size' === $key ) {
					$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
					$regexr  = preg_match( $pattern, $value, $matches );
					$value   = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
					$unit    = isset( $matches[2] ) ? $matches[2] : 'px';
					$value   = $value . $unit;
				}
				if ( strlen( $value ) > 0 ) {
					$styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
				}
			}
		}
	}
	if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
		$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
		$styles[] = 'font-family:' . $google_fonts_family[0];
		$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
		$styles[] = 'font-weight:' . $google_fonts_styles[1];
		$styles[] = 'font-style:' . $google_fonts_styles[2];
	}

	/**
	 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
	 *
	 * @param string - filter_name
	 * @param string - element_class
	 * @param string - shortcode_name
	 * @param array - shortcode_attributes
	 *
	 * @since 4.3
	 */
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_custom_heading ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

	return array(
		'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
		'styles' => $styles,
	);
}


function ts_vc_get_css_color( $prefix, $color ) {
	$rgb_color = preg_match( '/rgba/', $color ) ? preg_replace( array(
		'/\s+/',
		'/^rgba\((\d+)\,(\d+)\,(\d+)\,([\d\.]+)\)$/',
	), array(
		'',
		'rgb($1,$2,$3)',
	), $color ) : $color;
	$string = $prefix . ':' . $rgb_color . ';';
	if ( $rgb_color !== $color ) {
		$string .= $prefix . ':' . $color . ';';
	}

	return $string;
}

function ts_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( '' !== $css_animation ) {
		wp_enqueue_script( 'vc_waypoints' );
		wp_enqueue_style( 'animate-css' );
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation;
	}

	return $output;
}


/**
 * @param $el_class
 *
 * @return string
 */
function ts_getExtraClass( $el_class ) {
	$output = '';
	if ( '' !== $el_class ) {
		$output = ' ' . str_replace( '.', '', $el_class );
	}

	return $output;
}


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
 *  Check if Background color is available in css code
 */
if( !function_exists('themestek_check_if_bgcolor_in_css') ){
function themestek_check_if_bgcolor_in_css( $css ) {
	$return = false;
	
	if( !empty($css) ){
		$css_array = explode('{', $css);
		$css_array = $css_array[1];
		$css_array = str_replace('}','', $css_array );
		$css_array = explode( ';', $css_array );
		if( is_array($css_array) && count($css_array)>0 ){
			foreach( $css_array as $css_rule ){
				if ( substr( $css_rule, 0, 11 ) == 'background:' ) {
					$css_rule = explode( ':', $css_rule );
					$css_rule = $css_rule[1];
					$css_rule = explode( ' ', $css_rule );
					$css_rule = array_filter($css_rule);
					
					foreach( $css_rule as $rule ){
						if( substr($rule, 0, 1)=='#' || substr($rule, 0, 4)=='rgb(' || substr($rule, 0, 5)=='rgba(' ){
							$return = true;
						}
						
					}
					
				} else if ( substr( $css_rule, 0, 17 ) == 'background-color:' ) {
					$return = true;
				}
			}
		}
		
	}
	
	return $return;
}
}


/**** Security ****/
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

/**
 * Adding extra parameters in VC
 */
if( !function_exists('ts_vc_add_extra_param') ){
function ts_vc_add_extra_param(){
	
	/************* VC ROW *******************/
	
	// VC ROW : Text Color
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Text Color", "labtechco"),
		"description" => esc_attr__("Select text color.", "labtechco"),
		"param_name"  => "ts_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default", "labtechco")     => "",
			esc_attr__("Dark Color", "labtechco")  => "dark",
			esc_attr__("White Color", "labtechco") => "white",
			esc_attr__("Skin Color", "labtechco")  => "skincolor",
		),
	));
	
	// VC ROW : Background Color
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Background Color", "labtechco"),
		"description" => esc_attr__("Select Background Color. If you select color and also select background Video or background Image than the color will be overlay with some opacity.", "labtechco"),
		"param_name"  => "ts_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default (From Design Options tab)", "labtechco") => "",
			esc_attr__('Dark grey color as background color', 'labtechco') => 'darkgrey',
			esc_attr__('Grey color as background color', 'labtechco')      => 'grey',
			esc_attr__('White color as background color', 'labtechco')     => 'white',
			esc_attr__('Skincolor color as background color', 'labtechco') => 'skincolor',
			
		),
	));
	
	// VC ROW : Background Image Position
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Background Image Position", "labtechco"),
		"description" => esc_attr__("Select Background Image Position", "labtechco"),
		"param_name"  => "ts_bgimage_position",
		"weight"      => 1,
		"value"       => array(
			esc_attr__('left top', "labtechco")      => 'left_top',
			esc_attr__('left center', "labtechco")   => 'left_center',
			esc_attr__('left bottom', "labtechco")   => 'left_bottom',
			esc_attr__('right top', "labtechco")     => 'right_top',
			esc_attr__('right center', "labtechco")  => 'right_center',
			esc_attr__('right bottom', "labtechco")  => 'right_bottom',
			esc_attr__('center center', "labtechco") => 'center_center',
			esc_attr__('center top', "labtechco")    => 'center_top',
			esc_attr__('center bottom', "labtechco") => 'center_bottom'
		),
		"std"  => "center_center",
	));
	
	
	// VC ROW : Z-index
	vc_add_param( 'vc_row', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Layer position for this ROW (z-index of the ROW)', 'labtechco' ),
		'description'	=> esc_attr__( 'Select position for this ROW. Technically this will add z-index css property. So you can overlap ROW on each over by setting this z-index property.', 'labtechco' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_attr('Z-Index- Style 0','labtechco'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 1','labtechco'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 2','labtechco'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	
	
	// VC ROW : CSS Settings for 1200 and up
	vc_add_param( 'vc_row', ts_responsive_padding_margin_option() );
	
	
	/************* VC COLUMN *******************/
	
	// VC COLUMN : Text Color
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Text Color", "labtechco"),
		"description" => esc_attr__("Select text color", "labtechco"),
		"param_name"  => "ts_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default", "labtechco")     => "",
			esc_attr__("Dark Color", "labtechco")  => "dark",
			esc_attr__("White Color", "labtechco") => "white",
			esc_attr__("Skin Color", "labtechco")  => "skincolor",
		),
	));
	
	// VC COLUMN : Background Color
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Background Color", "labtechco"),
		"description" => esc_attr__("Select Background Color. If you select color and also select background Image than the color will be overlay with some opacity", "labtechco"),
		"param_name"  => "ts_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default (From Design Options tab)", "labtechco") => "",
			esc_attr__('Dark grey color as background color', 'labtechco') => 'darkgrey',
			esc_attr__('Grey color as background color', 'labtechco')      => 'grey',
			esc_attr__('White color as background color', 'labtechco')     => 'white',
			esc_attr__('Skincolor color as background color', 'labtechco') => 'skincolor',
			
		),
	));
	
	// VC COLUMN : Add Shadow
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Add shadow?", "labtechco"),
		"description" => esc_attr__("Select YES to set shadow for the column.", "labtechco"),
		"param_name"  => "ts_shadow",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("No", "labtechco")  => "",
			esc_attr__('Yes', 'labtechco') => 'yes',
		),
	));
	
	
	// VC COLUMN : Lower padding in responsive mode
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Reduce spacing (Padding) from left/right area in responsive mode", "labtechco"),
		"description" => esc_attr__("This is useful if you set extra padding via 'Design Options' tab. This will reset spacing (padding) from left/right area for the column.", "labtechco"),
		"param_name"  => "reduce_extra_padding",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("None (default)", "labtechco")                       		   => "",
			esc_attr__('Reset in small desktop (under 1200 pixel size)', "labtechco") => '1200',
			esc_attr__('Reset in tablet (under 992 pixel size)', "labtechco")         => '991',
		),
	));
	
	// VC COLUMN : Exapand Column BG to left or right
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Exapand Column Background", "labtechco"),
		"description" => esc_attr__("Exapand Column BG to left or right. This will expand the Background image/color visibility to border of the browser border.", "labtechco"),
		"param_name"  => "ts_col_bg_expand",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("No expand (default)", "labtechco")                => "",
			esc_attr__('Exapand Column background to left', 'labtechco')  => 'left',
			esc_attr__('Exapand Column background to right', 'labtechco') => 'right',
		),
	));
	
	// VC COLUMN : Background Image Position
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Background Image Position", "labtechco"),
		"description" => esc_attr__("Select Background Image Position", "labtechco"),
		"param_name"  => "ts_bgimage_position",
		"weight"      => 1,
		"value"       => array(
			esc_attr__('left top', "labtechco")      => 'left_top',
			esc_attr__('left center', "labtechco")   => 'left_center',
			esc_attr__('left bottom', "labtechco")   => 'left_bottom',
			esc_attr__('right top', "labtechco")     => 'right_top',
			esc_attr__('right center', "labtechco")  => 'right_center',
			esc_attr__('right bottom', "labtechco")  => 'right_bottom',
			esc_attr__('center center', "labtechco") => 'center_center',
			esc_attr__('center top', "labtechco")    => 'center_top',
			esc_attr__('center bottom', "labtechco") => 'center_bottom'
		),
		"std"  => "center_center",
	));
	
	// VC COLUMN : Z-index
	vc_add_param( 'vc_column', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Layer position for this COLUMN (z-index of the COLUMN)', 'labtechco' ),
		'description'	=> esc_attr__( 'Select position for this COLUMN. Technically this will add z-index css property. So you can overlap COLUMN on each over by setting this z-index property.', 'labtechco' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_attr('Z-Index- Style 0','labtechco'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 1','labtechco'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 2','labtechco'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	
	
	// VC COLUMN : CSS Settings for 1200 and up
	vc_add_param( 'vc_column', ts_responsive_padding_margin_option('column') );
	
	
	/************* VC ROW INNER *******************/
	
	// VC ROW INNER : Text Color
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Text Color", "labtechco"),
		"description" => esc_attr__("Select text color.", "labtechco"),
		"param_name"  => "ts_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default", "labtechco")     => "",
			esc_attr__("Dark Color", "labtechco")  => "dark",
			esc_attr__("White Color", "labtechco") => "white",
			esc_attr__("Skin Color", "labtechco")  => "skincolor",
		),
	));
	
	// VC ROW INNER : Background Color
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Background Color", "labtechco"),
		"description" => esc_attr__("Select Background Color. If you select color and also select background Video or background Image than the color will be overlay with some opacity.", "labtechco"),
		"param_name"  => "ts_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default (From Design Options tab)", "labtechco") => "",
			esc_attr__('Dark grey color as background color', 'labtechco') => 'darkgrey',
			esc_attr__('Grey color as background color', 'labtechco')      => 'grey',
			esc_attr__('White color as background color', 'labtechco')     => 'white',
			esc_attr__('Skincolor color as background color', 'labtechco') => 'skincolor',
			
		),
	));
	
	// VC ROW INNER : Add Shadow
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Add shadow?", "labtechco"),
		"description" => esc_attr__("Select YES to set shadow for the column.", "labtechco"),
		"param_name"  => "ts_shadow",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("No", "labtechco")  => "",
			esc_attr__('Yes', 'labtechco') => 'yes',
		),
	));
	
	// VC ROW INNER : Animation
	vc_add_param( 'vc_row_inner', vc_map_add_css_animation( false ) );
	
	// VC ROW INNER : Break column in Tablet
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Break column in Responsive", "labtechco"),
		"description" => esc_attr__("Break columns (set in one row) in Desktop or Tablet screens. This is useful if your content breaks (or not fit) due to wider content in columns.", "labtechco"),
		"param_name"  => "break_in_responsive",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("None (default)", "labtechco")									=> "",
			esc_attr__('Break in small desktop (under 1200 pixel size)', "labtechco")	=> '1200',
			esc_attr__('Break in tablet (under 992 pixel size)', "labtechco")			=> '991',
		),
	));
	
	// VC ROW INNER : Z-index
	vc_add_param( 'vc_row_inner', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Layer position for this ROW (z-index of the ROW)', 'labtechco' ),
		'description'	=> esc_attr__( 'Select position for this ROW. Technically this will add z-index css property. So you can overlap ROW on each over by setting this z-index property.', 'labtechco' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_attr('Z-Index- Style 0','labtechco'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 1','labtechco'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 2','labtechco'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	
	// VC ROW INNER : CSS Settings for 1200 and up
	vc_add_param( 'vc_row_inner', ts_responsive_padding_margin_option() );
	
	
	/************* VC COLUMN INNER *******************/
	
	// VC COLUMN INNER : Text Color
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Text Color", "labtechco"),
		"description" => esc_attr__("Select text color", "labtechco"),
		"param_name"  => "ts_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default", "labtechco")     => "",
			esc_attr__("Dark Color", "labtechco")  => "dark",
			esc_attr__("White Color", "labtechco") => "white",
			esc_attr__("Skin Color", "labtechco")  => "skincolor",
		),
	));
	
	// VC COLUMN INNER : Background Color
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Background Color", "labtechco"),
		"description" => esc_attr__("Select Background Color. If you select color and also select background Image than the color will be overlay with some opacity", "labtechco"),
		"param_name"  => "ts_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("Default (From Design Options tab)", "labtechco") => "",
			esc_attr__('Dark grey color as background color', 'labtechco') => 'darkgrey',
			esc_attr__('Grey color as background color', 'labtechco')      => 'grey',
			esc_attr__('White color as background color', 'labtechco')     => 'white',
			esc_attr__('Skincolor color as background color', 'labtechco') => 'skincolor',
			
		),
	));
	
	// VC COLUMN INNER : Add Shadow
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Add shadow?", "labtechco"),
		"description" => esc_attr__("Select YES to set shadow for the column.", "labtechco"),
		"param_name"  => "ts_shadow",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("No", "labtechco")  => "",
			esc_attr__('Yes', 'labtechco') => 'yes',
		),
	));
	
	
	// VC COLUMN INNER : Lower padding in responsive mode
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Reduce spacing (Padding) from left/right area in responsive mode", "labtechco"),
		"description" => esc_attr__("This is useful if you set extra padding via 'Design Options' tab. This will reset spacing (padding) from left/right area for the column.", "labtechco"),
		"param_name"  => "reduce_extra_padding",
		"weight"      => 1,
		"value"       => array(
			esc_attr__("None (default)", "labtechco")                       		   => "",
			esc_attr__('Reset in small desktop (under 1200 pixel size)', "labtechco") => '1200',
			esc_attr__('Reset in tablet (under 992 pixel size)', "labtechco")         => '991',
		),
	));
	
	// VC COLUMN : Z-index
	vc_add_param( 'vc_column_inner', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Layer position for this COLUMN (z-index of the COLUMN)', 'labtechco' ),
		'description'	=> esc_attr__( 'Select position for this COLUMN. Technically this will add z-index css property. So you can overlap COLUMN on each over by setting this z-index property.', 'labtechco' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_attr('Z-Index- Style 0','labtechco'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 1','labtechco'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_attr('Z-Index- Style 2','labtechco'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	
	
	// VC COLUMN INNER : Animation
	vc_add_param( 'vc_column_inner', vc_map_add_css_animation( false ) );
	
	
	// VC COLUMN INNER : CSS Settings for 1200 and up
	vc_add_param( 'vc_column_inner', ts_responsive_padding_margin_option('column') );
	
}
}
add_action( 'vc_after_init', 'ts_vc_add_extra_param', 21 );


/**
 *  Adding skincolor in some elements
 */
if( !function_exists('themestek_vc_add_skin_color') ){
function themestek_vc_add_skin_color() {
	
	// Add vc element in which you like to add skincolor
	$vc_element_array = array(
		array( 'vc_tta_accordion', 'color' ),
		array( 'vc_tta_tour', 'color' ),
		array( 'vc_tta_tabs', 'color' ),
		array( 'vc_toggle', 'color' ),
	);
	
	// looping vc elements and adding skincolor
	foreach( $vc_element_array as $vc_element ){
		$element = $vc_element[0];
		$option  = $vc_element[1];
		$param   = WPBMap::getParam( $element, $option );
		$colors  = $param['value'];
		if( is_array($colors) ){
			$colors = array_reverse($colors);
			$colors[__( '[Skin color]', 'labtechco' )] = 'skincolor';
			$param['value']      = array_reverse($colors);
		}
		vc_update_shortcode_param( $element, $param );
	}
	
}
}
add_action( 'vc_after_init', 'themestek_vc_add_skin_color', 2 ); /* Note: here we are using vc_after_init because WPBMap::GetParam and mutateParame are available only when default content elements are "mapped" into the system */


/**
 *  Modify default values for VC elements
 */
if( !function_exists('themestek_vc_change_default_values') ){
function themestek_vc_change_default_values() {
	
	$vc_element_array = array(
		array( 'vc_tta_accordion',	'shape',	'rounded' ),
		array( 'vc_tta_accordion',	'style',	'classic' ),
		array( 'vc_tta_accordion',	'no_fill',	'true' ),
		array( 'vc_tta_accordion',	'color',	'skincolor' ),
		array( 'vc_tta_accordion',	'gap',		'10' ),
		
		// 
		array( 'vc_tta_tabs',		'style',	'classic' ),
		array( 'vc_tta_tabs',		'shape',	'rounded' ),
		array( 'vc_tta_tabs',		'no_fill_content_area',	'true' ),
		array( 'vc_tta_tabs',		'color',	'skincolor' ),
		
		// 
		array( 'vc_tta_tour',		'style',	'classic' ),
		array( 'vc_tta_tour',		'color',	'skincolor' ),
		array( 'vc_tta_tour',		'shape',	'rounded' ),
		array( 'vc_tta_tour',		'controls_size',	'lg' ),
		array( 'vc_tta_tour',		'active_section',	'1' ),
		array( 'vc_tta_tour',		'no_fill_content_area',	'true' ),
		array( 'vc_tta_tour',		'el_class',	'ts-tourtab-style1' ),
		
	);
	
	// looping vc elements and adding skincolor
	foreach( $vc_element_array as $vc_element ){
		$element = $vc_element[0];
		$option  = $vc_element[1];
		$new_std = $vc_element[2];
	
		$param			= WPBMap::getParam( $element, $option );
		$param['std']	= $new_std;
		vc_update_shortcode_param( $element, $param );
	
	}
	
}
}
add_action( 'vc_after_init', 'themestek_vc_change_default_values' );


/********* Add extra Google Fonts in Custom Heading's Google Font list - Working Code Sample **********/
if( !function_exists('themestek_add_google_fonts') ){
function themestek_add_google_fonts($fonts_list){
	
	$return = $fonts_list;
	
	// reverse array so new font will be at top
	$return = array_reverse($return);
	
	// Adding: Source Sans Pro
	$Source_Sans_Pro = (object)array();
	$Source_Sans_Pro->font_family = esc_attr('Source Sans Pro');
	$Source_Sans_Pro->font_styles = "200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic";
    $Source_Sans_Pro->font_types = "200 light regular:200:normal,200 light italic:200:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic,800 bold regular:800:normal,800 bold italic:800:italic,900 bold regular:900:normal,900 bold italic:900:italic";
	
	// Adding "Source Sans Pro" font in return variable
	$return[] = $Source_Sans_Pro;

	// Adding: Source Sans Pro
	$League_Spartan = (object)array();
	$League_Spartan->font_family = esc_attr('League Spartan');
	$League_Spartan->font_styles = "100,200,300,400,500,600,700,800,900";
    $League_Spartan->font_types = "100,200,300,400 regular,500,600,700,800,900";
	
	// Adding "League Spartan" font in return variable
	$return[] = $League_Spartan;
	
	
	// Adding: Nunito Sans
	$Nunito_Sans = (object)array();
	$Nunito_Sans->font_family = esc_attr('Nunito Sans');
	$Nunito_Sans->font_styles = "200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic";
    $Nunito_Sans->font_types = "200 light regular:200:normal,200 light italic:200:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic,800 bold regular:800:normal,800 bold italic:800:italic,900 bold regular:900:normal,900 bold italic:900:italic";
	
	// Adding "Nunito Sans" font in return variable
	$return[] = $Nunito_Sans;
	
	// *** Removing: Montserrat font as VC is already providing but with less options
	foreach( $return as $key=>$val ){
		if( !empty($val->font_family) && $val->font_family == 'Montserrat' ){
			unset( $return[$key] );
		}
	}
	// *** Adding: Montserrat
	$Montserrat = (object)array();
	$Montserrat->font_family = esc_attr('Montserrat');
	$Montserrat->font_styles = "100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i";
    $Montserrat->font_types = "100 Thin:100:normal,100 Thin Italic:100:normal,200 Extra-Light:200:normal,200 Extra-light Italic:200:italic,300 Light:300:normal,300 Light Italic:300:italic,400 Regular:400:normal,400 Regular Italic:400:italic,500 Medium:500:normal,500 Medium Italic:500:italic,600 Semi-bold:600:normal,600 Semi-bold Italic:600:italic,700 Bold:700:normal,700 Bold Italic:700:italic,800 Extra-bold:800:normal,800 Extra-bold Italic:800:italic,900 Black:900:normal,900 Black Italic:900:italic";
	// Adding "Nunito Sans" font in return variable
	$return[] = $Montserrat;
	
	
	// *** Removing: Oswald font as VC is already providing but with less options
	foreach( $return as $key=>$val ){
		if( !empty($val->font_family) && $val->font_family == 'Oswald' ){
			unset( $return[$key] );
		}
	}
	// *** Adding: Oswald
	$Oswald = (object)array();
	$Oswald->font_family = esc_attr('Oswald');
	$Oswald->font_styles = "200,200i,300,300i,400,400i,500,500i,600,600i,700,700i";
    $Oswald->font_types = "200 Extra-Light:200:normal,200 Extra-light Italic:200:italic,300 Light:300:normal,300 Light Italic:300:italic,400 Regular:400:normal,400 Regular Italic:400:italic,500 Medium:500:normal,500 Medium Italic:500:italic,600 Semi-bold:600:normal,600 Semi-bold Italic:600:italic,700 Bold:700:normal,700 Bold Italic:700:italic";
	// Adding "Nunito Sans" font in return variable
	$return[] = $Oswald;
	
	
	// again reverse
	$return = array_reverse($return);
	
	asort($return);
	
	return $return;
}
}
add_filter('vc_google_fonts_get_fonts_filter', 'themestek_add_google_fonts');
/*************************************************************************************/

/********************* Modifying TAB SECTION adding our own icon picker ***********************/

if( function_exists('vc_map_update') ){
	
	function themestek_vc_edit_tab_element(){
		
		$params = vc_map_integrate_shortcode( 'vc_tta_section');
		$new_params = array();
		
		// adding new icon library
		foreach( $params as $key=>$param ){
			
			if( isset($param['param_name']) && $param['param_name']=='i_type' ){
				
				// adding new icon library
				$libraries = array_merge(
					array( esc_attr__('LabtechCO Special Icons','labtechco') => 'ts_labtechco' ),
					$param['value']
				);
				
				$param['value'] = $libraries;
				
				// adding new option
				$new_params[] = $param;
				
				// adding icon picker : ts_labtechco
				
				$new_params[] = array(
					'type'        => 'themestek_iconpicker',
					'heading'     => esc_attr__( 'Icon', 'labtechco' ),
					'param_name'  => 'i_icon_ts_labtechco',
					'value'       => 'flaticon-healthy-breakfast', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'type'         => 'ts_labtechco',
					),
					'dependency'  => array(
						'element'  => 'i_type',
						'value'    => 'ts_labtechco',
					),
					'description'      => esc_attr__( 'Select icon from library.', 'labtechco' ),
					'edit_field_class' => 'vc_col-sm-9 vc_column',
				);
				
			} else {
				$new_params[] = $param;
				
			}
			
		}
		
		vc_map_update( 'vc_tta_section', array( 'params'=>$new_params ) );
	}
	
	add_action( 'vc_after_init', 'themestek_vc_edit_tab_element' );
	
}
