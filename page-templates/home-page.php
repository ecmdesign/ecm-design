<?php
/**
 * Template Name: Home Page
 *
 * @package _s
 */

get_header(); ?>

	<?php /* Hero Section */
	if ( get_field( 'hero_text' ) && get_field( 'hero_image' ) ) {
		get_template_part( 'partials/home/hero', 'section' );
	} ?>

	<?php /* Services Section */
	if ( get_field( 'services_headline' ) && have_rows( 'services' ) ) {
		get_template_part( 'partials/home/services', 'section' );
	} ?>

	<?php /* Work Section */
	if ( have_rows( 'work_items' ) ) {
		get_template_part( 'partials/home/work', 'section' );
	} ?>

	<?php /* Clients Section */
	if ( get_field( 'clients_headline' ) && have_rows( 'clients' ) ) {
		get_template_part( 'partials/home/clients', 'section' );
	} ?>

<?php get_footer(); ?>
