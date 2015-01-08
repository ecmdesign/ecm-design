<?php
/**
 * The template for displaying archive pages.
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

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'partials/work', 'image' );
								?>

							<?php endwhile; ?>

							<?php _s_paging_nav(); ?>

						<?php else : ?>

							<?php get_template_part( 'partials/content', 'none' ); ?>

						<?php endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div><!-- .container -->

	<?php get_footer(); ?>
