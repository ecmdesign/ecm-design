<?php
/**
 * The template used for displaying the hero section
 *
 * @package _s
 */
?>

<?php // set up slide query
$args = array(
	'post_type' => 'slide',
	'posts_per_page' => 1,
	'post_status' => 'publish',
	'orderby' => 'rand',
	'order' => 'ASC',
);
$my_query = new WP_Query( $args );
// check if query has posts
if ( $my_query->have_posts() ): ?>
	<div class="slide-section">
		<?php // loop through slides
		while( $my_query->have_posts() ): $my_query->the_post();
			// set up slide background
			$bg_img = _s_feat_img_url( 'full' ); ?>
			<div class="slide-area" style="background-image: url('<?php echo $bg_img; ?>');">
				<div class="slide-area_text">
					<div class="container">
						<!-- Title -->
						<h1><?php the_title(); ?></h1>

						<!-- Caption -->
						<?php if ( get_field( 'slide_caption' ) ) { ?>
							<h2><?php the_field( 'slide_caption' ); ?></h2>
						<?php } ?>

						<!-- Button -->
						<?php if ( get_field( 'button_link' ) && get_field( 'button_text' ) ) { ?>
							<a class="button" href="<?php the_field( 'button_link' ); ?>"><?php the_field( 'button_text' ); ?></a>
						<?php } ?>
					</div>
				</div>
				<div class="slide-area_more">
					<a class="icon-down-open" href="#home-sections"></a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; wp_reset_postdata(); ?>