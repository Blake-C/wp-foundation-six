<?php
/**
 * wp_foundation_six utility functions
 *
 * @package wp_foundation_six
 */


/**
 * HTTP Headers repsonse function (200, 404...)
 *
 * @link http://php.net/manual/en/function.get-headers.php
 */
function get_http_response_code( $theURL ) {
	$headers = get_headers( $theURL);
	return substr( $headers[0], 9, 3 );
}


/**
 * Check & Load jQuery on CDN
 *
 */
function get_jquery_cdn( $options ) {
	// Deregister the jquery version bundled with wordpress && add newer
	wp_deregister_script( 'jquery' );

	// /* IF IE 8 */
	if( !preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ) {
		// Load jQuery from cdn if available
		if ( get_http_response_code( $options['modern_jquery_cdn'] ) == 200 ) {
			wp_register_script( 'jquery', $options['modern_jquery_cdn'], false, null, true );
		} else {
			wp_register_script( 'jquery', get_template_directory_uri() . $options['modern_jquery_local'], false, null, true );
		}
	} else {
		// Load jQuery from cdn if available
		if ( get_http_response_code( $options['legacy_jquery_cdn'] ) == 200 ) {
			wp_register_script( 'jquery', $options['legacy_jquery_cdn'], false, null, true );
		} else {
			wp_register_script( 'jquery', get_template_directory_uri() . $options['legacy_jquery_local'], false, null, true );
		}

		wp_enqueue_style( 'foundation-IE8-columns', get_template_directory_uri() . '/css/ie8-grid-support.css' );
	}

	// Reregister jQuery
	wp_enqueue_script( 'jquery' );
}


/**
 * Check & Load on CDN
 *
 */
function get_cdn_asset( $handle, $cdnLocation, $localLocation, $deps, $ver, $in_footer ) {
	// Load from cdn if available
	if ( get_http_response_code( $cdnLocation ) == 200 ) {
		wp_enqueue_script( $handle, $cdnLocation, $deps, $ver, $in_footer );
	} else {
		wp_enqueue_script( $handle, get_template_directory_uri() . $localLocation, $deps, $ver, $in_footer );
	}
}


/**
 * Add async to js URLs
 * Only use asyn on scripts that wont break if they are loaded after
 * the page or other scripts have loaded.
 *
 * @link http://stackoverflow.com/questions/18944027/how-do-i-defer-or-async-this-wordpress-javascript-snippet-to-load-lastly-for-fas
 */
function add_async( $url ) {
	if ( strpos($url, '#async' ) === false ) {
		return $url;
	} else if ( is_admin() ) {
		return str_replace( '#async', '', $url );
	} else {
		return str_replace( '#async', '', $url ) . "' async='async";
	}
}
add_filter( 'clean_url', 'add_async', 11, 1 ); 


function dev_helper( $file ) {
	if ( is_super_admin() ) {
		echo '<div id="placeHolderPosition" class="placeHolderPosition">' . $file . '.php</div>';
	}
}