<?php
/**
 * Content to show when an index is empty
 *
 * Displays when no posts match the current query. Meant as part of the parent
 * <article> in index.php (replaces the #entries <section>).
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<section <?php slimline_not_found_attributes(); ?>>

		<?php
			/**
			 * slimline_not_found_top hook
			 *
			 * @hook slimline_get_not_found_header - 10 (gets not-found/header.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_not_found_top
			 */
			do_action( 'slimline_not_found_top' );
		?>

		<?php
			/**
			 * slimline_content_bottom hook
			 *
			 * @hook slimline_get_not_found_content - 10 (gets not-found/content.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_not_found_bottom
			 */
			do_action( 'slimline_not_found_bottom' );
		?>

	</section><!-- .not-found -->