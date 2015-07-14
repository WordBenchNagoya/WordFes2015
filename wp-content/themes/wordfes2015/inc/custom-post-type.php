<?php

/**
 * Custom Post Type Settings
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2015
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2015.wordfes.org
 * @copyright  2015 WordBench Nagoya
 * =====================================================
 */

/**
 * Sponsor Post Type
 * @return void
 */
add_action( 'init', 'wordfes2015_post_type_init' );

function wordfes2015_post_type_init() {

	/**
	 * Sponsor post type
	 * @var array
	 */

	$sponsor_labels = array(
		'name' => 'スポンサー',
		'singular_name' => 'sponsored',
		'add_new' => '新しいスポンサー',
		'add_new_item' => '新しいスポンサーを登録',
		'edit_item' => '新しいスポンサーを編集',
		'new_item' => '新しいスポンサーを登録',
		'all_items' => 'すべてのスポンサー',
		'view_item' => 'スポンサーページを見る',
		'search_items' => 'スポンサーを検索',
		'not_found' =>  'スポンサーは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'スポンサー'
	);

	$sponsor_args = array(
		'labels' => $sponsor_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'sponsored' ),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'author' )
	);

	register_post_type( 'sponsored', $sponsor_args );

	$session_labels = array(
		'name' => 'セッション',
		'singular_name' => 'session',
		'add_new' => '新しいセッション',
		'add_new_item' => '新しいセッションを登録',
		'edit_item' => 'このセッションを編集',
		'new_item' => '新しいセッションを登録',
		'all_items' => 'すべてのセッション',
		'view_item' => 'セッションページを見る',
		'search_items' => 'セッションを検索',
		'not_found' =>  'セッションは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'セッション'
	);

	$session_args = array(
		'labels' => $session_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'session' ),
		'capability_type' => 'page',
		'has_archive' => false,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'session', $session_args );

	$topics_labels = array(
		'name' => 'お知らせ',
		'singular_name' => 'topics',
		'add_new' => '新しいお知らせ',
		'add_new_item' => '新しいお知らせを登録',
		'edit_item' => '新しいお知らせを編集',
		'new_item' => '新しいお知らせを登録',
		'all_items' => 'すべてのお知らせ',
		'view_item' => 'お知らせページを見る',
		'search_items' => 'お知らせを検索',
		'not_found' => 'お知らせは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'お知らせ',
	);

	$topics_args = array(
		'labels' => $topics_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'topics' ),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comment' ),
	);

	register_post_type( 'topics', $topics_args );


	$staff_labels = array(
		'name' => 'スタッフ紹介',
		'singular_name' => 'staff',
		'add_new' => '新しいスタッフ',
		'add_new_item' => '新しいスタッフを登録',
		'edit_item' => '新しいスタッフを編集',
		'new_item' => '新しいスタッフを登録',
		'all_items' => 'すべてのスタッフ',
		'view_item' => 'スタッフページを見る',
		'search_items' => 'スタッフを検索',
		'not_found' => 'スタッフは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'スタッフ紹介',
	);

	$staff_args = array(
		'labels' => $staff_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'staff' ),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title','thumbnail','custom-fields' ),
	);

	register_post_type( 'staff', $staff_args );
}

