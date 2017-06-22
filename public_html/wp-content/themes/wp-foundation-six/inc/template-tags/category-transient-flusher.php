<?php

/**
 * Flush out the transients used in wp_foundation_six_categorized_blog.
 */
if ( ! function_exists( 'wp_foundation_six_category_transient_flusher' ) ) {
	function wp_foundation_six_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		delete_transient( 'wp_foundation_six_categories' );
	}
}
add_action( 'edit_category', 'wp_foundation_six_category_transient_flusher' );
add_action( 'save_post',     'wp_foundation_six_category_transient_flusher' );
