<?php
/*
Template Name: スタッフ一覧テンプレート
*/
/**
 * The WordPress Query class.
 * @link http://codex.wordpress.org/Function_Reference/WP_Query
 *
 */
 
$args = array(

	//Type & Status Parameters
	'post_type'   => array( 'staff' ),

	'post_status' => array(
		'publish',
		//'pending',
		//'draft',
		//'auto-draft',
		'future',
		'private',
		'inherit'
		//'trash'
		),
	 'posts_per_page' => '50',
	 'orderby' => 'date',
	 'orderby' => 'ASC'
);

$query = new WP_Query( $args );
?>

		<?php if ( $query->have_posts() ) : ?>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			<div class="clearfix">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				$staff['charge']       = esc_html( get_post_meta( $post->ID, 'charge', true ) );
				$staff['comment']      = esc_html( get_post_meta( $post->ID, 'comment', true ) );
				$staff['facebook_url'] = esc_html( get_post_meta( $post->ID, 'facebook_link', true ) );
				$staff['twitter_url']  = esc_html( get_post_meta( $post->ID, 'twitter_link', true ) );
				$facebook_id = '';
				if ( $staff['facebook_url'] ) {
					if ( strstr( $staff['facebook_url'], 'https://www.facebook.com/') ) {
						$facebook_id = str_replace( 'https://www.facebook.com/', '', $staff['facebook_url'] );
					} else {
						$facebook_id = $staff['facebook_url'];
					}
				}

				?>

				<div class="col-xs-12 staff-module">
					<div class="clearfix">
						<!--
						<div class="staff-thumbnail col-xs-12 col-md-3">
							<img src="https://graph.facebook.com/<?php echo $facebook_id ;?>/picture/?type=normal" alt="placeholder+image" class="thumbnail">
						</div>
						-->
						<div class="staff-contents col-xs-12">
							<p class="lead staff-lead"><small><?php echo $staff['charge']; ?></small></p>
							<h3 class="staff-name"><?php the_title(); ?></h3>
							<ul class="staff-icons inline-list clearfix">
								<?php if ( $staff['facebook_url'] ): ?>
								<li><a href="<?php echo $staff['facebook_url'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.gif" alt="Facebook"></a></li>
								<?php endif; ?>
								<?php if ( $staff['twitter_url'] ): ?>
								<li><a href="<?php echo $staff['twitter_url'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.gif" alt="Twitter"></a></li>
								<?php endif; ?>
							</ul>
							<div class="staff-comment">
								<?php echo $staff['comment']; ?>
							</div>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
			</div>
			<?php //wordfes2014_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

			<nav class="text-center">
			<?php
			// wp_pagenavi
			if ( function_exists( 'wp_pagenavi' ) ) {
				wp_pagenavi();
			} ?>
			</nav>
