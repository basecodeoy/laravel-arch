<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan\Laravel;

use BombenProdukt\Arch\Artisan\AbstractCommand;

final class MakeControllerCommand extends AbstractCommand
{
    /**
     * Exclude the create and edit methods from the controller
     */
    public function api(): static
    {
        $this->option('api');

        return $this;
    }

    /**
     * Create the class even if the controller already exists
     */
    public function force(): static
    {
        $this->option('force');

        return $this;
    }

    /**
     * Generate a single method, invokable controller class
     */
    public function invokable(): static
    {
        $this->option('invokable');

        return $this;
    }

    /**
     * Generate a resource controller for the given model
     */
    public function model(string $model): static
    {
        $this->option('model', $model);

        return $this;
    }

    /**
     * Generate a nested resource controller class
     */
    public function parent(string $parent): static
    {
        $this->option('parent', $parent);

        return $this;
    }

    /**
     * Generate a resource controller class
     */
    public function resource(): static
    {
        $this->option('resource');

        return $this;
    }

    /**
     * Generate FormRequest classes for store and update
     */
    public function requests(): static
    {
        $this->option('requests');

        return $this;
    }

    /**
     * Generate a singleton resource controller class
     */
    public function singleton(): static
    {
        $this->option('singleton');

        return $this;
    }

    /**
     * Indicate that a singleton resource should be creatable
     */
    public function creatable(): static
    {
        $this->option('creatable');

        return $this;
    }

    /**
     * Generate an accompanying PHPUnit test for the Controller
     */
    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    /**
     * Generate an accompanying Pest test for the Controller
     */
    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:controller';
    }
}
