<?php

/******* Each Line (group) Options ********/
// Icon picker
$group_icon = vc_map_integrate_shortcode( 'ts-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'list_icon',
		'value' => 'icon',
	)
);

$group_params = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'labtechco' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar. You can use STRONG tag to bold some texts.', 'labtechco' ),
		'admin_label' => true,
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Select Icon', 'labtechco' ),
		'param_name' => 'list_icon',
		'value'      => array(
			esc_attr__( 'No icon', 'labtechco' )							=> '',
			esc_attr__( 'Show default icon (check icon)', 'labtechco' )	=> 'default',
			esc_attr__( 'Select custom icon', 'labtechco' )				=> 'custom',
		),
		'std'         => 'icon',
		'description' => esc_attr__( 'Select icon for this line.', 'labtechco' ),
	),
);

// Merging icon with other options
$param_group = array_merge( $group_params, $group_icon );

$params_boxstyle =  array(
	array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Pricing Table Box Style', 'labtechco' ),
		'description'	=> esc_attr__( 'Select Pricing Table box style.', 'labtechco' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> themestek_global_template_list('pricingtable', false),
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Featured Column', 'labtechco' ),
		'param_name'		=> 'featured_col',
		//'std'				=> '',
		'value'				=> array(
			esc_attr__( 'None', 'labtechco' )		=> '',
			esc_attr__( '1st Column', 'labtechco' )	=> '1',
			esc_attr__( '2nd Column', 'labtechco' )	=> '2',
			esc_attr__( '3rd Column', 'labtechco' )	=> '3',
			esc_attr__( '4th Column', 'labtechco' )	=> '4',
			esc_attr__( '5th Column', 'labtechco' )	=> '5',
		),
		'description'		=> esc_attr__( 'Select whith column will be with featured style.', 'labtechco' ),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Featured Text', 'labtechco' ),
		'std'			=> esc_attr__( 'Featured', 'labtechco' ),
		'param_name'	=> 'featured_text',
		'description'	=> esc_attr__( 'Enter text that will be shown for featured column. Example "Featured".', 'labtechco' ),
		'dependency' => array(
			'element' => 'featured_col',
			'value' => array( '1', '2', '3', '4', '5' ),
		),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	
);

/*** Coumn Options ***/
$params_heading =  array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Heading', 'labtechco' ),
		'param_name'	=> 'heading',
		'description'	=> esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'labtechco' ),
	)
);

// Main Icon picker
$main_icon = vc_map_integrate_shortcode( 'ts-icon', 'i_', esc_attr__( 'Content', 'labtechco' ),
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	)
);

