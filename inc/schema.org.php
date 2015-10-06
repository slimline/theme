<?php
/**
 * Schema.org support
 *
 * Functions for adding and working with Schema.org markup
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @see        https://schema.org/
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Add "comment" itemprop attribute
 *
 * Sets the itemprop attribute to "comment". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_comment()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_comment( $attributes = array() ) {

	/**
	 * Add "comment" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/comment Documentation of "comment" property
	 */
	$attributes[ 'itemprop' ] = 'comment';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "description" itemprop attribute
 *
 * Sets the itemprop attribute to "description". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_description()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_description( $attributes = array() ) {

	/**
	 * Add "description" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/description Documentation of "description" property
	 */
	$attributes[ 'itemprop' ] = 'description';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "headline" itemprop attribute
 *
 * Sets the itemprop attribute to "headline". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_headline()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_headline( $attributes = array() ) {

	/**
	 * Add "headline" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/headline Documentation of "headline" property
	 */
	$attributes[ 'itemprop' ] = 'headline';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "mainEntity" itemprop attribute
 *
 * Sets the itemprop attribute to "mainEntity". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_mainentity()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_mainentity( $attributes = array() ) {

	/**
	 * Add "mainEntity" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/mainEntity Documentation of "mainEntity" property
	 */
	$attributes[ 'itemprop' ] = 'mainEntity';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "text" itemprop attribute
 *
 * Sets the itemprop attribute to "text". Meant to be used with `slimline_attributes`
 * filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_text()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_text( $attributes = array() ) {

	/**
	 * Add "text" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/text Documentation of "text" property
	 */
	$attributes[ 'itemprop' ] = 'text';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add itemscope attribute
 *
 * Sets the itemscope attribute and value in an associative array. Meant to be used
 * with `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemscope added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemscope()
 * @since  0.2.0
 */
function slimline_schema_add_itemscope( $attributes = array() ) {

	/**
	 * Add itemscope
	 *
	 * Per WordPress HTML coding standards, boolean attributes like itemscope should
	 * have a value. For boolean attributes this value should be the name of the
	 * attribute.
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemscope
	 * @link https://make.wordpress.org/core/handbook/best-practices/coding-standards/html/#quotes
	 *       Description of HTML attribute coding standards
	 */
	$attributes[ 'itemscope' ] = 'itemscope';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "Blog"
 *
 * Sets the itemtype attribute to "Blog". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_blog()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_blog( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/Blog Documentation of "Blog" type
	 */
	$attributes[ 'itemtype' ] = 'https://schema.org/Blog';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "BlogPosting"
 *
 * Sets the itemtype attribute to "BlogPosting". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_blogposting()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_blogposting( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/BlogPosting Documentation of "BlogPosting" type
	 */
	$attributes[ 'itemtype' ] = 'https://schema.org/BlogPosting';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "Comment"
 *
 * Sets the itemtype attribute to "Comment". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_comment()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_comment( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/Comment Documentation of "Comment" type
	 */
	$attributes[ 'itemtype' ] = 'https://schema.org/Comment';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "CreativeWork"
 *
 * Sets the itemtype attribute to "CreativeWork". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_creativework()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_creativework( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/CreativeWork Documentation of "CreativeWork" type
	 */
	$attributes[ 'itemtype' ] = 'https://schema.org/CreativeWork';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "WebPage"
 *
 * Sets the itemtype attribute to "WebPage". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_webpage()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_webpage( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/WebPage Documentation of "WebPage" type
	 */
	$attributes[ 'itemtype' ] = 'https://schema.org/WebPage';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Remove "hentry" class
 *
 * The "hentry" class tells search engines that we are using the hAtom microformat
 * markup, which can cause confusion when we are also using Schema.org markup.
 *
 * Meant to be hooked to the `post_class` filter.
 *
 * @param  array $classes Array of post classes
 * @return array $classes Post classes with "hentry" removed
 * @since  0.2.0
 */
function slimline_schema_remove_hentry_class( $classes ) {

	/**
	 * Remove "hentry" and return
	 *
	 * @link http://php.net/manual/en/function.array-diff.php
	 *       Documentation of `array_diff` function
	 */
	return array_diff( $classes, array( 'hentry' ) );
}