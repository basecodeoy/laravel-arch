<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

use Illuminate\Support\Str;

final class Channel extends AbstractData
{
    public function __construct(private readonly string $name)
    {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function nameWithSuffix(): string
    {
        return Str::suffix($this->name(), 'Channel');
    }
}
