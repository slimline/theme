<?php
/**
 * Template Loading Functions
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Output comment reply link
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_comment_reply_link()
 * @since 0.2.0
 */
function slimline_comment_reply_link() {

	/**
	 * Ouput a comment reply link
	 *
	 * @link https://developer.wordpress.org/reference/functions/comment_reply_link/
	 *       Description of `comment_reply_link` function
	 */
	comment_reply_link();
}

/**
 * Get entries header template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_404_entries_header()
 * @since 0.2.0
 */
function slimline_get_404_entries_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . '404/title-entries' );
}

/**
 * Get recent posts loop template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_404_posts()
 * @since 0.2.0
 */
function slimline_get_404_posts() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . '404/posts' );
}

/**
 * Get search form template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_404_search_form()
 * @since 0.2.0
 */
function slimline_get_404_search_form() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . '404/searchform' );
}

/**
 * Get charset template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_charset_tag()
 * @since 0.2.0
 */
function slimline_get_charset_tag() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'tag', 'charset' );
}

/**
 * Get comment author template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comment_author()
 * @since 0.2.0
 */
function slimline_get_comment_author() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comment/author' );
}

/**
 * Get comment avatar template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comment_avatar()
 * @since 0.2.0
 */
function slimline_get_comment_avatar() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comment/avatar' );
}

/**
 * Get comment date template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comment_date()
 * @since 0.2.0
 */
function slimline_get_comment_date() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comment/date' );
}

/**
 * Get comment template part
 *
 * @param object $comment WP_Comment object
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comment_template()
 * @since 0.2.0
 */
function slimline_get_comment_template( $comment ) {

	/**
	 * Get comments/comment.php template part
	 *
	 * We are using `slimline_get_template_part` to take advantage of the template
	 * path caching.
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_comment_type/
	 *       Description of `get_comment_type` function
	 * @see  slimline_get_template_part()
	 */
	slimline_get_template_part( 'comment/comment', get_comment_type( $comment->comment_ID ) );
}

/**
 * Get comment end template part
 *
 * @param object $comment WP_Comment object
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comment_end_template()
 * @since 0.2.0
 */
function slimline_get_comment_end_template( $comment ) {

	/**
	 * Get comments/end.php template part
	 *
	 * We are using `slimline_get_template_part` to take advantage of the template
	 * path caching.
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_comment_type/
	 *       Description of `get_comment_type` function
	 * @see  slimline_get_template_part()
	 */
	slimline_get_template_part( 'comment/end', get_comment_type( $comment->comment_ID ) );
}

/**
 * Get comments list template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comments_template()
 * @since 0.2.0
 */
function slimline_get_comments_list() {

	/**
	 * Get comments/list.php template part
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Documentation of the `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comments/list' );
}

/**
 * Get comments form template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comments_form()
 * @since 0.2.0
 */
function slimline_get_comments_form() {

	/**
	 * Get comments/form.php template part
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Documentation of the `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comments/form' );
}

/**
 * Get comments title template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comments_header()
 * @since 0.2.0
 */
function slimline_get_comments_header() {

	/**
	 * Get comments/title.php template part
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Documentation of the `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comments/title' );
}

/**
 * Get comments pagination template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comments_pagination()
 * @since 0.2.0
 */
function slimline_get_comments_pagination() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comments/pagination' );
}

/**
 * Get comments template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_comments_template()
 * @since 0.2.0
 */
function slimline_get_comments_template() {

	/**
	 * Check whether to show comments
	 *
	 * @link slimline_show_comments()
	 */
	if ( slimline_show_comments() ) {

		/**
		 * @link https://developer.wordpress.org/reference/functions/comments_template/
		 *       Description of `comments_template` function
		 */
		comments_template();

	} // if ( slimline_show_comments() )

}

/**
 * Get copyright template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_copyright_notice()
 * @since 0.2.0
 */
function slimline_get_copyright_notice() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'footer/notice', 'copyright' );
}

/**
 * Get doctype template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_doctype()
 * @since 0.2.0
 */
function slimline_get_doctype() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'doctype' );
}

/**
 * Get entries header template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_entries_header()
 * @since 0.2.0
 */
