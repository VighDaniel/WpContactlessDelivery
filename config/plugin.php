<?php

return [
    'name' => 'Wordpress Delivery Without Contact',

    'hooks' => [
        'actions' => [
            'Includes\Hooks\Actions\Admin\AddSettingsPage',
            'Includes\Hooks\Actions\Admin\OrderData',
            'Includes\Hooks\Actions\Checkout\CheckoutOrderReview',
            'Includes\Hooks\Actions\Checkout\CheckoutCreateOrder',
            'Includes\Hooks\Actions\Checkout\ShowDwcButton',
        ],
    
        'filters' => [
            'Includes\Hooks\Filters\Admin\Settings',
            'Includes\Hooks\Filters\Admin\AddOrderColumn',
            'Includes\Hooks\Filters\Admin\AddOrderContent',
        ]
    ]
];