<?php
/**
 * Settings Functions
 *
 * Functions for registering, displaying and sanitizing theme options.
 *
 * @package Slimline
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

 /**
 * slimline_add_settings_field function
 *
 * Helper function for adding a settings field to the Slimline theme options page.
 * Handles adding the field, registering the display function and setting up a 
 * sanitization filter.
 *
 * @param string $option_name (Required). Option name. Will be sanitized for use as an option key.
 * @param string $label Text for the form field label. Defaults to the option name, capitalized.
 * @param string $type The type of data this option is meant to hold.
 * @param string $description If set, this text will appear directly below the form field.
 * @param array $args Additional arguments to pass to the settings field callback function. See the appropriate callback function for a description of the arguments available.
 * @param string $section Which section / tab the setting should appear on (if tabs are active). Defaults to "General"
 * @since 0.1.0
 */
function slimline_add_settings_field( $option_name, $title = '', $type = 'default', $description = false, $value = '', $section = 'general' ) {

	$title = ( isset( $title ) ? $title : ucwords( $option_name ) );
	$option_name = sanitize_key( $option_name );
	$section = sanitize_key( "slimline_settings_section_{$section}" );

	$settings_field_callback = apply_filters( 'slimline_settings_field_callback', "slimline_settings_field_{$type}", $type, $args, $option_name );
	$settings_field_callback = apply_filters( "slimline_settings_field_callback-{$option_name}", $settings_field_callback, $type, $args );
	$settings_sanitization_callback = apply_filters( 'slimline_settings_sanitization_callback', "slimline_settings_sanitization_{$type}", $type, $args, $option_name );
	$settings_sanitization_callback = apply_filters( "slimline_settings_sanitization_callback-{$option_name}", $settings_sanitization_callback, $type, $args );

	$args = array_merge(
		$args,
		array(
			'class'       => slimline_get_class( $option_name ),
			'description' => _x( $description, 'option description', 'slimline' ),
			'id'          => "slimline_option_{$option_name}",
			'label_for'   => _x( $title, 'option label', 'slimline' ),
			'name'        => $option_name,
			'type'        => $type
		)
	);

	add_settings_field( $id, __( $title, 'slimline' ), $settings_field_callback, $page, $section, $args );
	add_filter( "slimline_sanitize_option-{$option_name}", $settings_sanitization_callback );
}

/**
 * slimline_settings_field_callback_check filter
 *
 * Checks if the named callback function exists and returns a default callback if not.
 *
 * @param string $callback The name of the callback function to check.
 * @return string Either the named callback function if it exists or the default callback if not.
 * @since 0.1.0
 */
function slimline_settings_field_callback_check( $callback ) {

	return ( function_exists( $callback ) ? $callback : 'slimline_settings_field_default' );
}

/**
 * slimline_settings_field_default function
 *
 * Outputs a form input field for the given option. Developers can modify the generated 
 * markup using the `slimline_settings_field_default` and 
 * `slimline_settings_field_default-{$args['name']}` filters.
 *
 * @param array $args Args passed through the add_settings_field function
 * @since 0.1.0
 */
function slimline_settings_field_default( $args ) {

	$html_args = array(
		'class' => slimline_get_class( "slimline-option-{$args[ 'type' ]}" ),
		'id'    => $args[ 'id' ],
		'name'  => $args[ 'name' ],
		'type'  => $args[ 'type' ],
		'value' => esc_attr( slimline_get_option( $args[ 'name' ] ) )
	);

	$input_field = slimline_get_html_tag( 'input', $html_args, true );
	$input_field .= ( $args[ 'description' ] ? "<span class='description'>{$args[ 'description' ]}</span>" : '' );
	$input_field = apply_filters( 'slimline_settings_field_default', $input_field, $args );
	$input_field = apply_filters( "slimline_settings_field_default-{$args['name']}", $input_field, $args );

	echo $input_field;
}

/**
 * slimline_settings_field_textarea function
 *
 * Outputs a textarea form field for the given option. Developers can modify the generated 
 * markup using the `slimline_settings_field_textarea` and 
 * `slimline_settings_field_textarea-{$args['name']}` filters.
 *
 * @param array $args Args passed through the add_settings_field function
 * @since 0.1.0
 */
function slimline_settings_field_textarea( $args ) {

	$html_args = array(
		'class' => slimline_get_class( 'slimline-option-textarea' ),
		'id'    => $args[ 'id' ],
		'name'  => $args[ 'name' ]
	);

	$textarea = slimline_get_html_tag( 'textarea', $html_args, false );
	$textarea .= esc_textarea( slimline_get_option( $args[ 'name' ] ) );
	$textarea .= slimline_get_html_tag_close( 'textarea', ( $args[ 'description' ] ? "<span class='description'>{$args[ 'description' ]}</span>" : '' ) . '<!-- .slimline-option-textarea -->' );
	$textarea = apply_filters( 'slimline_settings_field_textarea', $textarea, $args );
	$textarea = apply_filters( "slimline_settings_field_textarea-{$args['name']}", $textarea, $args );

	echo $textarea;
}

/**
 * slimline_settings_sanitization_callback_check filter
 *
 * Checks if the named callback function exists and returns a default callback if not.
 *
 * @param string $callback The name of the callback function to check.
 * @return string Either the named callback function if it exists or the default callback if not.
 * @since 0.1.0
 */
function slimline_settings_sanitization_callback_check( $callback ) {

	return ( function_exists( $callback ) ? $callback : 'slimline_settings_sanitization_default' );
}

/**
 * slimline_settings_sanitization_default function
 *
 * Filters an option value before it is saved. Developers can add any number of sanitization functions
 * using the `slimline_settings_sanitization_default` filter.
 *
 * @param mixed $value The option value to filter
 * @return mixed $value Option value after filtering
 * @since 0.1.0
 */
function slimline_settings_sanitization_default( $value ) {

	return apply_filters( 'slimline_settings_sanitization_default', $value );
}