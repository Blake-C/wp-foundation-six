<?php
/**
 * wp_foundation_six utility functions
 *
 * @package wp_foundation_six
 */

/**
 * Custom function that helps to identify the template parts of the theme.
 *
*/
if ( ! function_exists( 'wp_foundation_six_dev_helper' ) ) {
	function wp_foundation_six_dev_helper( $file ) {

		if ( is_super_admin() && INLINE_DEBUG ) {
			echo '<div class="placeHolderPosition" style="top: 0; background: rgb(236, 234, 234); color: rgba(0, 0, 0, 0.4); font-size: 12px; padding: 5px 25px; display: none;">' . esc_html( $file ) . '.php</div>';
		}
	}
}


/**
 * To make it easier to write out pre tag for arrays
 *
 */
if ( ! function_exists( 'print_pre' ) ) {
	function print_pre( $data ) {
		echo '<pre>';
			print_r( $data ); // @codingStandardsIgnoreLine
		echo '</pre>';
	}
}
