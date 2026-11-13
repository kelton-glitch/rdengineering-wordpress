<?php
/**
 * Components for the merged design (core blocks + classes in themes/rd-child/style.css).
 * Loaded by lib.php. Instruction from the owner: "I wish to have the whole works ... use agents to do many
 * alternatives and fight each one till you reach the best possible one".
 */

if (!defined('ABSPATH')) {
	exit;
}

function rd_chip($t) {
	return '<span class="rd-chip">' . $t . '</span>';
}

/** Raw HTML block for markup core has no block for (description list). */
function rd_html($h) {
	return "<!-- wp:html -->$h<!-- /wp:html -->\n";
}

function rd_ol(array $items, $cls = '') {
	$c = '{"ordered":true' . ($cls ? ',"className":"' . $cls . '"' : '') . '}';
	$o = "<!-- wp:list $c --><ol class=\"wp-block-list" . ($cls ? " $cls" : '') . "\">";
	foreach ($items as $i) {
		$o .= "<!-- wp:list-item --><li>$i</li><!-- /wp:list-item -->";
	}
	return $o . "</ol><!-- /wp:list -->\n";
}

function rd_ulc(array $items, $cls) {
	$o = "<!-- wp:list {\"className\":\"$cls\"} --><ul class=\"wp-block-list $cls\">";
	foreach ($items as $i) {
		$o .= "<!-- wp:list-item --><li>$i</li><!-- /wp:list-item -->";
	}
	return $o . "</ul><!-- /wp:list -->\n";
}

/** Section header: big serif numeral as index, eyebrow, h2, optional intro. */
function rd_head($num, $eyebrow, $title, $intro = '', $level = 2) {
	return rd_group(($num !== '' ? rd_p($num, 'rd-index') : '') . rd_p($eyebrow, 'rd-eyebrow') . rd_h($title, $level) . ($intro ? rd_p($intro, 'rd-intro') : ''), 'rd-head');
}

/** Cover-block hero. The scrim is a CSS gradient that is dark only on the text side. */
function rd_cover($id, $alt, $caption, $inner) {
	$url = wp_get_attachment_image_url($id, 'full');
	$cap = '<p class="rd-hero__cap">' . $caption . '</p>';
	return "<!-- wp:cover {\"url\":\"$url\",\"id\":$id,\"dimRatio\":0,\"align\":\"full\",\"className\":\"rd-hero\"} -->\n"
		. "<div class=\"wp-block-cover alignfull rd-hero\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span>"
		. "<img class=\"wp-block-cover__image-background wp-image-$id\" alt=\"" . esc_attr($alt) . "\" src=\"$url\" data-object-fit=\"cover\" fetchpriority=\"high\" loading=\"eager\" decoding=\"async\" sizes=\"(max-width: 600px) 98vw, 100vw\"/>"
		. "<div class=\"wp-block-cover__inner-container\">\n$inner$cap\n</div></div>\n<!-- /wp:cover -->\n";
}

/** Company details card. A details block: collapsed on phones, forced open on desktop by CSS. rows = [[label, valueHtml]]. */
function rd_facts($title, array $rows) {
	$dl = '<dl class="rd-facts__list">';
	foreach ($rows as $r) {
		$dl .= '<div><dt>' . $r[0] . '</dt><dd>' . $r[1] . '</dd></div>';
	}
	$dl .= '</dl>';
	return "<!-- wp:details {\"className\":\"rd-facts\"} --><details class=\"wp-block-details rd-facts\"><summary>$title</summary>" . rd_html($dl) . "</details><!-- /wp:details -->\n";
}

/** Four tap cards. items = [[title, sub, href]]. */
function rd_chooser(array $items) {
	$l = array();
	foreach ($items as $i) {
		$l[] = '<a href="' . $i[2] . '"><strong>' . $i[0] . '</strong><span>' . $i[1] . '</span></a>';
	}
	return rd_ulc($l, 'rd-choose');
}

/** Numbered stage cards. items = [[title, text, [[label, href]]]]. */
function rd_stages(array $items) {
	$l = array();
	foreach ($items as $i) {
		$tags = '';
		foreach ($i[2] as $t) {
			$tags .= '<a class="rd-tag" href="' . $t[1] . '">' . $t[0] . '</a>';
		}
		$l[] = '<strong>' . $i[0] . '</strong><span class="rd-stage__text">' . $i[1] . '</span><span class="rd-tags">' . $tags . '</span>';
	}
	return rd_ol($l, 'rd-stages');
}

/** Compact status list: one single-chip row per item. rows = [[label, chipText, extraHtml]]. */
function rd_file(array $rows) {
	$l = array();
	foreach ($rows as $r) {
		$l[] = '<span class="rd-file__name">' . $r[0] . '</span> ' . rd_chip($r[1]) . (!empty($r[2]) ? ' <span class="rd-file__ask">' . $r[2] . '</span>' : '');
	}
	return rd_ulc($l, 'rd-file');
}

/** Compact three-slot project row. */
function rd_slots($slotTitle, array $labels, $tbs, $n = 3) {
	$o = '';
	for ($i = 1; $i <= $n; $i++) {
		$o .= rd_group(rd_p('<strong>' . $slotTitle . ' ' . $i . '</strong> ' . rd_chip($tbs)) . rd_p(implode(' &middot; ', $labels)), 'rd-slot');
	}
	return rd_group($o, 'rd-slots');
}

/** Stacked parameter cards. items = [[name, category]]. */
function rd_params(array $items) {
	$l = array();
	foreach ($items as $i) {
		$l[] = '<strong>' . $i[0] . '</strong><span>' . $i[1] . '</span>';
	}
	return rd_ulc($l, 'rd-params');
}

/** Full-width pull-quote band. */
function rd_quote_band($text) {
	$q = "<!-- wp:quote --><blockquote class=\"wp-block-quote\"><!-- wp:paragraph --><p>$text</p><!-- /wp:paragraph --></blockquote><!-- /wp:quote -->\n";
	return rd_group(rd_group($q, 'rd-container'), 'rd-band', true);
}

function rd_form_block($id, $title) {
	return '<!-- wp:shortcode -->[contact-form-7 id="' . $id . '" title="' . $title . '"]<!-- /wp:shortcode -->' . "\n";
}

function rd_find_image($file) {
	$f = get_posts(array('post_type' => 'attachment', 'post_status' => 'inherit', 'meta_key' => '_rd_source', 'meta_value' => $file, 'numberposts' => 1, 'fields' => 'ids'));
	return $f ? (int) $f[0] : 0;
}
