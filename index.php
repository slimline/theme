<?php
/**
 * Index Template
 *
 * The index file is the most basic WordPress template, and is one of two files that
 * is required in all templates (the other being style.css). It is used in the
 * Slimline framework in place of home.php, for displaying post archives and as a
 * fallback for other post types when no other appropriate template can be found.
 *
 * @package Slimline
 * @subpackage Template
 * @see http://codex.wordpress.org/Template_Hierarchy
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

get_header(); // load the header.php template. @see http://codex.wordpress.org/Function_Reference/get_header
?>

	<?php if ( have_posts() ) : ?>

		<?php
			/**
			 * slimline_index_before hook
			 *
			 * @hook slimline_index_wrapper - 10 (outputs opening div for the index wrapper)
			 * @hook slimline_get_blog_header - 20 (gets the blog-header template part)
			 * @hook slimline_items_wrapper - 30 (outputs opening div for the items wrapper)
			 */
			slimline_do_action( 'slimline_index_before' );
		?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/**
					 * Load the specific template for the post format if one exists. Otherwise
					 * defaults to a more generic template. We are using slimline_get_template_part()
					 * instead of get_template_part() to expand the range of possible template matches.
					 * 
					 * Template hierarchy for content files is:
					 * content-{post_type}-{post_format}.php
					 * content-{post_type}.php
					 * content-{post_format}.php
					 * content.php
					 */
					slimline_get_template_part( 'content', get_post_type(), get_post_format() );
				?>

			<?php endwhile; // have_posts() ?>

		<?php
			/**
			 * slimline_index_after hook
			 *
			 * @hook slimline_items_wrapper_close - 10 (outputs the closing div for the items wrapper)
			 * @hook slimline_get_index_pagination - 20 (gets pagination-index template part)
			 * @hook slimline_index_wrapper_close - 30 (outputs the closing div for the index wrapper)
			 */
			slimline_do_action( 'slimline_index_after' );
		?>

	<?php
		else: // have_posts()
			get_template_part( 'content', 'none' ); // load content-none.php (not found) template
	?>

	<?php endif; // have_posts() ?>

<?php get_footer(); // load the footer.php template. @see http://codex.wordpress.org/Function_Reference/get_footer ?>