<?php
/**
 * Template Name: Home Page
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<?php /* Hero Section */
		get_template_part( 'templates/home/section', 'hero' ); ?>

		<div id="home-sections">
			<?php /* About Section */
			if ( get_field( 'enable_about' ) ) {
				get_template_part( 'templates/home/section', 'about' );
			} ?>

			<?php /* Services Section */
			if ( get_field( 'enable_services' ) ) {
				get_template_part( 'templates/home/section', 'services' );
			} ?>

			<?php /* Work Section */
			if ( get_field( 'enable_work' ) ) {
				get_template_part( 'templates/home/section', 'work' );
			} ?>

			<?php /* More Work Section */
			if ( get_field( 'enable_more_work' ) ) {
				get_template_part( 'templates/home/section', 'more_work' );
			} ?>

			<?php /* Testimonials Section */
			if ( get_field( 'enable_testimonials' ) ) {
				get_template_part( 'templates/home/section', 'testimonials' );
			} ?>

			<?php /* Clients Section */
			if ( get_field( 'enable_clients' ) ) {
				get_template_part( 'templates/home/section', 'clients' );
			} ?>

			<?php /* Contact Section */
			if ( get_field( 'enable_contact' ) ) {
				get_template_part( 'templates/home/section', 'contact' );
			} ?>
		</div>

		<script>
		jQuery(window).ready(function($){
			/* Testimonials */
			$('.tst-slider').glide({
				autoplay: 7000,
				hoverpause: true,
				arrows: false,
				navigation: false,
				keyboard: true
			});

			/* Smooth Scroll */
			$('.slide-area_more a').click(function(e) {
				// hat tip: http://goo.gl/Najtl
				e.preventDefault();
				var target = this.hash;
				var $target = $(target);
				$('html, body').stop().animate({
					'scrollTop': $target.offset().top
				}, 750, 'swing' );
			});
		});
		</script>

	<?php get_footer(); ?>
