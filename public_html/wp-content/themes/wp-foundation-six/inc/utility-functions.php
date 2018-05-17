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

if ( ! function_exists( 'wfs_cache_bust' ) ) {
	/**
	 * Gets the time when the content of the file was changed.
	 *
	 * @method wfs_cache_bust
	 * @param  string $src Path to files to get time last changed.
	 * @return string      Returns the time when the data blocks of a file were being written to, that is, the time when the content of the file was changed.
	 */
	function wfs_cache_bust( $src ) {
		$cache_bust = filemtime( realpath( '.' . wp_parse_url( $src, PHP_URL_PATH ) ) );

		return $cache_bust;
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

if ( ! function_exists( 'theme_error_log' ) ) {
	/**
	 * Custom theme error logging
	 *
	 * @method theme_error_log
	 * @param  string          $message Message to pass to error log
	 */
	function theme_error_log( $message ) {
		$time_stamp = new DateTime( 'NOW' );
		$time_stamp->setTimezone( new DateTimeZone( 'America/Chicago' ) );
		$error_time  = $time_stamp->format( 'F j, Y @ G:i:s' );
		$dir         = get_template_directory();
		$message_log = "<-------->\n" . $error_time . "\n" . $message . "\n\n";

		error_log( $message_log, 3, $dir . '/theme-error.log'); // @codingStandardsIgnoreLine
	}
}
