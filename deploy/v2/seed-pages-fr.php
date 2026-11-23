<?php
/**
 * French version of the v2 pages (Polylang). Builds each page from the English page it translates.
 *
 * Order:  seed-pages.php  ->  setup-polylang.php  ->  seed-pages-fr.php
 * Run:    wp eval-file deploy/v2/seed-pages-fr.php
 * Safe to re-run: an existing French translation is updated in place.
 *
 * Copy rules are the same as the English seeder: only facts the owner already publishes.
 * Unknown facts are visible "À compléter" boxes.
 */

if (!defined('ABSPATH')) {
	exit;
}
$rdDeploy = dirname(dirname(realpath(get_theme_root() . '/rd-child'))) . '/deploy/v2/';
require_once $rdDeploy . 'lib.php';

if (!function_exists('pll_set_post_language') || !function_exists('pll_get_post')) {
	echo "Polylang is not active; run setup-polylang.php first.\n";
	return;
}

// Labels used by the shared helpers
$GLOBALS['rd_caption']    = 'Image d’illustration';
$GLOBALS['rd_learn_more'] = 'En savoir plus';
$GLOBALS['rd_todo']       = 'À compléter :';

/* ---------------------------------------------------------------------------
 * Images (imported by the English seeder) with French alt text
 * ------------------------------------------------------------------------- */
$img = array(
	'hero'        => rd_find_image('hero.webp'),
	'engineering' => rd_find_image('engineering.webp'),
	'laboratory'  => rd_find_image('laboratory.webp'),
	'training'    => rd_find_image('training.webp'),
	'products'    => rd_find_image('products.webp'),
	'team'        => rd_find_image('team-meeting.webp'),
	'community'   => rd_find_image('community.webp'),
);
$altFr = array(
	'hero'        => 'Illustration : un ingénieur accroupi près d’un point d’eau à pompe manuelle, avec des enfants et des bidons d’eau à proximité',
	'engineering' => 'Illustration : des ingénieurs devant des équipements de traitement de l’eau et des panneaux solaires dans une salle d’exposition',
	'laboratory'  => 'Illustration : des techniciens de laboratoire en blouse blanche analysant des échantillons d’eau',
	'training'    => 'Illustration : un technicien présente une pompe à eau solaire à un groupe de la communauté',
	'products'    => 'Illustration : des produits de traitement de l’eau et des filtres sur une table devant un groupe de la communauté',
	'team'        => 'Illustration : une réunion d’équipe avec une présentation sur des projets d’eau',
	'community'   => 'Illustration : un site de traitement de l’eau alimenté par l’énergie solaire, avec des éoliennes et une communauté autour d’une pompe',
);
$GLOBALS['rd_alt'] = array();
foreach ($altFr as $k => $alt) {
	if (!empty($img[$k])) {
		$GLOBALS['rd_alt'][$img[$k]] = $alt;
	}
}

require_once $rdDeploy . 'content.php';

/* ---------------------------------------------------------------------------
 * URLs of the French pages
 * ------------------------------------------------------------------------- */
$U = array(
	'home'                 => '/fr/',
	'services'             => '/fr/nos-services/',
	'engineering-services' => '/fr/nos-services/services-ingenierie/',
	'water-laboratory'     => '/fr/nos-services/laboratoire-eau/',
	'professional-training' => '/fr/nos-services/formation-professionnelle/',
	'products'             => '/fr/nos-services/produits/',
	'about'                => '/fr/a-propos/',
	'tenders'              => '/fr/appels-d-offres/',
	'faq'                  => '/fr/foire-aux-questions/',
	'contact'              => '/fr/nous-contacter/',
	'privacy'              => '/fr/confidentialite/',
);

