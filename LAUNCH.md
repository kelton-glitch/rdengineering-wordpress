# Launch checklist (local sign-off before live)

Authority: `PRODUCT.md` + `DESIGN.md`. Theme CSS: `themes/rd-child/style.css` only.

## Done in redesign (2026-11-13)

- [x] Guidelines v2 tokens unified with DESIGN.md and style.css
- [x] Round 3 structure winner recorded: r3-authority
- [x] Unverified home metrics replaced with "To be supplied" gaps
- [x] French home headline shortened (`Ce qui coule.`)
- [x] `theme.json` editor palette locked to brand colours
- [x] `check.php` green (266 passed); mobile Lighthouse a11y 100 / BP 100
- [x] Font decision: ship **Bebas Neue** as Brand Display until Deutschlander is licensed

## Owner must confirm before live cutover

- [ ] WhatsApp available on +237 695 981 047 (or remove WhatsApp CTAs)
- [ ] Contact Form 7 recipients: services@ / waterlab@ (and training@ / products@ as needed)
- [ ] Privacy page legal review
- [ ] Supply verified metric figures **or** leave gaps
- [ ] Real project photos to replace AI illustrations
- [ ] License Deutschlander (optional) or keep Bebas permanently
- [ ] Visual sign-off of http://127.0.0.1:8090/ and /fr/ at 390 and 1440
- [ ] Explicit approval to switch live from LabtechCO + Elementor to Kadence + rd-child

## Cutover notes

1. Backup live DB and `wp-content` first.
2. Deploy from `rdengineering` (source of truth). `rdengineering-wordpress` is a sync target only.
3. Enable search indexing only at launch (`blog_public`).
4. Do not invent claims, stats, certifications, or partner logos.

## Distilled home (2026-11-13)

- [x] Home IA compressed: hero → triggers → timeline → gaps → supplier file → contact
- [x] Quiet CSS fades; infinite drift/zoom removed
- [x] PRODUCT weight budget 200 KB
