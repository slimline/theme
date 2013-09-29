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
 * slimline_get_site_header hook (pluggable)
 *
 * Gets site header template part
 *
 * @uses slimline_get_template_part To find and load the template part
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_site_header' ) ) {
	function slimline_get_site_header() {

		slimline_get_template_part( 'site', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
}

/**
 * slimline_get_site_footer hook (pluggable)
 *
 * Gets site footer template part
 *
 * @uses slimline_get_template_part To find and load the template part
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_site_footer' ) ) {
	function slimline_get_site_footer() {

		slimline_get_template_part( 'site', 'footer', slimline_get_queried_object_type(), get_queried_object_id() );
	}
}

/**
 * slimline_site_wrapper hook (pluggable)
 *
 * Ouputs the site wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_site_wrapper` filter.
 *
 * @uses slimline_get_html_tag to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_site_wrapper' ) ) {
	function slimline_site_wrapper() {

		$args = array(
			'id' = 'site'
		);

		$site_wrapper = slimline_get_html_tag( 'div', $args, false );

		$site_wrapper = slimline_apply_filters( 'slimline_site_wrapper', $site_wrapper );

		echo $site_wrapper;
	}
}

/**
 * slimline_site_wrapper_close hook (pluggable)
 *
 * Ouputs the site wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_site_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_site_wrapper_close' ) ) {
	function slimline_site_wrapper_close() {

		$site_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- #site -->' );

		$site_wrapper_close = slimline_apply_filters( 'slimline_site_wrapper_close', $site_wrapper_close );

		echo $site_wrapper;
	}
}


