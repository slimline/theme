<?php
/**
 * 404 Error Page Template
 *
 * Displays when no past matches the current URL. Displays a generic default message that can be modified
 * by child theme developers or overridden using the 404 widget area.
 *
 * @package Slimline
 * @subpackage Template
 * @see http://codex.wordpress.org/Creating_an_Error_404_Page
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

@header( "{$_SERVER[ 'SERVER_PROTOCOL' ]} 404 Not found", true, 404 ); // make sure proper 404 header sent

get_header(); // load the header.php template. @see http://codex.wordpress.org/Function_Reference/get_header
?>

	<article slimline_class( 'main', 'error-404' ) <?php slimline_404_attributes(); ?>>

		<?php
			/**
			 * slimline_404_content_before hook
			 *
			 * Code that runs before the 404 content regardless of whether the 404 widget area is active or not.
			 */
			slimline_do_action( 'slimline_404_content_before' );

			if ( is_active_sidebar( 'slimline-404' ) ) {

				dynamic_sidebar( 'slimline-404' );

			} else { // is_active_sidebar( 'slimline-404' )

				/**
				 * slimline_404_content hook
				 *
				 * Code that runs only if the 404 widget area is not active. This is where child theme developers can
				 * modify the default 404 page content.
				 *
				 * @hook slimline_404_title - 10 (outputs the 404 page main title)
				 * @hook slimline_404_description - 20 (outputs the 404 page main text content)
				 * @hook slimline_404_widget - 30 (uses the_widget() to display a Slimline_404_Widget)
				 * @hook slimline_404_wp_widget_search - 40 (uses the_widget() to display a WP_Widget_Search)
				 */
				slimline_do_action( 'slimline_404_content' );

			} // is_active_sidebar( 'slimline-404' )

			/**
			 * slimline_404_content_after hook
			 *
			 * Code that runs before the 404 content regardless of whether the 404 widget area 
			 active or not.
			 */
			slimline_do_action( 'slimline_404_content_after' );
		?>

	</article>

<?php get_footer(); // load the footer.php template. @see http://codex.wordpress.org/Function_Reference/get_footer ?>