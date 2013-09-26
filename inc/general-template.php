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
 * slimline_get_header_meta_tags function
 *
 * Generates meta tags for use between the site's <head></head> tags.
 *
 * @param array $tags An array of meta tags. Each tag should be an associative array of attibute / value pairs
 * @return string $return_tags The generated string of meta tags
 * @uses slimline_get_html_tag
 * @since 0.1.0
 */
function slimline_get_header_meta_tags( $tags = array() ) {

	$tags = wp_parse_args(
		$tags,
		array(
			'meta_viewport' => array(
				'content' => 'width=device-width',
				'name'    => 'viewport'
			)
		)
	);

	$return_tags = ''; // initialize empty string for later use so we do not trigger PHP notices

	foreach ( $tags as $tag_args ) {
		$return_tags .= slimline_get_html_tag( 'meta', $tag_args, true );
	}

	$return_tags = slimline_apply_filters( 'slimline_header_meta_tags', $return_tags, $tags );

	return $return_tags;
}

/**
 * slimline_get_html_tag function
 *
 * Generates a single HTML tag from given arguments
 *
 * @param string $tag HTML element to generate
 * @param array $attributes An array of attribute / value pairs
 * @param bool $close Whether or not to self-close the tag
 * @return string $return_tag The generated HTML string
 * @since 0.1.0
 */
function slimline_get_html_tag( $tag = 'div', $args = '', $close = false ) {

	$args = wp_parse_args( $args );

	$return_tag = "<{$tag} " . slimline_get_attributes( $args ) . ( $close ? ' />' : ' >' );

	$return_tag = slimline_apply_filters( "slimline_get_html_tag-{$tag}", $return_tag, $tag, $args, $close );

	return $return_tag;
}

/**
 * slimline_get_html_tag_close function
 *
 * Generates a closing tag for a single HTML element
 *
 * @param string $tag HTML element to close
 * @param string $after Additional content for after the closing tag, such as HTML comments
 * @return sting $return_tag The HTML string
 * @since 0.1.0
 */
function slimline_get_html_tag_close( $tag = 'div', $after = '' ) {

	$return_tag = "</{$tag}>{$after}";

	$return_tag = slimline_apply_filters( "slimline_get_html_tag_close-{$tag}", $return_tag, $tag, $after );

	return $return_tag;
}