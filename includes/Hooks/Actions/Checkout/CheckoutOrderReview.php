<?php

namespace Includes\Hooks\Actions\Checkout;

use WpPlugin\Core\HookTypes\Action;
use Jamesckemp\WpSettingsFramework;

class CheckoutOrderReview extends Action {
    
    public $hook = "woocommerce_checkout_update_order_review";
    
    public $priority = 10;

    public $accepted_args = 1;

    public function boot( $post_data ) {
        $data = array();
		parse_str( $post_data, $data );

		if ( isset( $data['woo_dwc'] ) ) {
			WC()->session->set( 'woo_dwc', 'yes' );
		} else {
			WC()->session->set( 'woo_dwc', 'no' );
		}
    }
    
}