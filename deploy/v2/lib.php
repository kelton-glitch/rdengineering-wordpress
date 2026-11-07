<?php
/**
 * Shared helpers for the v2 seeders (English and French): block markup builders,
 * image import, menu builder. Loaded with require_once by seed-pages.php and seed-pages-fr.php.
 */

if (!defined('ABSPATH')) {
	exit;
}

/* ---------------------------------------------------------------------------
 * Block markup helpers (core blocks only: light, editable, no page builder)
 * ------------------------------------------------------------------------- */
function rd_p($t, $cls = '') {
	$c = $cls ? ' {"className":"' . $cls . '"}' : '';
	$a = $cls ? ' class="' . $cls . '"' : '';
	return "<!-- wp:paragraph$c --><p$a>$t</p><!-- /wp:paragraph -->\n";
}
function rd_h($t, $l = 2, $cls = '') {
	$c = '{"level":' . $l . ($cls ? ',"className":"' . $cls . '"' : '') . '}';
	$a = 'wp-block-heading' . ($cls ? ' ' . $cls : '');
	return "<!-- wp:heading $c --><h$l class=\"$a\">$t</h$l><!-- /wp:heading -->\n";
}
function rd_ul(array $items) {
	$o = "<!-- wp:list --><ul class=\"wp-block-list\">";
	foreach ($items as $i) {
		$o .= "<!-- wp:list-item --><li>$i</li><!-- /wp:list-item -->";
	}
	return $o . "</ul><!-- /wp:list -->\n";
}
function rd_btns(array $btns) {
	$o = "<!-- wp:buttons --><div class=\"wp-block-buttons\">";
	foreach ($btns as $b) {
		$ghost = !empty($b[2]);
		$x = !empty($b[3]) ? ' ' . $b[3] : '';
		$cn = trim(($ghost ? 'is-style-outline' : '') . $x);
		$c = $cn ? ' {"className":"' . $cn . '"}' : '';
		$cls = 'wp-block-button' . ($cn ? ' ' . $cn : '');
		$o .= "<!-- wp:button$c --><div class=\"$cls\"><a class=\"wp-block-button__link wp-element-button\" href=\"{$b[1]}\">{$b[0]}</a></div><!-- /wp:button -->";
	}
	return $o . "</div><!-- /wp:buttons -->\n";
}
function rd_group($inner, $cls, $full = false, $anchor = '') {
	$attrs = '{' . ($full ? '"align":"full",' : '') . ($anchor ? '"anchor":"' . $anchor . '",' : '') . '"className":"' . $cls . '"}';
	$class = 'wp-block-group' . ($full ? ' alignfull' : '') . ' ' . $cls;
	return "<!-- wp:group $attrs --><div" . ($anchor ? " id=\"$anchor\"" : '') . " class=\"$class\">\n$inner</div><!-- /wp:group -->\n";
}
function rd_section($inner, $mist = false, $extra = '', $anchor = '') {
	return rd_group(rd_group($inner, 'rd-container'), 'rd-section' . ($mist ? ' rd-section--mist' : '') . ($extra ? ' ' . $extra : ''), true, $anchor);
}
function rd_cards(array $cards, $level = 3) {
	$o = '';
	foreach ($cards as $c) {
		// [title, text, url, linkLabel, imageId, bullets[], anchor, extraHtml]
		$inner = (!empty($c[4]) ? rd_img($c[4], 'rd-card__img', '', 'large', 'sizes="(max-width: 600px) 90vw, (max-width: 1000px) 44vw, 22vw" loading="lazy" decoding="async"') : '') . rd_h($c[0], $level) . rd_p($c[1]);
		if (!empty($c[5])) {
			$inner .= rd_ul($c[5]);
		}
		if (!empty($c[7])) {
			$inner .= $c[7];
		}
		if (!empty($c[2])) {
			$inner .= rd_p('<a href="' . $c[2] . '">' . ($c[3] ?? ($GLOBALS['rd_learn_more'] ?? 'Learn more')) . ' &rarr;</a>', 'rd-card__link');
		}
		$o .= rd_group($inner, 'rd-card', false, !empty($c[6]) ? $c[6] : '');
	}
	return rd_group($o, 'rd-grid');
}
function rd_details($q, $a) {
	return "<!-- wp:details --><details class=\"wp-block-details\"><summary>$q</summary>" .
		"<!-- wp:paragraph --><p>$a</p><!-- /wp:paragraph --></details><!-- /wp:details -->\n";
}
function rd_placeholder($t) {
	$label = isset($GLOBALS['rd_todo']) ? $GLOBALS['rd_todo'] : 'To be completed:';
	return rd_p('<strong>' . $label . '</strong> ' . $t, 'rd-placeholder');
}

