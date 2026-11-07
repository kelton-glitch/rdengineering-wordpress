<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class TS_Heading extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_heading';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'LabtechCO Heading & Subheading Element', 'labtechco' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-heading';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'labtechco_category' ];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Content', 'labtechco' ),
			]
		);
		$this->add_control(
			'title_animation',
			[
				'label' 		=> esc_attr__( 'Title Animation', 'labtechco' ),
				'description'	=> esc_attr__( 'Select Title Text Animation View style', 'labtechco' ),
				'type' 	  		=> Controls_Manager::SELECT,
				'options' 		=> [
					'4'	=> esc_attr( 'No animation' ),
					'1'	=> esc_attr( 'Animation Style 1' ),
					'2'	=> esc_attr( 'Animation Style 2' ),
					'3'	=> esc_attr( 'Animation Style 3' ),
				],
				'default' 		=> esc_attr( '4' ),
				'separator'		=> 'before',
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
				'label' => esc_attr__( 'Title Link', 'labtechco' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
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
				'default' => esc_attr__( 'This is Subtitle', 'labtechco' ),
				'placeholder' => esc_attr__( 'Enter your subtitle', 'labtechco' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label' => esc_attr__( 'Subtitle Link', 'labtechco' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'labtechco' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Type your description here', 'labtechco' ),
			]
		);
		$this->add_control(
			'reverse_title',
			[
				'label' => esc_attr__( 'Reverse Heading', 'labtechco' ),
				'description' => esc_attr__( 'Show sub-title before title', 'labtechco' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'labtechco' ),
				'label_off' => esc_attr__( 'No', 'labtechco' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'txt_align',
			[
				'label' => esc_attr__( 'Alignment', 'labtechco' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_attr__( 'Left', 'labtechco' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'labtechco' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'labtechco' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'ts-align-',
				'selectors' => [
					'{{WRAPPER}} .ts-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => 'left',
			]
		);

		// Tags
		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'labtechco' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_attr__( 'Title Tag', 'labtechco' ),
				'type' => Controls_Manager::SELECT,
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
				'label' => esc_attr__( 'SubTitle Tag', 'labtechco' ),
				'type' => Controls_Manager::SELECT,
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

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Typo Settings', 'labtechco' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			//Title
			$this->add_control(
				'heading_title',
				[
					'label' => esc_attr__( 'Title', 'labtechco' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_attr__( 'Color', 'labtechco' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ts-custom-heading.ts-custom-heading-title ' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ts-custom-heading.ts-custom-heading-title  > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ts-custom-heading.ts-custom-heading-title ',
				]
			);
			$this->add_responsive_control(
				'title_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'labtechco' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ts-custom-heading.ts-custom-heading-title ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			//Subtitle
			$this->add_control(
				'heading_stitle',
				[
					'label' => esc_attr__( 'Subtitle', 'labtechco' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'stitle_color',
				[
					'label' => esc_attr__( 'Color', 'labtechco' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ts-custom-heading.ts-custom-subtitle' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ts-custom-heading.ts-custom-subtitle > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'stitle_typography',
					'selector' => '{{WRAPPER}} .ts-custom-heading.ts-custom-subtitle',
				]
			);
			$this->add_responsive_control(
				'stitle_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'labtechco' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ts-custom-heading.ts-custom-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Description
			$this->add_control(
				'heading_desc',
				[
					'label' => esc_attr__( 'Description', 'labtechco' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'desc_color',
				[
					'label' => esc_attr__( 'Color', 'labtechco' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ts-heading-desc' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .ts-heading-desc',
				]
			);
			$this->add_responsive_control(
				'desc_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'labtechco' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ts-heading-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		ts_heading_subheading($settings, true);
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new TS_Heading() );