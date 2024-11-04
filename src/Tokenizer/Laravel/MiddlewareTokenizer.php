<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Middleware;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class MiddlewareTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['middleware'])) {
            return [];
        }

        $middleware = [];

        foreach ($tokens['middleware'] as $key => $value) {
            $middleware[] = $this->populateMetadata(
                new Middleware(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'middleware' => $middleware,
        ];
    }
}
