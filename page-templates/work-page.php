<?php
/**
 * Template Name: Work Page
 *
 * @package _s
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
											while( $the_query->have_posts() ): $the_query->the_post(); ?>
												<div class="col-sm-4 work-image">
													<?php /* Image */
													if ( has_post_thumbnail() ) { ?>
														<a href="<?php the_permalink(); ?>">
															<?php the_post_thumbnail( 'medium' ); ?>
														</a>
													<?php } ?>

													<!-- Title -->
													<h4><?php the_title(); ?></h4>

													<?php /* Categories */
													if ( !empty( get_the_terms( $post->ID, 'work_category' ) ) ) { ?>
														<div class="cats">
															<?php // set up term list w/separators
															$terms = get_the_term_list( $post->ID, 'work_category', '', ' / ', '' );
															echo $terms; ?>
														</div>
													<?php } ?>

													<?php /* Item Link */
													if ( get_field( 'item_link' ) ) { ?>
														<a href="<?php get_field( 'item_link' ); ?>" target="_blank">View the website</a>
													<?php } else { ?>
														<a href="<?php the_permalink(); ?>">View this item</a>
													<?php } ?>
												</div>
											<?php endwhile; ?>
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
