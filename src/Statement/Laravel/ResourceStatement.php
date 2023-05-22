<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement\Laravel;

use BombenProdukt\Arch\Contract\StatementInterface;
use BombenProdukt\Arch\Exception\WrongStatementHandlerException;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Model\Resource;
use Illuminate\Support\Str;

final readonly class ResourceStatement implements StatementInterface
{
    public function __construct(
        private string $name,
        private string $reference,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        if (isset($statement[1])) {
            throw new WrongStatementHandlerException();
        }

        Tree::add('resources', new Resource(name: $statement[0]));

        return new self($statement[0], $statement[0]);
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            'return new %sResource($%s);',
            Str::studly($this->name),
            Str::camel($this->reference),
        );
    }

    public function test(array $context = []): string
    {
        return '';
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
