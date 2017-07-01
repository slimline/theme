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
 * Returns the site name, linked to home
 *
 * This function is essentially a copy of get_custom_logo(), substituting the blog
 * name for the logo image.
 *
 * @param  int    $blog_id ID of the blog in question. Default is the ID of the
 *                         current blog.
 * @return string $html    Custom site title markup
 * @since  0.4.0
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
	 *       Description of the `is_multisite` function
	 * @link https://developer.wordpress.org/reference/functions/get_current_blog_id/
	 *       Description of the `get_current_blog_id` function
	 */
	if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {

		/**
		 * Switch to given blog
		 *
		 * @link https://developer.wordpress.org/reference/functions/switch_to_blog/
		 *       Description of the `switch_to_blog` function
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
	 *       Description of the `sprintf` function
	 * @link https://developer.wordpress.org/reference/functions/home_url/
	 *       Description of the `home_url` function
	 * @link https://developer.wordpress.org/reference/functions/esc_url/
	 *       Description of the `esc_url` function
	 * @link https://developer.wordpress.org/reference/functions/get_bloginfo/
	 *       Description of the `get_bloginfo` function
	 */
	$html = sprintf(
		'<a class="custom-logo-link" href="%1$s" itemprop="url" rel="home">%2$s</a>',
		esc_url( home_url( '/' ) ),
		get_bloginfo( 'name', 'display' )
	);

	/**
	 * If we had to switch blogs, switch back now
	 *
	 * @link https://developer.wordpress.org/reference/functions/restore_current_blog/
	 *       Description of the `restore_current_blog` function
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