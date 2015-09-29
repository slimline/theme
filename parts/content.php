<?php
/**
 * Entry Content
 *
 * The default template for displaying post content. Displays a post entry if no more
 * specific template exists (e.g., content-gallery for a post in gallery format).
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<article <?php post_class(); ?> <?php slimline_entry_attributes(); ?>>

		<?php
			/**
			 * slimline_entry_top hook
			 *
			 * @hook slimline_get_entry_header - 50 (gets entry/header.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_entry_top
			 */
			do_action( 'slimline_entry_top' );
		?>

		<?php
			/**
			 * slimline_entry_content_before hook
			 *
			 * @hook slimline_get_entry_meta - 50 (gets entry/meta.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_entry_content_before
			 */
			do_action( 'slimline_entry_content_before' );
		?>

		<div <?php slimline_entry_content_attributes(); ?>>
			<?php
				/**
				 * Conditionally show excerpt or full content
				 *
				 * By default we will show full content if 1) we are on a singular
				 * entry, or 2) we are on the blog home page.
				 *
				 * @see slimline_show_entry_content() | inc/conditionals.php
				 */
				if ( slimline_show_entry_content() ) {

					/**
					 * Display content with a custom "read more" link
					 *
					 * The read more link displays when the `<!--more-->` quicktag.
					 *
					 * @see   slimline_get_read_more_text() | inc/post-template.php
					 * @since 0.2.0
					 */
					the_content( slimline_get_read_more_text() );

				} else { // if ( slimline_show_entry_content() )

					/**
					 * Display excerpt with a custom "read more" link
					 *
					 * The read more link displays by hooking the
					 * `slimline_get_read_more_text` function to the `excerpt_more`
					 * filter
					 *
					 * @see   slimline_get_read_more_text() | inc/post-template.php
					 * @see   https://developer.wordpress.org/reference/hooks/excerpt_more/
					 *        Documentation of the `excerpt_more` filter.
					 * @since 0.2.0
					 */
					the_excerpt();

				} // if ( slimline_show_entry_content() )
			?>
		</div><!-- .entry-content -->

		<?php
			/**
			 * slimline_entry_content_after hook
			 *
			 * @hook slimline_get_entry_footer - 50 (gets entry/footer.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_entry_content_after
			 */
			do_action( 'slimline_entry_content_after' );
		?>

		<?php
			/**
			 * slimline_entry_bottom hook
			 *
			 * @hook slimline_get_comments_template - 50 (conditionally gets comments.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_entry_bottom
			 */
			do_action( 'slimline_entry_bottom' );
		?>

	</article><!-- .entry -->