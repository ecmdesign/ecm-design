<?php
/**
 * Template Name: Services Page
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<?php /* Headline */
		if ( get_field( 'custom_heading' ) ) {
			get_template_part( 'templates/content', 'heading' );
		} ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">

					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php if ( get_field( 'custom_heading' ) ) { ?>
											<h1 class="entry-title xl-heading"><?php the_field( 'custom_heading' ); ?></h1>
										<?php } else {
											the_title( '<h1 class="entry-title xl-heading">', '</h1>' );
										} ?>
									</header><!-- .entry-header -->

									<div class="entry-content">
										<?php the_content(); ?>

										<?php /* Service Sections */
										if ( have_rows( 'service_sections' ) ) {
											get_template_part( 'templates/content', 'service_sections' );
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

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div><!-- .container -->

	<?php get_footer(); ?>
