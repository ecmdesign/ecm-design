<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-info row">
				<div class="col-md-offset-1 col-md-2 site-logo">
					<!-- Logo -->
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/logo-white.svg" />
					</a>
				</div>

				<div class="col-md-8">
					<div class="footer-info">
						<?php get_template_part( 'templates/content', 'footer' ); ?>
					</div><!-- .footer-info -->
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script>
/* Headroom */
var myHeader = document.getElementById('masthead');
var headroom = new Headroom(myHeader, {
	"offset": 83,
});
headroom.init();
</script>

<?php wp_footer(); ?>

</body>
</html>
