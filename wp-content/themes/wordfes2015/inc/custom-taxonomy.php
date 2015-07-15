<?php

/**
 * Custom Taxonomy Settings
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2015
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2015.wordfes.org
 * @copyright  2015 WordBench Nagoya
 * =====================================================
 */

// Hook into the 'init' action
add_action( 'init', 'wordfes2015_taxonomy', 0 );

/**
 * WordFes 2015 All Register taxonomy
 *
 * @return void : register taxonomy
 */
function wordfes2015_taxonomy() {

	/**
	 * suporter category labels
	 * @var array
	 */

	$sponsor_labels = array(
		'name'                       => _x( 'サポーターカテゴリ', 'Taxonomy General Name', 'wordfes2015' ),
		'singular_name'              => _x( 'サポーターカテゴリ', 'Taxonomy Singular Name', 'wordfes2015' ),
		'menu_name'                  => __( 'サポーターカテゴリ', 'wordfes2015' ),
		'all_items'                  => __( 'すべてのサポーターカテゴリ', 'wordfes2015' ),
		'parent_item'                => __( '親サポーターカテゴリ', 'wordfes2015' ),
		'parent_item_colon'          => __( '親サポーターカテゴリ:', 'wordfes2015' ),
		'new_item_name'              => __( '新しいサポーターカテゴリ', 'wordfes2015' ),
		'add_new_item'               => __( '新しいサポーターカテゴリを追加', 'wordfes2015' ),
		'edit_item'                  => __( 'サポーターカテゴリを編集', 'wordfes2015' ),
		'update_item'                => __( 'サポーターカテゴリを更新', 'wordfes2015' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2015' ),
		'search_items'               => __( 'サポーターカテゴリを検索', 'wordfes2015' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2015' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2015' ),
		'not_found'                  => __( 'サポーターカテゴリ見つかりませんでした。', 'wordfes2015' ),
	);
	$sponsor_args = array(
		'labels'                     => $sponsor_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register "sponsor" category
	register_taxonomy( 'suporter_category', array( 'suporter' ), $sponsor_args );

	/**
	 * suporter type labels
	 * @var array
	 */

	$sponsor_type_labels = array(
		'name'                       => _x( 'サポータータイプ', 'Taxonomy General Name', 'wordfes2015' ),
		'singular_name'              => _x( 'サポータータイプ', 'Taxonomy Singular Name', 'wordfes2015' ),
		'menu_name'                  => __( 'サポータータイプ', 'wordfes2015' ),
		'all_items'                  => __( 'すべてのサポータータイプ', 'wordfes2015' ),
		'parent_item'                => __( '親サポータータイプ', 'wordfes2015' ),
		'parent_item_colon'          => __( '親サポータータイプ:', 'wordfes2015' ),
		'new_item_name'              => __( '新しいサポータータイプ', 'wordfes2015' ),
		'add_new_item'               => __( '新しいサポータータイプを追加', 'wordfes2015' ),
		'edit_item'                  => __( 'サポータータイプを編集', 'wordfes2015' ),
		'update_item'                => __( 'サポータータイプを更新', 'wordfes2015' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2015' ),
		'search_items'               => __( 'サポータータイプを検索', 'wordfes2015' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2015' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2015' ),
		'not_found'                  => __( 'サポータータイプ見つかりませんでした。', 'wordfes2015' ),
	);
	$sponsor_type_args = array(
		'labels'                     => $sponsor_type_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register "sponsor" category
	register_taxonomy( 'suporter_type', array( 'suporter' ), $sponsor_type_args );

	/**
	 * Target category labels
	 * @var array
	 */

	$target_labels = array(
		'name'                       => _x( 'ターゲット', 'Taxonomy General Name', 'wordfes2015' ),
		'singular_name'              => _x( 'ターゲット', 'Taxonomy Singular Name', 'wordfes2015' ),
		'menu_name'                  => __( 'ターゲット', 'wordfes2015' ),
		'all_items'                  => __( 'すべてのターゲット', 'wordfes2015' ),
		'parent_item'                => __( '親ターゲット', 'wordfes2015' ),
		'parent_item_colon'          => __( '親ターゲット:', 'wordfes2015' ),
		'new_item_name'              => __( '新しいターゲット', 'wordfes2015' ),
		'add_new_item'               => __( '新しいターゲットを追加', 'wordfes2015' ),
		'edit_item'                  => __( 'ターゲットを編集', 'wordfes2015' ),
		'update_item'                => __( 'ターゲットを更新', 'wordfes2015' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2015' ),
		'search_items'               => __( 'ターゲットを検索', 'wordfes2015' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2015' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2015' ),
		'not_found'                  => __( 'ターゲット見つかりませんでした。', 'wordfes2015' ),
	);
	$target_args = array(
		'labels'                     => $target_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register target category
	register_taxonomy( 'target', array( 'session' ), $target_args );

	/**
	 * Class room category labels
	 * @var array
	 */

	$classroom_labels = array(
		'name'                       => _x( '教室', 'Taxonomy General Name', 'wordfes2015' ),
		'singular_name'              => _x( '教室', 'Taxonomy Singular Name', 'wordfes2015' ),
		'menu_name'                  => __( '教室', 'wordfes2015' ),
		'all_items'                  => __( 'すべての教室', 'wordfes2015' ),
		'parent_item'                => __( '親教室', 'wordfes2015' ),
		'parent_item_colon'          => __( '親教室:', 'wordfes2015' ),
		'new_item_name'              => __( '新しい教室', 'wordfes2015' ),
		'add_new_item'               => __( '新しい教室', 'wordfes2015' ),
		'edit_item'                  => __( '教室', 'wordfes2015' ),
		'update_item'                => __( '教室', 'wordfes2015' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2015' ),
		'search_items'               => __( '教室', 'wordfes2015' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2015' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2015' ),
		'not_found'                  => __( '教室が見つかりませんでした。', 'wordfes2015' ),
	);
	$classroom_args = array(
		'labels'                     => $classroom_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'classroom', array( 'session' ), $classroom_args );

	/**
	 * Class room category labels
	 * @var array
	 */

	$time_zone_labels = array(
		'name'                       => _x( 'タイムゾーン', 'Taxonomy General Name', 'wordfes2015' ),
		'singular_name'              => _x( 'タイムゾーン', 'Taxonomy Singular Name', 'wordfes2015' ),
		'menu_name'                  => __( 'タイムゾーン', 'wordfes2015' ),
		'all_items'                  => __( 'すべてのタイムゾーン', 'wordfes2015' ),
		'parent_item'                => __( '親タイムゾーン', 'wordfes2015' ),
		'parent_item_colon'          => __( '親タイムゾーン:', 'wordfes2015' ),
		'new_item_name'              => __( '新しいタイムゾーン', 'wordfes2015' ),
		'add_new_item'               => __( '新しいタイムゾーン', 'wordfes2015' ),
		'edit_item'                  => __( 'タイムゾーン', 'wordfes2015' ),
		'update_item'                => __( 'タイムゾーン', 'wordfes2015' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2015' ),
		'search_items'               => __( 'タイムゾーン', 'wordfes2015' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2015' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2015' ),
		'not_found'                  => __( 'タイムゾーンが見つかりませんでした。', 'wordfes2015' ),
	);
	$time_zone_args = array(
		'labels'                     => $time_zone_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'timezone', array( 'session' ), $time_zone_args );

	$topics_labels = array(
		'name'                       => _x( 'お知らせカテゴリ', 'Taxonomy General Name', 'wordfes2015' ),
		'singular_name'              => _x( 'お知らせカテゴリ', 'Taxonomy Singular Name', 'wordfes2015' ),
		'menu_name'                  => __( 'お知らせカテゴリ', 'wordfes2015' ),
		'all_items'                  => __( 'すべてのお知らせカテゴリ', 'wordfes2015' ),
		'parent_item'                => __( '親お知らせカテゴリ', 'wordfes2015' ),
		'parent_item_colon'          => __( '親お知らせカテゴリ:', 'wordfes2015' ),
		'new_item_name'              => __( '新しいお知らせカテゴリ', 'wordfes2015' ),
		'add_new_item'               => __( '新しいお知らせカテゴリ', 'wordfes2015' ),
		'edit_item'                  => __( 'お知らせカテゴリ', 'wordfes2015' ),
		'update_item'                => __( 'お知らせカテゴリ', 'wordfes2015' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2015' ),
		'search_items'               => __( 'お知らせカテゴリ', 'wordfes2015' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2015' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2015' ),
		'not_found'                  => __( 'お知らせカテゴリが見つかりませんでした。', 'wordfes2015' ),
	);
	$topics_args = array(
		'labels'                     => $topics_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'topics', array( 'session' ), $topics_args );


}


