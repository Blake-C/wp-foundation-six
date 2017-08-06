<?php
/**
 * Custom classes to body.
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param string|array $classes - One or more classes to add to the class list.
	 * @return array - Array of classes.
	 */
	function wp_foundation_six_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'wp_foundation_six_body_classes' );
