<?php
/**
 * Plugin Name: WooCommerce Clear Cart
 * Description: A custom plugin designed to add a one-click button functionality for clearing the WooCommerce cart. Perfect for enhancing the shopping experience by allowing customers to easily remove all items from their cart with a single click.
 * Version: 1.0.2
 * Author: StableWp
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: woocommerce-clear-cart
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the plugin directory.
if ( ! defined( 'WCC_CUSTOM_DIR' ) ) {
    define( 'WCC_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
    define( 'WCC_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
    define( 'WCC_VERSION', '1.0.2' );
    define( 'WCC_INCLUDES', WCC_PLUGIN_DIR . '/includes/' );
    define( 'WCC_ASSETS', WCC_PLUGIN_URL . '/assets/' );
    define( 'WCC_JS', WCC_ASSETS . 'js/' );
    define( 'WCC_CSS', WCC_ASSETS . 'css/' );
}

if ( ! class_exists('Wcc')){
    include_once WCC_INCLUDES . 'class-wcc.php';
}

function WCC(): Wcc {
    return Wcc::getInstance();
}

$GLOBALS['wcc'] = WCC();