# Configuration

*Reference.* What this pack's config file holds, and what belongs to core instead.

## The file and its key

`config/icon-sets-flag.php`, merged at `ichava.icon-sets-flag`. **The filename must match the package short name** -- a
different name silently doubles the key and every read returns `null`, which shipped undetected in
this ecosystem once before.

```bash
php artisan vendor:publish --tag=ichava::icon-sets-flag-config
```

Publishing is optional; the defaults are merged either way.

## What is here

One key, `default_variant`: the aspect ratio an unqualified flag resolves to (`4x3` or `1x1`, `ICHAVA_FLAG_DEFAULT_VARIANT`).

The set name and prefix are not here. Core reads both from `resources/assets/svg/config.json`
through `IconsConstants`, which is canonical for the pack's name, prefix, kind, variants and
categories; the copies this file used to carry were read by nothing and are gone.

## Kinds in `config.json`

`resources/assets/svg/config.json` declares what this pack's SVGs are, `icon` or `illustration`. Core decides
each item's kind from the first row that gives one. An item path is the file's path under `files/` without
`.svg` (`4x3/us`):

| Row | Key | Notes |
|---|---|---|
| 1 | the host's `kinds.overrides` | the app developer's, in core's config; wins over the pack |
| 2 | `metadata.data.items.<item path>.kind` | one item; the value is an object so it can grow |
| 3 | `metadata.data.kinds.rules[]` | `{ "match": "<glob>", "kind": "..." }`, ordered, **first match wins** |
| 4 | `metadata.data.categories.<slug>.kind` | every item in that first-level folder |
| 5 | `package.kind` | the pack's default |
| 6 | | `icon` |

Globs match the whole item path and are case-sensitive: `*` is any run of characters except `/`, `?` is one
character, and `**` is whole segments. A pack is "mixed" when its items resolve to both kinds; nothing declares
that, and there is no `"kind": "mixed"`. A value that names no kind is ignored by core and reported by
`ichava::ichava-core.info doctor`. See core's [kinds guide](https://github.com/ichava/core/blob/main/docs/kinds.md).

This pack declares `package.kind: icon` and nothing else: flags are multicolour icons, not illustrations. No category, `items` or `kinds.rules` entry sets a kind, so every item resolves `icon` from row 5.

`SvgKindTest` pins this against `config.json` and against core's resolver, so a typo here fails a test instead of
quietly filing SVGs as icons.

## What is not here

Cache, queue, database, logging, security and the `ICHAVA_*` environment surface are **core's**, and
apply to every pack at once. They are documented in core's
[configuration guide](https://github.com/ichava/core/blob/main/docs/configuration.md) and [environment variables](https://github.com/ichava/core/blob/main/docs/environment.md).

A value set here cannot change how core seeds, caches or sanitises; that is the point of the split.

---

[← Docs index](../README.md#documentation)
