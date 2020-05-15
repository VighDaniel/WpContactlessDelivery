<?php

namespace Includes\Hooks\Filters\Admin;

use WpPlugin\Core\HookTypes\Filter;

class AddOrderColumn extends Filter {
    
    public $hook = "manage_edit-shop_order_columns";

    public $priority = 10;

    public $accepted_args = 1;

    public function boot( $columns ) {
        $plugin_name = plugin_name();
        $plugin_name_slug = slug($plugin_name);

        $columns['woo_dwc'] = esc_html__( 'Contactless', $plugin_name_slug );
		return $columns;
    }
    
}