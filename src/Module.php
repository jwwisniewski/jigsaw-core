<?php

declare(strict_types=1);

namespace jwwisniewski\Jigsaw\Core;

class Module
{
    public const INSTANTIABLE = true;
    public const NOT_INSTANTIABLE = false;

    /**
     * @var string
     */
    public $class;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $routeName;

    /**
     * @var bool
     */
    public $instantiable;

    /**
     * Module constructor.
     * @param string $class
     * @param string $name
     * @param string $routeName
     */
    public function __construct(string $class, string $name, string $routeName, bool $instantiable = false)
    {
        $this->class = $class;
        $this->name = trans('jigsaw-'.$name.'::admin.module-title');
        $this->routeName = $routeName;
        $this->instantiable = $instantiable;
    }
}
