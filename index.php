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

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<div class="blog_container">

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<!-- Feat Image -->
								<a href="<?php the_permalink(); ?>">
									<?php // check for thumbnail
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'blog_thumb' );
									} else { ?>
										<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/placeholder.gif" />
									<?php } ?>
								</a>

								<section>
									<header class="entry-header">
										<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

										<div class="entry-meta">
											<?php echo get_the_date( 'n/j/Y' ); ?>
										</div><!-- .entry-meta -->
									</header><!-- .entry-header -->

									<div class="entry-content">
										<?php // set up a custom excerpt
										$content = get_the_content();
										$content = wp_trim_words( $content, 30, '... <a href="' . get_the_permalink() . '">Read more</a>' );
										echo wpautop( $content ); ?>

										<?php
											wp_link_pages( array(
												'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
												'after'  => '</div>',
											) );
										?>
									</div><!-- .entry-content -->
								</section>
							</article><!-- #post-## -->

						<?php endwhile; ?>

						<?php _s_paging_nav(); ?>

					<?php else : ?>

						<?php get_template_part( 'templates/content', 'none' ); ?>

					<?php endif; ?>

				</div><!-- .blog_container -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_footer(); ?>
