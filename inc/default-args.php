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
 * By default adds HTML5 support for comment forms, comment lists and search forms.
 * Theme developers can alter these values using the `slimline_html5_support_args`
 * filter.
 *
 * @return array List of elements that should rendered using HTML5 markup
 * @uses apply_filters() Calls `slimline_html5_support_args` filter on the returned array
 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
 * @since 0.1.0
 */
function slimline_html5_support_args() {

	return apply_filters( 'slimline_html5_support_args', array( 'comment-form', 'comment-list', 'search-form' ) );
}

/**
 * slimline_post_thumbnails_support_args function
 *
 * Parameters for add_theme_support( 'post-thumbnails' )
 *
 * By default adds featured image support to posts and pages. Theme developers can 
 * alter these values using the `slimline_post_thumbnails_support_args` filter.
 *
 * @return array List of post types to add featured image support to
 * @uses apply_filters() Calls `slimline_post_thumbnails_support_args` on the returned array
 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 * @since 0.1.0
 */
function slimline_post_thumbnails_support_args() {

	return apply_filters( 'slimline_post_thumbnails_support_args', array( 'page', 'post' ) );
}