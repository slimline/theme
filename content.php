<?php
/**
 * Standard Loop
 *
 * Loop for displaying posts with standard (or no) post format on home, archive
 * and search pages. Will also show for single posts, but this can be overridden in
 * child themes by including a content-single template (see single.php).
 *
 * @package Slimline
 * @subpackage Template
 * @see http://codex.wordpress.org/Loop_Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<article <?php post_class(); ?> <?php slimline_post_attributes(); ?>>

		<?php
			/**
			 * slimline_entry_content_before hook
			 *
			 * @hook slimline_entry_header - 10 (outputs the opening header tag for entry header)
			 * @hook slimline_entry_thumbnail - 20 (outputs post thumbnail)
			 * @hook slimline_entry_title - 30 (outputs entry title)
			 * @hook slimline_entry_meta - 40 (outputs post byline information)
			 * @hook slimline_entry_header_close - 50 (outputs the closing header tag for entry header)
			 */
			slimline_do_action( 'slimline_entry_content_before' );
		?>

		<?php if ( slimline_show_entry_excerpt() ) : ?>

			<div <?php slimline_class( 'entry-summary' ); ?> itemprop="description">

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

		<?php endif; // slimline_show_entry_excerpt() ?>

		<?php if ( slimline_show_entry_content() ) : ?>

			<div <?php slimline_class( 'entry-content' ); ?> itemprop="text">

				<?php the_content( slimline_the_content_more_text() ); ?>

			</div><!-- .entry-content -->

		<?php endif; // slimline_show_entry_content() ?>

		<?php
			/**
			 * slimline_entry_content_after hook
			 *
			 * @hook slimline_entry_footer - 10 (outputs the opening footer tag for entry footer)
			 * @hook slimline_entry_tags - 20 (outputs the post_tags, if any)
			 * @hook slimline_entry_author - 30 (gets author bio template part)
			 * @hook slimline_entry_pagination - 40 (gets nav-pagination-single template part on single posts)
			 * @hook slimline_entry_footer_close - 50 (outputs the closing footer tag for entry footer)
			 * @hook slimline_entry_comments - 60 (gets comments.php template on single posts)
			 */
			slimline_do_action( 'slimline_entry_content_after' );
		?>

	</article>

