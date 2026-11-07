<?php
// [ts-dropcap]D[/ts-dropcap]
// [ts-dropcap style="square"]A[/ts-dropcap]
// [ts-dropcap style="rounded"]B[/ts-dropcap]
// [ts-dropcap style="round"]C[/ts-dropcap]
// [ts-dropcap color="skincolor"]A[/ts-dropcap]
// [ts-dropcap color="grey"]B[/ts-dropcap]
// [ts-dropcap color="dark"]B[/ts-dropcap]
// [ts-dropcap bgcolor="skincolor"]A[/ts-dropcap]
// [ts-dropcap bgcolor="grey"]B[/ts-dropcap]
// [ts-dropcap bgcolor="dark"]B[/ts-dropcap]
if( !function_exists('themestek_sc_dropcap') ){
function themestek_sc_dropcap( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		'style'   => '',
		'color'   => 'skincolor',
		'bgcolor' => '',
	), $atts ) );
	
	if( empty($color) ){
		$color = 'skincolor';
	}
	
	$class = array();
	$class[] = 'ts-dropcap';
	$class[] = 'ts-dcap-style-' . $style;
	$class[] = 'ts-dcap-txt-color-' . $color;
	$class[] = 'ts-' . $color;
	$class[] = 'ts-bgcolor-' . $bgcolor;
	
	$class = implode( ' ', $class );
	
	return '<span class="' . themestek_sanitize_html_classes($class) . '">' . esc_attr($content) . '</span>';
}
}
add_shortcode( 'ts-dropcap', 'themestek_sc_dropcap' );