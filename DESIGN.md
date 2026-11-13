<!-- ADOPTED 2026-11-13. Visual language from RD_Brand_Identity_Guidelines_v2.pdf.
     Structure and honesty from Field Report / Round 3 Authority (r3-authority).
     Tokens below are the single source of truth; themes/rd-child/style.css must match. -->
---
name: RD Engineering Solution
description: Water, sanitation and energy engineering from Douala. Brand guidelines visual system with procurement-ready Field Report structure. English and French. Phones on weak networks.
colors:
  primary: "#0b71e0"
  primary-dark: "#061b3a"
  logo-blue: "#0b71e0"
  accent-teal: "#16c4d6"
  energy-amber: "#ffb81c"
  amber-ink: "#8a5a00"
  amber-wash: "#fff7e0"
  ink: "#061b3a"
  muted: "#3d5069"
  field-border: "#5f7390"
  line: "#c9d6e6"
  mist: "#eef4fb"
  cream: "#ffffff"
  white: "#ffffff"
  link: "#0a5fc0"
  success: "#1b7f4b"
  danger: "#b3261e"
typography:
  display:
    fontFamily: "Deutschlander, Brand Display, Arial Narrow, Roboto Condensed, Impact, sans-serif"
    fontSize: "clamp(3rem, 1.9rem + 4.6vw, 5.75rem)"
    fontWeight: 700
    lineHeight: 0.98
    letterSpacing: "0.01em"
    textTransform: uppercase
  headline:
    fontFamily: "Deutschlander, Brand Display, Arial Narrow, Roboto Condensed, Impact, sans-serif"
    fontSize: "clamp(2.3rem, 1.7rem + 2.6vw, 3.6rem)"
    fontWeight: 700
    lineHeight: 0.98
    letterSpacing: "0.01em"
    textTransform: uppercase
  title:
    fontFamily: "Deutschlander, Brand Display, Arial Narrow, Roboto Condensed, Impact, sans-serif"
    fontSize: "clamp(1.6rem, 1.4rem + 0.8vw, 2rem)"
    fontWeight: 700
    lineHeight: 1
  body:
    fontFamily: "Poppins, system-ui, -apple-system, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif"
    fontSize: "clamp(1rem, 0.96rem + 0.2vw, 1.125rem)"
    fontWeight: 400
    lineHeight: 1.65
  label:
    fontFamily: "Deutschlander, Brand Display, Arial Narrow, Roboto Condensed, Impact, sans-serif"
    fontSize: "0.78rem"
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: "0.08em"
    textTransform: uppercase
  data:
    fontFamily: "Poppins, system-ui, sans-serif"
    fontSize: "0.95rem"
    fontWeight: 500
    lineHeight: 1.4
    fontFeature: "tnum"
rounded:
  sm: "0"
  md: "0"
  pill: "0"
spacing:
  xs: "8px"
  sm: "16px"
  md: "24px"
  lg: "32px"
  xl: "48px"
  section: "72px"
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.white}"
    rounded: "{rounded.md}"
    padding: "12px 24px"
    height: "48px"
  button-primary-hover:
    backgroundColor: "{colors.primary-dark}"
  button-hero-primary:
    backgroundColor: "{colors.energy-amber}"
    textColor: "{colors.primary-dark}"
  button-outline:
    backgroundColor: "{colors.white}"
    textColor: "{colors.primary}"
    rounded: "{rounded.md}"
    padding: "12px 24px"
    height: "48px"
  chip-status:
    backgroundColor: "{colors.amber-wash}"
    textColor: "{colors.amber-ink}"
    rounded: "{rounded.sm}"
    padding: "4px 12px"
  card:
    backgroundColor: "{colors.white}"
    textColor: "{colors.ink}"
    rounded: "{rounded.md}"
    padding: "24px"
  field:
    backgroundColor: "{colors.white}"
    textColor: "{colors.ink}"
    rounded: "{rounded.md}"
    padding: "12px 16px"
    height: "48px"
---

# Design System: RD Engineering Solution

## Overview

**Creative North Star: "Engineering what flows"**

Visual language follows [RD_Brand_Identity_Guidelines_v2.pdf](../Guidelines/RD_Brand_Identity_Guidelines_v2.pdf): Flow Blue, Deep Current, sharp corners, condensed uppercase display type, gold hero CTA, split hero. Content structure follows the Field Report / Round 3 Authority winner: numbered sections, company-details card, service chooser, supplier file with visible gaps, one primary action, Call/WhatsApp as outline or ghost.

