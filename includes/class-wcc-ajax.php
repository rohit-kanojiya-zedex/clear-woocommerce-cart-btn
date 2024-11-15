<?php
//exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('WccAjax')) {
    class WccAjax
    {
        public static ?WccAjax $instance = null;

        public static function getInstance(): WccAjax
        {
            if (is_null(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct()
        {
            add_action( 'wp_ajax_wccClearCart', [$this,'wccClearCartItems'] );
            add_action( 'wp_ajax_nopriv_wccClearCart', [$this,'wccClearCartItems']);
        }

        public function wccClearCartItems() {
                if ( is_user_logged_in() ) {
                WC()->cart->empty_cart();
                wp_send_json_success( array('message' => 'Cart cleared!') );
            } else {
                wp_send_json_error( array( 'message' => 'You must be logged in to clear the cart.' ) );
            }
        }
    }
}