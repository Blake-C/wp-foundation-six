<?php
/**
 * Adds wrapping div with custom class
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_div_wrapper' ) ) {
	/**
	 * Adds div with custom class
	 *
	 * @link https://codex.wordpress.org/Shortcode_API
	 *
	 * @param  array  $atts     An associative array of attributes, or an empty string if no attributes are given.
	 * @param  string $content  The enclosed content (if the shortcode is used in its enclosing form).
	 * @param  string $tag      The shortcode tag name.
	 * @return string           Shortcode data
	 */
	function wp_foundation_six_div_wrapper( $atts, $content = null, $tag ) {
		$default_class = '';

		if ( 'column' === $tag ) {
			$default_class = 'medium-6 columns';
		} elseif ( 'row' === $tag ) {
			$default_class = 'row';
		}

		/**
		 * Combines user shortcode attributes with known attributes and fills in defaults when needed
		 *
		 * @param array  $pairs     Entire list of supported attributes and their defaults.
		 * @param array  $atts      User defined attributes in shortcode tag.
		 * @param string $shortcode Optional. The name of the shortcode, provided for context to enable filtering
		 * @return array Combined and filtered attribute list.
		 */
		$attributes = shortcode_atts( array(
			'class' => $default_class,
		), $atts, 'div' );

		return '<div class="' . $attributes['class'] . '">' . do_shortcode( $content ) . '</div>';
	}
}
add_shortcode( 'div', 'wp_foundation_six_div_wrapper' );
add_shortcode( 'row', 'wp_foundation_six_div_wrapper' );
add_shortcode( 'column', 'wp_foundation_six_div_wrapper' );
add_shortcode( 'columns', 'wp_foundation_six_div_wrapper' );
