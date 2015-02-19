<?php
/**
 * The template used for single item work navigation
 *
 * @package _s
 */
?>

<?php /* the prev/next links used below need to
	  /* to be adjusted to respect the post order
	  /* set on the work page template (selected IDs) */
	  ?>

<div class="work-nav-single">
	<div class="sub-header bordered">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<!-- Navigation -->
		<div class="work-nav work-nav_top hidden-xs hidden-sm">
			<?php next_post_link( '<div class="work-next">%link</div>', '<span>%title</span>', '', '' ); ?>
			<div class="work-home">
				<?php // create link to work page
				$work = get_page_by_path( 'work' );
				$work_link = get_permalink( $work->ID ); ?>

				<a href="<?php echo $work_link; ?>"></a>
			</div>
			<?php previous_post_link( '<div class="work-prev">%link</div>', '<span>%title</span>', '', '' ); ?>
		</div>
	</div>
</div>
