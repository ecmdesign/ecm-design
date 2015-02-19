<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-nav' => __( 'Main Nav', '_s' ),
		'footer-nav' => __( 'Footer Nav', '_s' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Add custom image sizes
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_image_size
	 */
	// thumbnails
	update_option( 'thumbnail_size_w', 185 );
	update_option( 'thumbnail_size_h', 185 );
	update_option( 'thumbnail_crop', 1 );
	// medium image size
	update_option( 'medium_size_w', 720 );
	update_option( 'medium_size_h', 600 );
	update_option( 'medium_crop', 1 );
	// large image size
	update_option( 'large_size_w', 1140 );
	update_option( 'large_size_h', 855 );
	// custom sizes
	add_image_size( 'blog_thumb', 600, 300, true );
	add_image_size( 'gallery-image', 1600, 900, true );

	/**
	 * Configuration values
	 */
	if ( !defined( 'WP_ENV' ) ) {
		define( 'WP_ENV', 'production' );
	}
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', '_s' ),
		'id'            => 'main-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
//add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue site styles.
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_styles
 */
function _s_enqueue_styles() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	// load compressed/uncompressed depending on environment
	if ( WP_ENV !== 'development' ) {
		wp_enqueue_style( '_s-main', get_template_directory_uri() . '/assets/css/main.min.css' );
	} else {
		wp_enqueue_style( '_s-main', get_template_directory_uri() . '/assets/css/main.css' );
	}

	/* Home Page */
	if ( is_front_page() ) {
		wp_enqueue_style( '_s-glide', get_template_directory_uri() . '/assets/css/glide.css', false, '' );
	}
	/* Work Items */
	if ( is_singular( 'work_item' ) || is_singular( 'post' ) ) {
		wp_enqueue_style( '_s-swipebox', get_template_directory_uri() . '/assets/css/swipebox.min.css', false, '' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_enqueue_styles' );

/**
 * Enqueue site scripts.
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 */
function _s_enqueue_scripts() {
	//wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( '_s-modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.min.js', array(), '', false );
	wp_enqueue_script( '_s-mobmenu', get_template_directory_uri() . '/assets/js/mobmenu.js', array( 'jquery' ), '', false );
	wp_enqueue_script( '_s-headroom', get_template_directory_uri() . '/assets/js/vendor/headroom.min.js', array(), '', false );

	// load script required for threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Home Page */
	if ( is_front_page() ) {
		wp_enqueue_script( '_s-glide', get_template_directory_uri() . '/assets/js/vendor/jquery.glide.min.js', array( 'jquery' ), '', true );
	}
	/* Work Items */
	if ( is_singular( 'work_item' ) || is_singular( 'post' ) ) {
		wp_enqueue_script( '_s-swipebox', get_template_directory_uri() . '/assets/js/vendor/jquery.swipebox.min.js', array( 'jquery' ), '', true );
	}
}
add_action( 'wp_enqueue_scripts', '_s_enqueue_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/lib/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/customizer/customizer.php';
require get_template_directory() . '/lib/customizer/customizer-fields.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/lib/jetpack.php';

/**
 * Utility functions
 */
require get_template_directory() . '/lib/utility.php';

/**
 * Register post types and taxonomies
 */
require get_template_directory() . '/lib/register.php';

/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/lib/vendor/tgm/activation.php';

/**
 * Advanced Custom Fields
 */
if ( !in_array( $_SERVER['REMOTE_ADDR'], array( '::1', '127.0.0.1' ) ) ) {
	define( 'ACF_LITE' , true );
	require get_template_directory() . '/lib/vendor/acf/acf-fields.php';
}
