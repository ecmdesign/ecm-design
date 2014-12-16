<?php
/**
 * The template used for displaying the more work section
 *
 * @package _s
 */
?>

<div class="section work-section">
	<?php /* Headline */
	if ( get_field( 'more_work_headline' ) ) {
		$headline = get_field( 'more_work_headline' ); ?>
		<h2 class="headline fancy-headline"><?php echo $headline; ?></h2>
	<?php } ?>

	<?php /* Work Items */
	if ( have_rows( 'more_work_items' ) ) { ?>
		<div class="container">
			<div class="row">
				<?php /* Clients */
				while( have_rows( 'more_work_items' ) ): the_row(); ?>
					<div class="col-sm-4">
						<?php // set up the post object
						$post_object = get_sub_field( 'work_item' );
						$post = $post_object;
						setup_postdata( $post ); ?>

						<?php /* Image */
						$work_img = _s_thumb_img_url( 'medium' ); ?>

						<a class="work-thumb" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $work_img; ?>');">
						</a>

						<?php // reset postdata
						wp_reset_postdata(); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php } ?>

	<?php /* Button */
	if ( get_field( 'more_work_button_text' ) ) { ?>
		<div class="more-work-link">
			<a class="button color-button text-small" href="<?php echo esc_url( home_url( '/' ) ); ?>work">
				<?php the_field( 'more_work_button_text' ); ?>
			</a>
		</div>
	<?php } ?>
</div>
