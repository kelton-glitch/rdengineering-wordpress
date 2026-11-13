<?php
/**
 * Inline SVG icons (stroke, currentColor). No emoji, no external icon font.
 */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * @param string $name Icon key.
 * @param array  $args Optional: class, size (px).
 * @return string Safe SVG markup.
 */
function rd_icon($name, $args = array()) {
	$class = isset($args['class']) ? (string) $args['class'] : 'rd-ico';
	$size  = isset($args['size']) ? (int) $args['size'] : 24;
	$paths = array(
		'phone'    => '<path d="M6.5 4.5h4l2 5-2.5 1.5a14 14 0 0 0 6.5 6.5L18.5 15.5l5 2v4a2 2 0 0 1-2.2 2A19 19 0 0 1 2.5 6.7 2 2 0 0 1 4.5 4.5z"/>',
		'chat'     => '<path d="M5 5h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H10l-4 3v-3H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>',
		'quote'    => '<path d="M5 7h14v12H5z"/><path d="M8 4v3M16 4v3M8 11h8M8 15h5"/>',
		'mail'     => '<path d="M4 7h16v12H4z"/><path d="M4 7l8 6 8-6"/>',
		'pin'      => '<path d="M12 21s-7-6.2-7-11a7 7 0 1 1 14 0c0 4.8-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/>',
		'clock'    => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
		'doc'      => '<path d="M7 3.5h7l4 4V20.5H7z"/><path d="M14 3.5V8h4M9.5 12h5M9.5 15.5h5"/>',
		'flask'    => '<path d="M9 3.5h6M10 3.5v5L5.5 18a3 3 0 0 0 2.6 4.5h8a3 3 0 0 0 2.6-4.5L14 8.5v-5"/>',
		'drop'     => '<path d="M12 3.5c5 6.5 7.5 10 7.5 13a7.5 7.5 0 1 1-15 0c0-3 2.5-6.5 7.5-13z"/>',
		'hardhat'  => '<path d="M3.5 17.5h17"/><path d="M5.5 17.5a6.5 6.5 0 0 1 13 0"/><path d="M12 7v4.5M9 17.5v-4M15 17.5v-4"/>',
		'book'     => '<path d="M3 5h7a3 3 0 0 1 3 3v11a2 2 0 0 0-2-2H3z"/><path d="M21 5h-7a3 3 0 0 0-3 3v11a2 2 0 0 1 2-2h8z"/>',
		'box'      => '<path d="M4 8.5 12 4l8 4.5v9L12 22 4 17.5z"/><path d="M12 12.5V22M4 8.5l8 4 8-4"/>',
		'compass'  => '<circle cx="12" cy="12" r="8.5"/><path d="M14.5 9.5 10 14l4.5-1L16 9z"/>',
		'wrench'   => '<path d="M15.5 4.5a4 4 0 0 0-5.3 5.3L4.5 15.5 8 19l5.7-5.7a4 4 0 0 0 5.3-5.3L16 10.5z"/>',
		'users'    => '<circle cx="9" cy="9" r="3"/><circle cx="16.5" cy="10" r="2.5"/><path d="M3.5 18.5c.6-3 2.8-4.5 5.5-4.5s4.9 1.5 5.5 4.5"/><path d="M14 18.5c.4-2 1.8-3.2 3.8-3.2 1.4 0 2.5.6 3.2 1.7"/>',
		'gap'      => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5v5M12 15.5h.01"/>',
		'arrow'    => '<path d="M5 12h12M13 7l5 5-5 5"/>',
		'pencil'    => '<path d="M14 4.5l5.5 5.5-11 11H3v-5.5z"/><path d="M12 6.5l5.5 5.5"/>',
		'linkedin'  => '<path d="M5 9.5v10M5 5.5h.01"/><path d="M9.5 19.5v-6.2c0-2.2 1.2-3.3 3-3.3s3 1.4 3 3.3v6.2"/><path d="M9.5 10.5V19.5"/>',
		'facebook'  => '<path d="M14 9h3V5.5h-3c-2.2 0-4 1.8-4 4V12H7.5v3.5H10V22h3.5v-6.5H16.5V12h-3V9.5c0-.3.2-.5.5-.5z"/>',
		'instagram' => '<rect x="3.5" y="3.5" width="17" height="17" rx="4"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1"/>',
		'x'         => '<path d="M4.5 4.5 19.5 19.5M19.5 4.5 4.5 19.5"/>',
		'youtube'   => '<path d="M3.5 9.5a3 3 0 0 1 3-3h11a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3h-11a3 3 0 0 1-3-3z"/><path d="M10.5 9.5 15.5 12l-5 2.5z"/>',
	);
	if (!isset($paths[$name])) {
		return '';
	}
	return sprintf(
		'<svg class="%s" width="%d" height="%d" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">%s</svg>',
		esc_attr($class),
		$size,
		$size,
		$paths[$name]
	);
}

/**
 * Simplified single-colour brand marks (filled, currentColor) for the social buttons.
 * Falls back to the stroke icon for an unknown key.
 *
 * @param string $key  linkedin | facebook | instagram | youtube | x.
 * @param int    $size Pixels.
 * @return string Safe SVG markup.
 */
