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
 * Add .php extension to a string
 *
 * Useful for array mapping. Strips existing trailing ".php" (if it exists) before
 * appending.
 *
 * @param  string $string The string to append ".php" to
 * @return string $string String with ".php" appended
 * @link   https://github.com/slimline/theme/wiki/slimline_add_php_extension()
 * @since  0.2.0
 */
function slimline_add_php_extension( $string = '' ) {

	$string = rtrim( $string, '.php' );

	return "{$string}.php";
}

/**
 * Sort an associative array by key.
 *
 * A wrapper for the ksort() function that returns the sorted array instead of
 * returning a boolean. Useful for add_action() and add_filter() calls where ksort
 * cannot be called directly.
 *
 * @param  array $array The array to be sorted
 * @return array $array Sorted array
 * @link   https://github.com/slimline/theme/wiki/slimline_ksort()
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
 * Filter and merge two or more arrays of HTML classes
 *
 * @param  array $classes
 * @param  array $extra_classes
 * @return array $classes
 * @link   https://github.com/slimline/theme/wiki/slimline_merge_classes()
 * @since  0.2.0
 */
function slimline_merge_classes( $filter, $classes = array(), $args = array() ) {

	/**
	 * Grab all function arguments
	 *
	 * This allows us to use more than one array of extra classes if needed.
	 *
	 * @link http://php.net/manual/en/function.func-get-args.php
	 *       Description of `func_get_args` function
	 */
	$args = func_get_args();

	/**
	 * Remove $filter and $classes from arguments array
	 *
	 * @link http://php.net/manual/en/function.array_slice.php
	 *       Description of `array_slice` function
	 */
	$args = array_slice( $args, 2 );

	/**
	 * Create array for consolidating all class arrays and merge
	 */
	$extra_classes = array();

	foreach ( $args as $arg ) {
		$extra_classes = array_merge( $extra_classes, (array) $arg );
	} // foreach ( $args as $arg )

	/**
	 * Filter the extra classes
	 */
	$extra_classes = apply_filters( $filter, $extra_classes );

	/**
	 * Merge extra classes into the default classes
	 */
	$classes = array_merge( $classes, $extra_classes );

	return $classes;
}

/**
 * Sanitize keys and values from an array
 *
 * @param  array $attributes Associative array of key/value pairs
 * @return array $attributes Sanitized array
 * @link   https://github.com/slimline/theme/wiki/slimline_sanitize_attributes_array()
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
	 * Attribute names must be alphanumerics, dashes and/or underscores only
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