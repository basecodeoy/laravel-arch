<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use BombenProdukt\Arch\Contract\FileRendererInterface;
use Illuminate\Support\Facades\File;

final readonly class StubFileRenderer implements FileRendererInterface
{
    public function render(string $path, array $context): string
    {
        return (new StubStringRenderer())->render(File::stub("{$path}.stub"), $context);
    }
}
