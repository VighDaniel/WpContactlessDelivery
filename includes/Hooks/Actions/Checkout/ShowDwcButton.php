<?php

namespace Includes\Hooks\Actions\Checkout;

use WpPlugin\Core\HookTypes\Action;
use Jamesckemp\WpSettingsFramework;

class ShowDwcButton extends Action {
    
    public $hook = "woocommerce_checkout_update_order_review";

    public function boot() {
        echo "<button>ASDASDASDASD</button>";
    }
    
}