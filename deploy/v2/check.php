<?php
/**
 * Design and quality gate for the v2 site. Read-only: fetches pages over HTTP and reads
 * DESIGN.md and the theme CSS. Exit code 1 if any gate fails.
 *
 *   php deploy/v2/check.php [baseUrl]        (default http://127.0.0.1:8090)
 *
 * What it can prove: structure, weight, contrast of the token pairs, token drift, one font family,
 * honesty (removed claims), external requests. What it cannot: Lighthouse, tap targets, overflow at
 * 390px, French string length, and how the page LOOKS. Those are the browser gates listed at the end.
 */

$base = rtrim($argv[1] ?? 'http://127.0.0.1:8090', '/');
$root = dirname(__DIR__, 2);
$designFile = $root . '/DESIGN.md';
$cssFile = $root . '/themes/rd-child/style.css';

const BUDGET_FIRST_LOAD_KB = 200;   // Poppins + Brand Display + merged CSS; DESIGN.md budget
const BUDGET_JS_GZIP_KB = 6.0;      // theme menu script is 5.4 KB gzip; DESIGN.md allows it
const FORBIDDEN = array(
	'bank details', 'client consent', 'typical buyer', 'written results', 'know what is in your water',
	'understand the need', 'maintain and supply', 'projects succeed', 'working solution',
	'best outcome for every patient', 'certified professionals', 'meet international and local standards',
);
const ALLOWED_HOSTS = array('wa.me');

$results = array();
function check($group, $name, $ok, $detail = '') {
	global $results;
	$results[] = array($group, $name, (bool) $ok, $detail);
}
function info($group, $name, $detail) {
	global $results;
	$results[] = array($group, $name, null, $detail);
}

function get($url, &$status = null) {
	$ctx = stream_context_create(array('http' => array('timeout' => 60, 'ignore_errors' => true, 'header' => "Accept-Encoding: identity\r\n")));
	$body = @file_get_contents($url, false, $ctx);
	$status = 0;
	if (isset($http_response_header[0]) && preg_match('#\s(\d{3})\s#', $http_response_header[0], $m)) {
		$status = (int) $m[1];
	}
	return false === $body ? '' : $body;
}
function absolute($href, $pageUrl, $base) {
	if (preg_match('#^https?://#i', $href)) {
		return $href;
	}
	if (0 === strpos($href, '//')) {
		return 'http:' . $href;
	}
	if ('/' === ($href[0] ?? '')) {
		return $base . $href;
	}
	return rtrim(dirname($pageUrl . 'x'), '/') . '/' . $href;
}
function lum($hex) {
	$hex = ltrim($hex, '#');
	$c = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
	foreach ($c as &$v) {
		$v /= 255;
		$v = $v <= 0.03928 ? $v / 12.92 : pow(($v + 0.055) / 1.055, 2.4);
	}
	return 0.2126 * $c[0] + 0.7152 * $c[1] + 0.0722 * $c[2];
}
function contrast($a, $b) {
	$x = lum($a);
	$y = lum($b);
	if ($x < $y) {
		list($x, $y) = array($y, $x);
	}
	return round(($x + 0.05) / ($y + 0.05), 2);
}

/* ---- 1. Tokens from DESIGN.md -------------------------------------------------------------- */
$design = file_exists($designFile) ? file_get_contents($designFile) : '';
check('Contract', 'DESIGN.md exists', '' !== $design);
check('Contract', 'PRODUCT.md exists', file_exists($root . '/PRODUCT.md'), 'run /impeccable init if missing');
$colors = array();
if (preg_match('/^colors:\n((?:  [a-z0-9-]+: "#[0-9a-fA-F]{6}"\n)+)/m', $design, $m)) {
	preg_match_all('/  ([a-z0-9-]+): "(#[0-9a-fA-F]{6})"/', $m[1], $cm, PREG_SET_ORDER);
	foreach ($cm as $c) {
		$colors[$c[1]] = strtolower($c[2]);
	}
}
check('Contract', 'DESIGN.md colour tokens parsed', count($colors) >= 10, count($colors) . ' colours');

