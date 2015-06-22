<?php
/**
 * The template for displaying front-page.
 * 
 * @package WordFes Nagoya 2015
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		//　固定ページのスラッグが'home'の親ページと子ページを表示する
		$page_slug =  get_page_by_path( 'home' );
		if ( ! empty( $page_slug ) ) {
			$parent_ID = $page_slug->ID;
			$page_home[] = $parent_ID;

			$wfn_wp_query = new WP_Query();
			$wfn_wp_pages = $wfn_wp_query->query( array(
				'post_type' => 'page',
				'nopaging'  => 'true'
			) );

			$page_children = get_page_children( $parent_ID, $wfn_wp_pages );

			if ( ! empty( $page_children ) ) {
				foreach ( $page_children as $children ) {
					$page_home[] = $children->ID;
				}
			}

			$args = array(
				'sort_column' => 'menu_order', // 固定ページの順序でソート
				'sort_order'  => 'asc',
				'include' => $page_home,
				'post_type' => 'page',
			);

			$wfnposts = get_pages( $args );

			foreach( $wfnposts as $post ) {
				setup_postdata( $post ) ;
				get_template_part( 'template-parts/content', 'home' );
			}
		} ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>