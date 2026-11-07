<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class TS_ClientElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_client_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'LabtechCO Client Logo Element', 'labtechco' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-th';
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
		$this->add_control(
			'offset',
			[
				'label'			=> esc_attr__( 'Skip Post (offset)', 'labtechco' ),
				'description'	=> esc_attr__( 'How many Post you like to skip.', 'labtechco' ),
				'type'			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> '',
				'options'		=> [
					''				=> esc_attr__( 'Show All Post (No skip)', 'labtechco' ),
					'1'				=> esc_attr__( 'Skip first Post', 'labtechco' ),
					'2'				=> esc_attr__( 'Skip two Posts', 'labtechco' ),
					'3'				=> esc_attr__( 'Skip three Posts', 'labtechco' ),
					'4'				=> esc_attr__( 'Skip four Posts', 'labtechco' ),
					'5'				=> esc_attr__( 'Skip five Posts', 'labtechco' ),
				]
			]
		);
		$this->add_control(
			'from_category',
			[
				'label' => esc_attr__( 'Show Post from selected Client Category?', 'labtechco' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_category(),
				'multiple' => true,
				'label_block'	=> true,
				'placeholder' => esc_attr__( 'All Categories', 'labtechco' ),
			]
		);
		$this->add_control(
			'show',
			[
				'label' => esc_attr__( 'Post to show', 'labtechco' ),
				'description' => esc_attr__( 'How many Post you want to show.', 'labtechco' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '3',
			]
		);
		$this->add_control(
			'sortable',
			[
				'label' => esc_attr__( 'Show Sortable Client Category ?', 'labtechco' ),
				'description' => esc_attr__( 'Select YES to show sortable Client Category.', 'labtechco' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'labtechco' ),
				'label_off' => esc_attr__( 'No', 'labtechco' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_attr__( 'Order', 'labtechco' ),
				'description' => esc_attr__( 'Designates the ascending or descending order.', 'labtechco' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'DESC',
				'options' => [
					'ASC'		=> esc_attr__( 'Ascending order (1, 2, 3; a, b, c)', 'labtechco' ),
					'DESC'		=> esc_attr__( 'Descending order (3, 2, 1; c, b, a)', 'labtechco' ),
				]
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' => esc_attr__( 'Order By', 'labtechco' ),
				'description' => esc_attr__( ' Sort retrieved posts by parameter.', 'labtechco' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'none'		=> esc_attr__( 'No order', 'labtechco' ),
					'ID'		=> esc_attr__( 'ID', 'labtechco' ),
					'title'		=> esc_attr__( 'Title', 'labtechco' ),
					'date'		=> esc_attr__( 'Date', 'labtechco' ),
					'rand'		=> esc_attr__( 'Random', 'labtechco' ),
				]
			]
		);
		$this->add_control(
			'box_spacing',
			[
				'label' => esc_attr__( 'Box Gap', 'labtechco' ),
				'description' => esc_attr__( 'Gap between each Post box.', 'labtechco' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'	=> esc_attr__( 'Default Gap', 'labtechco' ),
					'0px'		=> esc_attr__( 'No Gap (0px)', 'labtechco' ),
					'5px'		=> esc_attr__( '5px', 'labtechco' ),
					'10px'		=> esc_attr__( '10px', 'labtechco' ),
					'15px'		=> esc_attr__( '15px', 'labtechco' ),
					'20px'		=> esc_attr__( '20px', 'labtechco' ),
					'25px'		=> esc_attr__( '25px', 'labtechco' ),
					'30px'		=> esc_attr__( '30px', 'labtechco' ),
					'35px'		=> esc_attr__( '35px', 'labtechco' ),
					'40px'		=> esc_attr__( '40px', 'labtechco' ),
					'45px'		=> esc_attr__( '45px', 'labtechco' ),
					'50px'		=> esc_attr__( '50px', 'labtechco' ),
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
				'label'			=> esc_attr__( 'Select Client View Style', 'labtechco' ),
				'description'	=> esc_attr__( 'Slect Client View style.', 'labtechco' ),
				'type'			=> 'ts_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'style-1',
				'options'		=> themestek_global_template_list( 'clients', 'elementor' ),
			]
		);
		$this->end_controls_section();

		// Appearance
		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Column and Carousel Options', 'labtechco' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
				'default'		=> 'default',
				'options'		=> [
					'default'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
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
					'boxview' => 'default',
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

		// Columns
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
		// This global variable will be used in template file for design
		global $ts_global_client_element_values;
		$ts_global_client_element_values = array();
		
		if( !empty($show_hover) ){
			$ts_global_client_element_values['show_hover'] = $show_hover;
		}
		
		// Starting wrapper of the whole arear
		$return .= themestek_box_wrapper( 'start', 'client', get_defined_vars() ); 
		
		ob_start();
		$r =	'<div class="ts-ele-header-area">'.ts_heading_subheading($settings, true).'</div>';
		$return .= ob_get_contents();
		ob_end_clean();

		// Getting $args for WP_Query
		$args = themestek_get_query_args( 'client', get_defined_vars() );
		
		// From selected category/group
		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'ts-client-group',
					'field'    => 'slug',
					'terms'    => $from_category,
				),
			);
		};
		if( !empty($offset) ){
			$args['offset'] = $offset;
		}

		// Wp query to fetch posts
		$posts = new \WP_Query( $args );
		
		if ( $posts->have_posts() ) {
			$return .= themestek_get_boxes( 'client', get_defined_vars() );
		}

		// Ending wrapper of the whole arear
		$return .= themestek_box_wrapper( 'end', 'client', get_defined_vars() );
		
		
		echo themestek_wp_kses($return);
		/* Restore original Post Data */
		wp_reset_postdata();

	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'ts-client-group', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new TS_ClientElement() );