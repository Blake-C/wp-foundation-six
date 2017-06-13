<?php

/**
 * Custom Excerpt More.
 *
 * @link https://codex.wordpress.org/Function_Reference/the_excerpt
 */
if ( ! function_exists( 'wp_foundation_six_custom_excerpt_more' ) ) {
	function wp_foundation_six_new_excerpt_more( $more ) {
		return '...';
	}
}
add_filter( 'excerpt_more', 'wp_foundation_six_new_excerpt_more' );
