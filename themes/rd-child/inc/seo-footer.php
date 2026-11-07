<?php
/**
 * SEO basics (title + meta description from page meta) and the footer contact panel.
 * Replace the SEO part with a full SEO plugin later if wanted; it simply reads the same meta.
 */

if (!defined('ABSPATH')) {
	exit;
}

function rd_is_fr() {
	return function_exists('pll_current_language') && 'fr' === pll_current_language();
}

/** Footer copyright line follows the page language (Kadence stores one string for all languages). */
add_filter('theme_mod_footer_html_content', function ($value) {
	if (is_string($value) && rd_is_fr()) {
		return str_replace('All rights reserved.', 'Tous droits réservés.', $value);
	}
	return $value;
});

/** Document title from the _rd_seo_title page meta, when set. */
add_filter('pre_get_document_title', function ($title) {
	if (is_singular()) {
		$custom = get_post_meta(get_queried_object_id(), '_rd_seo_title', true);
		if ($custom) {
			return $custom;
		}
	}
	return $title;
});

/** Meta description from the _rd_seo_description page meta. */
add_action('wp_head', function () {
	if (!is_singular()) {
		return;
	}
	$desc = get_post_meta(get_queried_object_id(), '_rd_seo_description', true);
	if ($desc) {
		echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
	}
}, 1);

/** Open Graph and Twitter cards, so links look right when shared on WhatsApp, LinkedIn and Facebook. */
add_action('wp_head', function () {
	$title = wp_get_document_title();
	$desc  = is_singular() ? get_post_meta(get_queried_object_id(), '_rd_seo_description', true) : '';
	$img   = wp_get_attachment_image_url((int) get_option('rd_og_image_id'), 'full');
	$url   = is_singular() ? get_permalink() : home_url('/');
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:site_name" content="RD Engineering Solution">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
	if ($desc) {
		echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
	}
	echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
	if ($img) {
		echo '<meta property="og:image" content="' . esc_url($img) . '">' . "\n";
		echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	}
}, 2);

/** Contact Form 7 assets only where a form is shown (saves requests on every other page). */
function rd_has_form_page() {
	// Contact pages and water laboratory pages (EN and FR slugs) hold forms
	return is_page(array('contact', 'nous-contacter', 'water-laboratory', 'laboratoire-eau'));
}
add_filter('wpcf7_load_js', function ($load) {
	return rd_has_form_page() ? $load : false;
});
add_filter('wpcf7_load_css', function ($load) {
	return rd_has_form_page() ? $load : false;
});

/** Footer contact panel, shown above Kadence's footer. */
add_action('kadence_before_footer', function () {
	$fr = rd_is_fr();
	$t = $fr ? array(
		'title' => 'RD Engineering Solution',
		'tag'   => 'Eau, assainissement et énergie en Afrique',
		'addr'  => 'Bonassama-Douala, Cameroun',
		'hours' => 'Lun au ven, 9h à 18h ; samedi sur rendez-vous',
		'quote' => 'Demander un devis',
		'quote_url' => home_url('/fr/nous-contacter/'),
	) : array(
		'title' => 'RD Engineering Solution',
		'tag'   => 'Water, Sanitation and Energy in Africa',
		'addr'  => 'Bonassama-Douala, Cameroon',
		'hours' => 'Mon to Fri, 9:00 to 18:00; Saturday by appointment',
		'quote' => 'Request a quote',
		'quote_url' => home_url('/contact/'),
	);
	$phone = apply_filters('rd_phone', '+237695981047');
	?>
	<section class="rd-footer-contact" aria-label="<?php echo esc_attr($t['title']); ?>">
		<div class="rd-container rd-footer-contact__inner">
			<div>
				<p class="rd-footer-contact__brand"><?php echo esc_html($t['title']); ?></p>
				<p><?php echo esc_html($t['tag']); ?></p>
			</div>
			<div>
				<p><?php echo esc_html($t['addr']); ?></p>
				<p><?php echo esc_html($t['hours']); ?></p>
			</div>
			<div>
				<p><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html('+237 695 981 047'); ?></a></p>
				<p><a class="rd-btn" href="<?php echo esc_url($t['quote_url']); ?>"><?php echo esc_html($t['quote']); ?></a></p>
			</div>
		</div>
	</section>
	<?php
});
