<?php
/**
 * The template for displaying all single posts.
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div class="container">

			<div class="row">
				<div class="col-sm-10">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<?php the_title( '<h1 class="entry-title xl-heading">', '</h1>' ); ?>
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
							</article><!-- #post-## -->

						<?php endwhile; // end of the loop. ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div>
			</div><!-- .row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="work-images">
						<?php /* Featured Image */
						if ( has_post_thumbnail() ) {
							// set up thumnail sizes
							$feat_alt = _s_thumb_alt_text();
							$feat_lg = _s_thumb_img_url( 'full' );
							$feat_sm = _s_thumb_img_url( 'large' ); ?>

							<a class="work-thumb-large swipebox" href="<?php echo $feat_lg; ?>" alt="<?php echo $feat_alt; ?>" style="background-image: url('<?php echo $feat_sm; ?>');"></a>
						<?php } ?>

						<?php /* More Images */
						if ( have_rows( 'item_images' ) ) { ?>
							<div class="row">
								<?php // loop through the images
								while( have_rows( 'item_images' ) ): the_row();
									// set image to variable
									$misc_img = get_sub_field( 'image' );
									$img_alt = $misc_img['alt'];
									$img_lg = $misc_img['url'];
									$img_sm = $misc_img['sizes']['medium']; ?>

									<div class="col-sm-4">
										<a class="work-thumb swipebox" href="<?php echo $img_lg; ?>" alt="<?php echo $img_alt; ?>" style="background-image: url('<?php echo $img_sm; ?>');"></a>
									</div>
								<?php endwhile; ?>
							</div>
						<?php } ?>
					</div>

				<?php /* Item Link */
					if ( get_field( 'item_link' ) ) { ?>
						<div class="item-link">
							<a class="button color-button text-small" href="<?php the_field( 'item_link' ); ?>" target="_blank">View the website</a>
						</div>
					<?php } ?>

					<?php _s_post_nav( 'Prev item', 'Next item' ); ?>

					<?php /* Share */ ?>
					<div class="share-area">
						<?php // set up item link
						$item_link = get_permalink();
						$item_link = urlencode( $item_link ); ?>

						<span>Share:</span>
						<a class="facebook icon-facebook-circled" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $item_link; ?>" target="_blank"></a>
						<a class="twitter icon-twitter-circled" href="http://twitter.com/share?url=<?php echo $item_link; ?>" target="_blank"></a>
						<a class="pinterest icon-pinterest-circled" href="http://pinterest.com/pin/create/button/?url=<?php echo $item_link; ?>" target="_blank"></a>
					</div>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->

		<script>
		jQuery(window).ready(function($){
			$('.swipebox').swipebox();
		});
		</script>

	<?php get_footer(); ?>
