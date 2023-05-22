<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Livewire;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ComponentGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        foreach (Tree::get('livewire.components') as $component) {
            $this->createFile(
                $component->name(),
                $this->renderClass($component, $component->inline() ? 'livewire/component/inline' : 'livewire/component/component', [
                    'class' => $component->name(),
                    'view' => $component->view(),
                ]),
            );
        }

        $this->persist();
    }

    protected function accessor(): string
    {
        return 'livewire.components';
    }
}
