<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Model\Notification;
use BaseCodeOy\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final readonly class NotifyStatement implements StatementInterface
{
    public function __construct(
        private string $recipient,
        private string $mailable,
        private array $parameters,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        Tree::add('notifications', new Notification(name: $statement[1]));

        return new self(
            mailable: $statement[1],
            recipient: $statement[0],
            parameters: Arr::mapValueToProperty($statement['with'] ?? []),
        );
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            '$%s->notify(new %s(%s));',
            \str_replace('.', '->', $this->recipient),
            $this->mailable,
            Arr::propertiesToVariableList($this->parameters),
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/notification/test/notification', [
            'class' => $this->mailable,
            'recipient' => $this->recipient,
        ]);
    }

    public function imports(array $context = []): array
    {
        return [];
    }

    public function traits(array $context = []): array
    {
        return [];
    }
}
