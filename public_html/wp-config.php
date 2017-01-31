<?php
ini_set( 'display_errors', 0 );

// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/production-config.php' ) ) {
    define( 'WP_LOCAL_DEV', false );
    include( dirname( __FILE__ ) . '/production-config.php' );
} else {
    define( 'WP_LOCAL_DEV', true );
    include( dirname( __FILE__ ) . '/local-config.php' );
}

define('DISABLE_WP_CRON', true);
define('WP_REDIS_HOST', 'redis');
define('WP_CACHE_KEY_SALT', 'my-redis-salt-');

// ========================
// Prevent Admin Files Access
// ========================
define('DISALLOW_FILE_EDIT', true);

// ========================
// Custom Content Directory
// ========================
if ( !defined( 'WP_CLI' ) ) {
	define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
	define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );
} else {
	define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
	define( 'WP_CONTENT_URL', 'http://0.0.0.0:8080/wp-content' );
}

// ========================
// Custom Plugin Directory
// ========================
if ( !defined( 'WP_CLI' ) ) {
	define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/wp-content/plugins' );
	define( 'WP_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/plugins' );
} else {
	define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/wp-content/plugins' );
	define( 'WP_PLUGIN_URL', 'http://0.0.0.0:8080/wp-content/plugins' );
}

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ======================
// Hide errors by default
// ======================
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG', false );

// =========================
// Disable automatic updates
// =========================
define( 'AUTOMATIC_UPDATER_DISABLED', false );

// =======================
// Load WordPress Settings
// =======================
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}
require_once( ABSPATH . 'wp-settings.php' );