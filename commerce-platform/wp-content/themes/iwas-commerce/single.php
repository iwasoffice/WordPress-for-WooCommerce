<?php get_header(); ?>
<section class="container content-shell narrow">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="entry-content"><?php the_content(); ?></div>
		</article>
	<?php endwhile; ?>
</section>
<?php get_footer(); ?>
