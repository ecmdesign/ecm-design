<?php
/**
 * Template Name: Quiz Page
 *
 * @package _s
 */

get_header(); ?>

	<div id="content" class="site-content">

		<?php /* Headline */
		if ( get_field( 'custom_heading' ) ) {
			get_template_part( 'templates/content', 'heading' );
		} ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-content">
										<?php the_content(); ?>

										<?php /* Quiz */
										// get the quiz URL attached to the page
										$q_url = get_field( 'quiz_url' );
										// get just the quiz number from the URL
										$q_num = substr( $q_url, strpos( $q_url, "quiz-" ) + 5 ); ?>

										<div id="embed-quiz">Loading <a href="<?php echo $q_url; ?>">How well do you know the ecm team?</a></div>
										<script type="text/javascript">
											var QuizWorks = [
												[document.getElementById("embed-quiz"), "quiz", "<?php echo $q_num; ?>", {
													autostart: false,
													width: "100%",
													height: "auto"
												}]
											];
										</script>
										<script type="text/javascript" async defer src="https://www.onlinequizcreator.com/script/embed.js"></script>

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

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div><!-- .container -->

	<?php get_footer(); ?>
