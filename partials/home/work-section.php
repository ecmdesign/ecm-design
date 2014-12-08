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
	$excluded = array();

	// loop through work item rows
	while( have_rows( 'work_items' ) ): the_row(); ?>
		<div class="section work-section">
			<div class="container">
				<div class="row work-items">
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

						<img class="work-image" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" />
					</div>

					<div class="<?php echo $second; ?> work-item">
						<div class="item-info">
							<?php // get some info from work items
							$item = get_sub_field( 'item' );
							$item_id = $item[0]->ID;
							$title = $item[0]->post_title; ?>

							<?php /* Categories */
							if ( !empty( get_the_terms( $item_id, 'work_category' ) ) ) { ?>
								<div class="cat-list">
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
							if ( get_sub_field( 'item_link' ) ) { ?>
								<a class="button pill text-smaller" href="<?php the_sub_field( 'item_link' ); ?>">Learn more</a>
							<?php } ?>

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

<?php // get excluded IDs from above
$exclude_list = $excluded;
// set up query arguments
$args = array(
	'post_type' => 'work_item',
	'post_status' => 'publish',
	'posts_per_page', '3',
	'orderby' => 'date',
	'order' => 'DESC',
	'post__not_in' => $exclude_list,
);
// create new query
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) { ?>
	<div class="section more-work-section">
		<div class="container">
			<!-- Create option for headline below -->
			<h2 class="headline fancy-headline">More of our work</h2>

			<div class="row">
				<?php // loop through posts
				while( $the_query->have_posts() ): $the_query->the_post(); ?>
					<div class="col-sm-4">
						<?php /* Image */
						if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'work-thumb' ); ?>
							</a>
						<?php } ?>
					</div>
				<?php endwhile; ?>
			</div><!--.row -->
		</div>
	</div>
<?php }
wp_reset_postdata(); ?>