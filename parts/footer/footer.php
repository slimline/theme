<?php
/**
 * Site Footer
 *
 * Contains the site <footer> tag
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<?php
		/**
		 * slimline_footer_before hook
		 *
		 * @hook slimline_get_sidebar_footer - 10 (gets sidebar-footer.php widget area)
		 * @see  https://github.com/slimline/theme/wiki/slimline_footer_before
		 */
		do_action( 'slimline_footer_before' );
	?>

	<footer <?php slimline_site_footer_attributes(); ?>>

		<?php
			/**
			 * slimline_footer_top hook
			 *
			 * @see https://github.com/slimline/theme/wiki/slimline_footer_top
			 */
			do_action( 'slimline_footer_top' );
		?>

		<?php
			/**
			 * slimline_footer_bottom hook
			 *
			 * @hook slimline_get_copyright_notice  - 10 (gets footer/notice-copyright.php template part)
			 * @hook slimline_get_footer_navigation - 20 (gets footer/navigation.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_footer_bottom
			 */
			do_action( 'slimline_footer_bottom' );
		?>

	</footer><!-- #site-footer -->

	<?php
		/**
		 * slimline_footer_after hook
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_footer_after
		 */
		do_action( 'slimline_footer_after' );
	?>