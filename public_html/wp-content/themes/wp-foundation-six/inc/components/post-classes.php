<?php
/**
 * Remove sticky classes from posts
 *
 * @link https://developer.wordpress.org/reference/hooks/post_class/
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_post_classes' ) ) {
	/**
	 * Remove sticky classes from posts as that class is used by foundation to
	 * absolute position elements
	 *
	 * @method wp_foundation_six_post_classes
	 *
	 * @param array $classes - One or more classes to add to the class list.
	 * @param array $class - An array of additional classes added to the post.
	 * @param int   $post_id - The post ID.
	 * @return array - Returns array of post classes
	 */
	function wp_foundation_six_post_classes( $classes, $class, $post_id ) {
		$classes   = array_diff( $classes, array( 'sticky' ) );
		$classes[] = is_sticky( $post_id ) === true ? 'sticky-post' : '';

		return $classes;
	}
}
add_filter( 'post_class', 'wp_foundation_six_post_classes', 10, 3 );
