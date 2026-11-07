<?php
defined( 'ABSPATH' ) || exit('restricted access');

return array(
	'title' 		=> esc_html__( 'Homepage 11', 'labtechco' ), // Required
	'demo_url'		=> '',
	'type'			=> 'block', // Required
	'category'		=> array(   // Required
		esc_html__( 'Pages', 'labtechco' ),
	),
	'tags'			 => array(
		esc_html__( 'Pages', 'labtechco' ),
		esc_html__( 'Homepage', 'labtechco' ),
	),
);