/* ---------------------------------------------------------------------------
 * Images: optimised WebP files live in deploy/v2/images and are imported once.
 * ------------------------------------------------------------------------- */
function rd_images_dir() {
	return dirname(dirname(realpath(get_theme_root() . '/rd-child'))) . '/deploy/v2/images/';
}

/** Import an image once (matched by file name); returns the attachment ID, or 0 on failure. */
function rd_image($file, $alt) {
	$existing = get_posts(array('post_type' => 'attachment', 'post_status' => 'inherit', 'meta_key' => '_rd_source', 'meta_value' => $file, 'numberposts' => 1, 'fields' => 'ids'));
	if ($existing) {
		update_post_meta($existing[0], '_wp_attachment_image_alt', $alt);
		return (int) $existing[0];
	}
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';
	$src = rd_images_dir() . $file;
	if (!file_exists($src)) {
		echo "MISSING image $file\n";
		return 0;
	}
	$tmp = wp_tempnam($file);
	copy($src, $tmp);
	$id = media_handle_sideload(array('name' => $file, 'tmp_name' => $tmp), 0);
	if (is_wp_error($id)) {
		@unlink($tmp);
		echo "ERROR image $file: " . $id->get_error_message() . "\n";
		return 0;
	}
	update_post_meta($id, '_rd_source', $file);
	update_post_meta($id, '_wp_attachment_image_alt', $alt);
	return (int) $id;
}

/** Image block. The caption marks AI-generated pictures honestly; pass '' for real photos or logos. */
function rd_img($id, $cls = '', $caption = 'Illustrative image', $size = 'large', $extra = '', $altOverride = null) {
	if (!$id) {
		return '';
	}
	$extra = $extra ? ' ' . $extra : '';
	$url = wp_get_attachment_image_url($id, $size);
	// Alt text: explicit override, then a per-language map set by the seeder, then the attachment's own alt
	if (null !== $altOverride) {
		$alt = $altOverride;
	} elseif (isset($GLOBALS['rd_alt'][$id])) {
		$alt = $GLOBALS['rd_alt'][$id];
	} else {
		$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
	}
	// Default caption follows the seeder's language
	if ('Illustrative image' === $caption && isset($GLOBALS['rd_caption'])) {
		$caption = $GLOBALS['rd_caption'];
	}
	$attrs = '{"id":' . $id . ',"sizeSlug":"' . $size . '","linkDestination":"none"' . ($cls ? ',"className":"' . $cls . '"' : '') . '}';
	$cap = $caption ? '<figcaption class="wp-element-caption">' . $caption . '</figcaption>' : '';
	return "<!-- wp:image $attrs --><figure class=\"wp-block-image size-$size" . ($cls ? " $cls" : '') . "\"><img src=\"$url\" alt=\"" . esc_attr($alt) . "\" class=\"wp-image-$id\"$extra/>$cap</figure><!-- /wp:image -->\n";
}


function rd_build_menu($name, array $items, $ids) {
	$menu = wp_get_nav_menu_object($name);
	$mid = $menu ? $menu->term_id : wp_create_nav_menu($name);
	foreach ((array) wp_get_nav_menu_items($mid) as $old) {
		wp_delete_post($old->ID, true);
	}
	$pos = 1;
	$byslug = array();
	foreach ($items as $it) {
		list($label, $slug, $parentSlug, $cls) = array_pad($it, 4, null);
		if (!isset($ids[$slug])) {
			continue;
		}
		$args = array(
			'menu-item-title' => $label, 'menu-item-object-id' => $ids[$slug], 'menu-item-object' => 'page',
			'menu-item-type' => 'post_type', 'menu-item-status' => 'publish', 'menu-item-position' => $pos++,
			'menu-item-parent-id' => $parentSlug && isset($byslug[$parentSlug]) ? $byslug[$parentSlug] : 0,
		);
		if ($cls) {
			$args['menu-item-classes'] = $cls;
		}
		$key = $cls ? $slug . ':' . $cls : $slug;
		$byslug[$key] = wp_update_nav_menu_item($mid, 0, $args);
		if (!isset($byslug[$slug])) {
			$byslug[$slug] = $byslug[$key];
		}
	}
	return $mid;
}

require_once __DIR__ . "/components.php";
