<?php
/**
 * Template Name: Home Page
 *
 * @package _s
 */

get_header(); ?>

	<?php /* Hero Section */
	if ( get_field( 'hero_headline' ) && get_field( 'hero_text' ) ) {
		get_template_part( 'partials/home/section', 'hero' );
	} ?>

	<?php /* About Section */
	if ( get_field( 'enable_about' ) ) {
		get_template_part( 'partials/home/section', 'about' );
	} ?>

	<?php /* Services Section */
	if ( get_field( 'enable_services' ) ) {
		get_template_part( 'partials/home/section', 'services' );
	} ?>

	<?php /* Work Section */
	if ( get_field( 'enable_work' ) ) {
		get_template_part( 'partials/home/section', 'work' );
	} ?>

	<?php /* More Work Section */
	if ( get_field( 'enable_more_work' ) ) {
		get_template_part( 'partials/home/section', 'more_work' );
	} ?>

	<?php /* Testimonials Section */
	if ( get_field( 'enable_testimonials' ) ) {
		get_template_part( 'partials/home/section', 'testimonials' );
	} ?>

	<?php /* Clients Section */
	if ( get_field( 'enable_clients' ) ) {
		get_template_part( 'partials/home/section', 'clients' );
	} ?>

	<?php /* Contact Section */
	if ( get_field( 'enable_contact' ) ) {
		get_template_part( 'partials/home/section', 'contact' );
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
