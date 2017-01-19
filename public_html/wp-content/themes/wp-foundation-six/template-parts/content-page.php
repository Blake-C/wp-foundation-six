<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

?>

<?php wp_foundation_six_dev_helper( pathinfo(__FILE__, PATHINFO_FILENAME) ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
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
			 * @link: https://codex.wordpress.org/Function_Reference/edit_post_link
			 */
			edit_post_link(
				/* translators: %s: Name of current post */
				sprintf( 'Edit %s', the_title( '<span class="show-for-sr">"', '"</span>', false ) ),
				'<p class="edit-link">',
				'</p>',
				'', // ID
				'button' // Class
			);
		?>
	</footer>
</article>
