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
if ( !function_exists('wp_foundation_six_get_http_response_code') ){
	function wp_foundation_six_get_http_response_code( $theURL ) {
		$headers = get_headers( $theURL);
		return substr( $headers[0], 9, 3 );
	}
}


/**
 * Check & Load jQuery on CDN
 *
 */
if ( !function_exists('wp_foundation_six_get_jquery_cdn') ){
	function wp_foundation_six_get_jquery_cdn( $options ) {
		// Deregister the jquery version bundled with wordpress && add newer
		wp_deregister_script( 'jquery' );

		// /* IF IE 8 */
		if( !preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ) {
			// Load jQuery from cdn if available
			if ( wp_foundation_six_get_http_response_code( $options['modern_jquery_cdn'] ) == 200 ) {
				wp_register_script( 'jquery', $options['modern_jquery_cdn'], false, null, true );
			} else {
				wp_register_script( 'jquery', get_template_directory_uri() . $options['modern_jquery_local'], false, null, true );
			}
		} else {
			// Load jQuery from cdn if available
			if ( wp_foundation_six_get_http_response_code( $options['legacy_jquery_cdn'] ) == 200 ) {
				wp_register_script( 'jquery', $options['legacy_jquery_cdn'], false, null, true );
			} else {
				wp_register_script( 'jquery', get_template_directory_uri() . $options['legacy_jquery_local'], false, null, true );
			}

			wp_enqueue_style( 'foundation-IE8-columns', get_template_directory_uri() . '/css/ie8-grid-support.css' );
		}

		// Reregister jQuery
		wp_enqueue_script( 'jquery' );
	}
}


/**
 * Check & Load on CDN
 *
 */
if ( !function_exists('wp_foundation_six_get_cdn_asset') ){
	function wp_foundation_six_get_cdn_asset( $handle, $cdnLocation, $localLocation, $deps, $ver, $in_footer ) {
		// Load from cdn if available
		if ( wp_foundation_six_get_http_response_code( $cdnLocation ) == 200 ) {
			wp_enqueue_script( $handle, $cdnLocation, $deps, $ver, $in_footer );
		} else {
			wp_enqueue_script( $handle, get_template_directory_uri() . $localLocation, $deps, $ver, $in_footer );
		}
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
			echo '<div id="placeHolderPosition" class="placeHolderPosition">' . $file . '.php</div>';
		}
	}
}


/**
 * Upscale thumbnails when the source image is smaller than the thumbnail size.
 * Retain the aspect ratio.
 *
 * @link http://alxmedia.se/code/2013/10/thumbnail-upscale-correct-crop-in-wordpress/
 */
if ( !function_exists('wp_foundation_six_thumbnail_upscale') ){
	function wp_foundation_six_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
	    if ( !$crop ) return null; // let the wordpress default function handle this

	    $aspect_ratio = $orig_w / $orig_h;
	    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

	    $crop_w = round($new_w / $size_ratio);
	    $crop_h = round($new_h / $size_ratio);

	    $s_x = floor( ($orig_w - $crop_w) / 2 );
	    $s_y = floor( ($orig_h - $crop_h) / 2 );

		if ( is_array( $crop ) ) {

			if ( $crop[ 0 ] === 'left' ) {
				$s_x = 0;
			} elseif ( $crop[ 0 ] === 'right' ) {
				$s_x = $orig_w - $crop_w;
			} elseif ( $crop[ 0 ] === 'center' ) {
				$s_x = ( $orig_w / 2 ) - ( $crop_w / 2 ) ;
			}

			if ( $crop[ 1 ] === 'top' ) {
				$s_y = 0;
			} elseif ( $crop[ 1 ] === 'bottom' ) {
				$s_y = $orig_h - $crop_h;
			} elseif ( $crop[ 1 ] === 'center' ) {
				$s_y = ( $orig_h / 2 ) - ( $crop_h / 2 );
			}

		}

		return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
}
add_filter( 'image_resize_dimensions', 'wp_foundation_six_thumbnail_upscale', 10, 6 );
