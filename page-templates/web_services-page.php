<?php
/**
 * Template Name: Web Services Page
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
			<div class="col-sm-12">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content">
									<?php the_content(); ?>
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

			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

	<?php /* Features */
	if ( have_rows( 'website_features' ) ) { ?>
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="feature-list">
						<?php // loop through the rows
						while( have_rows( 'website_features' ) ): the_row(); ?>
							<div class="col-sm-4">
								<div class="feature">
									<?php /* Title */
									if ( get_sub_field( 'feature_title' ) ) { ?>
										<h4><?php the_sub_field( 'feature_title' ); ?></h4>
									<?php } ?>

									<?php /* Text */
									if ( get_sub_field( 'feature_text' ) ) {
										$feat_text = get_sub_field( 'feature_text' );
										echo wpautop( $feat_text );
									} ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

<?php get_footer(); ?>