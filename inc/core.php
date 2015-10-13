<?php
/**
 * Core Theme Configuration
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Create primary widget areas
 *
 * @link  https://developer.wordpress.org/reference/functions/register_sidebar/
 *        Description of `register_sidebar` function
 * @link  https://github.com/slimline/theme/wiki/slimline_register_sidebars()
 * @since 0.2.0
 */
if ( ! function_exists( 'slimline_register_sidebars' ) ) {

	function slimline_register_sidebars() {

		register_sidebar(
			array(
				'name'          => _x( 'Primary Sidebar', 'sidebar name', 'slimline' ),   // Label as "Primary Sidebar" in Appearance > Widgets
				'id'            => 'sidebar-1',                                           // Matches primary sidebar in Twenty X themes
				'description'   => __( 'Appears next to the site content.', 'slimline' ), // Description shows when widget area is open in Appearance > Widgets
				'before_title'  => '<h2 class="widget-title widgettitle">',               // Use both widget-title and widgettitle for compatability with default styles
				'after_title'   => '</h2><!-- .widget-title -->',                         // Add closing comment
				'before_widget' => '<div class="widget %2$s" id="%1$s">',                 // Alphabetize attributes, use <div> instead of <li>
				'after_widget'  => '</div><!-- .widget -->',                              // Add closing comment, use <div> instead of <li>
			)
		);

	}
		register_sidebar(
			array(
				'name'          => _x( 'Footer Widget Area', 'sidebar name', 'slimline' ),         // Label as "Footer Widget Area" in Appearance > Widgets
				'id'            => 'sidebar-3',                                                    // Matches footer sidebar in Twenty Fourteen+
				'description'   => __( 'Appears in the footer section of the site.', 'slimline' ), // Description shows when widget area is open in Appearance > Widgets
				'before_title'  => '<h2 class="widget-title widgettitle">',                        // Use both widget-title and widgettitle for compatability with default styles
				'after_title'   => '</h2><!-- .widget-title -->',                                  // Add closing comment
				'before_widget' => '<li class="widget %2$s" id="%1$s">',                           // Alphabetize attributes
				'after_widget'  => '</li><!-- .widget -->',                                        // Add closing comment
			)
		);

	}

} // if ( ! function_exists( 'slimline_register_sidebars' ) )
