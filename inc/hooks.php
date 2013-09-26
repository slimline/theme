<?php
/**
 * Hooks
 *
 * Hooked functions used in default Slimline templates. Every function is pluggable.
 *
 * @package Slimline
 * @subpackage Includes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_get_site_header hook
 *
 * Gets site header template part
 *
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_site_header' ) ) {
	function slimline_get_site_header() {

		slimline_get_template_part( 'site', 'header' );
	}
}

/**
 * slimline_site_wrapper hook
 *
 * Ouputs the site wrapper HTML tag.
 *
 * @return string $site_wrapper Generated HTML string
 * @uses slimline_get_html_tag to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_site_wrapper' ) ) {
	function slimline_site_wrapper() {

		$args = array(
			'class' = slimline_get_class( 'site-header' )
		);

		$site_wrapper = slimline_get_html_tag( 'div', $args, false );

		$site_wrapper = slimline_apply_filters( 'slimline_site_wrapper', $site_wrapper, $tag, $args );

		return $site_wrapper;
	}
}

