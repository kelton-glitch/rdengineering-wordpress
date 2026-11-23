<?php
/**
 * Seeds the v2 (Kadence) site: pages, quote form, menus, front page.
 *
 * Run:  wp eval-file deploy/v2/seed-pages.php
 * Safe to re-run: pages are matched by slug and updated in place.
 *
 * Copy rules: only facts that already appear on the live site or that the owner supplied.
 * Anything unknown is a visible .rd-placeholder box so it cannot be forgotten.
 */

if (!defined('ABSPATH')) {
	exit;
}

$rdDeploy = dirname(dirname(realpath(get_theme_root() . '/rd-child'))) . '/deploy/v2/';
require_once $rdDeploy . 'lib.php';

require_once $rdDeploy . 'content.php';

/* ---------------------------------------------------------------------------
 * Page content
 * ------------------------------------------------------------------------- */
$cta = rd_btns(array(array('Request a quote', '/contact/'), array('Call +237 695 981 047', 'tel:+237695981047', true)));
$serviceCards = array(
	array('Engineering Services', 'Design, construction, installation, maintenance and consultancy for water treatment, civil works and industrial systems.', '/services/engineering-services/'),
	array('Water Laboratory', 'Chemical, physical and microbiological water analysis, with on-site sampling when needed.', '/services/water-laboratory/'),
	array('Professional Training', 'Technical and professional training in engineering, laboratory analysis, project management, safety and equipment operation.', '/services/professional-training/'),
	array('Products', 'Water treatment equipment, testing instruments, drilling and water testing kits, spare parts and consumables.', '/services/products/'),
);

/* Pictures used on the live site, optimised. Alt text describes what is shown and says it is an illustration. */
$img = array(
	'hero'        => rd_image('hero.webp', 'Illustration of an engineer with a clipboard kneeling at a hand-pump water point, with children and water containers nearby'),
	'engineering' => rd_image('engineering.webp', 'Illustration of engineers beside water treatment equipment and solar panels in an exhibition hall'),
	'laboratory'  => rd_image('laboratory.webp', 'Illustration of laboratory technicians in white coats testing water samples'),
	'training'    => rd_image('training.webp', 'Illustration of a technician demonstrating a solar-powered water pump to a community group'),
	'products'    => rd_image('products.webp', 'Illustration of water treatment products and filters on a table in front of a community group'),
	'team'        => rd_image('team-meeting.webp', 'Illustration of a team meeting with a presentation about water projects'),
	'community'   => rd_image('community.webp', 'Illustration of a solar-powered water treatment site with wind turbines and a community at a pump'),
	'logo'        => rd_image('logo-rd.webp', 'RD Engineering Solutions, Water Sanitation and Energy'),
	'icon'        => rd_image('site-icon.png', 'RD Engineering Solutions icon'),
	'social'      => rd_image('social-share.jpg', 'RD Engineering Solution: Innovating for a sustainable future'),
);
$serviceCards[0][4] = $img['engineering'];
$serviceCards[1][4] = $img['laboratory'];
$serviceCards[2][4] = $img['training'];
$serviceCards[3][4] = $img['products'];

$C = rd_pages_content('en', $img);
$pages = array();

$pages['home'] = array('Home', 'RD Engineering Solution | Water, Sanitation and Energy in Africa',
	'Engineering, water testing laboratory, professional training and equipment for water, sanitation and energy projects, based in Douala, Cameroon.',
	$C['home']);

$pages['services'] = array('Services', 'Services | RD Engineering Solution', 'Engineering, water laboratory, professional training and products for water, sanitation and energy.',
	$C['services']);

$pages['engineering-services'] = array('Engineering Services', 'Engineering Services | RD Engineering Solution', 'Design, construction, supervision and consultancy for water, sanitation and energy systems in Cameroon.',
	$C['engineering-services']);
$pages['water-laboratory'] = array('Water Laboratory', 'Water Testing Laboratory | RD Engineering Solution', 'Chemical, physical and microbiological water analysis in Douala, with on-site sampling available.',
	$C['water-laboratory']);

$pages['professional-training'] = array('Professional Training', 'Professional Training | RD Engineering Solution', 'Technical and professional training in engineering, laboratory analysis, project management, safety and equipment operation.',
	$C['professional-training']);

$pages['products'] = array('Products', 'Products | RD Engineering Solution', 'Water treatment equipment, testing instruments, drilling and water testing kits, spare parts and consumables.',
	$C['products']);

$pages['about'] = array('About', 'About Us | RD Engineering Solution', 'RD Engineering Solution is a water, sanitation and energy engineering company based in Bonassama-Douala, Cameroon.',
	$C['about']);

$pages['tenders'] = array('Tenders and Procurement', 'Tenders and Procurement | RD Engineering Solution', 'Company information for institutional buyers, NGOs and procurement teams.',
	$C['tenders']);

