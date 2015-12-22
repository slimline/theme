<?php
/**
 * Template for displaying comment content
 *
 * NOTE: The end tag for comments is separate from the main comments template to
 * account for the unknown nesting length of threaded comments.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<li>

		<?php
			/**
			 * slimline_comment_before hook
			 *
			 * @link https://github.com/slimline/theme/wiki/slimline_comment_before
			 */
			do_action( 'slimline_comment_before' );
		?>

		<article <?php comment_class(); ?> <?php slimline_comment_attributes(); ?>>

			<?php
				/**
				 * slimline_comment_top hook
				 *
				 * @hook slimline_comment_avatar - 20 (get comment/avatar.php template part)
				 * @hook slimline_comment_author - 50 (get comment/author.php template part)
				 * @link https://github.com/slimline/theme/wiki/slimline_comment_top
				 */
				do_action( 'slimline_comment_top' );
			?>

			<div <?php slimline_comment_content_attributes(); ?>>
				<?php
					/**
					 * Ouput comment content
					 *
					 * @link https://developer.wordpress.org/reference/functions/comment_text/
					 *       Description of `comment_text` function
					 */
					comment_text();
				?>
			</div><!-- .comment-content -->

			<?php
				/**
				 * slimline_comment_bottom hook
				 *
				 * @hook slimline_get_comment_date   - 10 (get comment/date.php template part)
				 * @hook slimline_comment_reply_link - 20 (output comment reply link)
				 * @link https://github.com/slimline/theme/wiki/slimline_comment_bottom
				 */
				do_action( 'slimline_comment_bottom' );
			?>