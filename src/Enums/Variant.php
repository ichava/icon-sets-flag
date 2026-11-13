<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsFlag\Enums;

use Simtabi\Laranail\Ichava\Traits\HasIconSetVariants;
use Simtabi\Laranail\Ichava\Contracts\IconSetVariantInterface;
use Simtabi\Laranail\Ichava\IconSetsFlag\Constants\IconsConstants;

/**
 * Flag aspect-ratio variant.
 *
 * The lipis/flag-icons project ships each flag in two ratios. We
 * preserve both so callers can pick whichever fits their layout --
 * 4x3 is the canonical aspect ratio for most flags; 1x1 is useful in
 * round badges, picker grids, and favicon-style use.
 */
enum Variant: string implements IconSetVariantInterface
{
    use HasIconSetVariants;

    case RATIO_4X3 = '4x3';
    case RATIO_1X1 = '1x1';

    public function getPath(): string
    {
        return IconsConstants::getSvgPath($this->value);
    }

    private static function getDefaultValue(): string
    {
        return IconsConstants::getDefaultVariant() ?? self::RATIO_4X3->value;
    }

    private static function getClassPrefix(): string
    {
        return IconsConstants::getPrefix();
    }
}
