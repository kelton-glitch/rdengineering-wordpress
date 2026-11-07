<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';

/**** ThemeStek custom changes START ****/
$ts_textcolor = $ts_bgcolor = $ts_stretched_column = '';
/**** ThemeStek custom changes END ****/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

/**** ThemeStek custom changes START ****/
// Stretch ROW when stretched bgimage is active
if( ( !empty($first_col_boximage) || !empty($last_col_boximage) ) && ($ts_stretched_column=='first' || $ts_stretched_column=='last' || $ts_stretched_column=='both') ){
	$full_width = 'stretch_row';
}
/**** ThemeStek custom changes END ****/

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	//'vc_row',  // removed by ThemeStek
	'ts-row',  // added by ThemeStek. This is common class so we can design all rows.
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
	ts_responsive_padding_margin_class( $ts_responsive_css ),  // Added by ThemeStek
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $atts['rtl_reverse'] ) ) {
	$css_classes[] = 'vc_rtl-columns-reverse';
}



/**** ThemeStek custom changes START ****/
if( !empty($ts_responsive_css) ){
	$ts_responsive_css_array = explode('|',$ts_responsive_css);
	
	if( !empty($ts_responsive_css_array[1]) && $ts_responsive_css_array[1]=='colbreak_yes' ){ // 1200
		//$css_classes[] = 'break-' . esc_attr($break_in_responsive) . '-colum';
		$css_classes[] = 'ts-break-col-1200';
	}
	
	if( !empty($ts_responsive_css_array[10]) && $ts_responsive_css_array[10]=='colbreak_yes' ){  // 991
		$css_classes[] = 'ts-break-col-991';
	}
	
	if( !empty($ts_responsive_css_array[19]) && $ts_responsive_css_array[19]=='colbreak_yes' ){  // 767
		$css_classes[] = 'ts-break-col-767';
	}
	
	if( !empty($ts_responsive_css_array[29]) && $ts_responsive_css_array[29]=='colbreak_yes' ){  // custom
		$css_classes[] = 'ts-break-col-custom';
	}
}
/**** ThemeStek custom changes END ******/





/**** ThemeStek custom changes START ****/
$total_columns         = '1';
$first_col_bg_img_html = '';
$last_col_bg_img_html  = '';
$first_icon			   = '';
$last_icon			   = '';

