<?php
/**
 * WooCommerce Index Main Header
 *
 * Contains the <header> tag for the shop page, category and tag archives, etc.
 *
 * @package    Slimline / Theme
 * @subpackage WooCommerce
 * @see        http://docs.woothemes.com/document/template-structure/
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<header class="main-header index-header">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 <?php slimline_index_title_attributes( array( 'class' => 'page-title' ) ); ?>>
				<?php
					/**
					 * Output a title based on what page we are on
					 *
					 * @link  https://docs.woothemes.com/wc-apidocs/function-woocommerce_page_title.html
					 *        Description of `woocommerce_page_title` function
					 */
					woocommerce_page_title();
				?>
			</h1><!-- .index-title -->

		<?php endif; // if ( apply_filters( 'woocommerce_show_page_title', true ) ) ?>

		<div <?php slimline_index_description_attributes(); ?>>
			<?php
				/**
				 * woocommerce_archive_description hook.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
			?>
		</div><!-- .index-description -->

	</header><!-- .index-header -->