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
 *    Yes: slimline_{module name} (ex: `slimine_admin`)
 *    No : Continue.
 * 2. Is the function hooked to a core WordPress filter?
 *    Yes: slimline_{descriptive name}_{WordPress filter name} (ex: `slimline_post_ancestors_body_class`}
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
 * @version 0.0.0
 * @author Michael Dozark <michael@michaeldozark.com>
 * @copyright Copyright (c) 2013, Michael Dozark
 * @link http://www.michaeldozark.com/wordpress/themes/slimline
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/*
 * Call initialization function. This should be the only instance of add_action that
 * is not contained within a defined function.
 */ 
add_action( 'after_setup_theme', 'slimline_core' );

/**
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
	$content_width = slimline_apply_filters( 'slimline_content_width', 980 );
	$slimline = new stdClass;
	define( 'SLIMLINE_DIR', get_template_directory() );
	define( 'SLIMLINE_INC', trailingslashit( SLIMLINE_DIR ) . 'inc' );
	define( 'SLIMLINE_URI', get_template_directory_uri() );
	define( 'SLIMLINE_CSS', trailingslashit( SLIMLINE_URI ) . 'css' );
	define( 'SLIMLINE_IMG', trailingslashit( SLIMLINE_URI ) . 'img' );
	define( 'SLIMLINE_JS', trailingslashit( SLIMLINE_URI ) . 'js' );

	/* 2. Include Slimline core files */
	require( trailingslashit( SLIMLINE_INC ) . 'conditionals.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'context.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'post-template.php' );
	require( trailingslashit( SLIMLINE_INC ) . 'template-tags.php' );

	/* 3. Remove unwanted default and/or plugin-added actions */
	remove_action( 'wp_head', 'wp_generator' ); // don't show WordPress version number
	remove_action( 'wp_head', 'pods_meta' ); // don't show version number for Pods Framework

	/* 4. Remove unwanted default and/or plugin-added filters */

	/* 5. Add custom actions and action assignments */
	add_action( 'wp_enqueue_scripts', 'slimline_add_context_action', 0 ); // fire context-aware hook | inc/context.php
	add_action( 'wp_head', 'slimline_add_context_action', 0 ); // fire context-aware hook | inc/context.php
	add_action( 'wp_footer', 'slimline_add_context_action', 0 ); // fire context-aware hook | inc/context.php

	/* 6. Add custom filters and filter assignments */
	add_filter( 'body_class', 'slimline_add_context_filter', 999 ); // add context-aware filtering for body classes | inc/context.php
	add_filter( 'body_class', 'slimline_post_ancestors_body_class' ); // add ancestor class to hierarchical posts | inc/post-template.php
	add_filter( 'comment_class', 'slimline_add_context_filter', 999 ); // add context-aware filtering for comment classes | inc/context.php
	add_filter( 'post_class', 'slimline_add_context_filter', 999 ); // add context-aware filtering for post classes | inc/context.php
	add_filter( 'post_class', 'slimline_post_ancestors_post_class' ); // add parent and ancestor classes to hierarchical posts | inc/post-template.php
	add_filter( 'slimline_content', 'do_shortcode' ); // add shortcode awareness for alternative filter to the_content
	add_filter( 'slimline_content', 'wpautop' ); // add automatic paragraphs for alternative filter to the_content
	add_filter( 'slimline_content', 'wptexturize' ); // add character substitution for alternative filter to the_content
	add_filter( 'term_description', 'do_shortcode' ); // make term descriptions shortcode-aware
	add_filter( 'widget_text', 'do_shortcode' ); // make text widget shortcode-aware

	/* 7. Add theme support */

	/* 8. Miscellaneous and/or additions dependent on the above, such as adding image sizes */

}
