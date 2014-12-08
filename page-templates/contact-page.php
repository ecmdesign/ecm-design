<?php
/**
 * Template Name: Contact Page
 *
 * @package _s
 */

get_header(); ?>

	<?php /* Headline */
	if ( get_field( 'custom_heading' ) ) { ?>
		<div class="text-hero">
			<h1><?php the_field( 'custom_heading' ); ?></h1>
		</div>
	<?php } ?>

	<div class="container">
		<div class="row">

			<div class="col-sm-offset-1 col-sm-10">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content">
									<?php the_content(); ?>

									<div class="row">

									<?php /* Forms */
									if ( get_field( 'contact_forms' ) ) {
										// set forms to a variable
										$forms = get_field( 'contact_forms' ); ?>
										<div class="col-sm-6">
											<?php echo $forms[0]; ?>
										</div>
									<?php } ?>

									<?php /* Map */
									if ( get_field( 'google_map' ) ) {
										get_template_part( 'partials/content', 'map' );
									} ?>

									<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
							</article><!-- #post-## -->

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>

		</div><!-- .row -->
	</div><!-- .container -->

<?php get_footer(); ?>
