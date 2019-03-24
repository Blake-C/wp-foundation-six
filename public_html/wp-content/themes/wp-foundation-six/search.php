<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wp_foundation_six
 */

get_header(); ?>

	<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

	<section class="row">

		<main class="medium-8 columns" id="content">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h2 class="page-title">
						<?php
							printf(
								// translators: Title for search results page.
								esc_html_x(
									'Search Results for: %s',
									'Search results title',
									'wp_foundation_six'
								),
								'<span>' . get_search_query() . '</span>'
							);
						?>
					</h2>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
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

	</section>

<?php get_footer(); ?>
