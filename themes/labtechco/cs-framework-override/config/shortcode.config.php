<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => 'ThemeStek Special Shortcodes',
  'shortcodes' => array(
	
	//Site Tagline
	array(
		'name'      => 'ts-site-tagline',
		'title'     => esc_attr__('Site Tagline', 'labtechco'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Tagline. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode. ', 'labtechco'),
			),
      ),
    ),
	// Site Title
	array(
		'name'      => 'ts-site-title',
		'title'     => esc_attr__('Site Title', 'labtechco'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Title. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'labtechco'),
			),

      ),
    ),
	// Site URL
	array(
		'name'      => 'ts-site-url',
		'title'     => esc_attr__('Site URL', 'labtechco'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site URL. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'labtechco'),
			),

      ),
    ),
	// Site LOGO
	array(
		'name'      => 'ts-logo',
		'title'     => esc_attr__('Site Logo', 'labtechco'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Logo. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'labtechco'),
			),

      ),
    ),
	// Current Year
	array(
		'name'      => 'ts-current-year',
		'title'     => esc_attr__('Current Year', 'labtechco'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Current Year. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'labtechco'),
			),

      ),
    ),
	// Footer Menu
	array(
		'name'      => 'ts-footermenu',
		'title'     => esc_attr__('Footer Menu', 'labtechco'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Footer Menu. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'labtechco'),
			),

      ),
    ),
	// Skin Color
	array(
		'name'      => 'ts-skincolor',
		'title'     => esc_attr__('Skin Color', 'labtechco'),
		'fields'    => array(

			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This shortcode will show the Text in Skin Color', 'labtechco'),
			),
			 array(
				'id'         => 'content',
				'type'       => 'text',
				'title'      => esc_attr__('Skin Color Text', 'labtechco'),
				'after'   	 => '<div class="cs-text-muted"><br>'.esc_attr__('The content is this box will be shown in Skin Color', 'labtechco').'</div>', 
			),

      ),
    ),
	// Dropcaps
	array(
		'name'      => 'ts-dropcap',
		'title'     => esc_attr__('Dropcap', 'labtechco'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This will show text in dropcap style.', 'labtechco'),
			),
			array(
				'id'        	=> 'style',
				'title'     	=> esc_attr__('Style', 'labtechco'),
				'type'      	=> 'image_select',
				'options'    	=> array(
									''        => get_template_directory_uri() .'/includes/images/dropcap1.png',
									'square'  => get_template_directory_uri() .'/includes/images/dropcap2.png',
									'rounded' => get_template_directory_uri() .'/includes/images/dropcap3.png',
									'round'   => get_template_directory_uri() .'/includes/images/dropcap4.png',
								),
				'default'     	=> ''
			),
			array(
				'id'         	=> 'bgcolor',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Background Color', 'labtechco'),
				'options'    	=> array(
									'white' 	    => esc_attr__('White', 'labtechco'),
									'skincolor'     => esc_attr__('Skin Color', 'labtechco'),
									'grey' 			=> esc_attr__('Grey', 'labtechco'),
									'dark' 		    => esc_attr__('Dark', 'labtechco'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			array(
				'id'         	=> 'color',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Color', 'labtechco'),
				'options'    	=> array(
									'skincolor'     => esc_attr__('Skin Color', 'labtechco'),
									'white' 	    => esc_attr__('White', 'labtechco'),
									'grey' 			=> esc_attr__('Grey', 'labtechco'),
									'dark' 		    => esc_attr__('Dark', 'labtechco'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			 array(
				'id'         	=> 'content',
				'type'      	=> 'text',
				'title'     	=> esc_attr__('Text', 'labtechco'),
				'after'   	 	=> '<div class="cs-text-muted"><br>'.esc_attr__('The Letter in this box will be shown Dropcapped', 'labtechco').'</div>', 
			),

      ),
    ),
	
	
 
  ),
);



CSFramework_Shortcode_Manager::instance( $options );
