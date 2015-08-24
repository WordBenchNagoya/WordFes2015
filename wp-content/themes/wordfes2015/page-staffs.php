<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordFes Nagoya 2015
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main staff" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-contents' ); ?>>
				<div class="container">
					<header class="entry-header">
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			
						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta clearfix">
							<?php wordfes2015_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
			
					<div class="entry-content">
						<?php get_template_part( 'template-parts/content-staff' ); ?>
					</div><!-- .entry-content -->
			
					<footer class="entry-footer">
						<?php wordfes2015_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div><!-- .container -->
			</article><!-- #post-## -->

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

	</div><!-- #primary -->
	
<?php //get_template_part( 'template-parts/sponsor', 'page' ); ?>

<?php get_footer(); ?>
