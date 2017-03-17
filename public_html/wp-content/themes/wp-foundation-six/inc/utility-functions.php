<?php
/**
 * wp_foundation_six utility functions
 *
 * @package wp_foundation_six
 */

/**
 * Add async to js URLs
 * Only use asyn on scripts that wont break if they are loaded after
 * the page or other scripts have loaded.
 *
 * @link http://stackoverflow.com/questions/18944027/how-do-i-defer-or-async-this-wordpress-javascript-snippet-to-load-lastly-for-fas
 */
if ( !function_exists('wp_foundation_six_add_async') ){
	function wp_foundation_six_add_async( $url ) {
		if ( strpos($url, '#async' ) === false ) {
			return $url;
		} else if ( is_admin() ) {
			return str_replace( '#async', '', $url );
		} else {
			return str_replace( '#async', '', $url ) . "' async='async";
		}
	}
}
add_filter( 'clean_url', 'wp_foundation_six_add_async', 11, 1 );


/**
 * Custom function that helps to identify the template parts of the theme.
 *
*/
if ( !function_exists('wp_foundation_six_dev_helper') ){
	function wp_foundation_six_dev_helper( $file ) {
		if ( is_super_admin() ) {
			echo '<div class="placeHolderPosition" style="top: 0; background: rgb(236, 234, 234); color: rgba(0, 0, 0, 0.4); font-size: 12px; padding: 5px 25px; display: none;">' . $file . '.php</div>';
		}
	}
}


/**
 * To make it easier to write out pre tag for arrays
 *
 */
if ( !function_exists('print_pre') ){
	function print_pre($data) {
		echo '<pre>';
			print_r($data);
		echo '</pre>';
	}
}
