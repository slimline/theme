<?php
/**
 * Wrapper Template
 *
 * The wrapper template forms the base for all other template pages. Thanks to
 * Roots.io for the idea.
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

/**
 * Load the header/header.php template part
 *
 * The header.php template part contains the primary <header> tag for the site.
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *       Documentation of the `get_template_part` function
 */
get_template_part( 'parts/header' );
?>

	<div <?php slimline_wrapper_attributes(); ?>>

		<?php
			/**
			 * Load the main.php template part
			 *
			 * The main.php template part contains the <main> tag for the site and
			 * loads the primary template (ex. single.php, index.php)
			 *
			 * @link https://developer.wordpress.org/reference/functions/get_template_part/
			 *       Documentation of the `get_template_part` function
			 */
			get_template_part( 'parts/main' );
		?>

		<?php
			/**
			 * Load the sidebar.php file
			 *
			 * @link https://developer.wordpress.org/reference/functions/get_sidebar/
			 *       Documentation of the `get_sidebar` function
			 */
			get_sidebar();
		?>

	</div><!-- #wrapper -->

<?php
/**
 * Load the footer/footer.php template part
 *
 * The footer.php template part contains the primary <footer> tag for the site.
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *       Documentation of the `get_template_part` function
 */
get_template_part( 'parts/footer' );

/**
 * Load the footer.php file
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *       Documentation of the `get_footer` function
 */
get_footer();