<?php
/**
 * Description for not found entries
 *
 * Displays text content for when there are no posts matching the current query.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<div <?php slimline_not_found_description_attributes(); ?>>
		<?php
			/**
			 * Output a default description
			 *
			 * @see   https://github.com/slimline/theme/wiki/slimline_not_found_description()
			 * @since 0.3.0
			 */
			slimline_not_found_description();
		?>
	</div><!-- .not-found-description -->