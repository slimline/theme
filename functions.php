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
 * @since  0.2.0
 */
function slimline_theme_setup() {

	/**
	 * The maximum allowed content width
	 *
	 * The `$content_width` global represents the width (in pixels) of the theme
	 * content area, excluding margins and padding.
	 *
	 * @see https://developer.wordpress.com/themes/content-width/
	 *      Explanation of the `$content_width` global
	 */
	@global $content_width;

	/**
	 * 1. Define globals and constants
	 */

	/**
	 * Define content width
	 *
	 * @see   https://github.com/slimline/theme/wiki/slimline_content_width
	 * @since 0.1.0
	 */
	$content_width = apply_filters( 'slimline_content_width', 1024 );


}