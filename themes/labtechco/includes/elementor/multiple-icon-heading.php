<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class TS_MultipleIconHeading extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_multiple_icon_heading';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'LabtechCO Multiple Icon Heading Element', 'labtechco' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-grip-horizontal';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'labtechco_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_style( 'nivo-slider-css' );
		wp_enqueue_style( 'nivo-slider-theme' );
	}

	protected function register_controls() {

		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'labtechco' ),
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
				'label' => esc_attr__( 'Reverse Title', 'labtechco' ),
				'description' => esc_attr__( 'Show sub-title before title', 'labtechco' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'labtechco' ),
				'label_off' => esc_attr__( 'No', 'labtechco' ),
				'return_value' => 'yes',
				'default'		=> '',
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

		//Content
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Data Options', 'labtechco' ),
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
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
        $repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'labtechco' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);
		$repeater->add_control(
			'box_number',
			[
				'label' => esc_attr__( 'Box Number', 'labtechco' ),
				'description' => esc_attr__( '(Optional) Add box number like "01". This will be shown as steps.', 'labtechco' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'placeholder' => esc_attr__( 'Enter number', 'labtechco' ),
                'label_block' => true,
                'condition' => [
                    'icon_type' => 'icon',
                ]
			]
		);

        $repeater->add_control(
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
        $repeater->add_control(
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

		$repeater->add_control(
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
		$repeater->add_control(
			'title_link',
			[
				'label' => esc_attr__( 'Title Link', 'labtechco' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'subtitle_link',
			[
				'label' => esc_attr__( 'Subtitle Link', 'labtechco' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$repeater->add_control(
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

		$repeater->add_control(
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
		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'labtechco' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		// Tags
		$repeater->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'labtechco' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
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

            /******************** */

			$this->add_control(
			'ihboxes',
			[
				'label'			=> esc_attr__( 'Each Icon Heading Box', 'labtechco' ),
				'type'			=> Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'title_field'   => '{{{ title }}}',
				'default'		=> array (
					array (
						'_id'			=> rand(100,999) . rand(100,999) . 'd' ,
						'icon'			=> array (
							'value'			=> 'far fa-check-circle',
							'library'		=> 'fa-regular',
						),
						'title'			=> esc_attr__('Welcome to our site', 'labtechco'),
						'subtitle'		=> esc_attr__('This is subtitle', 'labtechco'),
						'btn_title'		=> esc_attr__('Read More', 'labtechco'),
						'box_number'	=> '',
						
						'title_link'	=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),
						
						'subtitle_link'	=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						),
						'desc'			=> '',
					
						'btn_link'		=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),
						'title_tag'		=> 'h2',
						'subtitle_tag'	=> 'h4',
					),
					array (
						'_id'			=> rand(100,999) . rand(100,999) . 'd' ,
						'icon'			=> array (
							'value'			=> 'far fa-calendar-minus',
							'library'		=> 'fa-regular',
						),
						'title'			=> esc_attr__('Welcome to our site', 'labtechco'),
						'subtitle'		=> esc_attr__('This is subtitle', 'labtechco'),
						'btn_title'		=> esc_attr__('Read More', 'labtechco'),
						'box_number'	=> '',
					
						'title_link'	=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),
						
						'subtitle_link'	=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						),
						'desc'			=> '',
						
						'btn_link'		=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),
						'title_tag'		=> 'h2',
						'subtitle_tag'	=> 'h4',
					),
					array (
						'_id'			=> rand(100,999) . rand(100,999) . 'd' ,
						'icon'			=> array (
							'value'			=> 'far fa-hand-peace',
							'library'		=> 'fa-regular',
						),
						'title'			=> esc_attr__('Welcome to our site', 'labtechco'),
						'subtitle'		=> esc_attr__('This is subtitle', 'labtechco'),
						'btn_title'		=> esc_attr__('Read More', 'labtechco'),
						'box_number'	=> '',
						
						'title_link'	=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),
						
						'subtitle_link'	=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						),
						'desc'			=> '',
						
						'btn_link'		=> array (
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),
						'title_tag'		=> 'h2',
						'subtitle_tag'	=> 'h4',
					),
				),
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

		// Appearance
		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Column and Carousel Options', 'labtechco' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'		=> [
					'boxstyle!'		=> 'style-15',
				]
			]
		);
		$this->add_control(
			'boxview',
			[
				'label'			=> esc_attr__( 'How you like to view each Post box?', 'labtechco' ),
				'description'	=> esc_attr__( 'Show as carousel view or simple row-column view.', 'labtechco' ),
				'type'			=> 'ts_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'row-column',
				'options'		=> [
					'row-column'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				]
			]
		);

		// Row Column: Heading
		$this->add_control(
			'row_col_options',
			[
				'label' => esc_attr__( 'Row-Column Options', 'labtechco' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'boxview' => 'row-column',
				]
			]
		);

		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label' => esc_attr__( 'Carousel Options', 'labtechco' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'boxview' => 'carousel',
				]
			]
		);
		// Carousel : Loop
		$this->add_control(
			'carousel_loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop', 'labtechco' ),
				'description'	=> esc_attr__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'labtechco' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'labtechco' ),
					'0'				=> esc_attr__( 'No', 'labtechco' ),
				],
				'condition'		=> [
					'boxview'		=> 'carousel',
				]
			]
		);
		// Carousel : Autoplay
		$this->add_control(
			'carousel_autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'labtechco' ),
				'description'	=> esc_attr__( 'Autoplay of carousel.', 'labtechco' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'labtechco' ),
					'0'				=> esc_attr__( 'No', 'labtechco' ),
				],
				'condition'		=> [
					'boxview'		=> 'carousel',
				]
			]
		);
		// Carousel : Center
		$this->add_control(
			'carousel_center',
			[
				'label'			=> esc_attr__( 'Carousel: Center', 'labtechco' ),
				'description'	=> esc_attr__( 'Center item. Works well with even an odd number of items.', 'labtechco' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'labtechco' ),
					'0'				=> esc_attr__( 'No', 'labtechco' ),
				],
				'condition'		=> [
					'boxview'		=> 'carousel',
				]
			]
		);
		// Carousel : Nav
		$this->add_control(
			'carousel_nav',
			[
				'label'			=> esc_attr__( 'Carousel: Nav', 'labtechco' ),
				'description'	=> esc_attr__( 'Show next/prev buttons.', 'labtechco' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'hide',
				'options'		=> [
					'above'				=> esc_attr__( 'Above Carouse', 'labtechco' ),
					'below'				=> esc_attr__( 'Below Carouse', 'labtechco' ),
					'1'				=> esc_attr__( 'Before / After boxes', 'labtechco' ),
					'hide'				=> esc_attr__( 'Hide', 'labtechco' ),
				],
				'condition'		=> [
					'boxview'		=> 'carousel',
				]
			]
		);
		// Carousel : Dots
		$this->add_control(
			'carousel_dots',
			[
				'label'			=> esc_attr__( 'Carousel: Dots', 'labtechco' ),
				'description'	=> esc_attr__( 'Show dots navigation.', 'labtechco' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'labtechco' ),
					'0'				=> esc_attr__( 'No', 'labtechco' ),
				],
				'condition'		=> [
					'boxview'		=> 'carousel',
				]
			]
		);
		// Carousel : autoplaySpeed
		$this->add_control(
			'carousel_autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'labtechco' ),
				'description'	=> esc_attr__( 'autoplay speed.', 'labtechco' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '1000',
				'condition'		=> [
					'boxview'		=> 'carousel',
				]
			]
		);

		// column
		$this->add_control(
			'column',
			[
				'label'			=> esc_attr__( 'View in Column', 'labtechco' ),
				'description'	=> esc_attr__( 'Select how many column to show.', 'labtechco' ),
				'type'			=> 'ts_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'three',
				'options'		=> [
					'one'				=> esc_url( get_template_directory_uri() . '/includes/images/column-1.png' ),
					'two'				=> esc_url( get_template_directory_uri() . '/includes/images/column-2.png' ),
					'three'				=> esc_url( get_template_directory_uri() . '/includes/images/column-3.png' ),
					'four'				=> esc_url( get_template_directory_uri() . '/includes/images/column-4.png' ),
					'five'				=> esc_url( get_template_directory_uri() . '/includes/images/column-5.png' ),
					'six'				=> esc_url( get_template_directory_uri() . '/includes/images/column-6.png' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		$start_div = '';
		$end_div = '';

		// Starting container
		$start_div .= themestek_box_wrapper( 'start', 'miconheading', get_defined_vars() );

		echo themestek_wp_kses($start_div);

		?>

		<div class="ts-ele-header-area">
			<?php ts_heading_subheading($settings, true); ?>
		</div>

		<div class="row multi-columns-row themestek-boxes-row-wrapper">

		<?php

        foreach( $ihboxes as $box ){

			$box['boxstyle'] = $boxstyle;

			// Template
			if( file_exists( locate_template( '/theme-parts/iconheadingbox/iconheadingbox-'.esc_attr($boxstyle).'.php', false, false ) ) ){

				echo themestek_wp_kses( ts_element_block_container( array(
					'position'	=> 'start',
					'column'	=> $column,
					'cpt'		=> 'miconheading',
					'taxonomy'	=> 'category',
					'style'		=> $boxstyle,
				) ) );
				
				extract($box);
				$icon_html = $heading_html = $subheading_html = $content_html = $nav_html = $button_html = $box_number_html = $bignumber_html = '';

				global $ts_global_sbox_element_values;
				$ts_global_sbox_element_values = array();



				if( !empty($box_number) ){
					$box_number_html = '<div class="ts-ihbox-box-number">'.esc_attr($box_number).'</div>';
				}

				if( file_exists( locate_template( '/theme-parts/iconheadingbox/iconheadingbox-'.esc_attr($boxstyle).'.php', false, false ) ) ){
					$icon_type_class = '';
					
					if( !empty($box['icon_type']) ){

						if( $box['icon_type']=='text' ){
							$icon_html = '<div class="ts-ihbox-icon"><div class="ts-ihbox-icon-wrapper ts-ihbox-icon-type-text" data-text="' . $settings['icon_text'] . '">' . $box['icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if( $box['icon_type']=='image' ){
							$icon_alt	= (!empty($box['title'])) ? trim($box['title']) : esc_attr__('Icon', 'labtechco') ;
							$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
							$icon_html	= '<div class="ts-ihbox-icon"><div class="ts-ihbox-icon-wrapper ts-ihbox-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $box['icon_type']=='none' ){
							$icon_html = '';
							$icon_type_class = 'none';
						} else {

							// This is real icon html code
							$icon_html       = '<div class="ts-ihbox-icon"><div class="ts-ihbox-icon-wrapper"><i class="' . $box['icon']['value'] . '"></i></div></div>';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$box['icon']['library']);
						}
					}
					// SubTitle
					if( !empty($box['subtitle']) ) {
						$subtitle_tag	= ( !empty($box['subtitle_tag']) ) ? $box['subtitle_tag'] : 'h4' ;
						$subheading_html	= '<'. themestek_wp_kses($subtitle_tag) . ' class="ts-ihbox-subheading">
							'.ts_link_render($box['subtitle_link'], 'start' ).'
								'.themestek_wp_kses($box['subtitle']).'
							'.ts_link_render($box['subtitle_link'], 'end' ).'
							</'. themestek_wp_kses($subtitle_tag) . '>
						';
					}

					// Title
					if( !empty($box['title']) ) {
						$title_tag	= ( !empty($box['title_tag']) ) ? $box['title_tag'] : 'h2' ;
						$heading_html	= '<'. themestek_wp_kses($title_tag) . ' class="ts-ihbox-heading">
							'.ts_link_render($box['title_link'], 'start' ).'
								'.themestek_wp_kses($box['title']).'
							'.ts_link_render($box['title_link'], 'end' ).'
							</'. themestek_wp_kses($title_tag) . '>
							'.$subheading_html.'
						';
					}


					// Description text
					if( !empty($box['desc']) ){
						$content_html = '<div class="ts-ihbox-content">'.themestek_wp_kses($box['desc']).'</div>';
					}

					// BigNumber
					if( !empty($big_number_text) ){
						$bignumber_html = '<div class="ts-ihbox-big-number-text">' . $big_number_text . '</div>';
					}
					
					
					$mainclass	= '';
					$with_nav 	= '';

					// Button
					if( !empty($box['btn_title']) && !empty($box['btn_link']['url']) ){
						$button_html = '<div class="ts-ihbox-btn">' . ts_link_render($box['btn_link'], 'start' ) . themestek_wp_kses($box['btn_title']) . ts_link_render($box['btn_link'], 'end' ) . '</div>';
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

				echo themestek_wp_kses( ts_element_block_container( array(
					'position'	=> 'end',
				) ) );

			}

		} // foreach

		//echo themestek_wp_kses($return);
		?>

		</div>

		<?php

		$end_div .= themestek_box_wrapper( 'end', 'miconheading', get_defined_vars() );
		echo themestek_wp_kses($end_div);

	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'ts-portfolio-category', 'hide_empty' => false ) );
	  	$cat = array();
	  	foreach( $category as $item ) {
			$cat_count = get_category( $item );

	     	if( $item ) {
	        	$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
	     	}
	  	}
	  	return $cat;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new TS_MultipleIconHeading() );