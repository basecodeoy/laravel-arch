<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel\Nova;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeAssetCommand extends AbstractCommand
{
    protected function signature(): string
    {
        return 'nova:asset';
    }
}
