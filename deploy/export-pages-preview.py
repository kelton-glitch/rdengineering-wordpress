#!/usr/bin/env python3
"""Export local WP pages (EN/FR) to docs/ for GitHub Pages static preview.

Called by: Shell `python deploy/export-pages-preview.py` before commit/push for Pages.
No other deploy script mirrors the full site HTML tree into docs/.
Reads: HTTP HTML from 127.0.0.1:8090. Writes: docs/**/index.html + mirrored assets.
User: "Is it also possible to finish and deploy the site as is using Github pages?"
"""
import os
import re
import shutil
import urllib.parse
import urllib.request
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1] / "docs"
BASE = "http://127.0.0.1:8090"

# (local WP path, docs output relative to ROOT)
PAGES = [
    ("/", "index.html"),
    ("/services/", "services/index.html"),
    ("/services/engineering-services/", "services/engineering-services/index.html"),
    ("/services/water-laboratory/", "services/water-laboratory/index.html"),
    ("/services/professional-training/", "services/professional-training/index.html"),
    ("/services/products/", "services/products/index.html"),
    ("/about/", "about/index.html"),
    ("/tenders/", "tenders/index.html"),
    ("/contact/", "contact/index.html"),
    ("/faq/", "faq/index.html"),
    ("/privacy/", "privacy/index.html"),
    ("/fr/", "fr/index.html"),
    ("/fr/nos-services/", "fr/nos-services/index.html"),
    ("/fr/nos-services/services-ingenierie/", "fr/nos-services/services-ingenierie/index.html"),
    ("/fr/nos-services/laboratoire-eau/", "fr/nos-services/laboratoire-eau/index.html"),
    ("/fr/nos-services/formation-professionnelle/", "fr/nos-services/formation-professionnelle/index.html"),
    ("/fr/nos-services/produits/", "fr/nos-services/produits/index.html"),
    ("/fr/a-propos/", "fr/a-propos/index.html"),
    ("/fr/appels-d-offres/", "fr/appels-d-offres/index.html"),
    ("/fr/nous-contacter/", "fr/nous-contacter/index.html"),
    ("/fr/foire-aux-questions/", "fr/foire-aux-questions/index.html"),
    ("/fr/confidentialite/", "fr/confidentialite/index.html"),
]

# EN path -> FR path for language switcher hard-fix
LANG_PAIR = {
    "/": "/fr/",
    "/services/": "/fr/nos-services/",
    "/services/engineering-services/": "/fr/nos-services/services-ingenierie/",
    "/services/water-laboratory/": "/fr/nos-services/laboratoire-eau/",
    "/services/professional-training/": "/fr/nos-services/formation-professionnelle/",
    "/services/products/": "/fr/nos-services/produits/",
    "/about/": "/fr/a-propos/",
    "/tenders/": "/fr/appels-d-offres/",
    "/contact/": "/fr/nous-contacter/",
    "/faq/": "/fr/foire-aux-questions/",
    "/privacy/": "/fr/confidentialite/",
}
LANG_PAIR_REV = {v: k for k, v in LANG_PAIR.items()}

ASSET_RE = re.compile(
    r"""(?P<attr>href|src)=(?P<q>["'])(?P<url>https?://127\.0\.0\.1:8090/[^"']+)(?P=q)""",
    re.I,
)

# Catch remaining root-absolute paths after host strip (menus, logo, etc.)
ABS_PATH_RE = re.compile(
    r"""(?P<attr>href|src)=(?P<q>["'])(?P<path>/(?:services|about|tenders|contact|faq|privacy|fr|wp-content|wp-includes)[^"']*)(?P=q)""",
    re.I,
)


def fetch(url: str) -> bytes:
    req = urllib.request.Request(url, headers={"User-Agent": "rd-static-export/1.0"})
    with urllib.request.urlopen(req, timeout=60) as response:
        return response.read()


def local_path_for(url: str) -> Path:
    path = urllib.parse.urlparse(url).path.lstrip("/")
    return ROOT / path


def normalize_wp_path(path: str) -> str:
    if not path or path == "/":
        return "/"
    path = path.split("?")[0].split("#")[0]
    if not path.startswith("/"):
        path = "/" + path
    if not path.endswith("/"):
        if Path(path).suffix:
            return path
        path += "/"
    return path


