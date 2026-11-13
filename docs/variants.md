# Variants

*Reference.*

Every flag ships in two aspect ratios. The Ichava integration treats them as separate icon
categories under the same package, addressed by sub-path.

| Variant | Path prefix | Shape | Files |
|---|---|---|---|
| `4x3` | `4x3/<code>` | 4:3 landscape, the conventional flag proportion | 271 |
| `1x1` | `1x1/<code>` | square, cropped to the flag's centre, for avatars and dense grids | 271 |

Counted with `ls resources/assets/svg/files/<variant>/*.svg | wc -l`.

## Addressing a flag

```blade
<x-ichava::icon name="ichava/icon-sets-flag::4x3/ke" class="w-8" />
<x-ichava::icon name="ichava/icon-sets-flag::1x1/ke" class="w-8 rounded-full" />
```

The dot form resolves identically: `ichava/icon-sets-flag::4x3.ke`.

## There is no default variant

Unlike `tabler-icons`, where `outline` is implied, a flag has no sensible default: a square crop
and a landscape flag are different images, not two styles of one. Name the ratio every time.

## Codes

Files are named by lowercase ISO 3166-1 alpha-2 code: `ke`, `gb`, `us`. A handful of subdivisions
and non-sovereign flags use the alpha-2 code their upstream assigns; see
[the upstream list](https://github.com/lipis/flag-icons#flags) for the authoritative naming.

---

[← Docs index](../README.md#documentation)
