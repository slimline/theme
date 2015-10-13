<?php
/**
 * Slimline object abstraction functions
 *
 * Functions for working with Slimline objects without directly accessing methods and
 * properties.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Retrieve the Slimline singleton object
 *
 * @return object Slimline class instance
 * @link   https://github.com/slimline/theme/wiki/Slimline()
 * @since  0.2.0
 */
function Slimline() {

	return Slimline::get_instance();
}

/**
 * Retrieve the Slimline_Context singleton object
 *
 * We retrieve the object through the Slimline object so we can use that object as a
 * container.
 *
 * @return object Slimline_Context class instance
 * @link   https://github.com/slimline/theme/wiki/Slimline_Context()
 * @see    Slimline()
 * @since  0.2.0
 */
function Slimline_Context() {

	return Slimline()->get_context_object();
}

/**
 * Retrieve the Slimline_Template singleton object
 *
 * We retrieve the object through the Slimline object so we can use that object as a
 * container.
 *
 * @return object Slimline_Template class instance
 * @link   https://github.com/slimline/theme/wiki/Slimline_Template()
 * @see    Slimline()
 * @since  0.2.0
 */
function Slimline_Template() {

	return Slimline()->get_template_object();
}

/**
 * Retrieve the context array
 *
 * @return array Slimline_Context::context
 * @see    Slimline_Context()
 * @since  0.2.0
 */
function slimline_get_context() {

	return Slimline_Context()->get_context();
}

/**
 * Retrieve the text description for the current page
 *
 * @return string Slimline_Context::description
 * @see    Slimline_Context()
 * @since  0.2.0
 */
function slimline_get_context_description() {

	return Slimline_Context()->get_description();
}

/**
 * Retrieve the thumbnail ID for the current page
 *
 * @return string Slimline_Context::thumbnail_id
 * @see    Slimline_Context()
 * @since  0.2.0
 */
function slimline_get_context_thumbnail_id() {

	return Slimline_Context()->get_thumbnail_id();
}

/**
 * Retrieve the title for the current page
 *
 * @return string Slimline_Context::title
 * @see    Slimline_Context()
 * @since  0.2.0
 */
function slimline_get_context_title() {

	return Slimline_Context()->get_title();
}

/**
 * Retrieve image ID for site logo
 *
 * @return int Slimline::logo_id ID of image attachment if a site logo is found,
 *                               otherwise 0
 * @see    Slimline()
 * @since  0.2.0
 */
function slimline_get_logo_id() {

	return Slimline()->get_logo_id();
}

/**
 * Retrieve name of template parts directory
 *
 * @return string Slimline_Template::parts_directory Template parts directory name
 * @see    Slimline_Template()
 * @since  0.2.0
 */
function slimline_get_template_parts_directory() {

	return Slimline_Template()->get_parts_directory();
}

/**
 * Get template path for a specific template part
 *
 * @param  string $template_string Template string passed
 * @return string Slimline_Template::parts_directory Template parts directory name
 * @see    Slimline_Template()
 * @since  0.2.0
 */
function slimline_get_template_path( $template_string ) {

	return Slimline_Template()->get_template_path( $template_string );
}

/**
 * Retrieve name of template parts directory
 *
 * @return string Slimline_Template::parts_directory Template parts directory name
 * @see    Slimline_Template()
 * @since  0.2.0
 */
function slimline_set_template_path( $template_string, $template = '' ) {

	return Slimline_Template()->set_template_path( $template_string, $template );
}