<?php
$plugin_name = plugin_name();
$plugin_name_slug = slug($plugin_name);

$wpsf_settings['tabs'] = array(
    array(
        'id'    => 'general',
        'title' => esc_html__( 'General', $plugin_name_slug ),
    ),
);

$wpsf_settings['sections'] = array(
    array(
        'tab_id'        => 'general',
        'section_id'    => 'product',
        'section_title' => 'Product',
        'section_order' => 10,
        'fields'        => array(
            array(
                'id'      => 'enable',
                'title'   => 'Display "' . $plugin_name . ' available" on product page?',
                'desc'    => '',
                'type'    => 'checkbox',
                'default' => '1',
            ),
            array(
                'id'      => 'label',
                'title'   => 'Label',
                'desc'    => '',
                'type'    => 'text',
                'default' => $plugin_name . ' available',
            ),
            array(
                'id'      => 'description',
                'title'   => 'Description',
                'desc'    => '',
                'type'    => 'textarea',
                'default' => $plugin_name . ' is a complimentary service, where our delivery partner will leave your package outside the door on a clean surface. Simply choose contactless delivery option at checkout.',
            ),
            array(
                'id'      => 'location',
                'title'   => 'Location',
                'desc'    => 'Where to display "' . $plugin_name . ' available" on product page?',
                'type'    => 'select',
                'default' => 'woocommerce_after_add_to_cart_button',
                'choices' => array(
                    'woocommerce_before_add_to_cart_form' => 'Above Add to Cart button',
                    'woocommerce_product_thumbnails' => 'Below Product images',
                    'woocommerce_after_add_to_cart_button' => 'After Add to Cart button',
                    'woocommerce_product_meta_end'   => 'After Product Meta',
                    'woocommerce_after_single_product_summary' => 'After Product Summary',
                ),
            ),
            array(
                'id'      => 'text_decoration',
                'title'   => 'Text Decoration',
                'desc'    => '',
                'type'    => 'select',
                'default' => 'italic',
                'choices' => array(
                    'bold'   => 'Bold',
                    'italic' => 'Italic',
                    'none'   => 'None',
                ),
            ),
            array(
                'id'      => 'text_color',
                'title'   => 'Text Color',
                'desc'    => '',
                'type'    => 'color',
                'default' => '#666',
            ),
        ),
    ),
    array(
        'tab_id'        => 'general',
        'section_id'    => 'checkout',
        'section_title' => 'Checkout Page',
        'section_order' => 10,
        'fields'        => array(
            array(
                'id'      => 'label',
                'title'   => 'Label',
                'desc'    => '',
                'type'    => 'text',
                'default' => $plugin_name,
            ),
            array(
                'id'      => 'description',
                'title'   => 'Description',
                'desc'    => '',
                'type'    => 'textarea',
                'default' => $plugin_name . ' is a complimentary service, where our delivery partner will leave your package outside the door on a clean surface. Mention the place where you want the package to be left in the order notes.',
            ),
            array(
                'id'      => 'location',
                'title'   => 'Location',
                'desc'    => 'Where to show the ' . $plugin_name . ' button?',
                'type'    => 'select',
                'default' => 'woocommerce_review_order_before_submit',
                'choices' => array(
                    'woocommerce_before_order_notes' => 'Before Order Notes',
                    'woocommerce_after_order_notes'  => 'After Order Notes',
                    'woocommerce_review_order_before_submit' => 'Before Submit Button',
                    'woocommerce_review_order_after_submit' => 'After Submit Button',
                ),
            ),
            array(
                'id'      => 'disable_payment_methods',
                'title'   => 'Disable Payment Methods',
                'type'    => 'checkboxes',
                'default' => array(),
                //'choices' => Wcd_Checkout::get_payment_gateways(),
            ),
            array(
                'id'      => 'button_alignment',
                'title'   => 'Button Alignment',
                'desc'    => '',
                'type'    => 'select',
                'default' => 'left',
                'choices' => array(
                    'left'   => 'Left',
                    'center' => 'Center',
                    'right'  => 'Right',
                ),
            ),
            array(
                'id'      => 'text_decoration',
                'title'   => 'Text Decoration',
                'desc'    => '',
                'type'    => 'select',
                'default' => 'italic',
                'choices' => array(
                    'bold'   => 'Bold',
                    'italic' => 'Italic',
                    'none'   => 'None',
                ),
            ),
            array(
                'id'      => 'text_color',
                'title'   => 'Text Color',
                'desc'    => '',
                'type'    => 'color',
                'default' => '#666',
            ),
            array(
                'id'      => 'button_color',
                'title'   => 'Button Color',
                'desc'    => '',
                'type'    => 'color',
                'default' => '#3196F3',
            ),
        ),
    ),
);

return $wpsf_settings;