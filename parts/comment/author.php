<?php
/**
 * Template for displaying the comment author name
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<h4>
		<?php
			comment_author();
		?>
	</h4><!-- .comment-author -->