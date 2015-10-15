<?php
/**
 * Comment List
 *
 * Displays individual comments
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Check if there are any comments
 *
 * @link https://developer.wordpress.org/reference/functions/have_comments/
 *       Description of `have_comments` function
 */
if ( have_comments() ) :
?>

	<ol class="comment-list" id="comments-list">
		<?php
			/**
			 * List comments
			 *
			 * @link https://developer.wordpress.org/reference/functions/wp_list_comments/
			 *       Description of `wp_list_comments` function
			 * @see  slimline_wp_list_comments_args()
			 */
			wp_list_comments( slimline_wp_list_comments_args() );
		?>
	</ol><!-- #comments-list -->

<?php endif; // if ( have_comments() )