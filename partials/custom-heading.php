<?php
/**
 * The template used for displaying the custom heading section
 *
 * @package _s
 */
?>

<?php // set up hero background
$bg_image = _s_feat_img_url( 'large' ); ?>
<div class="text-hero<?php if ( !empty( $bg_image ) ): echo ' has_bg contrast'; endif; ?>" style="background-image: url('<?php echo $bg_image; ?>');">
	<h1 class="xl-heading"><?php the_field( 'custom_heading' ); ?></h1>
</div>