<?php
/**
 * Register post types and taxonomies
 *
 * @package _s
 */

/* Work Items */
function _s_register_work_items() {
	$labels = array(
		'name'					=> _x( 'Work Items', 'post type general name', '_s' ),
		'singular_name'			=> _x( 'Work Item', 'post type singular name', '_s' ),
		'menu_name'				=> _x( 'Work Items', 'admin menu', '_s' ),
		'name_admin_bar'		=> _x( 'Work Item', 'add new on admin bar', '_s' ),
		'add_new'				=> _x( 'Add New', 'work_item', '_s' ),
		'add_new_item'			=> __( 'Add New Work Item', '_s' ),
		'new_item'				=> __( 'New Work Item', '_s' ),
		'edit_item'				=> __( 'Edit Work Item', '_s' ),
		'view_item'				=> __( 'View Work Item', '_s' ),
		'all_items'				=> __( 'All Work Items', '_s' ),
		'search_items'			=> __( 'Search Work Items', '_s' ),
		'parent_item_colon'		=> __( 'Parent Work Items:', '_s' ),
		'not_found'				=> __( 'No Work Items found.', '_s' ),
		'not_found_in_trash'	=> __( 'No Work Items found in Trash.', '_s' )
	);
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'rewrite'				=> array( 'slug' => 'work' ),
		'capability_type'		=> 'post',
		'has_archive'			=> false,
		'hierarchical'			=> false,
		'menu_position'			=> null,
		'supports'				=> array( 'title', 'author', 'editor', 'thumbnail', 'comments', 'revisions' ),
		'taxonomies'			=> array( 'work_category' ),
	);
	register_post_type( 'work_item', $args );
}
add_action( 'init', '_s_register_work_items' );

/* Work Category */
function _s_register_work_cats() {
	$labels = array(
		'name'				=> _x( 'Work Categories', 'taxonomy general name' ),
		'singular_name'		=> _x( 'Work Category', 'taxonomy singular name' ),
		'search_items'		=> __( 'Search Work Categories' ),
		'all_items'			=> __( 'All Work Categories' ),
		'parent_item'		=> __( 'Parent Work Category' ),
		'parent_item_colon'	=> __( 'Parent Work Category:' ),
		'edit_item'			=> __( 'Edit Work Category' ),
		'update_item'		=> __( 'Update Work Category' ),
		'add_new_item'		=> __( 'Add New Work Category' ),
		'new_item_name'		=> __( 'New Work Category Name' ),
		'menu_name'			=> __( 'Work Categories' ),
	);
	$args = array(
		'hierarchical'		=> true,
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'query_var'			=> true,
		'rewrite'			=> false,
	);
	register_taxonomy( 'work_category', array( 'work_item' ), $args );
}
add_action( 'init', '_s_register_work_cats' );

function _s_register_work_industry() {
	$labels = array(
		'name'				=> _x( 'Industries', 'taxonomy general name' ),
		'singular_name'		=> _x( 'Work Industry', 'taxonomy singular name' ),
		'search_items'		=> __( 'Search Industries' ),
		'all_items'			=> __( 'All Industries' ),
		'parent_item'		=> __( 'Parent Work Industry' ),
		'parent_item_colon'	=> __( 'Parent Work Industry:' ),
		'edit_item'			=> __( 'Edit Work Industry' ),
		'update_item'		=> __( 'Update Work Industry' ),
		'add_new_item'		=> __( 'Add New Work Industry' ),
		'new_item_name'		=> __( 'New Work Industry Name' ),
		'menu_name'			=> __( 'Industries' ),
	);
	$args = array(
		'hierarchical'		=> true,
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'query_var'			=> true,
		'rewrite'			=> false,
	);
	register_taxonomy( 'industry', array( 'work_item' ), $args );
}
add_action( 'init', '_s_register_work_industry' );