/* ---- 2. Contrast of the token pairs --------------------------------------------------------- */
$pairs = array(
	array('ink', 'white', 4.5), array('ink', 'mist', 4.5), array('muted', 'white', 4.5), array('muted', 'mist', 4.5),
	array('primary', 'white', 4.5), array('primary', 'cream', 4.5),
	array('link', 'mist', 4.5), array('link', 'white', 4.5),
	array('white', 'primary', 4.5), array('white', 'primary-dark', 4.5), array('logo-blue', 'white', 4.5),
	array('amber-ink', 'amber-wash', 4.5), array('success', 'white', 4.5), array('danger', 'white', 4.5),
	array('energy-amber', 'primary-dark', 3.0), array('field-border', 'white', 3.0), array('field-border', 'cream', 3.0),
);
foreach ($pairs as $p) {
	if (!isset($colors[$p[0]], $colors[$p[1]])) {
		check('Contrast', "{$p[0]} on {$p[1]}", false, 'token missing in DESIGN.md');
		continue;
	}
	$r = contrast($colors[$p[0]], $colors[$p[1]]);
	check('Contrast', "{$p[0]} on {$p[1]} needs {$p[2]}:1", $r >= $p[2], "$r:1");
}
if (isset($colors['accent-teal'])) {
	info('Contrast', 'accent-teal on white (decorative only, never text)', contrast($colors['accent-teal'], '#ffffff') . ':1');
}
if (isset($colors['primary'], $colors['mist'])) {
	info('Contrast', 'primary on mist (decorative only; use link for text)', contrast($colors['primary'], $colors['mist']) . ':1');
}

/* ---- 3. Theme CSS matches DESIGN.md --------------------------------------------------------- */
$css = file_exists($cssFile) ? file_get_contents($cssFile) : '';
check('Theme', 'rd-child/style.css exists', '' !== $css);
$map = array('rd-primary' => 'primary', 'rd-primary-dark' => 'primary-dark', 'rd-accent' => 'accent-teal', 'rd-ink' => 'ink',
	'rd-muted' => 'muted', 'rd-mist' => 'mist', 'rd-cream' => 'cream', 'rd-line' => 'line', 'rd-white' => 'white',
	'rd-field-border' => 'field-border', 'rd-success' => 'success', 'rd-danger' => 'danger', 'rd-link' => 'link',
	'rd-energy' => 'energy-amber');
// First :root wins (later :root may only set layout vars)
preg_match('/:root\s*\{([^}]+)\}/', $css, $rootBlock);
$cssTokens = array();
if (!empty($rootBlock[1])) {
	preg_match_all('/--(rd-[a-z-]+):\s*(#[0-9a-fA-F]{6})/', $rootBlock[1], $tm, PREG_SET_ORDER);
	foreach ($tm as $t) {
		$cssTokens[$t[1]] = strtolower($t[2]);
	}
}
foreach ($map as $cssName => $designName) {
	if (!isset($cssTokens[$cssName])) {
		check('Theme', "--$cssName present", false, "DESIGN.md has $designName");
	} elseif (isset($colors[$designName])) {
		check('Theme', "--$cssName matches DESIGN.md $designName", $cssTokens[$cssName] === $colors[$designName], "css {$cssTokens[$cssName]} vs design {$colors[$designName]}");
	}
}
// Two roles: Poppins (body) + Brand Display (headlines). No serif/italic faces.
$stripped = preg_replace('#/\*.*?\*/#s', '', $css);
check('Theme', 'no serif or italic fonts in CSS', !preg_match('/Georgia|Iowan|Times New Roman|(?<!sans-)\bserif\b|italic/i', $stripped));
preg_match_all('/@font-face\s*\{[^}]*font-family:\s*"([^"]+)"/', $stripped, $ff);
$families = array_unique($ff[1]);
check('Theme', 'only Poppins and Brand Display faces declared', !array_diff($families, array('Poppins', 'Brand Display')), implode(', ', $families));
check('Theme', 'Poppins font file present', file_exists($root . '/themes/rd-child/fonts/poppins-latin-400-normal.woff2'));
check('Theme', 'Brand Display font file present', file_exists($root . '/themes/rd-child/fonts/bebas-neue-latin-400-normal.woff2'));
check('Theme', 'OFL licence shipped with Poppins', file_exists($root . '/themes/rd-child/fonts/OFL-Poppins.txt'));
check('Theme', 'OFL licence shipped with Bebas Neue', file_exists($root . '/themes/rd-child/fonts/OFL-BebasNeue.txt'));
check('Theme', 'brand.css not enqueued (merged into style.css)', !preg_match('/brand\.css/', file_get_contents($root . '/themes/rd-child/functions.php')));

