<?php
/**
 * Bilingual page content for the merged design (English and French built from one place, so the two stay in step).
 * Used by seed-pages.php (en) and seed-pages-fr.php (fr). Claims: only what BRIEF.md and the live site state.
 * Unknown facts are visible dashed "To be supplied" chips, never invented.
 * Owner instruction: "I wish to have the whole works ... use agents to do many alternatives and fight each one till you reach the best possible one".
 */

if (!defined('ABSPATH')) {
	exit;
}

/** Contact Form 7 forms (created once by title, then updated). kind = 'quote' | 'water'. Returns the form post ID. */
function rd_cf7_form($lang, $kind) {
	$fr = 'fr' === $lang;
	$titles = array(
		'quote' => $fr ? 'Demande de devis' : 'Quote request',
		'water' => $fr ? 'Demande d’analyse d’eau' : 'Water test request',
	);
	$title = $titles[$kind];
	$found = get_posts(array('post_type' => 'wpcf7_contact_form', 'title' => $title, 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids'));
	$id = $found ? (int) $found[0] : wp_insert_post(array('post_type' => 'wpcf7_contact_form', 'post_status' => 'publish', 'post_title' => $title));
	$p = 'quote' === $kind ? 'q' : 'w';

	if ('quote' === $kind) {
		$form = $fr
			? '<div class="rd-form">'
			. '<p><label for="q-name">Nom complet *</label>[text* your-name id:q-name autocomplete:name]</p>'
			. '<p><label for="q-email">E-mail *</label>[email* your-email id:q-email autocomplete:email]</p>'
			. '<p><label for="q-phone">Téléphone ou WhatsApp</label>[tel your-phone id:q-phone autocomplete:tel]</p>'
			. '<p><label for="q-org">Organisation (facultatif)</label>[text organisation id:q-org autocomplete:organization]</p>'
			. '<p><label for="q-service">De quoi avez-vous besoin ? *</label>[select* service id:q-service "Services d’ingénierie" "Laboratoire d’analyse de l’eau" "Formation professionnelle" "Produits" "Autre"]</p>'
			. '<p><label for="q-msg">Décrivez votre projet *</label>[textarea* your-message id:q-msg]</p>'
			. '<p>[acceptance consent] J’accepte que RD Engineering Solution utilise ces informations pour répondre à ma demande. [/acceptance]</p>'
			. '<p>[submit "Envoyer la demande"]</p></div>'
			: '<div class="rd-form">'
			. '<p><label for="q-name">Full name *</label>[text* your-name id:q-name autocomplete:name]</p>'
			. '<p><label for="q-email">Email *</label>[email* your-email id:q-email autocomplete:email]</p>'
			. '<p><label for="q-phone">Phone or WhatsApp</label>[tel your-phone id:q-phone autocomplete:tel]</p>'
			. '<p><label for="q-org">Organisation (optional)</label>[text organisation id:q-org autocomplete:organization]</p>'
			. '<p><label for="q-service">What do you need? *</label>[select* service id:q-service "Engineering services" "Water laboratory" "Professional training" "Products" "Something else"]</p>'
			. '<p><label for="q-msg">Tell us about your project *</label>[textarea* your-message id:q-msg]</p>'
			. '<p>[acceptance consent] I agree that RD Engineering Solution may use these details to reply to my request. [/acceptance]</p>'
			. '<p>[submit "Send request"]</p></div>';
		$mail = array(
			'subject' => $fr ? '[Devis site web] [service] de [your-name]' : '[Website quote] [service] from [your-name]',
			'recipient' => 'services@rdengineeringsol.com',
			'body' => $fr
				? "Nom : [your-name]\nE-mail : [your-email]\nTéléphone : [your-phone]\nOrganisation : [organisation]\nService : [service]\n\nMessage :\n[your-message]\n\n-- Envoyé depuis le formulaire de devis du site (version française)"
				: "Name: [your-name]\nEmail: [your-email]\nPhone: [your-phone]\nOrganisation: [organisation]\nService: [service]\n\nMessage:\n[your-message]\n\n-- Sent from the website quote form",
		);
	} else {
		$form = $fr
			? '<div class="rd-form rd-form--compact">'
			. '<p><label for="w-name">Nom complet *</label>[text* your-name id:w-name autocomplete:name]</p>'
			. '<p><label for="w-email">E-mail *</label>[email* your-email id:w-email autocomplete:email]</p>'
			. '<p><label for="w-phone">Téléphone ou WhatsApp</label>[tel your-phone id:w-phone autocomplete:tel]</p>'
			. '<p><label for="w-source">Origine de l’eau *</label>[select* source id:w-source "Forage" "Puits" "Robinet" "Eau de surface" "Autre"]</p>'
			. '<p><label for="w-how">Échantillon *</label>[select* how id:w-how "J’apporterai l’échantillon au laboratoire" "Je souhaite un prélèvement sur site"]</p>'
			. '<p><label for="w-place">Lieu de l’eau (ville, quartier) *</label>[text* place id:w-place]</p>'
			. '<p><label for="w-msg">Motif de l’analyse et paramètres souhaités *</label>[textarea* your-message id:w-msg]</p>'
			. '<p>[acceptance consent] J’accepte que RD Engineering Solution utilise ces informations pour répondre à ma demande. [/acceptance]</p>'
			. '<p>[submit "Envoyer la demande d’analyse"]</p></div>'
			: '<div class="rd-form rd-form--compact">'
			. '<p><label for="w-name">Full name *</label>[text* your-name id:w-name autocomplete:name]</p>'
			. '<p><label for="w-email">Email *</label>[email* your-email id:w-email autocomplete:email]</p>'
			. '<p><label for="w-phone">Phone or WhatsApp</label>[tel your-phone id:w-phone autocomplete:tel]</p>'
			. '<p><label for="w-source">Where does the water come from? *</label>[select* source id:w-source "Borehole" "Well" "Tap" "Surface water" "Other"]</p>'
			. '<p><label for="w-how">Sample *</label>[select* how id:w-how "I will bring the sample to the laboratory" "I want on-site sampling"]</p>'
			. '<p><label for="w-place">Where is the water (town, area)? *</label>[text* place id:w-place]</p>'
			. '<p><label for="w-msg">Reason for testing and parameters you need *</label>[textarea* your-message id:w-msg]</p>'
			. '<p>[acceptance consent] I agree that RD Engineering Solution may use these details to reply to my request. [/acceptance]</p>'
			. '<p>[submit "Send test request"]</p></div>';
		$mail = array(
			'subject' => $fr ? '[Analyse d’eau] [source] de [your-name]' : '[Water test] [source] from [your-name]',
			'recipient' => 'waterlab@rdengineeringsol.com',
			'body' => $fr
				? "Nom : [your-name]\nE-mail : [your-email]\nTéléphone : [your-phone]\nOrigine de l’eau : [source]\nÉchantillon : [how]\nLieu : [place]\n\nMotif et paramètres :\n[your-message]\n\n-- Envoyé depuis le formulaire d’analyse d’eau du site (version française)"
				: "Name: [your-name]\nEmail: [your-email]\nPhone: [your-phone]\nWater source: [source]\nSample: [how]\nLocation: [place]\n\nReason and parameters:\n[your-message]\n\n-- Sent from the website water test form",
		);
	}

	update_post_meta($id, '_form', wp_slash($form));
	update_post_meta($id, '_mail', wp_slash(array(
		'active' => true,
		'subject' => $mail['subject'],
		'sender' => 'RD Engineering Website <wordpress@rdengineeringsol.com>',
		'recipient' => $mail['recipient'],
		'body' => $mail['body'],
		'additional_headers' => 'Reply-To: [your-email]',
		'attachments' => '',
		'use_html' => false,
		'exclude_blank' => false,
	)));
	if ($fr) {
		update_post_meta($id, '_messages', wp_slash(array(
			'mail_sent_ok' => 'Merci pour votre message. Il a bien été envoyé.',
			'mail_sent_ng' => 'Une erreur s’est produite lors de l’envoi de votre message. Veuillez réessayer plus tard.',
			'validation_error' => 'Un ou plusieurs champs contiennent une erreur. Veuillez vérifier et réessayer.',
			'spam' => 'Une erreur s’est produite lors de l’envoi de votre message. Veuillez réessayer plus tard.',
			'accept_terms' => 'Vous devez accepter les conditions avant d’envoyer votre message.',
			'invalid_required' => 'Ce champ est obligatoire.',
			'invalid_too_long' => 'Ce champ est trop long.',
			'invalid_too_short' => 'Ce champ est trop court.',
			'invalid_email' => 'L’adresse e-mail saisie n’est pas valide.',
			'invalid_url' => 'L’URL n’est pas valide.',
			'invalid_tel' => 'Le numéro de téléphone n’est pas valide.',
		)));
	}
	update_post_meta($id, '_locale', $fr ? 'fr_FR' : 'en_US');
	return $id;
}

/**
 * Page bodies for one language. $img = image IDs keyed hero/engineering/laboratory/training/products/team/community.
 * Returns array(key => html) for: home, services, water-laboratory, about, tenders, contact.
 */
function rd_pages_content($lang, array $img) {
	$fr = 'fr' === $lang;
	$x = function ($en, $frs) use ($fr) {
		return $fr ? $frs : $en;
	};
	$U = $fr ? array(
		'home' => '/fr/', 'services' => '/fr/nos-services/', 'eng' => '/fr/nos-services/services-ingenierie/', 'lab' => '/fr/nos-services/laboratoire-eau/',
		'training' => '/fr/nos-services/formation-professionnelle/', 'products' => '/fr/nos-services/produits/', 'about' => '/fr/a-propos/',
		'tenders' => '/fr/appels-d-offres/', 'contact' => '/fr/nous-contacter/',
	) : array(
		'home' => '/', 'services' => '/services/', 'eng' => '/services/engineering-services/', 'lab' => '/services/water-laboratory/',
		'training' => '/services/professional-training/', 'products' => '/services/products/', 'about' => '/about/',
		'tenders' => '/tenders/', 'contact' => '/contact/',
	);
	$tel = 'tel:+237695981047';
	$wa = 'https://wa.me/237695981047';
	$phone = '+237 695 981 047';
	$subjQuote = $x('Quote%20request', 'Demande%20de%20devis');
	$tbs = $x('To be supplied', 'À fournir');
	$tbc = $x('To be confirmed', 'À confirmer');
	$waNote = $x('WhatsApp availability on this number is to be confirmed.', 'La disponibilité de WhatsApp sur ce numéro reste à confirmer.');
	$mail = function ($addr, $label = '') {
		return '<a href="mailto:' . $addr . '@rdengineeringsol.com">' . ($label ? $label : $addr . '@rdengineeringsol.com') . '</a>';
	};
	$hoursShort = $x('Mon to Fri, 9:00 to 18:00; Saturday by appointment', 'Du lundi au vendredi, de 9h à 18h ; samedi sur rendez-vous');
	$base = $x('Bonassama-Douala, Cameroon', 'Bonassama-Douala, Cameroun');

	// Primary action is the only filled blue button. Call and WhatsApp are outline, and desktop-only in the hero (the phone dock holds them).
	$heroBtns = rd_btns(array(
		array($x('Request a quote', 'Demander un devis'), $U['contact']),
		array($x('Call', 'Appeler') . ' ' . $phone, $tel, true, 'rd-desk-only'),
		array('WhatsApp', $wa, true, 'rd-desk-only'),
	)) . rd_p($waNote, 'rd-note');
	$closeBtns = rd_btns(array(
		array($x('Request a quote', 'Demander un devis'), $U['contact']),
		array($x('Call', 'Appeler') . ' ' . $phone, $tel, true),
		array('WhatsApp', $wa, true),
	)) . rd_p($waNote, 'rd-note');

	$emails = rd_ulc(array(
		'<span>' . $x('Engineering', 'Ingénierie') . '</span>' . $mail('services'),
		'<span>' . $x('Laboratory', 'Laboratoire') . '</span>' . $mail('waterlab'),
		'<span>' . $x('Training', 'Formation') . '</span>' . $mail('training'),
		'<span>' . $x('Products', 'Produits') . '</span>' . $mail('products'),
	), 'rd-contacts');

	// Supplier due-diligence file: ONE compact list, one chip per row. Nothing is claimed as available.
	$askDocs = $x('Request by email', 'Demander par e-mail');
	$fileRows = array(
		array($x('Company registration certificate', 'Certificat d’immatriculation de l’entreprise'), $tbs),
		array($x('Tax identification number', 'Numéro d’identification fiscale'), $tbs),
		array($x('UNGM registration', 'Enregistrement UNGM'), $tbc),
		array($x('Laboratory accreditation', 'Accréditation du laboratoire'), $tbc),
		array($x('Professional certifications and team CVs', 'Certifications professionnelles et CV de l’équipe'), $tbs),
		array($x('Client references and past project sheets', 'Références clients et fiches de projets réalisés'), $tbs),
		array($x('Anti-corruption policy', 'Politique anti-corruption'), $tbs),
		array($x('Conflict-of-interest policy', 'Politique sur les conflits d’intérêts'), $tbs),
		array($x('Warranty terms for works and products', 'Conditions de garantie des travaux et des produits'), $x('To be defined', 'À définir')),
		array($x('Written after-sales and maintenance terms', 'Conditions écrites de service après-vente et de maintenance'), $tbs),
		array($x('Insurance and financial statements', 'Assurances et états financiers'), $tbs),
	);
	$fileBlock = rd_file($fileRows)
		. rd_p($x('No capability statement PDF exists yet, so none is offered as a download. You can request it and it will be sent once the company has produced it.', 'Aucun dossier de présentation (PDF) n’existe encore : il n’est donc pas proposé en téléchargement. Vous pouvez le demander, et il vous sera envoyé dès que l’entreprise l’aura produit.'), 'rd-note')
		. rd_btns(array(
			array($x('Ask for the supplier documents', 'Demander les documents fournisseur'), 'mailto:services@rdengineeringsol.com?subject=' . $x('Supplier%20documents%20request', 'Demande%20de%20documents%20fournisseur'), true),
			array($x('Request the capability statement', 'Demander le dossier de présentation'), 'mailto:services@rdengineeringsol.com?subject=' . $x('Capability%20statement%20request', 'Demande%20de%20dossier%20de%20pr%C3%A9sentation'), true),
		));

	$slots = rd_slots($x('Project', 'Projet'), array($x('Location', 'Lieu'), $x('Scope', 'Périmètre'), $x('Measured result and its source', 'Résultat mesuré et sa source')), $tbs);

	/* ---------------------------------------------------------------- service cards */
	$cards = array(
		array($x('Engineering Services', 'Services d’ingénierie'),
			$x('Design, construction, installation, maintenance and consultancy for water treatment, civil works and industrial systems.', 'Conception, construction, installation, maintenance et conseil pour le traitement de l’eau, le génie civil et les systèmes industriels.'),
			$U['eng'], null, $img['engineering'],
			array($x('Feasibility studies and system design', 'Études de faisabilité et conception de systèmes'), $x('Construction and supervision', 'Construction et supervision'), $x('Capacity building, research and innovation', 'Renforcement des capacités, recherche et innovation'), $x('Climate resilience planning, ESIAs', 'Résilience climatique, études d’impact (EIES)')),
			'engineering', rd_p($mail('services'), 'rd-card__mail')),
		array($x('Water Laboratory', 'Laboratoire d’analyse de l’eau'),
			$x('Chemical, physical and microbiological analysis: pH, turbidity, TDS, hardness, nitrates, heavy metals and E. coli. On-site sampling available.', 'Analyses chimiques, physiques et microbiologiques : pH, turbidité, TDS, dureté, nitrates, métaux lourds et E. coli. Prélèvement sur site possible.'),
			$U['lab'], $x('How water testing works', 'Comment fonctionnent les analyses'), $img['laboratory'], array(), 'laboratory', rd_p($mail('waterlab'), 'rd-card__mail')),
		array($x('Professional Training', 'Formation professionnelle'),
			$x('Technical training in WASH engineering, water testing and renewable energy. Certificates on completion. Short courses for NGOs, municipalities and companies, plus community training.', 'Formation technique en ingénierie WASH, analyse de l’eau et énergies renouvelables. Certificat à l’issue de la formation. Formations courtes pour ONG, municipalités et entreprises, et formation communautaire.'),
			$U['training'], null, $img['training'], array(), 'training', rd_p($mail('training'), 'rd-card__mail')),
		array($x('Products', 'Produits'),
			$x('Filters, chlorine, latrine slabs, handwashing kits, solar pumps and lighting, efficient stoves, drilling and water testing kits. Distribution and after-sales support. Prices on request.', 'Filtres, chlore, dalles de latrines, kits de lavage des mains, pompes et éclairage solaires, foyers améliorés, kits de forage et d’analyse de l’eau. Distribution et service après-vente. Prix sur demande.'),
			$U['products'], null, $img['products'], array(), 'products', rd_p($mail('products'), 'rd-card__mail')),
	);
	$cardsPlain = $cards;
	foreach ($cardsPlain as $k => $c) {
		$cardsPlain[$k][6] = '';
	}

	$out = array();

	/* ---------------------------------------------------------------- HOME */
	$hero = rd_group(
		rd_group(
			rd_p($x('Water · Sanitation · Energy', 'Eau · Assainissement · Énergie'), 'rd-eyebrow') .
			rd_h($x('Engineering, water testing, training and products for water, sanitation and energy.', 'Ingénierie, analyse de l’eau, formation et produits pour l’eau, l’assainissement et l’énergie.'), 1) .
			rd_p($x('From Bonassama-Douala, Cameroon, for projects across Africa.', 'Depuis Bonassama-Douala, au Cameroun, pour des projets partout en Afrique.'), 'rd-lead') .
			$heroBtns, 'rd-hero__text') .
		rd_facts($x('Company details', 'Informations sur l’entreprise'), array(
			array($x('Legal name', 'Dénomination'), 'RD Engineering Solution'),
			array($x('Base', 'Siège'), $base),
			array($x('Telephone', 'Téléphone'), '<a href="' . $tel . '">' . $phone . '</a>'),
			array($x('Hours', 'Horaires'), $hoursShort),
		)), 'rd-hero__grid');
	$home = rd_cover($img['hero'], $x('Illustration of an engineer with a clipboard kneeling at a hand-pump water point, with children and water containers nearby', 'Illustration : un ingénieur accroupi près d’un point d’eau à pompe manuelle, avec des enfants et des bidons d’eau à proximité'), $x('Illustrative image', 'Image d’illustration'), $hero);
	$home .= rd_section(
		rd_h($x('What do you need today?', 'De quoi avez-vous besoin ?'), 2, 'rd-choose-title') .
		rd_chooser(array(
			array($x('Engineering', 'Ingénierie'), $x('Design, build, maintain', 'Concevoir, construire, entretenir'), '#engineering'),
			array($x('Test my water', 'Analyser mon eau'), $x('Laboratory analysis', 'Laboratoire d’analyse'), '#laboratory'),
			array($x('Training', 'Formation'), $x('Courses and certificates', 'Cours et certificats'), '#training'),
			array($x('Products', 'Produits'), $x('Filters, solar, kits', 'Filtres, solaire, kits'), '#products'),
		)), false, 'rd-section--tight');
	$home .= rd_section(
		rd_head('01', $x('Four service lines', 'Quatre domaines d’activité'), $x('What we do, and who to write to', 'Ce que nous faisons, et à qui écrire'), $x('Each service line has its own contact address.', 'Chaque domaine d’activité a sa propre adresse e-mail.')) .
		rd_cards($cards), true, '', 'services');
	$home .= rd_section(
		rd_head('02', $x('One project, six stages', 'Un projet, six étapes'), $x('Where we fit in a water project', 'Notre place dans un projet d’eau'), $x('Use this to see which service line applies at each stage. Every project is different.', 'Servez-vous-en pour voir quel domaine d’activité intervient à chaque étape. Chaque projet est différent.')) .
		rd_stages(array(
			array($x('Advice and feasibility', 'Conseil et faisabilité'), $x('Consultancy and feasibility studies for water, sanitation and energy systems.', 'Conseil et études de faisabilité pour des systèmes d’eau, d’assainissement et d’énergie.'), array(array($x('Engineering', 'Ingénierie'), '#engineering'))),
			array($x('Test the water', 'Analyser l’eau'), $x('Laboratory analysis of the water, with on-site sampling available.', 'Analyses de laboratoire de l’eau, avec prélèvement sur site possible.'), array(array($x('Water Laboratory', 'Laboratoire'), $U['lab']))),
			array($x('Design the system', 'Concevoir le système'), $x('Design of water, sanitation and energy systems, with climate resilience planning and ESIAs.', 'Conception de systèmes d’eau, d’assainissement et d’énergie, avec planification de la résilience climatique et EIES.'), array(array($x('Engineering', 'Ingénierie'), '#engineering'))),
			array($x('Build and install', 'Construire et installer'), $x('Construction and supervision of water supply, sanitation facilities and renewable energy infrastructure.', 'Construction et supervision de systèmes d’approvisionnement en eau, d’installations sanitaires et d’infrastructures d’énergie renouvelable.'), array(array($x('Engineering', 'Ingénierie'), '#engineering'), array($x('Products', 'Produits'), '#products'))),
			array($x('Train people', 'Former les personnes'), $x('Technical courses for technicians and engineers, and community training on safe water, hygiene and sanitation.', 'Formations techniques pour techniciens et ingénieurs, et formation communautaire sur l’eau potable, l’hygiène et l’assainissement.'), array(array($x('Training', 'Formation'), '#training'))),
			array($x('Maintenance and support', 'Maintenance et assistance'), $x('Maintenance, plus distribution and after-sales support for products.', 'Maintenance, ainsi que distribution et service après-vente des produits.'), array(array($x('Engineering', 'Ingénierie'), '#engineering'), array($x('Products', 'Produits'), '#products'))),
		)), false, 'rd-section--stages', 'stages');
	$home .= rd_section(
		rd_head('03', $x('Project record', 'Références de projets'), $x('Projects will be shown like this', 'Les projets seront présentés ainsi'), $x('Each real project will get a location, a scope and a measured result with its source. Nothing is shown until it can be documented.', 'Chaque projet réel aura un lieu, un périmètre et un résultat mesuré avec sa source. Rien n’est affiché tant que cela ne peut pas être documenté.')) .
		$slots, true, '', 'projects');
	$home .= rd_section(
		rd_head('04', $x('For procurement teams', 'Pour les équipes achats'), $x('Supplier file: status of each item', 'Dossier fournisseur : état de chaque pièce'), $x('None of these documents is published yet. Ask for any of them by email and it will be supplied when available.', 'Aucune de ces pièces n’est encore publiée. Demandez-les par e-mail : elles seront fournies dès qu’elles seront disponibles.')) .
		$fileBlock, false, '', 'file');
	$home .= rd_section(
		rd_p($x('Work with us', 'Travaillons ensemble'), 'rd-eyebrow') .
		rd_h($x('Tell us about your project', 'Parlez-nous de votre projet'), 2) .
		rd_p($x('NGOs, municipalities, government agencies, companies, individuals, students and technicians are welcome. Say what you need, where the project is and who it is for.', 'ONG, municipalités, administrations, entreprises, particuliers, étudiants et techniciens sont les bienvenus. Indiquez ce dont vous avez besoin, où se trouve le projet et à qui il s’adresse.')) .
		$closeBtns . $emails .
		rd_p($base . '. ' . $hoursShort . '.', 'rd-note'), true, 'rd-section--close', 'contact');
	$out['home'] = $home;

	/* ---------------------------------------------------------------- SERVICES */
	$out['services'] = rd_section(
		rd_head('', $x('Services', 'Services'), $x('Our services', 'Nos services'), $x('Four service lines. Tell us what you need and we will propose the right approach.', 'Quatre domaines d’activité. Dites-nous ce dont vous avez besoin et nous vous proposerons la bonne approche.'), 1) .
		rd_cards($cardsPlain, 2)) .
		rd_section(rd_h($x('Not sure where to start?', 'Vous ne savez pas par où commencer ?'), 2) . rd_p($x('Describe your project and we will reply with next steps. Every project is different.', 'Décrivez votre projet et nous vous répondrons avec les prochaines étapes. Chaque projet est différent.')) . $closeBtns, true);

	/* ---------------------------------------------------------------- WATER LABORATORY */
	$labHero = rd_group(
		rd_group(
			rd_p($x('Services · Water Laboratory', 'Services · Laboratoire d’analyse de l’eau'), 'rd-eyebrow') .
			rd_h($x('Water Laboratory', 'Laboratoire d’analyse de l’eau'), 1) .
			rd_p($x('Chemical, physical and microbiological analysis, with on-site sampling available. For individuals, private companies, municipalities, NGOs and government agencies.', 'Analyses chimiques, physiques et microbiologiques, avec prélèvement sur site possible. Pour les particuliers, les entreprises privées, les municipalités, les ONG et les administrations.'), 'rd-lead') .
			rd_btns(array(
				array($x('Request a water test', 'Demander une analyse d’eau'), '#water-test'),
				array($x('Call', 'Appeler') . ' ' . $phone, $tel, true, 'rd-desk-only'),
				array('WhatsApp', $wa, true, 'rd-desk-only'),
			)) . rd_p($waNote, 'rd-note'), 'rd-lab__text') .
		rd_img($img['laboratory'], 'rd-lab__img', $x('Illustrative image', 'Image d’illustration'), 'large', 'sizes="(max-width: 899px) 92vw, 40vw" fetchpriority="high" loading="eager" decoding="async"'),
		'rd-lab__grid');
	$lab = rd_group(rd_group($labHero, 'rd-container'), 'rd-section rd-lab', true);
	$noteChip = $x('Methods and reporting limits for each parameter:', 'Méthodes et limites de rapport pour chaque paramètre :') . ' ' . rd_chip($tbs);
	$lab .= rd_section(
		rd_head('I', $x('What we test', 'Ce que nous analysons'), $x('Seven named parameters, three kinds of analysis', 'Sept paramètres nommés, trois types d’analyse'), $x('These are the parameters we list today. Need something that is not on this list? Ask.', 'Voici les paramètres que nous listons aujourd’hui. Vous avez besoin d’autre chose ? Demandez-nous.')) .
		rd_params(array(
			array('pH', $x('Chemical', 'Chimique')),
			array($x('Turbidity', 'Turbidité'), $x('Physical', 'Physique')),
			array($x('Total dissolved solids (TDS)', 'Solides dissous totaux (TDS)'), $x('Physical', 'Physique')),
			array($x('Hardness', 'Dureté'), $x('Chemical', 'Chimique')),
			array($x('Nitrates', 'Nitrates'), $x('Chemical', 'Chimique')),
			array($x('Heavy metals', 'Métaux lourds'), $x('Chemical', 'Chimique')),
			array('E. coli', $x('Microbiological', 'Microbiologique')),
		)) . rd_p($noteChip, 'rd-placeholder'), true);
	$ask = function ($subj, $label) {
		return '<a href="mailto:waterlab@rdengineeringsol.com?subject=' . $subj . '">' . $label . '</a>';
	};
	$lab .= rd_section(
		rd_head('II', $x('Status register', 'Registre des pièces'), $x('What the laboratory can document today', 'Ce que le laboratoire peut documenter aujourd’hui'), $x('Nothing below is claimed until it can be shown. Ask for any item by email.', 'Rien ci-dessous n’est affirmé tant que cela ne peut pas être montré. Demandez chaque pièce par e-mail.')) .
		rd_file(array(
			array($x('Laboratory accreditation', 'Accréditation du laboratoire'), $tbs, $ask('Request%3A%20accreditation', $askDocs)),
			array($x('Standards and methods used', 'Normes et méthodes utilisées'), $tbs, $ask('Request%3A%20methods', $askDocs)),
			array($x('Sample bottles and handling guidelines', 'Flacons et consignes de prélèvement'), $x('On request', 'Sur demande'), $ask('Request%3A%20sampling%20guidelines', $x('Ask before collecting', 'À demander avant de prélever'))),
			array($x('Turnaround times', 'Délais de rendu'), $x('Not yet confirmed', 'Pas encore confirmés'), $ask('Request%3A%20turnaround', $x('Ask by email', 'Demander par e-mail'))),
			array($x('Prices', 'Prix'), $tbc, $ask('Request%3A%20price', $x('Ask by email', 'Demander par e-mail'))),
		)));
	$lab .= rd_quote_band($x('We would rather leave a clear gap than fill it with claims we cannot document.', 'Nous préférons laisser un vide visible plutôt que le remplir avec des affirmations que nous ne pouvons pas documenter.'));
	$lab .= rd_section(
		rd_head('III', $x('How it works', 'Comment ça se passe'), $x('Four steps, from first message to results', 'Quatre étapes, du premier message aux résultats')) .
		rd_ol(array(
			'<strong>' . $x('Tell us about your project', 'Parlez-nous de votre projet') . '</strong><span>' . $x('What water, where, and what it is for.', 'Quelle eau, où, et pour quel usage.') . '</span>',
			'<strong>' . $x('We propose a testing plan', 'Nous proposons un plan d’analyses') . '</strong><span>' . $x('You receive a proposal for your project.', 'Vous recevez une proposition pour votre projet.') . '</span>',
			'<strong>' . $x('Testing begins', 'Les analyses commencent') . '</strong><span>' . $x('Visit the laboratory, or ask for on-site sampling.', 'Venez au laboratoire ou demandez un prélèvement sur site.') . '</span>',
			'<strong>' . $x('Reports are delivered', 'Remise des rapports') . '</strong><span>' . $x('You receive your results.', 'Vous recevez vos résultats.') . '</span>',
		), 'rd-steps'), true);
	$lab .= rd_section(
		rd_head('IV', $x('Submit a sample', 'Soumettre un échantillon'), $x('Before you write, have these ready', 'Avant de nous écrire, préparez ceci')) .
		rd_ulc(array(
			$x('Your name, organisation and a phone number.', 'Votre nom, votre organisation et un numéro de téléphone.'),
			$x('Where the water comes from (borehole, well, tap, surface water, other).', 'D’où vient l’eau (forage, puits, robinet, eau de surface, autre).'),
			$x('The reason for testing, and any parameters you already know you need.', 'Le motif de l’analyse et les paramètres dont vous savez déjà avoir besoin.'),
			$x('Whether you will bring the sample or want on-site sampling.', 'Si vous apporterez l’échantillon ou souhaitez un prélèvement sur site.'),
			$x('Any earlier reports you hold.', 'Les rapports antérieurs que vous détenez, le cas échéant.'),
		), 'rd-check') .
		rd_h($x('Water test request', 'Demande d’analyse d’eau'), 3) .
		rd_form_block(rd_cf7_form($lang, 'water'), $x('Water test request', 'Demande d’analyse d’eau')) .
		rd_p($x('Prefer to write? ', 'Vous préférez écrire ? ') . $mail('waterlab') . ' &middot; ' . $x('Call', 'Appeler') . ' <a href="' . $tel . '">' . $phone . '</a>. ' . $hoursShort . '.', 'rd-note'), false, '', 'water-test');
	$out['water-laboratory'] = $lab;

	/* ---------------------------------------------------------------- ABOUT */
	$out['about'] = rd_section(
		rd_p($x('About', 'À propos'), 'rd-eyebrow') . rd_h($x('About RD Engineering Solution', 'À propos de RD Engineering Solution'), 1) . rd_img($img['team'], 'rd-media') .
		rd_p($x('RD Engineering Solution works on water, sanitation and energy in Africa. From Bonassama-Douala, Cameroon, we combine engineering services, a water testing laboratory, professional training and a range of products.', 'RD Engineering Solution intervient dans l’eau, l’assainissement et l’énergie en Afrique. Depuis Bonassama-Douala, au Cameroun, nous réunissons des services d’ingénierie, un laboratoire d’analyse de l’eau, de la formation professionnelle et une gamme de produits.')) .
		rd_h($x('What drives our work', 'Ce qui guide notre travail'), 2) .
		rd_ul(array(
			'<strong>' . $x('Research and development:', 'Recherche et développement :') . '</strong> ' . $x('developing affordable and accessible water treatment solutions.', 'mise au point de solutions de traitement de l’eau abordables et accessibles.'),
			'<strong>' . $x('Training and awareness:', 'Formation et sensibilisation :') . '</strong> ' . $x('building community and institutional capacity on water safety.', 'renforcement des capacités des communautés et des institutions en matière de sécurité de l’eau.'),
			'<strong>' . $x('Local relevance:', 'Pertinence locale :') . '</strong> ' . $x('engineering solutions tailored to local contexts.', 'solutions d’ingénierie adaptées aux contextes locaux.'),
		))) .
		rd_section(
			rd_head('', $x('Company record', 'Dossier de l’entreprise'), $x('What we cannot show yet', 'Ce que nous ne pouvons pas encore montrer')) .
			rd_file(array(
				array($x('Team members: names, roles and qualifications', 'Équipe : noms, fonctions et qualifications'), $tbs),
				array($x('Company registration and tax numbers', 'Numéros d’immatriculation et d’identifiant fiscal'), $tbs),
				array($x('Partners and references', 'Partenaires et références'), $tbs),
			)) .
			rd_h($x('Projects', 'Projets'), 3) . $slots, true);

	/* ---------------------------------------------------------------- TENDERS */
	$out['tenders'] = rd_section(
		rd_p($x('For institutional buyers', 'Pour les acheteurs institutionnels'), 'rd-eyebrow') . rd_h($x('Tenders and procurement', 'Appels d’offres et marchés'), 1) .
		rd_p($x('Information for NGOs, public bodies and companies that need to qualify a supplier.', 'Informations pour les ONG, les organismes publics et les entreprises qui doivent qualifier un fournisseur.')) .
		rd_h($x('Company details', 'Informations sur l’entreprise'), 2) .
		rd_ul(array(
			'<strong>' . $x('Legal name:', 'Dénomination :') . '</strong> RD Engineering Solution',
			'<strong>' . $x('Base:', 'Siège :') . '</strong> ' . $base,
			'<strong>' . $x('Telephone:', 'Téléphone :') . '</strong> <a href="' . $tel . '">' . $phone . '</a>',
			'<strong>' . $x('Hours:', 'Horaires :') . '</strong> ' . $hoursShort,
		)) .
		rd_h($x('Service categories', 'Catégories de services'), 2) .
		rd_ul(array(
			$x('Engineering and consultancy for water, sanitation and energy', 'Ingénierie et conseil pour l’eau, l’assainissement et l’énergie'),
			$x('Water quality testing', 'Analyse de la qualité de l’eau'),
			$x('Professional training', 'Formation professionnelle'),
			$x('Supply of engineering and laboratory products', 'Fourniture de produits d’ingénierie et de laboratoire'),
		))) .
		rd_section(rd_head('', $x('Procurement readiness', 'Pour les équipes achats'), $x('Supplier file: status of each item', 'Dossier fournisseur : état de chaque pièce'), $x('None of these documents is published yet. Ask for any of them by email and it will be supplied when available.', 'Aucune de ces pièces n’est encore publiée. Demandez-les par e-mail : elles seront fournies dès qu’elles seront disponibles.')) . $fileBlock, true);

	/* ---------------------------------------------------------------- CONTACT */
	$out['contact'] = rd_section(
		rd_p($x('Contact', 'Contact'), 'rd-eyebrow') . rd_h($x('Contact us and request a quote', 'Contactez-nous et demandez un devis'), 1) .
		rd_p($x('Tell us about your project and we will reply with next steps.', 'Parlez-nous de votre projet et nous vous répondrons avec les prochaines étapes.')) .
		rd_form_block(rd_cf7_form($lang, 'quote'), $x('Quote request', 'Demande de devis'))) .
		rd_section(
			rd_h($x('Other ways to reach us', 'Autres moyens de nous joindre'), 2) .
			rd_ulc(array(
				'<strong>' . $x('Phone:', 'Téléphone :') . '</strong> <a href="' . $tel . '">' . $phone . '</a> <span class="rd-note-inline">(' . $x('WhatsApp to be confirmed', 'WhatsApp à confirmer') . ')</span>',
				'<strong>' . $x('Engineering:', 'Ingénierie :') . '</strong> ' . $mail('services'),
				'<strong>' . $x('Laboratory:', 'Laboratoire :') . '</strong> ' . $mail('waterlab'),
				'<strong>' . $x('Training:', 'Formation :') . '</strong> ' . $mail('training'),
				'<strong>' . $x('Products:', 'Produits :') . '</strong> ' . $mail('products'),
				'<strong>' . $x('Address:', 'Adresse :') . '</strong> ' . $base,
				'<strong>' . $x('Hours:', 'Horaires :') . '</strong> ' . $hoursShort,
			), 'rd-reach'), true);

	return $out;
}
