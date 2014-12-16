<?php
/**
 * Template Name: About Page
 *
 * @package _s
 */

get_header(); ?>

	<div class="container">
		<div class="row">

			<div class="col-sm-10 col-sm-offset-1">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header<?php if ( get_field( 'custom_heading' ) ): echo ' hidden'; endif; ?>">
									<?php the_title( '<h1 class="entry-title xl-heading">', '</h1>' ); ?>
								</header><!-- .entry-header -->

								<div class="entry-content<?php if ( get_field( 'custom_heading' ) ): echo ' no-top-margin'; endif; ?>">
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

	<?php /* Services Intro */
	if ( get_field( 'services_intro' ) ) { ?>
		<div class="section intro-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-2 col-sm-8">
						<div class="services-intro">
							<?php the_field( 'services_intro' ); ?>
						</div>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div>
	<?php } ?>

	<?php /* Item Lists */
	if ( have_rows( 'item_list' ) ) { ?>
		<div class="container">
			<?php /* List */
			while( have_rows( 'item_list' ) ): the_row(); ?>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="item-list">
							<?php /* Title */
							if ( get_sub_field( 'list_name' ) ) { ?>
								<h4><?php the_sub_field( 'list_name' ); ?></h4>
							<?php } ?>

							<?php /* Items */
							if ( get_sub_field( 'list_items' ) ) {
								the_sub_field( 'list_items' );
							} ?>
						</div>
					</div>
				</div><!-- .row -->
			<?php endwhile; ?>
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
