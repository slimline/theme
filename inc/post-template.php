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
 * Unset "class" attribute
 *
 * Per WordPress Theme Development guidelines, class attributes for body, posts and
 * comments should be set using the `body_class()`, `post_class()` and
 * `comment_class()` functions respectively.
 *
 * @param  array $attributes Array of default attributes passed from
 *                           `slimline_get_attributes`
 * @return array $attributes Attributes array with "class" removed
 * @link   https://codex.wordpress.org/Theme_Development#Theme_Classes
 * @since  0.2.0
 */
function slimline_attributes_unset_class( $attributes = array() ) {

	/**
	 * Unset "class" attribute
	 *
	 * @link http://php.net/manual/en/function.unset.php Documentation for `unset()`
	 */
	unset( $attributes[ 'class' ] );

	/**
	 * Return attributes array
	 */
	return $attributes;
}

/**
 * Unset "lang" attribute
 *
 * Per WordPress Theme Development guidelines,  "lang" attribute should be set
 * using the `language_attributes()` function.
 *
 * @param  array $attributes Array of default attributes passed from
 *                           `slimline_get_attributes`
 * @return array $attributes Attributes array with "lang" removed
 * @link http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 *       The opening <html> tag should include `language_attributes()`.
 * @since  0.2.0
 */
function slimline_attributes_unset_lang( $attributes = array() ) {

	/**
	 * Unset "lang" attribute
	 *
	 * @link http://php.net/manual/en/function.unset.php Documentation for `unset()`
	 */
	unset( $attributes[ 'lang' ] );

	/**
	 * Return attributes array
	 */
	return $attributes;
}

/**
 * Filter and output text content
 *
 * Functions similar to `the_content`, but takes arbirtrary text. Also avoids the
 * problem of applying third-party filters hooked to `the_content` (ex: JetPack
 * sharing buttons) to text that should not have them.
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_content()
 * @since 0.2.0
 */
function slimline_content( $text ) {

	/**
	 * Return text content
	 *
	 * We are applying the `slimline_content` filter before returning to auto-add
	 * line breaks and paragraphs, texturize punctuation and evaluate shortcodes.
	 *
	 * @param string $text The filtered description
	 * @link  https://github.com/slimline/theme/wiki/slimline_content
	 */
	echo apply_filters( 'slimline_content', $text );
}

/**
 * Output ellipses and a link to the post
 *
 * NOTE: this function MUST be used within the loop.
 *
 * @since 0.2.0
 */
function slimline_excerpt_more() {

	return sprintf(
			'&hellip; <a href="%1$s" title="%2$s">%3$s &rarr;</a>',
			get_permalink(),
			the_title_attribute( slimline_the_title_attribute_args() ),
			__( 'Read more', 'slimline' )
		);
}

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
function slimline_get_404_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404', array( 'not-found' ) ), // class="not-found 404"
		'id'    => '404',                                             // id="404"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404_attributes` filters will
	 * be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404', $defaults );
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
	$description = slimline_context_get_description();

	/**
	 * Filter the description
	 *
	 * @param string $description The default generated description
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_description
	 */
	return apply_filters( 'slimline_404_description', $description );
}

/**
 * Generate HTML attributes for 404 description <div> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404-description_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_description_attributes()
 * @since  0.1.0
 */
function slimline_get_404_description_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-description', array( 'description main-description' ) ), // class="description main-description 404-description"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-description_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-description', $defaults );
}

/**
 * Generate HTML attributes for 404 entries <section> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404-entries_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_entries_attributes()
 * @since  0.1.0
 */
function slimline_get_404_entries_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-entries', array( 'entries' ) ), // class="entries 404-entries"
		'id'    => 'entries',                                               // id="entries"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-entries_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-entries', $defaults );
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
 * `slimline_404-entries-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_entries_title_attributes()
 * @since  0.1.0
 */
function slimline_get_404_entries_title_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-entries-title', array( 'title', 'subtitle', 'entries-title' ) ), // class="title subtitle entries-title 404-entries-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and
	 * `slimline_404-entries-title_attributes` filters will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-entries-title', $defaults );
}

/**
 * Generate HTML attributes for 404 search <section> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404-search_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_search_attributes()
 * @since  0.1.0
 */
function slimline_get_404_search_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-search', array( 'search' ) ), // class="search 404-search"
		'id'    => 'search',                                              // id="search"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-search_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-search', $defaults );
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
 * `slimline_404-search-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_search_title_attributes()
 * @since  0.1.0
 */
