<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Listener extends AbstractData
{
    public function __construct(private readonly string $name)
    {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }
}