function rd_brand_mark($key, $size = 24) {
	$marks = array(
		'linkedin'  => array('evenodd', '<path d="M4 2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zM5.2 9.5v9.3h2.9V9.5zM6.65 5a1.7 1.7 0 1 0 0 3.4 1.7 1.7 0 0 0 0-3.4zM10 9.5v9.3h2.9v-4.6c0-1.2.5-2.1 1.6-2.1 1.2 0 1.6.9 1.6 2.1v4.6H19v-5.2c0-2.5-1.3-4.3-3.5-4.3-1.3 0-2.2.7-2.6 1.4V9.5z"/>'),
		'facebook'  => array('nonzero', '<path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/>'),
		'youtube'   => array('evenodd', '<path d="M3.3 6.9C3.6 5.7 4.5 4.8 5.7 4.5 7.5 4.1 9.7 3.9 12 3.9s4.5.2 6.3.6c1.2.3 2.1 1.2 2.4 2.4.3 1.4.4 3.1.4 5.1s-.1 3.7-.4 5.1c-.3 1.2-1.2 2.1-2.4 2.4-1.8.4-4 .6-6.3.6s-4.5-.2-6.3-.6c-1.2-.3-2.1-1.2-2.4-2.4-.3-1.4-.4-3.1-.4-5.1s.1-3.7.4-5.1zM10 8.9v6.2l5.4-3.1z"/>'),
		'x'         => array('nonzero', '<path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/>'),
	);
	if ('instagram' === $key) {
		return sprintf(
			'<svg class="rd-ico rd-ico--social" width="%1$d" height="%1$d" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4.2"/><circle cx="17.3" cy="6.7" r="1.1" fill="currentColor" stroke="none"/></svg>',
			(int) $size
		);
	}
	if (!isset($marks[$key])) {
		return rd_icon($key, array('size' => $size, 'class' => 'rd-ico rd-ico--social'));
	}
	return sprintf(
		'<svg class="rd-ico rd-ico--social" width="%1$d" height="%1$d" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="currentColor" fill-rule="%2$s">%3$s</svg>',
		(int) $size,
		esc_attr($marks[$key][0]),
		$marks[$key][1]
	);
}

/**
 * Projected social profiles. Override with add_filter('rd_social_profiles', …).
 * LinkedIn matches the live company page; others are brand-shaped placeholders until confirmed.
 *
 * @return array<int, array{key:string,label:string,url:string,handle:string}>
 */
function rd_social_profiles() {
	$profiles = array(
		array(
			'key'    => 'linkedin',
			'label'  => 'LinkedIn',
			'url'    => 'https://www.linkedin.com/company/r-d-engineering-solutions',
			'handle' => 'r-d-engineering-solutions',
		),
		array(
			'key'    => 'facebook',
			'label'  => 'Facebook',
			'url'    => 'https://www.facebook.com/rdengineeringsolutions',
			'handle' => 'rdengineeringsolutions',
		),
		array(
			'key'    => 'instagram',
			'label'  => 'Instagram',
			'url'    => 'https://www.instagram.com/rdengineeringsolutions',
			'handle' => '@rdengineeringsolutions',
		),
		array(
			'key'    => 'youtube',
			'label'  => 'YouTube',
			'url'    => 'https://www.youtube.com/@rdengineeringsolutions',
			'handle' => '@rdengineeringsolutions',
		),
		array(
			'key'    => 'x',
			'label'  => 'X',
			'url'    => 'https://x.com/rdengsol',
			'handle' => '@rdengsol',
		),
	);
	return apply_filters('rd_social_profiles', $profiles);
}

/**
 * Social logos + dummy text. Rearrange copy/handles anytime.
 * $variant: 'footer' | 'close' | 'compact'.
 *
 * @param string $variant Layout tone.
 */
function rd_social_nav($variant = 'footer') {
	$profiles = rd_social_profiles();
	if (!$profiles) {
		return;
	}
	$fr    = function_exists('rd_is_fr') && rd_is_fr();
	$label = $fr ? 'Suivez-nous' : 'Follow us';
	$class = 'rd-social rd-social--' . sanitize_html_class($variant);
	$ico   = ('compact' === $variant) ? 24 : 28;
	echo '<nav class="' . esc_attr($class) . '" aria-label="' . esc_attr($label) . '">';
	echo '<p class="rd-social__eyebrow">' . esc_html($label) . '</p>';
	echo '<ul class="rd-social__list">';
	foreach ($profiles as $p) {
		$key    = isset($p['key']) ? (string) $p['key'] : '';
		$name   = isset($p['label']) ? (string) $p['label'] : $key;
		$handle = isset($p['handle']) ? (string) $p['handle'] : ('@' . $key);
		$url    = !empty($p['url']) ? (string) $p['url'] : '#';
		echo '<li>';
		$aria = $fr ? sprintf('RD Engineering sur %s (s’ouvre dans un nouvel onglet)', $name) : sprintf('RD Engineering on %s (opens in a new tab)', $name);
		echo '<a class="rd-social__link" href="' . esc_url($url) . '" aria-label="' . esc_attr($aria) . '"' . ('#' !== $url ? ' rel="noopener noreferrer" target="_blank"' : '') . '>';
		echo '<span class="rd-social__logo" aria-hidden="true">' . rd_brand_mark($key, $ico) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<span class="rd-social__text">';
		echo '<span class="rd-social__name">' . esc_html($name) . '</span>';
		echo '<span class="rd-social__handle">' . esc_html($handle) . '</span>';
		echo '</span></a></li>';
	}
	echo '</ul></nav>';
}
