<?php
/**
 * Script and Style Loading Functions
 *
 * 
 *
 * @package Slimline
 * @subpackage Includes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_ie_enqueue_script function
 *
 * Enqueues a script to be used with IE conditional statements. Since there is not a script_loader_tag filter
 * we can't truly enqueue the script and instead have to set it to output during wp_print_scripts or
 * wp_print_footer scripts via a custom action.
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 * @see http://msdn.microsoft.com/en-us/library/ms537512(v=vs.85).aspx
 * @since 0.1.0
 * @todo Hook into script_loader_tag instead when/if WordPress adds one.
 */
function slimline_ie_enqueue_script( $handle, $src, $deps = false, $ver = '', $in_footer = false, $ie = false ) {

	if ( ! wp_script_is( $handle, 'registered' ) ) // register the style if it hasn't been already
		slimline_ie_register_script( $handle, $src, $deps, $ver, $in_footer, $ie );

	$wp_action = ( $in_footer ? 'wp_print_footer_scripts' : 'wp_print_scripts' );

	// add action to header or footer after all other scripts have printed
	add_action( $wp_action, create_function( '$handle', 'global $wp_scripts; $ready = slimline_ie_handle_script_deps( "' . $handle . '" ); if ( $ready ) { echo "<!--[if ' . $ie . ']>"; $wp_scripts->do_items( "' . $handle . '" ); echo "<![endif]-->"; }' ), 999 );
	
}

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
 * @since 0.1.0
 */
function slimline_ie_enqueue_style( $handle, $src, $deps = false, $ver = false, $media = 'all', $ie = 'IE' ) {

	if ( ! wp_style_is( $handle, 'registered' ) ) // register the style if it hasn't been already
		slimline_ie_register_style( $handle, $src, $deps, $ver, $media, $ie );

	wp_enqueue_style( $handle );
}

/**
 * slimline_ie_enqueue_script function
 *
 * Registers a script to be used with IE conditional statements.
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 * @see http://msdn.microsoft.com/en-us/library/ms537512(v=vs.85).aspx
 * @since 0.1.0
 * @todo Hook into script_loader_tag when / if WordPress adds one.
 */
function slimline_ie_enqueue_script( $handle, $src, $deps = false, $ver = '', $in_footer = false, $ie = false ) {

	wp_register_script( $handle, $src, $deps, $ver, $in_footer );
}


/**
 * Check to see if IE-enqueued script dependencies have printed or not and print them now if
 * needed. Necessary since our IE-enqueued scripts cannot be enqueued via wp_enqueue_scripts.
 *
 * @global object $wp_scripts Contains all registered scripts {@see http://core.trac.wordpress.org/browser/tags/3.6.1/wp-includes/class.wp-scripts.php}
 * @param string $handle The script name
 * @return bool True if the script is registered and all dependencies have been printed, false if not.
 * @since 0.1.0
 */
function slimline_ie_handle_script_deps( $handle ) {
	global $wp_scripts;

	if ( ! isset( $wp_scripts->registered[ $handle ] ) )
		return false; // if the script is not registered we can't get the dependencies

	$deps = $wp_scripts->registered[ $handle ]->deps;

	foreach ( $deps as $dep ) {

		/**
		 * If the dependency has dependencies of its own, handle those first. If they aren't printed
		 * and can't be, stop evaluating.
		 */
		if ( ! ( $ready = slimline_ie_handle_script_deps( $dep ) ) )
			return false;

		/**
		 * If the dependency script hasn't already been printed, print it now.
		 */
		if ( ! wp_script_is( $dep, 'done' ) )
			$wp_scripts->do_items( $dep );

	}

	return true; // all dependencies should be printed at this point.

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
 * @since 0.1.0
 */
function slimline_ie_register_style( $handle, $src, $deps = false, $ver = '', $media = 'all', $ie = 'IE' ) {

	wp_register_style( $handle, $src, $deps, $ver, $media );

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
 * @since 0.1.0
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

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* includes HTML5 w/ printshiv, input attribute detection, add classes, touch detection. */
		wp_enqueue_script( 'modernizr', trailingslashit( SLIMLINE_JS ) . 'vendor/modernizr.js', array( 'jquery' ), '2.6.2', false );

		wp_enqueue_script( 'slimline', trailingslashit( SLIMLINE_JS ) . 'slimline.min.js', array( 'jquery', 'modernizr' ), '0.1.0', true );

		/*
		 * Default stylesheet. Must be included using get_stylesheet_uri()
		 *
		 * @uses SLIMLINE_VERSION to automatically update the style version number whenever the stylesheet version number is incremented
		 */
		wp_enqueue_style( 'slimline', get_stylesheet_uri(), false, SLIMLINE_VERSION, 'all' );
	}
}