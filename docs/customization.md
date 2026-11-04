# Customisation

*How-to guide.*

Flags are multi-colour artwork, not monochrome glyphs. That changes what is worth customising
compared with a stroke-based pack.

## Sizing

The pack ships no `width`/`height` on the root element: `ichava/core` strips them at read time
when a `viewBox` is present, so the component controls the size. Set it with a class:

```blade
<x-ichava::icon name="ichava/icon-sets-flag::4x3/ke" class="w-8" />
```

Give a `1x1` flag a fixed box, since a square crop in a landscape container letterboxes:

```blade
<x-ichava::icon name="ichava/icon-sets-flag::1x1/ke" class="w-8 h-8 rounded-full object-cover" />
```

## Colour

**`currentColor` does nothing here.** Every flag carries its own fills, which is the point. Setting
a colour on the component is a no-op for the flag body; it only affects anything the artwork left
unpainted, which for this pack is nothing.

To desaturate or tint, use CSS filters rather than fighting the fills:

```blade
<x-ichava::icon name="ichava/icon-sets-flag::4x3/ke" class="w-8 grayscale opacity-60" />
```

## Rounded and bordered flags

A flag's artwork runs to the edge of its `viewBox`, so a border belongs on a wrapper, not on the
SVG:

```blade
<span class="inline-block overflow-hidden rounded ring-1 ring-black/10">
    <x-ichava::icon name="ichava/icon-sets-flag::4x3/ke" class="w-8 block" />
</span>
```

## What the sanitiser does to a flag

126 of these flags render through `<use>` referencing a `<defs>` entry in the same file. That works:
`ichava/core` allows same-document fragment references and namespaces every id per file, so two
flags on one page cannot capture each other's definitions. Nothing in this pack is degraded by the
sanitiser.

---

[← Docs index](../README.md#documentation)
