<?php

namespace Includes\Hooks\Actions\Admin;

use WpPlugin\Core\HookTypes\Action;
use Jamesckemp\WpSettingsFramework;

class OrderData extends Action {
    
    public $hook = "woocommerce_admin_order_data_after_billing_address";
    
    public $priority = 20;

    public $accepted_args = 2;

    public function boot() {
        $order_id    = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;
		$contactless = get_post_meta( $order_id, 'woo_dwc', true );
		$contactless = $contactless ? 'Yes' : 'No';
		echo sprintf( '<p><strong>Contactless:</strong> %s</p>', esc_attr( $contactless ) );
    }
    
}