<?php
/**
 * Script and Style Loading Functions
 *
 * 
 *
 * @package Slimline
 * @subpackage Includes
 */

/**
 * slimline_ie_enqueue_style function
 *
 * Enqueues a style to be used with IE conditional statements.
 *
 * @param string $handle Name of the stylesheet.
 * @param string $src URI of the stylesheet to be enqueued
 * @param array $deps Array of handles (names) of any stylesheet that this stylesheet depends on.
 * @param string|bool $ver String specifying the stylesheet version number, if it has one.
 * @param string $media The media for which this stylesheet has been defined.
 * @param string $ie The IE conditional statement such as 'IE 6', 'lt IE 9', etc.
 * @see http://msdn.microsoft.com/en-us/library/ms537512(v=vs.85).aspx
 */
function slimline_ie_enqueue_style( $handle, $src, $deps = false, $ver = false, $media = 'all', $ie = 'IE' ) {

	if ( ! wp_script_is( $handle, 'registered' ) ) // register the style if it hasn't been already
		slimline_ie_register_style( $handle, $src, $deps, $ver, $media, $ie );

	wp_enqueue_style( $handle );
}

/**
 * slimline_ie_register_style function
 *
 * Registers a style to be used with IE conditional statements.
 *
 * @param string $handle Name of the stylesheet.
 * @param string $src URI of the stylesheet to be enqueued
 * @param array $deps Array of handles (names) of any stylesheet that this stylesheet depends on.
 * @param string|bool $ver String specifying the stylesheet version number, if it has one.
 * @param string $media The media for which this stylesheet has been defined.
 * @param string $ie The IE conditional statement such as 'IE 6', 'lt IE 9', etc.
 * @see http://msdn.microsoft.com/en-us/library/ms537512(v=vs.85).aspx
 */
function slimline_ie_enqueue_style( $handle, $src, $deps = false, $ver = '', $media = 'all', $ie = 'IE' ) {

	if ( $ie ) // create a custom filter for this style to output the conditional statements
		add_filter( "slimline_style_loader_tag-{$handle}", create_function( '$link', 'return "<!--[if ' . $ie . ']>{$link}<![endif]-->\n";' ) );
}

/**
 * slimline_style_loader_tag function
 *
 * Adds extra hooks to the style_loader_tag filter to allow filtering by style handle.
 *
 * @param string $link The <link href="" /> tag from WP_Styles->do_item()
 * @param string $handle The handle for the style chosen at wp_register_style() or wp_enqueue_style()
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/style_loader_tag
 */
function slimline_style_loader_tag( $link, $handle ) {

	return apply_filters( "slimline_style_loader_tag-{$handle}", $link, $handle );
}

/**
 * slimline_wp_enqueue_scripts function (pluggable)
 *
 * Enqueue default scripts and styles. Scripts are listed first, then styles. Per the Theme Review
 * Team guidelines, scripts and styles should be enqueued rather than hard-coded into the template.
 *
 * Child theme creators can alter the scripts and styles used one of two ways:
 * 1. Define a slimline_wp_enqueue_scripts function in your child theme.
 * 2. Use wp_deregister_script() and wp_deregister_style() to remove the default scripts and styles, then
 *    enqueue alternate scripts and styles as desired.
 *
 * @see http://make.wordpress.org/themes/guidelines/guidelines-template-tags-and-hooks/
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_wp_enqueue_scripts' ) ) {
	function slimline_wp_enqueue_scripts() {

		/* includes HTML5 w/ printshiv, input attribute detection, add classes, touch detection. */
		wp_enqueue_script( 'modernizr', trailingslashit( SLIMLINE_JS ) . 'vendor/modernizr.js', array( 'jquery' ), '2.6.2', false );

		wp_enqueue_script( 'slimline', trailingslashit( SLIMLINE_JS ) . 'slimline.min.js', array( 'jquery', 'modernizr' ), '0.1.0', true );

		/*
		 * Default stylesheet. Must be included using get_stylesheet_uri()
		 *
		 * @uses slimline_get_current_theme to automatically update the style version number whenever the stylesheet version number is incremented
		 */
		wp_enqueue_style( 'slimline', get_stylesheet_uri(), false, slimline_get_current_theme( 'Version' ), 'all' );
	}
}

/**
 * slimline_enqueue_comment_reply function
 *
 * Enqueue the comment reply script on singular posts to support threaded comments.
 *
 * @since 0.1.0
 */
function slimline_enqueue_comment_reply() {

	if ( comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}