function slimline_get_entries_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'index/title-entries' );
}

/**
 * Get entry footer template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_entry_footer()
 * @since 0.2.0
 */
function slimline_get_entry_footer() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'entry/footer' );
}

/**
 * Get entry header template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_entry_header()
 * @since 0.2.0
 */
function slimline_get_entry_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'entry/header' );
}

/**
 * Get entry meta template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_entry_meta()
 * @since 0.2.0
 */
function slimline_get_entry_meta() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'entry/meta' );
}

/**
 * Get footer navigation template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_footer_navigation()
 * @since 0.2.0
 */
function slimline_get_footer_navigation() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'footer/navigation' );
}

/**
 * Get header logo template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_header_logo()
 * @since 0.2.0
 */
function slimline_get_header_logo() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'header/logo' );
}

/**
 * Get header navigation template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_header_navigation()
 * @since 0.2.0
 */
function slimline_get_header_navigation() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'header/navigation' );
}

/**
 * Get opening html template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_html_tag()
 * @since 0.2.0
 */
function slimline_get_html_tag() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'tag', 'html' );
}

/**
 * Get index.php header template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_index_header()
 * @since 0.2.0
 */
function slimline_get_index_header() {

	/**
	 * Don't show if on a 404 page (we add the header differently there)
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_404/
	 *       Description of the `is_404` function
	 */
	if ( is_404() ) {
		return;
	} // if ( is_404() )

	/**
	 * @link https://github.com/slimline/theme/wiki/slimline_get_index_header()
	 * @see  slimline_get_template_parts_directory()
	 */
	slimline_get_template_part( 'index/header', slimline_get_context() );
}

/**
 * Get index.php pagination template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_index_pagination()
 * @since 0.2.0
 */
function slimline_get_index_pagination() {

	/**
	 * Don't show if on a 404 page
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_404/
	 *       Description of the `is_404` function
	 */
	if ( is_404() ) {
		return;
	} // if ( is_404() )

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'index/pagination' );
}

/**
 * Get not found description template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_not_found_content()
 * @since 0.2.0
 */
function slimline_get_not_found_content() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'not-found/content' );
}

/**
 * Get not found header template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_not_found_header()
 * @since 0.2.0
 */
function slimline_get_not_found_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'not-found/header' );
}

/**
 * Get pingback template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_pingback_tag()
 * @since 0.2.0
 */
function slimline_get_pingback_tag() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'tag', 'pingback' );
}

/**
 * Get row close template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_row_close()
 * @since 0.2.0
 */
function slimline_get_row_close() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'html/row-close' );
}

/**
 * Get full-width row close template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_row_close_full()
 * @since 0.2.0
 */
function slimline_get_row_close_full() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'html/row-close', 'full' );
}

/**
 * Get row open template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_row_open()
 * @since 0.2.0
 */
function slimline_get_row_open() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'html/row-open' );
}

/**
 * Get full-width row open template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_row_open_full()
 * @since 0.2.0
 */
function slimline_get_row_open_full() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'html/row-open', 'full' );
}

/**
 * Get footer widget area
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_sidebar_footer()
 * @since 0.2.0
 */
function slimline_get_sidebar_footer() {

	/**
	 * Only include sidebar if it is being used
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_active_sidebar/
	 *       Description of `is_active_sidebar` function
	 */
	if ( is_active_sidebar( 'sidebar-3' ) ) {

		/**
		 * @link https://developer.wordpress.org/reference/functions/get_sidebar/
		 *       Description of `get_sidebar` function
		 */
		get_sidebar( 'footer' );

	} // if ( is_active_sidebar( 'sidebar-3' ) )

}

/**
 * Get primary widget area
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_sidebar_primary()
 * @since 0.2.0
 */
function slimline_get_sidebar_primary() {

	/**
	 * Only include sidebar if it is being used
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_active_sidebar/
	 *       Description of `is_active_sidebar` function
	 */
	if ( is_active_sidebar( 'sidebar-1' ) ) {

		/**
		 * @link https://developer.wordpress.org/reference/functions/get_sidebar/
		 *       Description of `get_sidebar` function
		 */
		get_sidebar();

	} // if ( is_active_sidebar( 'sidebar-1' ) )

}

