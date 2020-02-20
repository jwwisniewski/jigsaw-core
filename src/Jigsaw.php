<?php
declare(strict_types=1);

namespace jwwisniewski\Jigsaw\Core\Traits;

class Jigsaw
{
    /**
     * @var array
     */
    public $instances = [];

    /**
     * @var array
     */
    public $modules = [];

    public function getInstances(): array
    {
        return $this->instances;
    }

    public function setInstances(array $instances): Jigsaw
    {
        $this->instances = $instances;

        return $this;
    }

    public function getModules(): array
    {
        return $this->modules;
    }

    public function setModules(array $modules): Jigsaw
    {
        $this->modules = $modules;

        return $this;
    }
}