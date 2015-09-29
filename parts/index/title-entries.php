<?php
/**
 * Title for entries on index pages
 *
 * Contains the <h2> subtitle for recent posts.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<h2 <?php slimline_entries_title_attributes(); ?>>
		<?php
			/**
			 * Output a default title
			 *
			 * @see   https://github.com/slimline/theme/wiki/slimline_entries_title()
			 * @since 0.3.0
			 */
			slimline_entries_title();
		?>
	</h2><!-- .entries-title -->