/**
 * Get WooCommerce shop widget area
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_sidebar_shop()
 * @since 0.2.0
 */
function slimline_get_sidebar_shop() {

	/**
	 * Only include sidebar if it is being used
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_active_sidebar/
	 *       Description of `is_active_sidebar` function
	 */
	if ( is_active_sidebar( 'sidebar-shop' ) ) {

		/**
		 * @link https://developer.wordpress.org/reference/functions/get_sidebar/
		 *       Description of `get_sidebar` function
		 */
		get_sidebar( 'shop' );

	} // if ( is_active_sidebar( 'sidebar-shop' ) )

}

/**
 * Get viewport template part
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_viewport_tag()
 * @since 0.2.0
 */
function slimline_get_viewport_tag() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 * @see  slimline_get_template_parts_directory()
	 */
	get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'tag', 'viewport' );
}

/**
 * Get template parts
 *
 * Alternative function to get_template_part() allowing for a greater range of
 * template matches. Where get_template_part() takes only the slug and one additional
 * name, this function takes an infinite number of names in addition to the slug.
 *
 * @param string       $slug The slug name for the generic template.
 * @param string|array $name The name of the specialized template. This parameter is
 *                           repeatable as needed. Alternately, you may pass an array
 *                           of names to the function to achieve the same result.
 * @uses  slimline_locate_template() to retrieve the absolute path to the first
 *        matching template if found
 * @link  https://github.com/slimline/theme/wiki/slimline_get_template_part()
 * @since 0.1.0
 */
function slimline_get_template_part( $slug, $name = '' ) {

	/**
	 * grab all parameters passed to the function
	 */
	$stems = func_get_args();

	/**
	 * If an array is passed for the second argument, it will overwrite all
	 * subsequent arguments.
	 */
	if ( is_array( $name ) ) {

		/**
		 * Rewrite $stems to match
		 */
		$stems = array_merge( array( $slug ), $name );

		/**
		 * Convert to string
		 */
		$name = $name[0];

	} // if ( is_array( $name ) )

	/**
	 * get_template_part_{$slug} action
	 *
	 * Fires before the specified template part file is loaded.
	 *
	 * The dynamic portion of the hook name, `$slug`, refers to the slug name
	 * for the generic template part.
	 *
	 * @param string $slug  The slug name for the generic template
	 * @param string $name  The name of the specialized template
	 * @param array  $stems Array of all parameters passed to the function
	 */
	do_action( "get_template_part_{$slug}", $slug, $name, $stems );

	/**
	 * save template for reuse
	 *
	 * check to see if we have searched for this template already. Doing this allows
	 * us to return the template more quickly in cases where the template is repeated
	 * several times (such as on archive pages and in comments)
	 *
	 * @link slimline_get_template_path()
	 */
	$template_string = join( '-', $stems );

	$template = slimline_get_template_path( $template_string );

	/**
	 * If we haven't checked for this template before, do so now and save the results
	 * for later.
	 */
	if ( false === $template ) {

		/**
		 * Find absolute path to the file (if one exists)
		 *
		 * @see slimline_locate_template()
		 */
		$template = slimline_locate_template( $stems );

		/**
		 * Set the template path for later lookup
		 *
		 * @link slimline_set_template_path()
		 */
		slimline_set_template_path( $template_string, $template );

	} // if ( false === $template )

	/**
	 * If we have a valid template path, require it now.
	 */
	if ( $template ) {
		require( $template );
	} // if ( $template )
}

/**
 * slimline_get_template_slugs function
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_get_template_slugs()
 * @since 0.1.0
 */
