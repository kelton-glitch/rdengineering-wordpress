<?php

/**
 * Add Elementor editor support in custom CPT
 */
add_action( 'elementor/controls/register', 'ts_elementor_init_controls');
function ts_elementor_init_controls($controls_manager) {
	// Include Control files
	require( get_template_directory() . '/includes/elementor/controls/control-ts-imgselect.php' );
	// Register control
	$controls_manager->register( new \ts_imgselect() );

}

/**
 * Add Elementor editor support in custom CPT
 */
if( !function_exists('ts_elementor_add_cpt_support') ){
function ts_elementor_add_cpt_support() {

    $cpt_list = get_option( 'elementor_cpt_support' );

    if( empty($cpt_list) ) {
        $cpt_list = array( 'page', 'post', 'ts-portfolio', 'ts-service', 'ts-team-member', 'ts-testimonial' );
		update_option( 'elementor_cpt_support', $cpt_list );

    } else if( !in_array( array( 'ts-portfolio', 'ts-service', 'ts-team-member', 'ts-testimonial' ), $cpt_list ) ) {
        $cpt_list[] = 'ts-portfolio';
        $cpt_list[] = 'ts-service';
        $cpt_list[] = 'ts-team-member';
        $cpt_list[] = 'ts-testimonial';
		update_option( 'elementor_cpt_support', $cpt_list );

    }
}
}
add_action( 'after_switch_theme', 'ts_elementor_add_cpt_support' );

/**
 * Add group in Elementor editor
 */
if( !function_exists('ts_elementor_add_group') ){
function ts_elementor_add_group() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'labtechco_category',
		[
			'title' => esc_attr__( 'LabtechCO Special Elements', 'labtechco' ),
			'icon' => 'fa fa-plug',
		],
		1 // tab position
	);
}
}
add_action( 'elementor/init', 'ts_elementor_add_group' );

/**
 * Adding custom icon to icon control in Elementor
 */
