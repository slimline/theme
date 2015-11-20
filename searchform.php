<?php
/**
 * Default search form
 *
 * The primary sidebar is a (probably) vertical column floated to the left or right
 * of the main content containing secondary or related information.
 *
 * @package Slimline / Theme
 * @see     https://codex.wordpress.org/Function_Reference/get_search_form
 * @since   0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<form <?php slimline_search_form_attributes(); ?>>

		<div class="row collapse">

			<div class="small-9 columns">
				<input class="search-field" name="s" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'slimline' ) ?>" title="<?php echo esc_attr_x( 'Search for:', 'label', 'slimline' ) ?>" type="search" value="<?php the_search_query() ?>" />
			</div><!-- .columns -->

			<div class="small-3 columns">
				<input class="search-submit button postfix" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'slimline' ) ?>" />
			</div><!-- .columns -->

		</div><!-- .row -->

	</form><!-- .search-form -->