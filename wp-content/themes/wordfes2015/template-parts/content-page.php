<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordFes Nagoya 2015
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-contents' ); ?>>
	<div class="container">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wordfes2015' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( esc_html__( 'Edit', 'wordfes2015' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .container -->
</article><!-- #post-## -->

