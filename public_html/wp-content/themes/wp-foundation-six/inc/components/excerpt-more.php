<?php
/**
 * Custom Excerpt More.
 *
 * @link https://codex.wordpress.org/Function_Reference/the_excerpt
 * @link https://core.trac.wordpress.org/browser/tags/4.8/src/wp-includes/formatting.php#L3274
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_custom_excerpt_more' ) ) {
	/**
	 * Generates an excerpt from the content, if needed.
	 *
	 * @method wp_foundation_six_new_excerpt_more
	 * @param string $more - The string shown within the more link.
	 * @return string The excerpt.
	 */
	function wp_foundation_six_new_excerpt_more( $more ) {
		return '...';
	}
}
add_filter( 'excerpt_more', 'wp_foundation_six_new_excerpt_more' );
