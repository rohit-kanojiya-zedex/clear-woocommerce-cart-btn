<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists('WccClearCart') ) {
    class WccClearCart{
        public static ?WccClearCart $instance = null;

        public static function getInstance(): WccClearCart {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            add_shortcode( 'wcc_clear_cart_btn', array($this,'wccRemoveALlCartShortcode'));
            add_action('wp_enqueue_scripts', array($this, 'wccRegisterAssets'));
        }
        public function wccRegisterAssets(){
            wp_enqueue_script('wcc-clear-cart-js', WCC_JS . 'wcc-clear-cart-button.js', ['jquery'], WCC_VERSION, true);
            wp_localize_script('wcc-clear-cart-js', 'wccClearItemsAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
            wp_enqueue_style('wcc-clear-cart-css', WCC_CSS . 'wcc-style-btn.css', [], WCC_VERSION, 'all');
        }

        public function wccRemoveALlCartShortcode($atts) {
            $atts = shortcode_atts(
                array(
                    'button_text' => 'Clear Cart',
                    'container_class' => 'button-container'
                ),
                $atts,
                'wcc_clear_cart_btn'
            );

            ob_start();
            ?>
            <div class="<?php echo esc_attr('button-container ' . $atts['container_class']); ?>">
                <button type="button" id="wcc-clear-cart-btn"><?php echo esc_html($atts['button_text']); ?></button>
                <span class="wcc_btn_loader"></span>
            </div>
            <?php
            return ob_get_clean();
        }
    }
}