<?php
/**
 * Template part for displaying single posts.
 *
 * @package WordFes Nagoya 2015
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-contents' ); ?>>
	<div class="container">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta clearfix">
				<?php get_template_part( 'template-parts/social', 'single' ); ?>
				<?php wordfes2015_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php get_template_part( 'template-parts/social', 'single' ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wordfes2015' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php wordfes2015_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .container -->
</article><!-- #post-## -->

