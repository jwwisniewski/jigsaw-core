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

    public function getInstances(): array
    {
        return $this->instances;
    }

    public function setInstances(array $instances): Jigsaw
    {
        $this->instances = $instances;

        return $this;
    }

    public function getRegisteredModules(): Collection
    {
        return $this->modules;
    }

    public function registerModule($class)
    {
        $this->modules->add($class);
    }
}