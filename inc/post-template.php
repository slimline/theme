<?php
/**
 * Post Template Functions
 *
 * Functions for outputting content into a template.
 *
 * @package Slimline
 * @subpackage Template
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_get_ancestors_class function
 *
 * Generates a set of classes based on the post ancestors.
 *
 * @param string $stem (Optional). The stem to prepend to the ancestor class
 * @param array $classes (Optional). An array of classes to filter.
 * @since 0.1.0
 */
function slimline_get_ancestors_class( $stem = '', $classes = array() ) {

	if ( $post_ancestors = get_post_ancestors() ) {

		foreach ( $post_ancestors as $ancestor ) {
			$classes[] = "{$stem}-{$ancestor}";
		}

	} else {
		$classes[] = "{$stem}-" . get_the_ID();
	}

	return $classes;
}

/**
 * slimline_get_attributes function
 *
 * Generates an alphabetized string of HTML attributes with values from an array. Developers
 * can modify the returned string using the `slimline_attributes` filter.
 *
 * Note that following WordPress HTML coding standards, all attributes MUST have a value. For boolean
 * attributes this value should be the attribute name; e.g., itemscope="itemscope", disabled="disabled",
 * etc. Attributes passed to this function without a value are removed from final output.
 *
 * @param array|string $attributes An array or query string of attribute / value pairs.
 * @return string $return_attributes The generated string of attributes
 * @since 0.1.0
 */
