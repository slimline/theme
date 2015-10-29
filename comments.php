<?php
/**
 * Template for displaying comments
 *
 * This area displays both the comments list and comment form.
 *
 * @package Slimline / Theme
 * @see     https://codex.wordpress.org/Theme_Development#Comments_.28comments.php.29
 * @since   0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<?php
		/**
		 * slimline_comments_before action
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_comments_before
		 */
		do_action( 'slimline_comments_before' );
	?>

	<section <?php slimline_comments_attributes(); ?>>

		<?php
			/**
			 * slimline_comments_top action
			 *
			 * @hook slimline_get_comments_header - 10 (gets comments/title.php template part)
			 * @link https://github.com/slimline/theme/wiki/slimline_comments_top
			 */
			do_action( 'slimline_comments_top' );
		?>

		<?php
			/**
			 * slimline_comments_bottom action
			 *
			 * @hook slimline_get_comments_list       - 10 (gets comments/list.php template part)
			 * @hook slimline_get_comments_pagination - 20 (gets comments/pagination.php template part)
			 * @hook slimline_get_comments_form       - 30 (gets comments/form.php template part)
			 * @link https://github.com/slimline/theme/wiki/slimline_comments_bottom
			 */
			do_action( 'slimline_comments_bottom' );
		?>

	</section><!-- #comments -->

	<?php
		/**
		 * slimline_comments_after action
		 *
		 * @link https://github.com/slimline/theme/wiki/slimline_comments_after
		 */
		do_action( 'slimline_comments_after' );
	?>