/* ---- 4. Pages ------------------------------------------------------------------------------- */
$pages = array();
foreach (array('en', 'fr') as $lang) {
	$json = json_decode(get($base . '/wp-json/wp/v2/pages?per_page=100&_fields=link,slug&lang=' . $lang), true);
	foreach ((array) $json as $p) {
		if (!empty($p['link']) && 'sample-page' !== ($p['slug'] ?? '')) {
			$pages[$p['link']] = true;
		}
	}
}
$pages = array_keys($pages);
if (!$pages) {
	check('Pages', 'page list from REST API', false, 'no pages found at ' . $base);
}
$hostPort = parse_url($base, PHP_URL_HOST) . (parse_url($base, PHP_URL_PORT) ? ':' . parse_url($base, PHP_URL_PORT) : '');
foreach ($pages as $url) {
	$short = str_replace($base, '', $url) ?: '/';
	$html = get($url, $status);
	check('Pages', "$short returns 200", 200 === $status, (string) $status);
	if (200 !== $status) {
		continue;
	}
	$body = preg_replace('#<(script|style|noscript|svg)\b.*?</\1>#is', '', $html);
	$text = strtolower(html_entity_decode(strip_tags($body), ENT_QUOTES));

	preg_match_all('/<h([1-6])[\s>]/i', $html, $hm);
	$levels = array_map('intval', $hm[1]);
	$h1 = count(array_filter($levels, fn($l) => 1 === $l));
	$skip = false;
	for ($i = 1; $i < count($levels); $i++) {
		if ($levels[$i] > $levels[$i - 1] + 1) {
			$skip = true;
		}
	}
	check('Pages', "$short exactly one h1", 1 === $h1, "$h1 h1");
	check('Pages', "$short heading levels do not skip", !$skip, implode('', $levels));
	check('Pages', "$short html lang set", (bool) preg_match('/<html[^>]*\slang="[a-zA-Z-]+"/', $html));
	check('Pages', "$short title and meta description", (bool) preg_match('#<title>[^<]{5,}#', $html) && (bool) preg_match('/name="description"/', $html));
	preg_match_all('/hreflang="([a-zA-Z-]+)"/', $html, $hl);
	check('Pages', "$short hreflang en and fr", in_array('en', $hl[1], true) && in_array('fr', $hl[1], true));
	preg_match_all('/<img\b[^>]*>/i', $html, $im);
	$noAlt = 0;
	foreach ($im[0] as $tag) {
		if (!preg_match('/\salt="/i', $tag)) { // attribute must exist; alt="" is correct for decorative images next to their own text
			$noAlt++;
		}
	}
	check('Pages', "$short every image has alt text", 0 === $noAlt, "$noAlt without");
	$external = array();
	preg_match_all('/<(?:script|img|iframe)\b[^>]*\ssrc=["\']([^"\']+)["\']/i', $html, $em1);
	preg_match_all('/<link\b[^>]*>/i', $html, $lk);
	$urls = $em1[1];
	foreach ($lk[0] as $tag) {
		if (preg_match('/rel=["\'](?:stylesheet|preload|icon|shortcut icon)["\']/i', $tag) && preg_match('/href=["\']([^"\']+)["\']/i', $tag, $hh)) {
			$urls[] = $hh[1];
		}
	}
	foreach ($urls as $u) {
		if (preg_match('#^(?:https?:)?//([^/]+)#i', $u, $hm2) && strcasecmp($hm2[1], $hostPort) && !in_array($hm2[1], ALLOWED_HOSTS, true)) {
			$external[] = $hm2[1];
		}
	}
	check('Pages', "$short no external script, style or image hosts", !$external, implode(',', array_unique($external)));
	$bad = array();
	foreach (FORBIDDEN as $f) {
		if (false !== strpos($text, $f)) {
			$bad[] = $f;
		}
	}
	check('Honesty', "$short none of the removed claims", !$bad, implode(' | ', $bad));
	check('Pages', "$short no PHP errors in output", !preg_match('/Fatal error|Warning:|Notice:|Undefined (array key|variable)/', $html));
}

