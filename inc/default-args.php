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
 * Parameters for `comment_form`
 *
 * @return array $args Associative array of function arguments
 * @link   https://github.com/slimline/theme/wiki/slimline_comment_form_args()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_comment_form_args' ) ) {

	function slimline_comment_form_args() {

		/**
		 * Default arguments
		 *
		 * @link https://developer.wordpress.org/reference/functions/comment_form/
		 *       Description of `comment_form` function arguments
		 */
		$args = array();

		/**
		 * Filter the defaults
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_comment_form_args
		 */
		return apply_filters( 'slimline_comment_form_args', $args );
	}

} // if ( ! function_exists( 'slimline_comment_form_args' ) )

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
 * Default crop for `add_image( 'slimline-login-logo' )`
 *
 * @return bool Whether to crop the logo image. Default FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_login_logo_crop()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_login_logo_crop' ) ) {

	function slimline_login_logo_crop() {

		/**
		 * Filter and return value.
		 *
		 * @param  bool $crop Logo crop
		 * @return bool $crop Logo crop
		 * @link   https://github.com/slimline/theme/wiki/slimline_login_logo_crop
		 */
		return apply_filters( 'slimline_login_logo_crop', false );
	}

} // if ( ! function_exists( 'slimline_login_logo_crop' ) )

/**
 * Default height for `add_image( 'slimline-login-logo' )`
 *
 * @return int Height for logo (in pixels) on login page. Default is 10000
 *             (effectively unlimited)
 * @link   https://github.com/slimline/theme/wiki/slimline_login_logo_height()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_login_logo_height' ) ) {

	function slimline_login_logo_height() {

		/**
		 * Filter and return value.
		 *
		 * NOTE: the default value of 10000 (pixels) is meant as an unlikely number
		 * to make sure the image size is defined by its width.
		 *
		 * @param  int $height Logo height (in pixels)
		 * @return int $height Logo height (in pixels)
		 * @link   https://github.com/slimline/theme/wiki/slimline_login_logo_height
		 */
		return apply_filters( 'slimline_login_logo_height', 10000 );
	}

} // if ( ! function_exists( 'slimline_login_logo_height' ) )

/**
 * Default width for `add_image( 'slimline-login-logo' )`
 *
 * @return int Width for logo (in pixels) on login page. Default is 640
 * @link   https://github.com/slimline/theme/wiki/slimline_login_logo_width()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_login_logo_width' ) ) {

	function slimline_login_logo_width() {

		/**
		 * Filter and return value.
		 *
		 * NOTE: the default value of 640 (pixels) is twice the width of the standard
		 * WordPress login form on the wp-login.php page. This is to support retina
		 * devices.
		 *
		 * @param  int $width Logo width (in pixels)
		 * @return int $width Logo width (in pixels)
		 * @link   https://github.com/slimline/theme/wiki/slimline_login_logo_width
		 */
		return apply_filters( 'slimline_login_logo_width', 640 );
	}

} // if ( ! function_exists( 'slimline_login_logo_width' ) )

/**
 * Default crop for `add_image( 'slimline-logo' )`
 *
 * @return bool Whether to crop the logo image. Default FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_logo_crop()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_logo_crop' ) ) {

	function slimline_logo_crop() {

		/**
		 * Filter and return value.
		 *
		 * @param  bool $crop Logo crop
		 * @return bool $crop Logo crop
		 * @link   https://github.com/slimline/theme/wiki/slimline_logo_crop
		 */
		return apply_filters( 'slimline_logo_crop', false );
	}

} // if ( ! function_exists( 'slimline_logo_crop' ) )

/**
 * Default height for `add_image( 'slimline-logo' )`
 *
 * @return int Height for logo (in pixels). Default is 10000 (effectively unlimited)
 * @link   https://github.com/slimline/theme/wiki/slimline_logo_height()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_logo_height' ) ) {

	function slimline_logo_height() {

		/**
		 * Filter and return value.
		 *
		 * NOTE: the default value of 10000 (pixels) is meant as an unlikely number
		 * to make sure the image size is defined by its width.
		 *
		 * @param  int $height Logo height (in pixels)
		 * @return int $height Logo height (in pixels)
		 * @link   https://github.com/slimline/theme/wiki/slimline_logo_height
		 */
		return apply_filters( 'slimline_logo_height', 10000 );
	}

} // if ( ! function_exists( 'slimline_logo_height' ) )

