<?php
/**
 * WP Foundation Six utility functions
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_dev_helper' ) ) {
	/**
	 * Used to help identify template file.
	 *
	 * @method wp_foundation_six_dev_helper
	 * @param  [string] $file - Takes in the file name.
	 */
	function wp_foundation_six_dev_helper( $file ) {
		if ( is_super_admin() && INLINE_DEBUG ) {
			echo '<div class="placeHolderPosition" style="top: 0; background: rgb(236, 234, 234); color: rgba(0, 0, 0, 0.4); font-size: 12px; padding: 5px 25px; display: none;">' . esc_html( $file ) . '.php</div>';
		}
	}
}

if ( ! function_exists( 'print_pre' ) ) {
	/**
	 * Outputs array in HTML pre tags
	 *
	 * @method print_pre
	 * @param  [array] $data - Array to be displayed in pre tags.
	 */
	function print_pre( $data ) {
		echo '<pre>';
			print_r( $data ); // @codingStandardsIgnoreLine
		echo '</pre>';
	}
}
