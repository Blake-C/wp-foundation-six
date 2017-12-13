<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_foundation_six
 */

get_header(); ?>

	<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

	<div class="row">

		<main class="medium-8 columns" id="content">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php
					/**
					 * Displays the navigation to next/previous post, when applicable.
					 *
					 * @link https://developer.wordpress.org/reference/functions/the_post_navigation/
					 */
					the_post_navigation(
						array(
							'prev_text'          => __( 'Previous' ),
							'next_text'          => __( 'Next' ),
							'in_same_term'       => false,
							'taxonomy'           => __( 'post_tag' ),
							'screen_reader_text' => __( 'Continue Reading' ),
						)
					);
				?>

				<?php /* If comments are open or we have at least one comment, load up the comment template. */ ?>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>

			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>
