<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = '';

/**** ThemeStek custom changes START ****/
$ts_textcolor = $ts_bgcolor = $ts_col_bg_expand = '';
/**** ThemeStek custom changes END ****/

$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	'ts-column',
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
	
);

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}




/**** ThemeStek custom changes START ****/
$ts_classes		= array();
$ts_classes[]	= ts_responsive_padding_margin_class( $ts_responsive_css );  // Added by ThemeStek

if( !empty($ts_responsive_css) ){
	$ts_responsive_css_array = explode('|',$ts_responsive_css);
	
	if( !empty($ts_responsive_css_array[1]) && $ts_responsive_css_array[1]=='colbreak_yes' ){ // 1200
		$ts_classes[] = 'ts-break-col-1200';
	}
	
	if( !empty($ts_responsive_css_array[10]) && $ts_responsive_css_array[10]=='colbreak_yes' ){  // 991
		$ts_classes[] = 'ts-break-col-991';
	}
	
	if( !empty($ts_responsive_css_array[19]) && $ts_responsive_css_array[19]=='colbreak_yes' ){  // 767
		$ts_classes[] = 'ts-break-col-767';
	}
	
	if( !empty($ts_responsive_css_array[29]) && $ts_responsive_css_array[29]=='colbreak_yes' ){  // custom
		$ts_classes[] = 'ts-break-col-custom';
	}
}
/**** ThemeStek custom changes END ******/




/**** ThemeStek custom changes START ****/
$ts_bg_pos_class = '';
$ts_customdiv 	 = '';
$ts_class_list 	 = '';

if( !empty($zindex) ){
	if( $zindex=='zero' ){ $zindex='0'; }
	$css_classes[] = 'ts-zindex-'.$zindex;
}

if( !empty($ts_textcolor) ){
	$ts_classes[] = 'ts-textcolor-'.$ts_textcolor;
}
if( !empty($ts_bgimage_position) ){
	$ts_bg_pos_class = 'ts-bgimage-position-'.$ts_bgimage_position;
}

if( !empty($ts_bgcolor) || themestek_check_if_bgcolor_in_css($css) ){
	$ts_classes[] = 'ts-col-bgcolor-'.$ts_bgcolor;
	$ts_classes[] = 'ts-col-bgcolor-yes';
	$ts_customdiv = '<div class="ts-col-wrapper-bg-layer ts-bg-layer '.$ts_bg_pos_class.'"><div class="ts-bg-layer-inner"></div></div>';
}
if( strpos($css, 'url(') !== false || !empty($parallax_image) ) {
	$ts_classes[] = 'ts-col-bgimage-yes';
	$ts_customdiv = '<div class="ts-col-wrapper-bg-layer ts-bg-layer '.$ts_bg_pos_class.'"><div class="ts-bg-layer-inner"></div></div>';
}

if( !empty($ts_col_bg_expand) && in_array( $ts_col_bg_expand, array('left','right') ) ){  // Left expand or Right expand
	$css_classes[] = 'ts-span ts-' . $ts_col_bg_expand . '-span';
}
if( !empty($ts_shadow) ){ // Shadow
	$css_classes[] = 'ts-shadow-row';
}


$ts_class_list = implode( ' ', $ts_classes );

/**** ThemeStek custom changes End ****/




/**** ThemeStek custom changes START ****/
if( !empty($reduce_extra_padding) ){
	$css_classes[] = 'margin-15px-' . esc_attr($reduce_extra_padding) . '-colum';
}
/**** ThemeStek custom changes END ****/




$wrapper_attributes = array();

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

?>


<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
	<div class="vc_column-inner <?php echo sanitize_html_class( trim( vc_shortcode_custom_css_class( $css ) ) ) . ' ' . themestek_sanitize_html_classes( $ts_class_list ); ?>">
		<?php echo trim($ts_customdiv);  // Added by ThemeStek ?>
		<div class="wpb_wrapper">
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>



<?php
/* Added by ThemeStek - code start */
$customStyle = '';
if(trim($css)!= ''){
	/***********************************/
	// Inline css
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	// background image layer
	$new_bgimage_element = vc_shortcode_custom_css_class( $css, '' ). ' > .ts-col-wrapper-bg-layer';
	$newCSS   			 = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
	$themestek_inline_css   .= themestek_vc_get_bg_css_only( $newCSS );
	
	// background color layer
	$new_bgimage_element2 = vc_shortcode_custom_css_class( $css, '' ). ' > .ts-col-wrapper-bg-layer > .ts-bg-layer-inner';
	$newCSS2   			  = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element2,$css );
	$themestek_inline_css    .= themestek_vc_get_bg_css_only( $newCSS2, 'nobg' );
	/************************************/
}
// Responsive padding margin option values
if( !empty($ts_responsive_css) ){
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	$themestek_inline_css .= ts_responsive_padding_margin( $ts_responsive_css, '.ts-column>' );
}
	
/* Added by ThemeStek - code end */
