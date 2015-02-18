<?php
/**
 * The template used for displaying the testimonials section
 *
 * @package _s
 */
?>

<div class="section testimonials-section">
	<?php /* Headline */
	if ( get_field( 'testimonials_headline' ) ) {
		$headline = get_field( 'testimonials_headline' ); ?>
		<h2 class="fancy-headline text-center"><?php echo $headline; ?></h2>
	<?php } ?>

	<?php /* Testimonials */
	if ( have_rows( 'testimonials' ) ) { ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-10">
					<div class="slider tst-slider">
						<ul class="slides__wrapper">
							<?php /* Testimonials */
							while( have_rows( 'testimonials' ) ): the_row(); ?>
								<li class="slider__item">
									<?php /* Text */
									if ( get_sub_field( 'testimonial_text' ) ) { ?>
										<div class="tst-text">
											<?php // create variable for text
											$tst_text = get_sub_field( 'testimonial_text' );
											echo wpautop( $tst_text ); ?>

											<?php /* Author */
											if ( get_sub_field( 'author' ) ) { ?>
												<span>
													<?php // set up author text
													$author = '&ndash;' . '&nbsp;' . get_sub_field( 'author' );
													echo $author;
													if ( get_sub_field( 'author_title' ) ) {
														$title = ',&nbsp;' . get_sub_field( 'author_title' );
														echo $title;
													} ?>
												</span>
											<?php } ?>
										</div>
									<?php } ?>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
