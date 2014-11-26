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
 * Hide the post editor on page templates
 */
function _s_hide_post_editor() {
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;

	$template_file = get_post_meta( $post_id, '_wp_page_template', true );
	if ( $template_file == 'page-templates/home-page.php' ) {
		remove_post_type_support( 'page', 'editor' );
	}
}
add_action( 'admin_init', '_s_hide_post_editor' );

/**
 * Allow SVG upload to media library
 */
function _s_allow_svg_mime( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', '_s_allow_svg_mime' );

/**
 * Detect current template
 *//*
function _s_show_template() {
	global $template;
	print_r( $template );
}
add_action( 'wp_head', '_s_show_template' ); */
