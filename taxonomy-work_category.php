<?php
/**
 * The template for displaying the work category taxonomy
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<header class="entry-header">
							<h1 class="entry-title">Taxonomy</h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<div class="row">
								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<div class="col-sm-4">
										<div class="work-image">
											<?php /* Image */
											if ( has_post_thumbnail() ) { ?>
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail( 'work-thumb' ); ?>
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
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div><!-- .entry-content -->

					<?php else : ?>

						<?php get_template_part( 'partials/content', 'none' ); ?>

					<?php endif; ?>

					</main><!-- #main -->
				</section><!-- #primary -->

			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

<?php get_footer(); ?>
