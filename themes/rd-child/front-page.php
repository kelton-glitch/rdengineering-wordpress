<?php
/**
 * Home: hero → desks → process stages → sample projects → contact.
 * Timeline + project blocks use demo copy so layout can be judged; swap for real data later.
 * Supplier / procurement pack removed from the landing page.
 */
if (!defined('ABSPATH')) {
	exit;
}

$fr       = rd_is_fr();
$phone    = apply_filters('rd_phone', '+237695981047');
$phoneFmt = '+237 695 981 047';
$wa       = 'https://wa.me/' . apply_filters('rd_whatsapp', '237695981047');
$quote    = apply_filters('rd_quote_url', home_url($fr ? '/fr/nous-contacter/' : '/contact/'));
$t        = function ($en, $frText) use ($fr) { return $fr ? $frText : $en; };
$e        = function ($en, $frText) use ($t) { return esc_html($t($en, $frText)); };
$url      = function ($path) { return esc_url(home_url($path)); };
$sample   = $t('Sample', 'Exemple');

/* Illustrations live in the media library (2026/11). Returns '' when a file is missing so layout never breaks. */
$rd_up   = wp_upload_dir();
$rd_dir  = trailingslashit($rd_up['basedir']) . '2026/11/';
$rd_uri  = trailingslashit($rd_up['baseurl']) . '2026/11/';
$rd_img  = function ($name, $alt, $sizes, $class = '') use ($rd_dir, $rd_uri) {
	if (!file_exists($rd_dir . $name . '-768x768.webp')) {
		return '';
	}
	return '<img' . ($class ? ' class="' . esc_attr($class) . '"' : '') . ' src="' . esc_url($rd_uri . $name . '-768x768.webp') . '" srcset="' . esc_url($rd_uri . $name . '-300x300.webp') . ' 300w, ' . esc_url($rd_uri . $name . '-768x768.webp') . ' 768w" sizes="' . esc_attr($sizes) . '" width="768" height="768" alt="' . esc_attr($alt) . '" loading="lazy" decoding="async">';
};
$illustrative = $t('Illustrative image', 'Image d’illustration');

$mail = function ($addr) {
	return '<a href="mailto:' . esc_attr($addr) . '@rdengineeringsol.com">' . esc_html($addr) . '@rdengineeringsol.com</a>';
};

$tiles = array(
	array(
		'title' => $t('Engineering', 'Ingénierie'),
		'line'  => $t('Design, build and supervise water, sanitation and energy works.', 'Concevoir, construire et superviser les ouvrages d’eau, d’assainissement et d’énergie.'),
		'path'  => $t('/services/engineering-services/', '/fr/nos-services/services-ingenierie/'),
		'icon'  => 'hardhat',
	),
	array(
		'title' => $t('Water laboratory', 'Laboratoire d’eau'),
		'line'  => $t('Chemical, physical and microbiological tests, with sampling on request.', 'Analyses chimiques, physiques et microbiologiques, prélèvement sur demande.'),
		'path'  => $t('/services/water-laboratory/', '/fr/nos-services/laboratoire-eau/'),
		'icon'  => 'flask',
	),
	array(
		'title' => $t('Training', 'Formation'),
		'line'  => $t('Technical courses with certificates; corporate and on-site options.', 'Formations techniques avec certificat ; options entreprise et sur site.'),
		'path'  => $t('/services/professional-training/', '/fr/nos-services/formation-professionnelle/'),
		'icon'  => 'book',
	),
	array(
		'title' => $t('Products', 'Produits'),
		'line'  => $t('Treatment kits, solar gear and after-sales — prices on request.', 'Kits, solaire et SAV — prix sur demande.'),
		'path'  => $t('/services/products/', '/fr/nos-services/produits/'),
		'icon'  => 'box',
	),
);

$stages = array(
	array($t('Advise', 'Conseil'), 'compass', $t('Feasibility and site advice', 'Faisabilité et conseil sur site')),
	array($t('Test', 'Analyse'), 'flask', $t('Water quality checks', 'Contrôles de qualité de l’eau')),
	array($t('Design', 'Conception'), 'pencil', $t('System design drawings', 'Plans et conception du système')),
	array($t('Build', 'Construction'), 'hardhat', $t('Install and supervise', 'Installation et supervision')),
	array($t('Train', 'Formation'), 'book', $t('Operators and teams', 'Opérateurs et équipes')),
	array($t('Maintain', 'SAV'), 'wrench', $t('After-sales support', 'Assistance après-vente')),
);

