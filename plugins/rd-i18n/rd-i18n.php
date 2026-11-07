<?php
/**
 * Plugin Name: RD Engineering i18n
 * Description: French strings for theme options (header, footer, 404, search) and widget titles. Active only on French pages (Polylang).
 * Version: 1.0.0
 * Text Domain: rd-i18n
 */

if (!defined('ABSPATH')) {
	exit;
}

function rd_i18n_is_fr() {
	return function_exists('pll_current_language') && 'fr' === pll_current_language();
}

/** English => French. Exact substring replacement inside theme option values. */
function rd_i18n_map() {
	return array(
		'REACH OUT'                  => 'PRENEZ CONTACT',
		'Have any Question ?'        => 'Une question ?',
		'WE ARE AVAILABLE FOR YOU'   => 'NOUS SOMMES À VOTRE DISPOSITION',
		'CONTACT US'                 => 'NOUS CONTACTER',
		'Contact US'                 => 'Nous contacter',
		'All rights reserved.'       => 'Tous droits réservés.',
		'Read More'                  => 'Lire la suite',
		'Type Word Then Press Enter' => 'Tapez un mot puis appuyez sur Entrée',
		'Share this post'            => 'Partager cet article',
		'PAGE NOT FOUND'             => 'PAGE INTROUVABLE',
		'Sorry, but the page you are looking for does not exist or removed. Please use search given below to find what you are looking or use the main menu.' => 'Désolé, la page que vous recherchez n\'existe pas ou a été supprimée. Utilisez la recherche ci-dessous ou le menu principal pour trouver ce que vous cherchez.',
		'Sorry, but nothing matched your search terms. Please try again with some different keywords.' => 'Désolé, aucun résultat ne correspond à votre recherche. Veuillez réessayer avec d\'autres mots-clés.',
		'Nothing found'              => 'Aucun résultat',
	);
}

/** Exact widget titles. */
function rd_i18n_widget_titles() {
	return array(
		'USEFUL LINKS' => 'LIENS UTILES',
		'OUR SERVICES' => 'NOS SERVICES',
	);
}

function rd_i18n_replace_deep($value, $map) {
	if (is_string($value)) {
		return strtr($value, $map);
	}
	if (is_array($value)) {
		foreach ($value as $k => $v) {
			$value[$k] = rd_i18n_replace_deep($v, $map);
		}
	}
	return $value;
}

add_filter('option_labtechco_theme_options', function ($options) {
	if (!is_array($options) || !rd_i18n_is_fr()) {
		return $options;
	}
	return rd_i18n_replace_deep($options, rd_i18n_map());
});

add_filter('widget_title', function ($title) {
	if (!rd_i18n_is_fr()) {
		return $title;
	}
	$titles = rd_i18n_widget_titles();
	return isset($titles[$title]) ? $titles[$title] : $title;
}, 20);

/**
 * Footer contact form (block widget): use the French Contact Form 7 form on French pages.
 * Looks the form up by title so the ID can differ between environments.
 */
add_filter('widget_block_content', function ($content) {
	if (!rd_i18n_is_fr() || false === strpos($content, '[contact-form-7')) {
		return $content;
	}
	$forms = get_posts(array(
		'post_type'      => 'wpcf7_contact_form',
		'title'          => 'Formulaire de contact (FR)',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'fields'         => 'ids',
	));
	if (empty($forms)) {
		return $content;
	}
	return preg_replace(
		'/\[contact-form-7[^\]]*\]/',
		'[contact-form-7 id="' . (int) $forms[0] . '" title="Formulaire de contact (FR)"]',
		$content
	);
}, 5);

/** Mailchimp for WP signup form: placeholder and status messages. */
add_filter('mc4wp_form_content', function ($content) {
	if (!rd_i18n_is_fr()) {
		return $content;
	}
	return str_replace('Your email address', 'Votre adresse e-mail', $content);
});

add_filter('mc4wp_form_messages', function ($messages) {
	if (!rd_i18n_is_fr() || !is_array($messages)) {
		return $messages;
	}
	$fr = array(
		'subscribed'            => 'Merci, votre inscription a bien été prise en compte ! Veuillez consulter votre boîte mail pour la confirmer.',
		'invalid_email'         => 'Veuillez saisir une adresse e-mail valide.',
		'required_field_missing' => 'Veuillez remplir les champs obligatoires.',
		'already_subscribed'    => 'Cette adresse e-mail est déjà inscrite, merci !',
		'error'                 => 'Oups, une erreur s\'est produite. Veuillez réessayer plus tard.',
		'unsubscribed'          => 'Vous avez bien été désinscrit(e).',
		'not_subscribed'        => 'Cette adresse e-mail n\'est pas inscrite.',
		'no_lists_selected'     => 'Veuillez sélectionner au moins une liste.',
		'updated'               => 'Merci, vos informations ont été mises à jour !',
	);
	foreach ($fr as $key => $text) {
		if (isset($messages[$key]) && is_array($messages[$key])) {
			$messages[$key]['text'] = $text;
		} elseif (isset($messages[$key])) {
			$messages[$key] = $text;
		}
	}
	return $messages;
});
