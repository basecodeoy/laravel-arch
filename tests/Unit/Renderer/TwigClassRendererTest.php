<?php

declare(strict_types=1);

namespace Tests\Unit\Renderer;

use BaseCodeOy\Arch\Renderer\TwigClassRenderer;
use Illuminate\Support\Facades\Config;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should render a class stub', function (): void {
    Config::set('arch.stub_path', __DIR__.'/stubs');

    $result = (new TwigClassRenderer())->render('hello', [
        'name' => 'John Doe',
        'age' => 30,
    ]);

    assertMatchesSnapshot($result);
});
