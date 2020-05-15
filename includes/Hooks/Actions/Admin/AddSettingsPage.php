<?php

namespace Includes\Hooks\Actions\Admin;

use WpPlugin\Core\HookTypes\Action;
use Jamesckemp\WpSettingsFramework;

class AddSettingsPage extends Action {
    
    public $hook = "admin_menu";
    
    public $priority = 20;

    public function boot() {
        $plugin_name = plugin_name();
        $plugin_name_slug = slug($plugin_name);

        $wpsf = new WpSettingsFramework( config_path('admin.php'), 'admin' );

        $wpsf->add_settings_page(
			array(
				'parent_slug' => 'woocommerce',
				'page_title'  => esc_html__( $plugin_name, $plugin_name_slug ),
				'menu_title'  => esc_html__( $plugin_name, $plugin_name_slug ),
				'capability'  => 'manage_woocommerce',
			)
        );
    }
    
}