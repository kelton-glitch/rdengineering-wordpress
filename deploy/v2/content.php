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
	// Submit stays enabled; a missing consent tick is reported as an error instead of a dead grey button.
	update_post_meta($id, '_additional_settings', "acceptance_as_validation: on\n");
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
	$sample = $x('Sample', 'Exemple');
	$waNote = $x('WhatsApp availability on this number is to be confirmed.', 'La disponibilité de WhatsApp sur ce numéro reste à confirmer.');
	$GLOBALS['rd_sample'] = $sample;
	$GLOBALS['rd_work_with'] = $x('Work with us', 'Travaillons ensemble');
	$GLOBALS['rd_todo'] = $x('To be completed:', 'À compléter :');
	$GLOBALS['rd_caption'] = $x('Illustrative image', 'Image d’illustration');
	$sampleNote = $x(
		'Sample layout only — replace photos, project facts and credentials with real material when the owner supplies them.',
		'Mise en page d’exemple uniquement — remplacer photos, faits de projet et pièces par du matériel réel dès que le propriétaire les fournit.'
	);
	$heroMedia = function ($id, $fallbackCap) use ($x) {
		if ($id) {
			return rd_img($id, 'rd-page-hero__media', $x('Illustrative image', 'Image d’illustration'), 'large', 'sizes="(max-width: 899px) 92vw, 38vw" loading="eager" decoding="async"');
		}
		return rd_media_slot($fallbackCap);
	};
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
	$out['services'] = rd_page_hero(
			$x('Services', 'Services'),
			$x('Our services', 'Nos services'),
			$x('Four service lines. Tell us what you need and we will propose the right approach.', 'Quatre domaines d’activité. Dites-nous ce dont vous avez besoin et nous vous proposerons la bonne approche.'),
			$closeBtns
		) .
		rd_section(rd_cards($cardsPlain, 2) . rd_p($sampleNote, 'rd-note'), true) .
		rd_page_close(
			$x('Not sure where to start?', 'Vous ne savez pas par où commencer ?'),
			$x('Describe your project and we will reply with next steps. Every project is different.', 'Décrivez votre projet et nous vous répondrons avec les prochaines étapes. Chaque projet est différent.'),
			$closeBtns
		);

	/* ---------------------------------------------------------------- ENGINEERING (Ingerop-style scope + placeholders) */
	$engBtns = rd_btns(array(
		array($x('Request a quote', 'Demander un devis'), $U['contact']),
		array($x('Call', 'Appeler') . ' ' . $phone, $tel, true, 'rd-desk-only'),
		array('WhatsApp', $wa, true, 'rd-desk-only'),
	)) . rd_p($waNote, 'rd-note');
	$eng = rd_page_hero(
		$x('Services · Engineering', 'Services · Ingénierie'),
		$x('Engineering Services', 'Services d’ingénierie'),
		$x('Design, construction, installation, maintenance and consultancy for water, sanitation and energy systems — from feasibility through handover.', 'Conception, construction, installation, maintenance et conseil pour des systèmes d’eau, d’assainissement et d’énergie — de la faisabilité jusqu’à la remise.'),
		$engBtns,
		$heroMedia(isset($img['engineering']) ? $img['engineering'] : 0, $x('Field / works photo to be supplied', 'Photo de chantier à fournir'))
	);
	$eng .= rd_section(
		rd_head('01', $x('Who this is for', 'Pour qui'), $x('Buyers who need a clear engineering desk', 'Acheteurs qui ont besoin d’un bureau d’ingénierie clair'), $x('Municipalities, NGOs, donors, private companies and programme managers who must scope works in Cameroon and across the region.', 'Municipalités, ONG, bailleurs, entreprises et chefs de programme qui doivent cadrer des travaux au Cameroun et dans la région.')) .
		rd_p($sampleNote, 'rd-note'));
	$eng .= rd_section(
		rd_head('02', $x('Scope of work', 'Périmètre'), $x('Services provided and technical skills', 'Services fournis et compétences techniques'), $x('Draft lists for layout review. Owner will adjust wording and depth.', 'Listes provisoires pour valider la mise en page. Le propriétaire ajustera le texte et le niveau de détail.')) .
		rd_scope_grid(
			$x('Services provided', 'Services fournis'),
			array(
				$x('Feasibility studies and site advice', 'Études de faisabilité et conseil sur site'),
				$x('System design for water supply, sanitation and energy', 'Conception de systèmes d’eau, d’assainissement et d’énergie'),
				$x('Borehole development and pump installation (sample wording)', 'Développement de forages et installation de pompes (libellé d’exemple)'),
				$x('Construction supervision and handover', 'Supervision de construction et remise'),
				$x('Climate resilience planning and ESIAs', 'Planification de la résilience climatique et EIES'),
				$x('Maintenance planning and after-sales support', 'Plan de maintenance et assistance après-vente'),
			),
			$x('Technical skills', 'Compétences techniques'),
			array(
				$x('Hydraulics and pipe network design (sample)', 'Hydraulique et conception de réseaux (exemple)'),
				$x('Civil works for water and sanitation structures (sample)', 'Génie civil pour ouvrages d’eau et d’assainissement (exemple)'),
				$x('Electromechanical / solar pumping support (sample)', 'Support électromécanique / pompage solaire (exemple)'),
				$x('Environmental and social screening inputs (sample)', 'Entrées de screening environnemental et social (exemple)'),
				$x('As-built documentation and operator briefing (sample)', 'Dossiers de récolement et briefing opérateurs (exemple)'),
			)
		), true);
	$eng .= rd_section(
		rd_head('03', $x('Project sheets', 'Fiches projet'), $x('How references will look', 'À quoi ressembleront les références'), $x('Dummy sheets for visual layout. Replace with real location, scope and measured results.', 'Fiches fictives pour la mise en page. À remplacer par le lieu, le périmètre et les résultats mesurés.')) .
		rd_group(
			rd_group(
				rd_p('<strong>' . $x('Sample 01 · Community borehole', 'Exemple 01 · Forage communautaire') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Where', 'Lieu') . ': Bonabéri, Douala · ' . $x('Scope', 'Périmètre') . ': ' . $x('Drilling, pump, briefing', 'Forage, pompe, briefing') . ' · ' . $x('Result', 'Résultat') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample 02 · WASH block', 'Exemple 02 · Bloc WASH') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Where', 'Lieu') . ': ' . $tbs . ' · ' . $x('Scope', 'Périmètre') . ': ' . $tbs . ' · ' . $x('Result', 'Résultat') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample 03 · Solar pump retrofit', 'Exemple 03 · Pompe solaire') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Where', 'Lieu') . ': ' . $tbs . ' · ' . $x('Scope', 'Périmètre') . ': ' . $tbs . ' · ' . $x('Result', 'Résultat') . ': ' . $tbs),
				'rd-slot'
			),
			'rd-slots'
		) .
		rd_media_slot($x('Project photography to be supplied', 'Photographies de projet à fournir')));
	$eng .= rd_section(
		rd_head('04', $x('Credentials', 'Pièces'), $x('What engineering can document today', 'Ce que l’ingénierie peut documenter aujourd’hui')) .
		rd_file(array(
			array($x('Team CVs and licences', 'CV et licences de l’équipe'), $tbs),
			array($x('Sample method statements', 'Notes de méthode types'), $tbs),
			array($x('Insurance certificates', 'Attestations d’assurance'), $tbs),
			array($x('Past project references', 'Références de projets'), $tbs),
		)) .
		rd_p($mail('services'), 'rd-note'), true);
	$eng .= rd_page_close(
		$x('Plan an engineering scope', 'Cadrez un périmètre d’ingénierie'),
		$x('Say what you need, where the site is, and who it is for. We reply from the engineering desk.', 'Indiquez le besoin, le site et le public. Nous répondons depuis le bureau d’ingénierie.'),
		$engBtns,
		rd_p($mail('services'), 'rd-note')
	);
	$out['engineering-services'] = $eng;

	/* ---------------------------------------------------------------- WATER LABORATORY */
	$labBtns = rd_btns(array(
		array($x('Request a water test', 'Demander une analyse d’eau'), '#water-test'),
		array($x('Call', 'Appeler') . ' ' . $phone, $tel, true, 'rd-desk-only'),
		array('WhatsApp', $wa, true, 'rd-desk-only'),
	)) . rd_p($waNote, 'rd-note');
	$lab = rd_page_hero(
		$x('Services · Water Laboratory', 'Services · Laboratoire d’analyse de l’eau'),
		$x('Water Laboratory', 'Laboratoire d’analyse de l’eau'),
		$x('Chemical, physical and microbiological analysis, with on-site sampling available. For individuals, private companies, municipalities, NGOs and government agencies.', 'Analyses chimiques, physiques et microbiologiques, avec prélèvement sur site possible. Pour les particuliers, les entreprises privées, les municipalités, les ONG et les administrations.'),
		$labBtns,
		$heroMedia(isset($img['laboratory']) ? $img['laboratory'] : 0, $x('Laboratory bench photo to be supplied', 'Photo de paillasse à fournir'))
	);
	$lab .= rd_section(
		rd_head('01', $x('Scope of testing', 'Périmètre d’analyse'), $x('Services provided and methods', 'Services fournis et méthodes'), $x('Parameter list is confirmed. Methods and limits stay as gaps until documented.', 'La liste de paramètres est confirmée. Méthodes et limites restent en écart tant qu’elles ne sont pas documentées.')) .
		rd_scope_grid(
			$x('Services provided', 'Services fournis'),
			array(
				$x('Chemical analysis (pH, hardness, nitrates, heavy metals)', 'Analyses chimiques (pH, dureté, nitrates, métaux lourds)'),
				$x('Physical analysis (turbidity, TDS)', 'Analyses physiques (turbidité, TDS)'),
				$x('Microbiological analysis (E. coli)', 'Analyses microbiologiques (E. coli)'),
				$x('On-site sampling on request', 'Prélèvement sur site sur demande'),
				$x('Written results for your file (format to be confirmed)', 'Résultats écrits pour votre dossier (format à confirmer)'),
			),
			$x('Methods and skills', 'Méthodes et compétences'),
			array(
				$x('Sampling handling guidance (on request)', 'Consignes de prélèvement (sur demande)'),
				$x('Standard methods used', 'Normes et méthodes utilisées') . ' — ' . rd_chip($tbs),
				$x('Reporting limits per parameter', 'Limites de rapport par paramètre') . ' — ' . rd_chip($tbs),
				$x('Turnaround times', 'Délais de rendu') . ' — ' . rd_chip($tbc),
				$x('Accreditation status', 'Statut d’accréditation') . ' — ' . rd_chip($tbs),
			)
		));
	$noteChip = $x('Methods and reporting limits for each parameter:', 'Méthodes et limites de rapport pour chaque paramètre :') . ' ' . rd_chip($tbs);
	$lab .= rd_section(
		rd_head('02', $x('What we test', 'Ce que nous analysons'), $x('Seven named parameters, three kinds of analysis', 'Sept paramètres nommés, trois types d’analyse'), $x('These are the parameters we list today. Need something that is not on this list? Ask.', 'Voici les paramètres que nous listons aujourd’hui. Vous avez besoin d’autre chose ? Demandez-nous.')) .
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
		rd_head('03', $x('Status register', 'Registre des pièces'), $x('What the laboratory can document today', 'Ce que le laboratoire peut documenter aujourd’hui'), $x('Nothing below is claimed until it can be shown. Ask for any item by email.', 'Rien ci-dessous n’est affirmé tant que cela ne peut pas être montré. Demandez chaque pièce par e-mail.')) .
		rd_file(array(
			array($x('Laboratory accreditation', 'Accréditation du laboratoire'), $tbs, $ask('Request%3A%20accreditation', $askDocs)),
			array($x('Standards and methods used', 'Normes et méthodes utilisées'), $tbs, $ask('Request%3A%20methods', $askDocs)),
			array($x('Sample bottles and handling guidelines', 'Flacons et consignes de prélèvement'), $x('On request', 'Sur demande'), $ask('Request%3A%20sampling%20guidelines', $x('Ask before collecting', 'À demander avant de prélever'))),
			array($x('Turnaround times', 'Délais de rendu'), $x('Not yet confirmed', 'Pas encore confirmés'), $ask('Request%3A%20turnaround', $x('Ask by email', 'Demander par e-mail'))),
			array($x('Prices', 'Prix'), $tbc, $ask('Request%3A%20price', $x('Ask by email', 'Demander par e-mail'))),
		)));
	$lab .= rd_quote_band($x('We would rather leave a clear gap than fill it with claims we cannot document.', 'Nous préférons laisser un vide visible plutôt que le remplir avec des affirmations que nous ne pouvons pas documenter.'));
	$lab .= rd_section(
		rd_head('04', $x('How it works', 'Comment ça se passe'), $x('Four steps, from first message to results', 'Quatre étapes, du premier message aux résultats')) .
		rd_ol(array(
			'<strong>' . $x('Tell us about your project', 'Parlez-nous de votre projet') . '</strong><span>' . $x('What water, where, and what it is for.', 'Quelle eau, où, et pour quel usage.') . '</span>',
			'<strong>' . $x('We propose a testing plan', 'Nous proposons un plan d’analyses') . '</strong><span>' . $x('You receive a proposal for your project.', 'Vous recevez une proposition pour votre projet.') . '</span>',
			'<strong>' . $x('Testing begins', 'Les analyses commencent') . '</strong><span>' . $x('Visit the laboratory, or ask for on-site sampling.', 'Venez au laboratoire ou demandez un prélèvement sur site.') . '</span>',
			'<strong>' . $x('Reports are delivered', 'Remise des rapports') . '</strong><span>' . $x('You receive your results.', 'Vous recevez vos résultats.') . '</span>',
		), 'rd-steps'), true);
	$lab .= rd_section(
		rd_head('05', $x('Submit a sample', 'Soumettre un échantillon'), $x('Before you write, have these ready', 'Avant de nous écrire, préparez ceci')) .
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
	$out['about'] = rd_page_hero(
			$x('About', 'À propos'),
			$x('About RD Engineering Solution', 'À propos de RD Engineering Solution'),
			$x('Water, sanitation and energy from Bonassama-Douala — engineering, laboratory, training and products under one roof.', 'Eau, assainissement et énergie depuis Bonassama-Douala — ingénierie, laboratoire, formation et produits sous le même toit.'),
			$closeBtns,
			$heroMedia(isset($img['team']) ? $img['team'] : 0, $x('Team / office photo to be supplied', 'Photo d’équipe / bureau à fournir'))
		) .
		rd_section(
			rd_p($x('RD Engineering Solution works on water, sanitation and energy in Africa. From Bonassama-Douala, Cameroon, we combine engineering services, a water testing laboratory, professional training and a range of products.', 'RD Engineering Solution intervient dans l’eau, l’assainissement et l’énergie en Afrique. Depuis Bonassama-Douala, au Cameroun, nous réunissons des services d’ingénierie, un laboratoire d’analyse de l’eau, de la formation professionnelle et une gamme de produits.')) .
			rd_h($x('What drives our work', 'Ce qui guide notre travail'), 2) .
			rd_ul(array(
				'<strong>' . $x('Research and development:', 'Recherche et développement :') . '</strong> ' . $x('developing affordable and accessible water treatment solutions.', 'mise au point de solutions de traitement de l’eau abordables et accessibles.'),
				'<strong>' . $x('Training and awareness:', 'Formation et sensibilisation :') . '</strong> ' . $x('building community and institutional capacity on water safety.', 'renforcement des capacités des communautés et des institutions en matière de sécurité de l’eau.'),
				'<strong>' . $x('Local relevance:', 'Pertinence locale :') . '</strong> ' . $x('engineering solutions tailored to local contexts.', 'solutions d’ingénierie adaptées aux contextes locaux.'),
			)) .
			rd_p($sampleNote, 'rd-note')) .
		rd_section(
			rd_head('01', $x('Company record', 'Dossier de l’entreprise'), $x('What we cannot show yet', 'Ce que nous ne pouvons pas encore montrer')) .
			rd_file(array(
				array($x('Team members: names, roles and qualifications', 'Équipe : noms, fonctions et qualifications'), $tbs),
				array($x('Company registration and tax numbers', 'Numéros d’immatriculation et d’identifiant fiscal'), $tbs),
				array($x('Partners and references', 'Partenaires et références'), $tbs),
			)) .
			rd_h($x('Projects', 'Projets'), 3) . $slots, true) .
		rd_page_close(
			$x('Tell us about your project', 'Parlez-nous de votre projet'),
			$x('NGOs, municipalities, companies and individuals are welcome.', 'ONG, municipalités, entreprises et particuliers sont les bienvenus.'),
			$closeBtns,
			$emails
		);

	/* ---------------------------------------------------------------- TENDERS */
	$out['tenders'] = rd_page_hero(
			$x('For institutional buyers', 'Pour les acheteurs institutionnels'),
			$x('Tenders and procurement', 'Appels d’offres et marchés'),
			$x('Information for NGOs, public bodies and companies that need to qualify a supplier.', 'Informations pour les ONG, les organismes publics et les entreprises qui doivent qualifier un fournisseur.'),
			rd_btns(array(
				array($x('Ask for supplier documents', 'Demander les documents fournisseur'), 'mailto:services@rdengineeringsol.com?subject=' . $x('Supplier%20documents%20request', 'Demande%20de%20documents%20fournisseur')),
				array($x('Request a quote', 'Demander un devis'), $U['contact'], true),
			))
		) .
		rd_section(
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
		rd_section(
			rd_head('01', $x('Procurement readiness', 'Pour les équipes achats'), $x('Supplier file: status of each item', 'Dossier fournisseur : état de chaque pièce'), $x('None of these documents is published yet. Ask for any of them by email and it will be supplied when available.', 'Aucune de ces pièces n’est encore publiée. Demandez-les par e-mail : elles seront fournies dès qu’elles seront disponibles.')) .
			$fileBlock, true);

	/* ---------------------------------------------------------------- CONTACT */
	$reach = rd_group(
			rd_h($x('Other ways to reach us', 'Autres moyens de nous joindre'), 2) .
			rd_ulc(array(
				'<strong>' . $x('Phone:', 'Téléphone :') . '</strong> <a href="' . $tel . '">' . $phone . '</a> <span class="rd-note-inline">(' . $x('WhatsApp to be confirmed', 'WhatsApp à confirmer') . ')</span>',
				'<strong>' . $x('Engineering:', 'Ingénierie :') . '</strong> ' . $mail('services'),
				'<strong>' . $x('Laboratory:', 'Laboratoire :') . '</strong> ' . $mail('waterlab'),
				'<strong>' . $x('Training:', 'Formation :') . '</strong> ' . $mail('training'),
				'<strong>' . $x('Products:', 'Produits :') . '</strong> ' . $mail('products'),
				'<strong>' . $x('Address:', 'Adresse :') . '</strong> ' . $base,
				'<strong>' . $x('Hours:', 'Horaires :') . '</strong> ' . $hoursShort,
			), 'rd-reach'), 'rd-aside');
	$out['contact'] = rd_page_hero(
			$x('Contact', 'Contact'),
			$x('Contact us and request a quote', 'Contactez-nous et demandez un devis'),
			$x('Tell us about your project and we will reply with next steps.', 'Parlez-nous de votre projet et nous vous répondrons avec les prochaines étapes.'),
			rd_btns(array(
				array($x('Call', 'Appeler') . ' ' . $phone, $tel, true),
				array('WhatsApp', $wa, true),
			)) . rd_p($waNote, 'rd-note')
		) .
		rd_section(
			rd_group(
				rd_group(rd_form_block(rd_cf7_form($lang, 'quote'), $x('Quote request', 'Demande de devis')), 'rd-split__main') . $reach,
				'rd-split'
			));

	/* ---------------------------------------------------------------- PROFESSIONAL TRAINING */
	$trainBtns = rd_btns(array(
		array($x('Request a quote', 'Demander un devis'), $U['contact']),
		array($x('Call', 'Appeler') . ' ' . $phone, $tel, true, 'rd-desk-only'),
		array('WhatsApp', $wa, true, 'rd-desk-only'),
	)) . rd_p($waNote, 'rd-note');
	$train = rd_page_hero(
		$x('Services · Training', 'Services · Formation'),
		$x('Professional Training', 'Formation professionnelle'),
		$x('Technical courses with certificates — for technicians, engineers, NGOs, municipalities and companies. Corporate and on-site options.', 'Formations techniques avec certificat — pour techniciens, ingénieurs, ONG, municipalités et entreprises. Options entreprise et sur site.'),
		$trainBtns,
		$heroMedia(isset($img['training']) ? $img['training'] : 0, $x('Training session photo to be supplied', 'Photo de session de formation à fournir'))
	);
	$train .= rd_section(
		rd_head('01', $x('Who this is for', 'Pour qui'), $x('People and teams who need practical skills', 'Personnes et équipes qui ont besoin de compétences pratiques'), $x('Students, technicians, engineers, NGO and municipal staff, and private companies upgrading field skills.', 'Étudiants, techniciens, ingénieurs, agents d’ONG et de municipalités, et entreprises renforçant les compétences terrain.')) .
		rd_p($sampleNote, 'rd-note'));
	$train .= rd_section(
		rd_head('02', $x('Programmes', 'Programmes'), $x('What we offer and how we deliver', 'Ce que nous proposons et comment nous le livrons'), $x('Draft programme list for layout. Owner will confirm titles, duration and certificates.', 'Liste provisoire pour la mise en page. Le propriétaire confirmera titres, durée et certificats.')) .
		rd_scope_grid(
			$x('Programmes offered', 'Programmes proposés'),
			array(
				$x('Technical training in WASH engineering', 'Formation technique en ingénierie WASH'),
				$x('Water testing and laboratory practice (sample)', 'Analyse de l’eau et pratique de laboratoire (exemple)'),
				$x('Renewable energy / solar pumping (sample)', 'Énergie renouvelable / pompage solaire (exemple)'),
				$x('Short courses for NGOs and municipalities', 'Formations courtes pour ONG et municipalités'),
				$x('Community training on safe water and hygiene', 'Formation communautaire sur l’eau potable et l’hygiène'),
				$x('Project management and monitoring workshops (sample)', 'Ateliers de gestion de projet et de suivi (exemple)'),
			),
			$x('Delivery and outcomes', 'Modalités et résultats'),
			array(
				$x('Certificate on successful completion', 'Certificat à l’issue de la formation'),
				$x('Corporate / on-site training on request', 'Formation en entreprise / sur site sur demande'),
				$x('Internship and mentorship (sample — to confirm)', 'Stage et mentorat (exemple — à confirmer)'),
				$x('Course calendar and fees', 'Calendrier et tarifs') . ' — ' . rd_chip($tbs),
				$x('Trainer CVs and outlines', 'CV des formateurs et plans de cours') . ' — ' . rd_chip($tbs),
			)
		), true);
	$train .= rd_section(
		rd_head('03', $x('Sample course sheets', 'Fiches cours types'), $x('How courses will be presented', 'Comment les cours seront présentés')) .
		rd_group(
			rd_group(
				rd_p('<strong>' . $x('Sample · Safe water sampling', 'Exemple · Prélèvement d’eau potable') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Duration', 'Durée') . ': ' . $tbs . ' · ' . $x('Audience', 'Public') . ': ' . $tbs . ' · ' . $x('Outcome', 'Résultat') . ': ' . $x('Certificate', 'Certificat') . ' — ' . rd_chip($tbc)),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample · Solar pump basics', 'Exemple · Bases pompe solaire') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Duration', 'Durée') . ': ' . $tbs . ' · ' . $x('Audience', 'Public') . ': ' . $tbs . ' · ' . $x('Outcome', 'Résultat') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample · Lab practice day', 'Exemple · Journée pratique labo') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Duration', 'Durée') . ': ' . $tbs . ' · ' . $x('Audience', 'Public') . ': ' . $tbs . ' · ' . $x('Outcome', 'Résultat') . ': ' . $tbs),
				'rd-slot'
			),
			'rd-slots'
		) .
		rd_media_slot($x('Classroom / field training photo to be supplied', 'Photo de formation en salle / terrain à fournir')));
	$train .= rd_section(
		rd_head('04', $x('Common questions', 'Questions fréquentes'), $x('Quick answers', 'Réponses rapides')) .
		rd_details($x('Who can enrol?', 'Qui peut s’inscrire ?'), $x('Students, technicians, engineers and professionals seeking to upgrade skills or meet certification needs.', 'Étudiants, techniciens, ingénieurs et professionnels souhaitant renforcer leurs compétences ou répondre à des exigences de certification.')) .
		rd_details($x('Do you provide certificates?', 'Délivrez-vous des certificats ?'), $x('Yes. Participants receive a certificate on successful completion of each programme.', 'Oui. Les participants reçoivent un certificat après avoir terminé avec succès chaque programme.')) .
		rd_details($x('Can you train on site?', 'Pouvez-vous former sur site ?'), $x('Yes. We offer tailored corporate and on-site programmes.', 'Oui. Nous proposons des programmes sur mesure en entreprise et sur site.')), true);
	$train .= rd_page_close(
		$x('Plan a training', 'Planifiez une formation'),
		$x('Tell us the topic, audience and location. We reply from the training desk.', 'Indiquez le thème, le public et le lieu. Nous répondons depuis le bureau formation.'),
		$trainBtns,
		rd_p($mail('training'), 'rd-note')
	);
	$out['professional-training'] = $train;

	/* ---------------------------------------------------------------- PRODUCTS */
	$prodBtns = rd_btns(array(
		array($x('Request a product quote', 'Demander un devis produit'), $U['contact']),
		array($x('Call', 'Appeler') . ' ' . $phone, $tel, true, 'rd-desk-only'),
		array('WhatsApp', $wa, true, 'rd-desk-only'),
	)) . rd_p($waNote, 'rd-note');
	$prod = rd_page_hero(
		$x('Services · Products', 'Services · Produits'),
		$x('Products', 'Produits'),
		$x('Water treatment, sanitation and energy products — plus kits and after-sales. Prices on request.', 'Produits pour l’eau, l’assainissement et l’énergie — plus kits et SAV. Prix sur demande.'),
		$prodBtns,
		$heroMedia(isset($img['products']) ? $img['products'] : 0, $x('Product / catalogue photo to be supplied', 'Photo catalogue / produit à fournir'))
	);
	$prod .= rd_section(
		rd_head('01', $x('Who this is for', 'Pour qui'), $x('Buyers who need supply with support', 'Acheteurs qui ont besoin de fourniture avec support'), $x('Projects, municipalities, NGOs and companies that need equipment, kits or consumables with clear after-sales.', 'Projets, municipalités, ONG et entreprises qui ont besoin d’équipements, kits ou consommables avec un SAV clair.')) .
		rd_p($sampleNote, 'rd-note'));
	$prod .= rd_section(
		rd_head('02', $x('Catalogue outline', 'Esquisse du catalogue'), $x('Categories and support', 'Catégories et support'), $x('Sample category lists for layout. SKUs, prices and stock stay as gaps.', 'Listes de catégories pour la mise en page. Références, prix et stock restent en écart.')) .
		rd_scope_grid(
			$x('Product lines', 'Gammes de produits'),
			array(
				$x('Water treatment and sanitation: filters, chlorine, latrine slabs, handwashing kits', 'Traitement de l’eau et assainissement : filtres, chlore, dalles, kits de lavage des mains'),
				$x('Renewable energy: solar pumps, solar lighting, efficient stoves', 'Énergie renouvelable : pompes solaires, éclairage solaire, foyers améliorés'),
				$x('Engineering and field kits: drilling kits, water testing kits', 'Kits d’ingénierie et de terrain : kits de forage, kits d’analyse'),
				$x('Spare parts and consumables (sample)', 'Pièces détachées et consommables (exemple)'),
				$x('Locally developed innovations (sample — to confirm)', 'Innovations locales (exemple — à confirmer)'),
			),
			$x('Commercial terms', 'Conditions commerciales'),
			array(
				$x('Prices on request', 'Prix sur demande'),
				$x('Distribution and delivery', 'Distribution et livraison') . ' — ' . rd_chip($tbs),
				$x('Warranty terms', 'Conditions de garantie') . ' — ' . rd_chip($tbs),
				$x('After-sales and maintenance', 'SAV et maintenance'),
				$x('Stock list / lead times', 'Stock / délais') . ' — ' . rd_chip($tbs),
			)
		), true);
	$prod .= rd_section(
		rd_head('03', $x('Sample product cards', 'Fiches produit types'), $x('How items will appear', 'Comment les articles apparaîtront')) .
		rd_group(
			rd_group(
				rd_p('<strong>' . $x('Sample · Household filter kit', 'Exemple · Kit filtre domestique') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Use', 'Usage') . ': ' . $tbs . ' · ' . $x('Price', 'Prix') . ': ' . $tbc . ' · ' . $x('Photo', 'Photo') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample · Solar pump set', 'Exemple · Ensemble pompe solaire') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Use', 'Usage') . ': ' . $tbs . ' · ' . $x('Price', 'Prix') . ': ' . $tbc . ' · ' . $x('Photo', 'Photo') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample · Field test kit', 'Exemple · Kit d’analyse terrain') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Use', 'Usage') . ': ' . $tbs . ' · ' . $x('Price', 'Prix') . ': ' . $tbc . ' · ' . $x('Photo', 'Photo') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample · Chlorine dosing set', 'Exemple · Ensemble dosage chlore') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Use', 'Usage') . ': ' . $tbs . ' · ' . $x('Price', 'Prix') . ': ' . $tbc . ' · ' . $x('Photo', 'Photo') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample · Handwashing station', 'Exemple · Station de lavage des mains') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Use', 'Usage') . ': ' . $tbs . ' · ' . $x('Price', 'Prix') . ': ' . $tbc . ' · ' . $x('Photo', 'Photo') . ': ' . $tbs),
				'rd-slot'
			) .
			rd_group(
				rd_p('<strong>' . $x('Sample · Spare parts pack', 'Exemple · Pack pièces détachées') . '</strong> ' . rd_chip($sample)) .
				rd_p($x('Use', 'Usage') . ': ' . $tbs . ' · ' . $x('Price', 'Prix') . ': ' . $tbc . ' · ' . $x('Photo', 'Photo') . ': ' . $tbs),
				'rd-slot'
			),
			'rd-slots'
		) .
		rd_media_slot($x('Catalogue photography to be supplied', 'Photographies catalogue à fournir')));
	$prod .= rd_section(
		rd_head('04', $x('Common questions', 'Questions fréquentes'), $x('Quick answers', 'Réponses rapides')) .
		rd_details($x('What do you supply?', 'Que fournissez-vous ?'), $x('Engineering and laboratory products such as water treatment equipment, testing instruments, spare parts and consumables.', 'Produits d’ingénierie et de laboratoire : équipements de traitement, instruments d’analyse, pièces et consommables.')) .
		rd_details($x('After-sales support?', 'Service après-vente ?'), $x('Yes. Technical support, maintenance and replacement services.', 'Oui. Assistance technique, maintenance et remplacement.')) .
		rd_details($x('How do I get a quote?', 'Comment obtenir un devis ?'), $x('Contact us with your product needs; we reply with pricing and availability.', 'Contactez-nous avec vos besoins ; nous répondons avec prix et disponibilité.')), true);
	$prod .= rd_page_close(
		$x('Request a product quote', 'Demandez un devis produit'),
		$x('List the items or describe the need. We reply from the products desk.', 'Listez les articles ou décrivez le besoin. Nous répondons depuis le bureau produits.'),
		$prodBtns,
		rd_p($mail('products'), 'rd-note')
	);
	$out['products'] = $prod;

	/* ---------------------------------------------------------------- FAQ */
	$out['faq'] = rd_page_hero(
			$x('Help', 'Aide'),
			$x('Frequently asked questions', 'Foire aux questions'),
			$x('Short answers about engineering, the laboratory, training, products and how to reach us.', 'Réponses courtes sur l’ingénierie, le laboratoire, la formation, les produits et comment nous joindre.'),
			$closeBtns
		) .
		rd_section(
			rd_head('01', $x('Engineering', 'Ingénierie'), $x('Works and design', 'Travaux et conception')) .
			rd_details($x('What engineering services do you provide?', 'Quels services d’ingénierie proposez-vous ?'), $x('Design, construction, installation, maintenance and consultancy across water treatment, civil works and industrial systems.', 'Conception, construction, installation, maintenance et conseil pour le traitement de l’eau, le génie civil et les systèmes industriels.')) .
			rd_details($x('Small and large projects?', 'Petits et grands projets ?'), $x('Yes. From community systems to industrial or municipal works.', 'Oui. Des systèmes communautaires aux ouvrages industriels ou municipaux.')) .
			rd_details($x('Custom solutions?', 'Solutions sur mesure ?'), $x('Yes. Designs and plans are tailored to the site and client needs.', 'Oui. Conceptions et plans adaptés au site et aux besoins du client.'))) .
		rd_section(
			rd_head('02', $x('Water laboratory', 'Laboratoire d’eau'), $x('Testing and sampling', 'Analyses et prélèvements')) .
			rd_details($x('What does the laboratory offer?', 'Que propose le laboratoire ?'), $x('Chemical, physical and microbiological analyses for domestic, industrial and environmental use.', 'Analyses chimiques, physiques et microbiologiques pour usages domestiques, industriels et environnementaux.')) .
			rd_details($x('Which parameters?', 'Quels paramètres ?'), $x('pH, turbidity, TDS, hardness, nitrates, heavy metals, E. coli and other key indicators.', 'pH, turbidité, TDS, dureté, nitrates, métaux lourds, E. coli et autres indicateurs clés.')) .
			rd_details($x('Who can use it?', 'Qui peut y faire appel ?'), $x('Individuals, companies, municipalities, NGOs and government agencies.', 'Particuliers, entreprises, municipalités, ONG et administrations.')) .
			rd_details($x('How do I submit a sample?', 'Comment soumettre un échantillon ?'), $x('Visit the laboratory or ask for sampling guidelines; on-site sampling is available.', 'Venez au laboratoire ou demandez les consignes ; le prélèvement sur site est possible.')), true) .
		rd_section(
			rd_head('03', $x('Training and products', 'Formation et produits'), $x('Courses and supply', 'Cours et fourniture')) .
			rd_details($x('What training do you provide?', 'Quelle formation proposez-vous ?'), $x('Technical and professional training in engineering, laboratory analysis, project management, safety and equipment operation.', 'Formation technique et professionnelle en ingénierie, analyse, gestion de projet, sécurité et utilisation d’équipements.')) .
			rd_details($x('Certificates?', 'Certificats ?'), $x('Yes, on successful completion of each programme.', 'Oui, à l’issue réussie de chaque programme.')) .
			rd_details($x('What products do you supply?', 'Quels produits fournissez-vous ?'), $x('Water treatment equipment, testing instruments, spare parts and consumables.', 'Équipements de traitement, instruments d’analyse, pièces et consommables.')) .
			rd_details($x('After-sales?', 'SAV ?'), $x('Yes. Technical support, maintenance and replacement.', 'Oui. Assistance technique, maintenance et remplacement.'))) .
		rd_section(
			rd_head('04', $x('Contact', 'Contact'), $x('Reach the right desk', 'Joindre le bon bureau')) .
			rd_details($x('How do I contact you?', 'Comment vous contacter ?'), $x('Use the contact form, email or phone for enquiries and bookings.', 'Formulaire de contact, e-mail ou téléphone pour les demandes et réservations.')) .
			rd_details($x('Where are you based?', 'Où êtes-vous basés ?'), $x('Bonassama-Douala, Cameroon. We serve clients nationwide and across the region.', 'Bonassama-Douala, Cameroun. Nous servons des clients dans le pays et la région.')) .
			rd_details($x('Business hours?', 'Horaires ?'), $hoursShort), true) .
		rd_page_close(
			$x('Still need help?', 'Besoin d’aide encore ?'),
			$x('Send a clear request and we will route it to the right desk.', 'Envoyez une demande claire ; nous la dirigeons vers le bon bureau.'),
			$closeBtns
		);

	/* ---------------------------------------------------------------- PRIVACY */
	$out['privacy'] = rd_page_hero(
			$x('Legal', 'Mentions'),
			$x('Privacy policy', 'Politique de confidentialité'),
			$x('How we handle personal information collected through this website.', 'Comment nous traitons les informations personnelles collectées via ce site.'),
			rd_btns(array(
				array($x('Contact us', 'Nous contacter'), $U['contact'], true),
			))
		) .
		rd_section(
			rd_placeholder($x(
				'DRAFT. This is a plain-language starting point. Have it reviewed against the applicable Cameroonian data protection rules before publishing.',
				'BROUILLON. Point de départ en langage clair. À faire revoir au regard des règles camerounaises applicables avant publication.'
			)) .
			rd_h($x('What we collect', 'Ce que nous collectons'), 2) .
			rd_p($x('When you use the quote or contact form we receive the details you type: name, email, phone, organisation and your message.', 'Lorsque vous utilisez le formulaire de devis ou de contact, nous recevons les informations que vous saisissez : nom, e-mail, téléphone, organisation et message.')) .
			rd_h($x('How we use it', 'Comment nous l’utilisons'), 2) .
			rd_p($x('We use these details only to reply to your request. We do not sell them.', 'Nous utilisons ces informations uniquement pour répondre à votre demande. Nous ne les vendons pas.')) .
			rd_h($x('Who sees it', 'Qui y a accès'), 2) .
			rd_p($x('Our team receives the form by email. The website host stores the site and its backups.', 'Notre équipe reçoit le formulaire par e-mail. L’hébergeur conserve le site et ses sauvegardes.')) .
			rd_h($x('Your choices', 'Vos choix'), 2) .
			rd_p($x('Write to ', 'Écrivez à ') . $mail('services') . $x(' to ask what we hold about you or to have it deleted.', ' pour savoir ce que nous détenons ou demander la suppression.')));

	return $out;
}
