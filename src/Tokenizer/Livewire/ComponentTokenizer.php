<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Livewire;

use BombenProdukt\Arch\Model\Livewire;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class ComponentTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['livewire'])) {
            return [];
        }

        $components = [];

        foreach ($tokens['livewire'] as $key => $value) {
            $components[] = $this->populateMetadata(
                new Livewire(
                    name: \is_numeric($key) ? $value : $key,
                    view: Arr::get($value, 'view'),
                    inline: Arr::get($value, 'inline', false),
                ),
                $value,
            );
        }

        return [
            'livewire' => [
                'components' => $components,
            ],
        ];
    }
}
