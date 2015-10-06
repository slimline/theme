<?php
/**
 * Contextual content functions
 *
 * Functions for working with the Slimline_Context object without directly accessing
 * methods and properties.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly


function Slimline_Context() {

	return Slimline_Context::get_instance();
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