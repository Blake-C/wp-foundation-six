<?php
/**
 * The template for displaying meta information for the current post-date/time and author.
 *
 * @package wp_foundation_six
 */


if ( ! function_exists( 'wp_foundation_six_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function wp_foundation_six_posted_on() {
		// Posted on.
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: The post publish date */
			esc_html_x( 'Posted: %s', 'post date', 'wp_foundation_six' ),
			$time_string
		);
		$posted_on_string = '<span class="posted-on post-meta">' . $posted_on . '</span>';

		// Updated on.
		$updated_on_string = '';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string_updated = '<time class="updated" datetime="%1$s">%2$s</time>';
			$time_string_updated = sprintf(
				$time_string_updated,
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$updated_on = sprintf(
				/* translators: The post updated date */
				esc_html_x( 'Updated: %s', 'updated date', 'wp_foundation_six' ),
				$time_string_updated
			);

			$updated_on_string = ' <span class="updated-on post-meta">' . $updated_on . '</span>';
		}

		// Author.
		$byline = sprintf(
			/* translators: The post author, byline */
			esc_html_x( 'by %s', 'post author', 'wp_foundation_six' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<p>' . $posted_on_string . $updated_on_string . '<span class="byline post-meta"> ' . $byline . '</span></p>'; // WPCS: XSS OK.
	}
}
