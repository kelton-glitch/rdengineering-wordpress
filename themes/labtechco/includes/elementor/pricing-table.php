<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class TS_PTableElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ts_ptable_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'LabtechCO Pricing Table Element', 'labtechco' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-dollar-sign';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'labtechco_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
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

        // Highlight Column
        $this->start_controls_section(
            'highlight_col_section',
            [
                'label' => esc_attr__( 'Highlight Column', 'labtechco' ),
            ]
        );
        $this->add_control(
			'highlight_col',
			[
				'label' => esc_attr__( 'Highlight Column', 'labtechco' ),
				'description' => esc_attr__( 'Select column which is highlighted in pricing table', 'labtechco' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'	=> esc_attr__( 'First Column', 'labtechco' ),
                    '2'	=> esc_attr__( 'Second Column', 'labtechco' ),
					'3'	=> esc_attr__( 'Third Column', 'labtechco' ),
					'4'	=> esc_attr__( 'Fourth Column', 'labtechco' ),
					'5'	=> esc_attr__( 'Fifth Column', 'labtechco' ),
				],
				'default' => esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label' => esc_attr__( 'Highlight Text', 'labtechco' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'This will appear as special text', 'labtechco' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
		
		for( $x=1; $x<=5; $x++ ){
			$default_heading	= '';
			$default_price		= '';
			$default_icon		= [
				'value'				=> 'fas fa-star',
				'library'			=> 'fa-solid',
				'url'				=> '',
			];
			if( $x == 1 ){
				$default_heading = esc_attr__( 'Plan 1', 'labtechco' );
				$default_price	 = esc_attr__( '1.99', 'labtechco' );
				$default_icon	= [
					'value'			=> 'fas fa-user-alt',
					'library'		=> 'fa-solid',
					'url'			=> '',
				];

			} else if( $x == 2 ){
				$default_heading = esc_attr__( 'Plan 2', 'labtechco' );
				$default_price	 = esc_attr__( '3.99', 'labtechco' );
				$default_icon	= [
					'value'			=> 'fas fa-user-tie',
					'library'		=> 'fa-solid',
					'url'			=> '',
				];

			} else if( $x == 3 ){
				$default_heading = esc_attr__( 'Plan 3', 'labtechco' );
				$default_price	 = esc_attr__( '5.99', 'labtechco' );
				$default_icon	= [
					'value'			=> 'fas fa-users',
					'library'		=> 'fa-solid',
					'url'			=> '',
				];

			}


			//Content
			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'labtechco' ) , tste_add_ordinal_number_suffix($x) ) ,
				]
			);

			$this->add_control(
				$x.'_icon_type',
				[
					'label' => esc_attr__( 'Icon Type', 'labtechco' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'icon'	=> esc_attr__( 'Icon', 'labtechco' ),
						'image'	=> esc_attr__( 'Image', 'labtechco' ),
						'text'	=> esc_attr__( 'Text', 'labtechco' ),
					],
					'default' => esc_attr( 'icon' ),
				]
			);
			$this->add_control(
				$x.'_icon',
				[
					'label' => __( 'Icon', 'labtechco' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => $default_icon,
					'condition' => [
						$x.'_icon_type' => 'icon',
					]
				]

			);
			$this->add_control(
				$x.'_icon_image',
				[
					'label' => __( 'Select Image for Icon', 'labtechco' ),
					'description' => __( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'labtechco' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						$x.'_icon_type' => 'image',
					]
				]
			);
			$this->add_control(
				$x.'_icon_text',
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
						$x.'_icon_type' => 'text',
					]
				]
			);

			$this->add_control(
				$x.'_heading',
				[
					'label'         => esc_attr__( 'Heading', 'labtechco' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_heading ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_price',
				[
					'label'         => esc_attr__( 'Price', 'labtechco' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_price ),
					'description'   => esc_attr__( 'Enter Price.', 'labtechco' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'         => esc_attr__( 'Currency symbol', 'labtechco' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr( '$' ),
					'description'   => esc_attr__( 'Enter currency symbol', 'labtechco' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'labtechco' ),
					'description'	=> esc_html__( 'Select currency position.', 'labtechco' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> esc_attr('after'),
					'options' => [
						'after'		=> __( 'After Price', 'labtechco' ),
						'before'	=> __( 'Before Price', 'labtechco' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'         => esc_attr__( 'Price Frequency', 'labtechco' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr__( 'Monthly', 'labtechco' ),
					'description'   => esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'labtechco' ),
					'separator'     => 'after',
				]
			);
			$this->add_control(
				$x.'_btn_text',
				[
					'label'         => esc_attr__( 'Button Text', 'labtechco' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr__( 'Buy Now', 'labtechco' ),
					'description'   => esc_attr__( 'Like "Read More" or "Buy Now".', 'labtechco' ),
				]
			);
			$this->add_control(
				$x.'_btn_link',
				[
					'label'         => esc_attr__( 'Button Link', 'labtechco' ),
					'type'          => Controls_Manager::URL,
					'default'		=> array (
						'url'				=> '#',
						'is_external'		=> '',
						'nofollow'			=> '',
						'custom_attributes'	=> '',
					),
					'description'   => esc_attr__( 'Set link for button', 'labtechco' ),
					'separator'     => 'after',
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => __( 'Line Label', 'labtechco' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label'     => __( 'Icon', 'labtechco' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => [
						'value'     => 'fas fa-check',
						'library'   => 'solid',
					],
				]

			);

			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'labtechco' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'labtechco' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'Line One', 'labtechco' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Two', 'labtechco' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Three', 'labtechco' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
					],
					'title_field' => '{{{ text }}}',
				]
			);

			$this->end_controls_section();

		} // end for loop

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
				'label'			=> esc_attr__( 'Select Pricing Table View Style', 'labtechco' ),
				'description'	=> esc_attr__( 'Select Pricing Table View style.', 'labtechco' ),
				'type'			=> 'ts_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'style-1',
				'options'		=> themestek_global_template_list( 'pricingtable', 'elementor' ),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		
		global $ts_global_ptbox_element_values;
		$ts_global_ptbox_element_values = array('boxstyle');
		?>

		<div class="themestek-ele themestek-ele-pricing-table ts-pricing-table-<?php echo esc_attr($boxstyle); ?>">

			<?php 
			ob_start();
			$r =	'<div class="ts-ele-header-area">'.ts_heading_subheading($settings, true).'</div>';
			$return .= ob_get_contents();
			ob_end_clean();
			?>

			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}
			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($columns) ){
				switch( count($columns) ){
					case 1:
						$col_start_div	= '<div class="themestek-ptable-column-w col-md-12">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="themestek-ptable-column-w col-md-6">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="themestek-ptable-column-w col-md-4">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="themestek-ptable-column-w col-md-3">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="themestek-ptable-column-w col-md-20percent">';
						$col_end_div	= '</div>';
						break;
				}
			}

			if( !empty($columns) ){

				$return .= '<div class="themestek-ptables-w row multi-columns-row">';

				foreach( $columns as $col => $highlight_col ){
					$icon = '';
					if( !empty($settings[$col.'_icon_type']) ){

						if( $settings[$col.'_icon_type']=='text' ){
							$icon = '<div class="ts-ptable-icon"><div class="ts-sbox-icon-wrapper ts-ptable-icon-type-text">' . $settings[$col.'_icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if( $settings[$col.'_icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($settings[$col.'_icon_image']['url']).'" alt="'.esc_attr($settings[$col.'_heading']).'" />';
							$icon = '<div class="ts-ptable-icon"><div class="ts-sbox-icon-wrapper ts-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $settings[$col.'_icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {

							// This is real icon html code
							$icon       = '<div class="ts-ptablebox-main-icon"><div class="ts-sbox-icon-wrapper"><i class="' . $settings[$col.'_icon']['value'] . '"></i></div></div>';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$settings[$col.'_icon']['library']);
						}
					}

					// add highlighted class
					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="ts-ptablebox-featured-col ', $col_start_div );
						$featured = ( !empty($settings['highlight_col']) ) ? '<div class="ts-ptablebox-featured-w">'.$settings['highlight_text'].'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="ts-ptablebox-featured-col ', 'class="', $col_start_div );
					}

					// Heading
					$heading = ( !empty($settings[$col.'_heading']) ) ? $settings[$col.'_heading']: '' ;

					// Currency Symbol
					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? $settings[$col.'_cur_symbol'] : '' ;

					// Price Frequency
					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? $settings[$col.'_price_frequency'] : '' ;

					// Price				
					$price = ( !empty($settings[$col.'_price']) ) ? $settings[$col.'_price'] : '' ;
					// Add currently symbol in price
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? '<div class="themestek-ptable-cur-symbol-before">'.$currency_symbol.'</div> <div class="themestek-ptable-price">'.$price.'</div>' : '<div class="themestek-ptable-price">'.$price.'</div><div class="themestek-ptable-cur-symbol-after"> '.$currency_symbol.'</div>' ;

					// list of features
					$lines_html = '';
					$values     = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {

							$list_icon = '<i class="fa fa-check"></i> ';
							if( !empty($data['icon']['value']) ){
								$list_icon = '<i class="' . $data['icon']['value'] . '"></i> ';
								wp_enqueue_style( 'elementor-icons-'.$data['icon']['library']);
							}
							$lines_html .= isset( $data['text'] ) ? '<div class="ts-ptable-line">'.$list_icon.$data['text'].'</div>' : '';
						}
					}

					// Button
					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="ts-ptable-btn">' . ts_link_render($settings[$col.'_btn_link'], 'start' ) . themestek_wp_kses($settings[$col.'_btn_text']) . ts_link_render($settings[$col.'_btn_link'], 'end' ) . '</div>';
					}

					$mainclass	= '';
	
					$ts_global_ptbox_element_values['boxstyle']		    = $boxstyle;
					$ts_global_ptbox_element_values['featured_text']    = '';
					$ts_global_ptbox_element_values['icon_html']        = $icon;
					$ts_global_ptbox_element_values['heading']          = $heading;
					$ts_global_ptbox_element_values['price']            = $price;
					$ts_global_ptbox_element_values['cur_symbol_after'] = '';
					$ts_global_ptbox_element_values['price_frequency']  =  $frequency;
					$ts_global_ptbox_element_values['lines_html']       =  '<div class="ts-ptable-lines-w">'. $lines_html . '</div>';
					$ts_global_ptbox_element_values['btn_title']        =  '';
					$ts_global_ptbox_element_values['cur_symbol_before'] = '';
					$ts_global_ptbox_element_values['main-class']        = $mainclass;
					

					// Template output
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/theme-parts/ptablebox/ptablebox-'.esc_attr($boxstyle).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}

				$return .= '</div>';

			}

			echo themestek_wp_kses($return);
			?>

		</div><!-- themestek-ele themestek-ele-pricing-table -->

		<?php

	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'ts-ptable-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new TS_PTableElement() );