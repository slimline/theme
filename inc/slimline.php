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

function slimline_get_context() {

	return Slimline_Context()->context;
}

function slimline_get_context_description() {

	return Slimline_Context()->description;
}

function slimline_get_context_thumbnail_id() {

	return Slimline_Context()->thumbnail_id;
}

function slimline_get_context_title() {

	return Slimline_Context()->title;
}

function slimline_get_template_parts_directory() {

	return Slimline_Template()->parts_directory;
}

function slimline_get_template_path( $template_string ) {

	return Slimline_Template()->get_template_path( $template_string );
}

function slimline_set_template_path( $template_string, $template = '' ) {

	return Slimline_Template()->set_template_path( $template_string, $template );
}