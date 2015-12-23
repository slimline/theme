<?php
/**
 * 404 Recent Posts
 *
 * Displays a list of the recent blog posts on the 404 page.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

$recent = slimline_404_recent_posts();
?>

	<?php if ( $recent->have_posts() ) : ?>

		<section <?php slimline_404_entries_attributes(); ?>>

			<?php
				/**
				 * slimline_404_entries_before hook
				 *
				 * @hook slimline_404_get_entries_title - 10 (get 404/title-entries.php template part)
				 * @see  https://github.com/slimline/theme/wiki/slimline_404_entries_before
				 */
				do_action( 'slimline_404_entries_before' );
			?>

			<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>

				<?php
					/**
					 * slimline_entry_before hook
					 *
					 * @see https://github.com/slimline/theme/wiki/slimline_entry_before
					 */
					do_action( 'slimline_entry_before' );
				?>

				<?php
					/**
					 * Load the specific template for the post format if one
					 * exists. Otherwise defaults to a more generic template. We
					 * are using slimline_get_template_part() instead of
					 * get_template_part() to expand the range of possible
					 * template matches.
					 *
					 * Template hierarchy for content files is:
					 * content-{post_type}-{post_format}.php
					 * content-{post_type}.php
					 * content-{post_format}.php
					 * content.php
					 *
					 * @see https://github.com/slimline/theme/wiki/slimline_get_template_part
					 */
					slimline_get_template_part( 'content', get_post_type(), get_post_format() );
				?>

				<?php
					/**
					 * slimline_entry_after hook
					 *
					 * @see https://github.com/slimline/theme/wiki/slimline_entry_after
					 */
					do_action( 'slimline_entry_after' );
				?>

			<?php endwhile; // while ( have_posts() ) ?>

			<?php
				/**
				 * slimline_404_entries_after hook
				 *
				 * @hook wp_reset_query - 10 (reset $wp_query object)
				 * @see  https://github.com/slimline/theme/wiki/slimline_404_entries_after
				 */
				do_action( 'slimline_404_entries_after' );
			?>

		</section><!-- #entries -->

	<?php endif; // if ( $recent->have_posts() ) ?>