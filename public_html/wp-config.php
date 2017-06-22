<?php

// ========================
// These settings match what
// docker will use
// ========================
define( 'DB_NAME', 'wp_foundation_six' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'mysql' );

$table_prefix  = 'wp_';

// ========================
// Turn on Bug Reports
// ========================
if ( ! defined( 'WP_CLI' ) ) {
	define( 'WP_DEBUG_DISPLAY', true );
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_LOG', true );
}

// ========================
// For development use only
// ========================
define( 'AUTH_KEY',         ',7jxG`)ZYM/m1OB6G/&z)gL=oW={,B1-&xcGuySKE.vQh_-fI)j$y^222Hs8cR&W' );
define( 'SECURE_AUTH_KEY',  '=3/+qt|eD2>(|nx@-p|vp&8T*n6;ZKZ1[91m`a^-PbV+wzbiK ,gyNe&iTpHI(+1' );
define( 'LOGGED_IN_KEY',    'Wu5@R=lv&j!.~IMD_D;%gzG>NSYfNG-K B@6wd]cp2|jYCgHV;>dSe[. u|f@2V]' );
define( 'NONCE_KEY',        '=d#!`FCws;6W-z%j%:Jh8@-~U|k[PoA8Lb+.r4yf_fi*1bJXMQm2bu{j@ObTNlSe' );
define( 'AUTH_SALT',        '|~mjb|}FFR~b=jcF--;6.`KEO|wP>f&|+2s-#4]6QzY7o4#^y2&9mabHT..DR<O-' );
define( 'SECURE_AUTH_SALT', '+YmVlzrBIw!kMkq(j3p&5+IU17>+ea[E9ZNdH-*k)(cCc74N^7CVd|ol(*^i]do!' );
define( 'LOGGED_IN_SALT',   'rG9_QAj+~/q2UA*5Fk(Q](/NY&IG}[Z8&uf+Q{;YB/uA0Q.iFU:UW *OCN;|FUi1' );
define( 'NONCE_SALT',       'uBW!%ut#F]]5Etl3MwAi|;9 82#qY9(x:])4BU*y{4BrSHk^hT&E6>m<`)zwsaIs' );

// ========================
// Custom Content Directory
// ========================
if ( ! defined( 'WP_CLI' ) ) {
	define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
	define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );
} else {
	define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
	define( 'WP_CONTENT_URL', 'http://localhost/wp-content' );
}

// ========================
// Custom Plugin Directory
// ========================
if ( ! defined( 'WP_CLI' ) ) {
	define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/wp-content/plugins' );
	define( 'WP_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/plugins' );
} else {
	define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/wp-content/plugins' );
	define( 'WP_PLUGIN_URL', 'http://localhost/wp-content/plugins' );
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

// =======================
// Load WordPress Settings
// =======================
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}
require_once( ABSPATH . 'wp-settings.php' );
