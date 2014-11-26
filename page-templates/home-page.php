<?php
/**
 * Template Name: Home Page
 *
 * @package _s
 */

get_header(); ?>

	<?php /* Hero Section */
	if ( get_field( 'enable_hero' ) ) {
		get_template_part( 'partials/home/hero', 'section' );
	} ?>

	<?php /* About Section */
	if ( get_field( 'enable_about' ) ) {
		get_template_part( 'partials/home/about', 'section' );
	} ?>

	<?php /* Services Section */
	if ( get_field( 'enable_services' ) ) {
		get_template_part( 'partials/home/services', 'section' );
	} ?>

	<?php /* Work Section */
	if ( get_field( 'enable_work' ) ) {
		get_template_part( 'partials/home/work', 'section' );
	} ?>

	<?php /* Testimonials Section */
	if ( get_field( 'enable_testimonials' ) ) {
		get_template_part( 'partials/home/testimonials', 'section' );
	} ?>

	<?php /* Clients Section */
	if ( get_field( 'enable_clients' ) ) {
		get_template_part( 'partials/home/clients', 'section' );
	} ?>

	<?php /* Contact Section */
	if ( get_field( 'enable_contact' ) ) {
		get_template_part( 'partials/home/contact', 'section' );
	} ?>

	<script>
	jQuery(window).ready(function($){
		$('.tst-slider').glide({
			autoplay: 7000,
			hoverpause: true,
			arrows: false,
			navigation: false,
			keyboard: true
		});
	});
	</script>

<?php get_footer(); ?>
