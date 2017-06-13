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
					<?php /* translators: Title for search results page */ ?>
					<h2 class="page-title"><?php printf( esc_html_x( 'Search Results for: %s', 'search results', 'wp-foundation-six' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</section>

<?php get_footer(); ?>
