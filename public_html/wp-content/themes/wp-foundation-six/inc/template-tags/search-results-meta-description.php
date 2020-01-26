<?php
/**
 * The template for displaying meta information for the current post-date/time and author.
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wpfs_search_results_meta_description' ) ) {
	/**
	 * By default the WordPress seach results page does not inlcude a meta
	 * description. This function will take the output of the get_search_query
	 * and add it to the pages meta description.
	 */
	function wpfs_search_results_meta_description() {
		if ( is_search() ) {
			$wpfs_search_page_meta_description = sprintf(
				// translators: Title for search results page.
				esc_html_x(
					'Search Results for: %s',
					'Search results for search page meta description',
					'wp_foundation_six'
				),
				get_search_query()
			);

			echo '<meta name="description" content="' . $wpfs_search_page_meta_description . '" />'; // phpcs:ignore
		}
	}
}