function slimline_get_404_search_title_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-search-title', array( 'title', 'subtitle', 'search-title' ) ), // class="title subtitle search-title 404-search-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-search-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-search-title', $defaults );
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
	$title = slimline_context_get_title();

	/**
	 * Filter and return the title
	 *
	 * @param string $title The default generated title
	 * @link  https://github.com/slimline/theme/wiki/slimline_404_title
	 */
	return apply_filters( 'slimline_404_title', $title );
}

/**
 * Generate HTML attributes for 404 title <h2> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_404-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_404_title_attributes()
 * @since  0.1.0
 */
function slimline_get_404_title_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( '404-title', array( 'title main-title' ) ), // class="title main-title 404-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_404-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, '404-title', $defaults );
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
 * @param  array        $defaults          (Optional). Associative array of
 *                                         attribute / value pairs.
 * @return string       $return_attributes The generated string of attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_attributes()
 * @since  0.1.0
 */
function slimline_get_attributes( $attributes = '', $element = '', $defaults = array() ) {

	/**
	 * Convert query string style arguments to array
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Description of `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes );

	/**
	 * Allow general filtering of attributes before we modify the array
	 *
	 * @param array  $attributes Default array of attribute / value pairs
	 * @param string $element    The element to generate attributes for
	 * @link  https://github.com/slimline/theme/wiki/slimline_attributes_pre
	 */
	$attributes = apply_filters( 'slimline_attributes_pre', $attributes, $element );

	/**
	 * Element-specific filtering of default attributes
	 *
	 * @param array $attributes Default array of attribute / value pairs
	 * @link  https://github.com/slimline/theme/wiki/slimline_$element_attributes_pre
	 */
	$attributes = apply_filters( "slimline_{$element}_attributes_pre", $attributes );

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
function slimline_get_body_attributes( $attributes = '' ) {

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
 * Generate HTML attributes for the breadcrumb <nav> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_breadcrumb_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_breadcrumb_attributes()
 * @since  0.2.0
 */
function slimline_get_breadcrumb_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'breadcrumb' ), // class="breadcrumb"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_breadcrumb_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'breadcrumb', $defaults );
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
function slimline_get_comment_attributes( $attributes = '' ) {

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
function slimline_get_comments_attributes( $attributes = '' ) {

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

/**
 * Generate HTML attributes for entries <section> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_entries_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_entries_attributes()
 * @since  0.1.0
 */
function slimline_get_entries_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'entries' ), // class="entries"
		'id'    => 'entries',                       // id="entries"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_entries_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'entries', $defaults );
}

/**
 * Generate default title for entries list on pages
 *
 * @return string $title Descriptive title
 * @link   https://github.com/slimline/theme/wiki/slimline_get_entries_title()
 * @since  0.2.0
 */
function slimline_get_entries_title() {

	/**
	 * Default descriptive title
	 */
	$title = __( 'Recent entries:', 'slimline' );

	/**
	 * Filter and return the title
	 *
	 * @param string $title The default generated title
	 * @link  https://github.com/slimline/theme/wiki/slimline_title
	 */
	return apply_filters( 'slimline_entries_title', $title );
}

/**
 * Generate HTML attributes for entries title <h2> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_entries-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_entries_title_attributes()
 * @since  0.1.0
 */
function slimline_get_entries_title_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'entries-title', array( 'title', 'subtitle', 'entries-title' ) ), // class="title subtitle entries-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and
	 * `slimline_entries-title_attributes` filters will be applied by
	 * `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'entries-title', $defaults );
}

/**
 * Generate HTML attributes for entry <article> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_entry_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_entry_attributes()
 * @since  0.1.0
 */
function slimline_get_entry_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_post_type/
	 *       Documentation of `get_post_type` function
	 * @link https://developer.wordpress.org/reference/functions/get_the_ID/
	 *       Documentation of `get_the_ID` function
	 */
	$defaults = array(
		'id'    => get_post_type() . '-' . get_the_ID(), // id="{WP_Post::post_type}-{WP_Post::ID}"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_entry_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'entry', $defaults );
}

/**
 * Generate HTML attributes for the entry content wrapper <div> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_entry-content_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_entry_content_attributes()
 * @since  0.2.0
 */
function slimline_get_entry_content_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'entry-content', array( 'content' ) ), // class="content entry-content"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_entry-content_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'entry-content', $defaults );
}

/**
 * Generate HTML attributes for the entry summary wrapper <div> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_entry-description_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_entry_description_attributes()
 * @since  0.2.0
 */
function slimline_get_entry_description_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'entry-description', array( 'description' ) ), // class="description entry-description"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_entry-description_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'entry-description', $defaults );
}

/**
 * Generate HTML attributes for the entry heading tag (<h1> or <h3>).
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_entry-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_entry_title_attributes()
 * @since  0.1.0
 */
function slimline_get_entry_title_attributes( $attributes = '' ) {

	/**
	 * Set up HTML classes in an array
	 */
	$classes = array(
		'title',
	);

	/**
	 * Set as main-title if a singular post
	 */
	if ( is_singular() ) {
		$classes[] = 'main-title';
	} // if ( is_singular() )

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'entry-title', $classes ), // class="title (main-title) entry-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_entry-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'entry-title', $defaults );
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
 * @since  0.2.0
 */
function slimline_get_html_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'html', array( 'no-js' ) ), // class="no-js html"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_html_attributes` filters
	 * will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'html', $defaults );
}

