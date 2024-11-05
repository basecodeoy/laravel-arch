<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeJobCommand extends AbstractCommand
{
    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    public function sync(): static
    {
        $this->option('sync');

        return $this;
    }

    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:job';
    }
}
