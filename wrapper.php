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
?>

		<?php
			/**
			 * Load the header/header.php template part
			 *
			 * The header.php template part contains the main <header> tag for the site.
			 *
			 * @link https://github.com/slimline/theme/wiki/slimline_get_header()
			 */
			slimline_get_header();
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

			<?php
				/**
				 * Conditionally load the sidebar
				 *
				 * @link https://github.com/slimline/theme/wiki/slimline_show_sidebar()
				 */
				if ( slimline_show_sidebar() ) :
			?>

				<aside <?php slimline_sidebar_attributes(); ?>>
					<?php
						/**
						 * Load the sidebar.php file
						 *
						 * @link https://developer.wordpress.org/reference/functions/get_sidebar/
						 *       Documentation of the `get_sidebar` function
						 */
						get_sidebar();
					?>
				</aside><!-- #sidebar -->

			<?php endif; // if ( slimline_show_sidebar() ) ?>

		</div><!-- .document -->

		<?php
			/**
			 * Load the footer/footer.php template part
			 *
			 * The footer.php template part contains the main <footer> tag for the site.
			 *
			 * @link https://github.com/slimline/theme/wiki/slimline_get_footer()
			 */
			slimline_get_footer();
		?>

<?php
/**
 * Load the footer.php file
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *       Documentation of the `get_footer` function
 */
get_footer();