<?php
/**
 * Site Header
 *
 * Contains the site <header> tag
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<?php
		/**
		 * slimline_header_before hook
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_header_before
		 */
		do_action( 'slimline_header_before' );
	?>

	<header <?php slimline_site_header_attributes(); ?>>

		<?php
			/**
			 * slimline_header_top hook
			 *
			 * @hook slimline_get_header_logo - 10 (gets header/logo.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_header_top
			 */
			do_action( 'slimline_header_top' );
		?>

		<?php
			/**
			 * slimline_header_bottom hook
			 *
			 * @hook slimline_get_header_navigation - 10 (gets header/navigation.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_header_bottom
			 */
			do_action( 'slimline_header_bottom' );
		?>

	</header><!-- #site-header -->

	<?php
		/**
		 * slimline_header_after hook
		 *
		 * @see https://github.com/slimline/theme/wiki/slimline_header_after
		 */
		do_action( 'slimline_header_after' );
	?>