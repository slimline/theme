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

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

		<?php
			/**
			 * slimline_main_after hook
			 *
			 * @hook slimline_get_primary_sidebar - 10 (gets the primary sidebar) | inc/hooks.php
			 * @hook slimline_content_wrapper_close - 20 (outputs the closing div for the content wrapper) | inc/hooks.php
			 * @hook slimline_get_secondary_sidebar - 30 (gets secondary content sidebar) | inc/hooks.php
			 * @hook slimline_get_site_footer - 40 (gets site-footer template part) | inc/hooks.php
			 * @hook slimline_site_wrapper_close - 50 (outputs closing div for the site wrapper) | inc/hooks.php
			 */
			do_action( 'slimline_main_after' );
		?>

		<?php
			/**
			 * wp_footer function
			 *
			 * Fires the `wp_footer` action. Used by many plugins to add additional scripts and other content
			 * at the end of the site.
			 *
			 * @see http://codex.wordpress.org/Function_Reference/wp_footer
			 */
			wp_footer();
		?>

	</body>

</html>