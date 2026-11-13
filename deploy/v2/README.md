# v2 site build scripts

Rebuilds the redesigned RD Engineering Solution site (Kadence child theme `rd-child`, Polylang English/French) on any WordPress that has this repo as `wp-content`.
These scripts were developed and tested on a local copy only. Running them on the live server needs a fresh database backup first and explicit approval.

## Requirements
- WordPress with the Kadence theme and the `rd-child` child theme active
- Plugins active: Contact Form 7, Polylang
- French language packs: `wp language core install fr_FR`, `wp language theme install kadence fr_FR`, `wp language plugin install contact-form-7 fr_FR`, `wp language plugin install polylang fr_FR`
- Permalinks set to `/%postname%/` (set it with `wp eval 'update_option("permalink_structure","/%postname%/");'`; do not pass a value starting with `/` on the Windows command line)

## Run order (each script is safe to re-run)
```
wp eval-file deploy/v2/seed-pages.php        # English pages, menus, images, logo, English forms
wp eval-file deploy/v2/setup-polylang.php    # languages, URL settings, English assignment
wp eval-file deploy/v2/seed-pages-fr.php     # French pages, menus, forms (linked as translations)
wp eval 'PLL()->model->clean_languages_cache(); flush_rewrite_rules();'
```

## Files
| File | Purpose |
|---|---|
| `lib.php` | Block-markup helpers, image import, menu builder |
| `components.php` | Page components: section header, hero, company details, status lists |
| `content.php` | All page copy, English and French, from one source so they stay in step |
| `seed-pages.php` / `seed-pages-fr.php` | Create or update pages, forms, menus |
| `setup-polylang.php` | Polylang languages and settings |
| `images/` | Optimised WebP images, imported into the media library once |

## Copy rules
Only facts the company already publishes. Unknown facts (registration numbers, accreditation, team, references, prices) show as visible "To be supplied" boxes. The pictures are AI-generated illustrations and carry an "Illustrative image" caption until real photos replace them.

## Quality gate
Run after any UI change. It only reads: the site over HTTP, `DESIGN.md` and the theme CSS.
```
php deploy/v2/check.php http://127.0.0.1:8090      # VERBOSE=1 lists every passing page check
```
It checks: every page returns 200, exactly one h1, no skipped heading levels, title and description, hreflang pairs, alt text, no external hosts, none of the removed claims, first-load weight on a 390px phone, JavaScript weight, contrast of the colour pairs in `DESIGN.md`, theme tokens matching `DESIGN.md`, and one font family. It exits 1 on any failure.
It cannot check what needs a browser: Lighthouse, tap targets, overflow at 390px, French string length, and how the page looks. Those are listed at the end of its output and in `CLAUDE.md`.

## To confirm with the owner before launch
- WhatsApp availability on +237 695 981 047
- Form recipients: `services@rdengineeringsol.com` (quotes), `waterlab@rdengineeringsol.com` (water tests)
- The privacy page is a draft and needs a legal review
- Turn search-engine indexing on only at launch
