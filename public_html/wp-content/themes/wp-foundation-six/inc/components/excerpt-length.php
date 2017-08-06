<?php
/**
 * Custom Excerpt Length.
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
 * @link https://codex.wordpress.org/Function_Reference/the_excerpt
 * @link https://core.trac.wordpress.org/browser/tags/4.8/src/wp-includes/formatting.php#L3274
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_custom_excerpt_length' ) ) {
	/**
	 * Filters the number of words in an excerpt.
	 *
	 * @method wp_foundation_six_custom_excerpt_length
	 * @param int $length - The number of words. Default 55.
	 * @return int - Length of excerpt
	 */
	function wp_foundation_six_custom_excerpt_length( $length ) {
		return 30;
	}
}
add_filter( 'excerpt_length', 'wp_foundation_six_custom_excerpt_length', 999 );
