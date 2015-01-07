<?php
/**
 * The template used for displaying the about section
 *
 * @package _s
 */
?>

<div class="section about-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="about-area">
					<?php /* Headline */
					if ( get_field( 'about_headline' ) ) { ?>
						<h2><?php the_field( 'about_headline' ); ?></h2>
					<?php } ?>

					<!-- Accent bar -->
					<div class="accent-bar"></div>

					<?php /* Text */
					if ( get_field( 'about_text' ) ) {
						$about_text = get_field( 'about_text' );
						echo wpautop( $about_text );
					} ?>

					<?php /* Button */
					if ( get_field( 'about_button_text' ) && get_field( 'about_button_url' ) ) { ?>
						<a class="button pill text-smaller" href="<?php the_field( 'about_button_url' ); ?>">
							<?php the_field( 'about_button_text' ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
