<?php
/**
 * @package WordFes Nagoya 2015
 */

if ( ! function_exists( 'wordfes2015_is_mobile' ) ) :
function wordfes2015_is_mobile() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$_ret = true;

	if ( wp_is_mobile() ) {
		if ( preg_match( '/ipad/i', $ua ) ) {
			$_ret = false;
		} elseif ( preg_match( '/Android/i', $ua ) && !( preg_match( '/Mobile/i', $ua ) ) ) {
			$_ret = false;
		}
	} else {
		$_ret = false;
	}
	return $_ret;
}
endif;