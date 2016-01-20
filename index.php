<?php

/**
 *
 * WordPress bootstrap
 *
 * This part is relatively simple. We’re going to install WordPress into 
 * the public/wp subdirectory, so we need to tell our webserver where to 
 * find WordPress. As everything is routed through the main index.php 
 * file (see .htaccess) we can simply create a bootstrap index.php file 
 * with the following contents:
*/

define( 'WP_USE_THEMES', true );

require( './wp/wp-blog-header.php' );
