<?php
/**
 * The template used for displaying the hero section
 *
 * @package _s
 */
?>

<?php /* Background */
$hero_bg = get_field( 'hero_background' );
$bg_url = $hero_bg['url']; ?>

<!-- add 'contrast' class below to change color scheme -->
<div class="hero-section" style="background-image: url('<?php echo $bg_url; ?>');">
	<div class="home-area container">
		<div class="section">
			<div class="row">
				<?php /* Headline */
				if ( get_field( 'hero_headline' ) && get_field( 'hero_text' ) ) { ?>
					<div class="hero-callout">
						<div class="col-sm-6">
							<h1 class="heading_large">
								<?php the_field( 'hero_headline' ); ?>
							</h1>

							<?php /* Text */
							if ( get_field( 'hero_text' ) ) {
								$hero_text = get_field( 'hero_text' );
								echo wpautop( $hero_text );
							} ?>

							<?php /* Button */
							if ( get_field( 'hero_button_text' ) && get_field( 'hero_button_url' ) ) { ?>
								<a class="button color-button text-small" href="<?php the_field( 'hero_button_url' ); ?>">
									<?php the_field( 'hero_button_text' ); ?>
								</a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div><!-- .section -->

		<?php /* Hero Image */
		if ( get_field( 'hero_image' ) ) {
			$hero_img = get_field( 'hero_image' );
			$img_alt = $hero_img['alt'];
			$img_url = $hero_img['url']; ?>
			<div class="hero-image animated bounceInRight">
				<img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" />
			</div>
		<?php } ?>
	</div><!-- .home-area -->
</div><!-- .hero-section -->
