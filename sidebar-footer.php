<?php
/**
 * Sidebar containing the footer widget area
 *
 * The secondary sidebar is a widget area in the footer, after the main content area
 * and before the site-footer template part.
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
		 * slimline_sidebar_footer_before hook
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_sidebar_footer_before
		 */
		do_action( 'slimline_sidebar_footer_before' );
	?>

	<aside <?php slimline_sidebar_footer_attributes(); ?>>

		<?php
			/**
			 * slimline_sidebar_footer_top hook
			 *
			 * @see  https://github.com/slimline/theme/wiki/slimline_sidebar_footer_top
			 */
			do_action( 'slimline_sidebar_footer_top' );
		?>

		<div <?php slimline_sidebar_footer_list_attributes(); ?>>

			<?php
				/**
				 * Output sidebar content
				 *
				 * @see https://developer.wordpress.org/reference/functions/dynamic_sidebar/
				 *      Documentation of `dynamic_sidebar` function
				 */
				dynamic_sidebar( 'sidebar-3' );
			?>

		</div><!-- .block-list -->

		<?php
			/**
			 * slimline_sidebar_footer_bottom hook
			 *
			 * @see  https://github.com/slimline/theme/wiki/slimline_sidebar_footer_bottom
			 */
			do_action( 'slimline_sidebar_footer_bottom' );
		?>

	</aside><!-- #sidebar-footer -->

	<?php
		/**
		 * slimline_sidebar_footer_after hook
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_sidebar_footer_after
		 */
		do_action( 'slimline_sidebar_footer_after' );
	?>
