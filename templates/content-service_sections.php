<?php
/**
 * The template part for displaying service sections
 *
 * @package _s
 */
?>

<div class="service-sections">
	<?php // loop through the sections
	while( have_rows( 'service_sections') ): the_row(); ?>
		<div class="service-section">
			<?php /* Section Title */
			if ( get_sub_field( 'section_title' ) ) { ?>
				<h2><?php the_sub_field( 'section_title' ); ?></h2>
			<?php } ?>

			<?php // get the number of columns and set
				  // a counter for number the services
			$count = 1;
			$num_cols = get_sub_field( 'num_of_columns' );
			if ( $num_cols == 2 ) {
				$num = 'even';
				$cols = 6;
			} else {
				$num = 'odd';
				$cols = 4;
			} ?>

			<?php /* Services */
			if ( have_rows( 'services' ) ): ?>
				<div class="services">
					<div class="row">
						<?php // loop through the services
						while( have_rows( 'services' ) ): the_row(); ?>
							<div class="col-sm-<?php echo $cols; ?> <?php echo $num; ?>">
								<div class="service">
									<?php /* Title */
									if ( get_sub_field( 'service_title' ) ) {
										$svc_title = get_sub_field( 'service_title' );
										$svc_id = strtolower( preg_replace( '/\s+/', '', $svc_title ) ); ?>
										<h4 class="service-title">
											<span class="colored"><?php echo str_pad( $count, 2, 0, STR_PAD_LEFT ); ?>.</span> <?php echo $svc_title; ?>
										</h4>
									<?php } ?>

									<?php /* Excerpt */
									if ( get_sub_field( 'service_excerpt' ) ) { ?>
										<div class="service-text">
											<?php // set excerpt text to variable
											$excerpt = get_sub_field( 'service_excerpt' );

											// check if there are more details to display
											if ( get_sub_field( 'more_details' ) ) {
												$more_text = get_sub_field( 'service_details' );
												$more_id = 'service-' . $count;

												$excerpt .= ' <a href="#' . $more_id . '" data-toggle="modal">MORE</a>';

												// echo the excerpt with more link appended
												echo wpautop( $excerpt ); ?>

												<div id="<?php echo $more_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="<?php echo $svc_id; ?>" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
																<h4 class="modal-title" id="<?php echo $svc_id; ?>"><?php echo $svc_title; ?></h4>
															</div>
															<div class="modal-body">
																<?php echo wpautop( $more_text ); ?>
															</div>
														</div>
													</div>
												</div>
											<?php } else {
												echo wpautop( $excerpt );
											} ?>
										</div>
									<?php } ?>

									<?php // increment the counter
									$count++; ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
</div>
