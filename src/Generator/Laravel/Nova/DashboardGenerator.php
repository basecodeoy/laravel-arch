<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

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
            $this->createFile(
                $dashboard->name(),
                $this->renderClass($dashboard, 'laravel/nova/dashboard', [
                    'class' => $dashboard->name(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'nova.dashboards';
    }
}
