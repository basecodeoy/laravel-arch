<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeMiddlewareCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class MiddlewareGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Middleware
         */
        foreach (Tree::get('middleware') as $middleware) {
            $artisan = new MakeMiddlewareCommand();
            $artisan->name($middleware->name());
            $artisan->handle();
        }
    }
}
