<?php
/**
 * Plugin Name:  WP Foundation Six
 * Description:  Custom features and functionality that needs to persist outside of the sites theme.
 * Plugin URI:   https://github.com/Blake-C/wp-foundation-six
 * Version:      0.0.0
 * Author:
 * Author URI:
 * Text Domain:  wp_foundation_six
 * License:      GPLv2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package wp_foundation_six
 *
 * WP Foundation Six is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Softwatwitchre Foundation, either version 2 of the License, or
 * any later version.
 *
 * WP Foundation Six is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Regenerate Thumbnails. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WFS_FILES' ) ) {
	define( 'WFS_FILES', __FILE__ );
}

require_once dirname( WFS_FILES ) . '/custom-post-types/sample-post-type.php';
