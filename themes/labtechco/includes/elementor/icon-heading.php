<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class TS_IconHeading extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_icon_heading';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'LabtechCO Icon Heading Element', 'labtechco' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-star';
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
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'labtechco' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'labtechco' ),
					'image'	=> esc_attr__( 'Image', 'labtechco' ),
					'text'	=> esc_attr__( 'Text', 'labtechco' ),
					'none'	=> esc_attr__( 'None', 'labtechco' ),
				],
				'default' => esc_attr( 'icon' ),
			]
		);
        $this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'labtechco' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ts-labtechco-business-icon ts-labtechco-business-icon-flask',
					'library' => 'flaticon',
				],
		
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);

        $this->add_control(
			'icon_image',
			[
				'label' => __( 'Select Image for Icon', 'labtechco' ),
				'description' => __( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'labtechco' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ]
			]
		);
        $this->add_control(
			'icon_text',
			[
				'label' => esc_attr__( 'Text for Icon', 'labtechco' ),
				'description' => esc_attr__( 'The text will appear at icon position. This should be small text like "01" or "PX"', 'labtechco' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'labtechco' ),
				'placeholder' => esc_attr__( 'Enter text here', 'labtechco' ),
                'label_block' => true,
                'condition' => [
                    'icon_type' => 'text',
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
			'big_number_text',
			[
				'label' => esc_attr__( 'Big Number After icon', 'labtechco' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( '01', 'labtechco' ),
				'condition' => [
					'boxstyle' => 'style-4',
				]
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
			]
		);

		$this->add_control(
			'btn_title',
			[
				'label' => esc_attr__( 'Button Title', 'labtechco' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Read More', 'labtechco' ),
				'separator'		=> 'before',
				'placeholder' => esc_attr__( 'Enter button title here', 'labtechco' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'labtechco' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
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
				'label'			=> esc_attr__( 'Select Icon Heading View Style', 'labtechco' ),
				'description'	=> esc_attr__( 'Slect Icon Heading View style.', 'labtechco' ),
				'type'			=> 'ts_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'style-1',
				'prefix'		=> 'ts-ihbox ts-ihbox-style-',
				'options'		=> themestek_global_template_list( 'iconheadingbox', 'elementor' ),
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
						'{{WRAPPER}} .ts-ihbox-subheading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ts-ihbox-subheading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ts-ihbox-subheading',
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
						'{{WRAPPER}} .ts-ihbox-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .ts-element-subheading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ts-element-subheading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'stitle_typography',
					'selector' => '{{WRAPPER}} .ts-element-subheading',
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
						'{{WRAPPER}} .ts-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .ts-ihbox-content' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .ts-ihbox-content',
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
						'{{WRAPPER}} .ts-ihbox-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		extract($settings);
		$return = '';
		$icon_html = $heading_html = $subheading_html = $content_html = $nav_html = $button_html = $box_number_html = $bignumber_html = '';

		global $ts_global_sbox_element_values;
		$ts_global_sbox_element_values = array();



		if( !empty($box_number) ){
			$box_number_html = '<div class="ts-ihbox-box-number">'.esc_attr($box_number).'</div>';
		}

		if( file_exists( locate_template( '/theme-parts/iconheadingbox/iconheadingbox-'.esc_attr($boxstyle).'.php', false, false ) ) ){
			$icon_type_class = '';
			
			if( !empty($settings['icon_type']) ){

				if( $settings['icon_type']=='text' ){
					$icon_html = '<div class="ts-ihbox-icon"><div class="ts-ihbox-icon-wrapper ts-ihbox-icon-type-text" data-text="' . $settings['icon_text'] . '">' . $settings['icon_text'] . '</div></div>';
					$icon_type_class = 'text';

				} else if( $settings['icon_type']=='image' ){
					$icon_alt	= (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Icon', 'labtechco') ;
					$icon_image = '<img src="'.esc_url($settings['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
					$icon_html	= '<div class="ts-ihbox-icon"><div class="ts-ihbox-icon-wrapper ts-ihbox-icon-type-image">' . $icon_image . '</div></div>';
					$icon_type_class = 'image';
				} else if( $settings['icon_type']=='none' ){
					$icon_html = '';
					$icon_type_class = 'none';
				} else {

					// This is real icon html code
					$icon_html       = '<div class="ts-ihbox-icon"><div class="ts-ihbox-icon-wrapper"><i class="' . $settings['icon']['value'] . '"></i></div></div>';
					$icon_type_class = 'icon';

					wp_enqueue_style( 'elementor-icons-'.$settings['icon']['library']);
				}
			}
			// SubTitle
			if( !empty($settings['subtitle']) ) {
				$subtitle_tag	= ( !empty($settings['subtitle_tag']) ) ? $settings['subtitle_tag'] : 'h4' ;
				$subheading_html	= '<'. themestek_wp_kses($subtitle_tag) . ' class="ts-ihbox-subheading">
					'.ts_link_render($settings['subtitle_link'], 'start' ).'
						'.themestek_wp_kses($settings['subtitle']).'
					'.ts_link_render($settings['subtitle_link'], 'end' ).'
					</'. themestek_wp_kses($subtitle_tag) . '>
				';
			}

			// Title
			if( !empty($settings['title']) ) {
				$title_tag	= ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;
				$heading_html	= '<'. themestek_wp_kses($title_tag) . ' class="ts-ihbox-heading">
					'.ts_link_render($settings['title_link'], 'start' ).'
						'.themestek_wp_kses($settings['title']).'
					'.ts_link_render($settings['title_link'], 'end' ).'
					</'. themestek_wp_kses($title_tag) . '>
					'.$subheading_html.'
				';
			}


			// Description text
			if( !empty($settings['desc']) ){
				$content_html = '<div class="ts-ihbox-content">'.themestek_wp_kses($settings['desc']).'</div>';
			}

			// BigNumber
			if( !empty($big_number_text) ){
				$bignumber_html = '<div class="ts-ihbox-big-number-text">' . $big_number_text . '</div>';
			}
			
			
			$mainclass	= '';
			$with_nav 	= '';

			// Button
			if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
				$button_html = '<div class="ts-ihbox-btn">' . ts_link_render($settings['btn_link'], 'start' ) . themestek_wp_kses($settings['btn_title']) . ts_link_render($settings['btn_link'], 'end' ) . '</div>';
			}

			// storing in global varibales to be used in template file
			$ts_global_sbox_element_values['boxstyle']		= $boxstyle;
			$ts_global_sbox_element_values['icon_html']		= $icon_html;
			$ts_global_sbox_element_values['image']		    = $icon_image;
			$ts_global_sbox_element_values['heading_html']	= $heading_html;
			$ts_global_sbox_element_values['content_html']	= $content_html;
			$ts_global_sbox_element_values['button_html']	= $button_html;
			$ts_global_sbox_element_values['bignumber_html']	= $bignumber_html;
			$ts_global_sbox_element_values['main-class']	= 'ts-ihbox-itype-'.$icon_type_class; // Extra field

			include( locate_template( '/theme-parts/iconheadingbox/iconheadingbox-'.esc_attr($boxstyle).'.php', false, false ) );
		}

	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new TS_IconHeading() );