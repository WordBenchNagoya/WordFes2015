<?php
/**
 * Template part for displaying posts.
 *
 * @package WordFes Nagoya 2015
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-contents' ); ?>>
	<div class="container">
		<?php if ( get_field('display-title') ): ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php endif; ?>

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wordfes2015' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .container -->
</article><!-- #post-## -->
