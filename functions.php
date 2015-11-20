<?php
/**
 * The functions file is used to initialize everything in the theme.  It controls how
 * the theme is loaded and sets up the supported features, default actions, and
 * default filters.  If making customizations, users should create a child theme and
 * make changes to its functions.php file.
 *
 * Function names begin with the prefix "slimline" per the WordPress Theme Repository
 * guidelines {@see http://make.wordpress.org/themes/guidelines/guidelines-recommended/}.
 * Theme functions are named according to the following decision tree:
 * 1. Is this an initialization function for a core Slimline module?
 *    Yes: slimline_{module name} (ex: `slimline_admin`)
 *    No : Continue.
 * 2. Is the function hooked to a core WordPress filter?
 *    Yes: Is the function meant to replace the core filtered data?
 *         Yes: slimline_{WordPress filter name} (ex: `slimline_body_class`) [note
 *              the function should run at priority 0 so it does not also eliminate
 *              theme/plugin filter results.]
 *         No : Can the function ONLY be run appropriately on one specific WordPress
 *              filter?
 *              Yes: slimline_{descriptive name}_{WordPress filter name} (ex:
 *                   `slimline_post_ancestors_body_class`}
 *              No : Continue.
 *    No : Continue.
 * 3. Does the function ONLY call one core WordPress function one or more times (note
 *    that if both a single and a plural form of a function exists -- such as
 *    `register_sidebar()` and `register_sidebars()` -- they are counted as the same
 *    function for naming purposes)?
 *    Yes: slimline_{WordPress function name [plural version if applicable]} (ex:
 *         `slimline_register_sidebars`)
 *    No: Continue.
 * 4. Is the function part of a family of similar functions differentiated only by
 *    context or location?
 *    Yes: slimline_{context/location}_{descriptive name} (ex:
 *         `slimline_body_attributes`, `slimline_post_attributes`)
 *    No : slimline_{descriptive name} (ex: `slimline_show_content`)
 *
 * After the initial theme setup function, functions are listed in alphabetic order.
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License version 2.0, as published by the Free
 * Software Foundation.  You may NOT assume that you can use any other version of the
 * GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this
 * program; if not, write to the Free Software Foundation, Inc., 51 Franklin St,
 * Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package   Slimline / Theme
 * @author    Michael Dozark <michael@michaeldozark.com>
 * @link      http://www.michaeldozark.com/themes/slimline/
 * @see       http://codex.wordpress.org/Functions_File_Explained
 * @version   0.2.0
 * @copyright Copyright (c) 2015, Michael Dozark
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since     0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Add theme setup hook
 *
 * This should be the only instance of `add_action` in the theme files
 * that is not contained within a defined function.
 *
 * @see https://developer.wordpress.org/reference/hooks/after_setup_theme/
 *      Documentation of the `after_setup_theme` action
 */
add_action( 'after_setup_theme', 'slimline_theme_setup' );

/**
 * Setup the theme
 *
 * Initializes the theme in the following order:
 * 1. Define globals and constants
 * 2. Include core files
 * 3. Remove unwanted default and/or plugin-added actions
 * 4. Remove unwanted default and/or plugin-added filters
 * 5. Add custom actions and action assignments
 * 6. Add custom filters and filter assignments
 * 7. Add theme support
 * 8. Miscellaneous and/or additions dependent on the above, such as adding image sizes
 *
 * @global int $content_width Defines the maximum width of embedded media
 * @link   https://github.com/slimline/theme/wiki/slimline_theme_setup()
 * @since  0.2.0
 */
