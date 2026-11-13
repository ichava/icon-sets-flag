<?php

declare(strict_types=1);

/*
 * The US and UM flags draw their fifty stars as one <marker> holding a white
 * star path, repeated by marker-mid="url(#us-a)" (or #um-a). The SVG policy
 * stripped <marker> until ichava/icon-sets-sync#91, so both flags shipped with
 * an empty canton: 0 white pixels in it against 11,050 upstream. A sync that
 * loses the marker, its star or the reference to it fails here.
 */
it(description: 'keeps the marker that draws the stars', closure: function (string $file, string $id) {
    $path = dirname(__DIR__, 2) . '/resources/assets/svg/files/' . $file;
    $dom = new DOMDocument;

    expect(is_file($path))->toBeTrue($file)
        ->and($dom->load($path))->toBeTrue($file);

    $xpath = new DOMXPath($dom);
    $xpath->registerNamespace('s', 'http://www.w3.org/2000/svg');

    expect($xpath->query("//s:marker[@id='{$id}']")->length)->toBe(1, "{$file}: <marker id=\"{$id}\">")
        ->and($xpath->query("//s:marker[@id='{$id}']/s:path[@fill='#fff' and @d!='']")->length)->toBe(1, "{$file}: white star path")
        ->and($xpath->query("//s:path[@marker-mid='url(#{$id})']")->length)->toBe(1, "{$file}: marker-mid reference");
})->with([
    'us 4x3' => ['4x3/us.svg', 'us-a'],
    'us 1x1' => ['1x1/us.svg', 'us-a'],
    'um 4x3' => ['4x3/um.svg', 'um-a'],
    'um 1x1' => ['1x1/um.svg', 'um-a'],
]);
