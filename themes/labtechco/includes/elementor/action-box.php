<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading
 */
class TS_ActionBox extends Widget_Base{

// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
public function get_name() {
	return 'ts_action_box_element';
}

// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
public function get_title() {
	return esc_attr__( 'LabtechCO Action Box', 'labtechco' );
}

// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
public function get_icon() {
	return 'fas fa-edit';
}

// The get_categories method, lets you set the category of the widget, return the category name as a string.
public function get_categories() {
	return [ 'labtechco_category' ];
}

public function __construct($data = [], $args = null) {
	parent::__construct($data, $args);
}

protected function register_controls() {

	//Content Service box
	$this->start_controls_section(
		'content_section',
		[
			'label'   => esc_attr__( 'Action Box Content', 'labtechco' ),
		]
	);
	$this->add_control(
		'icon_image',
		[
			'label' 	  => esc_attr__( 'Select BG Image for Sprite Effect', 'labtechco' ),
			'description' => esc_attr__( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'labtechco' ),
			'type'		  => \Elementor\Controls_Manager::MEDIA,
			'default' 	  => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
			],
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
		'title_link',
		[
			'label' 	  => esc_attr__( 'Title Link', 'labtechco' ),
			'type'  	  => Controls_Manager::URL,
			'label_block' => true,
		]
	);
	$this->add_control(
		'subtitle',
		[
			'label'   => esc_attr__( 'Subtitle', 'labtechco' ),
			'type' 	  => Controls_Manager::TEXTAREA,
			'dynamic' => [
				'active' => true,
			],
			'default' 	  => esc_attr__( 'This is Subtitle', 'labtechco' ),
			'placeholder' => esc_attr__( 'Enter your subtitle', 'labtechco' ),
			'label_block' => true,
		]
	);

	$this->add_control(
		'btn_title1',
		[
			'label'   => esc_attr__( 'Button Title1', 'labtechco' ),
			'type' 	  => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			],
			'default' 	  => esc_attr__( 'Read More', 'labtechco' ),
			'separator'	  => 'before',
			'placeholder' => esc_attr__( 'Enter button title here', 'labtechco' ),
			'label_block' => true,
		]
	);
	$this->add_control(
		'btn_link1',
		[
			'label' 	  => esc_attr__( 'Button Link1', 'labtechco' ),
			'type'		  => Controls_Manager::URL,
			'label_block' => true,
		]
	);

	$this->add_control(
		'btn_title2',
		[
			'label'   => esc_attr__( 'Button Title2', 'labtechco' ),
			'type' 	  => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			],
			'default' 	  => esc_attr__( 'Read More', 'labtechco' ),
			'separator'	  => 'before',
			'placeholder' => esc_attr__( 'Enter button title here', 'labtechco' ),
			'label_block' => true,
			'condition'  => [
				'style!' => ['1','3'],
			],
		]
	);
	$this->add_control(
		'title_tag',
		[
			'label'   => esc_attr__( 'Title Tag', 'labtechco' ),
			'type'	  => Controls_Manager::SELECT,
			'options' => [
				'h1'	=> esc_attr( 'H1' ),
				'h2'	=> esc_attr( 'H2' ),
				'h3'	=> esc_attr( 'H3' ),
				'h4'	=> esc_attr( 'H4' ),
				'h5'	=> esc_attr( 'H5' ),
				'h6'	=> esc_attr( 'H6' ),
				'div'	=> esc_attr( 'DIV' ),
			],
			'default' => esc_attr( 'h2' ),
		]
	);
	$this->add_control(
		'subtitle_tag',
		[
			'label'   => esc_attr__( 'SubTitle Tag', 'labtechco' ),
			'type' 	  => Controls_Manager::SELECT,
			'options' => [
				'h1'	=> esc_attr( 'H1' ),
				'h2'	=> esc_attr( 'H2' ),
				'h3'	=> esc_attr( 'H3' ),
				'h4'	=> esc_attr( 'H4' ),
				'h5'	=> esc_attr( 'H5' ),
				'h6'	=> esc_attr( 'H6' ),
				'div'	=> esc_attr( 'DIV' ),
			],
			'default' => esc_attr( 'h4' ),
		]
	);

	$this->end_controls_section();

	// Style
	$this->start_controls_section(
		'select_style_section',
		[
			'label' => esc_attr__( 'Select Style', 'labtechco' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		]
	);
	$this->add_control(
		'boxstyle',
		[
			'label'			=> esc_attr__( 'Select Actionbox View Style', 'labtechco' ),
			'description'	=> esc_attr__( 'Select Actionbox View style.', 'labtechco' ),
			'type'			=> 'ts_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '110px',
			'default'		=> 'style-1',
			'prefix'		=> 'ts-action-box ts-action-box-style-',
			'options'		=> themestek_global_template_list( 'actionbox', true ),
		]
	);
	$this->end_controls_section();
}

protected function render() {

	$settings = $this->get_settings_for_display();
	extract($settings);

	$title_html = $subtitle_html =  $image_html = $button_html1 = $button_html2 = '';

	if( file_exists( locate_template( '/theme-parts/action-box/action-box-'.esc_attr($boxstyle).'.php', false, false ) ) ){
		//image
		if( $settings['icon_image']){
			$icon_alt	 = (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Sprite-img', 'labtechco') ;
			$image_html  = '<img src="'.$settings['icon_image']['url'].'" alt="'.esc_attr($icon_alt).'" />';
		}
		
		//Img URL
		$full_img = $settings['icon_image']['url'];

		// Title
		if( !empty($settings['title']) ) {
			$title_tag	= ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;
			$title_html	= '<'. themestek_wp_kses($title_tag) . ' class="ts-element-title">
				'.ts_link_render($settings['title_link'], 'start' ).''.themestek_wp_kses($settings['title']).''.ts_link_render($settings['title_link'], 'end' ).'</'. themestek_wp_kses($title_tag) . '>';
		}

		// SubTitle
		if( !empty($settings['subtitle']) ) {
			$subtitle_tag	= ( !empty($settings['subtitle_tag']) ) ? $settings['subtitle_tag'] : 'h4' ;
			$subtitle_html	='<'. themestek_wp_kses($subtitle_tag) . ' class="ts-element-subtitle">'.themestek_wp_kses($settings['subtitle']).'</'. themestek_wp_kses($subtitle_tag).'>';
		}

		// Button 1
		if( !empty($settings['btn_title1']) && !empty($settings['btn_link1']['url']) ){
			$button_html1 = '<div class="ts-svg-btn ts-btn ts-box-btn-1">' . ts_link_render($settings['btn_link1'], 'start' ) . themestek_wp_kses($settings['btn_title1']) . '<i class="ts-labtechco-icon-arrow-right"></i></div>'.ts_link_render($settings['btn_link1'], 'end' );
		}

		echo '<div class="ts-action-box ts-action-box-'.esc_attr($boxstyle).'">';
			include( locate_template( '/theme-parts/action-box/action-box-'.esc_attr($boxstyle).'.php', false, false ) );
		echo '</div>';
	}
}

protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new TS_ActionBox() );

