<?php
/**
 * Footer File
 *
 * The footer contains the information that goes at the bottom of the site, such as
 * links to other Pages or categories on the site in a navigation menu, copyright
 * and contact information, and other details. It also includes the closing </main>
 * and </body> tags.
 *
 * @package Slimline / Theme
 * @see     http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 *          WordPress Theme Development guidelines for footer.php
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

?>

			<?php
				/**
				 * slimline_content_after hook
				 *
				 * @hook get_sidebar - 50 (gets the primary sidebar)
				 * @see  https://github.com/slimline/theme/wiki/slimline_content_after
				 */
				do_action( 'slimline_content_after' );
			?>

		</main>

		<?php
			/**
			 * Get the site-footer.php template part
			 *
			 * The site-footer.php file contains the <footer> tag for the site and
			 * fires the following action hooks:
			 * slimline_footer_before
			 * slimline_footer_top
			 * slimline_footer_bottom
			 * slimline_footer_after
			 *
			 * @see http://codex.wordpress.org/Function_Reference/get_template_part
			 *      Documentation of the `get_template_part` function
			 */
			slimline_get_template_part( 'site-footer', slimline_get_context() );
		?>

		<?php
			/**
			 * slimline_body_bottom hook
			 *
			 * @see https://github.com/slimline/theme/wiki/slimline_body_bottom
			 */
			do_action( 'slimline_body_bottom' );
		?>

		<?php
			/**
			 * Fire the `wp_footer` action
			 *
			 * @see https://developer.wordpress.org/reference/functions/wp_footer/
			 *      Documentation of the `wp_footer` function
			 * @see https://developer.wordpress.org/reference/hooks/wp_footer/
			 *      Documentation of the `wp_footer` action
			 */
			wp_footer();
		?>

	</body>
</html>