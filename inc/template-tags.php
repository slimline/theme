<?php
/**
 * Custom theme template tags
 *
 * Template tags display dynamic content in the theme. In general template tags
 * listed in this file SHOULD echo the result of an associated "get" function which
 * MUST be noted in the PHPDoc description for the tag.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @see        https://codex.wordpress.org/Template_Tags
 *             Description of Template Tags
 * @link       https://github.com/slimline/theme/wiki/Template_Tags
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

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

	return slimline_get_content( $text );
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