<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

final class IWAS_Commerce_PWA {
	public static function init() {
		add_action( 'init', array( __CLASS__, 'rewrite' ) );
		add_action( 'template_redirect', array( __CLASS__, 'serve' ) );
		add_action( 'wp_head', array( __CLASS__, 'head' ), 2 );
	}

	public static function activate() {
		self::rewrite();
		flush_rewrite_rules();
	}

	public static function rewrite() {
		add_rewrite_rule( '^manifest\\.webmanifest$', 'index.php?iwas_manifest=1', 'top' );
		add_rewrite_rule( '^iwas-sw\\.js$', 'index.php?iwas_sw=1', 'top' );
		add_rewrite_tag( '%iwas_manifest%', '1' );
		add_rewrite_tag( '%iwas_sw%', '1' );
	}

	public static function head() {
		echo '<link rel="manifest" href="' . esc_url( home_url( '/manifest.webmanifest' ) ) . '">';
		echo '<meta name="mobile-web-app-capable" content="yes">';
		echo '<meta name="apple-mobile-web-app-capable" content="yes">';
	}

	public static function serve() {
		if ( get_query_var( 'iwas_manifest' ) ) {
			nocache_headers();
			header( 'Content-Type: application/manifest+json; charset=utf-8' );
			echo wp_json_encode(
				array(
					'name'             => get_bloginfo( 'name' ),
					'short_name'       => mb_substr( get_bloginfo( 'name' ), 0, 18 ),
					'start_url'        => home_url( '/' ),
					'scope'            => home_url( '/' ),
					'display'          => 'standalone',
					'background_color' => '#fbfaf8',
					'theme_color'      => '#6f46d8',
					'description'      => get_bloginfo( 'description' ),
				)
			);
			exit;
		}

		if ( get_query_var( 'iwas_sw' ) ) {
			nocache_headers();
			header( 'Content-Type: application/javascript; charset=utf-8' );
			header( 'Service-Worker-Allowed: /' );
			$offline = home_url( '/offline/' );
			$home    = home_url( '/' );
			printf(
				"const CACHE='iwas-commerce-v1';const OFFLINE=%s;const HOME=%s;self.addEventListener('install',e=>e.waitUntil(caches.open(CACHE).then(c=>c.addAll([HOME,OFFLINE])).then(()=>self.skipWaiting())));self.addEventListener('activate',e=>e.waitUntil(self.clients.claim()));self.addEventListener('fetch',e=>{if(e.request.method!=='GET'||new URL(e.request.url).origin!==location.origin)return;e.respondWith(fetch(e.request).then(r=>{const copy=r.clone();caches.open(CACHE).then(c=>c.put(e.request,copy));return r;}).catch(()=>caches.match(e.request).then(r=>r||caches.match(OFFLINE))))});",
				wp_json_encode( $offline ),
				wp_json_encode( $home )
			);
			exit;
		}
	}
}
