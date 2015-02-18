<?php
/**
 * The template used for displaying the footer info section
 *
 * @package _s
 */
?>

<!-- Separator -->
<div class="footer-sep"></div>

<!-- Navigation -->
<div class="info-block footer-nav">
	<h4>Navigation</h4>
	<?php wp_nav_menu( array( 'theme_location' => 'footer-nav' ) ); ?>
</div>

<!-- Social list -->
<div class="info-block footer-social">
	<h4>Social</h4>
	<ul>
		<?php if ( get_theme_mod( 'facebook_url' ) ) { ?>
			<li><a href="<?php echo get_theme_mod( 'facebook_url' ); ?>" target="_blank">Facebook</a></li>
		<?php } ?>
		<?php if ( get_theme_mod( 'twitter_url' ) ) { ?>
			<li><a href="<?php echo get_theme_mod( 'twitter_url' ); ?>" target="_blank">Twitter</a></li>
		<?php } ?>
		<?php if ( get_theme_mod( 'gplus_url' ) ) { ?>
			<li><a href="<?php echo get_theme_mod( 'gplus_url' ); ?>" target="_blank">Google+</a></li>
		<?php } ?>
		<?php if ( get_theme_mod( 'linkedin_url' ) ) { ?>
			<li><a href="<?php echo get_theme_mod( 'linkedin_url' ); ?>" target="_blank">LinkedIn</a></li>
		<?php } ?>
	</ul>
</div>

<!-- Location -->
<?php if ( get_theme_mod( 'street_address' ) && get_theme_mod( 'city_state_zip' ) ) {
	$s_address = get_theme_mod( 'street_address' );
	$city_state = get_theme_mod( 'city_state_zip' );
	$map_slug = _s_map_link_slug( $s_address, $city_state ); ?>

	<div class="info-block footer-location">
		<h4>Location</h4>
		<span><?php echo get_theme_mod( 'street_address' ); ?></span>
		<span><?php echo get_theme_mod( 'city_state_zip' ); ?></span>
		<a class="link-small" href="https://www.google.com/maps/place/<?php echo $map_slug; ?>" target="_blank">View our location on map</a>
	</div>
<?php } ?>

<!-- Contact info -->
<?php if ( get_theme_mod( 'phone_number' ) && get_theme_mod( 'contact_email' ) ) {
	// set up phone number and email
	$phone_raw = get_theme_mod( 'phone_number' );
	$phone = _s_phone_number( $phone_raw );
	$email = get_theme_mod( 'contact_email' ); ?>

	<div class="info-block footer-contact">
		<h4>Get in Touch</h4>
		<span><a href="tel:<?php echo $phone; ?>"><?php echo $phone_raw; ?></a></span>
		<span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
	</div>
<?php } ?>

<!-- Social icons -->
<div class="footer-icons">
	<?php if ( get_theme_mod( 'facebook_url' ) ) { ?>
		<a class="facebook icon-facebook" href="<?php echo get_theme_mod( 'facebook_url' ); ?>" target="_blank"></a>
	<?php } ?>
	<?php if ( get_theme_mod( 'twitter_url' ) ) { ?>
		<a class="twitter icon-twitter" href="<?php echo get_theme_mod( 'twitter_url' ); ?>" target="_blank"></a>
	<?php } ?>
	<?php if ( get_theme_mod( 'gplus_url' ) ) { ?>
		<a class="gplus icon-gplus" href="<?php echo get_theme_mod( 'gplus_url' ); ?>" target="_blank"></a>
	<?php } ?>
	<?php if ( get_theme_mod( 'linkedin_url' ) ) { ?>
		<a class="linkedin icon-linkedin" href="<?php echo get_theme_mod( 'linkedin_url' ); ?>" target="_blank"></a>
	<?php } ?>
</div>
