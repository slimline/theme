<?php
/**
 * Excerpt/Summary
 *
 * @package    Slimline\Theme
 * @subpackage TemplateParts\Entry
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<div class="entry-summary" itemprop="description">
		<?php
			/**
			 * Output the post excerpt
			 *
			 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
			 *       Documentation of the `the_excerpt` function
			 */
			the_excerpt(); ?>
		?>
	</div><!-- .entry-summary -->
