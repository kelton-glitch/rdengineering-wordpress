#!/usr/bin/env python3
"""Export local WP home (EN/FR) to docs/ for GitHub Pages progress preview.

Called by: Shell `python deploy/export-pages-preview.py` before commit/push for Pages.
No existing exporter in deploy/ serves this purpose (seed/check only).
Reads: HTTP HTML from 127.0.0.1:8090. Writes: docs/index.html, docs/fr/index.html, mirrored assets.
User: "I wish to push the version which I have now on github, then deploy it via github pages so I can show progress"
"""
import os
import re
import shutil
import urllib.parse
import urllib.request
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1] / "docs"
BASE = "http://127.0.0.1:8090"

PAGES = [
    ("/", "index.html"),
    ("/fr/", "fr/index.html"),
]

ASSET_RE = re.compile(
    r"""(?P<attr>href|src)=(?P<q>["'])(?P<url>https?://127\.0\.0\.1:8090/[^"']+)(?P=q)""",
    re.I,
)

def fetch(url: str) -> bytes:
    req = urllib.request.Request(url, headers={"User-Agent": "rd-static-export/1.0"})
    with urllib.request.urlopen(req, timeout=45) as response:
        return response.read()


def local_path_for(url: str) -> Path:
    path = urllib.parse.urlparse(url).path.lstrip("/")
    return ROOT / path


def main() -> None:
    if ROOT.exists():
        shutil.rmtree(ROOT)
    ROOT.mkdir(parents=True)

    saved: dict[str, str | None] = {}

    def ensure_asset(url: str) -> str | None:
        url = url.split("#")[0].split("?")[0]
        if url in saved:
            return saved[url]
        if "127.0.0.1:8090" not in url:
            saved[url] = None
            return None
        if "/wp-json" in url or url.rstrip("/").endswith(".php"):
            saved[url] = None
            return None
        # Pretty permalinks have no extension — skip (would clash with dirs like docs/fr/).
        path_only = urllib.parse.urlparse(url).path
        ext = Path(path_only).suffix.lower()
        allowed = {
            ".css", ".js", ".map", ".woff", ".woff2", ".ttf", ".otf",
            ".png", ".jpg", ".jpeg", ".webp", ".gif", ".svg", ".ico", ".avif",
        }
        if ext not in allowed:
            saved[url] = None
            return None
        dest = local_path_for(url)
        try:
            dest.parent.mkdir(parents=True, exist_ok=True)
            if not dest.exists():
                data = fetch(url)
                dest.write_bytes(data)
                print(f"saved {dest.as_posix()} ({len(data)} B)")
            rel = dest.relative_to(ROOT).as_posix()
            saved[url] = rel
            return rel
        except Exception as exc:  # noqa: BLE001
            print(f"FAIL {url}: {exc}")
            saved[url] = None
            return None

    for path, out_name in PAGES:
        raw = fetch(BASE + path).decode("utf-8", "replace")
        html_path = ROOT / out_name
        html_dir = html_path.parent

        def page_href(path: str) -> str | None:
            """Map local WP pretty URLs to static Pages paths for this HTML file."""
            path = path.rstrip("/") + "/" if path not in ("", "/") else "/"
            if out_name == "index.html":
                mapping = {"/": "./", "/fr/": "fr/"}
            else:
                mapping = {"/": "../", "/fr/": "./"}
            return mapping.get(path)

        def repl(match: re.Match[str]) -> str:
            url = match.group("url")
            clean = url.split("?")[0]
            path_only = urllib.parse.urlparse(clean).path or "/"
            mapped = page_href(path_only)
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

        html = ASSET_RE.sub(repl, raw)
        html = html.replace("http://127.0.0.1:8090", ".")

        # Hard-fix language switchers (hreflang + Polylang menu items).
        if out_name == "index.html":
            html = re.sub(
                r'(<link rel="alternate" href=")[^"]*(" hreflang="fr")',
                r"\1fr/\2",
                html,
                count=1,
            )
            html = re.sub(r'(lang-item-fr[^>]*>\s*<a href=")[^"]*(")', r"\1fr/\2", html)
        else:
            html = re.sub(
                r'(<link rel="alternate" href=")[^"]*(" hreflang="en")',
                r"\1../\2",
                html,
                count=1,
            )
            html = re.sub(r'(lang-item-en[^>]*>\s*<a href=")[^"]*(")', r"\1../\2", html)
            html = re.sub(r'(lang-item-fr[^>]*>\s*<a href=")[^"]*(")', r"\1./\2", html)

        html_dir.mkdir(parents=True, exist_ok=True)
        html_path.write_text(html, encoding="utf-8")
        print(f"wrote {html_path} ({html_path.stat().st_size} B)")

    (ROOT / ".nojekyll").write_text("")
    ok = sum(1 for value in saved.values() if value)
    print(f"done — {ok} assets mirrored")


if __name__ == "__main__":
    main()
