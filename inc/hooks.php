<?php
/**
 * Hooks
 *
 * Hooked functions used in default Slimline templates. Every function is pluggable.
 *
 * @package Slimline
 * @subpackage Includes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_blog_wrapper hook (pluggable)
 *
 * Ouputs the blog wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_blog_wrapper` filter.
 *
 * @uses slimline_get_html_tag() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_blog_wrapper' ) ) {
	function slimline_blog_wrapper() {

		$args = array(
			'class'     => slimline_get_class( 'index' ),
			'itemprop'  => 'main',
			'itemscope' => 'itemscope',
			'itemtype'  => 'http://schema.org/Blog',
			'role'      => 'main'
		);

		$blog_wrapper = slimline_get_html_tag( 'div', $args, false );

		echo apply_filters( 'slimline_blog_wrapper', $blog_wrapper, $args );
	}
} // if ( ! function_exists( 'slimline_blog_wrapper' ) )

/**
 * slimline_blog_wrapper_close hook (pluggable)
 *
 * Ouputs the blog wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_blog_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_blog_wrapper_close' ) ) {
	function slimline_blog_wrapper_close() {

		$blog_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .index -->' );

		echo apply_filters( 'slimline_blog_wrapper_close', $blog_wrapper_close );
	}
} // if ( ! function_exists( 'slimline_blog_wrapper_close' ) )

/**
 * slimline_content_wrapper hook (pluggable)
 *
 * Ouputs the content wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_content_wrapper` filter.
 *
 * @uses slimline_get_html_tag() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_content_wrapper' ) ) {
	function slimline_content_wrapper() {

		$args = array(
			'class' => slimline_get_class( 'content' )
		);

		$content_wrapper = slimline_get_html_tag( 'div', $args, false );

		echo apply_filters( 'slimline_content_wrapper', $content_wrapper, $args );
	}
} // if ( ! function_exists( 'slimline_content_wrapper' ) )

/**
 * slimline_content_wrapper_close hook (pluggable)
 *
 * Ouputs the content wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_content_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_content_wrapper_close' ) ) {
	function slimline_content_wrapper_close() {

		$content_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .content -->' );

		echo apply_filters( 'slimline_content_wrapper_close', $content_wrapper_close );
	}
} // if ( ! function_exists( 'slimline_content_wrapper_close' ) )

/**
 * slimline_entries_wrapper hook (pluggable)
 *
 * Ouputs the entries wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_entries_wrapper` filter.
 *
 * @uses slimline_get_html_tag() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entries_wrapper' ) ) {
	function slimline_entries_wrapper() {

		$args = array(
			'class' => slimline_get_class( 'entries' ),
			'id'    => 'entries-wrap',
		);

		$entries_wrapper = slimline_get_html_tag( 'div', $args, false );

		echo apply_filters( 'slimline_entries_wrapper', $entries_wrapper, $args );
	}
} // if ( ! function_exists( 'slimline_entries_wrapper' ) )

/**
 * slimline_entries_wrapper_close hook (pluggable)
 *
 * Ouputs the entries wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_entries_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entries_wrapper_close' ) ) {
	function slimline_entries_wrapper_close() {

		$entries_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .entries -->' );

		echo apply_filters( 'slimline_entries_wrapper_close', $entries_wrapper_close );
	}
} // if ( ! function_exists( 'slimline_entries_wrapper_close' ) )

/**
 * slimline_entry_header hook (pluggable)
 *
 * Ouputs the entry header HTML tag. Developers can modify the echoed tag using the
 * `slimline_entry_header` filter.
 *
 * @uses slimline_get_html_tag() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_header' ) ) {
	function slimline_entry_header() {

		$args = array(
			'class' => slimline_get_class( 'entry-header' )
		);

		$entry_header = slimline_get_html_tag( 'div', $args, false );

		echo apply_filters( 'slimline_entry_header', $entry_header, $args );
	}
} // if ( ! function_exists( 'slimline_entry_header' ) )

/**
 * slimline_entry_header_close hook (pluggable)
 *
 * Ouputs the entry header closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_entry_header_close` filter.
 *
 * @uses slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_header_close' ) ) {
	function slimline_entry_header_close() {

		$entry_header_close = slimline_get_html_tag_close( 'div', '<!-- .entry-header -->' );

		echo apply_filters( 'slimline_entry_header_close', $entry_header_close );
	}
} // if ( ! function_exists( 'slimline_entry_header_close' ) )

/**
 * slimline_entry_meta hook (pluggable)
 *
 * Outputs the 
 *
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_meta' ) ) {
	function slimline_entry_meta() {

		
	}
} // if ( ! function_exists( 'slimline_entry_meta' ) )

/**
 * slimline_entry_thumbnail hook (pluggable)
 *
 * Outputs the entry's post thumbnail (if any). Developers can modify the echoed markup using the 
 * `slimline_entry_thumbnail` filter.
 *
 * @uses get_the_post_thumbnail() to generate the post thumbnail image
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_thumbnail' ) ) {
	function slimline_entry_thumbnail() {

		$entry_thumbnail = get_the_post_thumbnail( get_the_ID(), slimline_entry_thumbnail_size(), slimline_entry_thumbnail_args() );

		/**
		 * slimline_entry_thumbnail filter
		 *
		 * @hook [home|archive] slimline_entry_thumbnail_link - 10 (wraps the thumbnail in an anchor tag on index and archive pages)
		 */
		echo apply_filters( 'slimline_entry_thumbnail', $entry_thumbnail );
	}
} // if ( ! function_exists( 'slimline_entry_thumbnail' ) )

