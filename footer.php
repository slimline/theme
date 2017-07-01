<?php
/**
 * Footer File
 *
 * The footer contains contains the closing </body> tag. It also fires the `wp_footer`
 * function.
 *
 * @package Slimline / Theme
 * @link    http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 *          WordPress Theme Development guidelines for footer.php
 * @since   0.1.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )

?>

		<?php
			/**
			 * Fire the `wp_footer` action
			 *
			 * @link https://developer.wordpress.org/reference/functions/wp_footer/
			 *       Documentation of the `wp_footer` function
			 * @link https://developer.wordpress.org/reference/hooks/wp_footer/
			 *       Documentation of the `wp_footer` action
			 */
			wp_footer();
		?>

	</body>
</html>