<?php
/**
 * The template used for displaying the work section
 *
 * @package _s
 */
?>

<?php /* Work Items */
if ( have_rows( 'work_items' ) ) {
	// set counter for grid setup below
	$i = 1;
	// create array of item IDs so they can be
	// excluded in the additional work section
	global $excluded;
	$excluded = array();

	// loop through work item rows
	while( have_rows( 'work_items' ) ): the_row(); ?>
		<div class="section feat-work-section">
			<div class="container">
				<div class="row">
					<?php // alternate grid setup using counter
					if ( $i == 1 ) {
						$first = "col-sm-8";
						$second = "col-sm-4";
					} else {
						$first = "col-sm-8 col-sm-push-4";
						$second = "col-sm-4 col-sm-pull-8";
					} ?>

					<div class="<?php echo $first; ?>">
						<?php /* Image */
						$item_img = get_sub_field( 'item_image' );
						$img_url = $item_img['url'];
						$img_alt = $item_img['alt']; ?>

						<img class="feat-work-img" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" />
					</div>

					<div class="<?php echo $second; ?> feat-work-item">
						<div class="feat-work-info">
							<?php // get some info from work items
							$item = get_sub_field( 'item' );
							$item_id = $item[0]->ID;
							$title = $item[0]->post_title; ?>

							<?php /* Categories */
							$cats = get_the_terms( $item_id, 'work_category' );
							if ( !empty( $cats ) ) { ?>
								<div class="cats">
									<?php // set up term list w/separators
									$terms = get_the_term_list( $item_id, 'work_category', '', ' / ', '' );
									echo $terms; ?>
								</div>
							<?php } ?>

							<?php /* Title */
							if ( !empty( $title ) ) { ?>
								<h2><?php echo $title; ?></h2>
							<?php } ?>

							<?php /* Text */
							if ( get_sub_field( 'item_text' ) ) {
								$item_text = get_sub_field( 'item_text' );
								echo wpautop( $item_text );
							} ?>

							<?php /* Button */
							// first get permalink using item ID
							$item_link = get_permalink( $item_id ); ?>
							<a class="button pill text-smaller" href="<?php echo $item_link; ?>">Learn more</a>

							<?php // add the work item to the 'excluded' array
							$exclude_list = array_push( $excluded, $item_id ); ?>
						</div>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div>
	<?php // increment grid setup counter
	$i++; endwhile;
} ?>
