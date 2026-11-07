<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class TS_Timeline extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_timeline_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'LabtechCO Timeline Element', 'labtechco' );
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

		//Content
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Options', 'labtechco' ),
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'label',
			[
				'label' => esc_attr__( 'Week Days', 'labtechco' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_attr__( 'Monday - Friday', 'labtechco' ),
				'placeholder' => esc_attr__( 'Monday - Friday', 'labtechco' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'smalltext',
			[
				'label' => esc_attr__( 'Timing', 'labtechco' ),
				'default' => esc_attr__( '8.00- 18.30', 'labtechco' ),
				'placeholder' => esc_attr__( '8.00- 18.30', 'labtechco' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

		
        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Timeline', 'labtechco' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'label'		=> esc_attr__( 'This is first box', 'labtechco' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'labtechco' ),
					],
					[
						'label'		=> esc_attr__( 'This is second box', 'labtechco' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'labtechco' ),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		$link_html = '';
		?>

		<div class="ts-pricelist-block-wrapper">
			<ul class="ts-pricelist-block">
				<?php
				foreach( $settings['boxes'] as $box ){

					$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="service-price">'.esc_html($box['smalltext']).'</div>' : '' ;
					$label_html		= ( !empty($box['label']) ) ? esc_html($box['label']): '' ;
					
					$return .= '
					<li>'.$label_html.'
						'.$smalltext_html.'
					</li>';

				} // foreach

				echo themestek_wp_kses($return);
				?>
			</ul>
		</div>

	    <?php
	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new TS_Timeline() );