/**
 * slimline_entry_thumbnail_link hook (pluggable)
 *
 * Wraps the entry thumbnail image in an anchor tag. By default this is hooked to run on archives and 
 * the blog home page. Developers can modify the output using the `slimline_entry_thumbnail_link` filter.
 *
 * @param string $thumbnail The thumbnail's HTML markup
 * @return string $thumbnail The thumbnail wrapped in an anchor tag
 * @uses slimline_get_html_tag() and slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_thumbnail_link' ) ) {
	function slimline_entry_thumbnail_link( $thumbnail ) {

		if ( ! slimline_is_blog() )
			return $thumbnail; // stop processing if not on an index or archive page

		$args = array(
			'class' => slimline_get_class( 'entry-thumbnail-link' )
		);

		$thumbnail = slimline_get_html_tag( 'a', $args, false ) . $thumbnail . slimline_get_html_tag_close( 'a' );

		return apply_filters( 'slimline_entry_thumbnail_link', $thumbnail, $args );
	}
} // if ( ! function_exists( 'slimline_entry_thumbnail_link' ) )

/**
 * slimline_entry_title hook (pluggable)
 *
 * Outputs the entry title. Developers can modify the output using the `slimline_entry_title`
 * filter.
 *
 * @uses get_the_title to generate the post title.
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_title' ) ) {
	function slimline_entry_title() {

		$entry_title = get_the_title();

		/**
		 * slimline_entry_title filter
		 *
		 * @hook slimline_entry_title_link - 10 (wraps the title in an anchor tag)
		 * @hook slimline_entry_title_html - 20 (wraps the title in the appropriate header tag)
		 */
		echo apply_filters( 'slimline_entry_title', $entry_title );
	}
} // if ( ! function_exists( 'slimline_entry_title' ) )

