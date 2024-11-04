<?php

declare(strict_types=1);

namespace Tests\Unit\Parser;

use BaseCodeOy\Arch\Model\Manifest;
use BaseCodeOy\Arch\Parser\YamlParser;

it('should parse a YAML file', function (): void {
    $result = (new YamlParser())->parse(__DIR__.'/fixtures/manifest.yaml');

    expect($result)->toBeInstanceOf(Manifest::class);
    expect($result->arch())->toBeString();
    expect($result->definitions())->toBeArray();
});
