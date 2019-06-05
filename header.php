<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);	
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Warfield and Sanford
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" /><!-- IE Fix -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'warfield_sanford' ); ?></a>
	<div class="site-canvas">
	<header id="masthead" class="site-header" role="banner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img id="logo-main" src="<?php echo get_template_directory_uri() . '/imgs/logo-ws.svg' ?>" alt="<?php echo get_bloginfo() ?>">
		</a>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<a id="call" href="tel:301-575-5355"></a>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
