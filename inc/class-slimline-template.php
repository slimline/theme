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

	/**
	 * @var string $parts_directory Name of template parts directory
	 */
	protected $parts_directory = 'parts';

	/**
	 * @var array $template_path Associative array of template paths found by
	 *                           `slimline_get_template_part`
	 */
	protected $template_path = array();

	function __construct() {}

	/**
	 * Return parts directory name
	 */
	public function get_parts_directory() {

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

	public function get_template_path( $template_string ) {

		if ( ! isset( $this->template_path[ $template_string ] ) ) {
			return false;
		} // if ( ! isset( $this->template_path[ $template_string ] ) )

		return $this->template_path[ $template_string ];
	}

	public function set_template_path( $template_string, $path ) {

		$this->template_path[ $template_string ] = $path;
	}
}