<?php
/**
 * Script Loading Functions
 *
 * Functions and filters for loading scripts and styles.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Get a CSS file URI
 *
 * Gets the URI of a given CSS file by first checking for the minified version and
 * then the non-minified version
 *
 * @param  string $filename The name of the file to look for
 * @return string $located  The file URI if found
 * @uses   slimline_get_file_uri()
 * @since  0.2.0
 */
function slimline_get_css_file_uri( $filename ) {

	return slimline_get_file_uri( slimline_stylesheet_directory_uri() . $filename );
}

/**
 * Get a file URI
 *
 * Gets the URI of a given file by first checking for the minified version and then
 * the non-minified version
 *
 * @param  string $filename The name of the file to look for
 * @return string $located  The file URI if found
 * @uses   slimline_maybe_minify_filename()
 * @uses   slimline_locate_file_uri()
 * @since  0.2.0
 */
function slimline_get_file_uri( $filename ) {

	$minified_filename = slimline_maybe_minify_filename( $filename );

	$filenames = array(
		$minified_filename,
		$filename,
	);

	$filenames = array_unique( $filenames );

	$located = slimline_locate_file_uri( $filenames );

	return $located;
}

/**
 * Get a js file URI
 *
 * Gets the URI of a given JS file by first checking for the minified version and
 * then the non-minified version
 *
 * @param  string $filename The name of the file to look for
 * @return string $located  The file URI if found
 * @uses   slimline_get_file_uri()
 * @since  0.2.0
 */
function slimline_get_js_file_uri( $filename ) {

	return slimline_get_file_uri( slimline_javascript_directory_uri() . $filename );
}

/**
 * Retrieves the URI of the highest priority file that exists
 *
 * This is similar to `locate_template` except 1) it returns a URI instead of a file
 * path, and 2) it completely checks the child theme directory first before checking
 * the parent theme. This allows child theme developers to override scripts with any
 * variation of the script (e.g., scripts.min.js and scripts.js will both override
 * scripts.min.js in the template directory).
 *
 * @param  array $filenames Array of file names to check in order of priority
 * @return string $located  Absolute URI of the located file, or empty string if no
 *                          file found
 * @link   https://github.com/slimline/theme/wiki/slimline_locate_file_uri()
 * @since  0.2.0
 */
function slimline_locate_file_uri( $filenames ) {

	$located = '';

	/**
	 * Remove empty array values
	 */
	$filenames = array_filter( (array) $filenames );

	/**
	 * First check the current theme directory
	 */
	foreach ( $filenames as $filename ) {

		if ( file_exists( trailingslashit( STYLESHEETPATH ) . $filename ) ) {
			$located = trailingslashit( get_stylesheet_directory_uri() ) . $filename;
			break;
		} // if ( file_exists( trailingslashit( STYLESHEETPATH ) . $filename ) )

	} // foreach ( $filenames as $filename )

	/**
	 * Next check the parent theme directory
	 */
	if ( ! $located ) {

		foreach ( $filenames as $filename ) {

			if ( trailingslashit( file_exists( TEMPLATEPATH ) . $filename ) ) {
				$located = trailingslashit( get_template_directory_uri() ) . $filename;
				break;
			} // if ( trailingslashit( file_exists( TEMPLATEPATH ) . $filename ) )

		} // foreach ( $filenames as $filename )

	} // if ( ! $located )

	return $located;
}

/**
 * Conditionally return minified filename
 *
 * Returns a minified version of a given filename (e.g., "styles.css" becomes
 * "styles.min.css") IF the SCRIPT_DEBUG constant is NOT defined OR is FALSE
 *
 * @param  string $filename Name of the file to minify
 * @return string $filename Unchanged filename if SCRIPT_DEBUG is set to TRUE,
 *                          otherwise minified version of filename
 * @since  0.2.0
 */
function slimline_maybe_minify_filename( $filename ) {

	if ( ! defined( 'SCRIPT_DEBUG' ) || ! SCRIPT_DEBUG ) {

		$extension = pathinfo( $filename, PATHINFO_EXTENSION );

		$filename = str_replace( $extension, ".min.{$extension}", $filename );

	} // if ( ! defined( 'SCRIPT_DEBUG' ) || ! SCRIPT_DEBUG )

	return $filename;
}

/**
 * Conditionally return minified version of stylesheet URI
 *
 * @return string Stylesheet URI
 * @uses   slimline_get_file_uri()
 * @since  0.2.0
 */
function slimline_stylesheet_uri() {

	return slimline_get_file_uri( 'style.css' );
}