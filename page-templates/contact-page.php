<?php
/**
 * Template Name: Contact Page
 *
 * @package _s
 */

get_header(); ?>

	<?php /* Headline */
	if ( get_field( 'custom_heading' ) ) {
		// set up hero background
		$bg_image = _s_thumb_img_url( 'large' ); ?>
		<div class="text-hero<?php if ( !empty( $bg_image ) ): echo ' has_bg contrast'; endif; ?>" style="background-image: url('<?php echo $bg_image; ?>');">
			<h1 class="xl-heading"><?php the_field( 'custom_heading' ); ?></h1>
		</div>
	<?php } ?>

	<div class="container">
		<div class="row">

			<div class="col-sm-offset-1 col-sm-10">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header<?php if ( get_field( 'custom_heading' ) ): echo ' hidden'; endif; ?>">
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								</header><!-- .entry-header -->

								<div class="entry-content<?php if ( get_field( 'custom_heading' ) ): echo ' no-top-margin'; endif; ?>">
									<?php the_content(); ?>

									<div class="row contact-area">
										<?php /* Forms */
										if ( get_field( 'contact_forms' ) ) {
											// set forms to a variable
											$forms = get_field( 'contact_forms' ); ?>
											<div class="col-md-6 contact-form">
												<?php echo $forms[0]; ?>
											</div>
										<?php } ?>

										<?php /* Map */
										if ( get_field( 'google_map' ) ) { ?>
											<div class="col-md-6">
												<?php get_template_part( 'partials/content', 'map' ); ?>
											</div>
										<?php } ?>

										<?php
											wp_link_pages( array(
												'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
												'after'  => '</div>',
											) );
										?>
									</div>
								</div><!-- .entry-content -->
							</article><!-- #post-## -->

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>

		</div><!-- .row -->
	</div><!-- .container -->

<?php get_footer(); ?>
