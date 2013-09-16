<?php
/**
 * Standard Loop
 *
 * Loop for displaying posts with standard (or no) post format on home, archive
 * and search pages. Will also show for single posts, but this can be overridden in
 * child themes by including a content-single template.
 *
 * @package Slimline
 * @subpackage Template
 * @see http://codex.wordpress.org/Loop_Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
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

						<?php the_content(); ?>

					</div><!-- .entry-content -->

				<?php endif; // slimline_show_entry_content() ?>

				<?php
					/**
					 * slimline_entry_content_after hook
					 *
					 * 
					 */
					slimline_do_action( 'slimline_entry_content_after' );
				?>

			</article>

