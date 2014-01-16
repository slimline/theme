<?php
/**
 * The functions file is used to initialize everything in the theme.  It controls how the theme is loaded and 
 * sets up the supported features, default actions, and default filters.  If making customizations, users 
 * should create a child theme and make changes to its functions.php file.
 * 
 * Function names begin with the prefix "slimline" per the WordPress Theme Repository guidelines
 * {@see http://make.wordpress.org/themes/guidelines/guidelines-recommended/}. Theme functions are named 
 * according to the following decision tree:
 * 1. Is this an initialization function for a core Slimline module?
 *    Yes: slimline_{module name} (ex: `slimline_admin`)
 *    No : Continue.
 * 2. Is the function hooked to a core WordPress filter?
 *    Yes: Is the function meant to replace the core filtered data?
 *         Yes: slimline_{WordPress filter name} (ex: `slimline_body_class`) [note the function should run at 
 *              priority 0 so it does not also eliminate theme/plugin filter results.]
 *         No : Can the function ONLY be run appropriately on one specific WordPress filter?
 *              Yes: slimline_{descriptive name}_{WordPress filter name} (ex: `slimline_post_ancestors_body_class`}
 *              No : Continue.
 *    No : Continue.
 * 3. Does the function ONLY call one core WordPress function one or more times (note that if both a single and
 *    a plural form of a function exists -- such as register_sidebar() and register_sidebars() -- they are 
 *    counted as the same function for this purpose)?
 *    Yes: slimline_{WordPress function name [plural version if applicable]} (ex: `slimline_register_sidebars`)
 *    No: Continue.
 * 4. Is the function part of a family of similar functions differentiated only by context or location?
 *    Yes: slimline_{context/location}_{descriptive name} (ex: `slimline_body_attributes`, `slimline_post_attributes`)
 *    No : slimline_{descriptive name} (ex: `slimline_show_content`)
 * 
 * After the initial theme setup function, functions are listed in alphabetic order.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2.0, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package Slimline
 * @subpackage Functions
 * @version 0.1.0
 * @author Michael Dozark <michael@michaeldozark.com>
 * @copyright Copyright (c) 2014, Michael Dozark
 * @link http://www.michaeldozark.com/wordpress/themes/slimline
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @see http://codex.wordpress.org/Functions_File_Explained
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/*
 * Call initialization function. This should be the only instance of add_action that
 * is not contained within a defined function.
 */ 
add_action( 'after_setup_theme', 'slimline_core' );

/**
 * slimline_core function
 *
 * Initializes the theme like so:
 * 1. Define globals and constants
 * 2. Include Slimline core files
 * 3. Remove unwanted default and/or plugin-added actions
 * 4. Remove unwanted default and/or plugin-added filters
 * 5. Add custom actions and action assignments
 * 6. Add custom filters and filter assignments
 * 7. Add theme support
 * 8. Miscellaneous and/or additions dependent on the above, such as adding image sizes
 *
 * @global int $content_width Defines the maximum width of embedded media {@see http://codex.wordpress.org/Content_Width}
 * @global object $slimline The Slimline theme object. Used for storing dynamic variables used in functions and template tags
 */
