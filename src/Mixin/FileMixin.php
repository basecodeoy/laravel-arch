<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Mixin;

use BaseCodeOy\Arch\Path;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * @mixin File
 */
final class FileMixin
{
    public function stub(): Closure
    {
        return function (string $path): string {
            /** @var File $this */
            return $this->get(Path::stub($path));
        };
    }
}
