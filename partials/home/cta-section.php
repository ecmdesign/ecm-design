<?php
/**
 * The template used for displaying the CTA section
 *
 * @package _s
 */
?>

<div class="section cta-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10">
				<div class="cta-area">
					<?php /* Headline */
					if ( get_field( 'cta_headline' ) ) { ?>
						<h2><?php the_field( 'cta_headline' ); ?></h2>
					<?php } ?>

					<?php /* Text */
					if ( get_field( 'cta_text' ) ) {
						$cta_text = get_field( 'cta_text' );
						echo wpautop( $cta_text );
					} ?>

					<?php /* Button */
					if ( get_field( 'button_text' ) && get_field( 'button_url' ) ) { ?>
						<a class="button pill text-small" href="<?php the_field( 'button_url' ); ?>">
							<?php the_field( 'button_text' ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
