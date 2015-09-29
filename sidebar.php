<?php
/**
 * Sidebar containing the main widget area
 *
 * The primary sidebar is a (probably) vertical column floated to the left or right
 * of the main content containing secondary or related information.
 *
 * @package Slimline / Theme
 * @see     https://codex.wordpress.org/Sidebars
 * @see     http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<?php
		/**
		 * slimline_sidebar_primary_before hook
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_sidebar_primary_before
		 */
		do_action( 'slimline_sidebar_primary_before' );
	?>

	<aside <?php slimline_sidebar_primary_attributes(); ?>>

		<?php
			/**
			 * slimline_sidebar_primary_top hook
			 *
			 * @see https://github.com/slimline/theme/wiki/slimline_sidebar_primary_top
			 */
			do_action( 'slimline_sidebar_primary_top' );
		?>

		<?php
			/**
			 * Output sidebar content
			 *
			 * @see https://developer.wordpress.org/reference/functions/dynamic_sidebar/
			 *      Documentation of `dynamic_sidebar` function
			 */
			dynamic_sidebar( 'sidebar-1' );
		?>

		<?php
			/**
			 * slimline_sidebar_primary_bottom hook
			 *
			 * @see https://github.com/slimline/theme/wiki/slimline_sidebar_primary_bottom
			 */
			do_action( 'slimline_sidebar_primary_bottom' );
		?>

	</aside><!-- #sidebar-primary -->

	<?php
		/**
		 * slimline_sidebar_primary_after hook
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_sidebar_primary_after
		 */
		do_action( 'slimline_sidebar_primary_after' );
	?>
