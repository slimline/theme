<?php
/**
 * Blank Wrapper Template
 *
 * Essentially an empty page meant to used with page builder plugins or other
 * shortcodes.
 *
 * @package Slimline\Theme
 * @see     https://roots.io/sage/docs/theme-wrapper/
 *          Description of theme wrappers
 * @since   0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )

/**
 * Load the header.php file
 *
 * @link https://developer.wordpress.org/reference/functions/get_header/
 *       Documentation of the `get_header` function
 */
get_header();
?>

		<div <?php slimline_document_attributes(); ?>>

			<main <?php slimline_main_attributes(); ?>>
				<?php
					/**
					 * Load the primary theme template (ex. single.php, index.php)
					 *
					 * @link https://github.com/slimline/theme/wiki/slimline_get_primary_template()
					 */
					slimline_get_primary_template();
				?>
			</main>

		</div><!-- .document -->

<?php
/**
 * Load the footer.php file
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *       Documentation of the `get_footer` function
 */
get_footer();