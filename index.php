<?php
/**
 * Main Template File
 *
 * This is the most generic template file in a WordPress theme and one of the two
 * required files for a theme (the other being style.css). It is used to display a
 * page when nothing more specific matches a query (e.g., it puts together the home
 * page when no home.php file exists.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Slimline / Theme
 * @see     http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Load the header.php file
 *
 * @see https://developer.wordpress.org/reference/functions/get_header/ Documentation
 *      of the `get_header` function
 */
get_header();
?>

	<article <?php slimline_index_attributes(); ?>>

		<?php
			/**
			 * slimline_content_top hook
			 *
			 * @hook slimline_get_index_header - 10 (gets index/header.php template part)
			 * @see  https://github.com/slimline/theme/wiki/slimline_content_top
			 */
			do_action( 'slimline_content_top' );
		?>

		<?php
			/**
			 * Begin the WordPress Loop
			 *
			 * "The Loop" is the default mechanism WordPress uses for outputting posts
			 * through a theme's template files. Within the Loop, WordPress retrieves
			 * each post to be displayed on the current page and formats it according to
			 * your theme's instructions.
			 *
			 * @see https://developer.wordpress.org/themes/basics/the-loop/
			 */
			if ( have_posts() ) :
		?>

			<section <?php slimline_entries_attributes(); ?>>

				<?php
					/**
					 * slimline_entries_before hook
					 *
					 * @hook slimline_get_entries_title - 10 (get index/title-entries.php template part)
					 * @see  https://github.com/slimline/theme/wiki/slimline_entries_before
					 */
					do_action( 'slimline_entries_before' );
				?>

				<?php while ( have_posts() ) : the_post(); ?>

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
						 * are using `slimline_get_template_part()` instead of
						 * `get_template_part()` to expand the range of possible
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
						 * slimline_content_after hook
						 *
						 * @see https://github.com/slimline/theme/wiki/slimline_content_after
						 */
						do_action( 'slimline_entry_after' );
					?>

				<?php endwhile; // while ( have_posts() ) ?>

				<?php
					/**
					 * slimline_entries_after hook
					 *
					 * @see  https://github.com/slimline/theme/wiki/slimline_entries_after
					 */
					do_action( 'slimline_entries_after' );
				?>

			</section><!-- #entries -->

		<?php else : // if ( have_posts() ) ?>

			<?php
				/**
				 * Get the content-none.php template part
				 *
				 * The content-none.php file shows when the queried index is empty.
				 *
				 * @see https://developer.wordpress.org/reference/functions/get_template_part/
				 *      Documentation of the `get_template_part` function
				 */
				get_template_part( 'parts/content', 'none' );
			?>

		<?php
			/**
			 * End the Loop
			 */
			endif; // if ( have_posts() )
		?>

		<?php
			/**
			 * slimline_content_bottom hook
			 *
			 * @hook slimline_get_index_pagination - 10 (gets index/pagination.php template part)
			 * @see https://github.com/slimline/theme/wiki/slimline_content_bottom
			 */
			do_action( 'slimline_content_bottom' );
		?>

	</article><!-- #index -->

<?php
/**
 * Load the footer.php file
 *
 * @see https://developer.wordpress.org/reference/functions/get_footer/
 *      Documentation of the `get_footer` function
 */
get_footer();