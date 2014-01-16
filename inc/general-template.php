<?php
/**
 * General Template Functions
 *
 * Functions for outputting content general template content.
 *
 * @package Slimline
 * @subpackage Template
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_get_html_tag function
 *
 * Generates a single HTML tag from given arguments. Developers can modify the returned
 * tag using the `slimline_get_html_tag` and/or `slimline_get_html_tag-{$tag}` filters.
 *
 * @param string $tag HTML element to generate
 * @param array|string $attributes An array or query string of attribute / value pairs
 * @param bool $close Whether or not to self-close the tag
 * @return string $return_tag The generated HTML string
 * @since 0.1.0
 */
function slimline_get_html_tag( $tag = 'div', $args = '', $close = false ) {

	$args = wp_parse_args( $args );

	$return_tag = "<{$tag} " . slimline_get_attributes( $args ) . ( $close ? ' />' : ' >' );

	$return_tag = apply_filters( 'slimline_get_html_tag', $return_tag, $tag, $args, $close );

	return apply_filters( "slimline_get_html_tag-{$tag}", $return_tag, $tag, $args, $close );
}

/**
 * slimline_get_html_tag_close function
 *
 * Generates a closing tag for a single HTML element. Developers can modify the returned
 * tag using the `slimline_get_html_tag_close` and/or `slimline_get_html_tag_close-{$tag}` 
 * filters.
 *
 * @param string $tag HTML element to close
 * @param string $after Additional content for after the closing tag, such as HTML comments
 * @return sting $return_tag The HTML string
 * @since 0.1.0
 */
function slimline_get_html_tag_close( $tag = 'div', $after = '' ) {

	$return_tag = "</{$tag}>{$after}";

	$return_tag = apply_filters( 'slimline_get_html_tag_close', $return_tag, $tag, $after );

	return apply_filters( "slimline_get_html_tag_close-{$tag}", $return_tag, $tag, $after );
}

/**
 * slimline_get_site_header_attributes function
 *
 * Generates an alphabetized string of HTML attributes for the main <header> tag from an array.
 * Essentially a wrapper function for `slimline_get_attributes()` that includes default attributes.
 * Developers can modify the returned string using the `slimline_site_header_attributes` filter.
 *
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @return string $return_attributes The generated string of attributes
 * @uses slimline_get_attributes
 * @since 0.1.0
 */
function slimline_get_site_header_attributes( $attributes = '' ) {

	// convert query strings to array and merge with defaults
	$attributes = wp_parse_args(
		$attributes,
		array(
			'class'     => slimline_get_class( 'site-header' ),
			'itemscope' => 'itemscope',
			'itemtype'  => 'http://schema.org/WPHeader'
		)
	);

	$return_attributes = slimline_get_attributes( $attributes );

	return apply_filters( 'slimline_site_header_attributes', $return_attributes, $attributes );

}

/**
 * slimline_get_viewport_meta_tag function
 *
 * Generates a viewport meta tag for use in the site's <head>. Developers can modify
 * the returned tag using the `slimline_viewport_meta_tag` filter.
 *
 * @return string $tag The generated HTML string
 * @uses slimline_get_html_tag
 * @since 0.1.0
 */
function slimline_get_viewport_meta_tag() {

	$args = array(
		'content' => 'width=device-width, initial-scale=1',
		'name'    => 'viewport'
	);

	$tag = slimline_get_html_tag( 'meta', $args, true );

	return apply_filters( 'slimline_viewport_meta_tag', $tag, $args );
}
