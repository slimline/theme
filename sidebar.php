<?php
/**
 * Primary Sidebar
 *
 * In the default Slimline theme, the primary sidebar is what most people think
 * of as a sidebar: a secondary content area floated to the left or right of the 
 * main content.
 *
 * @package Slimline
 * @subpackage Template
 */
?>
	<div <?php slimline_primary_sidebar_attributes(); ?>>

		<?php
			/**
			 * slimline_primary_sidebar_before hook
			 *
			 * Code that runs before sidebar content, regardless of whether or not the sidebar is active
			 */
			slimline_do_action( 'slimline_primary_sidebar_before' );
		?>

		<?php
			if ( is_active_sidebar( 'slimline_primary' ) ) {

				dynamic_sidebar( 'slimline_primary' );

			} else {

				/**
				 * slimline_primary_sidebar_content hook
				 *
				 * Ouputs default content if the registered sidebar is not active.
				 */
				slimline_do_action( 'slimline_primary_sidebar_content' );
			}
		?>

		<?php
			/**
			 * slimline_primary_sidebar_before hook
			 *
			 * Code that runs after sidebar content, regardless of whether or not the sidebar is active
			 */
			slimline_do_action( 'slimline_primary_sidebar_before' );
		?>

	</div>