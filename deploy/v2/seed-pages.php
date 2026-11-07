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
	rd_section(
		rd_p('Services', 'rd-eyebrow') . rd_h('Engineering Services', 1) . rd_img($img['engineering'], 'rd-media') .
		rd_p('We offer a wide range of engineering solutions including design, construction, installation, maintenance and consultancy across sectors such as water treatment, civil works and industrial systems.') .
		rd_h('What is included', 2) .
		rd_ul(array(
			'<strong>Design and consultancy:</strong> feasibility studies, design of water, sanitation and energy systems.',
			'<strong>Construction and supervision:</strong> water supply systems, sanitation facilities and renewable energy infrastructure.',
			'<strong>Capacity building:</strong> training technicians, engineers and local communities on system maintenance.',
			'<strong>Research and innovation:</strong> sustainable engineering solutions tailored to local contexts.',
			'<strong>Environmental services:</strong> climate resilience planning, Environmental and Social Impact Assessments (ESIAs).',
		)) . $cta) .
	rd_section(
		rd_h('Common questions', 2) .
		rd_details('Can you handle both small and large-scale engineering projects?', 'Yes. Our team manages projects of all sizes, from small community-based systems to large industrial or municipal projects.') .
		rd_details('Do you offer customised engineering solutions?', 'Yes. Every project is unique, so we tailor our designs and implementation plans to client requirements and site conditions.') .
		rd_details('Are your engineers certified or licensed?', 'Our engineering team covers design, installation and project supervision. Ask us for team qualifications for your tender or project.'), true));

$pages['water-laboratory'] = array('Water Laboratory', 'Water Testing Laboratory | RD Engineering Solution', 'Chemical, physical and microbiological water analysis in Douala, with on-site sampling available.',
	$C['water-laboratory']);

$pages['professional-training'] = array('Professional Training', 'Professional Training | RD Engineering Solution', 'Technical and professional training in engineering, laboratory analysis, project management, safety and equipment operation.',
	rd_section(
		rd_p('Services', 'rd-eyebrow') . rd_h('Professional Training', 1) . rd_img($img['training'], 'rd-media') .
		rd_p('We organise technical and professional training programmes in engineering, laboratory analysis, project management, safety standards and equipment operation.') .
		rd_h('Programmes', 2) .
		rd_ul(array('Technical training in WASH engineering, water testing and renewable energy', 'Certification programmes for technicians and engineers', 'Short courses for NGOs, municipalities and private sector partners', 'Community-level training in safe water, hygiene and sanitation practices', 'Internship and mentorship programmes for students and young professionals', 'Workshops on project management, monitoring and sustainability')) .
		rd_h('Corporate and on-site training', 2) .
		rd_p('We offer tailored corporate training programmes designed to meet the specific needs of organisations or projects.') . $cta) .
	rd_section(
		rd_h('Common questions', 2) .
		rd_details('Who can enrol in your training programmes?', 'Our training is open to students, technicians, engineers and professionals seeking to upgrade their skills or meet industry certification requirements.') .
		rd_details('Do you provide certificates after training?', 'Yes. Participants receive a certificate on successful completion of each training programme.') .
		rd_details('Can you organise on-site or customised training for companies?', 'Yes, we offer tailored corporate training programmes designed to meet the specific needs of organisations or projects.'), true));

$pages['products'] = array('Products', 'Products | RD Engineering Solution', 'Water treatment equipment, testing instruments, drilling and water testing kits, spare parts and consumables.',
	rd_section(
		rd_p('Services', 'rd-eyebrow') . rd_h('Products', 1) . rd_img($img['products'], 'rd-media') .
		rd_p('We supply engineering and laboratory products. Prices are provided on request.') .
		rd_ul(array('Water treatment and sanitation products: filters, chlorine, latrine slabs, handwashing kits', 'Renewable energy solutions: solar pumps, solar lighting, efficient stoves', 'Affordable engineering tools and kits: drilling kits, water testing kits', 'Locally developed innovations for water, sanitation and energy', 'Distribution, maintenance and after-sales support')) .
		rd_btns(array(array('Request a product quote', '/contact/')))) .
	rd_section(
		rd_h('Common questions', 2) .
		rd_details('What types of products do you supply?', 'We supply engineering and laboratory products such as water treatment equipment, testing instruments, spare parts and consumables.') .
		rd_details('Do you offer after-sales support or maintenance?', 'Yes. We provide technical support, maintenance and replacement services.') .
		rd_details('How can I place an order or get a quote?', 'Contact us through our website, phone or email with your product needs, and our sales team will reply with pricing and availability.'), true));

$pages['about'] = array('About', 'About Us | RD Engineering Solution', 'RD Engineering Solution is a water, sanitation and energy engineering company based in Bonassama-Douala, Cameroon.',
	$C['about']);

