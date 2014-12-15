<?php
/**
 * The template used for displaying the clients section
 *
 * @package _s
 */
?>

<div class="section clients-section">
	<?php /* Headline */
	if ( get_field( 'clients_headline' ) ) {
		$headline = get_field( 'clients_headline' ); ?>
		<h2 class="headline fancy-headline"><?php echo $headline; ?></h2>
	<?php } ?>

	<?php /* Services */
	if ( have_rows( 'clients' ) ) { ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-10">
					<div class="row">
						<?php /* Clients */
						while( have_rows( 'clients' ) ): the_row(); ?>
							<div class="col-xs-3 client">
								<?php /* Icons */
								$icon = get_sub_field( 'client_logo' );
								$icon_url = $icon['alt'];
								$icon_url = $icon['url']; ?>
								<img class="client-icon" src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>" />
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
