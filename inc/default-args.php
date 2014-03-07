<?php
/**
 * Default Arguments
 *
 * Functions for returning the parameters used in template tags and other 
 * function calls. This allows child theme developers to edit function 
 * arguments by filter.
 *
 * @package Slimline
 * @subpackage Includes
 */

/**
 * slimline_custom_header_support_args function
 *
 * Parameters for add_theme_support( 'custom-header' )
 *
 * @return array List of post types to add featured image support to
 * @uses apply_filters() Calls `slimline_custom_header_support_args` on the returned array
 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 * @since 0.1.0
 */
function slimline_custom_header_support_args() {

	return apply_filters( 'slimline_custom_header_support_args', array( 'flex-height' => true, 'flex-width' => true ) );
}

/**
 * slimline_html5_support_args function
 *
 * Parameters for add_theme_support( 'html5' )
 *
 * By default adds HTML5 support for comment forms, comment lists, search forms and galleries.
 * Theme developers can alter these values using the `slimline_html5_support_args`
 * filter.
 *
 * @return array List of elements that should rendered using HTML5 markup
 * @uses apply_filters() Calls `slimline_html5_support_args` filter on the returned array
 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
 * @since 0.1.0
 */
function slimline_html5_support_args() {

	return apply_filters( 'slimline_html5_support_args', array( 'comment-form', 'comment-list', 'gallery', 'search-form' ) );
}

/**
 * slimline_infinite_scroll_args function
 *
 * Parameters for add_theme_support( 'infinite-scroll' )
 *
 * @return array Infinite Scroll parameters set to work with default Slimline theme markup
 * @see http://jetpack.me/support/infinite-scroll/ For an explanation of parameters
 * @uses apply_filters() Calls `slimline_infinite_scroll_args` filter on the returned array
 * @since 0.1.0
 */
function slimline_infinite_scroll_args() {

	return apply_filters(
		'slimline_infinite_scroll_args',
		array(
			'type'           => 'scroll', // allow posts to load as user scrolls
			'footer_widgets' => is_active_sidebar( 'sidebar-3' ), // change to click option if footer widgets are active
			'container'      => 'entries-wrap', // default wrapper id {@see slimline_entries_wrapper() | inc/hooks.php}
			'wrapper'        => false, // do not wrap loaded posts in an extra div
			'render'         => 'slimline_infinite_scroll_render', // replace default rendering function with standard Slimline WordPress loop {@see index.php template}
			'posts_per_page' => get_option( 'posts_per_page' ), // let user set number of posts to load
		)
	);
}
 

/**
 * slimline_post_thumbnails_support_args function
 *
 * Parameters for add_theme_support( 'post-thumbnails' )
 *
 * By default adds featured image meta box to all post types that support it. Theme developers can 
 * alter this values using the `slimline_post_thumbnails_support_args` filter.
 *
 * @return bool True to add post thumbnail support the same as not using any arguments
 * @uses apply_filters() Calls `slimline_post_thumbnails_support_args` on the returned value
 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 * @since 0.1.0
 */
function slimline_post_thumbnails_support_args() {

	return apply_filters( 'slimline_post_thumbnails_support_args', true );
}