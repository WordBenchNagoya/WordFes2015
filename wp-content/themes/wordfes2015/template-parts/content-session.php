<?php
/**
 * セッション詳細ページ テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    GPL v2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

$facebook     = get_field( 'session_facebook' );
$twitter      = get_field( 'session_twitter' );
$website      = get_field( 'session_website' );
$contents     = get_field( 'session_contents' );
$speaker_name = get_field( 'session_speaker_name' );
$belong_link  = get_field( 'session_speaker_belong_link' );
$slide_data   = get_field( 'スライド' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-block main-contents' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title sub-title01">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php //wordfes2014_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<?php
					echo wp_kses_post( $contents );
					if ( $slide_data ) { ?>
						<p>
							<a href="<?php the_field( 'スライド' );?>" target="_blank">
							<img src="<?php echo get_template_directory_uri() ?>/images/common/arrow-sm.gif" alt=""> スライドはこちら
							</a>
						</p>
				<?php
					}
				?>
			</div>
			<div class="col-lg-6 col-xs-12">
				<h3 class="sub-title04">こんな方へ</h3>
				<?php
				if ( get_field( 'session_recommended_person' ) ) : ?>
					<ul>
					<?php while( has_sub_field( 'session_recommended_person' ) ) : ?>
						<li><?php the_sub_field( 'session_recommended_person_text' ); ?></li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<table class="table table-bordered">
<!--
					<tr>
						<th>対象者</th>
						<td>
					<?php
					//if ( $target_terms = get_the_terms( $session->ID, 'target' ) ):
					//foreach ( $target_terms as $key => $target ) { ?>
					//	<?php //echo esc_html( $target->name );?>　
					<?php
					//}
					//endif; ?>
						</td>
					</tr>
-->
					<tr>
						<th>時間</th>
						<td><?php wordfes2014_the_term( $post->ID, 'timezone', 'description' ); ?></td>
					</tr>
					<tr>
						<th>教室</th>
						<td><?php wordfes2014_the_term( $post->ID, 'classroom', 'description' ); ?></td>
					</tr>
					<tr>
						<th>人数</th>
						<td><?php
						if ( get_field( 'session_persons' ) ) {
							echo get_field( 'session_persons' );
						} else {
							if ( $classrooms = get_the_terms( $post->ID, 'classroom' ) ):
							foreach ( $classrooms as $key => $classroom ) {

								echo get_field( 'classroom_parson', $classroom );
							}
							endif;
						}
						?></td>
					</tr>
				</table>

				<?php
				// その他
				if ( get_field( 'session_other' ) ) : ?>
				<p>
					<?php the_field( 'session_other' ); ?>
				</p>
				<?php endif; ?>

			</div>
		</div>
		<?php if ( $speaker_name && get_field( 'session_description' ) ) : ?>
		<div class="speaker-block">
			<h3 class="speaker-title">
<!-- 				スピーカー紹介 -->
				スピーカー（進行役）紹介
			</h3>
			<div class="speaker-contents clearfix">
				<div class="col-lg-3 col-md-3 col-xs-12 text-left">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'full', array( 'class' => 'thumbnail img-responsive','style="margin-top: 20px"' ) );
					} else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/subpage/no_speaker_image.png" alt="写真なし">
					<?php
					} ?>
				</div>
				<div class="col-lg-9 col-md-9 col-xs-12">
					<h4><?php echo esc_html( $speaker_name )  ?></h4>
					<div class="social-icon">
						<?php
						if ( $facebook ) : ?>
							<a href="<?php echo esc_url( $facebook ) ?>" target="_blank" class="facebook-icon">Facebook</a>
						<?php
						endif;
						if ( $twitter ) : ?>
							<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" class="twitter-icon">Twitter</a>
						<?php
						endif;
						if ( $website ) : ?>
							<a href="<?php echo esc_url( $website ); ?>" target="_blank" class="website-icon">Website or Blog</a>
						<?php
						endif; ?>
					</div>
					所属 : <?php if ( $belong_link ) { ?><a target="_blank" href="<?php echo $belong_link; ?>"><?php }  the_field( 'session_speaker_belong' ); if ( $belong_link ) { ?></a><?php } ?><br>
					<?php the_field( 'session_description' ) ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php
		if ( get_field( 'session_server' ) ) : ?>


		<?php
		while( has_sub_field( 'session_server' ) ) :
			$server_name                 = get_sub_field( 'session_server_name' );
			$session_server_belong       = get_sub_field( 'session_server_belong' );
			$session_server_belong_link  = get_sub_field( 'session_speaker_belong_link' );
			$session_server_profile      = get_sub_field( 'session_server_profile' );
			$session_server_facebook     = get_sub_field( 'session_server_facebook' );
			$session_server_twitter      = get_sub_field( 'session_server_twitter' );
			$session_server_website      = get_sub_field( 'session_server_website' );
			$session_server_image        = get_sub_field( 'session_server_image' );
		?>

		<div class="speaker-block">
			<h3 class="speaker-title">
<!-- 				進行役紹介 -->
				スピーカー（進行役）紹介
			</h3>
			<div class="speaker-contents clearfix">
				<div class="col-lg-3 col-md-3 col-xs-12 text-left">
					<?php echo wp_get_attachment_image( $session_server_image, 'full', false, array( 'class' => 'thumbnail img-responsive','style="margin-top: 20px"' ) ); ?>
				</div>
				<div class="col-lg-9 col-md-9 col-xs-12">
					<h4><?php echo esc_html( $server_name )  ?></h4>
					<div class="social-icon">
						<?php
						if ( $session_server_facebook ) : ?>
							<a href="<?php echo esc_url( $session_server_facebook ) ?>" target="_blank" class="facebook-icon">Facebook</a>
						<?php
						endif;
						if ( $session_server_twitter ) : ?>
							<a href="<?php echo esc_url( $session_server_twitter ); ?>" target="_blank" class="twitter-icon">Twitter</a>
						<?php
						endif;
						if ( $session_server_website ) : ?>
							<a href="<?php echo esc_url( $session_server_website ); ?>" target="_blank" class="website-icon">Website or Blog</a>
						<?php
						endif; ?>
					</div>
					所属 : <?php if ( $session_server_belong_link ) { ?><a target="_blank" href="<?php echo $session_server_belong_link; ?>"><?php }; echo $session_server_belong; if ( $session_server_belong_link ) { ?></a><?php } ?><br>
					<?php echo $session_server_profile; ?>
				</div>
			</div>
		</div>

		<?php endwhile; ?>

	<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wordfes2014' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php the_content(); ?>

</article><!-- #post-## -->

<?php if ( is_user_logged_in() ) { ?>
	<footer class="entry-footer">
		<?php edit_post_link( __( '編集', 'wordfes2014' ), '<span class="edit-link btn btn-default">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
<?php
} ?>
