<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class TS_FIDElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_fid_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Labtechco Facts-in-Digits Element', 'labtechco' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-sync-alt';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'labtechco_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'vc_waypoints' );
		wp_enqueue_script( 'numinate' );
		wp_enqueue_script( 'jquery-circle-progress' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content Options', 'labtechco' ),
			]
        );

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'labtechco' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
                ],
            ]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_attr__( 'Subtitle', 'labtechco' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'This is subtitle', 'labtechco' ),
				'placeholder' => esc_attr__( 'Enter your subtitle', 'labtechco' ),
				'label_block' => true,
				'condition' => [
					'boxstyle' => 'style-14',
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_attr__( 'Title', 'labtechco' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Welcome to our site', 'labtechco' ),
				'placeholder' => esc_attr__( 'Enter your title', 'labtechco' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'labtechco' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Type your description here', 'labtechco' ),
				'condition' => [
					'boxstyle' => ['style-8', 'style-9', 'style-11', 'style-14'],
				]
			]
		);

		$this->add_control(
			'digit',
			[
				'label' => esc_attr__( 'Rotating Digit', 'labtechco' ),
				'description' => esc_attr__( 'Enter rotating number digit here.', 'labtechco' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '85',
			]
		);

		$this->add_control(
			'interval',
			[
				'label' => esc_attr__( 'Rotating digit Interval', 'labtechco' ),
				'description' => esc_attr__( 'Enter rotating interval number here.', 'labtechco' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '5',
			]
		);

		$this->add_control(
			'before',
			[
				'label' => esc_attr__( 'Text Before Number (Prefix)', 'labtechco' ),
				'description' => esc_attr__( 'Enter text which appear just before the rotating numbers.', 'labtechco' ),
				'separator' => 'before',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'beforetextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'labtechco' ),
				'description' => esc_attr__('Select text style for the text.', 'labtechco') . '<br>' . esc_attr__('Superscript Example:','labtechco') . themestek_wp_kses('X<sup>2</sup>')  . '<br>' . esc_attr__('Subscript Example:','labtechco') . themestek_wp_kses('X<sub>2</sub>'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'labtechco' ),
					'sub'		=> esc_attr__( 'Subscript', 'labtechco' ),
					'span'		=> esc_attr__( 'Normal', 'labtechco' ),
				]
			]
		);

		$this->add_control(
			'after',
			[
				'label' => esc_attr__( 'Text After Number (Suffix)', 'labtechco' ),
				'description' => esc_attr__( 'Enter text which appear just after the rotating numbers.', 'labtechco' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'aftertextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'labtechco' ),
				'description' => esc_attr__('Select text style for the text.', 'labtechco') . '<br>' . esc_attr__('Superscript Example:','labtechco') . themestek_wp_kses('X<sup>2</sup>')  . '<br>' . esc_attr__('Subscript Example:','labtechco') . themestek_wp_kses('X<sub>2</sub>'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'labtechco' ),
					'sub'		=> esc_attr__( 'Subscript', 'labtechco' ),
					'span'		=> esc_attr__( 'Normal', 'labtechco' ),
				]
			]
		);

		$this->end_controls_section();

		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Select Style', 'labtechco' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'boxstyle',
			[
				'label'			=> esc_attr__( 'Select FID View Style', 'labtechco' ),
				'description'	=> esc_attr__( 'Slect FID View style.', 'labtechco' ),
				'type'			=> 'ts_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'style-1',
				'prefix'		=> 'ts-fid ts-fid-style-',
				'options'		=> themestek_global_template_list( 'fidbox', true ),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$return = $icon = '';

		// This global variable will be used in template file for design
		global $ts_global_fid_element_values;
		$ts_global_fid_element_values = array();

		$skincolor = themestek_get_option('skincolor');


		//  Icon
		if( !empty($settings['icon']['value']) ){ 
			//wp_enqueue_style($i_type);
			$icon = '<div class="ts-sbox-icon-wrapper"><i class="' . esc_attr($settings['icon']['value']) . '"></i></div>';
			wp_enqueue_style( 'elementor-icons-'.$settings['icon']['library']);
		} 

		$class   = array();
		if( !empty($boxstyle) ){
			$class[] = 'ts-fidbox-'.$boxstyle;
		}
		

		//  Before or after text
		$before_text = '';
		$after_text  = '';
		if( !empty($before) && !empty($beforetextstyle) && in_array( $beforetextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$before_text = '<'. esc_attr($beforetextstyle).'>'.esc_html($before).'</'.esc_attr($beforetextstyle).'>';
		}
		if( !empty($after) && !empty($aftertextstyle) && in_array( $aftertextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$after_text = '<'. esc_attr($aftertextstyle).'>'.esc_html($after).'</'.esc_attr($aftertextstyle).'>';
		}

		$ts_global_fid_element_values['subtitle']         = $subtitle;
		$ts_global_fid_element_values['title']         = $title;
		$ts_global_fid_element_values['desc']         = $desc;
		$ts_global_fid_element_values['icon_html']     = $icon;
		$ts_global_fid_element_values['main-class']    = implode(' ', $class);
		$ts_global_fid_element_values['skincolor']     = $skincolor;
		
		$ts_global_fid_element_values['before_text']     = $before_text;
		$ts_global_fid_element_values['beforetextstyle'] = $beforetextstyle;
		
		$ts_global_fid_element_values['after_text']      = $after_text;
		$ts_global_fid_element_values['aftertextstyle']  = $aftertextstyle;
		
		$ts_global_fid_element_values['digit']         = $digit;
		$ts_global_fid_element_values['interval']      = $interval;

		if( file_exists( locate_template( '/theme-parts/fidbox/fidbox-'.esc_attr($boxstyle).'.php', false, false ) ) ){

			$return .= '<div class="themestek-ele themestek-ele-fidbox themestek-ele-fidbox-'.esc_attr($boxstyle).' ">';

			ob_start();
			include( locate_template( '/theme-parts/fidbox/fidbox-'.esc_attr($boxstyle).'.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

			$return .= '</div>';

		}

		echo themestek_wp_kses($return);

	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new TS_FIDElement() );