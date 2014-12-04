<?php
/**
 * Template Name: About Page
 *
 * @package _s
 */

get_header(); ?>

	<div class="container">
		<div class="row">

			<div class="col-sm-offset-2 col-sm-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content">
									<?php /* Headline */
									if ( get_field( 'custom_heading' ) ) { ?>
										<h1><?php the_field( 'custom_heading' ); ?></h1>
									<?php } ?>

									<?php the_content(); ?>

									<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
							</article><!-- #post-## -->

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>

		</div><!-- .row -->
	</div><!-- .container -->

	<?php /* Gallery */
	if ( have_rows( 'image_gallery' ) ) { ?>
		<div class="slider about-slider">
			<ul class="slider__wrapper">
				<?php // loop through slider images
				while( have_rows( 'image_gallery' ) ): the_row(); ?>
					<li class="slider__item">
						<?php // get the image
						$image = get_sub_field( 'image' );
						$img_url = $image['sizes']['gallery-image'];
						$img_alt = $image['alt']; ?>

						<img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" />
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php } ?>

	<div class="container">
		<div class="row">

			<?php /* Services */
			if ( have_rows( 'services' ) ) { ?>
				<div class="services about-services">
					<?php // loop through rows
					while( have_rows( 'services' ) ): the_row(); ?>
						<div class="service">

						</div>
					<?php endwhile; ?>
				</div>
			<?php } ?>

		</div><!-- .row -->
	</div><!-- .container -->

	<script>
	jQuery(window).ready(function($){
		$('.slider').glide({
			autoplay: 7000,
			hoverpause: true,
			arrows: true,
			arrowRightText: '',
			arrowLeftText: '',
			navigation: true,
			keyboard: true
		});
	});
	</script>

<?php get_footer(); ?>