/**
 * Default width for `add_image( 'slimline-logo' )`
 *
 * @return int Width for logo (in pixels) on login page. Default is 640
 * @link   https://github.com/slimline/theme/wiki/slimline_logo_width()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_logo_width' ) ) {

	function slimline_logo_width() {

		/**
		 * Filter and return value.
		 *
		 * NOTE: the default value of 500 (pixels) is twice the logo width as defined
		 * in the stylesheet. This is for retina device support.
		 *
		 * @param  int $width Logo width (in pixels)
		 * @return int $width Logo width (in pixels)
		 * @link   https://github.com/slimline/theme/wiki/slimline_login_logo_width
		 */
		return apply_filters( 'slimline_logo_width', 500 );
	}

} // if ( ! function_exists( 'slimline_logo_width' ) )

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
 * Arguments for `paginate_comments_links()` in comments template
 *
 * @return array  $args Associative array of function arguments
 * @link   https://github.com/slimline/theme/wiki/slimline_paginate_comments_links_args()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_paginate_comments_links_args' ) ) {

	function slimline_paginate_comments_links_args() {

		/**
		 * Default arguments
		 *
		 * @link https://developer.wordpress.org/reference/functions/paginate_comments_links/
		 *       Description of `paginate_comments_links` function
		 * @link https://developer.wordpress.org/reference/functions/paginate_links/
		 *       Explanation of `paginate_links` arguments (used by
		 *       `paginate_comments_links`)
		 */
		$args = array();

		/**
		 * Filter the defaults
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_paginate_comments_links_args
		 */
		return apply_filters( 'slimline_paginate_comments_links_args', $args );
	}

} // if ( ! function_exists( 'slimline_paginate_comments_links_args' ) )

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
 * Parameters for `add_theme_support( 'tha_hooks' )`
 *
 * Theme Hook Alliance hooks.
 *
 * @return array $args List of supported hook types
 * @link   https://github.com/zamoose/themehookalliance Description of the Theme
 *         Hooks Alliance
 * @link   https://github.com/slimline/theme/wiki/slimline_tha_hooks_support_args()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_tha_hooks_support_args' ) ) {

	function slimline_tha_hooks_support_args() {

		/**
		 * @link https://github.com/zamoose/themehookalliance/blob/master/tha-theme-hooks.php
		 *       Explanation of possible arguments
		 */
		$args = array(
			// 'all',   // All possible hooks. If this is enabled the other arguments are redundant
			// 'html',  // <html> hook. Used for doctypes, etc.
			'body',     // <body> hooks
			'head',     // <head> hooks
			'header',   // <header> hooks
			'content',  // hooks (e.g., <main> and index <article>)
			'entry',    // entry hooks (e.g., singular <article>)
			'comments', // comment hooks (e.g., <section id="comments")
			'sidebars', // sidebar hooks (e.g., <aside class="sidebar")
			'sidebar',  // individual sidebar hooks (e.g., <aside class="sidebar")
			'footer',   // <footer> hooks
		);

		/**
		 * Filter the arguments
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_tha_hooks_support_args
		 */
		return apply_filters( 'slimline_tha_hooks_support_args', $args );

	}

} // if ( ! function_exists( 'slimline_tha_hooks_support_args' ) )

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

/**
 * Arguments for `wp_list_comments`
 *
 * @return array $args Associative array of function arguments
 * @link   https://github.com/slimline/theme/wiki/slimline_wp_list_comments_args()
 * @since  0.2.0
 */
if ( ! function_exists( 'slimline_wp_list_comments_args' ) ) {

	function slimline_wp_list_comments_args() {

		/**
		 * Default arguments
		 *
		 * @link https://developer.wordpress.org/reference/functions/wp_list_comments/
		 *       Explanation of `wp_list_comments` arguments
		 */
		$args = array(
			'callback'      => 'slimline_get_comment_template',     // get comments/comment.php template part
			'end-callback'  => 'slimline_get_comment_end_template', // get comments/end.php template part
			'style'         => 'ol',                                // use <ol></ol> for comment list
		);

		/**
		 * Filter the arguments
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_wp_list_comments_args
		 */
		return apply_filters( 'slimline_wp_list_comments_args', $args );
	}

} // if ( ! function_exists( 'slimline_wp_list_comments_args' ) )