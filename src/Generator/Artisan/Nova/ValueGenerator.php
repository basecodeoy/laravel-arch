<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeValueCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ValueGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Metric
         */
        foreach (Tree::get('nova.value') as $metric) {
            if (!$metric->value()) {
                continue;
            }

            $artisan = new MakeValueCommand();
            $artisan->name($metric->name());
            $artisan->handle();
        }
    }
}
