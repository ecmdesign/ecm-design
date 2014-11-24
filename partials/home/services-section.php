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
			$headline = get_field( 'services_headline' ); ?>
			<h2 class="headline fancy-headline"><?php the_field( 'services_headline' ); ?></h2>

			<?php /* Services */
			while( have_rows( 'services' ) ): the_row(); ?>
				<div class="col-sm-4 service">
					<?php /* Icons */
					$icon = get_sub_field( 'service_icon' );
					$icon_url = $icon['alt'];
					$icon_url = $icon['url']; ?>
					<img class="service-icon" src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>" />

					<?php /* Service Title */
					$title = get_sub_field( 'service_title' ); ?>
					<h3 class="service-title"><?php echo $title; ?></h3>

					<?php /* Service Text */
					if ( get_sub_field( 'service_text' ) ) {
						$svc_text = get_sub_field( 'service_text' );
						echo wpautop( $svc_text );
					} ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
