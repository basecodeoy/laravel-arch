<?php

declare(strict_types=1);

use BombenProdukt\Arch\Model\GeneratorResult;
use BombenProdukt\Arch\Path;
use BombenProdukt\Arch\Reporter\JsonReporter;
use BombenProdukt\Arch\Reporter\Report;
use Illuminate\Support\Facades\File;

beforeEach(function (): void {
    File::shouldReceive('put')
        ->withSomeOfArgs(Path::arch('report.json'))
        ->andReturn(true);

    $this->generatorResult = new GeneratorResult(
        created: ['created'],
        deleted: ['deleted'],
        updated: ['updated'],
    );

    $this->reporter = new JsonReporter();
});

it('encodes the result', function (): void {
    $actual = $this->reporter->encode($this->generatorResult);

    expect($actual)->toBeInstanceOf(Report::class);
    expect($actual->path())->toBeString();
    expect($actual->contents())->toBeString();
});

it('decodes the report', function (): void {
    $encoded = $this->reporter->encode($this->generatorResult);

    File::shouldReceive('get')
        ->with($encoded->path())
        ->andReturn($encoded->contents());

    $decoded = $this->reporter->decode($encoded->path());

    expect($decoded)->toBeInstanceOf(GeneratorResult::class);
    expect($decoded->created())->toEqual($this->generatorResult->created());
    expect($decoded->deleted())->toEqual($this->generatorResult->deleted());
    expect($decoded->updated())->toEqual($this->generatorResult->updated());
});
