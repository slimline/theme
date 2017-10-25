<?php
/**
 * Header for index page
 *
 * @package    Slimline/Theme
 * @subpackage Template Parts/Index
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<header>

		<h1 class="archive-title <?php slimline_archive_type(); ?>-title" itemprop="name">
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

		<div class="archive-description <?php slimline_archive_type(); ?>-description" itemprop="description">
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