<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Cast;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class CastTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['casts'])) {
            return [];
        }

        $casts = [];

        foreach ($tokens['casts'] as $key => $value) {
            $casts[] = $this->populateMetadata(
                new Cast(
                    name: \is_numeric($key) ? $value : $key,
                    inbound: Arr::get($value, 'inbound', false),
                ),
                $value,
            );
        }

        return [
            'casts' => $casts,
        ];
    }
}
