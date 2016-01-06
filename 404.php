<?php
/**
 * Template for displaying 404 (Not Found) Error pages
 *
 * Displays when no post matches the current URL. Displays a generic default message
 * that can be modified by child theme developers or overridden using the 404 widget
 * area.
 *
 * @package Slimline / Theme
 * @see     http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Load the header.php file
 *
 * @link https://developer.wordpress.org/reference/functions/get_header/
 *       Documentation of the `get_header` function
 */
get_header();
?>

	<article <?php slimline_404_attributes(); ?>>

		<?php
			/**
			 * slimline_content_top hook
			 *
			 * @link https://github.com/slimline/theme/wiki/slimline_content_top
			 */
			do_action( 'slimline_content_top' );
		?>

		<?php
			/**
			 * Show custom user content, if any.
			 *
			 * At time of theme creation there is not a built-in way to edit the
			 * content of a WordPress 404 error page. Slimline theme gives this
			 * ability to users via a custom widget area.
			 *
			 * @link  https://developer.wordpress.org/reference/functions/is_active_sidebar/
			 *        Documentation of `is_active_sidebar` function.
			 * @since 0.1.0
			 */
			if ( is_active_sidebar( 'slimline-404' ) ) {

				/**
				 * Display widget area content
				 *
				 * @link https://developer.wordpress.org/reference/functions/dynamic_sidebar/
				 *       Documentation of `dynamic_sidebar` function
				 */
				dynamic_sidebar( 'slimline-404' );

			/**
			 * Show default content if no custom content set
			 *
			 * @link  http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
			 * @since 0.1.0
			 */
			} else { // if ( is_active_sidebar( 'slimline-404' ) )

				/**
				 * Load the 404/header.php template part
				 *
				 * The 404/header.php file contains the <header> tag for the
				 * 404 page.
				 *
				 * @link  https://developer.wordpress.org/reference/functions/get_template_part/
				 *        Documentation of the `get_template_part` function
				 * @since 0.1.0
				 */
				get_template_part( 'parts/404/header' );

				/**
				 * slimline_404_content hook
				 *
				 * @hook  slimline_get_404_posts       - 10 (gets recent posts loop template part)
				 * @hook  slimline_get_404_search_form - 20 (gets search form template part)
				 * @link  https://github.com/slimline/theme/wiki/slimline_404_content
				 * @since 0.2.0
				 */
				do_action( 'slimline_404_content' );

			} // if ( is_active_sidebar( 'slimline-404' ) )
		?>

		<?php
			/**
			 * slimline_content_bottom hook
			 *
			 * @link https://github.com/slimline/theme/wiki/slimline_content_bottom
			 */
			do_action( 'slimline_content_bottom' );
		?>

	</article><!-- #404 -->

<?php
/**
 * Load the footer.php file
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *       Documentation of the `get_footer` function
 */
get_footer();