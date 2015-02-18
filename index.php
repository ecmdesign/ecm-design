<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div id="content" class="site-content">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php if ( have_posts() ) : ?>
								<div class="row">

									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<header class="entry-header">
												<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

												<div class="entry-meta">
													<?php _s_posted_on(); ?>
												</div><!-- .entry-meta -->
											</header><!-- .entry-header -->

											<div class="entry-content">
												<?php /* Feat Image */
												if ( has_post_thumbnail() ) { ?>
													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
													</a>
												<?php } ?>

												<?php the_excerpt(); ?>

												<?php
													wp_link_pages( array(
														'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
														'after'  => '</div>',
													) );
												?>
											</div><!-- .entry-content -->
										</article><!-- #post-## -->

									<?php endwhile; ?>

									<?php _s_paging_nav(); ?>

								</div>
							<?php else : ?>

								<?php get_template_part( 'templates/content', 'none' ); ?>

							<?php endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div>

			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

	<?php get_footer(); ?>
