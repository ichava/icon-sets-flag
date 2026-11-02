<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsFlag\View\Components;

use Simtabi\Laranail\Ichava\IconSetsFlag\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\View\Components\IconComponent as BaseIconComponent;

/**
 * Blade component for the country-flag pack.
 *
 * Usage:
 *
 *   {{-- Pack component with an explicit ratio --}}
 *   <x-icon-sets-flag-icon name="us" variant="4x3" />
 *
 *   {{-- Explicit ratio --}}
 *   <x-icon-sets-flag-icon name="us" variant="1x1" />
 *
 *   {{-- Through the generic engine --}}
 *   <x-ichava::icon name="ichava/icon-sets-flag::4x3/us" />
 */
class IconComponent extends BaseIconComponent
{
    protected function getIconSet(): string
    {
        return IconsConstants::getPackageName();
    }

    protected function getVendorPackage(): string
    {
        return IconsConstants::getVendorPackage();
    }
}
