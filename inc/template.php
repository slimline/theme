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
 * @since 0.2.0
 */
function slimline_get_404_entries_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/404/title-entries' );
}

/**
 * Get recent posts loop template part
 *
 * @since 0.2.0
 */
function slimline_get_404_posts() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/404/posts' );
}

/**
 * Get search form template part
 *
 * @since 0.2.0
 */
function slimline_get_404_search_form() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/404/searchform' );
}

/**
 * Get charset template part
 *
 * @since 0.2.0
 */
function slimline_get_charset_tag() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/tag', 'charset' );
}

/**
 * Get comments list template part
 *
 * @since 0.2.0
 */
function slimline_get_comments_list() {

	/**
	 * Get comments/list.php template part
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Documentation of the `get_template_part` function
	 */
	get_template_part( 'parts/comments/list' );
}

/**
 * Get comments form template part
 *
 * @since 0.2.0
 */
function slimline_get_comments_form() {

	/**
	 * Get comments/form.php template part
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Documentation of the `get_template_part` function
	 */
	get_template_part( 'parts/comments/form' );
}

/**
 * Get comment template part
 *
 * @param object $comment WP_Comment object
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
	slimline_get_template_part( 'comments/comment', get_comment_type( $comment->comment_ID ) );
}

/**
 * Get comment end template part
 *
 * @param object $comment WP_Comment object
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
	slimline_get_template_part( 'comments/end', get_comment_type( $comment->comment_ID ) );
}

/**
 * Get comments template part
 *
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
		comments_template( 'parts/comments/comments.php' );

	} // if ( slimline_show_comments() )

}

/**
 * Get comments title template part
 *
 * @since 0.2.0
 */
function slimline_get_comments_title() {

	/**
	 * Get comments/title.php template part
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Documentation of the `get_template_part` function
	 */
	get_template_part( 'parts/comments/title' );
}

/**
 * Get copyright template part
 *
 * @since 0.2.0
 */
function slimline_get_copyright_notice() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/footer/notice', 'copyright' );
}

/**
 * Get entries header template part
 *
 * @since 0.2.0
 */
function slimline_get_entries_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/index/title-entries' );
}

/**
 * Get entry footer template part
 *
 * @since 0.2.0
 */
function slimline_get_entry_footer() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/entry/footer' );
}

/**
 * Get entry header template part
 *
 * @since 0.2.0
 */
function slimline_get_entry_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/entry/header' );
}

/**
 * Get entry meta template part
 *
 * @since 0.2.0
 */
function slimline_get_entry_meta() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/entry/meta' );
}

/**
 * Get footer navigation template part
 *
 * @since 0.2.0
 */
function slimline_get_footer_navigation() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/footer/navigation' );
}

/**
 * Get header logo template part
 *
 * @since 0.2.0
 */
function slimline_get_header_logo() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/header/logo' );
}

/**
 * Get header navigation template part
 *
 * @since 0.2.0
 */
function slimline_get_header_navigation() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/header/navigation' );
}

/**
 * Get index.php header template part
 *
 * @since 0.2.0
 */
function slimline_get_index_header() {

	/**
	 * @link https://github.com/slimline/theme/wiki/slimline_get_index_header()
	 */
	slimline_get_template_part( 'index/header', slimline_get_context() );
}

/**
 * Get index.php pagination template part
 *
 * @since 0.2.0
 */
function slimline_get_index_pagination() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/index/pagination' );
}

/**
 * Get not found description template part
 *
 * @since 0.2.0
 */
function slimline_get_not_found_description() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/not-found/description' );
}

/**
 * Get not found header template part
 *
 * @since 0.2.0
 */
function slimline_get_not_found_header() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/not-found/header' );
}

/**
 * Get pingback template part
 *
 * @since 0.2.0
 */
function slimline_get_pingback_tag() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/tag', 'pingback' );
}

/**
 * Get footer widget area
 *
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
 * Get viewport template part
 *
 * @since 0.2.0
 */
function slimline_get_viewport_tag() {

	/**
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 *       Description of `get_template_part` function
	 */
	get_template_part( 'parts/tag', 'viewport' );
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
 * @since 0.1.0
 */
function slimline_get_template_part( $slug, $name = '' ) {
	global $slimline;

	/**
	 * grab all parameters passed to the function
	 */
	$args = func_get_args();

	/**
	 * If an array is passed for the second argument, it will overwrite all
	 * subsequent arguments.
	 */
	if ( is_array( $name ) ) {

		/**
		 * Rewrite $args to match
		 */
		$args = array_merge( array( $slug ), $name );

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
	 * @param string $slug The slug name for the generic template
	 * @param string $name The name of the specialized template
	 * @param array  $args Array of all parameters passed to the function
	 */
	do_action( "get_template_part_{$slug}", $slug, $name, $args );

	/**
	 * save template for reuse
	 *
	 * check to see if we have searched for this template already. Doing this allows
	 * us to return the template more quickly in cases where the template is repeated
	 * several times (such as on archive pages and in comments)
	 *
	 * @link slimline_get_template_path()
	 * @link slimline_set_template_path()
	 */
	$template_string = join( '-', $args );

	if ( ! slimline_get_template_path( $template_string ) ) {
		$template = slimline_locate_template( $args );
		slimline_set_template_path( $template_string, $template );
	} // if ( ! slimline_get_template_path( $template_string ) )

	require( slimline_get_template_path( $template_string ) );
}

/**
 * slimline_get_template_slugs function
 *
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
				$templates[] = "{$base}-{$slug}";
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

	$templates[] = $base;

	return $templates;
}

/**
 * slimline_locate_template function
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
 * @uses   slimline_add_php_extension to append ".php" to each filename in the array
 * @uses   locate_template() to find the first matching template in the array of filenames
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