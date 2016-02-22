<?php
/**
 * Custom theme conditional tags
 *
 * Used to provide conditionals for displaying content or executing code.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @link       https://developer.wordpress.org/themes/basics/conditional-tags/
 *             Description of conditional tags
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Whether the site has a logo set
 *
 * @uses  slimline_get_logo_id()
 * @link  https://github.com/slimline/theme/wiki/slimline_has_logo()
 * @since 0.2.0
 */
function slimline_has_logo() {

	return (bool) slimline_get_logo_id();
}

/**
 * Whether the current page is considered a blog page
 *
 * By default, a page is considered blog page if it is a) the posts page, b) an
 * archive normally used by posts (e.g., category, date, etc.) or c) a single post.
 *
 * @return bool TRUE is yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_is_blog()
 * @since  0.2.0
 */
function slimline_is_blog() {

	/**
	 * Filter the results
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_is_blog
	 * @link https://developer.wordpress.org/reference/functions/is_home/
	 *       Description of the `is_home` function
	 * @link https://developer.wordpress.org/reference/functions/is_author/
	 *       Description of the `is_author` function
	 * @link https://developer.wordpress.org/reference/functions/is_category/
	 *       Description of the `is_category` function
	 * @link https://developer.wordpress.org/reference/functions/is_date/
	 *       Description of the `is_date` function
	 * @link https://developer.wordpress.org/reference/functions/is_tag/
	 *       Description of the `is_tag` function
	 * @link https://developer.wordpress.org/reference/functions/is_single/
	 *       Description of the `is_single` function
	 */
	return apply_filters( 'slimline_is_blog', ( is_home() || is_author() || is_category() || is_date() || is_tag() || is_single() ) );
}

/**
 * Whether the current post is considered a blog post
 *
 * By default, a post is considered a blog post if it has the post type "post".
 *
 * @return bool TRUE is yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_is_blog_post()
 * @since  0.2.0
 */
function slimline_is_blog_post( $post = null ) {

	/**
	 * Get current post (or given post)
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_post/
	 *       Description of the `get_post` function
	 */
	$post = get_post( $post );

	/**
	 * Filter the results
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_is_blog_post
	 * @link https://developer.wordpress.org/reference/functions/get_post_type/
	 *       Description of the `get_post_type` function
	 */
	return apply_filters( 'slimline_is_blog_post', ( 'post' === get_post_type( $post ) ) );
}

/**
 * Whether the blog has posts in more than one category
 *
 * @return bool TRUE is yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_is_multicategory()
 * @since  0.2.0
 */
function slimline_is_multicategory() {

	$category_count = slimline_get_category_count() - 1;

	/**
	 * Filter the results
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_is_multicategory
	 * @link https://developer.wordpress.org/reference/functions/get_post_type/
	 *       Description of the `get_post_type` function
	 */
	return apply_filters( 'slimline_is_multicategory', (bool) $category_count );
}

/**
 * Decide whether to show comments
 *
 * By default comments are shown on singular posts that support comments, either
 * 1) have comments and/or trackbacks/pings open or 2) already have comments and/or
 * trackbacks/pings attached to them, and either 1) do not have have a post password
 * or 2) have a post password that the user has already entered.
 *
 * @return bool TRUE to show comments, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_show_comments()
 * @since  0.2.0
 */
function slimline_show_comments() {

	/**
	 * Filter the results
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_show_comments
	 * @link https://developer.wordpress.org/reference/functions/is_singular/
	 *       Description of the `is_singular` function
	 * @link https://developer.wordpress.org/reference/functions/comments_open/
	 *       Description of the `comments_open` function
	 * @link https://developer.wordpress.org/reference/functions/pings_open/
	 *       Description of the `pings_open` function
	 * @link https://developer.wordpress.org/reference/functions/have_comments/
	 *       Description of the `have_comments` function
	 * @link https://developer.wordpress.org/reference/functions/post_password_required/
	 *       Description of the `post_password_required` function
	 */
	return apply_filters( 'slimline_show_comments', ( is_singular() && ( comments_open() || pings_open() || have_comments() ) && ! post_password_required() ) );
}

/**
 * Decide whether to show the excerpt in the entry header
 *
 * By default, singular posts will show their excerpt (if set) in the entry's
 * <header> as a kind of introductory paragraph. Developers can modify this behavior
 * using the `slimline_show_entry_header_excerpt` filter.
 *
 * @return bool TRUE to show the excerpt, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_show_entry_header_excerpt()
 * @since  0.2.0
 */
function slimline_show_entry_header_excerpt() {

	/**
	 * Filter the result
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_show_entry_header_excerpt
	 * @link https://developer.wordpress.org/reference/functions/is_singular/
	 *       Description of the `is_singular` function
	 * @link https://developer.wordpress.org/reference/functions/has_excerpt/
	 *       Description of the `has_excerpt` function
	 */
	return apply_filters( 'slimline_show_entry_header_excerpt', ( is_singular() && has_excerpt() ) );
}

