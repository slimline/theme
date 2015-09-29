<?php
/**
 * Singular Post Template
 *
 * This template is used for displaying all pages, single posts and attachments when
 * nothing more specific matches the query (e.g., it puts together a page when no
 * page.php file exists, a single post when no single.php file exists, etc.).
 *
 * Note that this is a new template file introduced in WordPress 4.3.
 *
 * @package Slimline / Theme
 * @see     https://core.trac.wordpress.org/ticket/22314 Discussion of adding
 *          singular.php to the WordPress template hierarchy.
 * @since 0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Load the header.php file
 *
 * @see https://developer.wordpress.org/reference/functions/get_header/ Documentation
 *      of the get_header function
 */
get_header();
?>

	<?php
		/**
		 * Begin the WordPress Loop
		 *
		 * "The Loop" is the default mechanism WordPress uses for outputting posts
		 * through a theme’s template files. Within the Loop, WordPress retrieves
		 * each post to be displayed on the current page and formats it according to
		 * your theme's instructions.
		 *
		 * We use a full loop even on singular posts because certain functions (e.g.
		 * the_title, the_content, the_excerpt, etc.) do not function properly
		 * outside of the loop. However, we do not have to use `if ( have_posts() )`
		 * here since a false value will automatically serve 404.php.
		 *
		 * @see https://developer.wordpress.org/themes/basics/the-loop/
		 */
		while ( have_posts() ) : the_post();
	?>

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
			 * Load the specific template for the post format if one exists.
			 * Otherwise defaults to a more generic template. We are using
			 * `slimline_get_template_part()` instead of `get_template_part()` to
			 * expand the range of possible template matches.
			 *
			 * Template hierarchy for content files is:
			 * content-{post_type}-singular-{post_format}.php
			 * content-{post_type}-singular.php
			 * content-{post_type}-{post_format}.php
			 * content-{post_type}.php
			 * content-singular-{post_format}.php
			 * content-singular.php
			 * content-{post_format}.php
			 * content.php
			 *
			 * @see https://github.com/slimline/theme/wiki/slimline_get_template_part
			 */
			slimline_get_template_part( 'content', get_post_type(), 'singular', get_post_format() );
		?>

		<?php
			/**
			 * slimline_entry_after hook
			 *
			 * @see https://github.com/slimline/theme/wiki/slimline_entry_after
			 */
			do_action( 'slimline_entry_after' );
		?>

	<?php
		/**
		 * End the loop
		 */
		endwhile; // while ( have_posts() )
	?>

<?php
/**
 * Load the footer.php file
 *
 * @see https://developer.wordpress.org/reference/functions/get_footer/
 *      Documentation of the get_footer function
 */
get_footer();