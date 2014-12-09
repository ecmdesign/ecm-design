<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/icons/favicon-152.png">
<meta name="msapplication-TileColor" content="#333333">
<meta name="msapplication-TileImage" content="<?php bloginfo( 'template_directory' ); ?>/assets/img/icons/favicon-144.png">

<!-- Web fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,500,300,400italic,700' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico">
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>

	<header id="masthead" class="site-header contrast" role="banner">
		<div class="container">
			<div class="row">
				<div class="site-branding">
					<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					</a>
				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
				</nav><!-- #site-navigation -->

				<div class="site-contact">
					<span>Call: <a href="tel:6037787147">603-778-7147</a></span>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
