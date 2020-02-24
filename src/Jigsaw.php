<?php

declare(strict_types=1);

namespace jwwisniewski\Jigsaw\Core;

use Illuminate\Support\Collection;

class Jigsaw
{
    /**
     * @var array
     */
    public $instances = [];

    /**
     * @var Collection
     */
    public $modules;

    public function __construct()
    {
        $this->modules = new Collection();
    }

    public function getInstances($class = null): Collection
    {
        if ($class === null) {
            return Instance::all();
        }

        return Instance::where('module', '=', $class)->get();
    }

    public function getRunnableInstances($class = null): Collection
    {
        return $this->getInstances($class)->mapWithKeys(static function (Instance $instance) {
            return [$instance->id => $instance->title];
        });
    }

    public function getRegisteredModules(): Collection
    {
        return $this->modules;
    }

    public function getInstatniableModules(): Collection
    {
        return $this->modules->filter(function (Module $module) {
            return $module->instantiable === true;
        })->mapWithKeys(static function (Module $module) {
            return [$module->class => $module->name];
        });
    }

    public function registerModule($class, $name, $routeName, $instantiable)
    {
        $this->modules->add(new Module(
            $class,
            $name,
            $routeName,
            $instantiable
        ));
    }
}
