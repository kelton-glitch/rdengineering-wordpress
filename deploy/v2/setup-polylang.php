<?php
/**
 * Polylang setup for v2: languages, URL settings, English assignment, English menu mapping.
 *
 * Order:  seed-pages.php  ->  setup-polylang.php  ->  seed-pages-fr.php
 * Run:    wp eval-file deploy/v2/setup-polylang.php
 * Safe to re-run.
 *
 * Needs the Polylang plugin active. Language packs (fr_FR) are installed separately:
 *   wp language core install fr_FR
 *   wp language theme install kadence fr_FR
 *   wp language plugin install contact-form-7 fr_FR
 *   wp language plugin install polylang fr_FR
 */

if (!defined('ABSPATH')) {
	exit;
}
if (!function_exists('PLL') || !PLL() || !isset(PLL()->model)) {
	echo "Polylang is not active; activate it first.\n";
	return;
}

$langs = PLL()->model->languages;

/* 1) Languages: English is the default and keeps its current URLs; French lives under /fr/ */
$wanted = array(
	'en' => array('English', 'en_US', 0, 'gb'),
	'fr' => array('Français', 'fr_FR', 1, 'fr'),
);
foreach ($wanted as $slug => $a) {
	if ($langs->get($slug)) {
		echo "language $slug exists\n";
		continue;
	}
	$r = $langs->add(array('name' => $a[0], 'slug' => $slug, 'locale' => $a[1], 'rtl' => 0, 'term_group' => $a[2], 'flag' => $a[3]));
	echo "language $slug: " . (is_wp_error($r) ? $r->get_error_message() : 'added') . "\n";
}

/* 2) Settings (written directly: Polylang's settings API is not loaded in WP-CLI) */
$o = get_option('polylang');
$o['default_lang'] = 'en';
$o['force_lang']   = 1;   // language from the URL directory: /fr/
$o['hide_default'] = 1;   // English has no /en/ prefix
$o['rewrite']      = 1;   // no index.php in URLs
$o['browser']      = 0;   // do not redirect by browser language
$o['redirect_lang'] = 1;  // French home is /fr/ instead of /fr/accueil/
update_option('polylang', $o);
echo "settings saved\n";

/* 3) Everything that already exists is English */
$n = 0;
foreach (get_posts(array('post_type' => array('page', 'post'), 'post_status' => 'any', 'numberposts' => -1, 'lang' => '')) as $p) {
	if (!pll_get_post_language($p->ID)) {
		pll_set_post_language($p->ID, 'en');
		$n++;
	}
}
echo "existing posts set to English: $n\n";

/* 4) English menus are used for English only */
$theme = get_option('stylesheet');
$o = get_option('polylang');
foreach ((array) get_theme_mod('nav_menu_locations', array()) as $loc => $menuId) {
	if ($menuId) {
		$o['nav_menus'][$theme][$loc]['en'] = (int) $menuId;
	}
}
update_option('polylang', $o);

/* 5) Language switcher as the last item of the English main menu */
$main = wp_get_nav_menu_object('Main menu');
if ($main) {
	$has = false;
	foreach ((array) wp_get_nav_menu_items($main->term_id) as $it) {
		if ('#pll_switcher' === $it->url) {
			$has = true;
		}
	}
	if (!$has) {
		$id = wp_update_nav_menu_item($main->term_id, 0, array('menu-item-type' => 'custom', 'menu-item-url' => '#pll_switcher', 'menu-item-title' => 'Languages', 'menu-item-status' => 'publish', 'menu-item-position' => 99));
		if (!is_wp_error($id)) {
			update_post_meta($id, '_pll_menu_item', array('hide_if_no_translation' => 0, 'hide_current' => 0, 'force_home' => 0, 'show_flags' => 0, 'show_names' => 1, 'dropdown' => 0));
			echo "switcher added to English menu\n";
		}
	} else {
		echo "switcher already in English menu\n";
	}
}
flush_rewrite_rules();
echo "done\n";
