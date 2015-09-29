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
		 * @see https://github.com/slimline/theme/wiki/slimline_footer_before
		 */
		do_action( 'slimline_footer_before' );
	?>

	<footer id="site-footer">

		<?php
			/**
			 * slimline_footer_top hook
			 *
			 * @hook slimline_get_sidebar_footer - 10 (gets footer widget area)
			 * @see  https://github.com/slimline/theme/wiki/slimline_footer_top
			 */
			do_action( 'slimline_footer_top' );
		?>

		<?php
			/**
			 * slimline_footer_bottom hook
			 *
			 * @hook slimline_get_footer_nav       - 10 (gets nav-footer template part)
			 * @hook slimline_get_copyright_notice - 20 (gets notice-copyright template part)
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