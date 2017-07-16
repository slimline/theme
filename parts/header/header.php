<?php
/**
 * Site Header
 *
 * Contains the site <header> tag
 *
 * @package    Slimline\Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )

?>

	<header <?php slimline_header_attributes(); ?>>

		<?php
			/**
			 * Get site logo and/or title
			 *
			 * @link https://developer.wordpress.org/reference/functions/get_template_part/
			 *       Documentation of the `get_template_part` function
			 */
			get_template_part( 'parts/header/branding' );
		?>

		<?php
			/**
			 * Get primary site navigation
			 *
			 * @link https://developer.wordpress.org/reference/functions/get_template_part/
			 *       Documentation of the `get_template_part` function
			 */
			get_template_part( 'parts/header/navigation' );
		?>

	</header><!-- #site-header -->