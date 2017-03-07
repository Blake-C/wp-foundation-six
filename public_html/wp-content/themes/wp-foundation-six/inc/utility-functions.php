<?php
/**
 * wp_foundation_six utility functions
 *
 * @package wp_foundation_six
 */

/**
 * Check & Load jQuery on CDN
 *
 */
if ( !function_exists('wp_foundation_six_get_jquery_cdn') ){
	function wp_foundation_six_get_jquery_cdn( $options ) {
		// Deregister the jquery version bundled with wordpress && add newer
		wp_deregister_script( 'jquery' );

		// /* IF IE 8 */
		if( !preg_match('/(?i)msie [6-8]/',$_SERVER['HTTP_USER_AGENT']) ) {
			wp_register_script( 'jquery', get_template_directory_uri() . $options['modern_jquery_local'], false, null, true );
		} else {
			wp_register_script( 'jquery', $options['legacy_jquery_cdn'], false, null, true );
			wp_enqueue_style( 'foundation-IE8-columns', get_template_directory_uri() . '/assets/css/ie8-grid-support.css' );
		}

		// Reregister jQuery
		wp_enqueue_script( 'jquery' );
	}
}

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
