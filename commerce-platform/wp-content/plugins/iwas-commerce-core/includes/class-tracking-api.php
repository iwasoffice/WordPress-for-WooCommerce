<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

final class IWAS_Commerce_Tracking_API {
	public static function init() {
		add_action( 'rest_api_init', array( __CLASS__, 'routes' ) );
	}

	public static function routes() {
		register_rest_route(
			'iwas-commerce/v1',
			'/track',
			array(
				'methods'             => 'POST',
				'callback'            => array( __CLASS__, 'track' ),
				'permission_callback' => '__return_true',
				'args'                => array(
					'order_id' => array( 'required' => true, 'sanitize_callback' => 'absint' ),
					'email'    => array( 'required' => true, 'sanitize_callback' => 'sanitize_email' ),
				),
			)
		);
	}

	public static function track( WP_REST_Request $request ) {
		if ( ! function_exists( 'wc_get_order' ) ) {
			return new WP_Error( 'woocommerce_unavailable', __( 'Order service is unavailable.', 'iwas-commerce-core' ), array( 'status' => 503 ) );
		}

		$order = wc_get_order( (int) $request['order_id'] );
		$email = strtolower( (string) $request['email'] );

		if ( ! $order || strtolower( (string) $order->get_billing_email() ) !== $email ) {
			return new WP_Error( 'not_found', __( 'Order not found.', 'iwas-commerce-core' ), array( 'status' => 404 ) );
		}

		return rest_ensure_response(
			array(
				'order_number' => $order->get_order_number(),
				'status'       => wc_get_order_status_name( $order->get_status() ),
				'created'      => $order->get_date_created() ? $order->get_date_created()->date_i18n( DATE_ATOM ) : null,
				'total'        => $order->get_formatted_order_total(),
				'items'        => array_values(
					array_map(
						static fn( $item ) => array( 'name' => $item->get_name(), 'quantity' => $item->get_quantity() ),
						$order->get_items()
					)
				),
			)
		);
	}
}
