<?php
/**
 * Custom theme template tags
 *
 * Template tags display dynamic content in the theme. In general template tags
 * listed in this file SHOULD echo the result of an associated "get" function which
 * MUST be noted in the PHPDoc description for the tag.
 *
 * @package    Slimline\Theme
 * @subpackage Includes
 * @see        https://codex.wordpress.org/Template_Tags
 *             Description of Template Tags
 * @link       https://github.com/slimline/theme/wiki/Template_Tags
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Generates a string of HTML attributes with values from an array.
 *
 * @param string       $element    The element to generate attributes for
 *                                 (e.g., "header", "footer", etc.)
 * @param array|string $attributes (Optional). An associative array or query string
 *                                 of attribute/value pairs.
 * @param array        $defaults   (Optional). Associative array of attribute/value
 *                                 pairs. Used only when an element-specific
 *                                 attribute generation function does not exist.
 * @link  https://github.com/slimline/theme/wiki/slimline_get_attributes()
 * @uses  slimline_get_attributes()
 * @uses  slimline_get_element_attributes()
 * @since 0.3.0
 */
function slimline_attributes( $element, $attributes = array(), $defaults = array() ) {

	/**
	 * Empty string to hold our attributes
	 */
	$attr = '';

	/**
	 * Sanitize element name for use in filters and function names
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_html/
	 *       Documentation of the `esc_html` function
	 */
	$element = esc_html( $element );

	/**
	 * Element-specific attributes function
	 */
	$function = "slimline_get_{$element}_attributes";

	/**
	 * Check to see if the element-specific attributes function exists. If it does,
	 * use it to generate the attributes array.
	 */
	if ( function_exists( $function ) ) {

		$attributes = $function( $attributes );

	/**
	 * If element-specific attributes function does not exist, use the generic
	 * function directly.
	 */
	} else { // if ( function_exists( $function ) )

		$attributes = slimline_get_attributes( $element, $attributes, $defaults );

	} // if ( function_exists( $function ) )

	/**
	 * Concatenate attribute string
	 *
	 * @link http://php.net/manual/en/function.sprintf.php
	 *       Documentation of the PHP `sprintf` function
	 * @link https://developer.wordpress.org/reference/functions/esc_html/
	 *       Documentation of the `esc_html` function
	 * @link https://developer.wordpress.org/reference/functions/esc_attr/
	 *       Documentation of the `esc_attr` function
	 */
	foreach ( $attributes as $attribute => $value ) {
		$attr .= sprintf( ' %1$s="%2$s"', esc_html( $attribute ), esc_attr( $value ) );
	} // foreach ( $attributes as $attribute => $value )

	/**
	 * Trim whitespace from the ends of the attributes string
	 *
	 * @link http://php.net/manual/en/function.trim.php
	 *       Documentation of the PHP `trim` function
	 */
	echo trim( $attr );
}

/**
 * Output attributes for the site <body>
 *
 * @param array|string $attributes (Optional). An associative array or query string
 *                                 of attribute/value pairs.
 * @link  https://github.com/slimline/theme/wiki/slimline_body_attributes()
 * @uses  slimline_attributes()
 * @since 0.3.0
 */
function slimline_body_attributes( $attributes = array() ) {

	slimline_attributes( 'body', $attributes );
}

/**
 * Gives miscellaneous objects a filterable class.
 *
 * This is meant to work similarly to the `body_class` and/or `post_class` functions,
 * but for miscellaneous or arbitrary elements.
 *
 * @param  string      $element The element to generate attributes for (e.g.,
 *                              "header", "footer", etc.)
 * @param array|string $classes (Optional). An array or space-separated string of
 *                              additional classes to apply to the element.
 * @uses  slimline_get_class() to generate the class string
 * @link  https://github.com/slimline/theme/wiki/slimline_class()
 * @since 0.1.0
 */
function slimline_class( $element, $classes = array() ) {

	echo 'class="' . implode( ' ', slimline_get_class( $element, $classes ) ) . '"';
}

/**
 * Output filtered text content
 *
 * Functions similar to `the_content`, but takes arbirtrary text. Also avoids the
 * problem of applying third-party filters hooked to `the_content` (ex: JetPack
 * sharing buttons) to text that should not have them.
 *
 * @param string $text Text to filter
 * @link  https://github.com/slimline/theme/wiki/slimline_content()
 * @uses  slimline_get_content()
 * @since 0.2.0
 */
function slimline_content( $text = '' ) {

	echo slimline_get_content( $text );
}

/**
 * Output attributes for the site content <div>
 *
 * @param array|string $attributes (Optional). An associative array or query string
 *                                 of attribute/value pairs.
 * @link  https://github.com/slimline/theme/wiki/slimline_document_attributes()
 * @uses  slimline_attributes()
 * @since 0.3.0
 */
function slimline_document_attributes( $attributes = array() ) {

	slimline_attributes( 'document', $attributes );
}

/**
 * Output attributes for the site <footer>
 *
 * @param array|string $attributes (Optional). An associative array or query string
 *                                 of attribute/value pairs.
 * @link  https://github.com/slimline/theme/wiki/slimline_footer_attributes()
 * @uses  slimline_attributes()
 * @since 0.2.0
 */
function slimline_footer_attributes( $attributes = array() ) {

	slimline_attributes( 'footer', $attributes );
}

/**
 * Output attributes for the site <header>
 *
 * @param array|string $attributes (Optional). An associative array or query string
 *                                 of attribute/value pairs.
 * @link  https://github.com/slimline/theme/wiki/slimline_header_attributes()
 * @uses  slimline_attributes()
 * @since 0.2.0
 */
function slimline_header_attributes( $attributes = array() ) {

	slimline_attributes( 'header', $attributes );
}

/**
 * Output attributes for the site <main>
 *
 * @param array|string $attributes (Optional). An associative array or query string
 *                                 of attribute/value pairs.
 * @link  https://github.com/slimline/theme/wiki/slimline_main_attributes()
 * @uses  slimline_attributes()
 * @since 0.3.0
 */
function slimline_main_attributes( $attributes = array() ) {

	slimline_attributes( 'main', $attributes );
}

/**
 * Output site name linked to home
 *
 * @param int $blog_id ID of the blog in question. Default is the ID of the current blog.
 * @uses  slimline_get_site_title()
 * @since 0.4.0
 */
function slimline_site_title( $blog_id = 0 ) {

	echo slimline_get_site_title( $blog_id );
}