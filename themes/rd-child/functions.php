<?php
/**
 * RD Engineering (Kadence Child): setup, performance and accessibility hooks.
 */

if (!defined('ABSPATH')) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/seo-footer.php';
require_once get_stylesheet_directory() . '/inc/icons.php';

/** Child stylesheet loads after the parent, versioned by file time for cache busting. */
add_action('wp_enqueue_scripts', function () {
	$path = get_stylesheet_directory() . '/style.css';
	wp_enqueue_style(
		'rd-child',
		get_stylesheet_uri(),
		array('kadence-global'),
		file_exists($path) ? filemtime($path) : null
	);

	if (is_front_page()) {
		$js = get_stylesheet_directory() . '/js/hero-process.js';
		if (file_exists($js)) {
			wp_enqueue_script(
				'rd-hero-process',
				get_stylesheet_directory_uri() . '/js/hero-process.js',
				array(),
				filemtime($js),
				true
			);
		}
	}
}, 20);

/** Preload display + body fonts (Brand Display / Bebas Neue and Poppins 400). */
add_action('wp_head', function () {
	foreach (array('bebas-neue-latin-400-normal.woff2', 'poppins-latin-400-normal.woff2') as $f) {
		if (file_exists(get_stylesheet_directory() . '/fonts/' . $f)) {
			echo '<link rel="preload" href="' . esc_url(get_stylesheet_directory_uri() . '/fonts/' . $f) . '" as="font" type="font/woff2" crossorigin>' . "\n";
		}
	}
}, 2);

/** Header logo from the brand folder: the full-colour horizontal lockup on the white header (guidelines p.8 and p.22). */
add_filter('kadence_custom_logo', function ($html) {
	$file = 'logo-color.png';
	if (!file_exists(get_stylesheet_directory() . '/img/' . $file)) {
		return $html;
	}
	$img = '<img class="custom-logo rd-logo" src="' . esc_url(get_stylesheet_directory_uri() . '/img/' . $file) . '" width="480" height="205" alt="' . esc_attr(get_bloginfo('name')) . '" decoding="async">';
	return preg_replace('/<img[^>]*>/', $img, $html, 1);
});

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

/**
 * Header extras (no JavaScript):
 *  - click-to-call link in the primary menu (before the quote button) and in the mobile drawer (after it)
 *  - language switcher shows EN / FR; the full language name stays for screen readers
 *  - current language marked with aria-current
 *  - Services sub-items get a desk icon and a one-line description (from the menu item's description field)
 */
function rd_phone_parts() {
	$tel = apply_filters('rd_phone', '+237695981047');
	return array($tel, apply_filters('rd_phone_display', '+237 695 981 047'));
}

add_filter('wp_nav_menu_items', function ($items, $args) {
	$loc = isset($args->theme_location) ? $args->theme_location : '';
	if ('primary' !== $loc && 'mobile' !== $loc) {
		return $items;
	}
	list($tel, $show) = rd_phone_parts();
	$fr    = rd_is_fr();
	$label = $fr ? 'Appeler le ' . $show : 'Call ' . $show;
	$li    = '<li class="menu-item rd-nav-phone"><a href="tel:' . esc_attr($tel) . '" aria-label="' . esc_attr($label) . '">'
		. rd_icon('phone', array('size' => 20, 'class' => 'rd-ico rd-ico--nav')) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		. '<span class="rd-nav-phone__num">' . esc_html($show) . '</span></a></li>';
	// Primary: before the quote button. Mobile: right after it. Fallback: at the end.
	if ('primary' === $loc && preg_match('/<li[^>]*class="[^"]*\bmenu-cta\b/', $items, $m, PREG_OFFSET_CAPTURE)) {
		return substr($items, 0, $m[0][1]) . $li . substr($items, $m[0][1]);
	}
	if ('mobile' === $loc && preg_match('/<li[^>]*class="[^"]*\bmenu-cta\b[^"]*"[^>]*>.*?<\/li>/s', $items, $m, PREG_OFFSET_CAPTURE)) {
		$end = $m[0][1] + strlen($m[0][0]);
		return substr($items, 0, $end) . $li . substr($items, $end);
	}
	return $items . $li;
}, 20, 2);

/** EN / FR labels: visible short code, full name for assistive tech. Runs after Polylang builds its items. */
add_filter('wp_nav_menu_objects', function ($objects) {
	foreach ($objects as $o) {
		if (!in_array('lang-item', (array) $o->classes, true)) {
			continue;
		}
		$code     = in_array('lang-item-fr', (array) $o->classes, true) ? 'FR' : 'EN';
		$name     = 'FR' === $code ? 'Français' : 'English';
		$o->title = '<span class="rd-lang__code" aria-hidden="true">' . $code . '</span><span class="screen-reader-text">' . $name . '</span>';
	}
	return $objects;
}, 30);

add_filter('nav_menu_link_attributes', function ($atts, $item) {
	if (in_array('lang-item', (array) $item->classes, true) && in_array('current-lang', (array) $item->classes, true)) {
		$atts['aria-current'] = 'true';
	}
	return $atts;
}, 10, 2);

add_filter('nav_menu_item_title', function ($title, $item, $args, $depth) {
	if ($depth < 1 || empty($item->description)) {
		return $title;
	}
	$icon = '';
	foreach ((array) $item->classes as $c) {
		if (0 === strpos($c, 'rd-sub-')) {
			$icon = rd_icon(substr($c, 7), array('size' => 22, 'class' => 'rd-ico rd-ico--sub'));
		}
	}
	return '<span class="rd-sub__ico" aria-hidden="true">' . $icon . '</span><span class="rd-sub__txt"><span class="rd-sub__t">' . $title . '</span><span class="rd-sub__d">' . esc_html($item->description) . '</span></span>';
}, 20, 4);

/** Mobile bar: call, WhatsApp, quote — icon + short label. */
add_action('wp_footer', function () {
	$phone    = apply_filters('rd_phone', '+237695981047');
	$whatsapp = apply_filters('rd_whatsapp', '237695981047');
	$quote    = apply_filters('rd_quote_url', home_url(rd_is_fr() ? '/fr/nous-contacter/' : '/contact/'));
	$fr       = rd_is_fr();
	?>
	<nav class="rd-mobile-bar" aria-label="<?php echo esc_attr($fr ? 'Contact rapide' : 'Quick contact'); ?>">
		<a href="tel:<?php echo esc_attr($phone); ?>">
			<?php echo rd_icon('phone', array('size' => 22)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span><?php echo esc_html($fr ? 'Appeler' : 'Call'); ?></span>
		</a>
		<a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" rel="noopener">
			<?php echo rd_icon('chat', array('size' => 22)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span>WhatsApp</span>
		</a>
		<a href="<?php echo esc_url($quote); ?>">
			<?php echo rd_icon('quote', array('size' => 22)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span><?php echo esc_html($fr ? 'Devis' : 'Quote'); ?></span>
		</a>
	</nav>
	<?php
});
