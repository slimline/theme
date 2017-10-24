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

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<section <?php slimline_archive_attributes(); ?>>

		<header>

			<h1 class="archive-title" itemprop="name">
				<?php
					/**
					 * Output the archive title
					 *
					 * @link https://developer.wordpress.org/reference/functions/the_archive_title/
					 *       Documentation of the `the_archive_title` function
					 */
					the_archive_title();
				?>
			</h1><!-- .archive-title -->

			<div class="archive-description" itemprop="description">
				<?php
					/**
					 * Output the archive description
					 *
					 * @link https://developer.wordpress.org/reference/functions/the_archive_description/
					 *       Documentation of the `the_archive_description` function
					 */
					the_archive_description();
				?>
			</div><!-- .archive-description -->

		</header>

		<?php
			/**
			 * Load the loop template part
			 */
			get_template_part( 'parts/loop', slimline_get_archive_type() );
		?>

	</section><!-- #index -->