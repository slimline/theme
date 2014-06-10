<?php
/**
 * Third-Party (Vendor) Support Functions
 *
 * Extra functions, actions and filters for third-party plugins.
 *
 * @package Slimline
 * @subpackage Includes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_infinite_scroll_render function
 *
 * Replaces default JetPack Infinite Scroll rendering function with standard 
 * Slimline WordPress loop
 *
 * @since 0.1.0
 * @uses slimline_get_template_part() To load the template parts | inc/general-template.php
 */
if ( ! function_exists( 'slimline_infinite_scroll_render' ) ) {
	function slimline_infinite_scroll_render() {

		while ( have_posts() ) : the_post();

			/**
			 * Load the specific template for the post format if one exists. Otherwise
			 * defaults to a more generic template. We are using slimline_get_template_part()
			 * instead of get_template_part() to expand the range of possible template matches.
			 * 
			 * Template hierarchy for content files is:
			 * content-{post_type}-{post_format}.php
			 * content-{post_type}.php
			 * content-{post_format}.php
			 * content.php
			 *
			 * @uses slimline_get_template_part() | inc/general-template.php
			 */
			slimline_get_template_part( 'content', get_post_type(), get_post_format() );

		endwhile; // have_posts()
	}
} // if ( ! function_exists( 'slimline_infinite_scroll_render' ) )

/**
 * slimline_yoast_breadcrumbs function
 *
 * Adds WordPress SEO breadcrumbs to the page if the plugin is installed and the
 * breadcrumbs option is active.
 *
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_yoast_breadcrumbs' ) ) {
	function slimline_yoast_breadcrumbs() {

		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p class="breadcrumbs">', '</p>' );
		} // if ( function_exists( 'yoast_breadcrumb' ) )
	}
} // if ( ! function_exists( 'slimline_yoast_breadcrumbs' ) )