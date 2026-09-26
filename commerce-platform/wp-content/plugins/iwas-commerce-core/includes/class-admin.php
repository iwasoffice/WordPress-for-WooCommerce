<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

final class IWAS_Commerce_Admin {
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'menu' ) );
	}

	public static function menu() {
		add_menu_page(
			__( 'Commerce Overview', 'iwas-commerce-core' ),
			__( 'Commerce', 'iwas-commerce-core' ),
			'manage_woocommerce',
			'iwas-commerce',
			array( __CLASS__, 'page' ),
			'dashicons-store',
			56
		);
	}

	public static function page() {
		if ( ! current_user_can( 'manage_woocommerce' ) ) { return; }
		$product_count = wp_count_posts( 'product' );
		$published = isset( $product_count->publish ) ? (int) $product_count->publish : 0;
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Commerce Overview', 'iwas-commerce-core' ); ?></h1>
			<p><?php esc_html_e( 'Operational checks for the WooCommerce storefront. Supplier automation remains managed through the connected fulfilment extension.', 'iwas-commerce-core' ); ?></p>
			<table class="widefat striped" style="max-width:900px">
				<tbody>
					<tr><td><strong>WooCommerce</strong></td><td><?php echo class_exists( 'WooCommerce' ) ? 'Active' : 'Not active'; ?></td></tr>
					<tr><td><strong>Published products</strong></td><td><?php echo esc_html( $published ); ?></td></tr>
					<tr><td><strong>Site currency</strong></td><td><?php echo function_exists( 'get_woocommerce_currency' ) ? esc_html( get_woocommerce_currency() ) : '—'; ?></td></tr>
					<tr><td><strong>PWA manifest</strong></td><td><a href="<?php echo esc_url( home_url( '/manifest.webmanifest' ) ); ?>" target="_blank" rel="noopener">Open</a></td></tr>
				</tbody>
			</table>
		</div>
		<?php
	}
}
