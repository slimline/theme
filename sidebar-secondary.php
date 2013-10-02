<?php
/**
 * Secondary Sidebar
 *
 * In the default Slimline theme, the secondary sidebar is a widget area in the 
 * footer, after the main content area and before the site-footer template part.
 *
 * @package Slimline
 * @subpackage Template
 */
?>
	<div <?php slimline_secondary_sidebar_attributes(); ?>>

		<?php
			/**
			 * slimline_secondary_sidebar_before hook
			 *
			 * Code that runs before sidebar content, regardless of whether or not the sidebar is active
			 */
			slimline_do_action( 'slimline_secondary_sidebar_before' );
		?>

		<?php
			if ( is_active_sidebar( 'slimline_secondary' ) ) {

				dynamic_sidebar( 'slimline_secondary' );

			} else {

				/**
				 * slimline_secondary_sidebar_content hook
				 *
				 * Ouputs default content if the registered sidebar is not active.
				 */
				slimline_do_action( 'slimline_secondary_sidebar_content' );
			}
		?>

		<?php
			/**
			 * slimline_secondary_sidebar_before hook
			 *
			 * Code that runs after sidebar content, regardless of whether or not the sidebar is active
			 */
			slimline_do_action( 'slimline_secondary_sidebar_before' );
		?>

	</div>