<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

final class IWAS_Commerce_Product_Meta {
	public static function init() {
		add_action( 'woocommerce_product_options_inventory_product_data', array( __CLASS__, 'fields' ) );
		add_action( 'woocommerce_admin_process_product_object', array( __CLASS__, 'save' ) );
	}

	public static function fields() {
		echo '<div class="options_group">';
		woocommerce_wp_text_input( array( 'id' => '_iwas_supplier_name', 'label' => __( 'Supplier name', 'iwas-commerce-core' ), 'desc_tip' => true, 'description' => __( 'Operational supplier label. Do not expose credentials here.', 'iwas-commerce-core' ) ) );
		woocommerce_wp_text_input( array( 'id' => '_iwas_supplier_sku', 'label' => __( 'Supplier SKU', 'iwas-commerce-core' ) ) );
		woocommerce_wp_text_input( array( 'id' => '_iwas_supplier_product_url', 'label' => __( 'Supplier product URL', 'iwas-commerce-core' ), 'type' => 'url' ) );
		woocommerce_wp_text_input( array( 'id' => '_iwas_source_warehouse', 'label' => __( 'Source warehouse', 'iwas-commerce-core' ), 'placeholder' => 'US' ) );
		woocommerce_wp_text_input( array( 'id' => '_iwas_max_source_cost', 'label' => __( 'Maximum source cost', 'iwas-commerce-core' ), 'type' => 'number', 'custom_attributes' => array( 'step' => '0.01', 'min' => '0' ) ) );
		echo '</div>';
	}

	public static function save( $product ) {
		$fields = array(
			'_iwas_supplier_name'        => 'sanitize_text_field',
			'_iwas_supplier_sku'         => 'sanitize_text_field',
			'_iwas_supplier_product_url' => 'esc_url_raw',
			'_iwas_source_warehouse'     => 'sanitize_text_field',
			'_iwas_max_source_cost'      => 'wc_format_decimal',
		);

		foreach ( $fields as $key => $sanitizer ) {
			if ( isset( $_POST[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing -- WooCommerce product save verifies request.
				$product->update_meta_data( $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
		}
	}
}
