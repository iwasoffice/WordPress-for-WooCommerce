<?php get_header(); ?>
<section class="container content-shell">
	<?php if ( have_posts() ) : ?>
		<div class="post-grid">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'content-card' ); ?>>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry-excerpt"><?php the_excerpt(); ?></div>
			</article>
		<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nothing found.', 'iwas-commerce' ); ?></p>
	<?php endif; ?>
</section>
<?php get_footer(); ?>
