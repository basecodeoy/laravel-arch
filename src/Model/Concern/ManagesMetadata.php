<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model\Concern;

use Illuminate\Support\Arr;

trait ManagesMetadata
{
    private array $metadata = [];

    public function metadata(): array
    {
        return $this->metadata;
    }

    public function getMetadata(string $key, mixed $defaultValue = null): mixed
    {
        return Arr::get($this->metadata, $key, $defaultValue);
    }

    public function setMetadata(string $key, mixed $value): void
    {
        Arr::set($this->metadata, $key, $value);
    }

    public function hasMetadata(string $key): bool
    {
        return isset($this->metadata[$key]);
    }

    public function missingMetadata(string $key): bool
    {
        return !$this->hasMetadata($key);
    }

    public function forgetMetadata(string $key): void
    {
        unset($this->metadata[$key]);
    }

    public function flushMetadata(): void
    {
        $this->metadata = [];
    }

    public function mergeMetadata(array $metadata): void
    {
        $this->metadata = \array_merge($this->metadata, $metadata);
    }

    public function replaceMetadata(array $metadata): void
    {
        $this->metadata = $metadata;
    }
}
