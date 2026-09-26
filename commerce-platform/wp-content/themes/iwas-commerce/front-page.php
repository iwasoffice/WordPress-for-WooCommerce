<?php
get_header();
$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
?>
<section class="hero-section">
	<div class="container hero-grid">
		<div class="hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'New season • curated essentials', 'iwas-commerce' ); ?></p>
			<h1><?php esc_html_e( 'Better finds for everyday routines.', 'iwas-commerce' ); ?></h1>
			<p class="hero-text"><?php esc_html_e( 'Start with practical beauty and hair essentials, selected for clear use cases, trackable fulfilment and straightforward shopping.', 'iwas-commerce' ); ?></p>
			<div class="button-row">
				<a class="button primary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Shop the collection', 'iwas-commerce' ); ?></a>
				<a class="button secondary" href="#why-us"><?php esc_html_e( 'Why shop here', 'iwas-commerce' ); ?></a>
			</div>
			<div class="trust-row"><span>✓ Secure checkout</span><span>✓ Tracked delivery</span><span>✓ Clear returns</span></div>
		</div>
		<div class="hero-art" aria-hidden="true">
			<div class="hero-orb orb-one"></div><div class="hero-orb orb-two"></div><div class="hero-card"><span>Beauty & Hair</span><strong>Protect your routine.</strong><small>Accessories chosen for practical everyday use.</small></div>
		</div>
	</div>
</section>

<section class="section container">
	<div class="section-heading"><div><p class="eyebrow">Explore</p><h2><?php esc_html_e( 'Shop by need', 'iwas-commerce' ); ?></h2></div><a href="<?php echo esc_url( $shop_url ); ?>">View all →</a></div>
	<div class="category-grid">
		<a class="category-card category-purple" href="<?php echo esc_url( home_url( '/product-category/hair-protection/' ) ); ?>"><span>Hair protection</span><strong>Bonnets & satin essentials</strong><small>Protective styles, sleep and travel.</small></a>
		<a class="category-card category-peach" href="<?php echo esc_url( home_url( '/product-category/wig-accessories/' ) ); ?>"><span>Wig accessories</span><strong>Grip, store & protect</strong><small>Simple tools for everyday wig care.</small></a>
		<a class="category-card category-blue" href="<?php echo esc_url( home_url( '/product-category/styling-tools/' ) ); ?>"><span>Styling tools</span><strong>Organise the routine</strong><small>Brushes, clips and non-powered tools.</small></a>
	</div>
</section>

<?php if ( class_exists( 'WooCommerce' ) ) : ?>
<section class="section container">
	<div class="section-heading"><div><p class="eyebrow">Popular now</p><h2><?php esc_html_e( 'Featured products', 'iwas-commerce' ); ?></h2></div></div>
	<?php echo do_shortcode( '[products limit="8" columns="4" visibility="featured"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</section>
<?php endif; ?>

<section id="why-us" class="section trust-section">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow">Designed around confidence</p><h2><?php esc_html_e( 'Less guesswork from checkout to delivery.', 'iwas-commerce' ); ?></h2></div></div>
		<div class="trust-grid">
			<article><span class="feature-icon">01</span><h3>Curated catalogue</h3><p>Launch with a focused product set instead of an unstructured catalogue.</p></article>
			<article><span class="feature-icon">02</span><h3>Tracked fulfilment</h3><p>Use supplier workflows that return shipping status and tracking to the order.</p></article>
			<article><span class="feature-icon">03</span><h3>Transparent policies</h3><p>Delivery, returns and support information remain visible before purchase.</p></article>
			<article><span class="feature-icon">04</span><h3>Mobile first</h3><p>Shopping, account and checkout layouts are designed for smaller screens first.</p></article>
		</div>
	</div>
</section>

<section class="section container newsletter-card">
	<div><p class="eyebrow">Stay in the loop</p><h2><?php esc_html_e( 'New finds without the noise.', 'iwas-commerce' ); ?></h2><p>Connect your preferred email platform later; this design does not silently collect addresses without a configured processor.</p></div>
	<form action="#" method="post" onsubmit="return false"><label class="screen-reader-text" for="newsletter-email">Email</label><input id="newsletter-email" type="email" placeholder="you@example.com" disabled><button class="button primary" type="button" disabled>Coming soon</button></form>
</section>
<?php get_footer(); ?>
