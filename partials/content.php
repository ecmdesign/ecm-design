<?php
/**
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php /* Feat Image */
		if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( array( 125, 125 ), array( 'class' => 'alignleft' ) ); ?>
			</a>
		<?php } ?>

		<?php
			// first check if this is the blog page
			if ( is_home() ) {
				// set up custom excerpt
				$excerpt = _s_custom_excerpt( 50 );
				echo wpautop( $excerpt );
			} else {
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_s' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
