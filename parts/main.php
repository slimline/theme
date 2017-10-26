<?php
/**
 * Main content area
 *
 * Contains the site <main> tag
 *
 * @package    Slimline\Theme
 * @subpackage TemplateParts
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

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
