<?php
/**
 * Theme bootstrap.
 *
 * @package IWAS_Commerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'IWAS_COMMERCE_VERSION', '1.0.0' );

function iwas_commerce_setup() {
	load_theme_textdomain( 'iwas-commerce', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 64, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'iwas-commerce' ),
			'footer'  => __( 'Footer navigation', 'iwas-commerce' ),
		)
	);
}
add_action( 'after_setup_theme', 'iwas_commerce_setup' );

function iwas_commerce_assets() {
	wp_enqueue_style( 'iwas-commerce-main', get_template_directory_uri() . '/assets/css/main.css', array(), IWAS_COMMERCE_VERSION );
	wp_enqueue_script( 'iwas-commerce-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), IWAS_COMMERCE_VERSION, false );
	wp_enqueue_script( 'iwas-commerce-nav', get_template_directory_uri() . '/assets/js/navigation.js', array(), IWAS_COMMERCE_VERSION, true );
	wp_enqueue_script( 'iwas-commerce-pwa', get_template_directory_uri() . '/assets/js/pwa.js', array(), IWAS_COMMERCE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'iwas_commerce_assets' );

function iwas_commerce_body_classes( $classes ) {
	if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'has-woocommerce';
	}
	return $classes;
}
add_filter( 'body_class', 'iwas_commerce_body_classes' );

function iwas_commerce_custom_logo_fallback() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	printf(
		'<a class="brand-text" href="%1$s" rel="home">%2$s</a>',
		esc_url( home_url( '/' ) ),
		esc_html( get_bloginfo( 'name' ) )
	);
}

function iwas_commerce_cart_count() {
	if ( function_exists( 'WC' ) && WC()->cart ) {
		return (int) WC()->cart->get_cart_contents_count();
	}
	return 0;
}