$pages['faq'] = array('FAQ', 'Frequently Asked Questions | RD Engineering Solution', 'Answers about engineering services, the water laboratory, training, products and contacting RD Engineering Solution.',
	$C['faq']);

$pages['contact'] = array('Contact', 'Contact and Quote Request | RD Engineering Solution', 'Contact RD Engineering Solution in Douala or request a quote for engineering, laboratory, training or products.',
	$C['contact']);

$pages['privacy'] = array('Privacy Policy', 'Privacy Policy | RD Engineering Solution', 'How RD Engineering Solution handles personal information collected through this website.',
	$C['privacy']);
/* ---------------------------------------------------------------------------
 * Create or update pages
 * ------------------------------------------------------------------------- */
$ids = array();
foreach ($pages as $slug => $p) {
	list($title, $seoTitle, $desc, $content) = $p;
	// Service pages live under /services/, so look them up by their full path
	$isChild = in_array($slug, array('engineering-services', 'water-laboratory', 'professional-training', 'products'), true);
	$existing = get_page_by_path($isChild ? 'services/' . $slug : $slug, OBJECT, 'page');
	$args = array('post_type' => 'page', 'post_status' => 'publish', 'post_title' => $title, 'post_name' => $slug, 'post_content' => $content);
	if ($existing) {
		$args['ID'] = $existing->ID;
		$id = wp_update_post(wp_slash($args), true);
	} else {
		$id = wp_insert_post(wp_slash($args), true);
	}
	if (is_wp_error($id)) {
		echo "ERROR $slug: " . $id->get_error_message() . "\n";
		continue;
	}
	$ids[$slug] = $id;
	// Kadence: full width, no auto title, unboxed, no vertical padding (sections handle spacing)
	update_post_meta($id, '_kad_post_layout', 'fullwidth');
	update_post_meta($id, '_kad_post_title', 'hide');
	update_post_meta($id, '_kad_post_content_style', 'unboxed');
	update_post_meta($id, '_kad_post_vertical_padding', 'hide');
	// SEO fields (read by the child theme until a full SEO plugin is chosen)
	update_post_meta($id, '_rd_seo_title', $seoTitle);
	update_post_meta($id, '_rd_seo_description', $desc);
	echo "page $slug => $id\n";
}

// Service pages sit under Services: /services/engineering-services/ etc.
foreach (array('engineering-services', 'water-laboratory', 'professional-training', 'products') as $child) {
	if (isset($ids[$child], $ids['services'])) {
		wp_update_post(array('ID' => $ids[$child], 'post_parent' => $ids['services']));
	}
}

update_option('show_on_front', 'page');
if (isset($ids['home'])) {
	update_option('page_on_front', $ids['home']);
}

/* ---------------------------------------------------------------------------
 * Menus
 * ------------------------------------------------------------------------- */

$main = rd_build_menu('Main menu', array(
	array('Services', 'services'),
	array('Engineering', 'engineering-services', 'services', 'rd-sub-hardhat', 'Design, build and supervise water, sanitation and energy works.'),
	array('Water Laboratory', 'water-laboratory', 'services', 'rd-sub-flask', 'Chemical, physical and microbiological tests, with sampling on request.'),
	array('Training', 'professional-training', 'services', 'rd-sub-book', 'Technical courses with certificates; corporate and on-site options.'),
	array('Products', 'products', 'services', 'rd-sub-box', 'Treatment kits, solar gear and after-sales: prices on request.'),
	array('About', 'about'),
	array('FAQ', 'faq'),
	array('Contact', 'contact'),
	array('Request a quote', 'contact', null, 'menu-cta'),
), $ids);

$footer = rd_build_menu('Footer menu', array(
	array('Services', 'services'), array('About', 'about'), array('Tenders and procurement', 'tenders'),
	array('FAQ', 'faq'), array('Contact', 'contact'), array('Privacy policy', 'privacy'),
), $ids);

$locations = get_theme_mod('nav_menu_locations', array());
$locations['primary'] = $main;
$locations['mobile'] = $main;
$locations['footer'] = $footer;
set_theme_mod('nav_menu_locations', $locations);
echo "menus: main $main, footer $footer\n";

/* ---------------------------------------------------------------------------
 * Brand: header logo, site icon, social share image
 * ------------------------------------------------------------------------- */
if (!empty($img['logo'])) {
	set_theme_mod('custom_logo', $img['logo']);
	// Kadence logo width per device (px)
	set_theme_mod('logo_width', array('size' => array('mobile' => 150, 'tablet' => 190, 'desktop' => 230), 'unit' => array('mobile' => 'px', 'tablet' => 'px', 'desktop' => 'px')));
}
if (!empty($img['icon'])) {
	update_option('site_icon', $img['icon']);
}
if (!empty($img['social'])) {
	update_option('rd_og_image_id', $img['social']);
}
echo "brand: logo {$img['logo']}, icon {$img['icon']}, social {$img['social']}\n";
