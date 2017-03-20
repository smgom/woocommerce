<?php
/*
Plugin Name: Payfort (Start)
Description: Payfort makes it really easy to start accepting online payments (credit &amp; debit cards) in the Middle East. Sign up is instant, at https://start.payfort.com/
Version: 0.1.10
Plugin URI: https://start.payfort.com
Author: Payfort
Author URI: https://start.payfort.com
License: Under GPL2
*/

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
    /* Enable automatic updates to this plugin
      ----------------------------------------------------------- */
add_filter('auto_update_plugin', '__return_true');
/* Add a custom payment class to WC
  ------------------------------------------------------------ */
add_action('plugins_loaded', 'woo_payfort_init', 10);

function woo_payfort_init() {

    define('WOO_PAYFORT_DIR', plugin_dir_path(__FILE__));

    require_once(WOO_PAYFORT_DIR.'/inc/main.php');
    /**
     * Add the gateway to WooCommerce
     * */
    function add_payfort_gateway($methods) {
        $methods[] = 'WC_Gateway_Payfort';
        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'add_payfort_gateway');
}
