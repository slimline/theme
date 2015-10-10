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
 * @link   https://github.com/slimline/theme/wiki/slimline_html5_support_args()
 * @since  0.1.0
 */
if ( ! function_exists( 'slimline_html5_support_args' ) ) {

	function slimline_html5_support_args() {

		/**
		 * Default arguments
		 *
		 * @link https://codex.wordpress.org/Theme_Markup
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
		 * @link https://github.com/slimline/theme/wiki/slimline_html5_support_args
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
 * @link   https://github.com/slimline/theme/wiki/slimline_infinite_scroll_support_args()
 * @since  0.1.0
 */
if ( ! function_exists( 'slimline_infinite_scroll_support_args' ) ) {

	function slimline_infinite_scroll_support_args() {

		/**
		 * Default arguments
		 *
		 * @link http://jetpack.me/support/infinite-scroll/ Explanation of of Infinite
		 *       Scroll arguments
		 */
		$args = array(
			'footer_widgets' => 'sidebar-3',                       // change auto-load option to click option if footer widgets are active
			'container'      => 'entries',                         // default wrapper id {@link slimline_entries_attributes() | inc/template-tags.php}
			'posts_per_page' => get_option( 'posts_per_page' ),    // let user set number of posts to load
			'render'         => 'slimline_infinite_scroll_render', // replace default rendering function with standard Slimline WordPress loop {@link index.php template} | inc/vendor.php
			'type'           => 'scroll',                          // allow posts to auto-load as user scrolls
			'wrapper'        => false,                             // do not wrap loaded posts in an extra div
		);

		/**
		 * Filter the arguments
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_infinite_scroll_support_args
		 */
		return apply_filters( 'slimline_infinite_scroll_support_args', $args );
	}

} // if ( ! function_exists( 'slimline_infinite_scroll_args' ) )

/**
 * Arguments for `paginate_links()` on index pages
 *
 * @global object $wp_query the WP_Query object
 * @return array  $args Associative array of function arguments
 * @link   https://github.com/slimline/theme/wiki/slimline_paginate_links_args()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_paginate_links_args' ) ) {

	function slimline_paginate_links_args() {

		/**
		 * Current WP_Query
		 *
		 * @link https://developer.wordpress.org/reference/classes/wp_query/
		 */
		global $wp_query;

		/**
		 * Default arguments
		 *
		 * @link https://developer.wordpress.org/reference/functions/paginate_links/
		 *       Explanation of `paginate_links` arguments
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
		 * @link https://github.com/slimline/theme/wiki/slimline_paginate_links_args
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
 * @link   https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 * @link   https://github.com/slimline/theme/wiki/slimline_post_thumbnails_support_args()
 * @since  0.1.0
 */
if ( ! function_exists( 'slimline_post_thumbnails_support_args' ) ) {

	function slimline_post_thumbnails_support_args() {

		/**
		 * Filter the default
		 *
		 * TRUE to add featured image UI to all post types that support it.
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_post_thumbnails_support_args
		 */
		return apply_filters( 'slimline_post_thumbnails_support_args', true );
	}

} // if ( ! function_exists( 'slimline_post_thumbnails_support_args' ) )

/**
 * Closing tag for entry title
 *
 * Defaults to <h1> for singular entries, <h3> for entries on an index page. Meant to
 * be used as the second argument in `the_title()`.
 *
 * @return string HTML closing tag with comment
 * @link   https://github.com/slimline/theme/wiki/slimline_the_entry_title_after()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_the_entry_title_after' ) ) {

	function slimline_the_entry_title_after() {

		/**
		 * Get the correct heading tag
		 *
		 * @link slimline_the_entry_title_tag() | inc/default-args.php
		 */
		$tag = slimline_the_entry_title_tag();

		/**
		 * Filter and return the markup
		 *
		 * @param string      HTML closing tag with comment
		 * @param string $tag The closing tag element (e.g., "h1" or "h3")
		 * @link  https://github.com/slimline/theme/wiki/slimline_the_entry_title_after
		 */
		return apply_filters( 'slimline_the_entry_title_after', "</{$tag}><!-- .entry-title -->", $tag );

	}

} // if ( ! function_exists( 'slimline_the_entry_title_after') )

/**
 * Opening tag for entry title
 *
 * Defaults to <h1> for singular entries, <h3> for entries on an index page. Meant to
 * be used as the first argument in `the_title()`.
 *
 * @return string HTML opening tag
 * @link   https://github.com/slimline/theme/wiki/slimline_the_entry_title_before()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_the_entry_title_before' ) ) {

	function slimline_the_entry_title_before() {

		/**
		 * Get the correct heading tag
		 *
		 * @link slimline_the_entry_title_tag() | inc/default-args.php
		 */
		$tag = slimline_the_entry_title_tag();

		/**
		 * Get the title tag attributes
		 *
		 * @link slimline_get_entry_title_attributes() | inc/post-template.php
		 */
		$attributes = slimline_get_entry_title_attributes();

		/**
		 * Filter and return the markup
		 *
		 * @param string             HTML opening tag
		 * @param string $tag        The opening tag element (e.g., "h1" or "h3")
		 * @param string $attributes HTML attributes for the tag
		 * @link  https://github.com/slimline/theme/wiki/slimline_the_entry_title_before
		 */
		return apply_filters( 'slimline_the_entry_title_before', "<{$tag} {$attributes}>", $tag, $attributes );

	}

} // if ( ! function_exists( 'slimline_the_entry_title_before') )

/**
 * Title tag for entry title
 *
 * Defaults to <h1> for singular entries, <h3> for entries on an index page.
 *
 * @return string $tag The heading identifier (i.e., "h1" or "h3")
 * @link   https://github.com/slimline/theme/wiki/slimline_the_entry_title_tag()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_the_entry_title_tag' ) ) {

	function slimline_the_entry_title_tag() {

		/**
		 * Set to h1 if on a singular post, otherwise h3
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_singular/
		 *       Description of `is_singular` conditional
		 */
		$tag = ( is_singular() ? 'h1' : 'h3' );

		/**
		 * Filter and return the markup
		 *
		 * @param string $tag The heading identifier (i.e., "h1" or "h3")
		 * @link  https://github.com/slimline/theme/wiki/slimline_the_entry_title_tag
		 */
		return apply_filters( 'slimline_the_entry_title_tag', $tag );
	}

} // if ( ! function_exists( 'slimline_the_entry_title_tag' ) )

/**
 * Arguments for `the_title_attribute` on index pages
 *
 * @return array $args Associative array of function arguments
 * @link   https://github.com/slimline/theme/wiki/slimline_the_title_attribute_args()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_the_title_attribute_args' ) ) {

	function slimline_the_title_attribute_args() {

		/**
		 * Default arguments
		 *
		 * @link https://developer.wordpress.org/reference/functions/the_title_attribute/
		 *       Explanation of `the_title_attribute` arguments
		 */
		$args = array(
			'before' => __( 'Click here to continue reading "' ),
			'after'  => '"',
			'echo'   => false,
		);

		/**
		 * Filter the arguments
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_the_title_attribute_args
		 */
		return apply_filters( 'slimline_the_title_attribute_args', $args );
	}

} // if ( ! function_exists( 'slimline_the_title_attribute_args' ) )