function slimline_get_attributes( $attributes = '' ) {

	if ( empty( $attributes ) )
		return ''; // return empty string if no arguments passed

	$return_attributes = ''; // initialize empty string for later use

	$attributes = wp_parse_args( $attributes ); // convert query string style arguments to array
	$attributes = array_filter( $attributes ); // eliminate empties
	ksort( $attributes ); // alphabetize by attribute name

	foreach ( $attributes as $attribute => $value {
		$return_attributes .= ' ' . $attribute . '="' . esc_attr( $value ) . '"';
	}

	// filter so developers can alter these values
	return slimline_apply_filters( 'slimline_attributes', $return_attributes, $attributes );
}

/**
 * slimline_get_body_attributes function
 *
 * Generates an alphabetized string of HTML attributes for the <body> tag from an array.
 * Essentially a wrapper function for `slimline_get_attributes()` that includes default attributes.
 * Developers can modify the returned string using the `slimline_body_attributes` filter.
 *
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @return string $return_attributes The generated string of attributes
 * @uses slimline_get_attributes
 * @since 0.1.0
 */
function slimline_get_body_attributes( $attributes = '' ) {

	// convert query strings to array and merge with defaults
	$attributes = wp_parse_args(
		$attributes,
		array(
			'itemscope' => 'itemscope',
			'itemtype'  => 'http://schema.org/WebPage'
		)
	);

	unset( $attributes[ 'class' ] ); // classes should be declared using `body_class()`

	$return_attributes = slimline_get_attributes( $attributes );

	return slimline_apply_filters( 'slimline_body_attributes', $return_attributes, $attributes );
}

/**
 * slimline_get_class template tag
 *
 * Generates a filterable class for miscellaneous elements. Developers can modify the returned
 * classes using the `slimline_class` and `slimline-class-{element}` filters.
 *
 * @param string $element The element identifier. Also serves as the intial class
 * @param array|string $classes (Optional). An array or space-separated string of additional classes to apply to the element.
 * @return string HTML class attribute
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_class' ) ) {

	function slimline_get_class( $element = '', $classes = '' ) {

		if ( ! $element )
			return ''; // stop processing if no arguments passed

		if ( is_string( $classes ) )
			$classes = explode( ' ', $classes ); // get an array for easier filtering

		$classes = slimline_apply_filters( 'slimline_class', $classes, $element );

		$classes = slimline_apply_filters( "slimline_class-{$element}", $classes, $element );

		$classes = array_unshift( $element, $classes );

		return implode( ' ', $classes );
	}
}

/**
 * slimline_get_comment_attributes function
 *
 * Generates an alphabetized string of HTML attributes for the comment wrapper (<article>) tag from 
 * an array. Essentially a wrapper function for `slimline_get_attributes()` that includes default 
 * attributes. Developers can modify the returned string using the `slimline_comment_attributes` filter.
 *
 * @global object $slimline The Slimline theme object.
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @return string $return_attributes The generated string of attributes
 * @uses slimline_get_attributes
 * @since 0.1.0
 */
function slimline_get_comment_attributes( $attributes = '' ) {
	global $slimline;

	$comment_type = get_comment_type();

	/**
	 * Use $slimline default_comment_attributes property. This allows us to use the default on home or
	 * archive pages without having to run the conditional checks on each individual comment.
	 */
	if ( ! isset( $slimline->default_attributes[ 'comment' ][ $comment_type ] ) )
		$slimline->default_attributes[ 'comment' ][ $comment_type ] = array(
			'itemprop'  => 'comment',
			'itemscope' => 'itemscope',
			'itemtype'  => 'http://schema.org/UserComments'
		);

	// convert query strings to array and merge with defaults
	$attributes = wp_parse_args(
		$attributes,
		$slimline->default_comment_attributes[ 'comment' ][ $comment_type ]
	);

	unset( $attributes[ 'class' ] ); // classes should be declared using `comment_class()`

	$return_attributes = slimline_get_attributes( $attributes );

	return slimline_apply_filters( 'slimline_comment_attributes', $return_attributes, $attributes );
}
/**
 * slimline_get_post_attributes function
 *
 * Generates an alphabetized string of HTML attributes for the post wrapper (<article>) tag from 
 * an array. Essentially a wrapper function for `slimline_get_attributes()` that includes default 
 * attributes. Developers can modify the returned string using the `slimline_post_attributes` filter.
 *
 * @global object $slimline The Slimline theme object.
 * @param array|string $attributes (Optional). An array or query string of attribute / value pairs.
 * @return string $return_attributes The generated string of attributes
 * @uses slimline_get_attributes
 * @since 0.1.0
 */
function slimline_get_post_attributes( $attributes = '' ) {
	global $slimline;

	$post_type = get_post_type();

	/**
	 * Use $slimline default_post_attributes property. This allows us to use the default on home or
	 * archive pages without having to run the conditional checks on each individual post.
	 */
	if ( ! isset( $slimline->default_attributes[ 'post' ][ $post_type ] ) )
		$slimline->default_attributes[ 'post' ][ $post_type ] = array(
			'itemprop'  => ( slimline_is_blog( true ) ? 'blogPost' : '' ),
			'itemscope' => 'itemscope',
			'itemtype'  => ( slimline_is_blog( true ) ? 'http://schema.org/BlogPosting' : 'http://schema.org/CreativeWork' )
		);

	// convert query strings to array and merge with defaults
	$attributes = wp_parse_args(
		$attributes,
		$slimline->default_post_attributes[ 'post' ][ $post_type ]
	);

	unset( $attributes[ 'class' ] ); // classes should be declared using `post_class()`

	$return_attributes = slimline_get_attributes( $attributes );

	return slimline_apply_filters( 'slimline_post_attributes', $return_attributes, $attributes );
}

/**
 * slimline_get_queried_object_type function
 *
 * Returns the type for the currently queried object.
 *
 * @global object $slimline The Slimline theme object
 * @return string $type The object's type (post type if a singular post, taxonomy type if a term, etc.)
 * @since 0.1.0
 */
function slimline_get_queried_object_type() {
	global $slimline;

	if ( isset( $slimline->queried_object_type ) )
		return $slimline->queried_object_type;

	if ( is_singular() || is_post_type_archive() || is_home() ) {

		$type = get_post_type();

	} elseif ( is_category() || is_tag() || is_term() ) {

		$object = get_queried_object();

		$type = $object->taxonomy;

	} elseif ( is_author() ) {

		$type = 'author';
	} elseif ( is_date() ) {

		$type = 'date';
	} elseif ( is_archive() ) {

		$type = 'archive';
	} elseif ( is_404() ) {

		$type = '404';
	} elseif ( is_search() ) {

		$type = 'search';
	} else {

		$type = 'none';
	}

	$slimline->queried_object_type = slimline_apply_filters( 'slimline_queried_object_type', $type );

	return $slimline->queried_object_type;
}

/**
 * slimline_post_ancestors_body_class filter
 *
 * Adds ancestor-{post_type}id-{ID} class to hierarchical posts.
 *
 * @param array $classes The array of classes retrieved from get_body_class()
 * @return array $classes The filtered classes array
 * @since 0.1.0
 */
function slimline_post_ancestors_body_class( $classes ) {

	$post_type = get_post_type();

	if ( is_singular() && is_post_type_hierarchical( $post_type ) )
		$classes = slimline_get_ancestors_class( "ancestor-{$post_type}id", $classes );

	return $classes;
}

/**
 * slimline_post_ancestors_post_class filter
 *
 * Adds post-parent-{ID} and post-ancestor-{ID} classes to hierarchical posts.
 *
 * @param array $classes The array of classes retrieved from get_body_class()
 * @return array $classes The filtered classes array
 * @since 0.1.0
 */
function slimline_post_ancestors_body_class( $classes ) {

	if ( is_post_type_hierarchical( get_post_type() ) ) {

		$classes[] = 'post-parent-' . slimline_get_post_parent_id();

		$classes = slimline_get_ancestors_class( 'post-ancestor', $classes );

	}

	return $classes;
}