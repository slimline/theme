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
			do_action( 'slimline_entry_content_before' );
		?>

		<?php
			/**
			 * slimline_entry_content hook
			 *
			 * @hook slimline_entry_excerpt - 10 (gets excerpt template part)
			 * @hook slimline_entry_content - 20 (gets content template part)
			 */
			 do_action( 'slimline_entry_content' );
		?>

		<?php
			/**
			 * slimline_entry_content_after hook
			 *
			 * @hook slimline_entry_footer - 10 (outputs the opening footer tag for entry footer)
			 * @hook slimline_entry_tags - 20 (outputs the post_tags, if any)
			 * @hook slimline_entry_author - 30 (gets author bio template part)
			 * @hook slimline_entry_pagination - 40 (gets pagination-entry template part)
			 * @hook slimline_entry_footer_close - 50 (outputs the closing footer tag for entry footer)
			 * @hook slimline_entry_comments - 60 (gets comments.php template)
			 */
			do_action( 'slimline_entry_content_after' );
		?>

	</article><!-- .entry -->

