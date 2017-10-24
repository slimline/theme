<?php
/**
 * Post Template Functions
 *
 * Functions for outputting content into a template.
 *
 * @package    Slimline\Theme
 * @subpackage Includes
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Generates an array of HTML attributes with values from an array.
 *
 * Developers can modify the returned string using the `slimline_attributes` and
 * `slimline_{$element}_attributes` filters.
 *
 * @param  string       $element    The element to generate attributes for
 *                                  (e.g., "header", "footer", etc.)
 * @param  array|string $attributes (Optional). An associative array or query string
 *                                  of attribute/value pairs.
 * @param  array        $defaults   (Optional). Associative array of attribute/value
 *                                  pairs.
 * @return array        $attributes The generated string of attributes
 * @link   https://github.com/slimline/theme/wiki/slimline_get_attributes()
 * @since  0.1.0
 */
function slimline_get_attributes( $element, $attributes = array(), $defaults = array() ) {

	/**
	 * Sanitize element name for use in filters and function names
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_html/
	 *       Documentation of the `esc_html` function
	 */
	$element = esc_html( $element );

	/**
	 * Merge defaults and convert query string style arguments to array
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_parse_args/
	 *       Documentation of the `wp_parse_args` function
	 */
	$attributes = wp_parse_args( $attributes, $defaults );

	/**
	 * Handling for element classes (if any set)
	 *
	 * @link http://php.net/manual/en/function.isset.php
	 *       Documentation of the PHP `isset` function
	 */
	if ( isset( $attributes['class'] ) ) {

		/**
		 * Get space-separated classes
		 *
		 * @link http://php.net/manual/en/function.implode.php
		 *       Documentation of the PHP `implode` function
		 */
		$attributes['class'] = implode( ' ', slimline_get_class( $element, (array) $attributes['class'] ) );

	} // if ( isset( $attributes['class'] ) )

	/**
	 * Generic filtering
	 *
	 * @param array  $attributes The generated attributes
	 * @param string $element    The element or context for filtering
	 * @param array  $defaults   Default attributes for the element
	 * @link  https://github.com/slimline/theme/wiki/slimline_attributes
	 */
	$attributes = apply_filters( 'slimline_attributes', $attributes, $element, $defaults );

	/**
	 * Element-/context-specific filtering
	 *
	 * @param array $attributes The generated attributes
	 * @param array $defaults   Default attributes for the element
	 * @link  https://github.com/slimline/theme/wiki/slimline_element_attributes
	 */
	return apply_filters( "slimline_{$element}_attributes", $attributes, $defaults );
}

function slimline_get_blog_description() {

	if ( is_home() && ! is_front_page() ) {

		$blog_page = get_post( get_option( 'page_for_posts' ) );

		$description = $blog_page->post_content;

	} elseif ( is_category() || is_tag() || is_tax() ) { // if ( is_home() && ! is_front_page() )

		$term = get_queried_object();

		$description = term_description( $term->term_id, $term->taxonomy );

	} else { // if ( is_home() && ! is_front_page() )

		$description = get_bloginfo( 'description' );

	} // if ( is_home() && ! is_front_page() )

	return apply_filters( 'slimline_blog_description', $description );
}

function slimline_get_blog_title() {

	/**
	 * If this is the page for posts, set title equal to the page title
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_home/
	 *       Documentation of the `is_home` function
	 * @link https://developer.wordpress.org/reference/functions/is_front_page/
	 *       Documentation of the `is_front_page` function
	 */
	if ( is_home() && ! is_front_page() ) {

		/**
		 * Get the WP_Post object for the blog page
		 *
		 * @link https://developer.wordpress.org/reference/functions/get_post/
		 *       Documentation of the `get_post` function
		 * @link https://developer.wordpress.org/reference/functions/get_option/
		 *       Documentation of the `get_option` function
		 */
		$blog_page = get_post( get_option( 'page_for_posts' ) );

		$title = $blog_page->post_title;

	} elseif ( is_category() || is_tag() || is_tax() ) { // if ( is_home() && ! is_front_page() )

		$title = single_term_title( '', false );

	} elseif ( is_date() ) {



	} else { // if ( is_home() && ! is_front_page() )

		$title = get_bloginfo( 'name' );

	} // if ( is_home() && ! is_front_page() )

	return apply_filters( 'slimline_blog_title', $title );
}

