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
 * @subpackage WordFes 2015
 * @author     Grow Group
 * @license    GPLv2 or later
 * @link       http://2015.wordfes.org
 * @copyright  2015 WordBench Nagoya
 * =====================================================
 */
?>

<div class="area suporter--area suporter-wrap background-color white">
	<div class="container">
		<h2 class="section--title text-center entry-title">サポーター</h2>
		<div class="suporter-area">
		<?php
		if ( is_user_logged_in() ) {
			$post_status = array( 'draft','publish' );
		} else {
			$post_status = array( 'publish' );
		}
			
		// Get Sponsor Kind
		$suporter_temrs = get_terms( 'suporter_category', array( 'hide_empty' => false, 'orderby' => 'order', 'order' => 'ASC') );

		$count = 0;

		foreach ( $suporter_temrs as $key => $suporter_term ){

			// Set sponsor Kind to posts settings
			$args = array(
				'post_type'      => 'suporter',
				'post_status'    => $post_status,
				'posts_per_page' => -1,
				'orderby'        => 'order',
				'order'          => 'DESC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'suporter_category',
						'field'    => 'id',
						'terms'    => $suporter_term->term_id,
					),
				),
			);
			// create instance.
			$the_query = new WP_Query( $args );

			$count ++;

			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents <?php echo esc_attr( $suporter_term->slug ) ?>">
					<div class="clearfix">
						<h3 class="suporter-<?php echo esc_html( sprintf( "%02d", $count ) ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/title_suporter-' . sprintf( "%02d", $count ) ); ?>" alt="" />
						</h3>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post();
							$add_class = ( 'draft' == $post->post_status ) ? ' draft' : ''; ?>
								<div class="colmun text-center<?php echo esc_attr( $add_class ); ?>">
									<a href="<?php echo esc_url( get_field( 'suporter_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>">
									<?php if ( $image = wp_get_attachment_url( get_field( 'suporter_logo_image' ) ) ): ?>
									<?php //var_dump($image); ?>
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title(); ?>" class="img-responsive">
									<?php else: ?>
										<p class="no-image"><?php the_title(); ?></p>
									<?php endif; ?>
									</a>
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
			/* サポーター */
		
			$args = array(
				'post_type'      => 'suporter',
				'post_status'    => $post_status,
				'posts_per_page' => -1,
				'orderby'        => 'order',
				'order'          => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'suporter_type',
						'field'    => 'slug',
						'terms'    => 'enterprise',
					),
				),
			);
			$the_query = new WP_Query( $args );
			
			$count ++;

			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents">
					<div class="clearfix">
						<h3 class="suporter-<?php echo esc_html( sprintf( "%02d", $count ) ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/title_suporter-' . sprintf( "%02d", $count ) ); ?>" alt="" />
						</h3>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post();
							$add_class = ( 'draft' == $post->post_status ) ? ' draft' : ''; ?>
							
							<?php //echo '<pre>'; var_dump( get_post_custom() ); echo '</pre>'; ?>
							
								<div class="colmun text-center<?php echo esc_attr( $add_class ); ?>">
									<a href="<?php echo esc_url( get_field( 'suporter_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>">
									<?php if ( $image = wp_get_attachment_url( get_field( 'suporter_logo_image' ) ) ): ?>
									<?php //var_dump($image); ?>
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title(); ?>" class="img-responsive">
									<?php else: ?>
										<p class="no-image"><?php the_title(); ?></p>
									<?php endif; ?>
									</a>
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
			/* 個人サポーター */
		
			$args = array(
				'post_type'      => 'suporter',
				'post_status'    => $post_status,
				'posts_per_page' => -1,
				'orderby'        => 'order',
				'order'          => 'DESC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'suporter_type',
						'field'    => 'slug',
						'terms'    => 'individual',
					),
				),
			);
			$the_query = new WP_Query( $args );
			
			$count ++;

			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents">
					<div class="clearfix">
						<h3 class="suporter-<?php echo esc_html( sprintf( "%02d", $count ) ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/title_suporter-' . sprintf( "%02d", $count ) ); ?>" alt="" />
						</h3>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post();
							$add_class = ( 'draft' == $post->post_status ) ? ' draft' : ''; ?>
							
								<div class="colmun text-center<?php echo esc_attr( $add_class ); ?>">
									<a href="<?php echo esc_url( get_field( 'suporter_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>">
										<?php the_title(); ?>
									</a>
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
			/* バックアップサポーター */
		
			$args = array(
				'post_type'      => 'suporter',
				'post_status'    => $post_status,
				'posts_per_page' => -1,
				'orderby'        => 'order',
				'order'          => 'DESC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'suporter_type',
						'field'    => 'slug',
						'terms'    => 'backup',
					),
				),
			);
			$the_query = new WP_Query( $args );
			
			$count ++;

			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents">
					<div class="clearfix">
						<h3 class="suporter-<?php echo esc_html( sprintf( "%02d", $count ) ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/title_suporter-' . sprintf( "%02d", $count ) ); ?>" alt="" />
						</h3>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post();
							$add_class = ( 'draft' == $post->post_status ) ? ' draft' : ''; ?>
							
								<div class="colmun text-center<?php echo esc_attr( $add_class ); ?>">
									<a href="<?php echo esc_url( get_field( 'suporter_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>">
									<?php if ( $image = wp_get_attachment_url( get_field( 'suporter_logo_image' ) ) ): ?>
									<?php //var_dump($image); ?>
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title(); ?>" class="img-responsive">
									<?php else: ?>
										<p class="no-image"><?php the_title(); ?></p>
									<?php endif; ?>
									</a>
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
