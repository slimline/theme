<?php
/**
 * Custom theme conditional tags
 *
 * Used to provide conditionals for displaying content or executing code.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @link       https://developer.wordpress.org/themes/basics/conditional-tags/
 *             Description of conditional tags
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Decide whether to show the excerpt in the entry header
 *
 * By default, singular posts will show their excerpt (if set) in the entry's
 * <header> as a kind of introductory paragraph. Developers can modify this behavior
 * using the `slimline_show_entry_header_excerpt` filter.
 *
 * @return bool TRUE to show the excerpt, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_show_entry_header_excerpt()
 * @since  0.2.0
 */
function slimline_show_entry_header_excerpt() {

	/**
	 * Filter the result
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_show_entry_header_excerpt
	 * @link https://developer.wordpress.org/reference/functions/is_singular/
	 *       Description of the `is_singular` function
	 * @link https://developer.wordpress.org/reference/functions/has_excerpt/
	 *       Description of the `has_excerpt` function
	 */
	return apply_filters( 'slimline_show_entry_header_excerpt', ( is_singular() && has_excerpt() ) );
}

/**
 * Decide whether to show the entry content
 *
 * By default, all singular entries will show full content while entries on index
 * pages will only show full content if they appear on the first page of the blog
 * home.
 *
 * @return bool TRUE to show the content, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_show_entry_content()
 * @since  0.2.0
 */
function slimline_show_entry_content() {

	/**
	 * Filter the result
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_show_entry_content
	 * @link https://developer.wordpress.org/reference/functions/is_singular/
	 *       Description of the `is_singular` function
	 * @link https://developer.wordpress.org/reference/functions/is_home/
	 *       Description of the `is_home` function
	 * @link https://developer.wordpress.org/reference/functions/is_paged/
	 *       Description of the `is_paged` function
	 */
	return apply_filters( 'slimline_show_entry_content', ( is_singular() || ( is_home() && ! is_paged() ) ) );
}

/**
 * Decide whether to show the entry meta
 *
 * By default, entry meta (e.g., category and author info) will only show on blog
 * posts. Developers can modify this behavior using the `slimline_show_entry_meta`
 * filter.
 *
 * @return bool TRUE to show the meta, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_show_entry_header_meta()
 * @since  0.2.0
 */
function slimline_show_entry_meta() {

	/**
	 * Filter the result
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_show_entry_meta
	 * @link https://developer.wordpress.org/reference/functions/is_single/
	 *       Description of the `is_single` function
	 */
	return apply_filters( 'slimline_show_entry_meta', is_single() );
}

/**
 * Show Schema.org markup?
 *
 * @return bool TRUE for yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_use_schema_org()
 * @since  0.2.0
 */
function slimline_use_schema_org() {

	/**
	 * Filter the result
	 *
	 * @param bool Default TRUE to use Schema.org markup
	 * @link  https://github.com/slimline/theme/wiki/slimline_use_schema_org
	 */
	return apply_filters( 'slimline_use_schema_org', true );
}