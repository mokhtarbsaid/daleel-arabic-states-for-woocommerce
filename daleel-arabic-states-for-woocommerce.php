<?php
/**
 * Plugin Name: Daleel - Arabic States for Woocommerce
 * Plugin URI:  https://mokhtarbensaid.com
 * Description: A plugin help you to find the missed Arabic region countries states in Woocommerce.
 * Version:     1.0.0
 * Requires Plugins: woocommerce
 * Author:      Mokhtar Bensaid
 * License:     GPL-2.0+
 * Text Domain: daleel-arabic-states-for-woocommerce
 * Domain Path: /languages
 */

// If accessed directly, deny access.
defined('ABSPATH') || exit;

// Definition of plugin constants.
define('DALL_ARST_VERSION', '1.0.0');
define('DALL_ARST_PATH', plugin_dir_path(__FILE__));
define('DALL_ARST_URL', plugin_dir_url(__FILE__));


// Check if WooCommerce is active.
function dall_arst_is_woocommerce_active() {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
    return is_plugin_active('woocommerce/woocommerce.php');
}

// Display an admin notice if WooCommerce is not active.
function dall_arst_woocommerce_missing_notice() {
    if (!dall_arst_is_woocommerce_active()) {
        echo '<div class="notice notice-error"><p>';
        echo esc_html__('Daleel - Arabic States for WooCommerce requires WooCommerce to be installed and activated.', 'daleel-arabic-states-for-woocommerce');
        echo '</p></div>';
    }
}
add_action('admin_notices', 'dall_arst_woocommerce_missing_notice');

// Initialize the plugin only if WooCommerce is active.
function dall_arst_init() {
    if (dall_arst_is_woocommerce_active()) {
        // Include essential files.
        require_once DALL_ARST_PATH . 'includes/class-main.php';

        // Run the main plugin class.
        if (class_exists('Dall_Arst_Main')) { 
            $dall_arst = new Dall_Arst_Main();
        }
    }
}
add_action('plugins_loaded', 'dall_arst_init');