/* ---- 5. Weight: first load of the English and French home ----------------------------------- */
function first_load($pageUrl, $base, &$parts) {
	$html = get($pageUrl);
	$parts = array('html' => strlen(gzencode($html, 6)), 'css' => 0, 'js' => 0, 'img' => 0, 'font' => 0);
	preg_match_all('/<link\b[^>]*>/i', $html, $lm);
	foreach ($lm[0] as $tag) {
		if (!preg_match('/href=["\']([^"\']+)["\']/', $tag, $h)) {
			continue;
		}
		$u = absolute(html_entity_decode($h[1]), $pageUrl, $base);
		if (preg_match('/rel=["\']stylesheet["\']/i', $tag)) {
			$parts['css'] += strlen(gzencode(get($u), 6));
		} elseif (preg_match('/rel=["\']preload["\']/i', $tag) && preg_match('/as=["\']font["\']/i', $tag)) {
			$parts['font'] += strlen(get($u));
		}
	}
	preg_match_all('/<script\b[^>]*\ssrc=["\']([^"\']+)["\']/i', $html, $sm);
	foreach ($sm[1] as $s) {
		$parts['js'] += strlen(gzencode(get(absolute(html_entity_decode($s), $pageUrl, $base)), 6));
	}
	preg_match_all('/<img\b[^>]*>/i', $html, $im);
	$desktopImg = 0;
	$seen = array();   // the same file used twice (e.g. desktop and mobile header logo) downloads once
	foreach ($im[0] as $tag) {
		if (false !== stripos($tag, 'loading="lazy"') || !preg_match('/\ssrc=["\']([^"\']+)["\']/i', $tag, $s)) {
			continue;
		}
		$mobKey = mobile_src($tag) ?: $s[1];
		if (isset($seen[$mobKey])) {
			continue;
		}
		$seen[$mobKey] = true;
		$desktopImg += strlen(get(absolute(html_entity_decode($s[1]), $pageUrl, $base)));
		$mob = mobile_src($tag);
		$parts['img'] += strlen(get(absolute(html_entity_decode($mob ?: $s[1]), $pageUrl, $base)));
	}
	$total = array_sum($parts);
	$parts['desktop_extra'] = max(0, $desktopImg - $parts['img']);
	return $total;
}

