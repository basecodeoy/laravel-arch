<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Mail;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class MailTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['mails'])) {
            return [];
        }

        $mails = [];

        foreach ($tokens['mails'] as $key => $value) {
            $mails[] = $this->populateMetadata(
                new Mail(
                    name: \is_numeric($key) ? $value : $key,
                    subject: $value['subject'],
                    view: Arr::get($value, 'view'),
                    shouldQueue: Arr::get($value, 'shouldQueue', false),
                    shouldBeMarkdown: Arr::get($value, 'shouldBeMarkdown', false),
                ),
                $value,
            );
        }

        return [
            'mails' => $mails,
        ];
    }
}
