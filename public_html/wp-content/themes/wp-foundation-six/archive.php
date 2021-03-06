<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

get_header(); ?>

	<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

	<div class="row">

		<main class="medium-8 columns" id="content">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

					<?php

						/**
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php
					/**
					 * The posts pagination function outputs a set of page
					 * numbers with links to the previous and next pages of posts.
					 *
					 * @link https://codex.wordpress.org/Function_Reference/the_posts_pagination
					 */
					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => __( 'Back', 'wp_foundation_six' ),
							'next_text' => __( 'Next', 'wp_foundation_six' ),
							'type'      => 'list',
						)
					);
				?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
