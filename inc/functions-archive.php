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

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )

function slimline_get_home_title() {

	return single_post_title( '', false );
}

function slimline_get_category_title() {

	return single_cat_title( '', false );
}

function slimline_get_tag_title() {

	return single_tag_title( '', false );
}

function slimline_get_taxonomy_title() {

	if ( is_tax( 'post_format' ) ) {

		if ( $default ) {
			return $default;
		} else {
			return get_post_format_string( 'post-format-' get_queried_object()->slug );
		}

	} // if ( is_tax( 'post_format' ) )

	return single_term_title( '', false );
}

function slimline_get_author_title() {

	return get_the_author_meta( 'display_name', get_query_var( 'author' ) );
}

function slimline_get_date_title() {

	if ( is_year() ) {

		$format = 'Y';
		$date_string = get_query_var( 'year' );
		$period = 'year';

	} elseif ( is_month() ) {

		$format = 'M Y';
		$date_string = trim( ', ', single_month_title( ', ', false ) );
		$period = 'month';

	} elseif ( is_day() ) {

		$format = get_option( 'date_format', 'M j, Y' );
		$date_string = get_the_date();
		$period = 'day';

	} elseif ( is_date() ) {

		$format = get_option( 'date_format', 'M j, Y' );
		$date_string = get_the_date();
		$period = 'date';

	} else {
		return '';
	}

	$format = apply_filters( "slimline_{$period}_title_format", $format );

	$date = date( $format, strtotime( $date_string ) );

	return apply_filters( "slimline_{$period}_title", sprintf( esc_html__( 'Archives for %1$s', 'slimline' ), $date ), $date );
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

			$slimline_archive_type = 'post_type_archive';

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

			$slimline_archive_type = 'taxonomy';

		/**
		 * Generic archives (future-proofing)
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_archive/
		 *       Documentation of the `is_archive` function
		 */
		} elseif ( is_archive() ) { // if ( is_author() )

			$slimline_archive_type = 'archive';

		} else { // if ( is_author() )

			$slimline_archive_type = '';

		} // if ( is_author() )

	} // if ( is_null( $slimline_archive_type ) )

	return $slimline_archive_type;
}



/**
 * Retrieve archive information
 *
 * This function forms the basis of our archive-specific template tags to output
 * information such as titles and descriptions.
 *
 * @param  string $key     The information to retrieve, e.g., 'title', 'description'
 * @param  string $default Default data value for the key
 * @return string $data    Info for the current archive
 * @since  0.3.0
 */
function slimline_get_archive_data( $key, $default = '' ) {

	$archive_type = slimline_get_archive_type();

	$function_name = "slimline_get_{$archive_type}_{$key}";

	if ( function_exists( $function_name ) ) {

		return $function_name( $default );

	} // if ( function_exists( $function_name ) )

	return $default;
}