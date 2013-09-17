<?php
/**
 * Conditional Tags
 *
 * These tags are meant 1) to expand on the default WordPress conditional tags, and
 * 2) simplify native PHP conditional structures.
 *
 * @package Slimline
 * @subpackage Includes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_and conditional
 *
 * Reduces the need for long strings of &&-type conditional checks by evaluating an
 * array of conditional functions.
 *
 * @param array $function_names An array of function names to evaluate.
 * @return bool Returns TRUE if all functions in $function_names evaluate to true, FALSE if not.
 * @uses slimline_conditional_safe To check if each function exists before evaluating
 * @since 0.0.0
 */
function slimline_and( $function_names ) {

	foreach ( $function_names as $function_name )
		if ( ! slimline_conditional_safe( $function_name() ) )
			return false;

	return true;
}

/**
 * slimline_conditional_safe conditional
 *
 * Evaluates a given conditional function after checking if it exists. Allows developers
 * to check conditional functions from plugins, themes or specific versions of WordPress
 * without knowing ahead of time if that function exists on a specific install.
 *
 * @param string $function_name The specific function to evaluate
 * @return bool Returns TRUE if the function exists and evaluates to true, FALSE if not.
 * @since 0.0.0
 */
function slimline_conditional_safe( $function_name ) {

	if ( function_exists( $function_name ) )
		return $function_name();

	return false;
}

/**
 * slimline_is_blog conditional
 *
 * Checks to see if we are on a blog page; either the blog home or an archive. Can
 * also include single posts if the check_single_posts parameter is true. Developers
 * can modify the returned boolean using the slimline_is_blog filter.
 *
 * @param bool $check_single_posts Whether or not to count single posts as a blog page. Default is false.
 * @return bool Whether or not the user is viewing a blog page.
 * @since 0.0.0
 */
function slimline_is_blog( $check_single_posts = false ) {

	return apply_filters( 'slimline_is_blog', ( 'post' == get_post_type() && ( is_home() || is_archive || ( $check_single_posts && is_single() ) ) ), $check_single_posts );
}

/**
 * slimline_or conditional
 *
 * Reduces the need for long strings of ||-type conditional checks by evaluating an
 * array of conditional functions.
 *
 * @param array $function_names An array of function names to evaluate.
 * @return bool Returns TRUE if any functions in $function_names evaluate to true, FALSE if not.
 * @uses slimline_conditional_safe To check if each function exists before evaluating
 * @since 0.0.0
 */
function slimline_or( $function_names ) {

	foreach ( $function_names as $function_name )
		if ( slimline_conditional_safe( $function_name() ) )
			return true;

	return false;
}

/**
 * slimline_show_content conditional
 *
 * This conditional determines whether or not post content is meant to be displayed
 * on the current post. By default it returns true on single posts and on the first
 * page of the blog home. Developers can modify the returned boolean using the 
 * slimline_show_content filter.
 *
 * @global obj $Slimline The Slimline theme object.
 * @return bool Whether or not to show the content
 * @since 0.0.0
 */
function slimline_show_content() {
	global $Slimline;

	/**
	 * Set the show_content $Slimline property. This allows us to use the boolean on archive
	 * or index pages without checking each individual post.
	 */
	if ( ! isset( $slimline->show_content ) )
		$slimline->show_content = apply_filters( 'slimline_show_content', ( is_single() || ( is_home() && ! is_paged() ) ) );

	return $Slimline->show_content;
}

/**
 * slimline_show_excerpt conditional
 *
 * This conditional determines whether or not a post excerpt is meant to be shown
 * on the current post. By default it returns true on archive pages or on single posts
 * where a custom excerpt is present. Developers can modify the returned boolean
 * using the slimline_show_excerpt filter.
 *
 * @global obj $Slimline The Slimline theme object.
 * @return bool Whether or not to show the excerpt
 * @since 0.0.0
 */
function slimline_show_excerpt() {
	global $Slimline;

	/**
	 * Set the show_excerpt $Slimline property. This allows us to use the boolean on archive
	 * or index pages without checking each individual post.
	 */
	if ( ! isset( $slimline->show_excerpt ) )
		$slimline->show_excerpt = apply_filters( 'slimline_show_excerpt', ( is_archive() || is_paged() || ( is_single() && has_excerpt() ) ) );

	return $Slimline->show_excerpt;
}