<?php
/**
 * Template for displaying search forms
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_foundation_six
 */
?>

<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

<h2 class="show-for-sr"><?php echo esc_html_x( 'Search Bar', 'Heading for search area, for screen readers', 'wp_foundation_six' ); ?></h2>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="row collapse">
		<div class="small-8 columns">
			<label class="show-for-sr" for="s"><?php echo esc_html_x( 'Search', 'Search field label text', 'wp_foundation_six' ); ?></label>
			<input type="text" placeholder="<?php echo esc_attr_x( 'Search...', 'Search field placeholder attribute', 'wp_foundation_six' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		</div>
		<div class="small-4 columns">
			<input type="submit" class="button expanded" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'Search button value attribute', 'wp_foundation_six' ); ?>" />
		</div>
	</div>
</form>
