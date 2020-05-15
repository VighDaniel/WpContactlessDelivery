<?php

namespace WpPlugin\Core\Classes;

use Exception;
use ReflectionClass;

class Hooks {
        
    /**
     * types
     *
     * @var array
     */
    protected $types = [ "all", "actions", "filters" ];

    protected $hooks_enabled = [];
    
    public function __construct()
    {
        $config = config('plugin.hooks');
        $this->setHooksEnabled($config);
    }
    
    /**
     * setHooksEnabled
     *
     * @param  array $config
     * @return void
     */
    protected function setHooksEnabled(array $config = [])
    {
        foreach($config as $typeKey => $type) {
            foreach($type as $alias) {
                $this->hooks_enabled[] = new $alias();
            }
        }
    }

    public function bootHooks()
    {
        foreach($this->hooks_enabled as $hook) {
            $add_hook = "add_" . $hook->type;
            
            $add_hook($hook->hook, array( $hook, 'boot' ), $hook->priority, $hook->accepted_args);
        }
    }

}  