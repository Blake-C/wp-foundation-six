<?php
/**
 * The template for displaying meta information for the categories, tags and comments.
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wp_foundation_six_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list && wp_foundation_six_categorized_blog() ) {
				printf( '<p class="cat-links">Posted in %1$s</p>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ) {
				printf( '<p class="tags-links">Tagged %1$s</p>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<p class="comments-link">';
			comments_popup_link( 'Leave a comment', '1 Comment', '% Comments' );
			echo '</p>';
		}

		/**
		 * Displays a link to edit the current post, if a user is logged in and allowed to edit the post.
		 *
		 * @link: https://codex.wordpress.org/Function_Reference/edit_post_link
		 */
		edit_post_link(
			/* translators: %s: Name of current post */
			sprintf( esc_html_x( 'Edit %s', 'button to edit page or post', 'wp_foundation_six' ), the_title( '<span class="show-for-sr">"', '"</span>', false ) ),
			'<p class="edit-link">',
			'</p>',
			'', // ID.
			'button' // Class Name.
		);
	}
}// End if().