/**
 * Generate HTML attributes for index <article> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_index_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_index_attributes()
 * @since  0.1.0
 */
function slimline_get_index_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'index' ), // class="index"
		'id'    => 'index',                       // id="index"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_index_attributes` filters will
	 * be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'index', $defaults );
}

/**
 * Generate default descriptive text for index pages
 *
 * @return string $description Descriptive text
 * @link   https://github.com/slimline/theme/wiki/slimline_get_index_description()
 * @since  0.2.0
 */
function slimline_get_index_description() {

	/**
	 * Default descriptive text
	 *
	 * @see Slimline_Context()
	 */
	$description = slimline_get_context_description();

	/**
	 * Filter the description
	 *
	 * @param string $description The default generated description
	 * @link  https://github.com/slimline/theme/wiki/slimline_index_description
	 */
	return apply_filters( 'slimline_index_description', $description );
}

/**
 * Generate HTML attributes for index description <div> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_index-description_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_index_description_attributes()
 * @since  0.1.0
 */
function slimline_get_index_description_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'index-description', array( 'description main-description' ) ), // class="description main-description index-description"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_index-description_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'index-description', $defaults );
}

/**
 * Generate default title for index pages
 *
 * @return string $title Descriptive title
 * @link   https://github.com/slimline/theme/wiki/slimline_get_index_title()
 * @since  0.2.0
 */
function slimline_get_index_title() {

	/**
	 * Default descriptive title
	 *
	 * @see Slimline_Context()
	 */
	$title = slimline_get_context_title();

	/**
	 * Filter and return the title
	 *
	 * @param string $title The default generated title
	 * @link  https://github.com/slimline/theme/wiki/slimline_index_title
	 */
	return apply_filters( 'slimline_index_title', $title );
}

/**
 * Generate HTML attributes for index title <h2> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_index-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_index_title_attributes()
 * @since  0.1.0
 */
function slimline_get_index_title_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'index-title', array( 'title main-title' ) ), // class="title main-title index-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_index-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'index-title', $defaults );
}

/**
 * Return logo HTML markup
 *
 * Returns the logo <img> wrapped in an <a> tag if a logo is set.
 *
 * @return string $logo HTML markup if logo set, empty string if not
 * @link   https://github.com/slimline/theme/wiki/slimline_get_the_logo()
 * @since  0.2.0
 */
function slimline_get_logo() {

	/**
	 * Filter the default logo output
	 *
	 * If the filtered output isn't empty, it will be used instead of generating the
	 * the normal logo HTML.
	 *
	 * @param string $logo The logo ouput. Default is empty.
	 * @link  https://github.com/slimline/theme/wiki/slimline_logo_pre
	 */
	$logo = apply_filters( 'slimline_logo_pre', '' );

	/**
	 * If logo is empty, generate the HTML
	 */
	if ( '' === $logo ) {

		/**
		 * Check for JetPack Site Logo
		 *
		 * We are buffering the logo function so we can return it as a string
		 *
		 * @link http://jetpack.me/support/site-logo/ Description of Site Logo
		 */
		if ( slimline_use_as_logo( 'jetpack-site-logo' ) && jetpack_has_site_logo() ) {

			ob_start();

			jetpack_the_site_logo();

			$logo = ob_get_clean();

		/**
		 * Check for any other site logos
		 *
		 * @see slimline_get_logo_id()
		 */
		} else if ( ( $logo_id = slimline_get_logo_id() ) ) { // if ( slimline_use_as_logo( 'jetpack-site-logo' ) && jetpack_has_site_logo() )

			$logo = sprintf(
				'<a class="site-logo-link" href="%1$s" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					'slimline-logo',
					false,
					array(
						'class'     => 'site-logo attachment-slimline-logo',
						'data-size' => 'slimline-logo',
						'itemprop'  => 'logo',
					)
				)
			);

		} // if ( slimline_use_as_logo( 'jetpack-site-logo' ) && jetpack_has_site_logo() )

	} // if ( '' === $logo )

	/**
	 * Filter the returned string
	 *
	 * @param string $logo Logo HTML or empty string
	 * @link  https://github.com/slimline/theme/wiki/slimline_logo
	 */
	return apply_filters( 'slimline_logo', $logo );
}