/**
 * Decide whether to show the entry content
 *
 * By default, all singular entries will show full content while entries on index
 * pages will only show full content if they appear on the first page of the blog
 * home.
 *
 * @return bool TRUE to show the content, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_show_entry_content()
 * @since  0.2.0
 */
function slimline_show_entry_content() {

	/**
	 * Filter the result
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_show_entry_content
	 * @link https://developer.wordpress.org/reference/functions/is_singular/
	 *       Description of the `is_singular` function
	 * @link https://developer.wordpress.org/reference/functions/is_home/
	 *       Description of the `is_home` function
	 * @link https://developer.wordpress.org/reference/functions/is_paged/
	 *       Description of the `is_paged` function
	 */
	return apply_filters( 'slimline_show_entry_content', ( is_singular() || ( is_home() && ! is_paged() ) ) );
}

/**
 * Decide whether to show the entry meta
 *
 * By default, entry meta (e.g., category and author info) will only show on blog
 * posts. Developers can modify this behavior using the `slimline_show_entry_meta`
 * filter.
 *
 * @return bool TRUE to show the meta, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_show_entry_header_meta()
 * @since  0.2.0
 */
function slimline_show_entry_meta() {

	/**
	 * Filter the result
	 *
	 * @link https://github.com/slimline/theme/wiki/slimline_show_entry_meta
	 * @link https://developer.wordpress.org/reference/functions/is_single/
	 *       Description of the `is_single` function
	 */
	return apply_filters( 'slimline_show_entry_meta', is_single() );
}

/**
 * Use given feature as site logo?
 *
 * @param  string $feature Feature to check
 * @return bool   $use     TRUE if yes, FALSE if no
 * @since  0.2.0
 */
function slimline_use_as_logo( $feature = '' ) {

	/**
	 * Set feature defaults
	 */
	switch ( $feature ) {

		/**
		 * Use site identity and custom headers as logo
		 */
		case 'custom-header' :
		case 'site-icon'     :
			$use = true;
			break;

		/**
		 * Use JetPack site logo if JetPack is installed and active
		 */
 		case 'jetpack-site-logo' :
			$use = function_exists( 'jetpack_the_site_logo' );
			break;

		/**
		 * Don't use other features
		 */
		default :
			$use = false;
			break;

	} // switch ( $feature )

	/**
	 * Filter the result
	 *
	 * @param bool $use Whether to use the given feature as the site logo
	 * @link  https://github.com/slimline/theme/wiki/slimline_use_$feature_as_logo
	 */
	return apply_filters( "slimline_use_{$feature}_as_logo", $use );
}

/**
 * Allow color scheme choices in customizer?
 *
 * By default will return FALSE if using a child theme, TRUE if not.
 *
 * @return bool TRUE for yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_use_default_layout()
 * @since  0.2.0
 */
function slimline_use_color_schemes() {

	/**
	 * Filter the result
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_child_theme/
	 *       Description of the `is_child_theme` function
	 * @link https://github.com/slimline/theme/wiki/slimline_use_color_schemes
	 */
	return apply_filters( 'slimline_use_color_schemes', ( ! is_child_theme() ) );
}

/**
 * Use default rows, column sizes, etc.?
 *
 * By default will return FALSE if using a child theme, TRUE if not.
 *
 * @return bool TRUE for yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_use_default_layout()
 * @since  0.2.0
 */
function slimline_use_default_layout() {

	/**
	 * Filter the result
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_child_theme/
	 *       Description of the `is_child_theme` function
	 * @link https://github.com/slimline/theme/wiki/slimline_use_default_layout
	 */
	return apply_filters( 'slimline_use_default_layout', ( ! is_child_theme() ) );
}

/**
 * Show Schema.org markup?
 *
 * @return bool TRUE for yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_use_schema_org()
 * @since  0.2.0
 */
function slimline_use_schema_org() {

	/**
	 * Filter the result
	 *
	 * @param bool Default TRUE to use Schema.org markup
	 * @link  https://github.com/slimline/theme/wiki/slimline_use_schema_org
	 */
	return apply_filters( 'slimline_use_schema_org', true );
}

/**
 * Use Yoast breadcrumbs for WooCommerce if available?
 *
 * @return bool TRUE for yes, otherwise FALSE
 * @link   https://github.com/slimline/theme/wiki/slimline_use_yoast_breadcrumb_for_woocommerce()
 * @since  0.2.0
 */
function slimline_use_yoast_breadcrumb_for_woocommerce() {

	/**
	 * Filter the result
	 *
	 * @param bool Default TRUE to replace WooCommerce breadcrumbs with Yoast if available
	 * @link  https://github.com/slimline/theme/wiki/slimline_use_yoast_breadcrumb_for_woocommerce
	 */
	return apply_filters( 'slimline_use_yoast_breadcrumb_for_woocommerce', true );
}