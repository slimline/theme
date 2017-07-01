<?php
/**
 * Site Branding
 *
 * Contains the site logo and/or site title
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )

?>

		<div id="branding">

			<?php
				/**
				 * Check if a custom logo has been set
				 *
				 * @link https://developer.wordpress.org/reference/functions/has_custom_logo/
				 *       Documentation of the `has_custom_logo` function
				 */
				if ( has_custom_logo() ) {

					/**
					 * Output custom logo
					 *
					 * @link https://developer.wordpress.org/reference/functions/the_custom_logo/
					 *       Documentation of the `the_custom_logo` function
					 */
					the_custom_logo();

				} else { // if ( has_custom_logo() )

					/**
					 *
					 */
					slimline_get_site_title();

				} // if ( has_custom_logo() )
			?>

		</div><!-- #branding -->