if( !function_exists('ts_elementor_add_custom_icons_tab') ){
function ts_elementor_add_custom_icons_tab( $icons_tabs = array() ) {

	if( defined('THEMESTEK_LABTECHCO_URI') ){
		// Business Special icons
		$ts_labtechco_icons_array = array(
			'dropper',
			'space-capsule',
			'rocket',
			'prism',
			'nuclear',
			'microscope',
			'earth-globe',
			'dropper-1',
			'rocket-launch',
			'bottle',
			'orbit',
			'burn',
			'astronaut',
			'flask',
			'beaker',
			'thermometer',
			'rocket-launch-1',
			'dna',
			'atomic',
			'syringe',
			'nuclear-1',
			'microscope-1',
			'test-tube',
			'bottle-1',
			'poison',
			'microscope-2',
			'test-tube-1',
			'dna-1',
			'caduceus',
			'bacteria',
			'dna-2',
			'dna-3',
			'magnet',
			'thermometer-1',
			'element',
			'rat',
			'molecule',
			'apple',
			'earth',
			'observation',
			'magnifying-glass',
			'petri-dish',
			'compass',
			'molecular',
			'telescope',
			'axis',
			'calculator',
			'scientist',
			'solar-system',
			'satellite',
			'microscope-3',
			'book',
			'clipboard',
			'test-tube-2',
			'cell',
			'dna-structure',
			'earth-globe-1',
			'medicines',
			'statistics',
			'bacteria-1',
			'atom',
			'flasks',
			'samples',
			'science',
			'radiation',
			'suit',
			'shaker',
			'chemistry',
			'chemistry-1',
			'syringe-1',
			'gas-mask',
			'reproduction',
			'experiment',
			'petri-dish-1',
			'cloning',
			'science-book',
			'microbiology',
			'poison-1',
			'genetic',
			'scientific',
			'molecular-1',
			'bacteria-2',
			'research',
			'test-tube-3',
			'hazardous',
			'molecular-2',
			'chromosome',
			'chemical-reaction',
			'microscope-4',
			'cell-1',
			'laboratory',
			'cell-division'
		);
		$icons_tabs['ts_labtechco_icon'] = array(
			'name'          => 'ts_labtechco_icon',
			'label'         => esc_html__( 'LabtechCO Special Icons', 'labtechco' ),
			'labelIcon'     => 'ts-labtechco-icon ts-labtechco-icon-light',
			'prefix'        => 'ts-labtechco-business-icon-',
			'displayPrefix' => 'ts-labtechco-business-icon',
			'url'           => THEMESTEK_LABTECHCO_URI . '/icon-picker/icon-libraries/ts-lab-icons/font/flaticon.css',
			'icons'         => $ts_labtechco_icons_array,
			'ver'           => '1.0.0',
		);

		// Business Special icons
		$ts_themify_icons_array = array(
			'wand',
			'volume',
			'user',
			'unlock',
			'unlink',
			'trash',
			'thought',
			'target',
			'tag',
			'tablet',
			'star',
			'spray',
			'signal',
			'shopping-cart',
			'shopping-cart-full',
			'settings',
			'search',
			'zoom-in',
			'zoom-out',
			'cut',
			'ruler',
			'ruler-pencil',
			'ruler-alt',
			'bookmark',
			'bookmark-alt',
			'reload',
			'plus',
			'pin',
			'pencil',
			'pencil-alt',
			'paint-roller',
			'paint-bucket',
			'na',
			'mobile',
			'minus',
			'medall',
			'medall-alt',
			'marker',
			'marker-alt',
			'arrow-up',
			'arrow-right',
			'arrow-left',
			'arrow-down',
			'lock',
			'location-arrow',
			'link',
			'layout',
			'layers',
			'layers-alt',
			'key',
			'import',
			'image',
			'heart',
			'heart-broken',
			'hand-stop',
			'hand-open',
			'hand-drag',
			'folder',
			'flag',
			'flag-alt',
			'flag-alt-2',
			'eye',
			'export',
			'exchange-vertical',
			'desktop',
			'cup',
			'crown',
			'comments',
			'comment',
			'comment-alt',
			'close',
			'clip',
			'angle-up',
			'angle-right',
			'angle-left',
			'angle-down',
			'check',
			'check-box',
			'camera',
			'announcement',
			'brush',
			'briefcase',
			'bolt',
			'bolt-alt',
			'blackboard',
			'bag',
			'move',
			'arrows-vertical',
			'arrows-horizontal',
			'fullscreen',
			'arrow-top-right',
			'arrow-top-left',
			'arrow-circle-up',
			'arrow-circle-right',
			'arrow-circle-left',
			'arrow-circle-down',
			'angle-double-up',
			'angle-double-right',
			'angle-double-left',
			'angle-double-down',
			'zip',
			'world',
			'wheelchair',
			'view-list',
			'view-list-alt',
			'view-grid',
			'uppercase',
			'upload',
			'underline',
			'truck',
			'timer',
			'ticket',
			'thumb-up',
			'thumb-down',
			'text',
			'stats-up',
			'stats-down',
			'split-v',
			'split-h',
			'smallcap',
			'shine',
			'shift-right',
			'shift-left',
			'shield',
			'notepad',
			'server',
			'quote-right',
			'quote-left',
			'pulse',
			'printer',
			'power-off',
			'plug',
			'pie-chart',
			'paragraph',
			'panel',
			'package',
			'music',
			'music-alt',
			'mouse',
			'mouse-alt',
			'money',
			'microphone',
			'menu',
			'menu-alt',
			'map',
			'map-alt',
			'loop',
			'location-pin',
			'list',
			'light-bulb',
			'Italic',
			'info',
			'infinite',
			'id-badge',
			'hummer',
			'home',
			'help',
			'headphone',
			'harddrives',
			'harddrive',
			'gift',
			'game',
			'filter',
			'files',
			'file',
			'eraser',
			'envelope',
			'download',
			'direction',
			'direction-alt',
			'dashboard',
			'control-stop',
			'control-shuffle',
			'control-play',
			'control-pause',
			'control-forward',
			'control-bactsard',
			'cloud',
			'cloud-up',
			'cloud-down',
			'clipboard',
			'car',
			'calendar',
			'book',
			'bell',
			'basketball',
			'bar-chart',
			'bar-chart-alt',
			'back-right',
			'back-left',
			'arrows-corner',
			'archive',
			'anchor',
			'align-right',
			'align-left',
			'align-justify',
			'align-center',
			'alert',
			'alarm-clock',
			'agenda',
			'write',
			'window',
			'widgetized',
			'widget',
			'widget-alt',
			'wallet',
			'video-clapper',
			'video-camera',
			'vector',
			'themify-logo',
			'themify-favicon',
			'themify-favicon-alt',
			'support',
			'stamp',
			'split-v-alt',
			'slice',
			'shortcode',
			'shift-right-alt',
			'shift-left-alt',
			'ruler-alt-2',
			'receipt',
			'pin2',
			'pin-alt',
			'pencil-alt2',
			'palette',
			'more',
			'more-alt',
			'microphone-alt',
			'magnet',
			'line-double',
			'line-dotted',
			'line-dashed',
			'layout-width-full',
			'layout-width-default',
			'layout-width-default-alt',
			'layout-tab',
			'layout-tab-window',
			'layout-tab-v',
			'layout-tab-min',
			'layout-slider',
			'layout-slider-alt',
			'layout-sidebar-right',
			'layout-sidebar-none',
			'layout-sidebar-left',
			'layout-placeholder',
			'layout-menu',
			'layout-menu-v',
			'layout-menu-separated',
			'layout-menu-full',
			'layout-media-right-alt',
			'layout-media-right',
			'layout-media-overlay',
			'layout-media-overlay-alt',
			'layout-media-overlay-alt-2',
			'layout-media-left-alt',
			'layout-media-left',
			'layout-media-center-alt',
			'layout-media-center',
			'layout-list-thumb',
			'layout-list-thumb-alt',
			'layout-list-post',
			'layout-list-large-image',
			'layout-line-solid',
			'layout-grid4',
			'layout-grid3',
			'layout-grid2',
			'layout-grid2-thumb',
			'layout-cta-right',
			'layout-cta-left',
			'layout-cta-center',
			'layout-cta-btn-right',
			'layout-cta-btn-left',
			'layout-column4',
			'layout-column3',
			'layout-column2',
			'layout-accordion-separated',
			'layout-accordion-merged',
			'layout-accordion-list',
			'ink-pen',
			'info-alt',
			'help-alt',
			'headphone-alt',
			'hand-point-up',
			'hand-point-right',
			'hand-point-left',
			'hand-point-down',
			'gallery',
			'face-smile',
			'face-sad',
			'credit-card',
			'control-skip-forward',
			'control-skip-bactsard',
			'control-record',
			'control-eject',
			'comments-smiley',
			'brush-alt',
			'youtube',
			'vimeo',
			'twitter',
			'time',
			'tumblr',
			'skype',
			'share',
			'share-alt',
			'rocket',
			'pinterest',
			'new-window',
			'microsoft',
			'list-ol',
			'linkedin',
			'layout-sidebar-2',
			'layout-grid4-alt',
			'layout-grid3-alt',
			'layout-grid2-alt',
			'layout-column4-alt',
			'layout-column3-alt',
			'layout-column2-alt',
			'instagram',
			'google',
			'github',
			'flickr',
			'facebook',
			'dropbox',
			'dribbble',
			'apple',
			'android',
			'save',
			'save-alt',
			'yahoo',
			'wordpress',
			'vimeo-alt',
			'twitter-alt',
			'tumblr-alt',
			'trello',
			'stack-overflow',
			'soundcloud',
			'sharethis',
			'sharethis-alt',
			'reddit',
			'pinterest-alt',
			'microsoft-alt',
			'linux',
			'jsfiddle',
			'joomla',
			'html5',
			'flickr-alt',
			'email',
			'drupal',
			'dropbox-alt',
			'css3',
			'rss',
			'rss-alt'
		);
		$icons_tabs['ts_themify_icon'] = array(
			'name'          => 'themify',
			'label'         => esc_html__( 'Themify Icons', 'labtechco' ),
		///	'labelIcon'     => 'ts-labtechco-icon ts-labtechco-icon-light',
			'prefix'        => 'ti-',
			'displayPrefix' => 'ti',
			'url'           => THEMESTEK_LABTECHCO_URI . '/icon-picker/icon-libraries/themify-icons/themify-icons.css',
			'icons'         => $ts_themify_icons_array,
			'ver'           => '1.0.0',
		);
	}

	return $icons_tabs;
}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'ts_elementor_add_custom_icons_tab' );

