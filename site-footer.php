<?php
/**
 * Site Footer
 *
 * Contains the site <footer>
 *
 * @package Slimline
 * @subpackage Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<footer <?php slimline_site_footer_attributes(); ?>>

		<?php
			/**
			 * slimline_site_footer hook
			 *
			 * @hook slimline_get_footer_nav - 10 (gets nav-footer template part) | inc/hooks.php
			 * @hook slimline_get_copyright_notice - 20 (gets notice-copyright template part) | inc/hooks.php
			 */
			do_action( 'slimline_site_footer' );
		?>

	</footer><!-- .site-footer -->