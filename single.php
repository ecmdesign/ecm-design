<?php
/**
 * The template for displaying all single posts.
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<div class="single_container">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'templates/content', 'single' ); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- .single_container -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<script>
	jQuery(window).ready(function($){
		$('.swipebox').swipebox();
	});
	</script>

<?php get_footer(); ?>