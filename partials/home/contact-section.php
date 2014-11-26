<?php
/**
 * The template used for displaying the contact section
 *
 * @package _s
 */
?>

<div class="section contact-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10">
				<div class="contact-area">
					<?php /* Headline */
					if ( get_field( 'contact_headline' ) ) { ?>
						<h2><?php the_field( 'contact_headline' ); ?></h2>
					<?php } ?>

					<?php /* Text */
					if ( get_field( 'contact_text' ) ) {
						$contact_text = get_field( 'contact_text' );
						echo wpautop( $contact_text );
					} ?>

					<?php /* Button */
					if ( get_field( 'contact_button_text' ) && get_field( 'contact_button_url' ) ) { ?>
						<a class="button pill text-smaller" href="<?php the_field( 'contact_button_url' ); ?>">
							<?php the_field( 'contact_button_text' ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
