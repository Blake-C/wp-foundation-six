<?php
/**
 * Template Name: Sample Page Template
 *
 *
 */

get_header(); ?>

	<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

	<div class="row columns">
		<h2>Hello World</h2>
	</div>

<?php get_footer(); ?>
