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
 * slimline_base_theme tag
 *
 * Outputs information about the Slimline theme framework.
 *
 * @param string $property The theme property to return. Function echoes an empty string if no property specified.
 * @since 0.1.0
 */
function slimline_base_theme( $property = '' ) {

	echo ( $property ? slimline_get_base_theme( $property ) : '' );
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
 * slimline_class template tag
 *
 * Gives miscellaneous objects a filterable class.
 *
 * @param string $element The element identifier. Also serves as the intial class
 * @param array|string $classes (Optional). An array or space-separated string of additional classes to apply to the element.
 * @return string HTML class attribute
 * @uses slimline_get_class | post-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_class' ) ) {

	function slimline_class( $element = '', $classes = '' ) {

		echo ' class="', slimline_get_class( $element, $classes ), '"';
	}
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
 * slimline_current_theme tag
 *
 * Outputs information about the current (child) theme. If not using a child theme, outputs information
 * about the Slimline theme framework instead.
 *
 * @param string $property The theme property to return. Function echoes an empty string if no property specified.
 * @since 0.1.0
 */
function slimline_current_theme( $property = '' ) {

	echo ( $property ? slimline_get_current_theme( $property ) : '' );
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

/**
 * slimline_site_header_attributes tag
 *
 * Outputs HTML attibutes meant for the website <header> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @uses slimline_get_site_header_attributes | general-template.php
 * @since 0.1.0
 */
function slimline_site_header_attributes( $attributes = '' ) {

	echo slimline_get_site_header_attributes( $attributes );
}

/**
 * slimline_viewport_meta_tags tag
 *
 * Outputs viewport meta tag. Meant to be used in a site's <head> and hooked to wp_head() by default.
 *
 * @uses slimline_get_viewport_meta_tag | general-template.php
 * @since 0.1.0
 */
function slimline_viewport_meta_tag() {

	echo slimline_get_header_meta_tag();
}
