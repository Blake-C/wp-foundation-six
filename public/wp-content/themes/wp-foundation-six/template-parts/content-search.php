<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

?>

<?php wp_foundation_six_dev_helper( pathinfo(__FILE__, PATHINFO_FILENAME) ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php wp_foundation_six_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php wp_foundation_six_entry_footer(); ?>
	</footer>
</article>
