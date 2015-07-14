<?php
/**
 * サポーター モジュール
 *
 * - - -
 *
 * setup.php にてアクションフックで出力させてます
 *
 * =====================================================
 * @package    WordPress
 * @subpackage WordFes 2014
 * @author     Grow Group
 * @license    GPLv2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>

<div class="area suporter--area suporter-wrap background-color white">
	<div class="container">
<!-- 		<h2 class="section--title text-center" style="color:#252525">SPORTER</h2> -->
		<div class="suporter-area">
			<?php
			if ( is_user_logged_in() ) {
				$post_status = array( 'draft','publish' );
			} else {
				$post_status = array( 'publish' );
			}
		
			$args = array(
				'post_type'      => 'suporter',
				'post_status'    => $post_status,
				'posts_per_page' => -1,
				array(
					'meta_key'     => 'suporter_type',
					'meta_value'   => 'enterprise',
					'meta_compare' => '='
				),
				'orderby' => 'title',
				'order' => 'ASC'
			);
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents">
					<div class="clearfix">
						<h2 class="suporter-flag">
							サポーター
						</h2>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post(); ?>
							
							<?php //echo '<pre>'; var_dump( get_post_custom() ); echo '</pre>'; ?>
							
								<div class="colmun text-center">
									<a href="<?php echo esc_url( get_field( 'suporter_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>"><img src="<?php echo wp_get_attachment_url( get_field( 'suporter_logo_image' ) ) ?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
								</div>
						<?php
						endwhile; ?>
						</div>
					</div>
				</div>

			<?php
			else: ?>

			<?php
			endif;
			wp_reset_query();
			?>
		<?php
		// Get Sponsor Kind
		$suporter_temrs = get_terms( 'suporter_category', array( 'hide_empty' => false, 'orderby' => 'order', 'order' => 'ASC') );

		if ( is_user_logged_in() ) {
			$post_status = array( 'draft','publish' );
		} else {
			$post_status = array( 'publish' );
		}

		foreach ( $suporter_temrs as $key => $suporter_term ){


			// Set sponsor Kind to posts settings
			$args = array(
				'post_type' => 'suporter',
				'post_status' => $post_status,
				'posts_per_page' => -1,
				'suporter_type' => 'enterprise',
				'orderby' => 'title',
				'tax_query' => array(
					array(
						'taxonomy' => 'suporter_category',
						'field' => 'id',
						'terms' => $suporter_term->term_id,
					),
				),
			);
			// create instance.
			$the_query = new WP_Query( $args );



			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents <?php echo esc_attr( $suporter_term->slug ) ?>">
					<div class="clearfix">
						<h2 class="suporter-flag">
							<?php echo esc_attr( strtoupper( $suporter_term->name ) ) ?>
						</h2>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post(); ?>
								<div class="colmun text-center">
									<a href="<?php echo esc_url( get_field( 'suporter_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>"><img src="<?php echo wp_get_attachment_url( get_field( 'suporter_logo_image' ) ) ?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
								</div>
						<?php
						endwhile; ?>
						</div>
					</div>
				</div>

			<?php
			else: ?>

			<?php
			endif;
			wp_reset_query();

		} ?>

			<?php
			if ( is_user_logged_in() ) {
				$post_status = array( 'draft','publish' );
			} else {
				$post_status = array( 'publish' );
			}
		
			$args = array(
				'post_type' => 'suporter',
				'post_status' => $post_status,
				'suporter_type' => 'individual',
				'posts_per_page' => -1,
				'orderby' => 'title'
			);
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents">
					<div class="clearfix">
						<h2 class="suporter-flag">
							サポーター
						</h2>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post(); ?>
								<div class="colmun text-center">
									<a href="<?php echo esc_url( get_field( 'suporter_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>"><img src="<?php echo wp_get_attachment_url( get_field( 'suporter_logo_image' ) ) ?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
								</div>
						<?php
						endwhile; ?>
						</div>
					</div>
				</div>

			<?php
			else: ?>

			<?php
			endif;
			wp_reset_query();
			?>

		<?php if ( is_user_logged_in() ) { ?>
			<p class="edit-link">
				<a href="<?php echo admin_url( '/post-new.php?post_type=suporter' ); ?>" class="btn btn-success"><i class="dashicons dashicons-admin-generic"></i> 新しいサポーターを追加</a>
			</p>
		<?php } ?>

		</div>
	</div>
</div>
