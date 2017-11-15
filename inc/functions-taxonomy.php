<?php
/**
 * Taxonomy-Specific Functions
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

/**
 * Add Schema.org section itemprop to category lists
 *
 * @param  string $thelist List of categories for the current post
 * @return string $thelist List of categories with articleSection added
 */
function slimline_category_list_schema( $thelist ) {

	return str_replace( '<a href', '<a itemprop="articleSection" href', $thelist );
}