<?php
/**
 * Entry Header
 *
 * Shows entry meta such as publish date and author.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Show entry meta
 *
 * Conditionally show entry meta. By default we will show it only on blog posts.
 *
 * @see   https://github.com/slimline/theme/wiki/slimline_show_entry_meta
 * @since 0.3.0
 */
if ( slimline_show_entry_meta() ) :
?>

	<footer class="entry-meta">

		<p class="entry-byline">
			<?php
				printf(
					'%1$s <a href="%2$s" title="%3$s">%4$s</a> &bull; <time datetime="%5$s">%6$s</time>',
					__( 'by', 'slimline' ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					sprintf( __( 'Read more posts by %1$s', 'slimline' ), get_the_author() ),
					get_the_author(),
					get_the_date( DATE_ATOM ),
					get_the_date()
				);
			?>
		</p><!-- .entry-byline -->

		<?php
		 /**
		  * Display categories only if at least one category assigned to post.
		  *
		  * @see https://developer.wordpress.org/reference/functions/has_category/
		  *      Documentation of has_category function
		  */
		 if ( has_category() ) :
		?>
			<p class="entry-categories">

				<?php _e( 'Published in', 'slimline' ); ?>

				<?php
					/**
					 * Separate categories by comma
					 *
					 * @see https://developer.wordpress.org/reference/functions/the_category/
					 *      Documentation for the_category function
					 */
					the_category( ', ' );
				?>

			</p><!-- .entry-categories -->
		<?php endif; // if ( has_category() ) ?>

	</footer><!-- .entry-meta -->

<?php endif; // if ( slimline_show_entry_meta() )