/**
 * Generate a filterable class for miscellaneous elements
 *
 * Meant to work like `body_class()`, `post_class()` and/or `comment_class()` but for
 * miscellaneous or arbitrary elements. Developers can modify the returned classes
 * using the `slimline_class` and `slimline_{element}_class` filters.
 *
 * @param  string       $element The element to generate attributes for (e.g.,
 *                               "header", "footer", etc.)
 * @param  array|string $classes (Optional). An array or space-separated string of
 *                               additional classes to apply to the element.
 * @return string       $classes HTML class attribute
 * @since  0.1.0
 */
function slimline_get_class( $element, $classes = array() ) {

	/**
	 * Sanitize element name for use in filters and function names
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_html/
	 *       Documentation of the `esc_html` function
	 */
	$element = esc_html( $element );

	/**
	 * Split space-separated class strings into an array
	 *
	 * @link http://php.net/manual/en/function.is-array.php
	 *       Documentation of the PHP `is_array` function
	 * @link http://php.net/manual/en/function.preg-split.php
	 *       Documentation of the PHP `preg_split` function
	 */
	if ( ! is_array( $classes ) ) {
		$classes = preg_split( '#\s+#', $classes );
	} // if ( ! is_array( $classes ) )

	/**
	 * Escape classes for use in HTML attribute
	 *
	 * @link http://php.net/manual/en/function.array-map.php
	 *       Documentation of the PHP `array_map` function
	 * @link https://developer.wordpress.org/reference/functions/esc_attr/
	 *       Documentation of the `esc_attr` function
	 */
	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Generic filtering
	 *
	 * @param array  $classes An array of classes to apply to the element
	 * @param string $element The element or context for filtering
	 * @link  https://github.com/slimline/theme/wiki/slimline_class
	 */
	$classes = apply_filters( 'slimline_class', $classes, $element );

	/**
	 * Element-/context-specific filtering
	 *
	 * @param array $classes An array of classes to apply to the element
	 * @link  https://github.com/slimline/theme/wiki/slimline_element_class
	 */
	return apply_filters( "slimline_{$element}_class", $classes );
}

/**
 * Filter and return text content
 *
 * Functions similar to `get_the_content`, but takes arbirtrary text. Also avoids the
 * problem of applying third-party filters hooked to `the_content` (ex: JetPack
 * sharing buttons) to text that should not have them.
 *
 * @param string $text Text to filter
 * @link  https://github.com/slimline/theme/wiki/slimline_get_content()
 * @since 0.3.0
 */
function slimline_get_content( $text = '' ) {

	/**
	 * Return text content
	 *
	 * We are applying the `slimline_content` filter before returning to auto-add
	 * line breaks and paragraphs, texturize punctuation and evaluate shortcodes.
	 *
	 * @param  string $text The text to filter
	 * @return string $text The filtered text
	 * @link   https://github.com/slimline/theme/wiki/slimline_content
	 */
	return apply_filters( 'slimline_content', $text );
}

/**
 * Generate array of HTML attributes for the site <footer>
 *
 * @param  array|string $attributes (Optional). Array or query string of attributes
 * @return array        $attributes Array of generated attributes
 * @uses   slimline_get_attributes()
 * @since  0.3.0
 */
function slimline_get_footer_attributes( $attributes = array() ) {

	$defaults = array(
		'id' => 'site-footer',
	);

	return slimline_get_attributes( 'footer', $attributes, $defaults );
}

