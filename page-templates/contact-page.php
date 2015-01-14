<?php
/**
 * Template Name: Contact Page
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<?php /* Headline */
		if ( get_field( 'custom_heading' ) ) {
			get_template_part( 'partials/custom', 'heading' );
		} ?>

		<div class="container">
			<div class="row">

				<div class="col-sm-offset-1 col-sm-10">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-content">
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
