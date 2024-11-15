<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Wcc' ) ) {
    class Wcc{
        public static ?Wcc $instance = null;
        public WccClearCart $wccClearCart;
        public WccAjax $wccAjax;

        public static function getInstance(): Wcc {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            add_action('plugins_loaded', array($this, 'initSetup'));
        }

        public function initSetup() {
            $this->includes();
            $this->init();
        }

        public function includes() {
            require_once WCC_INCLUDES . 'class-wcc-clear-cart.php';
            require_once WCC_INCLUDES . 'class-wcc-ajax.php';
        }

        public function init() {
            $this->wccClearCart = WccClearCart::getInstance();
            $this->wccAjax = WccAjax::getInstance();
        }
    }
}
