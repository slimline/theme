<?php
/**
 * Site Logo
 *
 * Contains the logo for the site
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @link       https://developer.wordpress.org/themes/advanced-topics/ui-best-practices/#logo-homepage-link
 *             Homepage link best practices
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Check if the site has a logo set
 *
 * @see slimline_has_logo()
 */
if ( slimline_has_logo() ) :
?>

	<?php
		/**
		 * Output the logo wrapped in an anchor tag
		 *
		 * @see slimline_the_logo()
		 */
		slimline_logo();
	?>

<?php
	/**
	 * Otherwise output the site title wrapped in an anchor tag
	 *
	 * @see  slimline_site_link_attributes()
	 * @link https://developer.wordpress.org/reference/functions/bloginfo/
	 */
	else : // if ( slimline_has_logo() )
?>

	<a <?php slimline_site_title_link_attributes(); ?>><?php bloginfo( 'name' ); ?></a>

<?php endif; // if ( slimline_has_logo() ) ?>