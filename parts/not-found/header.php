<?php
/**
 * Title for not found entries
 *
 * Displays the heading tag for when there are no posts matching the current query.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<h2 <?php slimline_not_found_title_attributes(); ?>>
		<?php
			/**
			 * Output a default title
			 *
			 * @see   https://github.com/slimline/theme/wiki/slimline_not_found_title()
			 * @since 0.3.0
			 */
			slimline_not_found_title();
		?>
	</h2><!-- .not-found-title -->