if( !empty($content) ){
    // Count total columns
	$total_columns = substr_count($content, '[vc_column ') + substr_count($content, '[vc_column]');
	$css_classes[] = 'ts-total-col-' . $total_columns;
	
	
	if( !empty($first_col_boximage) && ($ts_stretched_column=='first' || $ts_stretched_column=='both') ){
		$first_img_src         = wp_get_attachment_image_src($first_col_boximage, 'full');
		$first_col_bg_img_html = '<div class="ts-stretched-bg ts-stretched-bg-first-col">';
		$stretced_css_classes  = '';
		
		if( !empty($ts_stretched_bgimage_position) ){
			$stretced_css_classes .= ' ts-bgimage-position-'.$ts_stretched_bgimage_position;
		}
		
		if( !empty($ts_stretched_bgimage_repeat) ){
			$stretced_css_classes .= ' ts-bgimage-repeat-'.$ts_stretched_bgimage_repeat;
		}
		
		// First icon
		if( !empty($ts_stretched_left_icon) ){
			$first_icon = ( $ts_stretched_left_icon=='video' ) ? '<i class="ts-labtechco-icon-play"></i>' : '<i class="ts-labtechco-icon-gallery-1"></i>' ;
			if( !empty($ts_stretched_left_icon_url) ){
				$first_icon = '<a title="'.$first_icon.'" href="'.$ts_stretched_left_icon_url.'" data-rel="prettyPhoto">'.$first_icon.'</a>';
			}
			$first_icon = '<span class="ts-stretched-icon-wrapper">'.$first_icon.'</span>';
		}
		
		// Last icon
		if( !empty($ts_stretched_right_icon) ){
			$last_icon = ( $ts_stretched_right_icon=='video' ) ? '<i class="ts-labtechco-icon-play"></i>' : '<i class="ts-labtechco-icon-gallery-1"></i>' ;
			if( !empty($ts_stretched_right_icon_url) ){
				$last_icon = '<a title="'.$last_icon.'" href="'.$ts_stretched_right_icon_url.'" data-rel="prettyPhoto">'.$last_icon.'</a>';
			}
			$last_icon = '<span class="ts-stretched-icon-wrapper">'.$last_icon.'</span>';
		}
		
		
		switch( $total_columns ){
			case '2':
				$first_col_bg_img_html .= '<div class="col-md-6 ts-stretched-bg-col '.esc_html($stretced_css_classes).'" style="background-image:url(\''.$first_img_src[0].'\')">'.$first_icon.'</div>
				<div class="col-md-6"></div>';
				break;
			case '3':
				$first_col_bg_img_html .= '<div class="col-md-4 ts-stretched-bg-col '.esc_html($stretced_css_classes).'" style="background-image:url(\''.$first_img_src[0].'\')">'.$first_icon.'</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>';
				break;
			case '4':
				$first_col_bg_img_html .= '<div class="col-md-3 ts-stretched-bg-col '.esc_html($stretced_css_classes).'" style="background-image:url(\''.$first_img_src[0].'\')">'.$first_icon.'</div>
				<div class="col-md-3"></div>
				<div class="col-md-3"></div>
				<div class="col-md-3"></div>';
				break;
		}
		
		$first_col_bg_img_html .= '</div>';
	}
    
    if( !empty($last_col_boximage) && ($ts_stretched_column=='last' || $ts_stretched_column=='both') ){
		$last_img_src         = wp_get_attachment_image_src($last_col_boximage, 'full');
		$last_col_bg_img_html = '<div class="ts-stretched-bg ts-stretched-bg-last-col">';
		
		switch( $total_columns ){
			case '2':
				$last_col_bg_img_html .= '<div class="col-md-6"></div>
				<div class="col-md-6 ts-stretched-bg-col" style="background-image:url(\''.$last_img_src[0].'\')">'.$last_icon.'</div>';
				break;
			case '3':
				$last_col_bg_img_html .= '<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4 ts-stretched-bg-col" style="background-image:url(\''.$last_img_src[0].'\')">'.$last_icon.'</div>';
				break;
			case '4':
				$last_col_bg_img_html .= '<div class="col-md-3"></div>
				<div class="col-md-3"></div>
				<div class="col-md-3"></div>
				<div class="col-md-3 ts-stretched-bg-col" style="background-image:url(\''.$last_img_src[0].'\')">'.$last_icon.'</div>';
				break;
		}
		$last_col_bg_img_html .= '</div>';
	}
	
}



if( !empty($ts_stretched_column) ){
	$css_classes[] = 'ts-stretched-col ts-stretched-col-' . $ts_stretched_column;
}


/**** ThemeStek custom changes END ******/



/**** ThemeStek custom changes START ****/
if( !empty($zindex) ){
	if( $zindex=='zero' ){ $zindex='0'; }
	$css_classes[] = 'ts-zindex-'.$zindex;
}

/**** ThemeStek custom changes END ******/


/*  // Removed by ThemeStek
if( !empty($border_screw) ){
	$css_classes[] = '' . esc_attr($border_screw) . '-row';
}
*/

/**** ThemeStek custom changes START ****/
// Add container in Default condition
$ts_container_div_open  = '';
$ts_container_div_close = '';
$ts_container_class     = array('vc_row');


if( $full_width=='' ){  // Row Stretch: Default
	$css_classes[] = 'vc_row';
	$css_classes[] = 'container';
	foreach( array_keys($ts_container_class, 'vc_row') as $key ){
		unset($ts_container_class[$key]);
	}
}

if( $full_width=='stretch_row' ){  // Row Stretch: Stretch Row
	$ts_container_div_open  = '<div class="container"><!-- ThemeStek custom DIV added -->';
	$ts_container_div_close = '</div><!-- ThemeStek custom DIV added -->';
	$ts_container_class[] = 'container';
}
/**** ThemeStek custom changes END ****/





/**** ThemeStek custom changes START ****/


if( !empty($ts_textcolor) ){
	$css_classes[] = 'ts-textcolor-'.$ts_textcolor;
}
if( !empty($ts_bgcolor) ){
	$css_classes[] = 'ts-bgcolor-'.$ts_bgcolor;
}
if( !empty($ts_bgimage_position) ){
	$css_classes[] = 'ts-bgimage-position-'.$ts_bgimage_position;
}

/**** ThemeStek custom changes END ****/