$cta = rd_btns(array(array('Demander un devis', $U['contact']), array('Appeler le +237 695 981 047', 'tel:+237695981047', true)));
$serviceCards = array(
	array('Services d’ingénierie', 'Conception, construction, installation, maintenance et conseil pour le traitement de l’eau, le génie civil et les systèmes industriels.', $U['engineering-services'], null, $img['engineering']),
	array('Laboratoire d’analyse de l’eau', 'Analyses chimiques, physiques et microbiologiques de l’eau, avec prélèvement sur site si nécessaire.', $U['water-laboratory'], null, $img['laboratory']),
	array('Formation professionnelle', 'Formation technique et professionnelle en ingénierie, analyse de laboratoire, gestion de projet, sécurité et utilisation d’équipements.', $U['professional-training'], null, $img['training']),
	array('Produits', 'Équipements de traitement de l’eau, instruments d’analyse, kits de forage et d’analyse de l’eau, pièces détachées et consommables.', $U['products'], null, $img['products']),
);

/* ---------------------------------------------------------------------------
 * Pages. Key = key of the English page being translated (same keys as the English seeder).
 * [French title, French slug, English path, French parent key or '', SEO title, SEO description, content]
 * ------------------------------------------------------------------------- */
$C = rd_pages_content('fr', $img);
$pages = array();

$pages['home'] = array('Accueil', 'accueil', 'home', '', 'RD Engineering Solution | Eau, assainissement et énergie en Afrique',
	'Ingénierie, laboratoire d’analyse de l’eau, formation professionnelle et équipements pour des projets d’eau, d’assainissement et d’énergie, basés à Douala, au Cameroun.',
	$C['home']);

$pages['services'] = array('Nos services', 'nos-services', 'services', '', 'Nos services | RD Engineering Solution',
	'Ingénierie, laboratoire d’analyse de l’eau, formation professionnelle et produits pour l’eau, l’assainissement et l’énergie.',
	$C['services']);

$pages['engineering-services'] = array('Services d’ingénierie', 'services-ingenierie', 'services/engineering-services', 'services', 'Services d’ingénierie | RD Engineering Solution',
	'Conception, construction, supervision et conseil pour des systèmes d’eau, d’assainissement et d’énergie au Cameroun.',
	$C['engineering-services']);
$pages['water-laboratory'] = array('Laboratoire d’analyse de l’eau', 'laboratoire-eau', 'services/water-laboratory', 'services', 'Laboratoire d’analyse de l’eau | RD Engineering Solution',
	'Analyses chimiques, physiques et microbiologiques de l’eau à Douala, avec prélèvement sur site possible.',
	$C['water-laboratory']);

$pages['professional-training'] = array('Formation professionnelle', 'formation-professionnelle', 'services/professional-training', 'services', 'Formation professionnelle | RD Engineering Solution',
	'Formation technique et professionnelle en ingénierie, analyse de laboratoire, gestion de projet, sécurité et utilisation d’équipements.',
	$C['professional-training']);

$pages['products'] = array('Produits', 'produits', 'services/products', 'services', 'Produits | RD Engineering Solution',
	'Équipements de traitement de l’eau, instruments d’analyse, kits de forage et d’analyse de l’eau, pièces détachées et consommables.',
	$C['products']);

$pages['about'] = array('À propos', 'a-propos', 'about', '', 'À propos | RD Engineering Solution',
	'RD Engineering Solution est une entreprise d’ingénierie dans les domaines de l’eau, de l’assainissement et de l’énergie, basée à Bonassama-Douala, au Cameroun.',
	$C['about']);

$pages['tenders'] = array('Appels d’offres et marchés', 'appels-d-offres', 'tenders', '', 'Appels d’offres et marchés | RD Engineering Solution',
	'Informations sur l’entreprise pour les acheteurs institutionnels, les ONG et les équipes achats.',
	$C['tenders']);

$pages['faq'] = array('Foire aux questions', 'foire-aux-questions', 'faq', '', 'Foire aux questions | RD Engineering Solution',
	'Réponses sur les services d’ingénierie, le laboratoire d’analyse de l’eau, la formation, les produits et la façon de contacter RD Engineering Solution.',
	$C['faq']);

$pages['contact'] = array('Nous contacter', 'nous-contacter', 'contact', '', 'Contact et demande de devis | RD Engineering Solution',
	'Contactez RD Engineering Solution à Douala ou demandez un devis pour l’ingénierie, le laboratoire, la formation ou les produits.',
	$C['contact']);

$pages['privacy'] = array('Politique de confidentialité', 'confidentialite', 'privacy', '', 'Politique de confidentialité | RD Engineering Solution',
	'Comment RD Engineering Solution traite les informations personnelles collectées via ce site.',
	$C['privacy']);
