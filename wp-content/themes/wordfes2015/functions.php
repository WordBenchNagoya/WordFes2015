<?php
/**
 * WordFes Nagoya 2015 functions and definitions
 *
 * @package WordFes Nagoya 2015
 */

if ( ! function_exists( 'wordfes2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordfes2015_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WordFes Nagoya 2015, use a find and replace
	 * to change 'wordfes2015' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wordfes2015', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wordfes2015' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wordfes2015_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wordfes2015_setup
add_action( 'after_setup_theme', 'wordfes2015_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordfes2015_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordfes2015_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordfes2015_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wordfes2015_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wordfes2015' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wordfes2015_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordfes2015_scripts() {
	wp_enqueue_style( 'wordfes2015-style', get_stylesheet_uri() );

	// bootstrap
	wp_enqueue_style( 'wordfes2015-bootstrap', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'wordfes2015-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );

	// font
	wp_enqueue_style( 'wordfes2015-g-font', '//fonts.googleapis.com/css?family=Lato:400,700,300' );

	// css
	wp_enqueue_style( 'wordfes2015-layout', get_template_directory_uri().'/css/content-sidebar.css' );
	wp_enqueue_style( 'wordfes2015-common', get_template_directory_uri().'/css/common.css' );
	wp_enqueue_style( 'wordfes2015-suporter', get_template_directory_uri().'/css/suporter.css' );
	wp_enqueue_style( 'wordfes2015-session', get_template_directory_uri().'/css/session.css' );
	wp_enqueue_style( 'wordfes2015-entry', get_template_directory_uri().'/css/form.css' );
	wp_enqueue_style( 'wordfes2015-infromation', get_template_directory_uri().'/css/information.css' );
	wp_enqueue_style( 'wordfes2015-social', get_template_directory_uri().'/css/social.css' );
	wp_enqueue_style( 'wordfes2015-pickup', get_template_directory_uri().'/css/pickup.css' );
	wp_enqueue_style( 'wordfes2015-schedule', get_template_directory_uri().'/css/schedule.css' );

	wp_enqueue_script( 'wordfes2015-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true );

	wp_enqueue_script( 'wordfes2015-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );

	// bootstrap
	wp_enqueue_style( 'wordfes2015-bootstrap-theme', get_template_directory_uri().'/bootstrap/css/bootstrap-theme.min.css' );

	wp_enqueue_script( 'wordfes2015-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true );

	// comment-reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordfes2015_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load original tags.
 */
require get_template_directory() . '/inc/origin-tags.php';

/**
 * Load custom post type.
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Load custom taxonomy.
 */
require get_template_directory() . '/inc/custom-taxonomy.php';

/**
 * Load custom-media-size.
 */
require get_template_directory() . '/inc/custom-media-size.php';
