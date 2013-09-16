<?php
/**
 * Footer Template
 *
 * The footer file is the second part of the site wrapper started in the 
 * header file. It contains everything that comes after the main content 
 * area of the site, including any unclosed tags opened in the header file.
 *
 * @package Slimline
 * @subpackage Template
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

		<?php
			/**
			 * slimline_main_after hook
			 *
			 * @hook slimline_get_primary_sidebar - 10 (gets the primary sidebar)
			 * @hook slimline_content_wrapper_close - 20 (outputs the closing div for the content wrapper)
			 * @hook slimline_get_secondary_content - 30 (gets secondary-content sidebar)
			 * @hook slimline_get_site_footer - 40 (gets site-footer template part)
			 * @hook slimline_site_wrapper_close - 50 (outputs closing div for the site wrapper)
			 */
			slimline_do_action( 'slimline_main_after' );
		?>

		<?php wp_footer(); // @see http://codex.wordpress.org/Function_Reference/wp_footer ?>

	</body>

</html>