<?php

namespace WpPlugin\Core\Classes;

use WpPlugin\Core\Classes\PluginWrapper;
use WpPlugin\Core\Interfaces\PluginInterface;
use WpPlugin\Core\Classes\Hooks;

class Plugin extends PluginWrapper implements PluginInterface {
    
    const VERSION = "1.0.0";

    protected $namespace;

    protected $basePath;

    public function __construct($basePath = null)
    {
        if ($basePath) $this->setBasePath($basePath);
        $this->registerBaseBindings();

        //Init dependencies
        $this->initDependencies();
    }

    protected function registerBaseBindings()
    {
        static::setInstance($this);

        $this->instance('plugin', $this);
    }

    private function initDependencies() {
        $hooks = new Hooks();
        $hooks->bootHooks();
    }

    public function version()
    {
        return static::VERSION;
    }

    public function setBasePath($basePath)
    {
        $this->basePath = rtrim($basePath, '\/');

        return $this;
    }

    public function path($path = '')
    {
        $includesPath = $this->includesPath ?: $this->basePath . DS . 'includes';

        return $includesPath . ($path ? DS . $path : $path);
    }

    public function basePath($path = '')
    {
        return $this->basePath . ($path ? DS . $path : $path);
    }

    public function configPath($path = '')
    {
        return $this->basePath . DS . 'config' . ($path ? DS . $path : $path);
    }

    public function includesPath($path = '')
    {
        return $this->basePath . DS . 'includes' . ($path ? DS . $path : $path);
    }

    public function bootstrapPath($path = '')
    {
        return $this->basePath . DS . 'bootstrap' . ($path ? DS . $path : $path);
    }

    public function make($class, array $parameters = [])
    {
        $class = $this->getAlias($class);

        return parent::make($class, $parameters);
    }

}