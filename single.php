<?php
/**
 * Single Post Template
 *
 * Displays single posts. Child themes can include different formatting options for
 * different post types and formats by creating specific content files.
 *
 * Note that Slimline does not add post format support by default. Child theme creators
 * will need to add this themselves in order to make use of the formatting options.
 * {@see http://codex.wordpress.org/Post_Formats Post Formats}
 *
 * @package Slimline
 * @subpackage Template
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

get_header(); // load the header.php template.
?>

	<?php if ( have_posts() ) : ?>

		<?php
			/**
			 * slimline_single_before hook
			 */
			slimline_do_action( 'slimline_single_before' );
		?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/**
				 * Load the specific template for the post format if one exists. Otherwise
				 * defaults to a more generic template. We are using slimline_get_template_part()
				 * instead of get_template_part() to expand the range of possible template matches.
				 * 
				 * Template hierarchy for content files is:
				 * content-{post_type}-single-{post_format}.php
				 * content-{post_type}-single.php
				 * content-{post_type}-{post_format}.php
				 * content-{post_type}.php
				 * content-single-{post_format}.php
				 * content-single.php
				 * content-{post_format}.php
				 * content.php
				 */
				slimline_get_template_part( 'content', get_post_type(), 'single', get_post_format(), get_the_ID() );
			?>

		<?php endwhile; // have_posts() ?>

		<?php
			/**
			 * slimline_single_after hook
			 */
			slimline_do_action( 'slimline_single_after' );
		?>

	<?php
		else: // have_posts()
			get_template_part( 'content', 'none' ); // load content-none.php (not found) template
	?>

	<?php endif; // have_posts() ?>

<?php get_footer(); // load the footer.php template. @see http://codex.wordpress.org/Function_Reference/get_footer ?>