/* Demo project cards — replace with real sheets when ready. */
$projects = array(
	array(
		'title'  => $t('Community borehole — Littoral', 'Forage communautaire — Littoral'),
		'place'  => $t('Bonabéri, Douala', 'Bonabéri, Douala'),
		'scope'  => $t('Drilling, pump install, operator briefing', 'Forage, pompe, briefing opérateurs'),
		'result' => $t('Yield ~2.4 m³/h · lab report on file', 'Débit ~2,4 m³/h · rapport labo au dossier'),
	),
	array(
		'title'  => $t('School WASH upgrade', 'Réhabilitation WASH scolaire'),
		'place'  => $t('Yaoundé peri-urban', 'Périphérie de Yaoundé'),
		'scope'  => $t('Sanitation block + rainwater catchment', 'Bloc sanitaire + récupération d’eau de pluie'),
		'result' => $t('240 pupils served · handover complete', '240 élèves desservis · remise terminée'),
	),
	array(
		'title'  => $t('Industrial water panel', 'Analyse d’eau industrielle'),
		'place'  => $t('Douala port zone', 'Zone portuaire de Douala'),
		'scope'  => $t('pH, TDS, heavy metals, E. coli panel', 'Panel pH, TDS, métaux lourds, E. coli'),
		'result' => $t('48-hour turnaround · written certificate', 'Délai 48 h · certificat écrit'),
	),
);

$base  = $t('Bonassama-Douala, Cameroon', 'Bonassama-Douala, Cameroun');
$hours = $t('Mon–Fri 9:00–18:00 · Sat by appointment', 'Lun–ven 9h–18h · Sam sur RDV');

$head = function ($num, $eyebrow, $title) {
	echo '<div class="rd-head"><p class="rd-index">' . esc_html($num) . '</p><p class="rd-eyebrow">' . esc_html($eyebrow) . '</p><h2>' . esc_html($title) . '</h2></div>';
};