function slimline_get_template_slugs( $stems ) {

	$templates = array();

	$parts = slimline_get_template_parts_directory();

	$base = array_shift( $stems );

	$names = $stems;

	foreach ( $stems as $stem ) {

		if ( count( $names ) > 0 ) {

			$slugs = slimline_get_template_slugs( $names );

			foreach ( $slugs as $slug ) {
				$templates[] = "{$parts}/{$base}-{$slug}";
			} // foreach ( $slugs as $slug )

		} // if ( count( $names ) > 0 )

		array_shift( $names );

	} // foreach ( $stems as $stem )

	/**
	 * Filter template slugs
	 *
	 * @param array  $templates Array of template slugs to locate
	 * @param string $base      First slug/stem in the passed parameters
	 * @param array  $stems     Array of stems passed to the function
	 */
	$templates = apply_filters( 'slimline_get_template_slugs', $templates, $base, $stems );

	/**
	 * Base-specific template slug filtering
	 *
	 * @param array $templates Array of template slugs to locate
	 * @param array $stems     Array of stems passed to the function
	 */
	$templates = apply_filters( "slimline_get_template_slugs-{$base}", $templates, $stems );

	$templates[] = "{$parts}/{$base}";

	return $templates;
}

/**
 * Find the absolute path to a given template file based on parameters
 *
 * Arguments passed to slimline_locate_template() should be listed in descending
 * order of importance, with the first argument considered the slug. For example,
 * passing {slug}, {post_type} and {post_format} as arguments will locate the
 * appropriate template in the following order:
 *
 * {slug}-{post_type}-{post_format}.php
 * {slug}-{post_type}.php
 * {slug}-{post_format}.php
 * {slug}.php
 *
 * While passing {slug}, {taxonomy}, {post_type}, {post_format} will locate in this
 * order:
 *
 * {slug}-{taxonomy}-{post_type}-{post_format}.php
 * {slug}-{taxonomy}-{post_type}.php
 * {slug}-{taxonomy}-{post_format}.php
 * {slug}-{taxonomy}.php
 * {slug}-{post_type}-{post_format}.php
 * {slug}-{post_type}.php
 * {slug}-{post_format}.php
 * {slug}.php
 *
 * @param  array|string An array or comma-separated list of slugs to use for template
 *                      location
 * @return string       The absolute path to a located template if one is found, or
 *                      an empty string if none found
 * @uses   slimline_get_template_slugs() to build an array of filenames to search
 *         using locate_template()
 * @uses   slimline_add_php_extension() to append ".php" to each filename in the array
 * @uses   locate_template() to find the first matching template in the array of filenames
 * @link   https://github.com/slimline/theme/wiki/slimline_locate_template()
 * @since  0.1.0
 */
function slimline_locate_template() {

	/**
	 * grab all arguments passed to the function
	 */
	if ( ! ( $stems = func_get_args() ) ) {
		return ''; // return empty string if no arguments passed
	} // if ( ! ( $stems = func_get_args() ) )

	if ( is_array( $stems[ 0 ] ) ) {
		$stems = $stems[ 0 ];
	} // if ( is_array( $stems[ 0 ] ) )

	/**
	 * get rid of empties
	 */
	$stems = array_filter( $stems );

	/**
	 * create array of filenames to search for
	 */
	$templates = slimline_get_template_slugs( $stems );

	$templates = array_map( 'slimline_add_php_extension', $templates );

	return locate_template( $templates );
}

/**
 * Remove WooCommerce wrapper loading if we are not on an archive page
 *
 * WooCommerce singular pages already follow Slimline markup well enough, we just
 * the wrapper templates for the index pages.
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_maybe_remove_woocommerce_content_wrapper()
 * @since 0.2.0
 */
function slimline_maybe_remove_woocommerce_content_wrapper() {

	/**
	 * Only remove the action if we are not on a singular page
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_singular/
	 *       Description of `is_singular` function
	 */
	if ( ! is_singular() ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	} // if ( ! is_singular() )

}

/**
 * Remove WooCommerce wrapper loading if we are not on an archive page
 *
 * WooCommerce singular pages already follow Slimline markup well enough, we just
 * the wrapper templates for the index pages.
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_maybe_remove_woocommerce_content_wrapper_end()
 * @since 0.2.0
 */
function slimline_maybe_remove_woocommerce_content_wrapper_end() {

	/**
	 * Only remove the action if we are not on a singular page
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_singular/
	 *       Description of `is_singular` function
	 */
	if ( ! is_singular() ) {
		remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
	} // if ( ! is_singular() )

}