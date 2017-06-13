<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

?>

<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php wp_foundation_six_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
			the_content(
				sprintf(
					/* translators: %s: Name of current post. */
					wp_kses(
						'Continue reading %s <span class="meta-nav">&rarr;</span>',
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					the_title( '<span class="show-for-sr">"', '"</span>', false )
				)
			);
		?>

		<?php
			/**
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
		<?php wp_foundation_six_entry_footer(); ?>
	</footer>
</article>
