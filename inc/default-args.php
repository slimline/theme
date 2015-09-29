<?php
/**
 * Default arguments for function calls
 *
 * Functions for returning the parameters used in template tags and other function
 * calls. Each function listed in this file MUST be pluggable and MUST apply a filter
 * to returned results so they can be easily overridden by child theme developers.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Parameters for add_theme_support( 'html5' )
 *
 * By default adds HTML5 support for comment forms, comment lists, search forms and
 * galleries. Theme developers can alter these values using the
 * `slimline_html5_support_args` filter.
 *
 * @return array $args List of elements that should rendered using HTML5 markup
 * @since  0.1.0
 */
if ( ! function_exists( 'slimline_html5_support_args' ) ) {

	function slimline_html5_support_args() {

		/**
		 * Default arguments
		 *
		 * @see https://codex.wordpress.org/Theme_Markup
		 */
		$args = array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		);

		/**
		 * Filter the arguments
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_html5_support_args
		 */
		return apply_filters( 'slimline_html5_support_args', $args );
	}

} // if ( ! function_exists( 'slimline_html5_support_args' ) )

/**
 * Arguments for add_theme_support( 'infinite-scroll' )
 *
 * Adds custom arguments for JetPack's infinite scroll module.
 *
 * @return array $args Infinite Scroll arguments set to work with Slimline theme
 *                     markup
 * @since  0.1.0
 */
if ( ! function_exists( 'slimline_infinite_scroll_args' ) ) {

	function slimline_infinite_scroll_args() {

		/**
		 * Default arguments
		 *
		 * @see http://jetpack.me/support/infinite-scroll/ Explanation of of Infinite
		 *      Scroll arguments
		 */
		$args = array(
			'footer_widgets' => 'sidebar-3',                       // change auto-load option to click option if footer widgets are active
			'container'      => 'entries',                         // default wrapper id {@see slimline_entries_attributes() | inc/template-tags.php}
			'posts_per_page' => get_option( 'posts_per_page' ),    // let user set number of posts to load
			'render'         => 'slimline_infinite_scroll_render', // replace default rendering function with standard Slimline WordPress loop {@see index.php template} | inc/vendor.php
			'type'           => 'scroll',                          // allow posts to auto-load as user scrolls
			'wrapper'        => false,                             // do not wrap loaded posts in an extra div
		);

		/**
		 * Filter the arguments
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_infinite_scroll_args
		 */
		return apply_filters( 'slimline_infinite_scroll_args', $args );
	}

} // if ( ! function_exists( 'slimline_infinite_scroll_args' ) )