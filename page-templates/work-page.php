<?php
/**
 * Template Name: Work Page
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title xl-heading">', '</h1>' ); ?>
									</header><!-- .entry-header -->

									<?php /* Work Nav */
									get_template_part( 'templates/work/work', 'cat_nav' ); ?>

									<div class="entry-content">
										<?php the_content(); ?>

										<?php /* Work Items */
										$posts = get_field( 'work_items' );

										// check if items exist
										if ( $posts ): ?>
											<div class="row">
												<?php // loop through the items
												foreach( $posts as $post ):
													// set up the postdata
													setup_postdata( $post );

													// get the work image template
													get_template_part( 'templates/work/work', 'image' );

												// end the loop, reset $posts variable
												endforeach; wp_reset_postdata(); ?>
											</div>
										<?php endif; ?>

									</div><!-- .entry-content -->
								</article><!-- #post-## -->

							<?php endwhile; // end of the loop. ?>

						</main><!-- #main -->
					</div><!-- #primary -->

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div><!-- .container -->

	<?php get_footer(); ?>
