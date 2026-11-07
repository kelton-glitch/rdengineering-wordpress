<?php
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper',10);
add_action('woocommerce_before_main_content', 'themestek_woocommerce_output_content_wrapper',11);
if( !function_exists('themestek_woocommerce_output_content_wrapper') ){
function themestek_woocommerce_output_content_wrapper() {
	?>
	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?> <?php echo themestek_sanitize_html_classes(themestek_page_container_optional()); ?>">
		<main id="main" class="site-main">
	<?php
}
}

remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end',10);
add_action('woocommerce_after_main_content', 'themestek_woocommerce_output_content_wrapper_end', 11);
if( !function_exists('themestek_woocommerce_output_content_wrapper_end') ){
function themestek_woocommerce_output_content_wrapper_end() {
	?>
		</main>
	</div>
	<?php
}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'themestek_wc_loop_columns',20);
if (!function_exists('themestek_wc_loop_columns')){
function themestek_wc_loop_columns() {
	$woocommerce_column = themestek_get_option('woocommerce-column');
	$woocommerce_column = !empty($woocommerce_column) ? $woocommerce_column : 3 ;
	return $woocommerce_column; // 3 products per row
}
}

add_filter( 'loop_shop_per_page', 'themestek_wc_loop_shop_per_page', 20 );
if (!function_exists('themestek_wc_loop_shop_per_page')){
function themestek_wc_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$woocommerce_product_per_page = themestek_get_option('woocommerce-product-per-page');
	$cols = !empty($woocommerce_product_per_page) ? trim(esc_attr($woocommerce_product_per_page)) : $cols ;
	
	return $cols;
}
}

/**
 *  WooCommerce : Settings for related products on single page
 */
$show_related = themestek_get_option('wc-single-show-related');
if( $show_related==true ){
	
	// Single product related products : Setting Column AND also setting how many products like to show
	add_filter( 'woocommerce_output_related_products_args', 'themestek_related_products_args' );
	if (!function_exists('themestek_related_products_args')){
	function themestek_related_products_args( $args ) {
		$related_product_column = themestek_get_option('wc-single-related-column');
		$related_product_show   = themestek_get_option('wc-single-related-count');
		$wc_related_column = ( !empty($related_product_column) ) ? intval($related_product_column) : 3 ;
		$wc_related_show   = ( !empty($related_product_show) ) ? intval($related_product_show) : 3 ;
		$args['columns']        = $wc_related_column; // arranged in columns
		$args['posts_per_page'] = $wc_related_show; // arranged in columns
		return $args;
	}
	}
	
} else {
	
	// Remove related products from single view
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

}