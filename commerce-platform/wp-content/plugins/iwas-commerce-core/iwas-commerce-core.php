<?php
/**
 * Plugin Name: IWAS Commerce Core
 * Description: Store-specific WooCommerce metadata, admin overview, order tracking API and PWA support.
 * Version: 1.0.0
 * Requires at least: 6.6
 * Requires PHP: 8.1
 * Author: IWAS Office
 * Text Domain: iwas-commerce-core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'IWAS_COMMERCE_CORE_VERSION', '1.0.0' );
define( 'IWAS_COMMERCE_CORE_DIR', plugin_dir_path( __FILE__ ) );

require_once IWAS_COMMERCE_CORE_DIR . 'includes/class-product-meta.php';
require_once IWAS_COMMERCE_CORE_DIR . 'includes/class-tracking-api.php';
require_once IWAS_COMMERCE_CORE_DIR . 'includes/class-pwa.php';
require_once IWAS_COMMERCE_CORE_DIR . 'includes/class-admin.php';

register_activation_hook( __FILE__, array( 'IWAS_Commerce_PWA', 'activate' ) );

add_action(
	'before_woocommerce_init',
	static function() {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
);

add_action(
	'plugins_loaded',
	static function() {
		IWAS_Commerce_Product_Meta::init();
		IWAS_Commerce_Tracking_API::init();
		IWAS_Commerce_PWA::init();
		IWAS_Commerce_Admin::init();
	}
);
