<?php
/**
 * Utility Functions
 *
 * @package _s
 */

/**
 * Flush rewrite rules on theme activation
 */
function _s_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', '_s_flush_rewrite_rules' );

/**
 * Add page template slug body class
 */
function _s_page_template_slug( $slug ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = get_page_template_slug( $post->ID );
		// get only template name if in subfolder
		$class_slug = ltrim( strstr( $classes[0], '/' ), '/' );
		// remove the file extension
		$slug[] = str_replace( '.php', '', $class_slug );
	}
	return $slug;
}
add_filter( 'body_class', '_s_page_template_slug' );

/**
 * Post Thumbnail URL function
 */
function _s_thumbnail_url( $size ) {
	// hat tip: http://goo.gl/fzHOaB
	$img_id = get_post_thumbnail_id();
	$img_array = wp_get_attachment_image_src( $img_id, $size, true );
	$img_url = $img_array[0];
	return $img_url;
}

/**
 * Post Thumbnail alt text function
 */
function _s_thumbnail_alt() {
	$img_id = get_post_thumbnail_id();
	$img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
	return $img_alt;
}

/**
 * Get home page ID
 */
function _s_home_ID() {
	$home_id = get_option( 'page_on_front' );
	return $home_id;
}

/**
 * Strip phone number formatting
 */
function _s_phone_number( $phone ) {
	$phone = preg_replace( '/[^0-9]/', '', $phone );
	return $phone;
}

/**
 * Custom excerpt using word count
 */
function _s_custom_excerpt( $word_count ) {
	// first get the content
	$content = get_the_content();
	// set up the read more
	$read_more = ' <a class="read-more" href="' . get_the_permalink() . '">[...]</a>';
	// now use CSS-Tricks truncate function: http://goo.gl/AApx1a
	$word_count = $word_count + 1;
	$content = explode( ' ', $content, $word_count );
	array_pop( $content );
	$content = implode( ' ', $content ) . $read_more;
	return $content;
}

/**
 * Add class when images are inserted
 */
function _s_custom_image_class( $class ) {
	$class .= ' swipebox';
	return $class;
}
add_filter( 'get_image_tag_class', '_s_custom_image_class' );

/**
 * Detect current template
 *//*
function _s_show_template() {
	global $template;
	print_r( $template );
}
add_action( 'wp_head', '_s_show_template' ); */
