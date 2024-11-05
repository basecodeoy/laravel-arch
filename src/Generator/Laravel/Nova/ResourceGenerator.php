<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel\Nova;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ResourceGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Resource
         */
        foreach (Tree::get('nova.resources') as $resource) {
            $this->createFile(
                $resource->name(),
                $this->renderClass($resource, 'laravel/nova/resource', [
                    'class' => $resource->name(),
                    'namespacedModel' => Str::modelNamespace($resource->name()),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'nova.resources';
    }
}
