<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Extension;

use BaseCodeOy\Arch\Contract\ExtensionInterface;
use BaseCodeOy\Arch\Facade\Environment;

final readonly class LivewireExtension implements ExtensionInterface
{
    public function register(array $configuration): void
    {
        foreach ($configuration['generators'] as $generator) {
            Environment::generators()->add($generator);
        }

        foreach ($configuration['tokenizers'] as $tokenizerClassName => $tokenizerConfiguration) {
            if (\is_string($tokenizerClassName)) {
                Environment::tokenizers()->add($tokenizerClassName, $tokenizerConfiguration);
            } else {
                Environment::tokenizers()->add($tokenizerConfiguration);
            }
        }
    }
}
