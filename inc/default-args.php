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
 * Parameters for `add_theme_support( 'html5' )`
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
 * Arguments for `add_theme_support( 'infinite-scroll' )`
 *
 * Adds custom arguments for JetPack's infinite scroll module.
 *
 * @return array $args Infinite Scroll arguments set to work with Slimline theme
 *                     markup
 * @since  0.1.0
 */
if ( ! function_exists( 'slimline_infinite_scroll_support_args' ) ) {

	function slimline_infinite_scroll_support_args() {

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
		 * @see https://github.com/slimline/theme/wiki/slimline_infinite_scroll_support_args
		 */
		return apply_filters( 'slimline_infinite_scroll_support_args', $args );
	}

} // if ( ! function_exists( 'slimline_infinite_scroll_args' ) )

/**
 * Arguments for `paginate_links()` on index pages
 *
 * @global object $wp_query the WP_Query object
 * @return array  $args Associative array of function arguments
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_paginate_links_args' ) ) {

	function slimline_paginate_links_args() {

		/**
		 * Current WP_Query
		 *
		 * @see https://developer.wordpress.org/reference/classes/wp_query/
		 */
		global $wp_query;

		/**
		 * Default arguments
		 *
		 * @see https://developer.wordpress.org/reference/functions/paginate_links/
		 *      Explanation of `paginate_links` arguments
		 */
		$args = array(
			'base'    => str_replace( $wp_query->found_posts, '%#%', esc_url( get_pagenum_link( $wp_query->found_posts ) ) ),
			'current' => max( 1, get_query_var( 'paged' ) ),
			'format'  => '?paged=%#%',
			'total'   => $wp_query->max_num_pages,
			'type'    => 'list',
		);

		/**
		 * Filter the defaults
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_paginate_links_args
		 */
		return apply_filters( 'slimline_paginate_links_args', $args );
	}

} // if ( ! function_exists( 'slimline_paginate_links_args' ) )

/**
 * Arguments for `add_theme_support( 'post-thumbnails' )`
 *
 * By default adds featured image meta box to all post types that support it. Theme
 * developers can alter this using the `slimline_post_thumbnails_support_args`
 * filter.
 *
 * @return bool|array TRUE to enable featured images on all post types (defaule), or
 *                    an array of post types for adding featured image UI
 * @see    https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 * @since  0.1.0
 */
if ( ! function_exists( 'slimline_post_thumbnails_support_args' ) ) {

	function slimline_post_thumbnails_support_args() {

		/**
		 * Filter the default
		 *
		 * TRUE to add featured image UI to all post types that support it.
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_post_thumbnails_support_args
		 */
		return apply_filters( 'slimline_post_thumbnails_support_args', true );
	}

} // if ( ! function_exists( 'slimline_post_thumbnails_support_args' ) )

