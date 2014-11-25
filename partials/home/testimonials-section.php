<?php
/**
 * The template used for displaying the services section
 *
 * @package _s
 */
?>

<div class="section services-section">
	<div class="container">
		<div class="row">
			<?php /* Headline */
			$headline = get_field( 'clients_headline' ); ?>
			<h2 class="headline fancy-headline"><?php echo $headline; ?></h2>

			<?php /* Services */
			while( have_rows( 'clients' ) ): the_row(); ?>
				<div class="col-xs-4 service">
					<?php /* Icons */
					$icon = get_sub_field( 'client_logo' );
					$icon_url = $icon['alt'];
					$icon_url = $icon['url']; ?>
					<img class="service-icon" src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>" />

				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
