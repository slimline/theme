<?php
/**
 * Template Loading Functions
 *
 * Adjusts the WordPress template hierarchy.
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

add_filter( 'author_template_hierarchy',   'slimline_blog_archive_template', 1, 1 );
add_filter( 'category_template_hierarchy', 'slimline_blog_archive_template', 1, 1 );
add_filter( 'date_template_hierarchy',     'slimline_blog_archive_template', 1, 1 );
add_filter( 'tag_template_hierarchy',      'slimline_blog_archive_template', 1, 1 );
add_filter( 'taxonomy_template_hierarchy', 'slimline_blog_archive_template', 1, 1 );

add_filter( 'home_template_hierarchy', 'slimline_blog_home_template', 1, 1 );

function slimline_blog_archive_template( $templates ) {

	if ( ! is_tax() || is_tax( 'post_format' ) ) {

		$offset = array_search( $templates, 'archive.php' );

		$templates = array_slice( $templates, 0, $offset - 1 ) + [ 'blog.php' ] + array_slice( $templates, $offset );

	} // if ( ! is_tax() || is_tax( 'post_format' ) )

	return $templates;
}

function slimline_blog_home_template( $templates ) {

	$offset = array_search( $templates, 'home.php' );

	$templates = array_slice( $templates, 0, $offset ) + [ 'blog.php' ] + array_slice( $templates, $offset + 1 );

	return $templates;
}