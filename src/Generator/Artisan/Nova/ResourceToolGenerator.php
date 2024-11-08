<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeResourceToolCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ResourceToolGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Resource
         */
        foreach (Tree::get('nova.resourceTools') as $resourceTool) {
            $artisan = new MakeResourceToolCommand();
            $artisan->name($resourceTool->name());
            $artisan->handle();
        }
    }
}
