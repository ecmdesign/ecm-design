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

									<div class="entry-content">
										<?php the_content(); ?>

										<?php /* Work Items */
										$args = array(
											'post_type' => 'work_item',
											'post_status' => 'publish',
											'posts_per_page', '3',
											'orderby' => 'date',
											'order' => 'DESC',
										);
										// create new query
										$the_query = new WP_Query( $args );

										if ( $the_query->have_posts() ) { ?>
											<div class="row">
												<?php // loop through posts
												while( $the_query->have_posts() ): $the_query->the_post();
													get_template_part( 'partials/work', 'image' );
												endwhile; ?>
											</div><!--.row -->
										<?php }
										wp_reset_postdata(); ?>
									</div><!-- .entry-content -->
								</article><!-- #post-## -->

							<?php endwhile; // end of the loop. ?>

						</main><!-- #main -->
					</div><!-- #primary -->

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div><!-- .container -->

	<?php get_footer(); ?>
