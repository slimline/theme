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

	<div <?php slimline_wrapper_attributes(); ?>>

		<?php
			/**
			 * Load the main.php template part
			 *
			 * The main.php template part contains the <main> tag for the site and
			 * loads the primary template (ex. single.php, index.php)
			 */
			get_template_part( 'parts/main' );
		?>

	</div><!-- #wrapper -->

<?php
/**
 * Load the footer.php file
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *       Documentation of the `get_footer` function
 */
get_footer();