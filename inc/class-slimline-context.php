<?php
/**
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly


class Slimline_Context {

	/**
	 * @var Slimine_Context $_instance The class instance
	 */
	protected static $_instance = null;

	/**
	 * @var array $context Array of context strings. These roughly mirror the WP
	 *                     template hierarchy filename slugs.
	 */
	protected $context = array();

	/**
	 * @var string $description HTML description of the current context (e.g, post
	 *                          excerpt, term descrition, author bio, etc.)
	 */
	protected $description = '';

	/**
	 * @var int $thumbnail_id ID of the thumbnail for the currenct context (e.g., the
	 *                        post thumbnail ID on a single post, term thumbnail ID
	 *                        if on a term archive and using a term meta plugin, etc.)
	 */
	protected $thumbnail_id = 0;

	/**
	 * @var string $title Text title of the current context (e.g., post title, term
	 *                    title, post title of blog home, etc.)
	 */
	protected $title = '';

	/**
	 * Assemble the object
	 *
	 * @link http://php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor
	 *       Description of `__construct` method
	 */
	protected function __construct() {

		/**
		 * Singular posts
		 *
		 * Set title to post title and description to post excerpt (see below)
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_singular/
		 *       Documentation of `is_singular` function.
		 */
		if ( is_singular() ) {

			/**
			 * Set up the $post_object variable.
			 *
			 * If $post_object is set, then title, thumbnail_id and description will
			 * be set near the end of the function
			 *
			 * @link https://developer.wordpress.org/reference/functions/get_queried_object/
			 *       Documentation of `get_queried_object` function.
			 */
			$post_object = get_queried_object();

			$this->context[] = 'singular';

			$this->context[] = $post_object->post_type;;

			/**
			 * Mime type handling for attachments
			 *
			 * @link https://developer.wordpress.org/reference/functions/is_attachment/
			 *       Documentation of `is_attachment` function.
			 */
			if ( is_attachment() ) {

				/**
				 * Get mime type array
				 *
				 * @link https://developer.wordpress.org/reference/functions/get_post_mime_type/
				 *       Documentation of `get_post_mime_type` function.
				 */
				$mime_type = explode( '/', get_post_mime_type( $post_object->ID ) );

				/**
				 * Add each segment of the mime type to the context.
				 */
				foreach ( $mime_type as $type ) {
					$this->context[] = $type;
				} // foreach ( $mime_type as $type )

			} // if ( is_attachment() )

		} else { // if ( is_singular() )

			/**
			 * If we are on any page besides the first
			 *
			 * We're only setting the context here since everything else should be
			 * set in the archive or home section.
			 *
			 * @link https://developer.wordpress.org/reference/functions/is_paged/
			 *       Documentation of `is_paged` function.
			 */
			if ( is_paged() ) {

				$this->context[] = 'paged';

			} // if ( is_paged() )

			/**
			 * 404 pages
			 *
			 * Sets a default description and title.
			 *
			 * @link https://developer.wordpress.org/reference/functions/is_404/
			 *       Documentation of `is_404` function.
			 */
			if ( is_404() ) {

				$this->context[] = '404';

				$this->description = __( "Sorry, there doesn't seem to be a page here. Maybe we can help you find what you are looking for using one of the methods below.", 'slimline' );

				$this->title = __( "Oops! Sorry, we can't find that page", 'slimline' );

			/**
			 * Archives
			 *
			 * Contains author, taxonomy, post type and date considerations.
			 *
			 * @link https://developer.wordpress.org/reference/functions/is_archive/
			 *       Documentation of `is_archive` function.
			 */
			} else if ( is_archive() ) { // if ( is_404() )

				$this->context[] = 'archive';

				/**
				 * Author archives
				 *
				 * Set title to author name and description to author bio.
				 *
				 * @link https://developer.wordpress.org/reference/functions/is_author/
				 *       Documentation of `is_author` function.
				 */
				if ( is_author() ) {

					$author = get_queried_object();

					$this->context[] = 'author';

					$this->description = get_the_author_meta( 'description', $author->ID );

					$this->title = get_the_author_meta( 'display_name', $author->ID );

				/**
				 * Term Archives
				 *
				 * Categories, tags and custom taxonomies
				 *
				 * Set title to term name and description to term description.
				 *
				 * @link https://developer.wordpress.org/reference/functions/is_category/
				 *       Documentation of `is_category` function.
				 * @link https://developer.wordpress.org/reference/functions/is_tag/
				 *       Documentation of `is_tag` function.
				 * @link https://developer.wordpress.org/reference/functions/is_tax/
				 *       Documentation of `is_tax` function.
				 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
				 *       Description of term object properties
				 */
				} else if ( is_category() || is_tag() || is_tax() ) { // if ( is_author() )

					$term = get_queried_object();

					$this->context[] = $term->taxonomy;

					$this->description = $term->description;

					$this->title = $term->name;

				/**
				 * Post type archives
				 *
				 * Custom post type archives
				 *
				 * @link https://developer.wordpress.org/reference/functions/is_post_type_archive/
				 *       Documentation of `is_post_type_archive` function.
				 */
				} else if ( is_post_type_archive() ) { // if ( is_author() )

					$post_type = get_query_var( 'post_type' );

					$this->context[] = $post_type;

					/**
					 * Get page set as post type archive
					 *
					 * Sets the $post_object variable
					 *
					 * NOTE: Requires the slimline-pages plugin
					 *
					 * @link  https://github.com/slimline/pages/wiki/slimline_get_page_for_posts()
					 * @link  https://developer.wordpress.org/reference/functions/is_page/
					 *        Documentation of `is_page` function.
					 * @since 0.2.0
					 */
					if ( function_exists( 'slimline_get_page_for_posts' )
						&& ( $page_for_posts = slimline_get_page_for_posts( $post_type )
						&& is_page( $page_for_posts ) ) {

						$post_object = get_post( $page_for_posts );

					/**
					 * Otherwise, use the post type object
					 *
					 * Set description to post type description (if any given) and
					 * title to post type label.
					 *
					 * @link https://developer.wordpress.org/reference/functions/register_post_type/
					 *       Description of post type object properties
					 */
					} else { // if ( function_exists( 'slimline_get_page_for_posts' ) && ( $page_for_posts = slimline_get_page_for_posts( $post_type ) && is_page( $page_for_posts ) )

						$post_type_object = get_post_type_object( $post_type );

						$this->description = $post_type_object->description;

						$this->title = $post_type_object->labels->name;

					} // if ( function_exists( 'slimline_get_page_for_posts' ) && ( $page_for_posts = slimline_get_page_for_posts( $post_type ) && is_page( $page_for_posts ) )

				/**
				 * Post type archives
				 *
				 * Custom month, day and year considerations
				 *
				 * @link https://developer.wordpress.org/reference/functions/is_date/
				 *       Documentation of `is_date` function.
				 */
				} else if ( is_date() ) { // if ( is_author() )

					/**
					 * @global object $wp_locale
					 */
					global $wp_locale;

					$day = get_query_var( 'day' );

					$month = $wp_locale->get_month( get_query_var( 'monthnum' ) );

					$year = get_query_var( 'year' );

					$this->context[] = 'date';

					/**
					 * Year archives
					 *
					 * @link https://developer.wordpress.org/reference/functions/is_year/
					 *       Documentation of `is_year` function.
					 */
					if ( is_year() ) {

						$this->context[] = 'year';

						$this->description = sprintf( __( 'Archives for the year of %1$s', 'slimline' ), $year );

						$this->title = $year;

					/**
					 * Month archives
					 *
					 * @link https://developer.wordpress.org/reference/functions/is_month/
					 *       Documentation of `is_month` function.
					 */
					} else if ( is_month() ) { // if ( is_year() )

						$this->context[] = 'month';

						$this->description = sprintf( __( 'Archives for the month of %1$s, %2$s', 'slimline' ), $month, $year );

						$this->title = single_month_title( '', false );

					/**
					 * Day archives
					 *
					 * @link https://developer.wordpress.org/reference/functions/is_day/
					 *       Documentation of `is_day` function.
					 */
					} else if ( is_day() ) { // if ( is_year() )

						$timestamp = strtotime( "{$day} {$month} {$year}" );

						$this->context[] = 'day';

						$this->description = sprintf( __( 'Archives for %1$s', 'slimline' ), date( 'M j, Y', $timestamp ) );

						$this->title = date( 'M j Y', $timestamp );

					} // if ( is_year() )

				} // if ( is_author() )

			/**
			 * Blog home page
			 *
			 * If blog home is the front page, sets title to blog name, description
			 * to blog description and thumbname_id to site thumbnail (site logo or
			 * site icon).
			 *
			 * If blog home is set to a static page, retrieves title, description and
			 * thumbnail_id from that page.
			 *
			 * @link https://developer.wordpress.org/reference/functions/is_home/
			 *       Documentation of `is_home` function.
			 */
			} else if ( is_home() ) { // if ( is_404() )

				$this->context[] = 'home';

				/**
				 * Get page set as the posts page
				 *
				 * Sets the $post_object variable
				 *
				 * @link  https://developer.wordpress.org/reference/functions/is_page/
				 *        Documentation of `is_page` function.
				 */
				if ( ( $page_for_posts = get_option( 'page_for_posts' ) )
					&& is_page( $page_for_posts ) ) {

					$post_object = get_post( $page_for_posts );

				/**
				 *
				 */
				} else { // if ( ( $page_for_posts = get_option( 'page_for_posts' ) ) && is_page( $page_for_posts ) )

					$this->description = get_bloginfo( 'description' );

					$this->thumbnail_id = slimline_get_site_thumbnail_id();

					$this->title = get_bloginfo( 'name' );

				} // if ( ( $page_for_posts = get_option( 'page_for_posts' ) ) && is_page( $page_for_posts ) )

			} else if ( is_search() ) { // if ( is_404() )

				$this->context[] = 'search';

				$this->title = sprintf( __( 'Search results for "%1$s"', 'slimline' ), esc_html( get_search_query() ) );

			} // if ( is_404() )

		} // if ( is_singular() )

		if ( isset( $post_object ) && $post_object ) {

			if ( ! empty( $post_object->post_excerpt ) ) {
				$this->description = $post_object->post_excerpt
			} else { // if ( ! empty( $post_object->post_excerpt ) )
				$this->description = apply_filters( 'get_the_excerpt', $post_object->post_content );
			} // if ( ! empty( $post_object->post_excerpt ) )

			$this->thumbnail_id = get_post_thumbnail_id( $post_object->ID );

			$this->title = $post_object->post_title;

		} // if ( isset( $post_object ) && $post_object )

		/**
		 * Front page
		 *
		 * Sets context only since title and description should have been set above
		 * (in singular if showing a static page on front, or home if showing posts
		 * page).
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_front_page/
		 *       Documentation of `is_front_page` function.
		 */
		if ( is_front_page() ) {
			$this->context[] = 'front-page';
		}

	} // function __construct()

	public function get_context() {

		return apply_filters( 'slimline_context', $this->context );
	}

	public function get_description() {

		return $this->get_property( 'description' );
	}

	/**
	 * Return the class instance
	 *
	 * @return object Slimline_Context::$_instance Slimline_Context object
	 */
	public static function get_instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		} // if ( is_null( self::$_instance ) )

		return self::$_instance;

	} // public static function get_instance()

	public function get_property( $property ) {

		$context = $this->get_context();

		foreach ( $context as $filter ) {
			$property = apply_filters( "slimline_{$filter}_{$property}", $property );
		} // foreach ( $context as $filter )

		return $property;
	}

	public function get_thumbnail_id() {

		return $this->get_property( 'thumbnail_id' );
	}

	public function get_title() {

		return $this->get_property( 'title' );
	}

}