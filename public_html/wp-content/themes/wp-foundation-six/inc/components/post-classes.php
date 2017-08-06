<?php
/**
 * Remove sticky classes from posts
 *
 * @link https://wordpress.org/support/topic/remove-classes-from-post_class
 * @link https://developer.wordpress.org/reference/functions/post_class/
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_post_classes' ) ) {
	/**
	 * Remove sticky classes from posts as that class is used by foundation to
	 * absolute position elements
	 *
	 * @method wp_foundation_six_post_classes
	 * @param string|array $classes - One or more classes to add to the class list.
	 * @return string|array - Returns the removed class
	 */
	function wp_foundation_six_post_classes( $classes ) {
		$classes = array_diff( $classes, array( 'sticky' ) );
		$classes[] = 'sticky-post';

		return $classes;
	}
}
add_filter( 'post_class','wp_foundation_six_post_classes' );