get_header();
?>
<main id="main" class="rd-land">
	<section class="rd-land__hero">
		<div class="rd-land__panel">
			<svg class="rd-land__flow" viewBox="0 0 2880 700" preserveAspectRatio="none" aria-hidden="true" focusable="false">
				<g fill="none" stroke="#16C4D6" stroke-width="2">
					<?php for ($i = 0; $i < 14; $i++) : $y = 40 + $i * 46; ?>
						<path d="M0 <?php echo (int) $y; ?>q180-<?php echo 24 + ($i % 4) * 14; ?> 360 0<?php echo str_repeat('t360 0', 7); ?>"/>
					<?php endfor; ?>
				</g>
			</svg>
			<div class="rd-land__panel-inner">
				<h1><?php echo $e('Engineering what flows.', 'Ingénierie qui coule.'); ?></h1>
				<p class="rd-land__sub"><?php echo $e('Water, sanitation and energy from Douala — design, lab, training and supply under one roof.', 'Eau, assainissement et énergie depuis Douala — conception, labo, formation et fourniture sous le même toit.'); ?></p>
				<div class="rd-land__cta">
					<a class="rd-btn rd-land__primary rd-btn--ico" href="<?php echo esc_url($quote); ?>">
						<?php echo rd_icon('quote', array('size' => 20)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<span><?php echo $e('Request a quote', 'Demander un devis'); ?></span>
					</a>
					<a class="rd-btn rd-land__ghost rd-btn--ico" href="tel:<?php echo esc_attr($phone); ?>">
						<?php echo rd_icon('phone', array('size' => 20)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<span><?php echo $e('Call an engineer', 'Appeler un ingénieur'); ?></span>
					</a>
				</div>
			</div>
		</div>
		<?php
		$upload    = wp_upload_dir();
		$up_base   = trailingslashit($upload['basedir']) . '2026/11/';
		$up_url    = trailingslashit($upload['baseurl']) . '2026/11/';
		$theme_img = trailingslashit(get_stylesheet_directory()) . 'img/';
		$theme_uri = trailingslashit(get_stylesheet_directory_uri()) . 'img/';

		$hero_slides = array(
			array(
				'file'  => 'hero-drilling.jpg',
				'theme' => true,
				'w'     => 700,
				'h'     => 938,
				'cap'   => $t('Borehole drilling', 'Forage'),
				'alt'   => $t('Driller operating a borehole drilling rig', 'Foreur actionnant une foreuse de forage'),
			),
			array(
				'file' => 'engineering-768x768.webp',
				'cap'  => $t('Design & engineering', 'Conception et ingénierie'),
				'alt'  => $t('Engineers with water treatment and solar equipment', 'Ingénieurs avec équipements de traitement d’eau et solaire'),
			),
			array(
				'file' => 'laboratory-768x768.webp',
				'cap'  => $t('Water laboratory testing', 'Analyse en laboratoire'),
				'alt'  => $t('Laboratory technicians testing water samples', 'Techniciens de laboratoire analysant des échantillons d’eau'),
			),
			array(
				'file' => 'training-768x768.webp',
				'cap'  => $t('Professional training', 'Formation professionnelle'),
				'alt'  => $t('Training session in progress', 'Session de formation en cours'),
			),
			array(
				'file' => 'products-768x768.webp',
				'cap'  => $t('Products & supply', 'Produits et fourniture'),
				'alt'  => $t('Water treatment products and kits', 'Produits et kits de traitement d’eau'),
			),
		);

		$slides_ready = array();
		foreach ($hero_slides as $slide) {
			$from_theme = !empty($slide['theme']);
			$path       = $from_theme ? ($theme_img . $slide['file']) : ($up_base . $slide['file']);
			if (!file_exists($path)) {
				continue;
			}
			$slide['src']   = $from_theme ? ($theme_uri . $slide['file']) : ($up_url . $slide['file']);
			$slides_ready[] = $slide;
		}
		?>
		<div class="rd-land__photo" data-rd-hero-process<?php echo count($slides_ready) > 1 ? '' : ' data-rd-hero-static'; ?>>
			<?php foreach ($slides_ready as $si => $slide) : ?>
				<figure class="rd-land__slide<?php echo 0 === $si ? ' is-active' : ''; ?>" data-cap="<?php echo esc_attr($slide['cap']); ?>">
					<img class="rd-land__img" src="<?php echo esc_url($slide['src']); ?>" width="<?php echo (int) (isset($slide['w']) ? $slide['w'] : 768); ?>" height="<?php echo (int) (isset($slide['h']) ? $slide['h'] : 768); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" <?php echo 0 === $si ? 'fetchpriority="high"' : 'loading="lazy"'; ?> decoding="async">
				</figure>
			<?php endforeach; ?>
			<?php if ($slides_ready) : ?>
				<span class="rd-hero__cap" data-rd-hero-cap><?php echo esc_html($slides_ready[0]['cap']); ?></span>
			<?php endif; ?>
			<?php if (count($slides_ready) > 1) : ?>
				<div class="rd-land__process" role="group" aria-label="<?php echo esc_attr($t('What we do', 'Ce que nous faisons')); ?>">
					<?php foreach ($slides_ready as $si => $slide) : ?>
						<button type="button" class="rd-land__dot<?php echo 0 === $si ? ' is-active' : ''; ?>" data-rd-hero-dot aria-label="<?php echo esc_attr($slide['cap']); ?>" aria-current="<?php echo 0 === $si ? 'true' : 'false'; ?>"></button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="rd-section rd-section--mist rd-reveal" id="services">
		<div class="rd-container">
			<?php $head('01', $t('Four service lines', 'Quatre domaines'), $t('Pick the desk you need', 'Choisissez le bureau qu’il vous faut')); ?>
			<nav class="rd-land__dock rd-land__dock--triggers rd-land__dock--img" aria-label="<?php echo esc_attr($t('Our services', 'Nos services')); ?>">
				<?php
				$tile_imgs = array(
					array('engineering', $t('Engineers beside water treatment equipment and solar panels', 'Ingénieurs devant des équipements de traitement d’eau et des panneaux solaires')),
					array('laboratory', $t('Laboratory technician testing water samples', 'Technicien de laboratoire analysant des échantillons d’eau')),
					array('training', $t('Community training session with solar equipment', 'Session de formation communautaire avec équipement solaire')),
					array('products', $t('Water treatment products and kits on a table', 'Produits et kits de traitement d’eau sur une table')),
				);
				foreach ($tiles as $i => $tile) : ?>
					<a href="<?php echo $url($tile['path']); ?>" class="rd-reveal" style="--rd-stagger: <?php echo (int) $i; ?>">
						<span class="rd-land__dock-pic"><?php echo $rd_img($tile_imgs[$i][0], $tile_imgs[$i][1], '(max-width: 599px) 92vw, (max-width: 1099px) 46vw, 22vw'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span class="rd-land__dock-body">
							<span class="rd-land__dock-ico" aria-hidden="true"><?php echo rd_icon($tile['icon'], array('size' => 32, 'class' => 'rd-ico rd-ico--dock')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<span class="rd-land__dock-title"><?php echo esc_html($tile['title']); ?></span>
							<span class="rd-land__dock-get"><?php echo esc_html($tile['line']); ?></span>
						</span>
					</a>
				<?php endforeach; ?>
			</nav>
		</div>
	</section>

	<section class="rd-section rd-reveal" id="stages">
		<div class="rd-container">
			<?php $head('02', $t('How a project runs', 'Déroulement d’un projet'), $t('Six stages from advice to support', 'Six étapes, du conseil au suivi')); ?>
			<div class="rd-cycle">
			<?php
			// Decorative ring: geometry is fixed, labels live in the list beside it.
			$cx = 210;
			$cy = 210;
			$rr = 140;
			$arcs  = '';
			$nodes = '';
			foreach ($stages as $i => $stage) {
				$a  = deg2rad(-90 + 60 * $i);
				$x  = $cx + $rr * cos($a);
				$y  = $cy + $rr * sin($a);
				$a1 = deg2rad(-90 + 60 * $i + 14);
				$a2 = deg2rad(-90 + 60 * ($i + 1) - 14);
				$arcs  .= sprintf('<path class="arc" d="M%.1f %.1f A%d %d 0 0 1 %.1f %.1f" marker-end="url(#rd-ah)"/>', $cx + $rr * cos($a1), $cy + $rr * sin($a1), $rr, $rr, $cx + $rr * cos($a2), $cy + $rr * sin($a2));
				$nodes .= sprintf('<circle class="node" cx="%.1f" cy="%.1f" r="36"/>', $x, $y)
					. sprintf('<g transform="translate(%.1f %.1f)">', $x - 15, $y - 15) . rd_icon($stage[1], array('size' => 30, 'class' => 'rd-ico')) . '</g>'
					. sprintf('<circle class="badge" cx="%.1f" cy="%.1f" r="12"/><text class="bnum" x="%.1f" y="%.1f" text-anchor="middle">%d</text>', $x + 26, $y - 26, $x + 26, $y - 21.5, $i + 1);
			}
			?>
			<svg class="rd-cycle__ring" viewBox="0 0 420 420" aria-hidden="true" focusable="false">
				<defs><marker id="rd-ah" viewBox="0 0 10 10" refX="7" refY="5" markerWidth="5" markerHeight="5" orient="auto"><path d="M1 1l8 4-8 4z" fill="#0b71e0"/></marker></defs>
				<circle class="core" cx="210" cy="210" r="104"/>
				<?php echo $arcs . $nodes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<text class="ctr" x="210" y="204" text-anchor="middle"><?php echo esc_html($t('ONE PROJECT', 'UN PROJET')); ?></text>
				<text class="ctr" x="210" y="230" text-anchor="middle"><?php echo esc_html($t('ONE LOOP', 'UNE BOUCLE')); ?></text>
			</svg>
			<ol class="rd-timeline">
				<?php foreach ($stages as $i => $stage) : ?>
					<li style="--rd-stagger: <?php echo (int) $i; ?>">
						<span class="rd-timeline__ico" aria-hidden="true"><?php echo rd_icon($stage[1], array('size' => 28, 'class' => 'rd-ico rd-ico--tl')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span class="rd-timeline__n"><?php echo (int) ($i + 1); ?></span>
						<span class="rd-timeline__copy">
							<span class="rd-timeline__label"><?php echo esc_html($stage[0]); ?></span>
							<span class="rd-timeline__hint"><?php echo esc_html($stage[2]); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ol>
			<p class="rd-note rd-cycle__note"><?php echo esc_html($t('Support findings feed the next advice step.', 'Les retours du suivi alimentent le conseil suivant.')); ?></p>
			</div>
		</div>
	</section>

	<?php
	$lab_path = $t('/services/water-laboratory/', '/fr/nos-services/laboratoire-eau/');
	$params   = array('pH', $t('Turbidity', 'Turbidité'), 'TDS', $t('Hardness', 'Dureté'), $t('Nitrates', 'Nitrates'), $t('Heavy metals', 'Métaux lourds'), 'E. coli');
	?>
	<section class="rd-section rd-section--mist rd-reveal" id="lab">
		<div class="rd-container rd-feature">
			<figure class="rd-feature__pic">
				<?php echo $rd_img('laboratory', $t('Laboratory technicians testing water samples', 'Techniciens de laboratoire analysant des échantillons d’eau'), '(max-width: 899px) 92vw, 44vw'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<figcaption><?php echo esc_html($illustrative); ?></figcaption>
			</figure>
			<div class="rd-feature__text">
				<?php $head('03', $t('Water laboratory', 'Laboratoire d’eau'), $t('Have your water tested', 'Faites analyser votre eau')); ?>
				<p><?php echo $e('Chemical, physical and microbiological analysis, with on-site sampling available.', 'Analyses chimiques, physiques et microbiologiques, avec prélèvement sur site possible.'); ?></p>
				<ul class="rd-chips" aria-label="<?php echo esc_attr($t('Parameters we test', 'Paramètres analysés')); ?>">
					<?php foreach ($params as $p) : ?>
						<li><?php echo esc_html($p); ?></li>
					<?php endforeach; ?>
				</ul>
				<p class="rd-feature__cta"><a class="rd-btn rd-btn--ico" href="<?php echo $url($lab_path . '#water-test'); ?>"><?php echo rd_icon('flask', array('size' => 20)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php echo $e('Request a water test', 'Demander une analyse d’eau'); ?></span></a></p>
			</div>
		</div>
	</section>

	<?php
	$ways = array(
		array('users', $t('One team, four desks', 'Une équipe, quatre bureaux'), $t('Engineering, laboratory, training and products are handled by one company.', 'Ingénierie, laboratoire, formation et produits sont assurés par une seule entreprise.')),
		array('mail', $t('Straight to the right desk', 'Directement au bon bureau'), $t('Each desk has its own email address, so your request reaches the people who do the work.', 'Chaque bureau a sa propre adresse e-mail : votre demande parvient à ceux qui font le travail.')),
		array('doc', $t('Quotes on request', 'Devis sur demande'), $t('Tell us what you need and where. We propose the approach and the price for your project.', 'Dites-nous ce dont vous avez besoin et où. Nous proposons l’approche et le prix pour votre projet.')),
	);
	?>
	<section class="rd-section rd-reveal" id="approach">
		<div class="rd-container rd-feature rd-feature--flip">
			<figure class="rd-feature__pic">
				<?php echo $rd_img('team-meeting', $t('Team meeting around a table', 'Réunion d’équipe autour d’une table'), '(max-width: 899px) 92vw, 44vw'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<figcaption><?php echo esc_html($illustrative); ?></figcaption>
			</figure>
			<div class="rd-feature__text">
				<?php $head('04', $t('How we work with you', 'Notre façon de travailler'), $t('Simple to start, clear to follow', 'Simple à lancer, clair à suivre')); ?>
				<ul class="rd-points">
					<?php foreach ($ways as $w) : ?>
						<li>
							<span class="rd-points__ico" aria-hidden="true"><?php echo rd_icon($w[0], array('size' => 26)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<span><strong><?php echo esc_html($w[1]); ?></strong><span class="rd-points__txt"><?php echo esc_html($w[2]); ?></span></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<section class="rd-section rd-section--mist rd-reveal" id="projects">
		<div class="rd-container">
			<?php $head('05', $t('Project record', 'Références'), $t('Selected projects', 'Projets sélectionnés')); ?>
			<p class="rd-land__note"><?php echo $e('Sample text only — replace with real location, scope and measured results when ready.', 'Texte d’exemple uniquement — à remplacer par le lieu, le périmètre et les résultats mesurés.'); ?></p>
			<?php
			/**
			 * Project showcase (concept C): a thumbnail list on the left, the chosen project on the right
			 * with a three-image mosaic, three labelled fact tiles and a "Next project" button. Pure CSS (radio inputs), no JavaScript.
			 * Images are illustrations used as stand-ins; replace with real project photos per project.
			 * Spec per image: media-library base name + alt text. Sizes come from the generated -150/-300/-768 webp files.
			 */
			$show_specs = array(
				array(
					array('hero', $t('Illustrative scene: engineer checking a hand pump with village children beside it', 'Scène illustrative : ingénieur vérifiant une pompe manuelle, entouré d’enfants du village')),
					array('community', $t('Illustrative scene: community gathered around a solar water installation', 'Scène illustrative : habitants réunis autour d’une installation d’eau solaire')),
					array('training', $t('Illustrative scene: briefing session for pump operators', 'Scène illustrative : session de briefing pour opérateurs de pompe')),
				),
				array(
					array('training', $t('Illustrative scene: training under a tent with a solar panel', 'Scène illustrative : formation sous une tente avec un panneau solaire')),
					array('products', $t('Illustrative scene: sanitation and water products on a table', 'Scène illustrative : produits d’assainissement et d’eau sur une table')),
					array('community', $t('Illustrative scene: community and trainer beside a water point', 'Scène illustrative : habitants et formateur près d’un point d’eau')),
				),
				array(
					array('laboratory', $t('Illustrative scene: technician pipetting a water sample', 'Scène illustrative : technicien pipetant un échantillon d’eau')),
					array('engineering', $t('Illustrative scene: engineers beside treatment equipment', 'Scène illustrative : ingénieurs près d’un équipement de traitement')),
					array('team-meeting', $t('Illustrative scene: team reviewing results around a table', 'Scène illustrative : équipe examinant des résultats autour d’une table')),
				),
			);
			/** Pick the generated file closest to the wanted role; the landscape hero has its own sizes. */
			$show_src = function ($name, $role) use ($rd_dir, $rd_uri) {
				$sizes = ('hero' === $name)
					? array('big' => array('-768x511', 768, 511), 'small' => array('-300x200', 300, 200), 'thumb' => array('-150x150', 150, 150))
					: array('big' => array('-768x768', 768, 768), 'small' => array('-300x300', 300, 300), 'thumb' => array('-150x150', 150, 150));
				list($suffix, $w, $h) = $sizes[$role];
				return file_exists($rd_dir . $name . $suffix . '.webp') ? array($rd_uri . $name . $suffix . '.webp', $w, $h) : null;
			};
			$show_n    = count($projects);
			$tile_defs = array(
				array('pin', $t('Where', 'Lieu'), 'place'),
				array('doc', $t('Scope', 'Périmètre'), 'scope'),
				array('flask', $t('Result', 'Résultat'), 'result'),
			);
			?>
			<div class="rd-show">
				<?php foreach ($projects as $i => $p) : ?>
					<input type="radio" name="rd-proj" id="rd-p<?php echo (int) $i; ?>" class="rd-show__radio"<?php echo 0 === $i ? ' checked' : ''; ?>>
				<?php endforeach; ?>
				<div class="rd-show__list" role="group" aria-label="<?php echo esc_attr($t('Choose a project', 'Choisir un projet')); ?>">
					<?php foreach ($projects as $i => $p) : $th = $show_src($show_specs[$i][0][0], 'thumb'); ?>
						<label for="rd-p<?php echo (int) $i; ?>" class="rd-show__item rd-show__item--<?php echo (int) $i; ?>">
							<?php if ($th) : ?><img src="<?php echo esc_url($th[0]); ?>" width="<?php echo (int) $th[1]; ?>" height="<?php echo (int) $th[2]; ?>" alt="" loading="lazy" decoding="async"><?php endif; ?>
							<span class="rd-show__item-txt"><b><span class="rd-show__n"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span> <?php echo esc_html($p['title']); ?></b><small><?php echo esc_html($p['place']); ?></small></span>
						</label>
					<?php endforeach; ?>
				</div>
				<div class="rd-show__main">
					<?php foreach ($projects as $i => $p) : ?>
						<?php $next = ($i + 1) % $show_n; ?>
						<article class="rd-show__panel rd-show__panel--<?php echo (int) $i; ?>">
							<div class="rd-show__mosaic">
								<?php foreach ($show_specs[$i] as $j => $spec) : $pic = $show_src($spec[0], 0 === $j ? 'big' : 'small'); ?>
									<?php if ($pic) : ?>
										<div class="rd-show__cell"><img src="<?php echo esc_url($pic[0]); ?>" width="<?php echo (int) $pic[1]; ?>" height="<?php echo (int) $pic[2]; ?>" alt="<?php echo esc_attr($spec[1]); ?>" loading="lazy" decoding="async"></div>
									<?php endif; ?>
								<?php endforeach; ?>
								<p class="rd-show__tag"><?php echo esc_html($illustrative); ?> · <?php echo esc_html($sample); ?></p>
							</div>
							<div class="rd-show__info">
								<p class="rd-show__kicker"><span class="rd-chip rd-chip--sample"><?php echo esc_html($sample); ?></span><span class="rd-show__count"><?php echo esc_html(sprintf('%02d / %02d', $i + 1, $show_n)); ?></span></p>
								<h3><?php echo esc_html($p['title']); ?></h3>
								<ul class="rd-show__tiles">
									<?php foreach ($tile_defs as $d) : ?>
										<li class="rd-show__tile"><?php echo rd_icon($d[0], array('size' => 22, 'class' => 'rd-ico')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><small><?php echo esc_html($d[1]); ?></small><span><?php echo esc_html($p[$d[2]]); ?></span></li>
									<?php endforeach; ?>
								</ul>
								<label for="rd-p<?php echo (int) $next; ?>" class="rd-show__next"><?php echo esc_html($t('Next project', 'Projet suivant')); ?> <?php echo rd_icon('arrow', array('size' => 18)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></label>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
			<aside class="rd-show__cta" aria-labelledby="rd-show-cta-h">
				<div>
					<h3 id="rd-show-cta-h"><?php echo $e('Planning something similar?', 'Un projet similaire en tête ?'); ?></h3>
					<p><?php echo $e('Tell us the site and the need. Your request goes straight to the right desk.', 'Dites-nous le site et le besoin. Votre demande va directement au bon service.'); ?></p>
				</div>
				<a class="rd-btn rd-land__primary rd-btn--ico" href="<?php echo esc_url($quote); ?>"><?php echo rd_icon('quote', array('size' => 20)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php echo $e('Request a quote', 'Demander un devis'); ?></span></a>
			</aside>
		</div>
	</section>

	<?php
	/**
	 * Partner strip. Real partners come from the `rd_partners` filter as array(name, logo URL, optional link URL).
	 * Until supplied, visible "To be supplied" tiles stand in: no partner is ever invented.
	 */
	$partners = apply_filters('rd_partners', array());
	$tbs_logo = $t('Partner logo', 'Logo partenaire');
	$tbs_note = $t('To be supplied', 'À fournir');
	$cells    = array();
	if ($partners) {
		foreach ($partners as $pt) {
			$img  = '<img src="' . esc_url($pt[1]) . '" alt="' . esc_attr($pt[0]) . '" height="48" loading="lazy" decoding="async">';
			$cells[] = !empty($pt[2]) ? '<a href="' . esc_url($pt[2]) . '" rel="noopener">' . $img . '</a>' : $img;
		}
	} else {
		/*
		 * Neutral placeholder marks (abstract shapes + generic words), NOT real organisations or trademarks.
		 * They only show how a real logo row will look. Replace through the `rd_partners` filter.
		 */
		$ph_words  = array('Northwind', 'Blue Delta', 'Aqua Group', 'Meridian', 'Terra Works', 'Solaris', 'Clearflow', 'Harbor & Co', 'Nimbus', 'Greenline', 'Atlas Labs', 'Riverbend');
		$ph_shapes = array(
			'<circle cx="22" cy="28" r="14"/>',
			'<rect x="8" y="14" width="28" height="28"/>',
			'<path d="M22 12l16 28H6z"/>',
			'<path d="M22 10c8 10 14 16 14 23a14 14 0 0 1-28 0c0-7 6-13 14-23z"/>',
			'<path d="M8 40V16h6v24zM18 40V8h6v32zM28 40V22h6v18z"/>',
			'<path d="M22 8l14 8v16l-14 8-14-8V16z"/>',
		);
		foreach ($ph_words as $i => $word) {
			$weight  = (0 === $i % 3) ? 700 : ((1 === $i % 3) ? 400 : 600);
			$cells[] = '<svg class="rd-marquee__ph" width="190" height="56" viewBox="0 0 190 56" role="img" aria-label="' . esc_attr(sprintf($t('Placeholder logo %d', 'Logo fictif %d'), $i + 1)) . '"><g fill="#5f7390">' . $ph_shapes[$i % 6] . '</g><text x="48" y="34" font-family="Poppins, Arial, sans-serif" font-size="17" font-weight="' . $weight . '" fill="#5f7390">' . esc_html($word) . '</text></svg>';
		}
	}
	?>
	<section class="rd-section rd-section--tight rd-partners" id="partners" aria-labelledby="rd-partners-h">
		<input type="checkbox" id="rd-marquee-pause" class="rd-marquee__toggle">
		<div class="rd-container rd-partners__head">
			<div>
				<p class="rd-eyebrow"><?php echo $e('Partners and references', 'Partenaires et références'); ?></p>
				<h2 id="rd-partners-h"><?php echo $e('Who we work with', 'Avec qui nous travaillons'); ?></h2>
			</div>
			<label for="rd-marquee-pause" class="rd-marquee__btn"><span class="rd-marquee__off"><?php echo $e('Pause scrolling', 'Mettre en pause'); ?></span><span class="rd-marquee__on"><?php echo $e('Resume scrolling', 'Reprendre le défilement'); ?></span></label>
		</div>
		<?php if (!$partners) : ?><p class="rd-note rd-container rd-partners__note"><?php echo $e('Placeholder logos for layout review only. Real partners to be supplied.', 'Logos fictifs pour valider la mise en page uniquement. Partenaires réels à fournir.'); ?></p><?php endif; ?>
		<div class="rd-marquee" role="group" aria-label="<?php echo esc_attr($t('Partner logos', 'Logos des partenaires')); ?>">
			<ul class="rd-marquee__track">
				<?php foreach ($cells as $c) : ?><li><?php echo $c; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></li><?php endforeach; ?>
				<?php foreach ($cells as $c) : ?><li aria-hidden="true"><?php echo preg_replace('/<a /', '<a tabindex="-1" ', $c); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></li><?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="rd-land__close rd-reveal" id="contact">
		<div class="rd-land__close-text">
			<h2><?php echo $e('Start with a clear request', 'Commencez par une demande claire'); ?></h2>
			<p><?php echo $e('Say what you need, where the site is, and who it is for. We reply from the right desk.', 'Indiquez ce dont vous avez besoin, où se trouve le site et à qui il s’adresse. Nous répondons depuis le bon bureau.'); ?></p>
			<ul class="rd-land__facts" aria-label="<?php echo esc_attr($t('Location and hours', 'Lieu et horaires')); ?>">
				<li><?php echo rd_icon('pin', array('size' => 18)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php echo esc_html($base); ?></span></li>
				<li><?php echo rd_icon('clock', array('size' => 18)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php echo esc_html($hours); ?></span></li>
			</ul>
			<div class="rd-land__row">
				<a class="rd-btn rd-land__primary rd-btn--ico" href="<?php echo esc_url($quote); ?>">
					<?php echo rd_icon('quote', array('size' => 18)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<span><?php echo $e('Request a quote', 'Demander un devis'); ?></span>
				</a>
				<a class="rd-btn rd-land__ghost rd-btn--ico" href="tel:<?php echo esc_attr($phone); ?>">
					<?php echo rd_icon('phone', array('size' => 18)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<span><?php echo esc_html($phoneFmt); ?></span>
				</a>
				<a class="rd-btn rd-land__ghost rd-btn--ico" href="<?php echo esc_url($wa); ?>" rel="noopener">
					<?php echo rd_icon('chat', array('size' => 18)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<span>WhatsApp</span>
				</a>
			</div>
		</div>
		<ul class="rd-land__contacts">
			<li>
				<span class="rd-land__contacts-label"><?php echo rd_icon('hardhat', array('size' => 18, 'class' => 'rd-ico rd-ico--inline')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo $e('Engineering', 'Ingénierie'); ?></span>
				<?php echo $mail('services'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</li>
			<li>
				<span class="rd-land__contacts-label"><?php echo rd_icon('flask', array('size' => 18, 'class' => 'rd-ico rd-ico--inline')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo $e('Laboratory', 'Laboratoire'); ?></span>
				<?php echo $mail('waterlab'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</li>
			<li>
				<span class="rd-land__contacts-label"><?php echo rd_icon('book', array('size' => 18, 'class' => 'rd-ico rd-ico--inline')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo $e('Training', 'Formation'); ?></span>
				<?php echo $mail('training'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</li>
			<li>
				<span class="rd-land__contacts-label"><?php echo rd_icon('box', array('size' => 18, 'class' => 'rd-ico rd-ico--inline')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo $e('Products', 'Produits'); ?></span>
				<?php echo $mail('products'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</li>
		</ul>
	</section>
</main>
<?php
get_footer();
