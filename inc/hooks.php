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
 * slimline_blog_wrapper hook (pluggable)
 *
 * Ouputs the blog wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_blog_wrapper` filter.
 *
 * @uses slimline_get_html_tag to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_blog_wrapper' ) ) {
	function slimline_blog_wrapper() {

		$args = array(
			'class'     => slimline_get_class( 'index' ),
			'itemprop'  => 'main',
			'itemscope' => 'itemscope',
			'itemtype'  => 'http://schema.org/Blog',
			'role'      => 'main'
		);

		$blog_wrapper = slimline_get_html_tag( 'div', $args, false );

		$blog_wrapper = slimline_apply_filters( 'slimline_blog_wrapper', $blog_wrapper );

		echo $blog_wrapper;
	}
}

/**
 * slimline_blog_wrapper_close hook (pluggable)
 *
 * Ouputs the blog wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_blog_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_blog_wrapper_close' ) ) {
	function slimline_blog_wrapper_close() {

		$blog_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .index -->' );

		$blog_wrapper_close = slimline_apply_filters( 'slimline_blog_wrapper_close', $blog_wrapper_close );

		echo $blog_wrapper;
	}
}

/**
 * slimline_content_wrapper hook (pluggable)
 *
 * Ouputs the content wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_content_wrapper` filter.
 *
 * @uses slimline_get_html_tag to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_content_wrapper' ) ) {
	function slimline_content_wrapper() {

		$args = array(
			'class' => slimline_get_class( 'content' )
		);

		$content_wrapper = slimline_get_html_tag( 'div', $args, false );

		$content_wrapper = slimline_apply_filters( 'slimline_content_wrapper', $content_wrapper );

		echo $content_wrapper;
	}
}

/**
 * slimline_content_wrapper_close hook (pluggable)
 *
 * Ouputs the content wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_content_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_content_wrapper_close' ) ) {
	function slimline_content_wrapper_close() {

		$content_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .content -->' );

		$content_wrapper_close = slimline_apply_filters( 'slimline_content_wrapper_close', $content_wrapper_close );

		echo $content_wrapper;
	}
}

/**
 * slimline_entries_wrapper hook (pluggable)
 *
 * Ouputs the entries wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_entries_wrapper` filter.
 *
 * @uses slimline_get_html_tag to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entries_wrapper' ) ) {
	function slimline_entries_wrapper() {

		$args = array(
			'class' => slimline_get_class( 'entries' )
		);

		$entries_wrapper = slimline_get_html_tag( 'div', $args, false );

		$entries_wrapper = slimline_apply_filters( 'slimline_entries_wrapper', $entries_wrapper );

		echo $entries_wrapper;
	}
}

/**
 * slimline_entries_wrapper_close hook (pluggable)
 *
 * Ouputs the entries wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_entries_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entries_wrapper_close' ) ) {
	function slimline_entries_wrapper_close() {

		$entries_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .entries -->' );

		$entries_wrapper_close = slimline_apply_filters( 'slimline_entries_wrapper_close', $entries_wrapper_close );

		echo $entries_wrapper;
	}
}

/**
 * slimline_get_blog_header hook (pluggable)
 *
 * Gets blog-header template part
 *
 * @uses slimline_get_template_part To find and load the template part
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_blog_header' ) ) {
	function slimline_get_blog_header() {

		slimline_get_template_part( 'blog', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
}

/**
 * slimline_get_custom_header hook (pluggable)
 *
 * Gets custom header template part
 *
 * @uses slimline_get_template_part To find and load the template part
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_custom_header' ) ) {
	function slimline_get_custom_header() {

		slimline_get_template_part( 'custom', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
}

/**
 * slimline_get_header_nav hook (pluggable)
 *
 * Gets nav-header template part
 *
 * @uses slimline_get_template_part To find and load the template part
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_header_nav' ) ) {
	function slimline_get_header_nav() {

		slimline_get_template_part( 'nav', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
}

/**
 * slimline_get_primary_sidebar hook (pluggable)
 *
 * Includes the primary widget area.
 *
 * @uses get_sidebar()
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_primary_sidebar' ) ) {
	function slimline_get_primary_sidebar() {

		get_sidebar();
	}
}

/**
 * slimline_get_secondary_sidebar hook (pluggable)
 *
 * Includes the secondary widget area.
 *
 * @uses get_sidebar()
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_secondary_sidebar' ) ) {
	function slimline_get_secondary_sidebar() {

		get_sidebar( 'secondary' );
	}
}

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
			'class' => slimline_get_class( 'site' )
		);

		$site_wrapper = slimline_get_html_tag( 'div', $args, false );

		$site_wrapper = slimline_apply_filters( 'slimline_site_wrapper', $site_wrapper );

		echo $site_wrapper;
	}
}

/**
 * slimline_site_wrapper_close hook (pluggable)
 *
 * Ouputs the site wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_site_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close to create the HTML tag
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_site_wrapper_close' ) ) {
	function slimline_site_wrapper_close() {

		$site_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .site -->' );

		$site_wrapper_close = slimline_apply_filters( 'slimline_site_wrapper_close', $site_wrapper_close );

		echo $site_wrapper;
	}
}
