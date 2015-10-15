<?php
/**
 * Comment Form
 *
 * Displays comment form
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Check if comments are open
 *
 * @link https://developer.wordpress.org/reference/functions/comments_open/
 *       Description of `comments_open` function
 */
if ( comments_open() ) :
?>

	<?php
		/**
		 * Output comment form
		 *
		 * @link https://developer.wordpress.org/reference/functions/comment_form/
		 *       Description of `comment_form` function
		 * @see  slimline_comment_form_args()
		 */
		comment_form( slimline_comment_form_args() );
	?>

<?php else : // if ( comments_open() ) ?>

	<?php
		/**
		 * Check if trackbacks/pingbacks are open
		 *
		 * @link https://developer.wordpress.org/reference/functions/pings_open/
		 *       Description of `pings_open` function
		 */
		if ( pings_open() ) :
	?>

		<p class="comments-closed pings-open">
			<?php
				/**
				 * Print a message letting users know the comments are closed but
				 * trackbacks and pingbacks are open.
				 */
				_e( 'Comments are closed, but trackbacks are open.', 'slimline' );
			?>
		</p><!-- .comments-closed -->

	<?php else : // if ( pings_open() ) ?>

		<p class="comments-closed pings-closed">
			<?php
				/**
				 * Print a message letting users know that all comment types are
				 * closed.
				 */
				_e( 'Comments are closed.', 'slimline' );
			?>
		</p><!-- .comments-closed -->

	<?php endif; // if ( pings_open() ) ?>

<?php endif; // if ( comments_open() )