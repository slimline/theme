<?php
/**
 * Settings Functions
 *
 * Functions for registering, displaying and sanitizing theme options.
 *
 * @package Slimline
 * @subpackage Admin
 */

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
 * @param string|array $value For selects, radios or checkboxes, this is the value of the input field(s) (if not a boolean). If passed an array, the keys will be used as option labels.
 * @param string $section Which section / tab the setting should appear on (if tabs are active). Defaults to "General"
 * @since 0.1.0
 */
function slimline_add_settings_field( $option_name, $title = '', $type = 'default', $description = false, $value = '', $section = 'general' ) {

	$title = ( isset( $title ) ? $title : ucwords( $option_name ) );
	$option_name = sanitize_key( $option_name );
	$section = sanitize_key( "slimline_settings_section_{$section}" );

	$settings_field_callback = apply_filters( 'slimline_settings_field_callback', "slimline_settings_field_{$type}", $type, $value, $option_name );
	$settings_field_callback = apply_filters( "slimline_settings_field_callback-{$option_name}", $settings_field_callback, $type, $value, $option_name );

	$args = array(
		'class'       => slimline_get_class( $option_name ),
		'description' => $description,
		'id'          => "slimline_option_{$option_name}",
		'label_for'   => __( $title, 'slimline' ),
		'name'        => $option_name,
		'type'        => $type,
		'value'       => $value
	);

	add_settings_field( $id, __( $title, 'slimline' ), $settings_field_callback, $page, $section, $args );
	add_filter( "slimline_sanitize_option-{$option_name}", slimline_sanitize_option_function( $type, $option_name ) );
}

/**
 * slimline_settings_field_default function
 *
 * Outputs a form input field for the given option
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
		'value' => ( is_array( $value ) ? '' : esc_attr( $value ) )
	);

	$input_field = slimline_get_html_tag( 'input', $html_args, true );
	$input_field = ( $args[ 'description' ] ? "<span class='description'>{$args[ 'description' ]}</span>" : '' );
	$input_field = apply_filters( 'slimline_settings_field_default', $input_field, $args );
	$input_field = apply_filters( "slimline_settings_field_default-{$args['name']}", $input_field, $args );

	echo $input_field;
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
 * slimline_sanitize_option_function function
 *
 * Returns the appropriate sanitization function for a given option. Developers can modify the returned
 * function name by using the `slimline_sanitize_option_function` and 
 * `slimline_sanitize_option_function-{$option_name}` filters.
 *
 * @param string $type The option's content type given in slimline_add_settings_field
 * @param string $option_name The name of the option to be sanitized
 * @return string $sanitization_function The name of the sanitization function to use
 * @since 0.1.0
 */
function slimline_sanitize_option_function( $type, $option_name ) {

	switch( $type ) {

		case 'url' :
			$sanitization_function = 'esc_url_raw';
			break;

		default :
			$sanitization_function = 'esc_attr';
			break;
	}

	$sanitization_function = apply_filters( 'slimline_sanitize_option_function', $sanitization_function, $type, $option_name );
	$sanitization_function = apply_filters( "slimline_sanitize_option_function-{$option_name}", $sanitization_function );

	return $sanitization_function;
}