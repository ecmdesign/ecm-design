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
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Open+Sans:400italic,300,600,400' rel='stylesheet' type='text/css'>

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

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="site-branding">
					<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/logo.svg" />
					</a>
				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
				</nav><!-- #site-navigation -->

				<?php /* Contact info */
				if ( get_theme_mod( 'phone_number' ) && get_theme_mod( 'contact_email' ) ) { ?>
				<div class="header-contact">
					<?php // set up phone number and email
					$phone_raw = get_theme_mod( 'phone_number' );
					$phone = _s_phone_number( $phone_raw );
					$email = get_theme_mod( 'contact_email' ); ?>

					<div class="contact-icons">
						<a class="icon-phone icon-phone-circled" href="tel:<?php echo $phone; ?>"></a>
						<a class="icon-email icon-mail-circled" href="mailto:<?php echo $email; ?>"></a>
					</div>

					<div class="contact-text">
						<span>Call: <a href="tel:<?php echo $phone; ?>"><?php echo $phone_raw; ?></a></span>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</header><!-- #masthead -->
