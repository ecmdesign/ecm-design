<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content<?php if ( get_field( 'custom_heading' ) ): echo ' no-top-padding'; endif; ?>">

		<div class="container">
			<div class="row">

				<div class="col-sm-10">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'partials/content', 'page' ); ?>

							<?php endwhile; // end of the loop. ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div>

			</div><!-- .row -->
		</div><!-- .container -->

	<?php get_footer(); ?>