$pages['tenders'] = array('Tenders and Procurement', 'Tenders and Procurement | RD Engineering Solution', 'Company information for institutional buyers, NGOs and procurement teams.',
	$C['tenders']);

$pages['faq'] = array('FAQ', 'Frequently Asked Questions | RD Engineering Solution', 'Answers about engineering services, the water laboratory, training, products and contacting RD Engineering Solution.',
	rd_section(
		rd_h('Frequently asked questions', 1) .
		rd_h('Engineering services', 2) .
		rd_details('What types of engineering services does RD Engineering Solution provide?', 'Design, construction, installation, maintenance and consultancy across sectors such as water treatment, civil works and industrial systems.') .
		rd_details('Can you handle both small and large-scale projects?', 'Yes. We manage projects of all sizes, from small community-based systems to large industrial or municipal projects.') .
		rd_details('Do you offer customised engineering solutions?', 'Yes. We tailor our designs and implementation plans to client requirements and site conditions.') .
		rd_h('Water laboratory', 2) .
		rd_details('What services does your Water Laboratory offer?', 'Chemical, physical and microbiological analyses to help ensure water quality and safety for domestic, industrial and environmental applications.') .
		rd_details('What parameters can you test?', 'pH, turbidity, total dissolved solids (TDS), hardness, nitrates, heavy metals, E. coli and other key indicators of water quality.') .
		rd_details('Who can use your laboratory services?', 'Individuals, private companies, municipalities, NGOs and government agencies.') .
		rd_details('How do I submit a water sample for testing?', 'Visit our laboratory or contact customer service for sampling guidelines and submission procedures. We also provide on-site sampling when needed.') .
		rd_h('Professional training', 2) .
		rd_details('What type of professional training do you provide?', 'Technical and professional training in engineering, laboratory analysis, project management, safety standards and equipment operation.') .
		rd_details('Who can enrol in your training programmes?', 'Students, technicians, engineers and professionals seeking to upgrade their skills or meet certification requirements.') .
		rd_details('Do you provide certificates after training?', 'Yes. Participants receive a certificate on successful completion of each programme.') .
		rd_details('Can you organise on-site or customised training for companies?', 'Yes, we offer tailored corporate training programmes.') .
		rd_h('Products', 2) .
		rd_details('What types of products do you supply?', 'Engineering and laboratory products such as water treatment equipment, testing instruments, spare parts and consumables.') .
		rd_details('Do you offer after-sales support or maintenance?', 'Yes. We provide technical support, maintenance and replacement services.') .
		rd_details('How can I place an order or get a quote?', 'Contact us through our website, phone or email with your product needs, and our sales team will reply with pricing and availability.') .
		rd_h('Contact and support', 2) .
		rd_details('How can I contact RD Engineering Solution?', 'Use the contact form on this website, email or phone. Our team can help with enquiries, project discussions and service bookings.') .
		rd_details('Where are you located?', 'Our head office is in Bonassama-Douala, Cameroon. We also serve clients nationwide and across the region.') .
		rd_details('Do you provide consultation before a project starts?', 'Yes. We offer project consultation and feasibility studies to help clients choose the best technical and economic approach.') .
		rd_details('What are your business hours?', 'Monday to Friday, 9:00 to 18:00, and Saturday by appointment.') .
		$cta));

$pages['contact'] = array('Contact', 'Contact and Quote Request | RD Engineering Solution', 'Contact RD Engineering Solution in Douala or request a quote for engineering, laboratory, training or products.',
	$C['contact']);

$pages['privacy'] = array('Privacy Policy', 'Privacy Policy | RD Engineering Solution', 'How RD Engineering Solution handles personal information collected through this website.',
	rd_section(
		rd_h('Privacy policy', 1) .
		rd_placeholder('DRAFT. This is a plain-language starting point. Have it reviewed against the applicable Cameroonian data protection rules before publishing.') .
		rd_h('What we collect', 2) .
		rd_p('When you use the quote or contact form we receive the details you type: name, email, phone, organisation and your message.') .
		rd_h('How we use it', 2) .
		rd_p('We use these details only to reply to your request. We do not sell them.') .
		rd_h('Who sees it', 2) .
		rd_p('Our team receives the form by email. The website host stores the site and its backups.') .
		rd_h('Your choices', 2) .
		rd_p('Write to <a href="mailto:services@rdengineeringsol.com">services@rdengineeringsol.com</a> to ask what we hold about you or to have it deleted.')));

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
	array('Engineering', 'engineering-services', 'services'),
	array('Water Laboratory', 'water-laboratory', 'services'),
	array('Training', 'professional-training', 'services'),
	array('Products', 'products', 'services'),
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
