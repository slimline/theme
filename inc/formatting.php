<?php
/**
 * Formatting functions
 *
 * Functions for formatting output from other functions.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Sort an associative array by key.
 *
 * A wrapper for the ksort() function that returns the sorted array instead of
 * returning a boolean. Useful for add_action() and add_filter() calls where ksort
 * cannot be called directly.
 *
 * @param  array $array The array to be sorted
 * @return array $array Sorted array
 * @since  0.1.0
 */
function slimline_ksort( $array = array() ) {

	/**
	 * Sort array alphabetically by key
	 *
	 * @link   http://php.net/manual/en/function.ksort.php Documentation of the
	 *         `ksort` function
	 */
	ksort( $array );

	/**
	 * Return sorted array
	 */
	return $array;
}

/**
 * Sanitize keys and values from an array
 *
 * @param  array $attributes Associative array of key/value pairs
 * @return array $attributes Sanitized array
 * @since  0.2.0
 */
function slimline_sanitize_attributes_array( $attributes ) {

	/**
	 * Get array of attribute keys
	 *
	 * @link http://php.net/manual/en/function.array-keys.php
	 *       Documentation of `array_keys` function
	 */
	$keys = array_keys( $attributes );

	/**
	 * Sanitize attribute keys
	 *
	 * Attribute names be alphanumerics, dashes and/or underscores only
	 *
	 * @link https://developer.wordpress.org/reference/functions/sanitize_key/
	 *       Description of the `sanitize_key` function
	 */
	$keys = array_map( 'sanitize_key', $keys );

	/**
	 * Get array of attribute values
	 *
	 * @link http://php.net/manual/en/function.array-values.php
	 *       Documentation of `array_values` function
	 */
	$values = array_values( $attributes );

	/**
	 * Sanitize attribute values
	 *
	 * Attribute values must be suitable for including in single or double quotes.
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_attr/
	 *       Description of the `esc_attr` function
	 */
	$values = array_map( 'esc_attr', $values );

	/**
	 * Recreate $attributes array using sanitized keys and values
	 *
	 * @link http://php.net/manual/en/function.array-combine.php
	 *       Documentation of `array_combine` function
	 */
	$attributes = array_combine( $keys, $values );

	/**
	 * Return sanitized array
	 */
	return $attributes;
}