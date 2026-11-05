<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsFlag\Providers;

use Simtabi\Laranail\Ichava\Providers\IconPackServiceProvider;
use Simtabi\Laranail\Ichava\IconSetsFlag\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsFlag\View\Components\IconComponent;

/**
 * Registers the country-flag pack with the Ichava registry.
 *
 * Ships 271 country flags in two aspect ratios (4x3 and 1x1), sourced
 * from lipis/flag-icons. The aspect ratio is the variant axis -- pick
 * one at render time.
 */
class IconsServiceProvider extends IconPackServiceProvider
{
    protected function constantsClass(): string
    {
        return IconsConstants::class;
    }

    protected function componentClass(): string
    {
        return IconComponent::class;
    }
}
