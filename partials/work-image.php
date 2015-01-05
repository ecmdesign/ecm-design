<?php
/**
 * The template used for displaying work item images
 *
 * @package _s
 */
?>

<div class="col-sm-4 work-image">
	<?php /* Image */
	if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium' ); ?>
		</a>
	<?php } ?>

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

	<?php /* Item Link */ ?>
	<a href="<?php the_permalink(); ?>">View this item</a>
</div>