**Tournament outcome (2026-11-07 / locked 2026-11-13):** Round 1 leader was A Authority (78.0). Round 3 challengers were r3-authority, r3-editorial, r3-story. **Structure winner: r3-authority** (due-diligence file, capability/status registers, company-details beside value statement, mobile first-screen actions). Visual hero and brand type come from Guidelines v2 + Sample homepage, not from Round 1 Field Report Public Sans.

**Key Characteristics:**
- Two typeface roles: Poppins (body) and Brand Display / Bebas Neue stand-in for Deutschlander (headlines, buttons, labels)
- Flow Blue primary; gold (#FFB81C) only on hero / closing primary CTAs per guidelines
- Sharp corners (radius 0); flat surfaces; no soft card shadow
- Numbered sections, status chips, supplier file as signature UX
- French is a first-class layout case
- Illustrative images always labelled until real photography replaces them

## Colors

### Primary
- **Flow Blue** (#0b71e0): logo, filled buttons off-hero, numbers, rules. 4.72:1 on white (AA for text). 4.26:1 on Mist — **never use Flow Blue for small text on Mist**; use Link Blue instead.
- **Deep Current** (#061b3a): hero panel, bands, footer, ink. 17.13:1 with white.
- **Link Blue** (#0a5fc0): text links on Mist. 5.56:1 on Mist, 6.16:1 on white.

### Secondary
- **Clear Water** (#16c4d6): decorative flow lines and icon strokes only. Never text.
- **Signal Gold** (#ffb81c): hero primary CTA and focus on dark surfaces. 9.89:1 on Deep Current. Never a second filled action beside Flow Blue on the same light screen.

### Neutral and status
- **Ink** = Deep Current. **Quiet Slate** (#3d5069). **Field Edge** (#5f7390) 4.84:1 on white. **Hairline** (#c9d6e6). **Mist** (#eef4fb). **Cream** = white page surface.
- **Amber Ink** (#8a5a00) on **Amber Wash** (#fff7e0): "To be supplied" chips. 5.54:1.

### Named Rules
**The One Primary Rule.** On light surfaces, exactly one filled action colour: Flow Blue. Call and WhatsApp are outline. On Deep Current hero/close, the filled CTA may be Signal Gold per guidelines; ghosts stay white outline.
**The Gap Is Visible Rule.** Unknown facts are dashed Amber Ink boxes or chips, never invented numbers.
**The Mist Link Rule.** Links on Mist use Link Blue (#0a5fc0), not Flow Blue.
**The Accent Budget Rule.** Clear Water covers at most 5% of any screen (graphics only).

## Typography

**Body:** Poppins, self-hosted WOFF2 (400/500/600), Latin subset, SIL OFL.
**Display:** Brand guidelines specify Deutschlander. Until licensed, **Bebas Neue** ships as `Brand Display` (SIL OFL). Swap file + family when Deutschlander is supplied. Condensed uppercase for H1–H4, buttons, eyebrows, dock labels. Scientific labels (pH, E. coli, TDS) stay sentence case in Poppins.

### Named Rules
**The Two Role Rule.** Hierarchy uses size and the display face, not a third family.
**The Tabular Numbers Rule.** Measurements use `font-variant-numeric: tabular-nums`.
**The French First-Class Rule.** Check layouts with ~30% longer strings. Non-breaking spaces before `:;?!` and inside `« »`. `text-wrap: balance` on headings.

## Layout

Container ~82rem content column with 1.5rem gutters. Sections ~72px vertical rhythm. Mobile-first breakpoints: 600, 783 (mobile dock), 900 (split hero / two-column). Tap targets ≥48px. Tables stack on phones.

**Home first viewport:** brand in header, one headline, one support line, CTA group, dominant split hero image. No stats or secondary marketing in the first viewport. Verified metrics may sit below the hero; unverified metrics use visible gaps.

## Elevation, shapes, components

Flat until floating. Radius 0 everywhere. Soft shadow retired. Cards: white, hairline border, 4px Flow Blue top rule.

**Buttons:** min-height 48px, uppercase display face. Primary Flow Blue on light; hero primary Signal Gold on Deep Current; outline white/Flow Blue; ghost white border on dark.

**Status chip / supplier file / chooser / company-details / mobile dock:** keep Field Report / r3-authority behaviour.

**Project cycle (decided 2026-11-13, home section 02 "How a project runs"):** The six stages (Advise, Test, Design, Build, Train, Maintain) are shown as a loop. Three candidates were built and rendered in `rdengineering-v2/public/concepts/cycle/`: A ring with a legend, B horizontal/vertical flow with a return line, C numbered step cards. Scored on four lenses (procurement buyer, phone user in Cameroon, accessibility and build engineer, art director); the scoring was done by the builder alone, without outside judges. Chosen: **A from 600px up, B below 600px.** A is the only candidate that visibly reads as a cycle. B is shorter on a phone than A's diagram plus legend. C was dropped as the least distinctive.
- One semantic `<ol class="rd-timeline">` serves both layouts, so content is never duplicated. The ring SVG (`.rd-cycle__ring`) is decorative: `aria-hidden`, hidden below 600px, and carries only stage numbers, icons and the centre label.
- Below 600px each stage is a 64px bordered icon tile with a number badge, joined by a Clear Water dotted line. From 600px the list becomes a two-column legend beside the ring. From 900px the ring and legend sit side by side.
- Colour: Flow Blue ring and arcs, Deep Current number badges, Clear Water for the dotted core and connectors only (graphics, inside the 5% accent budget). No new colours, fonts or motion.
- The centre label is translated ("UN PROJET / UNE BOUCLE"). The French legend still needs a longest-string check at about 30% longer text.
- The Build icon (`hardhat` in `inc/icons.php`) was redrawn because the old glyph read as a bell; this also changes it in the home dock and the Engineering contact label.
- Open: verify at 390px on a real browser (overflow, tap targets) and run Lighthouse; the headless Edge used for screenshots clamps width to 500px.

**Motion (quiet kit, shipped):** opacity + small `translateY` only. Hero entrance fade-up (≤600ms, short stagger). Sections use one-shot scroll fade-rise (`.rd-reveal`, `animation-timeline: view()` when supported). Soft hover opacity 150–200ms. No infinite loops, no Ken Burns, no parallax, no JS animation libraries. Everything gated by `prefers-reduced-motion: no-preference`; reduced-motion users see the final static layout.

**Partner strip (added 2026-11-13, owner request; a recorded exception to "no infinite loops"):** a full-width, continuous horizontal scroll of partner logos above the closing CTA on the home page. It breaks the quiet-motion rule on purpose, so it carries these safeguards: a visible "Pause scrolling" control (CSS-only checkbox, keyboard operable, no JavaScript); it pauses on hover and on keyboard focus; the animation runs only under `prefers-reduced-motion: no-preference`, and reduced-motion users get a static row they can scroll by hand; the duplicate half of the track is `aria-hidden`. Logos come from the `rd_partners` filter. Until real partners and permissions exist, the strip shows dashed "Partner logo / To be supplied" tiles; no partner is ever invented. Logos are greyscale at rest. Remove the strip entirely if no partner is confirmed by launch.

**Footer (slimmed 2026-11-13; social and contact lines refined same day):** one compact Deep Current panel: brand and tagline, the footer menu as a two-column link list, then phone, address and social buttons. Opening hours and the quote button were removed because the page closing band, the header and the mobile dock already carry them. Social buttons are 44px outlined tiles (1px white at 50%, transparent fill) holding a 24px single-colour brand mark (LinkedIn, Facebook, Instagram, YouTube, X; inline SVG from `rd_brand_mark()`, no icon font and no request). Hover fills Flow Blue; focus shows a Signal Gold ring. The "Follow us" label is 0.85rem. The phone and address icons share one baseline with their text. Social profile URLs in `rd_social_profiles()` are unverified and must be confirmed before launch.

**Navbar (iterated 2026-11-13; six changes, none a new layout pattern, so no candidate round):**
- Language toggle: a joined `EN | FR` pair of 44px boxes after the quote button; the current language is filled Deep Current and carries `aria-current`. The visible code is `aria-hidden`; the full name ("English", "Français") stays as screen-reader text. Built in `functions.php` on top of the Polylang menu items.
- Phone in the header: a click-to-call link before the quote button. Icon only from 1025px, icon plus number from 1200px. The same link sits in the mobile drawer.
- Active page: a 3px Flow Blue bar under the current link (and under "Services" on a service page). Hover and keyboard focus preview it.
- Services panel: white panel with a 4px Flow Blue top rule, no radius. Each item has a desk icon tile and a one-line description. The description is the menu item's description field, seeded from the home desk tiles (no new copy). The class `rd-sub-<icon>` picks the icon.
- Mobile: a labelled 44px "Menu" button with a Flow Blue outline. The drawer is Deep Current with 56px rows, a Signal Gold quote button (gold on dark, per the rules), the phone number and `EN | FR`. Service items show icons but not descriptions in the drawer. The bottom call bar hides while the drawer is open.
- Sticky: the bar is `position: fixed` while `#masthead` keeps its 80px of page flow, so the page never shifts. Where `animation-timeline: scroll()` exists (Chromium, Safari 26) the bar shrinks from 80px to 64px and gains a shadow over the first 120px of scroll; elsewhere it stays 80px. No JavaScript, and no motion under `prefers-reduced-motion`.

**Project showcase (redesigned 2026-11-13, home section 05; chosen from three candidates):** the old tabs-plus-gallery was replaced after the owner asked for a more attractive, stickier section. Candidates, rendered at 1440px and 500px with real images (concept files in `rdengineering-v2/public/concepts/projects/`):
- A, cinematic 16:9 stage with the facts over the photo and image selector cards. Scored 14/20. The 800px photos look soft at stage width, the text over the photo is a contrast risk, and only one image per project shows.
- B, swipe carousel with a call-to-action end card. Scored 15/20. Best on phones, but project 2 and 3 are partly hidden on desktop and a horizontal scroll region is weaker for access.
- C, thumbnail list, three-image mosaic, labelled fact tiles. Scored 18/20 (buyer 5, phone 4, access 5, art director 4). Chosen, with B's end call-to-action added.

How C works: radio inputs and CSS only (no JavaScript; the 6 KB script budget is untouched). A list of three projects (64px thumbnail, number, title, place) is always visible; from 900px it sits left (17rem) and the project sits right, stacked on phones. The chosen project shows a mosaic (one large image, two small, 16:10, 4px Flow Blue top rule, caption "Illustrative image · Sample"), a "01 / 03" counter, the title, three white fact tiles (Where, Scope, Result) and a "Next project" button that wraps from the last to the first. Below the component sits a Deep Current band with a Signal Gold top rule and button: "Planning something similar? / Request a quote". No auto-advance, no motion, keyboard operable with a visible focus outline.
- Images are stand-ins from the media library (landscape `hero`, `community`, `training`, `products`, `laboratory`, `engineering`, `team-meeting`), all labelled "Illustrative image · Sample". Replace with real project photos. Thumbnails use `alt=""` because the title sits beside them; `check.php` now requires the `alt` attribute to exist rather than be non-empty.
- Data: `$projects` (title, place, scope, result) and `$show_specs` (three image names plus alt text per project) in `themes/rd-child/front-page.php`. CSS supports up to 4 projects; add the `#rd-pN` rules for more.
- The section title changed from "Example entries for layout review" to "Selected projects" (French "Projets sélectionnés"). The "Sample text only" note and the Sample chips stay until the figures (yield, pupils, turnaround) are real and confirmed.

**Hero carousel dots (fixed 2026-11-13):** the five dots are 44px buttons in a row (10px visual mark inside), and the group is `role="group"`, not `tablist`. Home Lighthouse mobile accessibility went from 91 to 100.

## Do's and Don'ts

### Do
- Keep first-load weight measured; budget **200 KB** (fonts + CSS larger than Public Sans era). `php deploy/v2/check.php` enforces it.
- Preload Bebas + Poppins 400 with `crossorigin` and `font-display: swap`.
- Show unknowns as dashed gaps; label AI art "Illustrative image".
- Test every page in French at 390px.

### Don't
- Invent claims, certifications, statistics, partners or testimonials.
- Use Clear Water for text, or Flow Blue for small text on Mist.
- Add a third typeface or third-party font host.
- Ship decorative motion, autoplay media or parallax.
- Edit LabtechCO / live Elementor; local v2 first, owner approval before live.

## Known gaps

1. Deutschlander not licensed; Bebas Neue stand-in until swap.
2. Full contrast re-audit of every live pair still recommended after each UI change.
3. French home headline must stay short enough for ≤3 lines at 390px.
4. Real project photography still pending.
5. Android CLS not yet measured on a physical device.

## Research / upgrade path

1. **Unify tokens to Guidelines v2. DONE (2026-11-13).** DESIGN.md, style.css, check.php aligned; brand.css folded in.
2. Content honesty pass on landing metrics and FR headline.
3. Tokens as `theme.json` editor presets + optional DTCG export.
4. French typography pass (nbsp, longest-string).
5. Real photography replaces illustrations.
6. License Deutschlander or formally keep Bebas Neue forever in this file.
7. Owner local sign-off, then live cutover from LabtechCO.
