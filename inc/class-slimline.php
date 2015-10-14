<?php
/**
 * Main Theme Class
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class Slimline {

	/**
	 * @var Slimline $_instance The class instance
	 */
	protected static $_instance = null;

	protected $context = null;

	protected $logo_id = null;

	protected $template = null;

	function __construct() {

	} // function __construct()

	/**
	 * Return the context class instance
	 */
	function get_context_object() {

		if ( is_null( $this->context ) ) {
			$this->context = Slimline_Context::get_instance();
		} // if ( is_null( $this->context ) )

		return $this->context;

	} // function get_context_object

	/**
	 * Return the class instance
	 */
	public static function get_instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		} // if ( is_null( self::$_instance ) )

		return self::$_instance;

	} // public static function get_instance()

	/**
	 * Return the site logo ID
	 */
	function get_logo_id() {

		if ( is_null( $this->logo_id ) ) {

			/**
			 * Pre-filter logo ID
			 *
			 * This allows developers to skip the additional logo checks below
			 *
			 * @link https://github.com/slimline/theme/wiki/slimline_logo_id_pre
			 */
			$this->logo_id = apply_filters( 'slimline_logo_id_pre', false );

			if ( ! $this->logo_id ) {

				/**
				 * First check JetPack site logo
				 *
				 * @link http://jetpack.me/support/site-logo/
				 */
				if ( slimline_use_as_logo( 'jetpack-site-logo' ) ) {
					$this->logo_id = jetpack_get_site_logo( 'id' );
				} // if ( slimline_use_as_logo( 'jetpack-site-logo' ) )

				/**
				 * Next check WordPress site identity
				 *
				 * @see http://www.sitepoint.com/all-you-need-to-know-about-the-new-wordpress-site-icon-api/
				 */
				if ( ! $this->logo_id && slimline_use_as_logo( 'site-icon' ) ) {
					$this->logo_id = get_option( 'site_icon', 0 );
				} // if ( ! $this->logo_id && slimline_use_as_logo( 'site-icon' ) )

				/**
				 * Finally check WordPress custom header
				 *
				 * @link https://codex.wordpress.org/Custom_Headers
				 */
				if ( ! $this->logo_id && slimline_use_as_logo( 'custom-header' ) ) {

					/**
					 * Get custom header info
					 *
					 * @link https://developer.wordpress.org/reference/functions/get_theme_mod/
					 *       Description of `get_theme_mod` function
					 */
					$header_image_data = get_theme_mod( 'header_image_data' );

					$this->logo_id = ( isset( $header_image_data['attachment_id'] ) ? $header_image_data['attachment_id'] : 0 );

				} // if ( ! $this->logo_id && slimline_use_as_logo( 'custom-header' ) )

			} // if ( ! $this->logo_id )

			/**
			 * Force INT in case an empty string or a boolean
			 *
			 * @link https://developer.wordpress.org/reference/functions/absint/
			 *       Description of `absint` function
			 */
			$this->logo_id = absint( $this->logo_id );

		} // if ( is_null( $this->logo_id ) )

		return apply_filters( 'slimline_logo_id', $this->logo_id );

	} // function get_logo_id()

	/**
	 * Return the template class instance
	 */
	function get_template_object() {

		if ( is_null( $this->template ) ) {
			$this->template = Slimline_Template::get_instance();
		} // if ( is_null( $this->context ) )

		return $this->template;

	} // function get_context_object

} // class Slimline