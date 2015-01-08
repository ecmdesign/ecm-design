<?php
/**
 * The template used for displaying work item images
 *
 * @package _s
 */
?>

<?php /* Image */
if ( has_post_thumbnail() ) { ?>
	<div class="col-sm-4">
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
								<?php // loop through cats, but set counter first because
									  // we're going to output the last item in a different manner.
								$counter = 0;
								foreach ( $cats as $cat ) {
									$counter++;
									if ( $counter < count($cats) ) {
										echo $cat->name . ' / ';
									} else {
										echo $cat->name;
									}
								} ?>
							</div>
						<?php } ?>
					</div>
				</header>

				<?php /* Image */
				the_post_thumbnail( 'medium' ); ?>
			</article>
		</a>
	</div>
<?php } ?>
