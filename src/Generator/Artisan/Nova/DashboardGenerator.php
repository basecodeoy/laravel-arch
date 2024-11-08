<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeDashboardCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class DashboardGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Dashboard
         */
        foreach (Tree::get('nova.dashboards') as $dashboard) {
            $artisan = new MakeDashboardCommand();
            $artisan->name($dashboard->name());
            $artisan->handle();
        }
    }
}
