<?php

/**
 * Custom Excerpt Length.
 *
 * @link https://codex.wordpress.org/Function_Reference/the_excerpt
 */
if ( ! function_exists( 'wp_foundation_six_custom_excerpt_length' ) ) {
	function wp_foundation_six_custom_excerpt_length( $length ) {
		return 30;
	}
}
add_filter( 'excerpt_length', 'wp_foundation_six_custom_excerpt_length', 999 );
