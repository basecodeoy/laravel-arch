<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Nova;

use BaseCodeOy\Arch\Model\AbstractData;

final class Filter extends AbstractData
{
    public function __construct(
        private readonly string $name,
        private readonly string $type,
    ) {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function type(): string
    {
        return $this->type;
    }

    public function boolean(): bool
    {
        return $this->type === 'boolean';
    }

    public function date(): bool
    {
        return $this->type === 'date';
    }

    protected function accessor(): string
    {
        return 'nova.filters';
    }
}
