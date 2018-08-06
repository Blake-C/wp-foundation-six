<?php
/**
 * Adds copyright info with dynamic year
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_copyright_year' ) ) {
	/**
	 * Adds copyright info with dynamic year
	 *
	 * @link https://codex.wordpress.org/Shortcode_API
	 *
	 * @param  array  $atts     An associative array of attributes, or an empty string if no attributes are given.
	 * @param  string $content  The enclosed content (if the shortcode is used in its enclosing form).
	 * @return string           Shortcode data
	 */
	function wp_foundation_six_copyright_year( $atts, $content = null ) {
		/**
		 * Combines user shortcode attributes with known attributes and fills in defaults when needed
		 *
		 * @param array  $pairs     Entire list of supported attributes and their defaults.
		 * @param array  $atts      User defined attributes in shortcode tag.
		 * @param string $shortcode Optional. The name of the shortcode, provided for context to enable filtering
		 * @return array Combined and filtered attribute list.
		 */
		$attributes = shortcode_atts(
			array(
				'sitename' => get_bloginfo( 'name' ),
			), $atts, 'copyright'
		);

		return '&copy; ' . date( 'Y' ) . ' ' . $attributes['sitename'];
	}
}
add_shortcode( 'copyright', 'wp_foundation_six_copyright_year' );
