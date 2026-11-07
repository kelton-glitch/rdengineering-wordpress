<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class TS_StaticBoxElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_staticbox_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'LabtechCO Static Box Element', 'labtechco' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-boxes';
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
				'label' => esc_attr__( 'Boxes Options', 'labtechco' ),
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => esc_attr__( 'Choose Image', 'labtechco' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'		=> 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default'	=> 'large',
				'separator'	=> 'none',
			]
		);

		$repeater->add_control(
			'label',
			[
				'label' => esc_attr__( 'Box Title', 'labtechco' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__( 'Box Title', 'labtechco' ),
				'placeholder' => esc_attr__( 'Box Title', 'labtechco' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'smalltext',
			[
				'label' => esc_attr__( 'Box Content', 'labtechco' ),
				'default' => esc_attr__( 'Box Content', 'labtechco' ),
				'placeholder' => esc_attr__( 'Box Content', 'labtechco' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

		
        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Boxes', 'labtechco' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is first box', 'labtechco' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'labtechco' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'labtechco' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'labtechco' ),
					],
				],
				'title_field' => '{{{ label }}}',
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
		$link_html = '';
		$image_html	= '' ;
		$start_div	= '' ;

		?>

		<?php
		// Starting container
		$start_div .= themestek_box_wrapper( 'start', 'staticbox', get_defined_vars() );

		echo themestek_wp_kses($start_div);
		?>
		<div class="ts-ele-header-area">
			<?php ts_heading_subheading($settings, true); ?>
		</div>

		<div class="row multi-columns-row themestek-boxes-row-wrapper box-shadow-2">

		<?php
		foreach( $settings['boxes'] as $box ){

			$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="themestek-static-box-desc">'.esc_html($box['smalltext']).'</div>' : '' ;
			$label_html		= ( !empty($box['label']) ) ? '<div class="themestek-box-title"><h4>'.esc_html($box['label']).'</h4></div>' : '' ;
			
			// Media image
			$image_html		= '' ;
			if( defined('ELEMENTOR_VERSION') ){
				$image_html = Group_Control_Image_Size::get_attachment_image_src( $box['image']['id'], 'image', $box );
				if( !empty($image_html) ){
					$image_html = '<img src="'.esc_url($image_html).'" alt="'.esc_attr($box['label']).'" />';
				}
			}


			$return .= themestek_column_div('start', $column );

			$return .= '
			<div class="themestek-static-box-wrapper themestek-boxes-feature-plans ts-hover-style-2 themestek-box">
				<div class="themestek-static-box-image"> 
					' . $image_html . '
				</div>
				<div class="themestek-static-box-content" >
					'.$label_html.'
					'.$smalltext_html.'
				</div>
			</div>
			';

			$return .= themestek_column_div('end', $column );


		} // foreach

		echo themestek_wp_kses($return);
		?>

		</div>

		<?php

		// Ending wrapper of the whole arear
		$end_div = themestek_box_wrapper( array(
			'position'	=> 'end',
			'cpt'		=> 'staticbox',
			'data'		=> $settings
		) );
		echo themestek_wp_kses($end_div);
		?>

	    <?php
	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new TS_StaticBoxElement() );