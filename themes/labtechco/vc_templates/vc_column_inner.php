<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
$el_class = $width = $el_id = $css = $offset = '';
$output = '';

/**** ThemeStek custom changes START ****/
$css_animation = '';
/**** ThemeStek custom changes END ****/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	'ts-column-inner',
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_col-has-fill';
}


/**** ThemeStek custom changes START ****/
$ts_customdiv 	= '';
$ts_class_list 	= '';
$ts_classes 	= array();
$ts_classes[] 	= ts_responsive_padding_margin_class( $ts_responsive_css );  // Added by ThemeStek
if( !empty($ts_textcolor) ){
	$ts_classes[] = 'ts-textcolor-'.$ts_textcolor;
}
if( !empty($ts_bgcolor) || themestek_check_if_bgcolor_in_css($css) ){
	$ts_classes[] = 'ts-col-bgcolor-'.$ts_bgcolor;
	$ts_classes[] = 'ts-col-bgcolor-yes';
	$ts_customdiv = '<div class="ts-col-wrapper-bg-layer ts-bg-layer"><div class="ts-bg-layer-inner"></div></div>';
}
if( strpos($css, 'url(') !== false ) {
	$ts_classes[] = 'ts-col-bgimage-yes';
	$ts_customdiv = '<div class="ts-col-wrapper-bg-layer ts-bg-layer"><div class="ts-bg-layer-inner"></div></div>';
}
if( !empty($ts_shadow) ){ // Shadow
	$css_classes[] = 'ts-shadow-row';
}
if( !empty($zindex) ){
	if( $zindex=='zero' ){ $zindex='0'; }
	$css_classes[] = 'ts-zindex-'.$zindex;
}
$ts_class_list = implode( ' ', $ts_classes );
/**** ThemeStek custom changes End ****/





/**** ThemeStek custom changes START ****/
if( !empty($reduce_extra_padding) ){
	$css_classes[] = 'margin-15px-' . esc_attr($reduce_extra_padding) . '-colum';
}
/**** ThemeStek custom changes END ****/





$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

/***** Modified by ThemeStek - START *****/
?>

<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
	<div class="vc_column-inner <?php echo esc_attr( trim( vc_shortcode_custom_css_class( $css ) ). ' ' . themestek_sanitize_html_classes( $ts_class_list ) ); ?>">
		<?php echo themestek_wp_kses($ts_customdiv); // Added by ThemeStek  ?> 
		<div class="wpb_wrapper">
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>

<?php
/***** Modified by ThemeStek - END *****/



/**** Added by ThemeStek - code start ****/
$customStyle = '';
if(trim($css)!= ''){
	// Inline css
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	// background image layer
	$new_bgimage_element    = vc_shortcode_custom_css_class( $css, '' ). ' > .ts-col-wrapper-bg-layer';
	$newCSS   			    = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
	$themestek_inline_css .= themestek_vc_get_bg_css_only( $newCSS );
	
	// background color layer
	$new_bgimage_element2   = vc_shortcode_custom_css_class( $css, '' ). ' > .ts-col-wrapper-bg-layer > .ts-bg-layer-inner';
	$newCSS2   			    = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element2,$css );
	$themestek_inline_css .= themestek_vc_get_bg_css_only( $newCSS2, 'nobg' );
	
}

// Responsive padding margin option values
if( !empty($ts_responsive_css) ){
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	$themestek_inline_css .= ts_responsive_padding_margin( $ts_responsive_css, '.ts-column-inner>' );
}

/**** Added by ThemeStek - code end ****/






