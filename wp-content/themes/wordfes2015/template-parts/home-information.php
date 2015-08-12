<?php
/**
 * social.php
 *
 * @package WordFes Nagoya 2015
 */
?>

<div class="information">
	<div class="topics-column col-md-6 col-xs-12">
		<h1 class="entry-title">トピックス</h1>
		<?php
		$post_status = ( is_user_logged_in() ) ? array('publish', 'draft') : array('publish');
		$args = array(
			'post_type'      => 'topics',
			'posts_per_page' => 5,
			'post_status'    => $post_status,
		);
		$topics = new WP_Query( $args );
		if ( $topics->have_posts() ):
		?>
		<ul>
		<?php
			while ( $topics->have_posts() ): $topics->the_post();
		?>
			<li>
				<span class="date col-md-3 col-xs-3"><?php the_time('Y/m/d'); ?></span>
				<span class="title col-md-9 col-xs-9"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
			</li>
		<?php	
			endwhile;
			wp_reset_postdata();
		?>
		</ul>
		<?php
		else:
		?>
		<p>トピックスはありません。</p>
		<?php
		endif;
		?>
		<div class="text-right"><a href="/topics/"><img src="<?php echo esc_url( get_template_directory_uri() .'/images/topics_button.png' ); ?>" alt="トピックス一覧" width="135" height="20" /></a></div>
	</div><!-- .topics-column -->
	<div class="news-column col-md-6 col-xs-12">
		<h1 class="entry-title">ブログ</h1>
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 5,
			'post_status'    => $post_status,
		);
		$blogs = new WP_Query( $args );
		if ( $blogs->have_posts() ):
		?>
		<ul>
		<?php
			while ( $blogs->have_posts() ): $blogs->the_post();
		?>
			<li>
				<span class="date col-md-3 col-xs-3"><?php the_time('Y/m/d'); ?></span>
				<span class="title col-md-9 col-xs-9"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
			</li>
		<?php	
			endwhile;
			wp_reset_postdata();
		?>
		</ul>
		<?php
		else:
		?>
		<p>ブログはありません。</p>
		<?php
		endif;
		?>
		<div class="text-right"><a href="/blog/"><img src="<?php echo esc_url( get_template_directory_uri() .'/images/blog_button.png' ); ?>" alt="ブログ一覧" width="162" height="20" /></a></div>
	</div><!-- .news-column -->
</div><!-- .container -->