/**
 *  Add base js specially for Elementor
 */
function ts_elementor_enqueue_front_scripts(){
	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script(  'ts-elementor-frontview', get_template_directory_uri() . '/includes/elementor-frontview.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'ts_elementor_enqueue_front_scripts' );

/**
 *  Add base js specially for Elementor core part
 */
function ts_elementor_enqueue_base_scripts(){
	wp_enqueue_script(  'ts-core-script', get_template_directory_uri() . '/js/scripts.js' );
	wp_enqueue_script(  'ts-elementor-base', get_template_directory_uri() . '/includes/elementor-base.js' );
	$file_path = WP_PLUGIN_DIR.'/elementor/assets/lib/font-awesome/css/all.min.css';
	$file_url = plugins_url().'/elementor/assets/lib/font-awesome/css/all.min.css';
	if( file_exists($file_path) ){
		wp_enqueue_style( 'font-awesome-5-all', $file_url );
	}
}
add_action('elementor/editor/before_enqueue_scripts', 'ts_elementor_enqueue_base_scripts');

/**
 * Creating element widgets now
 */
add_action( 'elementor/widgets/register', 'ts_elementor_register_widgets',1,1 );
function ts_elementor_register_widgets() {
    // We check if the Elementor plugin has been installed / activated.
    if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
        // Include Elementor Widget files here.

        // Remove this 2 require_once line below after completed the theme.
        require_once( get_template_directory() . '/includes/elementor/heading-subheading.php' );
        require_once( get_template_directory() . '/includes/elementor/icon-heading.php' );
        require_once( get_template_directory() . '/includes/elementor/multiple-icon-heading.php' );
        require_once( get_template_directory() . '/includes/elementor/blog.php' );
        require_once( get_template_directory() . '/includes/elementor/portfolio.php' );
        require_once( get_template_directory() . '/includes/elementor/service.php' );
        require_once( get_template_directory() . '/includes/elementor/team.php' );
        require_once( get_template_directory() . '/includes/elementor/testimonial.php' );
       	require_once( get_template_directory() . '/includes/elementor/client.php' );
        require_once( get_template_directory() . '/includes/elementor/static-box.php' );
        require_once( get_template_directory() . '/includes/elementor/fid.php' );
		require_once( get_template_directory() . '/includes/elementor/timeline.php' );
		require_once( get_template_directory() . '/includes/elementor/action-box.php' );
        require_once( get_template_directory() . '/includes/elementor/pricing-table.php' );
    }
}

if( !function_exists('ts_link_render') ){
function ts_link_render( $value=array(), $type='start' ) {
	if( !empty($value) && is_array($value) && !empty($value['url']) ){
		if( $type=='start' ){
			$target		= $value['is_external'] ? ' target="_blank"' : '';
			$nofollow	= $value['nofollow'] ? ' rel="nofollow"' : '';
			return themestek_wp_kses( '<a title="'. esc_attr__( 'Link', 'labtechco' ) .'" href="' . $value['url'] . '"' . $target . $nofollow . '><span>' ); 
		} else {
			return themestek_wp_kses( '</span></a>' ); 
		}
	}
}
}

if( !function_exists('ts_iheading_icon') ){
function ts_iheading_icon( $settings, $echo=false ){
	$return = '';
	if( !empty($settings['icon_type']) ){

		switch( $settings['icon_type'] ){

			case 'icon':
				if( !empty($settings['icon']['value']) ){
					$return = '<i class="'.esc_attr( $settings['icon']['value'] ).'"></i>';

				}
				break;

			case 'image':
				if( !empty($settings['icon_image']['url']) ){
					$return = '<img src="'.esc_attr( $settings['icon_image']['url'] ).'" />';
				}
			break;

			case 'text':
				if( !empty($settings['icon_text']) ){
					$return = '<div class="ts-iheading-icontext">'.esc_attr($settings['icon_text']).'</div>';
				}
				break;

		}

	}
	if( !empty($return) ){
		$return = themestek_wp_kses('<div class="ts-iheading-icon ts-iheading-icon-type-'.esc_attr($settings['icon_type']).'">'.$return.'</div>');
	}

	// final output
	if( $echo == true ){
		echo themestek_wp_kses($return);
	} else {
		return themestek_wp_kses($return);
	}

}
}

if( !function_exists('ts_heading_subheading') ){
function ts_heading_subheading( $settings = array(), $echo = false ){

	// Reverse heading class
	$reverse_class = '';
	if( !empty($settings['reverse_title']) && $settings['reverse_title']=='yes' ){
		$reverse_class = 'ts-reverse-heading-yes';
	}

	/// Title Animation Class
	$title_ani_class = ( !empty($settings['title_animation']) ) ? $settings['title_animation'] : '' ; 
	$text_align		= ( !empty($settings['text_align']) ) ? $settings['text_align'] : 'left' ; 

	$return = '	<div class="ts-heading-subheading ' . esc_attr($reverse_class) . ( (!empty($title_ani_class)) ? ' animation-style'.esc_attr($title_ani_class) : '' ) . '" >';

	$title = '';

	// icon
	$return .= ts_iheading_icon($settings);

	// Heading
	if( !empty($settings['title']) ) {
		$title_tag = ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;

		$title .= '<'. themestek_wp_kses($title_tag) . ' class="ts-custom-heading ts-custom-heading-title">
			'.ts_link_render($settings['title_link'], 'start' ).'
				'.themestek_wp_kses($settings['title']).'
			'.ts_link_render($settings['title_link'], 'end' ).'
			</'. themestek_wp_kses($title_tag) . '>
		';
	}

	// Heading before sub-title
	if( empty($settings['reverse_title']) && !empty($title) ){
		$return .= themestek_wp_kses($title);
	}

	// SubTitle
	if( !empty($settings['subtitle']) ) {
		$subtitle_tag	= ( !empty($settings['subtitle_tag']) ) ? $settings['subtitle_tag'] : 'h4' ;
		$subtitle		= '<'. themestek_wp_kses($subtitle_tag) . ' class="ts-custom-heading ts-custom-subtitle">
			'.ts_link_render($settings['subtitle_link'], 'start' ).'
				'.themestek_wp_kses($settings['subtitle']).'
			'.ts_link_render($settings['subtitle_link'], 'end' ).'
			</'. themestek_wp_kses($subtitle_tag) . '>
		';
		$return .= themestek_wp_kses($subtitle);
	}

	// Heading after sub-title
	if( !empty($settings['reverse_title']) && !empty($title) ){
		$return .= themestek_wp_kses($title);
	}

	if( !empty($settings['desc']) ){
		$desc = '<div class="ts-heading-desc">'.themestek_wp_kses($settings['desc']).'</div>';
		$return .= themestek_wp_kses($desc);
	}

	// closing div
	$return .= themestek_wp_kses('</div>');

	// final output
	if( $echo == true ){
		echo themestek_wp_kses($return);
	} else {
		return themestek_wp_kses($return);
	}

}
}

/**
 *  Section options
 */
add_action('elementor/element/section/section_layout/before_section_start', 'ts_elementor_section_options', 10);
if( !function_exists('ts_elementor_section_options') ){
function ts_elementor_section_options( $element ){

	$element->start_controls_section(
		'ts_element_section_title',
		[
			'label' => __('LabtechCO Special Options', 'labtechco'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'ts-extended-column',
		[
			'label'			=> esc_attr__( 'Extend Column for background image', 'labtechco' ),
			'description'	=> esc_attr__( 'Select which column will be extended with background image.', 'labtechco' ),
			'type'			=> 'ts_imgselect',
			'label_block'	=> true,
			'hide_in_inner' => true,
			'thumb_width'	=> '110px',
			'default'		=> 'none',
			'prefix_class'	=> 'ts-col-stretched-',
			'options' => [
				'none'			=> get_template_directory_uri() . '/includes/images/extended-bg-none.png',
				'left'			=> get_template_directory_uri() . '/includes/images/extended-bg-first.png',
				'right'			=> get_template_directory_uri() . '/includes/images/extended-bg-last.png',
				'both'			=> get_template_directory_uri() . '/includes/images/extended-bg-both.png',
			],
		]
	);

	$element->add_control(
		'ts-strech-content-left',
		[
			'label'			=> esc_attr__( 'Also stretch left content too?', 'labtechco' ),
			'description'	=> esc_attr__( 'Also stretch left content too?', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'ts-left-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'labtechco' ),
			'label_off'		=> esc_attr__( 'No', 'labtechco' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'ts-extended-column' => array('left', 'both'),
			]
		]
	);
	$element->add_control(
		'ts-strech-content-right',
		[
			'label'			=> esc_attr__( 'Also stretch right content too?', 'labtechco' ),
			'description'	=> esc_attr__( 'Also stretch right content too?', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'ts-right-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'labtechco' ),
			'label_off'		=> esc_attr__( 'No', 'labtechco' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'ts-extended-column' => array('right', 'both'),
			]
		]
	);

	$element->add_control(
		'ts_bg_color',
		[
			'label'			=> esc_html__( 'Section Background Color', 'labtechco' ),
			'description'	=> esc_html__( 'Pre-defined Background Color for this Section (ROW)', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'separator'		=> 'before',
			'prefix_class'	=> 'ts-bg-color-yes ts-bgcolor-',
			'options'		=> [
				'transparent' 	=> esc_attr__( 'Transparent', 'labtechco' ),
				'white'			=> esc_attr__( 'White', 'labtechco' ),
				'grey'			=> esc_attr__( 'Grey', 'labtechco' ),
				'darkgrey'		=> esc_attr__( 'Dark grey', 'labtechco' ),
				'skincolor'	    => esc_attr__( 'Skincolor', 'labtechco' ),
			],
		]
	);

	$element->add_control(
		'ts_text_color',
		[
			'label'			=> esc_html__( 'Section Text Color', 'labtechco' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Section (ROW)', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'ts-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'labtechco' ),
				'white'		=> __( 'White', 'labtechco' ),
				'dark'	=> __( 'Dark grey', 'labtechco' ),
				'skincolor'	    => esc_attr__( 'Skincolor', 'labtechco' ),
			],
		]
	);

	$element->add_control(
		'ts-bg-image-color-order',
		[
			'label'			=> esc_attr__( 'BG Image - BG Color Order', 'labtechco' ),
			'description'	=> esc_attr__( 'You can show BG image over BG Color or reverse too.', 'labtechco' ),
			'type'			=> 'ts_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '110px',
			'default'		=> 'none',
			'prefix_class'	=> 'ts-bg-',
			'default'		=> 'color-over-image',
			'options'		=> [
				'image-over-color'	=> get_template_directory_uri() . '/includes/images/image-over-color.png',
				'color-over-image'	=> get_template_directory_uri() . '/includes/images/color-over-image.png',
			],
		]
	);

	$element->end_controls_section();
}
}

/**
 * Elementor column options
 */
add_action('elementor/element/column/layout/before_section_start', 'ts_elementor_column_options', 10);
if( !function_exists('ts_elementor_column_options') ){
function ts_elementor_column_options( $element ){

	$element->start_controls_section(
		'ts_element_section_title',
		[
			'label' => __('LabtechCO Special Options', 'labtechco'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'ts_bg_color',
		[
			'label'			=> esc_html__( 'Column Background Color', 'labtechco' ),
			'description'	=> esc_html__( 'Pre-defined Background Color for this Column', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'ts-bg-color-yes ts-bgcolor-',
			'options' => [
	
				'transparent' 	=> esc_attr__( 'Transparent', 'labtechco' ),
				'white'			=> esc_attr__( 'White', 'labtechco' ),
				'grey'			=> esc_attr__( 'Grey', 'labtechco' ),
				'darkgrey'		=> esc_attr__( 'Dark grey', 'labtechco' ),
				'skincolor'	    => esc_attr__( 'Skincolor', 'labtechco' ),
			],
		]
	);

	$element->add_control(
		'ts_text_color',
		[
			'label'			=> esc_html__( 'Column Text Color', 'labtechco' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Column', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'ts-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'labtechco' ),
				'white'		=> __( 'White', 'labtechco' ),
				'darkgrey'	=> __( 'Dark grey', 'labtechco' ),
			],
		]
	);

	$element->add_control(
		'ts-bg-image-color-order',
		[
			'label'			=> esc_attr__( 'BG Image - BG Color Order', 'labtechco' ),
			'description'	=> esc_attr__( 'You can show BG image over BG Color or reverse too.', 'labtechco' ),
			'type'			=> 'ts_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '110px',
			'default'		=> 'none',
			'prefix_class'	=> 'ts-bg-',
			'default'		=> 'color-over-image',
			'options'		=> [
				'image-over-color'	=> get_template_directory_uri() . '/includes/images/image-over-color.png',
				'color-over-image'	=> get_template_directory_uri() . '/includes/images/color-over-image.png',
			],
		]
	);

	$element->end_controls_section();
}
}

/**
 * Elementor button options
 */
add_action('elementor/element/button/section_button/before_section_start', 'ts_elementor_button_options', 10);
if( !function_exists('ts_elementor_button_options') ){
function ts_elementor_button_options( $element ){

	$element->start_controls_section(
		'ts_element_section_title',
		[
			'label' => __('LabtechCO Special Options', 'labtechco'),
			'tab' => Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	$element->add_control(
		'ts-btn-color',
		[
			'label'			=> esc_html__( 'Button Color', 'labtechco' ),
			'description'	=> esc_html__( 'Pre-defined Color for Button', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'skincolor',
			'label_block'	=> true,
			'prefix_class'	=> 'ts-btn-color-',
			'options' => [
				'white'			=> esc_attr__( 'White', 'labtechco' ),
				'light'			=> esc_attr__( 'Light', 'labtechco' ),
				'skincolor'	=> esc_attr__( 'Skincolor', 'labtechco' ),
				'secondary'		=> esc_attr__( 'Secondary Color', 'labtechco' ),
				'gradient'		=> esc_attr__( 'Gradient Color', 'labtechco' ),
			],
		]
	);
	$element->add_control(
		'ts-btn-style',
		[
			'label'			=> esc_html__( 'Select Button Style', 'labtechco' ),
			'description'	=> esc_html__( 'Button style', 'labtechco' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'flat',
			'label_block'	=> true,
			'prefix_class'	=> 'ts-btn-style-',
			'options' => [
				'flat' 			=> esc_attr__( 'Flat', 'labtechco' ),
				'outline'		=> esc_attr__( 'Outline', 'labtechco' ),
				'text'			=> esc_attr__( 'Normal text link', 'labtechco' ),
			],
		]
	);
	$element->add_control(
		'ts-btn-shape-flat',
		[
			'label'			=> esc_attr__( 'Select Flat Button Shape', 'labtechco' ),
			'description'	=> esc_attr__( 'Slect Button Shape.', 'labtechco' ),
			'type'			=> 'ts_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '220px',
			'default'		=> 'square',
			'prefix_class'	=> 'ts-btn-shape-',
			'options' => [
				'square'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-flat-square.jpg' ),
				'round'			=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-flat-round.jpg' ),
				'rounded'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-flat-rounded.jpg' ),
			],
			'condition' => [
				'ts-btn-style' => 'flat',
			]
		]
	);
	$element->add_control(
		'ts-btn-shape-outline',
		[
			'label'			=> esc_attr__( 'Select Outline Button Style', 'labtechco' ),
			'description'	=> esc_attr__( 'Slect Button style.', 'labtechco' ),
			'type'			=> 'ts_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '220px',
			'default'		=> 'square',
			'prefix_class'	=> 'ts-btn-shape-',
			'options' => [
				'square'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-outline-square.jpg' ),
				'round'			=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-outline-round.jpg' ),
				'rounded'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-outline-rounded.jpg' ),
			],
			'condition' => [
				'ts-btn-style' => 'outline',
			]
		]

	);

	$element->end_controls_section();
}
}