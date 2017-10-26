<?php
/**
 * Blog Template File
 *
 * The blog template file is used in the Slimline theme as a slightly less generic
 * template meant for post archives normally associated with a blog (i.e., author.php,
 * category.php, date.php, home.php, tag.php and taxonomy-post_format.php). It is
 * slightly less specific than those and comes after them in the template hierarchy.
 *
 * @package Slimline\Theme
 * @since   0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<section <?php slimline_blog_attributes(); ?>>

		<?php
			/**
			 * Load the archive header
			 */
			get_template_part( 'parts/archive/header' );
		?>

		<?php
			/**
			 * Load the loop.php template part
			 *
			 * The loop.php template part contains our basic WordPress loop
			 */
			get_template_part( 'parts/blog/loop', slimline_get_archive_type() );
		?>

	</section><!-- #index -->