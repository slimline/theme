<?php
/**
 * The template for displaying product content within loops
 *
 * NOTE: this template is a copy of the corresponding WooCommerce template as of
 * WooCommerce 2.5.2 (template v. 2.5.0), with the following changes:
 * 1) products are wrapped with <article> tags nested inside the <li> tags
 * 2) `post_class` has been moved to the <article> tag
 * 3) additional attributes output through `slimline_entry_attributes`
 *
 * @package    Slimline / Theme
 * @subpackage WooCommerce
 * @see        http://docs.woothemes.com/document/template-structure/
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * @global WC_Product $product The current product
 */
global $product;

/**
 * @global array $woocommerce_loop Associative array with loop information
 */
global $woocommerce_loop;

/**
 * Store loop count we're currently on.
 */
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
} // if ( empty( $woocommerce_loop['loop'] ) )

/**
 * Store column count for displaying the grid.
 */
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
} // if ( empty( $woocommerce_loop['columns'] ) )

/**
 * Ensure visibility
 */
if ( ! $product || ! $product->is_visible() ) {
	return;
} // if ( ! $product || ! $product->is_visible() )

/**
 * Increase loop count.
 */
$woocommerce_loop['loop']++;

/**
 * Extra post classes
 */
$classes = array();

if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
} // if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] )

if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
} // if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
?>
<li>
	<article <?php post_class( $classes ); ?> <?php slimline_entry_attributes(); ?>>
		<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );

			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</article><!-- .product -->
</li>