/**
 * Retrieve image information for site logo
 *
 * Effectively a wrapper for `wp_get_attachment_image_src` that first retrieves the
 * site logo ID (if one is set).
 *
 * @param  string|array $size     (Optional) Registered image size to retrieve the
 *                                source for or a flat array of height and width
 *                                dimensions. Default size is 'slimline-logo'.
 * @return array        $logo_src Returns an array (url, width, height), or false, if
 *                                no image is available.
 * @link  https://github.com/slimline/theme/wiki/slimline_get_logo_src()
 * @since 0.2.0
 */
function slimline_get_logo_src( $size = 'slimline-logo' ) {

	/**
	 * Set up FALSE if no image info retrieved
	 */
	$logo_src = false;

	/**
	 * Retrieve image ID
	 *
	 * @see slimline_get_logo_id()
	 */
	$logo_id = slimline_get_logo_id();

	/**
	 * If we have a logo, retrieve logo image src
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
	 *       Description of `wp_get_attachment_image_src` function
	 */
	if ( $logo_id ) {
		$logo_src = wp_get_attachment_image_src( $logo_id, $size );
	} // if ( $logo_id )

	/**
	 * Filter the result
	 *
	 * @param array        $logo_src  URL, width and height of image
	 * @param string|array $logo_size Registered image size or flat array of image
	 *                                dimensions
	 * @param int          $logo_id   ID for the attachment image
	 * @link  https://github.com/slimline/theme/wiki/slimline_get_logo_src
	 */
	return apply_filters( 'slimline_logo_src', $logo_src, $logo_size, $logo_id );
}

/**
 * Generate HTML attributes for not main <main> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_main_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_main_attributes()
 * @since  0.1.0
 */
function slimline_get_main_attributes( $attributes = '' ) {

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_main_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'main', $defaults );
}

/**
 * Generate HTML attributes for not found <article> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_not-found_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_not_found_attributes()
 * @since  0.1.0
 */
function slimline_get_not_found_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'not-found', array( 'not-found' ) ), // class="not-found not-found"
		'id'    => 'not-found',                                             // id="not-found"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_not_found_attributes` filters will
	 * be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'not-found', $defaults );
}

/**
 * Generate default descriptive text for not found pages
 *
 * @return string $description Descriptive text
 * @link   https://github.com/slimline/theme/wiki/slimline_get_not_found_description()
 * @since  0.2.0
 */
function slimline_get_not_found_description() {

	/**
	 * Default descriptive text
	 */
	$description = __( "Sorry, there don't seem to be any entries to match that query.", 'slimline' );

	/**
	 * Filter the description
	 *
	 * @param string $description The default generated description
	 * @link  https://github.com/slimline/theme/wiki/slimline_not_found_description
	 */
	return apply_filters( 'slimline_not_found_description', $description );
}

/**
 * Generate HTML attributes for not found description <div> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_not-found-description_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_not_found_description_attributes()
 * @since  0.1.0
 */
function slimline_get_not_found_description_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'not-found-description', array( 'description main-description' ) ), // class="description main-description not-found-description"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_not-found-description_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'not-found-description', $defaults );
}

/**
 * Generate default title for not found pages
 *
 * @return string $title Descriptive title
 * @link   https://github.com/slimline/theme/wiki/slimline_get_not_found_title()
 * @since  0.2.0
 */
function slimline_get_not_found_title() {

	/**
	 * Default descriptive title
	 */
	$title = __( 'No entries found', 'slimline' );

	/**
	 * Filter and return the title
	 *
	 * @param string $title The default generated title
	 * @link  https://github.com/slimline/theme/wiki/slimline_not_found_title
	 */
	return apply_filters( 'slimline_not_found_title', $title );
}

/**
 * Generate HTML attributes for not found title <h2> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_not-found-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_not_found_title_attributes()
 * @since  0.1.0
 */
