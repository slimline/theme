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
		'class' => slimline_get_class( '404', array( 'not-found' ) ), // class="not-found 404"
		'id'    => '404',                                             // id="404"
	);

	/**
	 * Schema.org attributes
	 *
	 * Sets the container as an item of type "CreativeWork" and describes it as the
	 * "mainEntity" of the page.
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemscope and itemtype
	 * @link http://schema.org/mainEntity Documentation of "mainEntity" property
	 * @link http://schema.org/CreativeWork Documentation of "CreativeWork" type
	 * @see  slimline_use_schema_org()
	 */
	if ( slimline_use_schema_org() ) {

		$defaults[ 'itemprop' ] = 'mainEntity';

		$defaults[ 'itemscope' ] = 'itemscope';

		$defaults[ 'itemtype' ] = 'http://schema.org/CreativeWork';

	} // if ( slimline_use_schema_org() )

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404_attributes` filters will
	 * be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404' );
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
		'class' => slimline_get_class( '404-description', array( 'description main-description' ) ), // class="description main-description 404-description"
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
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-description_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-description' );
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
		'class' => slimline_get_class( '404-entries', array( 'entries' ) ), // class="entries 404-entries"
		'id'    => 'entries',                                               // id="entries"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-entries_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-entries' );
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
		'class' => slimline_get_class( '404-entries-title', array( 'title', 'subtitle', 'entries-title' ) ), // class="title subtitle entries-title 404-entries-title"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and
	 * `slimline_404-entries-title_attributes` filters will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-entries-title' );
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
		'class' => slimline_get_class( '404-search', array( 'search' ) ), // class="search 404-search"
		'id'    => 'search',                                              // id="search"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-search_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-search' );
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
		'class' => slimline_get_class( '404-search-title', array( 'title', 'subtitle', 'search-title' ) ), // class="title subtitle search-title 404-search-title"
	);

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-search-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-search-title' );
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
		'class' => slimline_get_class( '404-title', array( 'title main-title' ) ), // class="title main-title 404-title"
	);

	/**
	 * Schema.org attributes
	 *
	 * Define the title as the "headline" of the page.
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link http://schema.org/headline Documentation of "headline" property
	 * @see  slimline_use_schema_org()
	 */
	if ( slimline_use_schema_org() ) {

		$defaults[ 'itemprop' ] = 'headline';

	} // if ( slimline_use_schema_org() )

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-title' );
}

/**
 * Generates a string of HTML attributes with values from an array.
 *
 * Developers can modify the returned string using the `slimline_attributes` filter.
 *
 * NOTE: following WordPress HTML coding standards, all attributes MUST have a value.
 * For boolean attributes this value should be the attribute name; e.g.,
 * itemscope="itemscope", disabled="disabled", etc. Attributes passed to this
 * function without a value are removed from final output.
 *
 * @param  array|string $attributes        (Optional). An array or query string of
 *                                         attribute / value pairs.
 * @param  string       $element           (Optional). The element to generate
 *                                         attributes for (e.g., "404", "body", etc.)
 * @return string       $return_attributes The generated string of attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_attributes()
 * @since  0.1.0
 */
function slimline_get_attributes( $attributes = '', $element = '' ) {

	/**
	 * Convert query string style arguments to array
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes );

	/**
	 * Allow filtering of attributes before we modify the array
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_attributes_pre
	 */
	$attributes = apply_filters( 'slimline_attributes_pre', $attributes, $element );

	/**
	 * Create temporary array of sanitized key/value pairs
	 *
	 * @see slimline_sanitize_attribute_array()
	 */
	$parse_attributes = slimline_sanitize_attribute_array( $attributes );

	/**
	 * Remove empties
	 *
	 * @link http://php.net/manual/en/function.array-filter.php
	 *       Documentation of `array_filter` function
	 */
	$parse_attributes = array_filter( $attributes );

	/**
	 * Create array of return values
	 */
	foreach ( $parse_attributes as $attribute => $value ) {

		$return_attributes[] = "{$attribute}='{$value}'";

	} // foreach ( $attributes as $attribute => $value )

	/**
	 * Turn array into a string for filtering and return
	 */
	$return_attributes = join( ' ', $return_attributes );

	/**
	 * Generic filtering
	 *
	 * @param string $return_attributes The generated attributes string
	 * @param array  $parse_attributes  Filtered and sanitized attributes array
	 * @param array  $attributes        The original array passed to the function
	 * @param string $element           The element or context for filtering
	 * @link https://github.com/slimline/theme/wiki/slimline_attributes
	 */
	$return_attributes = apply_filters( 'slimline_attributes', $return_attributes, $parse_attributes, $attributes, $element );

	/**
	 * Element- / context-specific filtering
	 *
	 * @param string $return_attributes The generated attributes string
	 * @param array  $parse_attributes  Filtered and sanitized attributes array
	 * @param array  $attributes        The original array passed to the function
	 * @link https://github.com/slimline/theme/wiki/slimline_$element_attributes
	 */
	$return_attributes = apply_filters( "slimline_{$element}_attributes", $return_attributes, $parse_attributes, $attributes );

	/**
	 * Return attributes string
	 */
	return $return_attributes;
}

/**
 * Generate HTML attributes for the document <body> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_body_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_body_attributes()
 * @since  0.1.0
 */
function slimline_get_body_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array();

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Unset "class" attribute
	 *
	 * Per WordPress Theme Development guidelines, body class should be set using the
	 * `body_class()` function.
	 *
	 * @link https://codex.wordpress.org/Theme_Development#Theme_Classes
	 *       Use `body_class()` to set classes on <body>
	 */
	unset( $attributes[ 'class' ] );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_body_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'body' );
}

/**
 * Generate a filterable class for miscellaneous elements
 *
 * Meant to work like `body_class()`, `post_class()` and/or `comment_class()` but for
 * miscellaneous or arbitrary elements. Developers can modify the returned classes
 * using the `slimline_class` and `slimline_{element}_class` filters.
 *
 * NOTE: Unlike `body_class()`, `post_class()` or `comment_class()`, this function
 * returns the actual "class=" string ready to be echoed rather than the array of
 * classes.
 *
 * @param  string       $element The element identifier. Also serves as an additional
 *                               class (e.g., passing 'site-header' will identify the
 *                               element as the site header for the purposes of
 *                               filters and/or actions and will also create
 *                               class="site-header").
 * @param  array|string $classes (Optional). An array or space-separated string of
 *                               additional classes to apply to the element.
 * @return string       $classes HTML class attribute
 * @since  0.1.0
 */
function slimline_get_class( $element, $classes = '' ) {

	/**
	 * Convert space-separated string into an array
	 */
	if ( is_string( $classes ) ) {
		$classes = explode( ' ', $classes );
	}

	/**
	 * Sanitize element name
	 *
	 * Element names must be alphanumerics, dashes and/or underscores only since they
	 * will be used as part of a filter name and a CSS class later.
	 *
	 * @link https://developer.wordpress.org/reference/functions/sanitize_key/
	 *       Description of the `sanitize_key` function
	 */
	$element = sanitize_key( $element );

	/**
	 * Generic filtering
	 *
	 * @param array  $classes Array of initial classes
	 * @param string $element The element identifier
	 * @link  https://github.com/slimline/theme/wiki/slimline_class
	 */
	$classes = apply_filters( 'slimline_class', $classes, $element );

	/**
	 * Per-element filtering
	 *
	 * @param array $classes Array of initial classes
	 * @link  https://github.com/slimline/theme/wiki/slimline_$element_class
	 */
	$classes = apply_filters( "slimline_{$element}_class", $classes );

	/**
	 * Sanitize class names
	 *
	 * Class names must be suitable for including in single or double quotes.
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_attr/
	 *       Description of the `esc_attr` function
	 */
	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Remove empties
	 *
	 * Just in case sanitizing left any array elements empty, let's remove them.
	 *
	 * @link http://php.net/manual/en/function.array-filter.php
	 *       Documentation of `array_filter` function
	 */
	$classes = array_filter( $classes );

	/**
	 * Add element name as last class in array.
	 *
	 * This makes sure there is at least one class in the attribute declaration
	 */
	$classes[] = $element;

	/**
	 * Create "class=" string
	 */
	$classes = 'class="' . join( ' ', $classes ) . '"';

	/**
	 * Return string
	 */
	return $classes;
}

/**
 * Generate HTML attributes for the document <html> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_html_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_html_attributes()
 * @since  0.1.0
 */
function slimline_get_html_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'html', array( 'no-js' ) ), // class="no-js html"
	);

	/**
	 * Schema.org attributes
	 *
	 * Sets the <html> document as an item of type "WebPage"
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemscope and itemtype
	 * @link http://schema.org/WebPage Documentation of "WebPage" type
	 * @see  slimline_use_schema_org()
	 */
	if ( slimline_use_schema_org() ) {

		$defaults[ 'itemscope' ] = 'itemscope';

		$defaults[ 'itemtype' ] = 'http://schema.org/WebPage';

	} // if ( slimline_use_schema_org() )

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Unset "lang" attribute
	 *
	 * Per WordPress Theme Development guidelines,  "lang" attribute should be set
	 * using the `language_attributes()` function.
	 *
	 * @link http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
	 *       The opening <html> tag should include `language_attributes()`.
	 */
	unset( $attributes[ 'lang' ] );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_html_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'html' );
}

/**
 * Generate HTML attributes for the comment wrapper <article> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_comment_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_comment_attributes()
 * @since  0.1.0
 */
function slimline_get_comment_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array();

	/**
	 * Schema.org attributes
	 *
	 * Sets the container as an item of type "Comment" and property "comment"
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemscope and itemtype
	 * @link http://schema.org/Comment Documentation of "Comment" type
	 * @see  slimline_use_schema_org()
	 */
	if ( slimline_use_schema_org() ) {

		$defaults[ 'itemprop' ] = 'comment';

		$defaults[ 'itemscope' ] = 'itemscope';

		$defaults[ 'itemtype' ] = 'http://schema.org/Comment';

	} // if ( slimline_use_schema_org() )

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Unset "class" attribute
	 *
	 * Per WordPress Theme Development guidelines, comment class should be set using
	 * the `comment_class()` function.
	 *
	 * @link https://codex.wordpress.org/Theme_Development#Theme_Classes
	 *       Use `comment_class()` to set classes on comment
	 */
	unset( $attributes[ 'class' ] );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_comment_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'comment' );
}

/**
 * Generate HTML attributes for the comments wrapper <section> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_comments_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_comments_attributes()
 * @since  0.1.0
 */
function slimline_get_comments_attributes( $attributes ) {

	/**
	 * Default attributes
	 */
	$defaults = array();

	/**
	 * Convert query strings to array and merge with defaults
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_comments_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'comments' );
}