def main() -> None:
    if ROOT.exists():
        shutil.rmtree(ROOT)
    ROOT.mkdir(parents=True)

    wp_to_out = {normalize_wp_path(wp): out for wp, out in PAGES}
    saved: dict[str, str | None] = {}

    def ensure_asset(url: str) -> str | None:
        url = url.split("#")[0].split("?")[0]
        if url in saved:
            return saved[url]
        if "127.0.0.1:8090" not in url and not url.startswith("/"):
            saved[url] = None
            return None
        if "/wp-json" in url or url.rstrip("/").endswith(".php"):
            saved[url] = None
            return None
        path_only = urllib.parse.urlparse(url).path if "://" in url else url
        ext = Path(path_only).suffix.lower()
        allowed = {
            ".css", ".js", ".map", ".woff", ".woff2", ".ttf", ".otf",
            ".png", ".jpg", ".jpeg", ".webp", ".gif", ".svg", ".ico", ".avif",
        }
        if ext not in allowed:
            saved[url] = None
            return None
        full = url if "://" in url else BASE + url
        dest = local_path_for(full if "://" in full else BASE + path_only)
        try:
            dest.parent.mkdir(parents=True, exist_ok=True)
            if not dest.exists():
                data = fetch(full)
                dest.write_bytes(data)
                print(f"saved {dest.as_posix()} ({len(data)} B)")
            rel = dest.relative_to(ROOT).as_posix()
            saved[url] = rel
            return rel
        except Exception as exc:  # noqa: BLE001
            print(f"FAIL {url}: {exc}")
            saved[url] = None
            return None

    def rel_to_page(wp_path: str, html_dir: Path) -> str | None:
        out = wp_to_out.get(normalize_wp_path(wp_path))
        if not out:
            return None
        target_dir = (ROOT / out).parent
        rel = os.path.relpath(target_dir, html_dir).replace("\\", "/")
        if rel == ".":
            return "./"
        return rel + "/"

    for path, out_name in PAGES:
        print(f"fetch {path} …")
        raw = fetch(BASE + path).decode("utf-8", "replace")
        html_path = ROOT / out_name
        html_dir = html_path.parent

        def repl_abs(match: re.Match[str]) -> str:
            url = match.group("url")
            clean = url.split("?")[0]
            path_only = urllib.parse.urlparse(clean).path or "/"
            mapped = rel_to_page(path_only, html_dir)
            if mapped is not None:
                return f'{match.group("attr")}={match.group("q")}{mapped}{match.group("q")}'
            rel = ensure_asset(clean)
            if not rel:
                if "127.0.0.1" in url:
                    return f'{match.group("attr")}={match.group("q")}#{match.group("q")}'
                return match.group(0)
            target = ROOT / rel
            rel_from = os.path.relpath(target, html_dir).replace("\\", "/")
            return f'{match.group("attr")}={match.group("q")}{rel_from}{match.group("q")}'

        html = ASSET_RE.sub(repl_abs, raw)
        html = html.replace("http://127.0.0.1:8090", "")

        def repl_root(match: re.Match[str]) -> str:
            p = match.group("path")
            mapped = rel_to_page(p, html_dir)
            if mapped is not None:
                return f'{match.group("attr")}={match.group("q")}{mapped}{match.group("q")}'
            rel = ensure_asset(BASE + p)
            if not rel:
                return match.group(0)
            rel_from = os.path.relpath(ROOT / rel, html_dir).replace("\\", "/")
            return f'{match.group("attr")}={match.group("q")}{rel_from}{match.group("q")}'

        html = ABS_PATH_RE.sub(repl_root, html)

        # Language switchers (hreflang + Polylang)
        wp_norm = normalize_wp_path(path)
        if wp_norm in LANG_PAIR:
            fr_rel = rel_to_page(LANG_PAIR[wp_norm], html_dir) or "#"
            en_rel = rel_to_page(wp_norm, html_dir) or "./"
            html = re.sub(
                r'(<link rel="alternate" href=")[^"]*(" hreflang="fr")',
                rf"\g<1>{fr_rel}\2",
                html,
                count=1,
            )
            # Root-absolute hreflang="en" href="/" breaks project Pages base path
            html = re.sub(
                r'(<link rel="alternate" href=")[^"]*(" hreflang="en")',
                rf"\g<1>{en_rel}\2",
                html,
                count=1,
            )
            html = re.sub(
                r'(lang-item-fr[^>]*>\s*<a href=")[^"]*(")',
                rf"\g<1>{fr_rel}\2",
                html,
            )
            html = re.sub(
                r'(lang-item-en[^>]*>\s*<a href=")[^"]*(")',
                rf"\g<1>{en_rel}\2",
                html,
            )
        elif wp_norm in LANG_PAIR_REV:
            en_rel = rel_to_page(LANG_PAIR_REV[wp_norm], html_dir) or "#"
            fr_rel = rel_to_page(wp_norm, html_dir) or "./"
            html = re.sub(
                r'(<link rel="alternate" href=")[^"]*(" hreflang="en")',
                rf"\g<1>{en_rel}\2",
                html,
                count=1,
            )
            html = re.sub(
                r'(lang-item-en[^>]*>\s*<a href=")[^"]*(")',
                rf"\g<1>{en_rel}\2",
                html,
            )
            html = re.sub(
                r'(lang-item-fr[^>]*>\s*<a href=")[^"]*(")',
                rf"\g<1>{fr_rel}\2",
                html,
            )

        html_dir.mkdir(parents=True, exist_ok=True)
        html_path.write_text(html, encoding="utf-8")
        print(f"wrote {html_path} ({html_path.stat().st_size} B)")

    (ROOT / ".nojekyll").write_text("")
    ok = sum(1 for value in saved.values() if value)
    print(f"done — {len(PAGES)} pages, {ok} assets mirrored")


if __name__ == "__main__":
    main()