/**
 * slimline_entry_title_html hook (pluggable)
 *
 * Wraps the entry title in a heading tag. By default this wraps titles in an h1 tag on singular
 * pages/posts or an h2 tag on archives and the blog home page. Developers can modify the output 
 * using the `slimline_entry_title_html` filter.
 *
 * @param string $title The entry title
 * @return string $title The entry title wrapped in a heading tag
 * @uses slimline_get_html_tag() and slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_title_html' ) ) {
	function slimline_entry_title_html( $title ) {

		$args = array(
			'class'    => slimline_get_class( 'entry-title' ),
			'itemprop' => 'headline',
		);

		$heading = ( is_singular() ? 'h1' : 'h2' );

		$title = slimline_get_html_tag( $heading, $args, false ) . $title . slimline_get_html_tag_close( $heading, '<!-- .entry-title -->' );

		return apply_filters( 'slimline_entry_title_html', $title, $args );
	}
} // if ( ! function_exists( 'slimline_entry_title_html' ) )

/**
 * slimline_entry_title_link hook (pluggable)
 *
 * Wraps the entry title in an anchor tag. By default this is hooked to run on archives and 
 * the blog home page. Developers can modify the output using the `slimline_entry_title_link` filter.
 *
 * @param string $title The entry title
 * @return string $title The entry title wrapped in an anchor tag
 * @uses slimline_get_html_tag() and slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_entry_title_link' ) ) {
	function slimline_entry_title_link( $title ) {

		if ( ! slimline_is_blog() )
			return $title; // stop processing if not on an index or archive page

		$args = array(
			'class'    => slimline_get_class( 'entry-title-link' ),
			'itemprop' => 'url',
		);

		$title = slimline_get_html_tag( 'a', $args, false ) . $title . slimline_get_html_tag_close( 'a' );

		return apply_filters( 'slimline_entry_title_link', $title, $args );
	}
} // if ( ! function_exists( 'slimline_entry_title_link' ) )

/**
 * slimline_get_blog_header hook (pluggable)
 *
 * Gets blog-header template part
 *
 * @uses slimline_get_template_part() To find and load the template part | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_blog_header' ) ) {
	function slimline_get_blog_header() {

		slimline_get_template_part( 'blog', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
} // if ( ! function_exists( 'slimline_get_blog_header' ) )

/**
 * slimline_get_custom_header hook (pluggable)
 *
 * Gets custom header template part
 *
 * @uses slimline_get_template_part() To find and load the template part | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_custom_header' ) ) {
	function slimline_get_custom_header() {

		slimline_get_template_part( 'custom', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
} // if ( ! function_exists( 'slimline_get_custom_header' ) )

/**
 * slimline_get_header_nav hook (pluggable)
 *
 * Gets nav-header template part
 *
 * @uses slimline_get_template_part() To find and load the template part | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_header_nav' ) ) {
	function slimline_get_header_nav() {

		slimline_get_template_part( 'nav', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
} // if ( ! function_exists( 'slimline_get_header_nav' ) )

/**
 * slimline_get_primary_sidebar hook (pluggable)
 *
 * Includes the primary widget area.
 *
 * @uses get_sidebar()
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_primary_sidebar' ) ) {
	function slimline_get_primary_sidebar() {

		get_sidebar();
	}
} // if ( ! function_exists( 'slimline_get_primary_sidebar' ) )

/**
 * slimline_get_secondary_sidebar hook (pluggable)
 *
 * Includes the secondary widget area.
 *
 * @uses get_sidebar()
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_secondary_sidebar' ) ) {
	function slimline_get_secondary_sidebar() {

		get_sidebar( 'secondary' );
	}
} // if ( ! function_exists( 'slimline_get_secondary_sidebar' ) )

/**
 * slimline_get_site_header hook (pluggable)
 *
 * Gets site header template part
 *
 * @uses slimline_get_template_part() To find and load the template part | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_site_header' ) ) {
	function slimline_get_site_header() {

		slimline_get_template_part( 'site', 'header', slimline_get_queried_object_type(), get_queried_object_id() );
	}
} // if ( ! function_exists( 'slimline_get_site_header' ) )

/**
 * slimline_get_site_footer hook (pluggable)
 *
 * Gets site footer template part
 *
 * @uses slimline_get_template_part() To find and load the template part | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_get_site_footer' ) ) {
	function slimline_get_site_footer() {

		slimline_get_template_part( 'site', 'footer', slimline_get_queried_object_type(), get_queried_object_id() );
	}
} // if ( ! function_exists( 'slimline_get_site_footer' ) )

/**
 * slimline_site_wrapper hook (pluggable)
 *
 * Ouputs the site wrapper HTML tag. Developers can modify the echoed tag using the
 * `slimline_site_wrapper` filter.
 *
 * @uses slimline_get_html_tag() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_site_wrapper' ) ) {
	function slimline_site_wrapper() {

		$args = array(
			'class' => slimline_get_class( 'site' )
		);

		$site_wrapper = slimline_get_html_tag( 'div', $args, false );

		echo apply_filters( 'slimline_site_wrapper', $site_wrapper, $args );
	}
} // if ( ! function_exists( 'slimline_site_wrapper' ) )

/**
 * slimline_site_wrapper_close hook (pluggable)
 *
 * Ouputs the site wrapper closing HTML tag. Developers can modify the echoed tag using the
 * `slimline_site_wrapper_close` filter.
 *
 * @uses slimline_get_html_tag_close() to create the HTML tag | inc/general-template.php
 * @since 0.1.0
 */
if ( ! function_exists( 'slimline_site_wrapper_close' ) ) {
	function slimline_site_wrapper_close() {

		$site_wrapper_close = slimline_get_html_tag_close( 'div', '<!-- .site -->' );

		echo apply_filters( 'slimline_site_wrapper_close', $site_wrapper_close );
	}
} // if ( ! function_exists( 'slimline_site_wrapper_close' ) )
