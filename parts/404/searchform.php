<?php
/**
 * 404 Search form
 *
 * Displays a search section 404 pages
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<section <?php slimline_404_search_attributes(); ?>>

		<h2 <?php slimline_404_search_title_attributes(); ?>>
			<?php slimline_404_search_title(); ?>
		</h2>

		<?php
			/**
			 * Get the search form.
			 *
			 * Will include the default searchform.php file.
			 *
			 * @see https://developer.wordpress.org/reference/functions/get_search_form/
			 *      Documentation of the `get_search_form` function
			 */
			get_search_form();
		?>

	</section><!-- #search404 -->