function slimline_get_not_found_title_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'not-found-title', array( 'title main-title' ) ), // class="title main-title not-found-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_not-found-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'not-found-title', $defaults );
}

/**
 * Generate HTML attributes for footer widget area <aside> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_sidebar-footer_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_sidebar_footer_attributes()
 * @since  0.1.0
 */
function slimline_get_sidebar_footer_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'sidebar-footer', array( 'sidebar' ) ), // class="sidebar sidebar-footer"
		'id'    => 'sidebar-footer',                                           // id="sidebar-footer"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_sidebar-footer_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'sidebar-footer', $defaults );
}

/**
 * Generate HTML attributes for primary widget area <aside> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_sidebar-primary_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_sidebar_primary_attributes()
 * @since  0.1.0
 */
function slimline_get_sidebar_primary_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'sidebar-primary', array( 'sidebar' ) ), // class="sidebar sidebar-primary"
		'id'    => 'sidebar-primary',                                           // id="sidebar-primary"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_sidebar-primary_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'sidebar-primary', $defaults );
}

/**
 * Generate HTML attributes for site footer <footer> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_site-footer_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_site_footer_attributes()
 * @since  0.1.0
 */
function slimline_get_site_footer_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'site-footer', array( 'footer' ) ), // class="footer site-footer"
		'id'    => 'site-footer',                                          // id="site-footer"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_site-footer_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'site-footer', $defaults );
}

/**
 * Generate HTML attributes for site header <header> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_site-header_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_site_header_attributes()
 * @since  0.1.0
 */
function slimline_get_site_header_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'site-header', array( 'header' ) ), // class="header site-header"
		'id'    => 'site-header',                                          // id="site-header"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_site-header_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'site-header', $defaults );
}
/**
 * Generate HTML attributes for site link title <a> tag
 *
 * Essentially a wrapper function for `slimline_get_attributes()` that includes
 * default attributes. Developers can modify the returned string using the
 * `slimline_site-link-title_attributes` filter.
 *
 * @param  array|string $attributes (Optional). An array or query string of
 *                                  attribute / value pairs.
 * @return string       $attributes The generated string of attributes
 * @uses   slimline_get_attributes() to generate the attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_site_link_title_attributes()
 * @since  0.1.0
 */
function slimline_get_site_link_title_attributes( $attributes = '' ) {

	/**
	 * Default attributes
	 */
	$defaults = array(
		'class' => slimline_get_class( 'site-link-title' ), // class="site-link-title"
	);

	/**
	 * Return attributes string
	 *
	 * Note that the `slimline_attributes` and `slimline_site-link-title_attributes`
	 * filters will be applied by `slimline_get_attributes()`.
	 *
	 * @see slimline_get_attributes()
	 */
	return slimline_get_attributes( $attributes, 'site-link-title', $defaults );
}

/**
 * Generate breadcrumb links
 *
 * NOTE: only works if Yoast SEO is installed and active AND either 1) the theme
 * declares yoast breadcrumb support (i.e.,
 * `add_theme_support( 'yoast-seo-breadcrumbs' )` or 2) the breadcrumb links option
 * is checked in the Yoast SEO settings.
 *
 * @link  http://kb.yoast.com/article/245-implement-wordpress-seo-breadcrumbs
 *        Description of how to activate breadcrumbs
 * @link  https://github.com/slimline/theme/wiki/slimline_get_yoast_breadcrumb()
 * @since 0.2.0
 */
function slimline_yoast_breadcrumb() {

	$breadcrumb = '';

	/**
	 * Make sure breadcrumb function is available.
	 *
	 * This makes sure that theme and plugin developers won't break anything if they
	 * decide to drop the `slimline_yoast_breadcrumb` function directly into a
	 * template without proper conditional checking.
	 */
	if ( function_exists( 'yoast_breadcrumb' ) ) {

		$before = '<nav ' . slimline_get_breadcrumb_attributes() . '>';

		$after = '</nav><!-- .breadcrumb -->';

		/**
		 * Create the breadcrumbs
		 *
		 * @param string $before  What to show before the breadcrumb.
		 * @param string $after   What to show after the breadcrumb.
		 * @param bool   $display FALSE to return the breadcrumb string
		 */
		$breadcrumb = yoast_breadcrumb( $before, $after, false );

	} // if ( function_exists( 'yoast_breadcrumb' ) )

	/**
	 * Return breadcrumb string
	 *
	 * @link  https://github.com/slimline/theme/wiki/slimline_yoast_breadcrumb
	 */
	return apply_filters( 'slimline_yoast_breadcrumb', $breadcrumb );
}