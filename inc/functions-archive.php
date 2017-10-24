<?php
/**
 * Archive Template Functions
 *
 * Functions for outputting content into archive templates.
 *
 * @package    Slimline\Theme
 * @subpackage Includes
 * @since      0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Retrieve archive information
 *
 * This function forms the basis of our archive-specific template tags to output
 * information such as titles and descriptions.
 *
 * @param  string $key  The information to retrieve, e.g., 'title', 'description'
 * @return string $data Info for the current archive
 * @since  0.3.0
 */
function slimline_get_archive_data( $key = 'title' ) {

	/**
	 * If this is the blog home and a page for posts has been set
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_home/
	 *       Documentation of the `is_home` function
	 * @link https://developer.wordpress.org/reference/functions/is_front_page/
	 *       Documentation of the `is_front_page` function
	 */
	if ( is_home() && ! is_front_page() ) {
		$context = 'home';

	/**
	 * If this is a search results page
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_search/
	 *       Documentation of the `is_search` function
	 */
	} elseif ( is_search() ) { // if ( is_home() && ! is_front_page() )
		$context = 'search';

	/**
	 * If this is a term archive
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_category/
	 *       Documentation of the `is_category` function
	 * @link https://developer.wordpress.org/reference/functions/is_tag/
	 *       Documentation of the `is_tag` function
	 * @link https://developer.wordpress.org/reference/functions/is_tax/
	 *       Documentation of the `is_tax` function
	 */
	} elseif ( is_category() || is_tag() || is_tax() ) { // if ( is_home() && ! is_front_page() )
		$context = 'term';

	/**
	 * If this is an author archive
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_author/
	 *       Documentation of the `is_author` function
	 */
	} elseif ( is_author() ) { // if ( is_home() && ! is_front_page() )
		$context = 'author';

	/**
	 * If this is a date archive
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_date/
	 *       Documentation of the `is_date` function
	 */
	} elseif( is_date() ) { // if ( is_home() && ! is_front_page() )

		/**
		 * If this is a date archive for a specific year
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_year/
		 *       Documentation of the `is_year` function
		 */
		if ( is_year() ) {
			$context = 'year';

		/**
		 * If this is a date archive for a specific month
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_month/
		 *       Documentation of the `is_month` function
		 */
		} elseif( is_month() ) { // if ( is_year() )
			$context = 'month';

		/**
		 * If this is a date archive for a specific day
		 *
		 * Note that this is also serves as the fallback in case additional date
		 * archive types are added in the future.
		 */
		} else { // if ( is_year() )
			$context = 'day';
		} // if ( is_year() )

	/**
	 * If this is a post type archive
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_post_type_archive/
	 *       Documentation of the `is_post_type_archive` function
	 */
	} elseif ( is_post_type_archive() ) { // if ( is_home() && ! is_front_page() )
		$context = 'post_type';

	/**
	 * Generic archive in case we missed any
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_archive/
	 *       Documentation of the `is_archive` function
	 */
	} elseif ( is_archive() ) { // if ( is_home() && ! is_front_page() )
		$context = 'generic_archive';

	/**
	 * If nothing else matches, use site data
	 */
	} else { // if ( is_home() && ! is_front_page() )
		$context = 'site';
	} // if ( is_home() && ! is_front_page() )

	/**
	 * Get name of data function
	 */
	$function = "slimline_get_{$context}_{$key}";

	/**
	 * Retrieve data if possible
	 */
	$data = ( function_exists( $function ) ? $function() : '' );

	/**
	 * Filter and return data
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_content_key
	 */
	return apply_filters( "slimline_{$context}_{$key}", $data );
}

function slimline_get_home_title() {

	return get_post_field( 'post_title', get_queried_object(), 'raw' );
}

/**
 * Retrieve a term name to use as a title
 *
 * Essentially this does the same thing as the `single_term_title` function, but can
 * be used for any term, not just the currently queried term.
 *
 * NOTE: you MUST pass a term id or object to this function if using it anywhere
 * other than a term archive page.
 *
 * @param  int|WP_Term $term     Term ID or object. NULL to retrieve the current term
 *                               on a term archive page.
 * @param  string      $taxonomy Taxonomy name. Used for retrieving the term if a term
 *                               ID is passed as the first parameter
 * @return string                Term name
 * @since  0.3.0
 */
