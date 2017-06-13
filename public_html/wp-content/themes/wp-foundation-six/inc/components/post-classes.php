<?php

/**
 * Remove sticky classes from posts as that class is used by foundation to absolute position elements
 *
 * @link https://wordpress.org/support/topic/remove-classes-from-post_class
 */
if ( ! function_exists( 'wp_foundation_six_post_classes' ) ) {
	function wp_foundation_six_post_classes( $classes ) {
		$classes = array_diff( $classes, array( 'sticky' ) );
		$classes[] = 'sticky-post';

		return $classes;
	}
}
add_filter( 'post_class','wp_foundation_six_post_classes' );
