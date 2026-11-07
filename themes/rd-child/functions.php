<?php
/**
 * RD Engineering (Kadence Child): setup, performance and accessibility hooks.
 */

if (!defined('ABSPATH')) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/seo-footer.php';

/** Child stylesheet loads after the parent, versioned by file time for cache busting. */
add_action('wp_enqueue_scripts', function () {
	$path = get_stylesheet_directory() . '/style.css';
	wp_enqueue_style(
		'rd-child',
		get_stylesheet_uri(),
		array('kadence-global'),
		file_exists($path) ? filemtime($path) : null
	);
}, 20);

/** Skip link: first focusable element on every page. */
add_action('wp_body_open', function () {
	echo '<a class="rd-skip-link" href="#main">' . esc_html(rd_is_fr() ? 'Aller au contenu' : 'Skip to content') . '</a>';
});

/** Remove WordPress emoji scripts and styles (an extra request and inline script per page). */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

/** Remove head clutter that adds bytes but no value. */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

/** Load images lazily by default; WordPress already skips the first image for LCP. */
add_filter('wp_lazy_loading_enabled', '__return_true');

/** Mobile bar: call, WhatsApp, quote. Numbers come from filters so they are set in one place. */
add_action('wp_footer', function () {
	$phone    = apply_filters('rd_phone', '+237695981047');
	$whatsapp = apply_filters('rd_whatsapp', '237695981047');
	$quote    = apply_filters('rd_quote_url', home_url(rd_is_fr() ? '/fr/nous-contacter/' : '/contact/'));
	?>
	<nav class="rd-mobile-bar" aria-label="<?php echo esc_attr(rd_is_fr() ? 'Contact rapide' : 'Quick contact'); ?>">
		<a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html(rd_is_fr() ? 'Appeler' : 'Call'); ?></a>
		<a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" rel="noopener"><?php echo esc_html__('WhatsApp', 'rd-child'); ?></a>
		<a href="<?php echo esc_url($quote); ?>"><?php echo esc_html(rd_is_fr() ? 'Demander un devis' : 'Request a quote'); ?></a>
	</nav>
	<?php
});
