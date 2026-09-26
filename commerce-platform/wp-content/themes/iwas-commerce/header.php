<?php
/** Header. */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#fbfaf8" id="theme-color-meta">
	<script>try{var t=localStorage.getItem('iwas_theme')||'system';var d=t==='dark'||(t==='system'&&matchMedia('(prefers-color-scheme: dark)').matches);document.documentElement.dataset.theme=d?'dark':'light';document.documentElement.dataset.themePreference=t;}catch(e){}</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'iwas-commerce' ); ?></a>
<div class="announcement"><div class="container"><?php esc_html_e( 'Curated essentials • Secure checkout • Tracked delivery', 'iwas-commerce' ); ?></div></div>
<header class="site-header">
	<div class="container header-row">
		<div class="brand"><?php iwas_commerce_custom_logo_fallback(); ?></div>
		<button class="icon-button nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="<?php esc_attr_e( 'Open menu', 'iwas-commerce' ); ?>">☰</button>
		<nav id="primary-nav" class="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'iwas-commerce' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => false, 'menu_class' => 'menu' ) ); ?>
		</nav>
		<div class="header-actions">
			<a class="icon-button" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url() ); ?>" aria-label="<?php esc_attr_e( 'Account', 'iwas-commerce' ); ?>">◎</a>
			<button class="icon-button theme-toggle" type="button" aria-haspopup="menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Appearance', 'iwas-commerce' ); ?>">◐</button>
			<div class="theme-menu" role="menu" hidden>
				<button type="button" data-theme-option="light" role="menuitem">Light</button>
				<button type="button" data-theme-option="dark" role="menuitem">Dark</button>
				<button type="button" data-theme-option="system" role="menuitem">System</button>
			</div>
			<?php if ( function_exists( 'wc_get_cart_url' ) ) : ?>
			<a class="cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span><?php esc_html_e( 'Cart', 'iwas-commerce' ); ?></span><span class="cart-count"><?php echo esc_html( iwas_commerce_cart_count() ); ?></span></a>
			<?php endif; ?>
		</div>
	</div>
</header>
<main id="main-content" class="site-main">
