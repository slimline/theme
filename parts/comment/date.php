<?php
/**
 * Template for displaying the comment publish date
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<time datetime="<?php comment_time( DATE_ATOM ); ?>"><?php slimline_comment_time(); ?></time>

	<?php
		/**
		 * Get date information for the comment
		 *
		 * Only show this if we are using Schema.org markup
		 *
		 * @see slimline_use_schema_org()
		 */
		if ( slimline_use_schema_org() ) {

			/**
			 * date published
			 */
			get_template_part( trailingslashit( slimline_get_template_parts_directory() ) . 'comment/tag-datepublished' );

		} // if ( slimline_use_schema_org() )
	?>