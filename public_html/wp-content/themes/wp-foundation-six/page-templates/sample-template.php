<?php
/**
 * Template Name: Sample Page Template
 *
 * @package wp_foundation_six
 *
 * Be sure to properly translate any hard coded strings using
 * a translation function in case the theme needs to be
 * translated.
 *
 * @link https://codex.wordpress.org/I18n_for_WordPress_Developers
 * @link https://codex.wordpress.org/Function_Reference/esc_html_x
 */

get_header(); ?>

	<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

	<div class="row columns">
		<h2><?php echo esc_html_x( 'Hello World', 'Sample page template greeting', 'wp_foundation_six' ); ?></h2>
	</div>

<?php get_footer(); ?>