/* ---------------------------------------------------------------------------
 * Create or update the French pages and link them to the English ones
 * ------------------------------------------------------------------------- */
$ids = array();
foreach ($pages as $key => $p) {
	list($title, $slug, $enPath, $parentKey, $seoTitle, $seoDesc, $content) = $p;
	$en = get_page_by_path($enPath, OBJECT, 'page');
	if (!$en) {
		echo "SKIP $key: English page '$enPath' not found (run seed-pages.php first)\n";
		continue;
	}
	$existing = pll_get_post($en->ID, 'fr');
	$args = array(
		'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $title, 'post_name' => $slug,
		'post_content' => $content, 'post_parent' => ($parentKey && isset($ids[$parentKey])) ? $ids[$parentKey] : 0,
	);
	if ($existing) {
		$args['ID'] = $existing;
		$id = wp_update_post(wp_slash($args), true);
	} else {
		$id = wp_insert_post(wp_slash($args), true);
	}
	if (is_wp_error($id)) {
		echo "ERROR $key: " . $id->get_error_message() . "\n";
		continue;
	}
	$ids[$key] = (int) $id;
	update_post_meta($id, '_kad_post_layout', 'fullwidth');
	update_post_meta($id, '_kad_post_title', 'hide');
	update_post_meta($id, '_kad_post_content_style', 'unboxed');
	update_post_meta($id, '_kad_post_vertical_padding', 'hide');
	update_post_meta($id, '_rd_seo_title', $seoTitle);
	update_post_meta($id, '_rd_seo_description', $seoDesc);
	pll_set_post_language($id, 'fr');
	pll_save_post_translations(array('en' => $en->ID, 'fr' => (int) $id));
	echo "fr $key => $id (en {$en->ID}) " . ($existing ? 'updated' : 'created') . "\n";
}

/* ---------------------------------------------------------------------------
 * French menus, language switcher, and menu mapping for Polylang
 * ------------------------------------------------------------------------- */
$main = rd_build_menu('Menu principal', array(
	array('Services', 'services'),
	array('Ingénierie', 'engineering-services', 'services', 'rd-sub-hardhat', 'Concevoir, construire et superviser les ouvrages d’eau, d’assainissement et d’énergie.'),
	array('Laboratoire de l’eau', 'water-laboratory', 'services', 'rd-sub-flask', 'Analyses chimiques, physiques et microbiologiques, prélèvement sur demande.'),
	array('Formation', 'professional-training', 'services', 'rd-sub-book', 'Formations techniques avec certificat ; options entreprise et sur site.'),
	array('Produits', 'products', 'services', 'rd-sub-box', 'Kits, solaire et SAV : prix sur demande.'),
	array('À propos', 'about'),
	array('FAQ', 'faq'),
	array('Contact', 'contact'),
	array('Demander un devis', 'contact', null, 'menu-cta'),
), $ids);
$footer = rd_build_menu('Menu de pied de page', array(
	array('Services', 'services'), array('À propos', 'about'), array('Appels d’offres et marchés', 'tenders'),
	array('FAQ', 'faq'), array('Contact', 'contact'), array('Politique de confidentialité', 'privacy'),
), $ids);

$sw = wp_update_nav_menu_item($main, 0, array('menu-item-type' => 'custom', 'menu-item-url' => '#pll_switcher', 'menu-item-title' => 'Langues', 'menu-item-status' => 'publish', 'menu-item-position' => 99));
if (!is_wp_error($sw)) {
	update_post_meta($sw, '_pll_menu_item', array('hide_if_no_translation' => 0, 'hide_current' => 0, 'force_home' => 0, 'show_flags' => 0, 'show_names' => 1, 'dropdown' => 0));
}

$theme = get_option('stylesheet');
$o = get_option('polylang');
$o['nav_menus'][$theme]['primary']['fr'] = $main;
$o['nav_menus'][$theme]['mobile']['fr'] = $main;
$o['nav_menus'][$theme]['footer']['fr'] = $footer;
update_option('polylang', $o);

flush_rewrite_rules();
echo "fr menus: main $main, footer $footer\n";
