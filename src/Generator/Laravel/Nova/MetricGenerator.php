<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Nova\Metric;

final class MetricGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Metric
         */
        foreach (Tree::get('nova.metrics') as $metric) {
            $this->createFile(
                $metric->name(),
                $this->renderClass($metric, $this->stub($metric), [
                    'class' => $metric->name(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'nova.metrics';
    }

    private function stub(Metric $metric): string
    {
        return match ($metric->type()) {
            'partition' => 'laravel/nova/metric/partition',
            'progress' => 'laravel/nova/metric/progress',
            'table' => 'laravel/nova/metric/table',
            'trend' => 'laravel/nova/metric/trend',
            'value' => 'laravel/nova/metric/value',
            default => throw new \InvalidArgumentException('Unknown metric type: '.$metric->type()),
        };
    }
}
