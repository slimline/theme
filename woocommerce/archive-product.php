<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @package    Slimline / Theme
 * @subpackage WooCommerce
 * @see        http://docs.woothemes.com/document/template-structure/
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Load the header-shop.php file
 *
 * @see https://developer.wordpress.org/reference/functions/get_header/ Documentation
 *      of the `get_header` function
 */
get_header( 'shop' );
?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php
			/**
			 * Get the page header template part
			 *
			 * The header contains the page title and archive description
			 *
			 * @link https://docs.woothemes.com/wc-apidocs/function-wc_get_template_part.html
			 *       Description of the `wc_get_template_part` function
			 */
			wc_get_template_part( 'archive/header' );
		?>

		<?php if ( have_posts() ) : ?>

			<section <?php slimline_entries_attributes(); ?>>

				<?php
					/**
					 * woocommerce_before_shop_loop hook.
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php
					/**
					 * woocommerce_after_shop_loop hook.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>

			</section><!-- #entries -->

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hook woocommerce_get_sidebar - 10 (note this is disabled by default in Slimline)
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php
/**
 * Load the footer-shop.php file
 *
 * @see https://developer.wordpress.org/reference/functions/get_footer/
 *      Documentation of the `get_footer` function
 */
get_footer( 'shop' );