<?php

namespace Includes\Hooks\Filters\Admin;

use WpPlugin\Core\HookTypes\Filter;

class AddOrderContent extends Filter {
    
    public $hook = "manage_shop_order_posts_custom_column";

    public $priority = 10;

    public $accepted_args = 2;

    public function boot( $column, $post_id ) {
        if ( 'woo_dwc' == $column ) {
			$contactless = get_post_meta( $post_id, 'woo_dwc', true );
			echo $contactless ? 'Yes' : 'No';
		}
    }
    
}