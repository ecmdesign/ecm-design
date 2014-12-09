<?php
/**
 * The template used for displaying the more work section
 *
 * @package _s
 */
?>

<?php // get excluded IDs from work section
global $excluded;
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
	<div class="section work-section">
		<?php /* Headline */
		if ( get_field( 'more_work_headline' ) ) {
			$headline = get_field( 'more_work_headline' ); ?>
			<h2 class="headline fancy-headline"><?php echo $headline; ?></h2>
		<?php } ?>

		<div class="container">
			<div class="row">
				<?php // loop through posts
				while( $the_query->have_posts() ): $the_query->the_post(); ?>
					<div class="col-sm-4">
						<?php /* Image */
						$work_img = _s_thumbnail_url( 'work-thumb' ); ?>

						<a class="work-thumb" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $work_img; ?>');">
						</a>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div><!--.row -->
		</div><!-- .container -->

		<?php if ( get_field( 'more_work_button_text' ) ) { ?>
			<div class="more-work-link">
				<a class="button color-button text-small" href="<?php echo esc_url( home_url( '/' ) ); ?>work">
					<?php the_field( 'more_work_button_text' ); ?>
				</a>
			</div>
		<?php } ?>
	</div>
<?php }
