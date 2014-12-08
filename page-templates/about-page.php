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

	<!-- Accent bar -->
	<div class="accent-bar spacer"></div>

	<?php /* Services */
	if ( have_rows( 'services' ) ) { ?>
		<div class="container">
			<div class="row">
				<div class="services about-services">
					<?php // loop through rows
					while( have_rows( 'services' ) ): the_row(); ?>
						<div class="service col-sm-4">
							<?php /* Title */
							if ( get_sub_field( 'service_title' ) ) { ?>
								<h4><?php the_sub_field( 'service_title' ); ?></h4>
							<?php } ?>

							<?php /* Text */
							if ( get_sub_field( 'service_text' ) ) {
								$svc_text = get_sub_field( 'service_text' );
								echo wpautop( $svc_text );
							} ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	<?php } ?>

	<?php /* Social Section */
	if ( get_field( 'enable_social' ) ) { ?>
		<div class="section social-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<?php /* Headline */
						if ( get_field( 'social_headline' ) ) { ?>
							<h2><?php the_field( 'social_headline' ); ?></h2>
						<?php } ?>

						<?php /* Text */
						if ( get_field( 'social_text' ) ) {
							$social_text = get_field( 'social_text' );
							echo wpautop( $social_text );
						} ?>

						<?php /* Buttons */
						if ( get_theme_mod( 'facebook_url' ) && get_theme_mod( 'twitter_url' ) ) { ?>
							<div class="social-links">
								<a class="button pill text-smaller facebook" href="<?php echo get_theme_mod( 'facebook_url' ); ?>" target="_blank">Facebook</a>
								<a class="button pill text-smaller twitter" href="<?php echo get_theme_mod( 'twitter_url' ); ?>" target="_blank">Twitter</a>
							</div>
						<?php } ?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div>
	<?php } ?>

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
