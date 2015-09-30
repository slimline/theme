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
 * Outputs attributes for the 404 <article> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_404_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_404_attributes()
 * @since 0.1.0
 */
function slimline_404_attributes( $attributes = '' ) {

	echo slimline_get_404_attributes( $attributes );
}

/**
 * Ouput a description for 404 error pages
 *
 * Meant to function similar to `the_content` or `the_excerpt`, but used for 404
 * page headers.
 *
 * @uses  slimline_get_404_description() to generate the description
 * @link  https://github.com/slimline/theme/wiki/slimline_404_description()
 * @since 0.2.0
 */
function slimline_404_description() {

	echo slimline_get_404_description();
}

/**
 * Outputs attributes for the 404 description <div> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_404_description_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_404_description_attributes()
 * @since 0.1.0
 */
function slimline_404_description_attributes( $attributes = '' ) {

	echo slimline_get_404_description_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the entries wrapper tag on 404 pages
 * (<section>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_404_entries_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_404_entries_attributes()
 * @since 0.1.0
 */
function slimline_404_entries_attributes( $attributes = '' ) {

	echo slimline_get_404_entries_attributes( $attributes );
}

/**
 * Ouput a title for the entries list on 404 error pages
 *
 * Meant to function similar to `the_title`, but used to label the entries list on
 * 404 pages.
 *
 * @param string $before (Optional). Content to prepend to the title. Default empty.
 * @param string $after  (Optional). Content to append to the title. Default empty.
 * @param bool   $echo   (Optional). Whether to output the title. Default TRUE.
 * @uses  slimline_get_404_entries_title() to generate the title
 * @link  https://github.com/slimline/theme/wiki/slimline_404_entries_title()
 * @since 0.2.0
 */
function slimline_404_entries_title( $before = '', $after = '', $echo = true ) {

	echo slimline_get_404_entries_title( $before, $after, $echo );
}

/**
 * Outputs HTML attributes meant for the entries heading tag on 404 pages (<h2>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_404_entries_title_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_404_entries_title_attributes()
 * @since 0.1.0
 */
function slimline_404_entries_title_attributes( $attributes = '' ) {

	echo slimline_get_404_entries_title_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the search form wrapper tag on 404 pages
 * (<section>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_404_search_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_404_search_attributes()
 * @since 0.1.0
 */
function slimline_404_search_attributes( $attributes = '' ) {

	echo slimline_get_404_search_attributes( $attributes );
}

/**
 * Ouput a title for the search area on 404 error pages
 *
 * Meant to function similar to `the_title`, but used to label the search area
 *
 * @param string $before (Optional). Content to prepend to the title. Default empty.
 * @param string $after  (Optional). Content to append to the title. Default empty.
 * @param bool   $echo   (Optional). Whether to output the title. Default TRUE.
 * @uses  slimline_get_404_search_title() to generate the title
 * @link  https://github.com/slimline/theme/wiki/slimline_404_search_title()
 * @since 0.2.0
 */
function slimline_404_search_title( $before = '', $after = '', $echo = true ) {

	echo slimline_get_404_title( $before, $after, $echo );
}

/**
 * Outputs HTML attributes meant for the search heading tag on 404 pages (<h2>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_404_search_title_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_404_search_title_attributes()
 * @since 0.1.0
 */
function slimline_404_search_title_attributes( $attributes = '' ) {

	echo slimline_get_404_search_title_attributes( $attributes );
}

/**
 * Ouput a title for 404 error pages
 *
 * Meant to function similar to `the_title`, but used for 404 pages.
 *
 * @param string $before (Optional). Content to prepend to the title. Default empty.
 * @param string $after  (Optional). Content to append to the title. Default empty.
 * @param bool   $echo   (Optional). Whether to output the title. Default TRUE.
 * @uses  slimline_get_404_title() to generate the title
 * @link  https://github.com/slimline/theme/wiki/slimline_404_title()
 * @since 0.2.0
 */
function slimline_404_title( $before = '', $after = '', $echo = true ) {

	echo slimline_get_404_title( $before, $after, $echo );
}

/**
 * Outputs attributes for the 404 title <h1> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_404_title_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_404_title_attributes()
 * @since 0.1.0
 */
function slimline_404_title_attributes( $attributes = '' ) {

	echo slimline_get_404_title_attributes( $attributes );
}

/**
 * Outputs HTML attributes in alphabetical order.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_attributes()
 * @since 0.1.0
 */
function slimline_attributes( $attributes = '' ) {

	echo slimline_get_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the <body> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_body_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_body_attributes()
 * @since 0.1.0
 */
function slimline_body_attributes( $attributes = '' ) {

	echo slimline_get_body_attributes( $attributes );
}

/**
 * Gives miscellaneous objects a filterable class.
 *
 * This is meant to work similarly to the `body_class` and/or `post_class` functions,
 * but for miscellaneous or arbitrary elements.
 *
 * @param  string       $element The element identifier. Also serves as the intial
 *                               class (e.g., passing 'site-header' will identify the
 *                               element as the site header for the purposes of
 *                               filters and/or actions and will also create
 *                               class="site-header").
 * @param  array|string $classes (Optional). An array or space-separated string of
 *                               additional classes to apply to the element.
 * @uses   slimline_get_class() to generate the class string
 * @link  https://github.com/slimline/theme/wiki/slimline_class()
 * @since  0.1.0
 */
function slimline_class( $element = '', $classes = '' ) {

	echo slimline_get_class( $element, $classes );
}

/**
 * Outputs HTML attributes meant for the comment wrapper tag (<article>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_comment_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_comment_attributes()
 * @since 0.1.0
 */
function slimline_comment_attributes( $attributes = '' ) {

	echo slimline_get_comment_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the comments wrapper tag (<section>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_comments_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_comments_attributes()
 * @since 0.2.0
 */
function slimline_comments_attributes( $attributes = '' ) {

	echo slimline_get_comments_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the recent entries wrapper tag (<section>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_entries_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_entries_attributes()
 * @since 0.2.0
 */
function slimline_entries_attributes( $attributes = '' ) {

	echo slimline_get_entries_attributes( $attributes );
}

/**
 * Ouput a title for the entries list on index pages
 *
 * Meant to function similar to `the_title`, but used to label the entries list on
 * index pages.
 *
 * @param string $before (Optional). Content to prepend to the title. Default empty.
 * @param string $after  (Optional). Content to append to the title. Default empty.
 * @param bool   $echo   (Optional). Whether to output the title. Default TRUE.
 * @uses  slimline_get_entries_title() to generate the title
 * @link  https://github.com/slimline/theme/wiki/slimline_entries_title()
 * @since 0.2.0
 */
function slimline_entries_title( $before = '', $after = '', $echo = true ) {

	echo slimline_get_entries_title( $before, $after, $echo );
}

/**
 * Outputs attributes for the entries list title <h2> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_entries_title_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_entries_title_attributes()
 * @since 0.1.0
 */
function slimline_entries_title_attributes( $attributes = '' ) {

	echo slimline_get_entries_title_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the entry wrapper tag (<article>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_entry_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_entry_attributes()
 * @since 0.2.0
 */
function slimline_entry_attributes( $attributes = '' ) {

	echo slimline_get_entry_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the entry content wrapper tag (<div>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_entry_content_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_entry_content_attributes()
 * @since 0.2.0
 */
function slimline_entry_content_attributes( $attributes = '' ) {

	echo slimline_get_entry_content_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the entry description wrapper tag (<div>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_entry_description_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_entry_description_attributes()
 * @since 0.2.0
 */
function slimline_entry_description_attributes( $attributes = '' ) {

	echo slimline_get_entry_description_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the entry heading tag (<h1> or <h3>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_entry_title_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_entry_title_attributes()
 * @since 0.2.0
 */
function slimline_entry_title_attributes( $attributes = '' ) {

	echo slimline_get_entry_title_attributes( $attributes );
}

/**
 * Outputs attributes for the html wrapper <html> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_html_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_html_attributes()
 * @since 0.2.0
 */
function slimline_html_attributes( $attributes = '' ) {

	echo slimline_get_html_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the index wrapper tag (<article>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_index_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_index_attributes()
 * @since 0.1.0
 */
function slimline_index_attributes( $attributes = '' ) {

	echo slimline_get_index_attributes( $attributes );
}

/**
 * Ouput a description for index pages
 *
 * Meant to function similar to `the_content` or `the_excerpt`, but used for index
 * page headers.
 *
 * @uses  slimline_get_index_description() to generate the description
 * @link  https://github.com/slimline/theme/wiki/slimline_index_description()
 * @since 0.2.0
 */
function slimline_index_description() {

	echo slimline_get_index_description();
}

/**
 * Outputs attributes for the index description <div> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses slimline_get_index_description_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_index_description_attributes()
 * @since 0.1.0
 */
function slimline_index_description_attributes( $attributes = '' ) {

	echo slimline_get_index_description_attributes( $attributes );
}

/**
 * Ouput a title for index pages
 *
 * Meant to function similar to `the_title`, but used for index pages.
 *
 * @param string $before (Optional). Content to prepend to the title. Default empty.
 * @param string $after  (Optional). Content to append to the title. Default empty.
 * @param bool   $echo   (Optional). Whether to output the title. Default TRUE.
 * @uses  slimline_get_index_title() to generate the title
 * @link  https://github.com/slimline/theme/wiki/slimline_index_title()
 * @since 0.2.0
 */
function slimline_index_title( $before = '', $after = '', $echo = true ) {

	echo slimline_get_index_title( $before, $after, $echo );
}

/**
 * Outputs attributes for the index title <h1> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses slimline_get_index_title_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_index_title_attributes()
 * @since 0.1.0
 */
function slimline_index_title_attributes( $attributes = '' ) {

	echo slimline_get_index_title_attributes( $attributes );
}

/**
 * Outputs HTML attributes meant for the main content tag (<main>).
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_main_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_main_attributes()
 * @since 0.1.0
 */
function slimline_main_attributes( $attributes = '' ) {

	echo slimline_get_main_attributes( $attributes );
}

/**
 * Ouput a description for not found pages
 *
 * Meant to function similar to `the_content` or `the_excerpt`, but used for not
 * found page headers.
 *
 * @uses  slimline_get_not_found_description() to generate the description
 * @link  https://github.com/slimline/theme/wiki/slimline_not_found_description()
 * @since 0.2.0
 */
function slimline_not_found_description() {

	echo slimline_get_not_found_description();
}

/**
 * Outputs attributes for the not found description <div> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses slimline_get_not_found_description_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_not_found_description_attributes()
 * @since 0.1.0
 */
function slimline_not_found_description_attributes( $attributes = '' ) {

	echo slimline_get_not_found_description_attributes( $attributes );
}

/**
 * Ouput a title for not found pages
 *
 * Meant to function similar to `the_title`, but used for not found pages.
 *
 * @param string $before (Optional). Content to prepend to the title. Default empty.
 * @param string $after  (Optional). Content to append to the title. Default empty.
 * @param bool   $echo   (Optional). Whether to output the title. Default TRUE.
 * @uses  slimline_get_not_found_title() to generate the title
 * @link  https://github.com/slimline/theme/wiki/slimline_not_found_title()
 * @since 0.2.0
 */
function slimline_not_found_title( $before = '', $after = '', $echo = true ) {

	echo slimline_get_not_found_title( $before, $after, $echo );
}

/**
 * slimline_not_found_title_attributes tag
 *
 * Outputs attributes for the not found title <h1> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_not_found_title_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_not_found_title_attributes()
 * @since 0.1.0
 */
function slimline_not_found_title_attributes( $attributes = '' ) {

	echo slimline_get_not_found_title_attributes( $attributes );
}

/**
 * Outputs HTML attibutes meant for the footer widget area <aside> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_sidebar_footer_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_sidebar_footer_attributes()
 * @since 0.2.0
 */
function slimline_sidebar_footer_attributes( $attributes = '' ) {

	echo slimline_get_sidebar_footer_attributes( $attributes );
}

/**
 * Outputs HTML attibutes meant for the primary widget area <aside> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_sidebar_primary_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_sidebar_primary_attributes()
 * @since 0.2.0
 */
function slimline_sidebar_primary_attributes( $attributes = '' ) {

	echo slimline_get_sidebar_primary_attributes( $attributes );
}

/**
 * Outputs HTML attibutes meant for the website <header> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_site_header_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_site_header_attributes()
 * @since 0.1.0
 */
function slimline_site_header_attributes( $attributes = '' ) {

	echo slimline_get_site_header_attributes( $attributes );
}

/**
 * Outputs HTML attibutes meant for the website <footer> tag.
 *
 * @param array|string $attributes (Optional). An array or query string of
 *                                 attribute / value pairs.
 * @uses  slimline_get_site_footer_attributes() to generate attributes
 * @link  https://github.com/slimline/theme/wiki/slimline_site_footer_attributes()
 * @since 0.1.0
 */
function slimline_site_footer_attributes( $attributes = '' ) {

	echo slimline_get_site_footer_attributes( $attributes );
}