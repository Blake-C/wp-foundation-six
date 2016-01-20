<?php
/**
 * wp_foundation_six functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_foundation_six
 */

if ( !function_exists('wp_foundation_six_browser_body_class') ){
	function wp_foundation_six_browser_body_class( $classes ) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

		if ( $is_lynx ) {
			$classes[] = 'lynx';
		} elseif ( $is_gecko ) {
			$classes[] = 'gecko';
		} elseif ( $is_opera ) {
			$classes[] = 'opera';
		} elseif ( $is_NS4 ) {
			$classes[] = 'ns4';
		} elseif ( $is_safari ) {
			$classes[] = 'safari';
		} elseif ( $is_chrome ) {
			$classes[] = 'chrome';
		} elseif ( $is_IE ) {
			$classes[] = 'ie';

			if ( preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version) ){
				$classes[] = 'ie' . $browser_version[1];
			}
		} else {
			$classes[] = 'unknown';
		}

		if( $is_iphone ) {
			$classes[] = 'iphone';
		}

		if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
			$classes[] = 'osx';
		} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
			$classes[] = 'linux';
		} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
			$classes[] = 'windows';
		}

		return $classes;
	}
}
add_filter('body_class', 'wp_foundation_six_browser_body_class');
