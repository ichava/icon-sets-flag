<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\IconSetsFlag\Enums\Variant;
use Simtabi\Laranail\Ichava\IconSetsFlag\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsFlag\Providers\IconsServiceProvider;

it(description: 'boots the provider without error', closure: function () {
    $providers = array_keys($this->app->getLoadedProviders());

    expect($providers)->toContain(IconsServiceProvider::class);
});

it(description: 'resolves constants from config json', closure: function () {
    expect(IconsConstants::getVendorPackage())->toBe('ichava/icon-sets-flag')
        ->and(IconsConstants::getTitle())->toBe('Flag Icons')
        ->and(IconsConstants::getPrefix())->toBe('flag');
});

it(description: 'uses the config prefix in variant enum class helpers', closure: function () {
    expect(Variant::RATIO_4X3->getClass())->toBe('flag-4x3')
        ->and(Variant::RATIO_1X1->getClass())->toBe('flag-1x1');
});

it(description: 'defaults to the 4x3 variant', closure: function () {
    expect(Variant::default())->toBe(Variant::RATIO_4X3)
        ->and(Variant::RATIO_4X3->isDefault())->toBeTrue()
        ->and(Variant::RATIO_1X1->isDefault())->toBeFalse();
});

it(description: 'picks up the package in the icon registry', closure: function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->isRegistered('ichava/icon-sets-flag'))->toBeTrue(
        'IconRegistry should have ichava/icon-sets-flag registered after boot.',
    );
});
