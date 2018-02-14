<?php
/**
 * Upscale thumbnails when the source image is smaller than the thumbnail size.
 * Retain the aspect ratio.
 *
 * @link http://alxmedia.se/code/2013/10/thumbnail-upscale-correct-crop-in-wordpress/
 * @link https://codex.wordpress.org/Function_Reference/image_resize_dimensions
 * @link https://core.trac.wordpress.org/browser/tags/4.8/src/wp-includes/media.php#L475
 * @link http://php.net/manual/en/function.imagecopyresampled.php
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_thumbnail_upscale' ) ) {
	/**
	 * Upscale thumbnails
	 *
	 * @method wp_foundation_six_thumbnail_upscale
	 * @param null|mixed $default - Whether to preempt output of the resize
	 *                              dimensions.
	 * @param int        $orig_w  - Original pixel width.
	 * @param int        $orig_h  - Original pixel height.
	 * @param int        $new_w   - New pixel width.
	 * @param int        $new_h   - New pixel height.
	 * @param array      $crop    - Crop position.
	 * @return null|array - Null on failure. Returned array matches parameters
	 *                      for `imagecopyresampled()`.
	 */
	function wp_foundation_six_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
		if ( ! $crop ) {
			// let the WordPress default function handle this
			return null;
		}

		$aspect_ratio = $orig_w / $orig_h;
		$size_ratio   = max( $new_w / $orig_w, $new_h / $orig_h );

		$crop_w = round( $new_w / $size_ratio );
		$crop_h = round( $new_h / $size_ratio );

		$s_x = floor( ( $orig_w - $crop_w ) / 2 );
		$s_y = floor( ( $orig_h - $crop_h ) / 2 );

		if ( is_array( $crop ) ) {

			if ( 'left' === $crop[0] ) {
				$s_x = 0;
			} elseif ( 'right' === $crop[0] ) {
				$s_x = $orig_w - $crop_w;
			} elseif ( 'center' === $crop[0] ) {
				$s_x = ( $orig_w / 2 ) - ( $crop_w / 2 );
			}

			if ( 'top' === $crop[1] ) {
				$s_y = 0;
			} elseif ( 'bottom' === $crop[1] ) {
				$s_y = $orig_h - $crop_h;
			} elseif ( 'center' === $crop[1] ) {
				$s_y = ( $orig_h / 2 ) - ( $crop_h / 2 );
			}
		}

		// the return array matches the parameters to imagecopyresampled()
		return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
}// End if().
add_filter( 'image_resize_dimensions', 'wp_foundation_six_thumbnail_upscale', 10, 6 );
