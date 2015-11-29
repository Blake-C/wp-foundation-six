<?php
/**
 * The header for our theme.
 *
 * @package wp_foundation_six
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<?php // https://developer.mozilla.org/en-US/docs/Web/HTTP/Controlling_DNS_prefetching ?>
	<?php
		// Use to prefech dns
		// echo '<meta http-equiv="x-dns-prefetch-control" content="on">';
		// echo '<link rel="dns-prefetch" href="//use.typekit.net">';
		// echo '<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">';
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php // https://developer.mozilla.org/en-US/docs/Mozilla/Mobile/Viewport_meta_tag ?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<?php // http://www.validatethis.co.uk/news/fix-bad-value-x-ua-compatible-once-and-for-all/ ?>
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/icons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/icons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/icons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/icons/manifest.json">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/icons/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/icons/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/icons/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/icons/browserconfig.xml">
	<meta name="theme-color" content="#1c2185">
	
	<?php // App Title ?>
	<meta name="apple-mobile-web-app-title" content="<?php echo get_bloginfo('name'); ?>">
	<meta name="application-name" content="<?php echo get_bloginfo('name'); ?>">

	<?php
		/**
		 * Go the extra mile
		 * http://msdn.microsoft.com/en-us/library/ie/gg491732(v=vs.85).aspx -->
		*/
		
		// echo '<meta name="msapplication-tooltip" content="Additional tooltip text">';
		// echo '<meta name="msapplication-window" content="width=1024;height=768">';
		// echo '<meta name="msapplication-starturl" content="./">';
		// echo '<meta name="msapplication-navbutton-color" content="#E72C53">';

		/**
		 * Can this be a standalone web app for ios?
		 * https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html
		*/
		// echo '<meta name="apple-mobile-web-app-capable" content="YES">';
	?>

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri() ?>/js/ie-scripts-min.js"></script>
	<![endif]-->
</head>

<body <?php body_class(); ?>>
	<a class="skip-link show-for-sr" href="#content">Skip to content</a>

	<?php if ( get_bloginfo('name') ) : ?>
		<h1 class="show-for-sr"><?php bloginfo('name'); ?></h1>
	<?php endif; ?>

	<?php if ( get_bloginfo('description') ) : ?>
		<p class="show-for-sr"><?php bloginfo('description'); ?></p>
	<?php endif; ?>

	<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>not</em> supported. <a href="http://browsehappy.com/">Upgrade to a different browser</a> to experience this site.</p><![endif]-->
	
	<?php if ( is_super_admin() ) : ?>
		<a href="#" class="regions">Show Regions</a>
	<?php endif; ?>

	<?php dev_helper( pathinfo(__FILE__, PATHINFO_FILENAME) ); ?>

	<?php
		/**
		 * Consider Creating your own menu rather than using top bar
		*/
	?>

	<div class="row columns hidden" id="main_menu">
		<div class="title-bar" data-responsive-toggle="example_menu" data-hide-for="medium">
			<button class="menu-icon" type="button" data-toggle></button>
			<div class="title-bar-title">Menu</div>
		</div>

		<div class="top-bar" id="example_menu">
			<div class="top-bar-left">
				<?php
					/**
					 * Custom menu
					 * @link https://codex.wordpress.org/Function_Reference/wp_nav_menu
					*/
					$menu_args = array(
						'theme_location'  => 'primary',
						'menu'            => '',
						'container'       => 'false',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'dropdown menu vertical medium-horizontal',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu><li class="menu-text">'. get_bloginfo('name') .'</li>%3$s</ul>',
						'depth'           => 0,
						'walker'          => new UL_Class_Walker()
					);

					wp_nav_menu( $menu_args ); 
				?>
			</div>
		</div>
	</div>