function slimline_theme_setup() {

	/**
	 * The maximum allowed content width
	 *
	 * The `$content_width` global represents the width (in pixels) of the theme
	 * content area, excluding margins and padding.
	 *
	 * @link https://developer.wordpress.com/themes/content-width/
	 *       Explanation of the `$content_width` global
	 */
	global $content_width;

	/**
	 * 1. DEFINE GLOBALS AND CONSTANTS
	 */

	/**
	 * Define content width
	 *
	 * @link  https://github.com/slimline/theme/wiki/slimline_content_width
	 * @since 0.1.0
	 */
	$content_width = apply_filters( 'slimline_content_width', 1024 );

	/**
	 * Define version number
	 *
	 * In version 0.2.0 this is included only for future comparison purposes
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_get_theme/
	 *       Description of `wp_get_theme` function
	 * @link https://github.com/slimline/theme/wiki/SLIMLINE_VERSION
	 */
	define( 'SLIMLINE_VERSION', wp_get_theme( 'slimline' )->get( 'Version' ) );

	/**
	 * Define Slimline directory
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_directory/
	 *       Description of `get_template_directory` function
	 * @link https://github.com/slimline/theme/wiki/SLIMLINE_DIR
	 */
	define( 'SLIMLINE_DIR', get_template_directory() );

	/**
	 * Define directory for Slimline include files
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 * @link https://github.com/slimline/theme/wiki/SLIMLINE_INC
	 */
	define( 'SLIMLINE_INC', trailingslashit( SLIMLINE_DIR ) . 'inc' );

	/**
	 * Define Slimline directory URI
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_directory_uri/
	 *       Description of `get_template_directory_uri` function
	 * @link https://github.com/slimline/theme/wiki/SLIMLINE_URI
	 */
	define( 'SLIMLINE_URI', get_template_directory_uri() );

	/**
	 * Define Slimline stylesheet directory URI
	 *
	 * Stylesheet directory is used for stylesheets other than the core stylesheet
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 * @link https://github.com/slimline/theme/wiki/SLIMLINE_CSS
	 */
	define( 'SLIMLINE_CSS', trailingslashit( SLIMLINE_URI ) . 'css' );

	/**
	 * Define Slimline image directory URI
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 * @link https://github.com/slimline/theme/wiki/SLIMLINE_IMG
	 */
	define( 'SLIMLINE_IMG', trailingslashit( SLIMLINE_URI ) . 'img' );

	/**
	 * Define Slimline javascript directory URI
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 * @link https://github.com/slimline/theme/wiki/SLIMLINE_JS
	 */
	define( 'SLIMLINE_JS', trailingslashit( SLIMLINE_URI ) . 'js' );

	/**
	 * 2. REQUIRE CORE FILES
	 *
	 * @see slimline_includes_directory()
	 */

	/**
	 * Conditional argument functions
	 *
	 * All functions in this file MUST return bool TRUE or FALSE
	 */
	require_once( slimline_includes_directory() . 'conditionals.php' );

	/**
	 * Default theme configuration
	 *
	 * Configures core theme features (e.g., nav menus, sidebars, etc.). All
	 * functions in this file MUST be pluggable
	 */
	require_once( slimline_includes_directory() . 'config.php' );

	/**
	 * Core theme modules
	 *
	 * Setup functions for admin, login, etc.
	 */
	require_once( slimline_includes_directory() . 'core.php' );

	/**
	 * Default arguments for functions
	 *
	 * Arguments for add_theme_support and other arguments. All functions in this
	 * file MUST 1) be pluggable and 2) filter their return result
	 */
	require_once( slimline_includes_directory() . 'default-args.php' );

	/**
	 * Formatting functions
	 *
	 * Helper functions for formatting the results of other functions (e.g.,
	 * alphabetizing arrays, appending file name extensions, etc.)
	 */
	require_once( slimline_includes_directory() . 'formatting.php' );

	/**
	 * Post template functions
	 *
	 * Functions for outputting content into a template. These functions SHOULD
	 * return results (as opposed to echoing) and MUST allow filtering of results
	 */
	require_once( slimline_includes_directory() . 'post-template.php' );

	/**
	 * Slimline object functions
	 *
	 * Functions for working with Slimline objects
	 */
	require_once( slimline_includes_directory() . 'slimline.php' );

	/**
	 * Templating functions
	 *
	 * Functions for getting templates and template parts
	 */
	require_once( slimline_includes_directory() . 'template.php' );

	/**
	 * Custom theme template tags
	 *
	 * Functions for putting content into templates. Generally these functions SHOULD
	 * echo the output of another related function (found in post-template.php, for
	 * example).
	 */
	require_once( slimline_includes_directory() . 'template-tags.php' );

	/**
	 * 3. REMOVE UNWANTED DEFAULT AND/OR PLUGIN-BASED ACTIONS
	 *
	 * @link https://developer.wordpress.org/reference/functions/remove_action/
	 *       Description of `remove_action` function
	 */

	/**
	 * Remove WordPress version number from <head>
	 *
	 * @link https://developer.wordpress.org/reference/hooks/wp_head/
	 *       Description of `wp_head` action
	 * @link https://developer.wordpress.org/reference/functions/wp_generator/
	 *       Description of `wp_generator` function
	 */
	remove_action( 'wp_head', 'wp_generator' );


	/**
	 * 5. ADD CUSTOM ACTIONS AND ACTION ASSIGNMENTS
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_action/
	 *       Description of `add_action` function
	 */

	/**
	 * Setup core modules and functions (core.php)
	 */
	add_action( 'after_setup_theme', 'slimline_autoload_register', 15 ); // Register autoload functions
	add_action( 'after_setup_theme', 'slimline_default_layout',    20 ); // Use default rows, columns, etc.
	add_action( 'after_setup_theme', 'slimline_login',             20 ); // Add login page handling
	add_action( 'after_setup_theme', 'slimline_schema_org',        20 ); // Use Schema.org markup for structured data
	add_action( 'after_setup_theme', 'slimline_vendor',            20 ); // Add third-party plugin support

	/**
	 * Configure core theme functionality (config.php)
	 */
	add_action( 'init',               'slimline_register_nav_menus', 10 ); // Register main navigation menus
	add_action( 'init',               'slimline_register_sidebars',  10 ); // Register main widget areas
	add_action( 'wp_enqueue_scripts', 'slimline_wp_enqueue_scripts', 10 ); // Enqueue theme scripts and styles

	/**
	 * Add <meta> tags to <head>
	 *
	 * @link https://developer.wordpress.org/reference/hooks/wp_head/
	 *       Description of `wp_head` action
	 */
	add_action( 'wp_head', 'slimline_get_charset_tag',  0 ); // get tag-charset.php template part
	add_action( 'wp_head', 'slimline_get_viewport_tag', 1 ); // get tag-viewport.php template part
	add_action( 'wp_head', 'slimline_get_pingback_tag', 2 ); // get tag-pingback.php template part

	/**
	 * Add site <header> hooks
	 */
	add_action( 'slimline_header_top',    'slimline_get_header_logo',       10 ); // get header/logo.php template part
	add_action( 'slimline_header_bottom', 'slimline_get_header_navigation', 10 ); // get header/navigation.php template part

	/**
	 * 404.php
	 */
	add_action( 'slimline_404_content',        'slimline_get_404_posts',         10 ); // get 404/posts.php template part
	add_action( 'slimline_404_content',        'slimline_get_404_search_form',   20 ); // get 404/searchform.php template part
	add_action( 'slimline_404_entries_before', 'slimline_404_get_entries_title', 10 ); // get 404/entries-title.php template part
	add_action( 'slimline_404_entries_after',  'wp_reset_query',                 0  ); // reset $wp_query after showing recent posts

	/**
	 * Index.php
	 */
	add_action( 'slimline_content_top',    'slimline_get_index_header',     10 ); // get index/header.php template part
	add_action( 'slimline_entries_before', 'slimline_get_entries_header',   10 ); // get index/entries-header.php template part
	add_action( 'slimline_content_bottom', 'slimline_get_index_pagination', 10 ); // get index/pagination.php template part

	/**
	 * No entries found on index.php
	 */
	add_action( 'slimline_not_found_top',    'slimline_get_not_found_header',  10 ); // get not-found/header.php template part
	add_action( 'slimline_not_found_bottom', 'slimline_get_not_found_content', 10 ); // get not-found/content.php template part

	/**
	 * Individual and single entries
	 */
	add_action( 'slimline_entry_top',            'slimline_get_entry_header',      50 ); // get entry/header.php template part
	add_action( 'slimline_entry_content_before', 'slimline_get_entry_meta',        50 ); // get entry/meta.php template part
	add_action( 'slimline_entry_content_after',  'slimline_get_entry_footer',      50 ); // get entry/footer.php template part
	add_action( 'slimline_entry_bottom',         'slimline_get_comments_template', 50 ); // get comments.php

	/**
	 * Comments
	 */
	add_action( 'slimline_comments_top',    'slimline_get_comments_header',     10 ); // get comments/header.php template part
	add_action( 'slimline_comments_bottom', 'slimline_get_comments_list',       10 ); // get comments/list.php template part
	add_action( 'slimline_comments_bottom', 'slimline_get_comments_pagination', 20 ); // get comments/pagination.php template part
	add_action( 'slimline_comments_bottom', 'slimline_get_comments_form',       30 ); // get comments/form.php template part
	add_action( 'slimline_comment_bottom',  'slimline_comment_reply_link',      10 ); // Output comment reply link

	/**
	 * Sidebars
	 */
	add_action( 'slimline_content_after', 'slimline_get_sidebar_primary', 50 ); // get sidebar.php

	/**
	 * Add site <footer> hooks
	 */
	add_action( 'slimline_footer_before', 'slimline_get_sidebar_footer',    10 ); // get sidebar-footer.php
	add_action( 'slimline_footer_bottom', 'slimline_get_footer_navigation', 10 ); // get footer/navigation.php template part
	add_action( 'slimline_footer_bottom', 'slimline_get_copyright_notice',  20 ); // get footer/notice-copyright.php template part

	/**
	 * Add content filtering to 404 descriptions
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_404_description
	 * @see  slimline_content()
	 */
	add_filter( 'slimline_404_description', 'slimline_content' );

	/**
	 * Add content filtering to index descriptions
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_index_description
	 * @see  slimline_content()
	 */
	add_filter( 'slimline_index_description', 'slimline_content' );

	/**
	 * Add content filtering to not found descriptions
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_not_found_description
	 * @see  slimline_content()
	 */
	add_filter( 'slimline_not_found_description', 'slimline_content' );

	/**
	 * Make arbitrary content shortcode-aware
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_content
	 * @link https://developer.wordpress.org/reference/functions/do_shortcode/
	 *       Description of `do_shortcode` function
	 */
	add_filter( 'slimline_content', 'do_shortcode' );

	/**
	 * Add automatic paragraphs to arbitrary content
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_content
	 * @link https://developer.wordpress.org/reference/functions/wpautop/
	 *       Description of `wpautop` function
	 */
	add_filter( 'slimline_content', 'wpautop' );

	/**
	 * Add character substitution to arbitrary content
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_content
	 * @link https://developer.wordpress.org/reference/functions/wptexturize/
	 *       Description of `wptexturize` function
	 */
	add_filter( 'slimline_content', 'wptexturize' );

	/**
	 * Make term descriptions shortcode-aware
	 *
	 * @link https://developer.wordpress.org/reference/hooks/term_description/
	 *       Description of `term_description` filter
	 * @link https://developer.wordpress.org/reference/functions/do_shortcode/
	 *       Description of `do_shortcode` function
	 */
	add_filter( 'term_description', 'do_shortcode' );

	/**
	 * Make text widgets shortcode-aware
	 *
	 * @link https://developer.wordpress.org/reference/hooks/term_description/
	 *       Description of `widget_text` filter
	 * @link https://developer.wordpress.org/reference/functions/do_shortcode/
	 *       Description of `do_shortcode` function
	 */
	add_filter( 'widget_text', 'do_shortcode' );

	/**
	 * 7. ADD THEME SUPPORT
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 *       Description of `add_theme_support` function
	 */

	/**
	 * Add RSS Feed links
	 *
	 * @link https://codex.wordpress.org/Automatic_Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Use HTML5 Markup for comments, galleries, etc.
	 *
	 * @link https://codex.wordpress.org/Theme_Markup
	 * @see  slimline_html5_support_args()
	 */
	add_theme_support( 'html5', slimline_html5_support_args() );

	/**
	 * Add support for JetPack's infinite scroll
	 *
	 * @link http://jetpack.me/support/infinite-scroll/
	 * @see  slimline_infinite_scroll_support_args()
	 */
	add_theme_support( 'infinite-scroll', slimline_infinite_scroll_support_args() );

	/**
	 * Add featured image UI to post types that support them
	 *
	 * @link https://codex.wordpress.org/Post_Thumbnails
	 * @see  slimline_post_thumbnails_support_args()
	 */
	add_theme_support( 'post-thumbnails', slimline_post_thumbnails_support_args() );

	/**
	 * Add automatic <title> tag output
	 *
	 * @link https://codex.wordpress.org/Title_Tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Add image sizes
	 */

	/**
	 * Add logo size
	 *
	 * @see slimline_logo_width()
	 * @see slimline_logo_height()
	 * @see slimline_logo_crop()
	 */
	add_image_size( 'slimline-logo', slimline_logo_width(), slimline_logo_height(), slimline_logo_crop() );

	/**
	 * Add logo size for login page
	 *
	 * @see slimline_login_logo_width()
	 * @see slimline_login_logo_height()
	 * @see slimline_login_logo_crop()
	 */
	add_image_size( 'slimline-login-logo', slimline_login_logo_width(), slimline_login_logo_height(), slimline_login_logo_crop() );
}