$params_price =  array(
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price', 'labtechco' ),
		'param_name'		=> 'price',
		'std'				=> '100',
		'description'		=> esc_attr__( 'Enter Price.', 'labtechco' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Currency symbol', 'labtechco' ),
		'param_name'		=> 'cur_symbol',
		'std'				=> '$',
		'description'		=> esc_attr__( 'Enter currency symbol', 'labtechco' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Currency Symbol position', 'labtechco' ),
		'param_name'		=> 'cur_symbol_position',
		'std'				=> 'after',
		'value'				=> array(
			esc_attr__( 'Before price', 'labtechco' )	=> 'before',
			esc_attr__( 'After price', 'labtechco' )	=> 'after',
		),
		'description'		=> esc_attr__( 'Select currency position.', 'labtechco' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price Frequency', 'labtechco' ),
		'param_name'		=> 'price_frequency',
		'std'				=> esc_attr__( 'Monthly', 'labtechco' ),
		'description'		=> esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'labtechco' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
);

$params_btn = array(
	array(
		'type'       		=> 'textfield',
		'heading'    		=> esc_attr__( 'Button Text', 'labtechco' ),
		'param_name' 		=> 'btn_title',
		'std'               =>  esc_attr__( 'Buy Now', 'labtechco' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'vc_link',
		'heading'			=> esc_attr__( 'Button URL (Link)', 'labtechco' ),
		'param_name'		=> 'btn_link',
		'description'		=> esc_attr__( 'Add link to button.', 'labtechco' ),
		'edit_field_class'	=> 'vc_col-sm-9 vc_column',
	),
);


$params_lines =  array(
	array(
		'type'			=> 'param_group',
		'heading'		=> esc_attr__( 'Each Line (Features)', 'labtechco' ),
		'param_name'	=> 'values',
		'description'	=> esc_attr__( 'Enter values for graph - value, title and color.', 'labtechco' ),
		'value'			=> urlencode( json_encode( array(
			array(
				'label'		=> esc_attr__( 'This is label one', 'labtechco' ),
				'value'		=> '90',
			),
			array(
				'label'		=> esc_attr__( 'This is label two', 'labtechco' ),
				'value'		=> '80',
			),
			array(
				'label'		=> esc_attr__( 'This is label three', 'labtechco' ),
				'value'		=> '70',
			),
		) ) ),
		'params'		=> $param_group,
	),
	
);

// CSS Animation
$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_attr__( 'Animation', 'labtechco' );

// Extra Class
$extra_class = ts_vc_ele_extra_class_option();
$extra_class['group'] = esc_attr__( 'Animation', 'labtechco' );


$params_all = array_merge(
	//$params_boxstyle,
	$params_heading,
	$main_icon,
	$params_price,
	$params_btn,
	$params_lines
);



/**** Multiple Columns for pricing table ****/
$params = array();

for( $i=1; $i<=5; $i++ ){  // 3 column
	
	$tab_title = esc_attr__('First Column','labtechco');
	switch( $i ){
		case 2:
			$tab_title = esc_attr__('Second Column','labtechco');
			break;
		case 3:
			$tab_title = esc_attr__('Third Column','labtechco');
			break;
		case 4:
			$tab_title = esc_attr__('Fourth Column','labtechco');
			break;
		case 5:
			$tab_title = esc_attr__('Fifth Column','labtechco');
			break;
	}
	
	foreach( $params_all as $param ){
		
		if( !empty($param['param_name']) ){
			$param['param_name'] = 'col'.$i.'_'.$param['param_name'];
		}
		$param['group']      = $tab_title;

		if( !empty($param['dependency']) && !empty($param['dependency']["element"]) ){
			$param['dependency']["element"] = 'col'.$i.'_'.$param['dependency']["element"];
		}
		
		$params[] = $param;
		
	}

} // for

$params = array_merge(
	$params_boxstyle,
	$params,
	array($css_animation),
	array($extra_class),
	array( ts_vc_ele_css_editor_option() )
);

// Setting default icon for Font Awesome icon
foreach( $group_icon as $index=>$group_icon ){
	if( isset($group_icon['param_name']) && $group_icon['param_name']=='i_icon_fontawesome' ){
		$group_icon[$index]['value'] = 'fa-balance-scale';
	
	}
}
// Changing default values
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	//var_dump($param_name);
	//default set heading values
	
	if( $param_name == 'col1_heading' ){
		$params[$i]['std']   = esc_attr__('Plan 1', 'labtechco');
	
	} else if($param_name == 'col2_heading'){
		$params[$i]['std']   = esc_attr__('Plan 2', 'labtechco');

	} else if($param_name == 'col3_heading'){
		$params[$i]['std']   = esc_attr__('Plan 3', 'labtechco');
	} 

	//default set icon libraries values

	if( $param_name == 'col1_i_type' ){
		$params[$i]['std']   = esc_attr('fontawesome');
	
	} else if($param_name == 'col2_i_type'){
		$params[$i]['std']   = esc_attr('fontawesome');

	} else if($param_name == 'col3_i_type'){
		$params[$i]['std']   = esc_attr('fontawesome');
	} 

	//default set icon values

	if( $param_name == 'col1_i_icon_fontawesome' ){
		$params[$i]['value']   = esc_attr__('fa fa-asterisk', 'labtechco');
	
	} else if($param_name == 'col2_i_icon_fontawesome'){
		$params[$i]['value']   = esc_attr__('fa fa-shield', 'labtechco');

	} else if($param_name == 'col3_i_icon_fontawesome'){
		$params[$i]['value']   = esc_attr__('fa fa-briefcase', 'labtechco');
	} 

	//default set pricing values

	if( $param_name == 'col1_price' ){
		$params[$i]['std']   = esc_attr__('100', 'labtechco');
	
	} else if($param_name == 'col2_price'){
		$params[$i]['std']   = esc_attr__('200', 'labtechco');

	} else if($param_name == 'col3_price'){
		$params[$i]['std']   = esc_attr__('300', 'labtechco');
	} 

	//default set cur symbol values

	if( $param_name == 'col1_cur_symbol' ){
		$params[$i]['std']   = esc_attr__('$', 'labtechco');
	
	} else if($param_name == 'col2_cur_symbol'){
		$params[$i]['std']   = esc_attr__('$', 'labtechco');

	} else if($param_name == 'col3_cur_symbol'){
		$params[$i]['std']   = esc_attr__('$', 'labtechco');
	} 

	//default set price frequency values

	if( $param_name == 'col1_price_frequency' ){
		$params[$i]['std']   = esc_attr__('Monthly', 'labtechco');
	
	} else if($param_name == 'col2_price_frequency'){
		$params[$i]['std']   = esc_attr__('Monthly', 'labtechco');

	} else if($param_name == 'col3_price_frequency'){
		$params[$i]['std']   = esc_attr__('Monthly', 'labtechco');
	} 

	//default set button title values

	if( $param_name == 'col1_btn_title' ){
		$params[$i]['std']   = esc_attr__('BUY NOW', 'labtechco');
	
	} else if($param_name == 'col2_btn_title'){
		$params[$i]['std']   = esc_attr__('BUY NOW', 'labtechco');

	} else if($param_name == 'col3_btn_title'){
		$params[$i]['std']   = esc_attr__('BUY NOW', 'labtechco');
	} 
	$i++;
}

global $ts_sc_params_pricingtable;
$ts_sc_params_pricingtable = $params;

vc_map( array(
	'name'		=> esc_attr__( 'PBM Pricing Table', 'labtechco' ),
	'base'		=> 'ts-pricing-table',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'PBM', 'labtechco' ),
	'params'	=> $params
) );
