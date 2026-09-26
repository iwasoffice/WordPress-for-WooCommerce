</main>
<footer class="site-footer">
	<div class="container footer-grid">
		<div>
			<div class="footer-brand"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
			<p><?php esc_html_e( 'Useful products, straightforward shopping and transparent delivery.', 'iwas-commerce' ); ?></p>
		</div>
		<div>
			<h2><?php esc_html_e( 'Shop', 'iwas-commerce' ); ?></h2>
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => false, 'menu_class' => 'footer-menu' ) ); ?>
		</div>
		<div>
			<h2><?php esc_html_e( 'Support', 'iwas-commerce' ); ?></h2>
			<ul class="footer-menu">
				<li><a href="<?php echo esc_url( home_url( '/shipping/' ) ); ?>">Shipping</a></li>
				<li><a href="<?php echo esc_url( home_url( '/returns/' ) ); ?>">Returns</a></li>
				<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
			</ul>
		</div>
	</div>
	<div class="container footer-bottom">
		<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
		<span><?php esc_html_e( 'Powered by WordPress + WooCommerce', 'iwas-commerce' ); ?></span>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