/**
 * Returns the absolute path to the Slimline includes directory
 *
 * NOTE: returned path includes trailing slash.
 *
 * @return string $directory Absolute path for the directory
 * @link   https://github.com/slimline/theme/wiki/slimline_includes_directory()
 * @since  0.2.0
 */
function slimline_includes_directory() {

	/**
	 * Filter directory name
	 *
	 * @param string $directory Directory name. Defaults to value of SLIMLINE_INC
	 * @link  https://github.com/slimline/theme/wiki/slimline_includes_directory
	 */
	$directory = apply_filters( 'slimline_includes_directory', SLIMLINE_INC );

	/**
	 * Add trailing slash and return
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 */
	return trailingslashit( $directory );
}

/**
 * Returns the URI to the Slimline image directory
 *
 * NOTE: returned URI includes trailing slash.
 *
 * @return string $directory URI for the directory
 * @link   https://github.com/slimline/theme/wiki/slimline_image_directory_uri()
 * @since  0.2.0
 */
function slimline_image_directory_uri() {

	/**
	 * Filter directory name
	 *
	 * @param string $directory Directory name. Defaults to value of SLIMLINE_IMG
	 * @link  https://github.com/slimline/theme/wiki/slimline_image_directory_uri
	 */
	$directory = apply_filters( 'slimline_image_directory_uri', SLIMLINE_IMG );

	/**
	 * Add trailing slash and return
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 */
	return trailingslashit( $directory );
}

