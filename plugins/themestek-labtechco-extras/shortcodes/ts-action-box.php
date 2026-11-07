<?php
// [ts-single-image]
if( !function_exists('themestek_sc_action_box') ){
function themestek_sc_action_box( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_action_box;
		$options_list = ts_create_options_list($ts_sc_params_action_box);
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		$min = TS_MIN;
		if( is_child_theme() ){
			$min = '';
		}
		
		$style	= ( !empty( $boxstyle ) ) ? $boxstyle : 'style-1' ;  // Getting box style
		wp_enqueue_style( 'ts-action-box-'.$style, get_template_directory_uri() . '/css/actionbox/actionbox-'.$style.TS_MIN.'.css' );

		// extracting thumb image, full image and image id
		$image_array = explode('|', $image );
		
		$full_img  = ( isset($image_array[0]) ) ? $image_array[0] : '' ;
		$thumb_img = ( isset($image_array[1]) ) ? $image_array[1] : '' ;
		$img_id    = ( isset($image_array[2]) ) ? $image_array[2] : '' ;

		$alignment = (!empty($alignment)) ? $alignment : 'left' ;


		// Title
		$title_html = '';	
		if( !empty($title) ) {
			$title_html	= '<h2 class="ts-element-title">'.themestek_wp_kses( $title ).'</h2>';
		}
		$subtitle_html = '';
		if( !empty($subtitle) ) {
			$subtitle_html	= '<h4 class="ts-element-title">'.themestek_wp_kses( $subtitle ).'</h4>';
		}
		
		//image
		$image_html = '';
		if( $full_img){
			$icon_alt	 = (!empty($title)) ? trim($title) : esc_attr__('Sprite-img', 'labtechco') ;
			$image_html  = '<img src="'.$full_img.'" alt="'.esc_attr($icon_alt).'" />';
		}
		// Button 
		$button_html1 = '';
		if( !empty($btn_title) && !empty($btn_link) ){
			$button_html1 = '<div class="ts-svg-btn ts-btn ts-box-btn-1"><a title="Link" href="'.$btn_link.'"><span>'.$btn_title.'<i class="ts-labtechco-icon-arrow-right"></i></span></a></div>';
		}

		//$ts_sc_params_action_box['boxstyle'] = $boxstyle;
		//$ts_sc_params_action_box['title'] = $title_html;
		//$ts_sc_params_action_box['subtitle'] = $subtitle_html;
		
		
		// calling template depending on the selected VIEW option
		ob_start();
		echo '<div class="ts-action-box ts-action-box-'.esc_attr($boxstyle).'">';
		include( locate_template( '/theme-parts/action-box/action-box-'.$boxstyle.'.php', false, false ) );
		echo '</div>';
		$return = ob_get_contents();
		ob_end_clean();

		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;
}
}
add_shortcode( 'ts-action-box', 'themestek_sc_action_box' );