<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

?>

<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		/**
		 * Displays page-links for paginated posts
		 *
		 * @link: https://codex.wordpress.org/Function_Reference/wp_link_pages
		 */
		wp_link_pages(
			array(
				'before' => '<div class="page-links">Pages: ',
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry-footer">
		<?php
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
			'', /* ID */
			'button' /* class name */
		);
		?>
	</footer>
</article>
