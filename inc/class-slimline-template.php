<?php
/**
 * Template Class
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly


class Slimline_Template {

	/**
	 * @var Slimine_Template $_instance The class instance
	 */
	protected static $_instance = null;

	protected $parts_directory = 'parts';

	protected $template_path = array();

	function __construct() {

	}

	/**
	 * Return parts directory name
	 */
	function get_parts_directory() {

		return apply_filters( 'slimline_parts_directory', $this->parts_directory );
	}

	/**
	 * Return the class instance
	 */
	public static function get_instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		} // if ( is_null( self::$_instance ) )

		return self::$_instance;

	} // public static function get_instance()

	function get_template_path( $template_string, $default = '' ) {

		if ( ! isset( $this->template_path[ $template_string ] ) ) {
			$this->set_template_path( $template_string, $default );
		} // if ( ! isset( $this->template_path[ $template_string ] ) )

		return $this->template_path[ $template_string ];
	}

	function set_template_path( $template_string, $path ) {

		$this->template_path[ $template_string ] = $path;
	}
}