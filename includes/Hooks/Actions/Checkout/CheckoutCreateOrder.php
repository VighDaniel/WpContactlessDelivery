<?php

namespace Includes\Hooks\Actions\Checkout;

use WpPlugin\Core\HookTypes\Action;
use Jamesckemp\WpSettingsFramework;

class CheckoutCreateOrder extends Action {
    
    public $hook = "woocommerce_checkout_create_order";
    
    public $priority = 20;

    public $accepted_args = 2;

    public function boot( $order, $data ) {
        if ( 'yes' === WC()->session->get( 'woo_dwc' ) ) {
			$order->update_meta_data( 'woo_dwc', 'yes' );
		}
    }
    
}