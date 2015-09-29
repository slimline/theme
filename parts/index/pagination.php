<?php
/**
 * Index / Archive Pagination
 *
 * Numbered pagination suitable for archives, blog home and search results.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Current query object
 *
 * @see https://developer.wordpress.org/reference/classes/wp_query/
 *      Description of the `WP_Query` class
 */
global $wp_query;

/**
 * page # * posts per page + offset (if any) + 1
 *
 * Ex: on first page with default 10 posts per page and no offset, $min = ( (10 * 0) + 0 + 1 ) = 1
 */
$min =  ( absint( get_query_var( 'posts_per_page' ) ) * absint( get_query_var( 'paged' ) ) + absint( get_query_var( 'offset' ) ) + 1;

/**
 * $min + # posts showing on current page - 1
 *
 * Ex: continuing from previous, $max = (1 + 10 - 1) = 10
 */
$max = $min + absint( $wp_query->post_count ) - 1;
?>

	<nav aria-label="<?php echo esc_attr_x( 'Pagination', 'aria label', 'slimline' ); ?>" class="pagination pagination-index">

		<p class="show-posts">
			<?php printf( __( 'Showing %1$s-%2$s of %3$s', 'slimline' ), $min, $max, $wp_query->found_posts ); ?>
		</p><!-- .show-posts -->

		<?php
			/**
			 * output pagination links
			 *
			 * @see   https://developer.wordpress.org/reference/functions/paginate_links/
			 *        Documentation of paginate_links function
			 * @see   slimline_paginate_links_args() | inc/default-args.php
			 * @since 0.3.0
			 */
			paginate_links( slimline_paginate_links_args() );
		?>
	</nav><!-- .pagination -->