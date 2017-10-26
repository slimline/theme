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
 * @package   Slimline\Theme
 * @author    Michael Dozark <michael@michaeldozark.com>
 * @link      http://www.michaeldozark.com/themes/slimline/
 * @see       https://developer.wordpress.org/themes/basics/theme-functions/
 * @version   0.3.0
 * @copyright Copyright (c) 2017, Michael Dozark
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since     0.1.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )

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

function slimline_theme_setup() {

	/**
	 * Filter custom content function similar to `the_content`
	 */
	add_filter( 'slimline_content', 'wptexturize',         10, 1 );
	add_filter( 'slimline_content', 'shortcode_unautop',   10, 1 );
	add_filter( 'slimline_content', 'prepend_attachment',  10, 1 );
	add_filter( 'slimline_content', 'do_shortcode',        11, 1 );
	add_filter( 'slimline_content', 'convert_smilies',     20, 1 );
	add_filter( 'slimline_content', 'wpautop',             99, 1 );
	add_filter( 'slimline_content', 'shortcode_unautop',  100, 1 );
	if ( $wp_embed instanceof WP_Embed ) {
		add_filter( 'slimline_content', array( $wp_embed, 'run_shortcode' ), 8, 1 );
		add_filter( 'slimline_content', array( $wp_embed, 'autoembed' ),     8, 1 );
	} // if ( $wp_embed instanceof WP_Embed )

	/**
	 * Filter custom index title function similar to `the_title`
	 */
	add_filter( 'slimline_title', 'wptexturize',   10, 1 );
	add_filter( 'slimline_title', 'convert_chars', 10, 1 );
	add_filter( 'slimline_title', 'trim',          10, 1 );
}