/** The srcset file a 390px-wide phone at 2x density would download (smallest candidate wide enough). */
function mobile_src($tag) {
	if (!preg_match('/\ssrcset=["\']([^"\']+)["\']/i', $tag, $ss)) {
		return null;
	}
	$cands = array();
	foreach (explode(',', $ss[1]) as $c) {
		if (preg_match('/(\S+)\s+(\d+)w/', trim($c), $m)) {
			$cands[(int) $m[2]] = $m[1];
		}
	}
	if (!$cands) {
		return null;
	}
	$cssWidth = 390.0;
	if (preg_match('/\ssizes=["\']([^"\']+)["\']/i', $tag, $sz)) {
		foreach (explode(',', $sz[1]) as $part) {
			$part = trim($part);
			if (preg_match('/^\(max-width:\s*(\d+)px\)\s*(\d+(?:\.\d+)?)(vw|px)$/', $part, $m)) {
				if (390 <= (int) $m[1]) {
					$cssWidth = 'vw' === $m[3] ? 390 * $m[2] / 100 : (float) $m[2];
					break;
				}
			} elseif (preg_match('/^(\d+(?:\.\d+)?)(vw|px)$/', $part, $m)) {
				$cssWidth = 'vw' === $m[2] ? 390 * $m[1] / 100 : (float) $m[1];
				break;
			}
		}
	}
	$need = $cssWidth * 2;
	ksort($cands);
	foreach ($cands as $w => $u) {
		if ($w >= $need) {
			return $u;
		}
	}
	return end($cands);
}
foreach (array('English home' => $base . '/', 'French home' => $base . '/fr/') as $label => $u) {
	$total = first_load($u, $base, $p);
	$kb = round($total / 1024, 1);
	$detail = sprintf('html %.1f css %.1f js %.1f img %.1f font %.1f KB', $p['html'] / 1024, $p['css'] / 1024, $p['js'] / 1024, $p['img'] / 1024, $p['font'] / 1024);
	check('Weight', "$label first load on a 390px phone under " . BUDGET_FIRST_LOAD_KB . ' KB (text gzipped, images at srcset size)', $kb <= BUDGET_FIRST_LOAD_KB, "$kb KB: $detail");
	info('Weight', "$label on desktop (largest image files)", round(($total + $p['desktop_extra']) / 1024, 1) . ' KB');
	check('Weight', "$label JavaScript under " . BUDGET_JS_GZIP_KB . ' KB gzip', $p['js'] / 1024 <= BUDGET_JS_GZIP_KB, round($p['js'] / 1024, 1) . ' KB');
}

/* ---- report --------------------------------------------------------------------------------- */
$fail = 0;
$byGroup = array();
foreach ($results as $r) {
	$mark = null === $r[2] ? 'INFO' : ($r[2] ? ' ok ' : 'FAIL');
	if (false === $r[2]) {
		$fail++;
	}
	// Per-page passes are hidden unless VERBOSE=1; everything else is shown.
	if (false === $r[2] || null === $r[2] || ('Pages' !== $r[0] && 'Honesty' !== $r[0]) || getenv('VERBOSE')) {
		$byGroup[$r[0]][] = sprintf("[%s] %s%s", $mark, $r[1], '' !== $r[3] ? "  ($r[3])" : '');
	}
}
foreach ($byGroup as $group => $lines) {
	echo "\n== $group\n" . implode("\n", $lines) . "\n";
}
$pass = count(array_filter($results, fn($r) => true === $r[2]));
echo "\n";
printf("%d passed, %d failed, %d pages checked%s\n", $pass, $fail, count($pages), getenv('VERBOSE') ? '' : '  (set VERBOSE=1 to list passing page checks)');
echo "\nBrowser gates this script cannot prove (do them before calling UI work done):\n";
echo "  - Lighthouse mobile: accessibility 100, best practices 100 (SEO is 69 locally only because indexing is blocked)\n";
echo "  - No tap target under 44px and no horizontal overflow at 390px wide\n";
echo "  - French pages checked with about 30% longer strings\n";
echo "  - LOOK at real screenshots at 390 and 1440 wide\n";
echo "  - Optional: impeccable detect --json themes/rd-child (offline anti-pattern scan)\n";
exit($fail ? 1 : 0);
