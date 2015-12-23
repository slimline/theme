<?php
/**
 * Template for displaying the ending tags for comments
 *
 * The end tag for comments is separate from the main comments template to account
 * for the unknown nesting length of threaded comments.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

		</article><!-- .comment -->

		<?php
			/**
			 * slimline_comment_after hook
			 *
			 * @link https://github.com/slimline/theme/wiki/slimline_comment_after
			 */
			do_action( 'slimline_comment_after' );
		?>

	</li>