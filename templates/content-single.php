<?php
/**
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php /* Feat Image */
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'large' );
	} ?>

	<section>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php echo get_the_date( 'n/j/Y' ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php _s_post_nav(); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
			endif;
		?>
	</section>
</article><!-- #post-## -->
