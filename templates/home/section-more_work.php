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
		<h2 class="fancy-headline text-center"><?php echo $headline; ?></h2>
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
						$work_img = _s_feat_img_url( 'medium' ); ?>

						<a href="<?php the_permalink(); ?>">
							<article class="work">
								<header class="work-detail">
									<div class="content">
										<!-- Title -->
										<h4><?php the_title(); ?></h4>

										<?php /* Categories */
										$cats = get_the_terms( $post->ID, 'work_category' );
										if ( !empty( $cats ) ) { ?>
											<div class="cats">
												<?php // set up term list w/separators
												$terms = get_the_term_list( $post->ID, 'work_category', '', ' / ', '' );
												echo $terms; ?>
											</div>
										<?php } ?>
									</div>
								</header>

								<!-- Image -->
								<img src="<?php echo $work_img; ?>" />
							</article>
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
