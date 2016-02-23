<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * NOTE: this template is a copy of the corresponding WooCommerce template as of
 * WooCommerce 2.5.2 (template v. 2.5.2), with the following changes:
 * 1) product categories are wrapped with <article> tags nested inside the <li> tags
 * 2) `wc_product_cat_class` has been moved to the <article> tag
 * 3) additional attributes output through `slimline_woocommerce_product_cat_attributes`
 *
 * @package    Slimline / Theme
 * @subpackage WooCommerce
 * @see        http://docs.woothemes.com/document/template-structure/
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on.
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid.
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Increase loop count.
$woocommerce_loop['loop']++;
?>
<li>
	<article <?php wc_product_cat_class( '', $category ); ?> <?php slimline_woocommerce_product_cat_attributes( array(), $category ); ?>>
		<?php
			/**
			 * woocommerce_before_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_open - 10
			 */
			do_action( 'woocommerce_before_subcategory', $category );

			/**
			 * woocommerce_before_subcategory_title hook.
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );

			/**
			 * woocommerce_shop_loop_subcategory_title hook.
			 *
			 * @hooked woocommerce_template_loop_category_title - 10
			 */
			do_action( 'woocommerce_shop_loop_subcategory_title', $category );

			/**
			 * woocommerce_after_subcategory_title hook.
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );

			/**
			 * woocommerce_after_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_close - 10
			 */
			do_action( 'woocommerce_after_subcategory', $category );
		?>
	</article><!-- .product-category -->
</li>