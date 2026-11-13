<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Flag Icons -- localisable strings
|--------------------------------------------------------------------------
|
| An overlay, not a second source of truth. `name` and `description` are
| deliberately absent: IconRegistry::fromDirectory() reads those from
| resources/assets/svg/config.json, which is canonical. Keeping a copy here
| is what let the two drift apart in the packs that already had a lang file,
| while nothing was reading it. A non-English locale may add them to
| override; `en` must not.
|
| Variant keys match Simtabi\Laranail\Ichava\IconSetsFlag\Enums\Variant.
|
*/

return [
    'variants' => [
        '4x3' => '4:3',
        '1x1' => '1:1',
    ],

    'variant_descriptions' => [
        '4x3' => 'The canonical aspect ratio for most national flags',
        '1x1' => 'Square crop, for round badges, picker grids and favicons',
    ],
];
