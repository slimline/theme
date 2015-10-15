<?php
/**
 * Comment Pagination
 *
 * Numbered pagination suitable for post comments.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Do not show comment pagination if we don't have more than one page
 *
 * @link https://developer.wordpress.org/reference/functions/get_comment_pages_count/
 *       Description of `get_comment_pages_count` function
 */
if ( ! get_option( 'page_comments' ) || 1 < get_comment_pages_count() ) {
	return;
} // if ( ! get_option( 'page_comments' ) || 1 < get_comment_pages_count() )
?>

	<nav aria-label="<?php echo esc_attr_x( 'Pagination', 'aria label', 'slimline' ); ?>" class="pagination pagination-comments">

		<p class="show-posts">
			<?php printf( __( 'Showing page %1$s of %2$s', 'slimline' ), absint( get_query_var( 'cpage' ) ), get_comment_pages_count() ); ?>
		</p><!-- .show-posts -->

		<?php
			/**
			 * output pagination links
			 *
			 * @see   https://developer.wordpress.org/reference/functions/paginate_comments_links/
			 *        Documentation of `paginate_comments_links` function
			 * @see   slimline_paginate_comments_links_args()
			 * @since 0.3.0
			 */
			paginate_comments_links( slimline_paginate_comments_links_args() );
		?>
	</nav><!-- .pagination -->