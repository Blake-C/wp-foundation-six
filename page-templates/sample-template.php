<?php
/**
 * Template Name: Sample Page Template
 *
 *
 */

get_header(); ?>
	
	<?php dev_helper( pathinfo(__FILE__, PATHINFO_FILENAME) ); ?>

	<div class="row columns">
		<h1>Hello World</h1>
	</div>

<?php get_footer(); ?>