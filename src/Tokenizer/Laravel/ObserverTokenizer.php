<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Observer;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class ObserverTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['observers'])) {
            return [];
        }

        $observers = [];

        foreach ($tokens['observers'] as $key => $value) {
            $observers[] = $this->populateMetadata(
                new Observer(
                    name: \is_numeric($key) ? $value : $key,
                    plain: Arr::get($value, 'plain', false),
                ),
                $value,
            );
        }

        return [
            'observers' => $observers,
        ];
    }
}
