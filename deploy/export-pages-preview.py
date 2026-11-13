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

BANNER = """
<div id="rd-progress-banner" style="position:sticky;top:0;z-index:100000;background:#061b3a;color:#fff;font:600 14px/1.4 system-ui,sans-serif;padding:10px 16px;text-align:center;border-bottom:3px solid #0b71e0">
  Progress preview (static) · RD Engineering redesign · Not the live WordPress site ·
  <a href="INDEX_HREF" style="color:#ffb81c">EN</a> ·
  <a href="FR_HREF" style="color:#ffb81c">FR</a>
</div>
"""


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

        def repl(match: re.Match[str]) -> str:
            url = match.group("url")
            clean = url.split("?")[0]
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

        if out_name == "index.html":
            banner = BANNER.replace("INDEX_HREF", "./").replace("FR_HREF", "fr/")
            html = re.sub(r'href="[^"]*/fr/?"', 'href="fr/"', html)
        else:
            banner = BANNER.replace("INDEX_HREF", "../").replace("FR_HREF", "./")
            html = re.sub(
                r'(href=")[^"]*("(?:[^>]*)>\s*English\s*<)',
                r"\1../\2",
                html,
                flags=re.I,
            )

        html = re.sub(r"(<body[^>]*>)", r"\1" + banner, html, count=1, flags=re.I)
        html_dir.mkdir(parents=True, exist_ok=True)
        html_path.write_text(html, encoding="utf-8")
        print(f"wrote {html_path} ({html_path.stat().st_size} B)")

    (ROOT / ".nojekyll").write_text("")
    ok = sum(1 for value in saved.values() if value)
    print(f"done — {ok} assets mirrored")


if __name__ == "__main__":
    main()
