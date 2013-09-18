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
