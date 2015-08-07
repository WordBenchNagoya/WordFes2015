<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordFes Nagoya 2015
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wordfes2015' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="main-image">
			<div class="site-branding">
				<?php
				$main_image = 'header-main.png';
				if( ! ( is_home() || is_front_page() || wordfes2015_is_mobile() ) ) {
					$main_image = 'header-sub.png';
				}
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $main_image; ?>" alt="<?php bloginfo( 'description' ); ?> <?php bloginfo( 'name' ); ?>" /></a></h1>

				<?php
				if ( is_single() ):
				/* シングルページ用のソーシャルボタン */
				get_template_part( 'template-parts/social', 'single' );
				else:
				/* サイト用のソーシャルボタン */
				get_template_part( 'template-parts/social' );
				endif;?>
			</div><!-- .site-branding -->
		</div><!-- .main-image -->

		<nav id="site-navigation" class="main-navigation lato" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wordfes2015' ); ?></button>
			<div class="navigation-menu">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'nav-menu',
					'menu_id'        => 'primary-menu',
					'depth'          => 2,
				) ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">