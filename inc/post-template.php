<?php
/**
 * Post Template Functions
 *
 * Functions for outputting content into a template.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Generate HTML attributes for 404 <article> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_attributes()
 * @since  0.1.0
 */
function slimline_get_404_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404', array( 'not-found', 'error-404' ) ), // class="404 not-found error-404"
		'id'    => '404',                                                          // id="404"
	);

	/**
	 * Schema.org attributes
	 *
	 * Sets the container as an item of type "CreativeWork"
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemscope and itemtype
	 * @link http://schema.org/CreativeWork Documentation of "CreativeWork" type
	 * @see  slimline_use_schema_org()
	 */
	if ( slimline_use_schema_org() ) {

		$defaults[ 'itemscope' ] = 'itemscope';

		$defaults[ 'itemtype' ] = 'http://schema.org/CreativeWork';

	} // if ( slimline_use_schema_org() )

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *      Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Filter attributes
	 *
	 * @param array $attributes Default generated attributes
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_attributes
	 */
	$attributes = apply_filters( 'slimline_404_attributes', $attributes );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` filter will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes );
}

/**
 * Generate default descriptive text for 404 pages
 *
 * @return string $description Descriptive text
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_description()
 * @since  0.2.0
 */
function slimline_get_404_description() {

	/**
	 * Default descriptive text
	 */
	$description = __( "Sorry, there doesn't seem to be a page here. Maybe we can help you find what you are looking for using one of the methods below.", 'slimline' );

	/**
	 * Filter the description
	 *
	 * @param string $description The default generated description
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_description
	 */
	$description = apply_filters( 'slimline_404_description', $description );

	/**
	 * Return text content
	 *
	 * We are applying the `slimline_content` filter before returning to auto-add
	 * line breaks and paragraphs, texturize punctuation and evaluate shortcodes.
	 *
	 * @param string $description The filtered description
	 * @link  https://github.com/slimline/theme/wiki/slimline_content
	 */
	return apply_filters( 'slimline_content', $description );
}

/**
 * Generate HTML attributes for 404 description <div> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404_description_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_description_attributes()
 * @since  0.1.0
 */
function slimline_get_404_description_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-description', array( 'main-description description' ) ), // class="404-description main-description description"
	);

	/**
	 * Schema.org attributes
	 *
	 * Sets the container as a "description" for the 404 page
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link http://schema.org/description Description of "description" property
	 * @see  slimline_use_schema_org()
	 */
	if ( slimline_use_schema_org() ) {

		$defaults[ 'itemprop' ] = 'description';

	} // if ( slimline_use_schema_org() )

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *      Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Filter attributes
	 *
	 * @param array $attributes Default generated attributes
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_description_attributes
	 */
	$attributes = apply_filters( 'slimline_404_description_attributes', $attributes );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` filter will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes );
}

/**
 * Generate HTML attributes for 404 entries <section> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404_entries_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_entries_attributes()
 * @since  0.1.0
 */
function slimline_get_404_entries_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-entries', array( 'entries' ) ), // class="404-entries entries"
		'id'    => 'entries',                                               // id="entries"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *      Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Filter attributes
	 *
	 * @param array $attributes Default generated attributes
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_entries_attributes
	 */
	$attributes = apply_filters( 'slimline_404_entries_attributes', $attributes );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` filter will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes );
}

/**
 * Generate default title for entries list on 404 pages
 *
 * @return string $title Descriptive title
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_entries_title()
 * @since  0.2.0
 */
function slimline_get_404_entries_title() {

	/**
	 * Default descriptive title
	 */
	$title = __( 'Try one of these recent entries:', 'slimline' );

	/**
	 * Filter and return the title
	 *
	 * @param string $title The default generated title
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_title
	 */
	return apply_filters( 'slimline_404_entries_title', $title );
}

/**
 * Generate HTML attributes for 404 entries title <h2> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404_entries_title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_entries_title_attributes()
 * @since  0.1.0
 */
function slimline_get_404_entries_title_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-entries-title', array( 'entries-title' ) ), // class="404-entries-title entries-title"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *      Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Filter attributes
	 *
	 * @param array $attributes Default generated attributes
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_entries_title_attributes
	 */
	$attributes = apply_filters( 'slimline_404_entries_title_attributes', $attributes );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` filter will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes );
}

/**
 * Generate HTML attributes for 404 search <section> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404_search_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_search_attributes()
 * @since  0.1.0
 */
function slimline_get_404_search_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-search', array( 'search' ) ), // class="404-search search"
		'id'    => 'search',                                              // id="search"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *      Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Filter attributes
	 *
	 * @param array $attributes Default generated attributes
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_search_attributes
	 */
	$attributes = apply_filters( 'slimline_404_search_attributes', $attributes );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` filter will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes );
}

/**
 * Generate default title for search form on 404 pages
 *
 * @return string $title Descriptive title
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_search_title()
 * @since  0.2.0
 */
function slimline_get_404_search_title() {

	/**
	 * Default descriptive title
	 */
	$title = __( "Still don't see what you're looking for? Try searching the site:", 'slimline' );

	/**
	 * Filter and return the title
	 *
	 * @param string $title The default generated title
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_search_title
	 */
	return apply_filters( 'slimline_404_search_title', $title );
}

/**
 * Generate HTML attributes for 404 search area title <h2> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404_search_title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_search_title_attributes()
 * @since  0.1.0
 */
function slimline_get_404_search_title_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-search-title', array( 'search-title' ) ), // class="404-search-title search-title"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *      Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Filter attributes
	 *
	 * @param array $attributes Default generated attributes
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_search_title_attributes
	 */
	$attributes = apply_filters( 'slimline_404_search_title_attributes', $attributes );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` filter will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes );
}

/**
 * Generate default title for  form on 404 pages
 *
 * @return string $title Descriptive title
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_title()
 * @since  0.2.0
 */
function slimline_get_404_title() {

	/**
	 * Default descriptive title
	 */
	$title = _( "Oops! Sorry, we can't find that page", 'slimline' );

	/**
	 * Filter and return the title
	 *
	 * @param string $title The default generated title
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_title
	 */
	return apply_filters( 'slimline_404_title', $title );
}

/**
 * Generate HTML attributes for 404  area title <h2> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404_title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_title_attributes()
 * @since  0.1.0
 */
function slimline_get_404_title_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-title', array( 'main-title' ) ), // class="404-title main-title"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *      Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Filter attributes
	 *
	 * @param array $attributes Default generated attributes
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_title_attributes
	 */
	$attributes = apply_filters( 'slimline_404_title_attributes', $attributes );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` filter will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes );
}