function slimline_get_term_title( $term = null, $taxonomy = '' ) {

	/**
	 * Get term object
	 *
	 * @link http://php.net/manual/en/function.is-null.php
	 *       Documentation of the PHP `is_null` function
	 * @link https://developer.wordpress.org/reference/functions/get_queried_object/
	 *       Documentation of the `get_queried_object` function
	 * @link https://developer.wordpress.org/reference/functions/get_term/
	 *       Documentation of the `get_term` function
	 */
	$term = ( is_null( $term ) ? get_queried_object() : get_term( $term, $taxonomy ) );

	/**
	 * Set filter based on taxonomy name
	 */
	switch ( $term->taxonomy ) {

		case 'category' :
			$filter = 'single_cat_title';
			break;

		case 'post_tag' :
			$filter = 'single_tag_title';
			break;

		default :
			$filter = 'single_term_title';
			break;

	} // switch ( $term->taxonomy )

	/**
	 * Filter and return term name
	 */
	return apply_filters( $filter, $term->name );
}

function slimline_get_author_title( $author = null ) {

	if ( is_null( $author ) ) {
		$author = get_query_var( 'author' );
	} // if ( is_null( $author ) )

	return get_the_author_meta( 'display_name', absint( $author ) );
}

function slimline_archive_title() {

	echo slimline_get_archive_title();
}

function slimline_get_archive_title() {

	return slimline_get_title( slimline_get_archive_data( 'title' ) );
}

function slimline_generic_archive_title() {

	echo slimline_get_generic_archive_title();
}

function slimline_get_generic_archive_title() {

	return __( 'Archives', 'slimline' );
}

function slimline_get_year_title() {

	return slimline_get_date_title( 'year' );
}

function slimline_get_month_title() {

	return slimline_get_date_title( 'month' );
}

function slimline_get_day_title() {

	return slimline_get_date_title( 'day' );
}

function slimline_get_date_title( $period = '' ) {

	switch ( $period ) {

		case 'year' :
			$date_string = get_query_var( 'year' );
			break;

		case 'month' :
			$date_string = trim( ', ', single_month_title( ', ', false ) );
			break;

		case 'day' :
		default    :
			$format = get_option( 'date_format', 'M j, Y' );
			break;

	} // switch ( $period )

	$format = apply_filters( "slimline_{$period}_title_format", esc_html_x( $format, 'date format', 'slimline' ) );

	return apply_filters( "slimline_{$period}_title", sprintf( esc_html__( 'Archives for %1$s', 'slimline' ), get_the_date( $format ) ), get_the_date( $format ) );
}

function slimline_get_archive_title( $title = '' ) {

	if ( is_home() ) {

	} elseif( is_search() ) {
		$title = sprintf( esc_attr_x( 'Search Results for "%1$s"', 'archive title', 'slimline' ), get_search_query( true ) );
	}

	return $title;
}

function slimline_get_archive_type() {

	global $slimline_archive_type;

	if ( is_null( $slimline_archive_type ) ) {

		/**
		 * Author posts archive
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_author/
		 *       Documentation of the `is_author` function
		 */
		if ( is_author() ) {

			$slimline_archive_type = 'author';

		/**
		 * Post Category archive
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_category/
		 *       Documentation of the `is_category` function
		 */
		} elseif ( is_category() ) { // if ( is_author() )

			$slimline_archive_type = 'category';

		/**
		 * Date-based archives
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_date/
		 *       Documentation of the `is_date` function
		 */
		} elseif ( is_date() ) { // if ( is_author() )

			$slimline_archive_type = 'date';

		/**
		 * Blog posts index page
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_home/
		 *       Documentation of the `is_home` function
		 */
		} elseif ( is_home() ) { // if ( is_author() )

			$slimline_archive_type = 'home';

		/**
		 * Custom Post Type archive
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_post_type_archive/
		 *       Documentation of the `is_post_type_archive` function
		 */
		} elseif ( is_post_type_archive() ) { // if ( is_author() )

			$slimline_archive_type = get_query_var( 'post_type' );

		/**
		 * Post Tag archive
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_tag/
		 *       Documentation of the `is_tag` function
		 */
		} elseif ( is_tag() ) { // if ( is_author() )

			$slimline_archive_type = 'tag';

		/**
		 * Custom Taxonomy archive
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_tax/
		 *       Documentation of the `is_tax` function
		 */
		} elseif( is_tax() ) { // if ( is_author() )

			$slimline_archive_type = get_queried_object()->taxonomy;

		/**
		 * All other indexes/archives (future-proofing)
		 */
		} else { // if ( is_author() )

			$slimline_archive_type = 'archive';

		} // if ( is_author() )

	} // if ( is_null( $slimline_archive_type ) )

	return $slimline_archive_type;
}

function slimline_get_archive_data( $key, $default_content = '' ) {

	$archive_type = slimline_get_archive_type();

	$function_name = "slimline_get_{$archive_type}_{$key}";

	if ( function_exists( $function_name ) ) {

		return $function_name( $default_content );

	} // if ( function_exists( $function_name ) )

	return $default_content;
}