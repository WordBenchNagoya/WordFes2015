<?php
/**
 * The template for displaying all single posts.
 *
 * @package WordFes Nagoya 2015
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main session" role="main">
			
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content-session', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				/*
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				*/
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
