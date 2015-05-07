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

	<?php get_footer(); ?>
