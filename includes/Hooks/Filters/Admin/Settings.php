<?php

namespace Includes\Hooks\Filters\Admin;

use WpPlugin\Core\HookTypes\Filter;

class Settings extends Filter {
    
    public $hook = "wpsf_register_settings_admin";

    public function boot() {
        return config('admin');
    }
    
}