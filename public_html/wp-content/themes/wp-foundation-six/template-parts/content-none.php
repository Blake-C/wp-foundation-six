<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

?>

<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title">Nothing Found</h2>
	</header>

	<div class="page-content">
		<?php if ( is_search() ) : ?>

			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>

			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</section>
