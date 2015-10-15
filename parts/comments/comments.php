<?php
/**
 * Template for displaying comments
 *
 * This area displays both the comments list and comment form.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
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
			 * @hook slimline_get_comments_title - 10 (gets comments/title.php template part)
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

		<?php
			/**
			 * Get comments/form.php template part
			 *
			 * @see https://developer.wordpress.org/reference/functions/get_template_part/
			 *      Documentation of the `get_template_part` function
			 */
			get_template_part( 'parts/comments/form', get_post_type() );
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