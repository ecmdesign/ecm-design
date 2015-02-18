<?php
/**
 * The template for displaying all single posts.
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div class="container">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<h1 class="entry-title xl-heading">Work</h1>
						</header><!-- .entry-header -->

						<?php /* Work Nav */
						get_template_part( 'templates/work/work', 'single_nav' ); ?>

						<div class="row">
							<div class="col-md-4 col-md-push-8">
								<div class="entry-content">
									<h4 class="accent-heading">Overview</h4>
										<div class="item-info">
											<?php the_content(); ?>

											<h4 class="accent-heading">Solutions</h4>
											<?php // get list of categories
											$terms = get_the_terms( $post->ID, 'work_category' ); ?>
											<ul class="work-cats">
												<?php // loop through categories
												foreach( $terms as $term ) { ?>
													<li>
														<a href="<?php echo get_term_link( $term->term_id, 'work_category' ); ?>"><?php echo $term->name; ?></a>
													</li>
												<?php } ?>
											</ul>

											<?php /* Item Link */
											if ( get_field( 'item_link' ) ) { ?>
												<h4 class="accent-heading">Website</h4>
												<a href="<?php the_field( 'item_link' ); ?>" target="_blank"><?php the_field( 'item_link' ); ?></a>
											<?php } ?>
										</div>
								</div><!-- .entry-content -->
							</div>
							<div class="col-md-8 col-md-pull-4">
								<?php /* More Images */
								if ( have_rows( 'item_images' ) ) { ?>
									<?php // loop through the images
									while( have_rows( 'item_images' ) ): the_row();
										// set image to variable
										$misc_img = get_sub_field( 'image' );
										$img_alt = $misc_img['alt'];
										$img_full = $misc_img['url'];
										$img_lg = $misc_img['sizes']['large']; ?>

										<a class="swipebox" href="<?php echo $img_full; ?>" alt="<?php echo $img_alt; ?>">
											<img class="work-image" src="<?php echo $img_lg; ?>" />
										</a>
									<?php endwhile; ?>
								<?php } ?>
							</div>
						</div><!-- .row -->

						<!-- Navigation -->
						<div class="work-nav work-nav_bottom">
							<?php next_post_link( '<div class="work-next">%link</div>', '<span>%title</span>', '', '' ); ?>
							<div class="work-home">
								<?php // create link to work page
								$work = get_page_by_path( 'work' );
								$work_link = get_permalink( $work->ID ); ?>

								<a href="<?php echo $work_link; ?>"></a>
							</div>
							<?php previous_post_link( '<div class="work-prev">%link</div>', '<span>%title</span>', '', '' ); ?>
						</div>

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .container -->

		<script>
		jQuery(window).ready(function($){
			$('.swipebox').swipebox();
		});
		</script>

	<?php get_footer(); ?>