function slimline_core() {
	global $content_width, $slimline;

	/* 1. Define globals and constants */
	$content_width = apply_filters( 'slimline_content_width', 980 );
	$slimline = new stdClass;
	define( 'SLIMLINE_VERSION', slimline_get_base_theme( 'Version' ) );
	define( 'SLIMLINE_DIR', get_template_directory() );
	define( 'SLIMLINE_INC', trailingslashit( SLIMLINE_DIR ) . 'inc' );
	define( 'SLIMLINE_URI', get_template_directory_uri() );
	define( 'SLIMLINE_CSS', trailingslashit( SLIMLINE_URI ) . 'css' );
	define( 'SLIMLINE_IMG', trailingslashit( SLIMLINE_URI ) . 'img' );
	define( 'SLIMLINE_JS', trailingslashit( SLIMLINE_URI ) . 'js' );

	/* 2. Include Slimline core files */
	require( trailingslashit( SLIMLINE_INC ) . 'conditionals.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'default-args.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'general-template.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'hooks.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'post-template.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'script-loader.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'template.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'template-tags.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'theme.php' );

	/* 3. Remove unwanted default and/or plugin-added actions */
	remove_action( 'wp_head', 'wp_generator' ); // don't show WordPress version number
	remove_action( 'wp_head', 'pods_meta' ); // don't show version number for Pods Framework

	/* 4. Remove unwanted default and/or plugin-added filters */

	/* 5. Add custom actions and action assignments */
	add_action( 'wp_head', 'slimline_viewport_meta_tag' ); // outputs a viewport meta tag | inc/template-tags.php
	add_action( 'wp_loaded', 'slimline_login' ); // initialize login area
	add_action( 'wp_loaded', 'slimline_admin' ); // initialize admin area

	/* 6. Add custom filters and filter assignments */
	add_filter( 'attachment_template', 'slimline_single_template', 0 ); // replace default template hierarchy for single posts | inc/template.php
	add_filter( 'author_template', 'slimline_author_template', 0 ); // replace default template hierarchy for author archives | inc/template.php
	add_filter( 'body_class', 'slimline_post_ancestors_body_class' ); // add ancestor class to hierarchical posts | inc/post-template.php
	add_filter( 'category_template', 'slimline_taxonomy_template', 0 ); // replace default template hierarchy for taxonomy archive | inc/template.php
	add_filter( 'page_template', 'slimline_single_template', 0 ); // replace default template hierarchy for single posts | inc/template.php
	add_filter( 'post_class', 'slimline_post_ancestors_post_class' ); // add parent and ancestor classes to hierarchical posts | inc/post-template.php
	add_filter( 'single_template', 'slimline_single_template', 0 ); // replace default template hierarchy for single posts | inc/template.php
	add_filter( 'slimline_content', 'do_shortcode' ); // add shortcode awareness for alternative filter to the_content
	add_filter( 'slimline_content', 'wpautop' ); // add automatic paragraphs for alternative filter to the_content
	add_filter( 'slimline_content', 'wptexturize' ); // add character substitution for alternative filter to the_content
	add_filter( 'slimline_entry_thumbnail', 'slimline_entry_thumbnail_link' ); // wrap entry thumbnails in anchor tag on archives and blog home | inc/hooks.php
	add_filter( 'slimline_get_attributes', 'slimline_ksort', 0 ); // alphabetize attributes by attribute name | functions.php
	add_filter( 'style_loader_tag', 'slimline_style_loader_tag', 10, 2 ); // filter style tags by style handle | inc/script-loader.php
	add_filter( 'tag_template', 'slimline_taxonomy_template', 0 ); // replace default template hierarchy for taxonomy archive | inc/template.php
	add_filter( 'taxonomy_template', 'slimline_taxonomy_template', 0 ); // replace default template hierarchy for taxonomy archive | inc/template.php
	add_filter( 'term_description', 'do_shortcode' ); // make term descriptions shortcode-aware
	add_filter( 'widget_text', 'do_shortcode' ); // make text widget shortcode-aware

	/* 7. Add theme support */
	add_theme_support( 'automatic-feed-links' ); // add RSS feed links to wp_head(). {@see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links}
	add_theme_support( 'custom-header', slimline_custom_header_support_args() ); // allow custom header upload {@see http://codex.wordpress.org/Custom_Headers}
	add_theme_support( 'html5', slimline_html5_support_args() ); // allow HTML5 markup. Not necessary for Slimline themes, but included here for completeness and possible future non-HTML5 support {@see http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5}
	add_theme_support( 'post-thumbnails', slimline_post_thumbnails_support_args() ); // allow "featured image" upload. {@see http://codex.wordpress.org/Post_Thumbnails}

	/* 8. Miscellaneous and/or additions dependent on the above, such as adding image sizes */

}

/**
 * slimline_admin function
 *
 * Initializes the admin area like so:
 *
 * @since 0.1.0
 */
function slimline_admin() {

	if ( ! is_admin() )
		return; // stop processing if not in the dashboard

	define( 'SLIMLINE_ADMIN', trailingslashit( SLIMLINE_PATH ) . 'admin' );

	include( trailingslashit( SLIMLINE_ADMIN ) . 'edit-tags.php' );
	include( trailingslashit( SLIMLINE_ADMIN ) . 'settings.php' );

	add_action( 'load-edit-tags.php', 'slimline_add_taxonomy_tinymce' ); // replace default description textarea with a TinyMCE editor
}

/**
 * slimline_login function
 *
 * Initializes the login area like so:
 *
 * @since 0.1.0
 */
function slimline_login() {
	global $pagenow;

	if ( ! in_array( $pagenow, array( 'wp-login.php', 'wp-register.php' ) ) )
		return; // prevent loading login-specific files on non-login screens

	include( trailingslashit( SLIMLINE_DIR ) . 'login.php' );

	add_action( 'login_head', 'slimline_login_logo' ); // replace the default login logo with the uploaded custom header | inc/login.php

	add_filter( 'login_headertitle', 'slimline_login_headertitle' ); // replace login logo title with site name | inc/login.php
	add_filter( 'login_headerurl', 'slimline_login_headerurl' ); // replace login logo url with home url | inc/login.php
}

/**
 * slimline_ksort function
 *
 * Sorts an associative array by key. A wrapper for the ksort() function that returns the sorted
 * array instead of returning a boolean. Useful for add_action() and add_filter() calls where ksort
 * cannot be called directly.
 *
 * @param array $array The array to be sorted
 * @return array $array Sorted array
 * @uses ksort()
 * @since 0.1.0
 */
function slimline_ksort( $array = array() ) {

	ksort( $array );

	return $array;
}