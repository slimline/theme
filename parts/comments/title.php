<?php
/**
 * Title for comments section
 *
 * Displays the heading tag for the comments <section>
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<h2 id="comments-title">
		<?php
			/**
			 * Output <section> title
			 *
			 * @see   https://github.com/slimline/theme/wiki/slimline_comments_title()
			 * @since 0.3.0
			 */
			slimline_comments_title();
		?>
	</h2><!-- #comments-title -->