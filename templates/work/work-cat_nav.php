<?php
/**
 * The template used for work navigation
 *
 * @package _s
 */
?>

<div class="work-nav-cats">
	<div class="bordered">
		<?php /* Categories */
		$args = array(
			'hide_empty' => 1,
			'title_li' => '',
			'taxonomy' => 'work_category',
		);
		wp_list_categories( $args ); ?>

		<?php if ( !is_page_template( 'page-templates/work-page.php' ) ) { ?>
			<div class="work-nav work-nav_top hidden-xs hidden-sm">
				<div class="work-home">
					<?php // create link to work page
					$work = get_page_by_path( 'work' );
					$work_link = get_permalink( $work->ID ); ?>

					<a href="<?php echo $work_link; ?>"></a>
				</div>
			</div>
		<?php } ?>
	</div>
</div>