/**
 * Returns the URI to the Slimline javascript directory
 *
 * NOTE: returned URI includes trailing slash.
 *
 * @return string $directory URI for the directory
 * @link   https://github.com/slimline/theme/wiki/slimline_javascript_directory_uri()
 * @since  0.2.0
 */
function slimline_javascript_directory_uri() {

	/**
	 * Filter directory name
	 *
	 * @param string $directory Directory name. Defaults to value of SLIMLINE_JS
	 * @link  https://github.com/slimline/theme/wiki/slimline_javascript_directory_uri
	 */
	$directory = apply_filters( 'slimline_javascript_directory_uri', SLIMLINE_JS );

	/**
	 * Add trailing slash and return
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 */
	return trailingslashit( $directory );
}

/**
 * Returns the URI to the Slimline stylesheet directory
 *
 * NOTE: returned URI includes trailing slash.
 *
 * @return string $directory URI for the directory
 * @link   https://github.com/slimline/theme/wiki/slimline_stylesheet_directory_uri()
 * @since  0.2.0
 */
function slimline_stylesheet_directory_uri() {

	/**
	 * Filter directory name
	 *
	 * @param string $directory Directory name. Defaults to value of SLIMLINE_CSS
	 * @link  https://github.com/slimline/theme/wiki/slimline_stylesheet_directory_uri
	 */
	$directory = apply_filters( 'slimline_stylesheet_directory_uri', SLIMLINE_CSS );

	/**
	 * Add trailing slash and return
	 *
	 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
	 *       Description of `trailingslashit` function
	 */
	return trailingslashit( $directory );
}