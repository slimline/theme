<?php
/**
 * Customizer Functions
 *
 * Functions and filters for using the WordPress Customizer Manager.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

function slimline_customize_register( $wp_customizer ) {

	$customize = slimline_customizer();

	if ( isset( $customize['panel'] ) ) {
		foreach ( $customize['panel'] as $panel_id => $panel_options ) {
			$wp_customizer->add_panel( $panel_id, $panel_options );
		} // foreach ( $customize['panel'] as $panel_id => $panel_options )
	} // if ( isset( $customize['panel'] ) )

	if ( isset( $customize['section'] ) ) {
		foreach ( $customize['section'] as $section_id => $section_options ) {
			$wp_customizer->add_section( $section_id, $section_options );
		} // foreach ( $customize['section'] as $section_id => $section_options )
	} // if ( isset( $customize['section'] ) )

	if ( isset( $customize['setting'] ) ) {
		foreach ( $customize['setting'] as $setting_id => $setting_options ) {
			$wp_customizer->add_setting( $setting_id, $setting_options );
		} // foreach ( $customize['setting'] as $setting_id => $setting_options )
	} // if ( isset( $customize['setting'] ) )

	if ( isset( $customize['control'] ) ) {
		foreach ( $customize['control'] as $control_id => $control_options ) {
			$wp_customizer->add_control( $control_id, $control_options );
		} // foreach ( $customize['control'] as $control_id => $control_options )
	} // if ( isset( $customize['control'] ) )

}

function slimline_customizer_enqueue_scripts() {

	wp_enqueue_script( 'slimline-customizer', slimline_get_file_uri( 'js/customizer.js'), array( 'jquery' ), '0.1.0', true );
}