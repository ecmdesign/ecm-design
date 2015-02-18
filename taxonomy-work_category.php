<?php
/**
 * The template for displaying the work category taxonomy
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<section id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

						<?php if ( have_posts() ) : ?>

							<header class="entry-header">
								<h1 class="entry-title xl-heading">Work</h1>
							</header><!-- .entry-header -->

							<?php /* Work Nav */
							get_template_part( 'templates/work/work', 'cat_nav' ); ?>

							<div class="entry-content">
								<div class="row">
									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post();

										// get the work image template
										get_template_part( 'templates/work/work', 'image' );

									endwhile; ?>
								</div>
							</div><!-- .entry-content -->

						<?php else : ?>

							<?php get_template_part( 'templates/content', 'none' ); ?>

						<?php endif; ?>

						</main><!-- #main -->
					</section><!-- #primary -->

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div><!-- .container -->

	<?php get_footer(); ?>
