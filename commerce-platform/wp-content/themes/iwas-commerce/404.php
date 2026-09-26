<?php get_header(); ?>
<section class="container empty-state">
	<p class="eyebrow">404</p>
	<h1><?php esc_html_e( 'That page is not here.', 'iwas-commerce' ); ?></h1>
	<p><?php esc_html_e( 'Try the shop or return to the homepage.', 'iwas-commerce' ); ?></p>
	<div class="button-row"><a class="button primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><?php if ( function_exists( 'wc_get_page_permalink' ) ) : ?><a class="button secondary" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Shop</a><?php endif; ?></div>
</section>
<?php get_footer(); ?>
