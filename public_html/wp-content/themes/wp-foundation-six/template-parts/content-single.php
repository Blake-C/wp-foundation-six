<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

?>

<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-meta">
			<?php wp_foundation_six_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

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
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_foundation_six_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