if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	//$css_classes[] = 'vc_column-gap-'.$atts['gap'];  // removed by ThemeStek
	$ts_container_class[] = 'vc_column-gap-'.$atts['gap'];  // added by ThemeStek
	$ts_container_class[] = 'vc_row';  // added by ThemeStek
	$ts_container_class[] = 'container';  // added by ThemeStek
	$css_classes = array_diff($css_classes, array("vc_row"));  // modified by ThemeStek
	$css_classes = array_diff($css_classes, array("container"));  // modified by ThemeStek
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row';  // removed by ThemeStek
		
		/**** added by ThemeStek START ****/
		foreach( array_keys($ts_container_class, 'vc_row') as $key ){
			unset($ts_container_class[$key]);
		}
		
		if (!empty($atts['gap'])) {
			foreach( array_keys($ts_container_class, 'vc_column-gap-'.$atts['gap'] ) as $key ){
				unset($ts_container_class[$key]);
			}
			$css_classes[] = 'vc_column-gap-'.$atts['gap'];  // added by ThemeStek
		}
		/**** added by ThemeStek END ****/
		
		
		
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		//$css_classes[] = 'vc_row-no-padding';  // Removed by ThemeStek
		$ts_container_class[] = 'vc_row-no-padding'; // added by ThemeStek
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$ts_container_class[] = 'vc_row-o-equal-height';  // addd by ThemeStek
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$ts_container_class[] = 'vc_row-flex';  // addd by ThemeStek  
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}


/**** ThemeStek custom changes START ****/
$ts_bgimage = false;
if( !empty( $parallax_image ) || strpos($css, 'url(') !== false || $has_video_bg==true ){
	$ts_bgimage 	= true;
	$css_classes[]  = 'ts-bg';
	$css_classes[]  = 'ts-bgimage-yes';
}
/**** ThemeStek custom changes END ****/


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
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';


/**** ThemeStek custom changes START ****/
global $ts_mainchimp_formrow;
$ts_mainchimp_formrow = '';
if (strpos($css_class, 'ts-mailchimp-formrow') !== false) {
	$ts_mainchimp_formrow = 'yes';
}
/**** ThemeStek custom changes END ****/

?>




<div <?php echo implode( ' ', $wrapper_attributes ) ?>>

    <?php echo themestek_wp_kses($first_col_bg_img_html); // ThemeStek - added ?>
    <?php echo themestek_wp_kses($last_col_bg_img_html);  // ThemeStek - added ?>

	<?php if ( $ts_bgimage == true || $has_video_bg==true ) { // ThemeStek custom changes START  ?>
		<div class="ts-row-wrapper-bg-layer ts-bg-layer"></div><!-- ThemeStek custom DIV added -->
	<?php } // ThemeStek custom changes END ?>
	
	<?php if( !empty($ts_container_class) ): // ThemeStek custom changes START ?> <div class="<?php echo implode( ' ', $ts_container_class ); ?>"> <?php endif; // ThemeStek custom changes END ?>
	
		<?php echo wpb_js_remove_wpautop( $content ); ?>
		
	<?php if( !empty($ts_container_class) ): // ThemeStek custom changes START ?> </div> <?php endif; // ThemeStek custom changes END ?>
</div>


<?php
echo wp_kses( /* html Filter */
	$after_output,
	array(
		'div'    => array(
			'class' => array(),
		),
		'span'    => array(
			'class' => array(),
		),
		'p'    => array(
			'class' => array(),
		),
		'img' => array(
			'class'  => array(),
			'src'    => array(),
			'alt'    => array(),
			'title'  => array(),
			'width'  => array(),
			'height' => array(),
		),
	)
);
?>





<?php
/**** Added by ThemeStek - code start ****/

$customStyle = '';
if(trim($css)!= ''){
	$new_bgimage_element = vc_shortcode_custom_css_class( $css, '' ). ' > .ts-row-wrapper-bg-layer';
	$newCSS   			 = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
	$customStyle  		.= $newCSS;
	
	// Inline CSS global variable
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	$themestek_inline_css .= trim($newCSS);
	$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' > .ts-row-wrapper-bg-layer{background-image: none !important;margin: 0 !important;padding: 0 !important;}';
}

// Responsive padding margin option values
if( !empty($ts_responsive_css) ){
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	$themestek_inline_css .= ts_responsive_padding_margin( $ts_responsive_css, '.ts-row' );
}

/**** Added by ThemeStek - code end ****/