/**
 * Generate array of HTML attributes for the site <header>
 *
 * @param  array|string $attributes (Optional). Array or query string of attributes
 * @return array        $attributes Array of generated attributes
 * @uses   slimline_get_attributes()
 * @since  0.3.0
 */
function slimline_get_header_attributes( $attributes = array() ) {

	$defaults = array(
		'id' => 'site-header',
	);

	return slimline_get_attributes( 'header', $attributes, $defaults );
}

/**
 * Returns the site name, linked to home
 *
 * This function is essentially a copy of get_custom_logo(), substituting the blog
 * name for the logo image.
 *
 * @param  int    $blog_id ID of the blog in question. Default is the ID of the
 *                         current blog.
 * @return string $html    Custom site title markup
 * @since  0.3.0
 */
function slimline_get_site_title( $blog_id = 0 ) {

	/**
	 * Placeholder for our title markup
	 *
	 * @var string $html
	 */
	$html = '';

	/**
	 * Whether we had to switch blogs to get the correct title.
	 *
	 * This will be used to determine whether we need to switch BACK after getting
	 * the title.
	 *
	 * @var bool $switched_blog
	 */
	$switched_blog = false;

	/**
	 * Figure out if we need to switch blogs first.
	 *
	 * Switch blogs IF
	 * - there is another blog to switch to AND
	 * - a blog ID has been given AND
	 * - the given blog ID is not the current blog's ID
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_multisite/
	 *       Documentation of the `is_multisite` function
	 * @link https://developer.wordpress.org/reference/functions/get_current_blog_id/
	 *       Documentation of the `get_current_blog_id` function
	 */
	if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {

		/**
		 * Switch to given blog
		 *
		 * @link https://developer.wordpress.org/reference/functions/switch_to_blog/
		 *       Documentation of the `switch_to_blog` function
		 */
		switch_to_blog( $blog_id );

		/**
		 * We've switched blogs
		 */
		$switched_blog = true;

	} // if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() )

	/**
	 * Generate title markup
	 *
	 * @link http://php.net/manual/en/function.sprintf.php
	 *       Documentation of the `sprintf` function
	 * @link https://developer.wordpress.org/reference/functions/home_url/
	 *       Documentation of the `home_url` function
	 * @link https://developer.wordpress.org/reference/functions/esc_url/
	 *       Documentation of the `esc_url` function
	 * @link https://developer.wordpress.org/reference/functions/get_bloginfo/
	 *       Documentation of the `get_bloginfo` function
	 */
	$html = sprintf(
		'<a class="custom-logo-link" href="%1$s" itemprop="url" rel="home">%2$s</a>',
		esc_url( home_url( '/' ) ),
		slimline_get_site_name()
	);

	/**
	 * If we had to switch blogs, switch back now
	 *
	 * @link https://developer.wordpress.org/reference/functions/restore_current_blog/
	 *       Documentation of the `restore_current_blog` function
	 */
	if ( $switched_blog ) {
		restore_current_blog();
	} // if ( $switched_blog )

	/**
	 * Filters the site title output.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param int    $blog_id ID of the blog to get the custom logo for.
	 * @link  https://github.com/slimline/theme/wiki/slimline_get_site_title
	 */
	return apply_filters( 'slimline_get_site_title', $html, $blog_id );
}

function slimline_get_404_title() {

	return apply_filters( 'slimline_404_title', esc_html__( '404 Not Found', 'slimline' ) );
}

/**
 * Return the site name
 *
 * Wrapper function for `get_bloginfo`
 *
 * @return string Site name set in admin area
 * @since  0.3.0
 */
function slimline_get_site_name() {

	return get_bloginfo( 'name', 'raw' );
}

function slimline_title( $text = '' ) {

	echo slimline_get_title( $text );
}

function slimline_get_title( $text = '' ) {

	return apply_filters( 'slimline_title', $text );
}

function slimline_content( $text = '' ) {

	echo slimline_get_content( $text );
}

function slimline_get_content( $text = '' ) {

	return apply_filters( 'slimline_content', $text );
}
