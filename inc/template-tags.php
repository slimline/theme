<?php
/**
 * Template Tags
 *
 * Template tags for use in developing Slimline-based themes. In general these tags
 * will echo the result of a related helper function. These helper functions and the 
 * filename where they can be found MUST be listed in the PHPDoc description.
 *
 * @package Slimline
 * @subpackage Includes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_attributes tag
 *
 * Outputs HTML attributes in alphabetical order.
 *
 * @param array|string $attributes An array or query string of attribute / value pairs.
 * @uses slimline_get_attributes | post-template.php
 * @since 0.1.0
 */
function slimline_attributes( $attributes = '' ) {

	echo slimline_get_attributes( $attributes );
}

/**
 * slimline_body_attributes tag
 *
 * Outputs HTML attributes meant for the <body> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @uses slimline_get_body_attributes | post-template.php
 * @since 0.1.0
 */
function slimline_body_attributes( $attributes = '' ) {

	echo slimline_get_body_attributes( $attributes );
}

/**
 * slimline_comment_attributes tag
 *
 * Outputs HTML attributes meant for the comment wrapper tag (<article>).
 *
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @uses slimline_get_comment_attributes | comment-template.php
 * @since 0.1.0
 */
function slimline_comment_attributes( $attributes = '' ) {

	echo slimline_get_comment_attributes( $attributes );
}

/**
 * slimline_viewport_meta_tags function
 *
 * Outputs meta-viewport tags. Meant to be used in wp_head()
 *
 * @param array $tags An array of meta tags. Each tag is an array of attibute / value pairs
 * @uses slimline_get_viewport_meta_tags | general-template.php
 * @since 0.1.0
 */
function slimline_header_meta_tags( $tags = array() ) {

	echo slimline_get_header_meta_tags( $tags );
}

/**
 * slimline_html_tag tag
 *
 * Outputs a single HTML tag
 *
 * @param string $tag HTML element to generate. Defaults to div
 * @param array $attributes (Optional). An array of attribute / value pairs.
 * @param bool $close Whether or not to self-close the tag. Default false.
 * @uses slimline_get_html_tag | general-template.php
 * @since 0.1.0
 */
function slimline_html_tag( $tag = 'div', $args = '', $close = false ) {

	echo slimline_get_html_tag( $tag, $args, $close );
}

/**
 * slimline_html_tag_close tag
 *
 * Outputs a single HTML closing tag
 *
 * @param string $tag HTML element to close. Defaults to div
 * @param string $after Additional content for after the closing tag, such as HTML comments
 * @uses slimline_get_html_tag_close | general-template.php
 * @since 0.1.0
 */
function slimline_html_tag_close( $tag = 'div', $after = '' ) {

	echo slimline_get_html_tag_close( $tag, $after );
}

/**
 * slimline_post_attributes tag
 *
 * Outputs HTML attributes meant for the post wrapper tag (<article>).
 *
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @uses slimline_get_post_attributes | post-template.php
 * @since 0.1.0
 */
function slimline_post_attributes( $attributes = '' ) {

	echo slimline_get_post_attributes( $attributes );
}
