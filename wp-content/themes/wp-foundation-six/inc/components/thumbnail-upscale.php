<?php
/**
 * Upscale thumbnails when the source image is smaller than the thumbnail size.
 * Retain the aspect ratio.
 *
 * @link http://alxmedia.se/code/2013/10/thumbnail-upscale-correct-crop-in-wordpress/
 *
 * @package wp_foundation_six
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
