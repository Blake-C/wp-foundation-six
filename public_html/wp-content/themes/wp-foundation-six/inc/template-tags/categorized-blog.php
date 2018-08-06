<?php
/**
 * Categorized Blog
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_categorized_blog' ) ) {
	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function wp_foundation_six_categorized_blog() {
		$all_the_cool_cats = get_transient( 'wp_foundation_six_categories' );

		if ( false === $all_the_cool_cats ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories(
				array(
					'fields'     => 'ids',
					'hide_empty' => 1,
					// We only need to know if there is more than one category.
					'number'     => 2,
				)
			);

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'wp_foundation_six_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so wp_foundation_six_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so wp_foundation_six_categorized_blog should return false.
			return false;
		}
	}
}
