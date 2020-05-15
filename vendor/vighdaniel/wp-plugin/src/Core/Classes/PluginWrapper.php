<?php

namespace WpPlugin\Core\Classes;

class PluginWrapper {
 
    protected static $instance;

    protected $bindings = [];

    protected $instances = [];

    protected $aliases = [];
    
    public function __get(string $key)
    {
        return $this[$key];
    }
        
    public function __set(string $key, string $value)
    {
        $this[$key] = $value;
    }
    
    public function make($class, array $parameters = [])
    {
        return $this->resolve($class, $parameters);
    }

    protected function resolve($class, $parameters = [])
    {
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        return $object;
    }

    public static function setInstance($wrapper = null)
    {
        return static::$instance = $wrapper;
    }

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    public function instance($abstract, $instance)
    {
        $this->removeAbstractAlias($abstract);

        $isBound = $this->bound($abstract);

        unset($this->aliases[$abstract]);

        $this->instances[$abstract] = $instance;

        if ($isBound) {
            $this->rebound($abstract);
        }

        return $instance;
    }

    protected function removeAbstractAlias($searched)
    {
        if (! isset($this->aliases[$searched])) {
            return;
        }

        foreach ($this->abstractAliases as $abstract => $aliases) {
            foreach ($aliases as $index => $alias) {
                if ($alias == $searched) {
                    unset($this->abstractAliases[$abstract][$index]);
                }
            }
        }
    }

    public function bound($abstract)
    {
        return isset($this->bindings[$abstract]) ||
               isset($this->instances[$abstract]) ||
               $this->isAlias($abstract);
    }

    public function isAlias($name)
    {
        return isset($this->aliases[$name]);
    }

    public function getAlias($abstract)
    {
        if (! isset($this->aliases[$abstract])) {
            return $abstract;
        }

        return $this->getAlias($this->aliases[$abstract]);
    }

    protected function rebound($abstract)
    {
        $instance = $this->make($abstract);

        foreach ($this->getReboundCallbacks($abstract) as $callback) {
            call_user_func($callback, $this, $instance);
        }
    }

    protected function getReboundCallbacks($abstract)
    {
        return $this->reboundCallbacks[$abstract] ?? [];
    }
}