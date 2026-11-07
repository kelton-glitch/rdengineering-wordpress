<?php


/*
 * Shortcode list and their calls - Depends on Visual Composer
 */
$shortcodeList = array(
	'ts-blogbox',
	'ts-btn',
	'ts-cta',
	'ts-clientsbox',
	'ts-contactbox',
	'ts-staticbox',
	'ts-custom-heading',
	'ts-heading',
	'ts-facts-in-digits',
	'ts-heading',
	'ts-icon',
	'ts-icontext',
	'ts-wpml-language-switcher',
	'ts-icon-separator',
	'ts-portfoliobox',
	'ts-servicebox',
	'ts-eventsbox',
	'ts-iconheadingbox',
	'ts-list',
	'ts-teambox',
	'ts-testimonialbox',
	'ts-twitterbox',
	'ts-socialbox',
	'ts-progress-bar',
	'ts-pricing-table',
	'ts-single-image',
	'ts-action-box',
	'ts-current-year',
	'ts-social-links',
	'ts-site-tagline',
	'ts-site-title',
	'ts-site-url',
	'ts-footermenu',
	'ts-topbar-left-menu',
	'ts-topbar-right-menu',
	'ts-logo',
	'ts-dropcap',
	'ts-skincolor',
	'ts-pricelistbox',
);
//if( function_exists('vc_map') && class_exists('WPBMap') ){
	foreach( $shortcodeList as $shortcode ){
		if( file_exists(get_template_directory() . '/includes/shortcodes/'.$shortcode.'.php') ){
			include_once( get_template_directory() . '/includes/shortcodes/'.$shortcode.'.php');
		} else {
			require_once THEMESTEK_LABTECHCO_DIR . 'shortcodes/'.$shortcode.'.php';
		}
	}
//}

/*
 * Shortcode list and their calls - Not depended on Visual Composer
 */
/*
$shortcodeList = array(
	'ts-current-year',
	'ts-social-links',
	'ts-site-tagline',
	'ts-site-title',
	'ts-site-url',
	'ts-footermenu',
	'ts-logo',
	'ts-dropcap',
	'ts-skincolor',
);
foreach( $shortcodeList as $shortcode ){
	include_once( get_template_directory() . '/includes/shortcodes/'.$shortcode.'.php');
}
*/
