<?php
/**
 * Core Theme Modules
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Set up admin area handling
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_admin()
 * @since 0.1.0
 */
function slimline_admin() {

	/**
	 * Exit if not in admin area
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_admin/
	 *       Description of the `is_admin` function
	 */
	if ( ! is_admin() ) {
		return;
	} // if ( ! is_admin() )

	/**
	 * Admin functions
	 */
	require_once( slimline_includes_directory() . 'admin.php' );

	/**
	 * Enqueue admin-side scripts and stylesheets
	 *
	 * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
	 *       Description of `admin_enqueue_scripts` action
	 * @see  slimline_admin_enqueue_scripts()
	 */
	add_action( 'admin_enqueue_scripts', 'slimline_admin_enqueue_scripts' );
}

/**
 * Auto-loader function for classes
 *
 * @see http://php.net/manual/en/function.spl-autoload-register.php
 *      Description of `spl_autoload_register` function
 */
function slimline_autoload( $class ) {

	$class = strtolower( $class );

	/**
	 * Limit auto-loading to Slimline classes
	 */
	if ( 0 === strpos( $class, 'slimline' ) ) {

		/**
		 * Convert class name to standard WordPress file name conventions and include
		 *
		 * @link https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/#naming-conventions
		 *       Description of WordPress file naming conventions
		 */
		include_once( slimline_includes_directory() . 'class-' . str_replace( '_', '-', $class ) . '.php' );

	} // if ( 0 === strpos( $class, 'slimline' ) )

}

/**
 * Set up autoloading for classes
 *
 * @link http://php.net/manual/en/function.spl-autoload-register.php
 *       Description of `spl_autoload_register` function
 */
function slimline_autoload_register() {

	/**
	 * Backward compatability for `__autoload` function
	 *
	 * @link http://php.net/manual/en/function.autoload.php
	 *       Description of `__autoload` function
	 */
	if ( function_exists( '__autoload' ) ) {
		spl_autoload_register( '__autoload' );
	} // if ( function_exists( '__autoload' ) )

	spl_autoload_register( 'slimline_autoload' );

}

/**
 * Set up default grid
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_default_layout()
 * @since 0.2.0
 */
function slimline_default_layout() {

	/**
	 * Exit if not using layout defaults
	 *
	 * @see slimline_use_default_layout()
	 */
	if ( ! slimline_use_default_layout() ) {
		return;
	} // if ( ! slimline_use_default_layout() )

	add_action( 'slimline_header_top',            'slimline_get_row_open_full',  5 );
	add_action( 'slimline_header_bottom',         'slimline_get_row_close_full', 90 );
	add_action( 'slimline_footer_top',            'slimline_get_row_open_full',  10 );
	add_action( 'slimline_footer_bottom',         'slimline_get_row_close_full', 90 );
	add_action( 'slimline_sidebar_footer_top',    'slimline_get_row_open',       10 );
	add_action( 'slimline_sidebar_footer_bottom', 'slimline_get_row_close',      90 );

	add_filter( 'post_class',                      'slimline_entry_columns',               10 );
	add_filter( 'slimline_copyright_class',        'slimline_copyright_columns',           10 );
	add_filter( 'slimline_footer-nav_class',       'slimline_footer_nav_columns',          10 );
	add_filter( 'slimline_header-nav_class',       'slimline_header_nav_columns',          10 );
	add_filter( 'slimline_index_class',            'slimline_index_columns',               10 );
	add_filter( 'slimline_logo',                   'slimline_logo_columns',                10 );
	add_filter( 'slimline_main_class',             'slimline_main_row',                    10 );
	add_filter( 'slimline_sidebar-primary_class',  'slimline_sidebar_primary_columns',     10 );
	add_filter( 'slimline_site-title-link_class',  'slimline_site_title_link_columns',     10 );
	add_filter( 'slimline_the_entry_title_after',  'slimline_the_entry_title_link_after',  90 );
	add_filter( 'slimline_the_entry_title_before', 'slimline_the_entry_title_link_before', 10 );

}

/**
 * Set up login screen handling
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_login()
 * @since 0.1.0
 */
function slimline_login() {

	/**
	 * Exit if not on login screen
	 *
	 * @global string $pagenow The current page filename
	 */
	global $pagenow;

	if ( 'wp-login.php' !== $pagenow ) {
		return;
	} // if ( 'wp-login.php' !== $pagenow )

	/**
	 * Login functions
	 */
	require_once( slimline_includes_directory() . 'login.php' );

	/**
	 * Output login logo css
	 *
	 * Replaces the default login logo with the custom logo
	 *
	 * @link https://developer.wordpress.org/reference/hooks/login_head/
	 *       Description of `login_head` action
	 * @see  slimline_login_logo()
	 */
	add_action( 'login_head', 'slimline_login_logo_css', 10 );

	/**
	 * Replace login logo title with site name
	 *
	 * @link https://developer.wordpress.org/reference/hooks/login_headertitle/
	 *       Description of `login_headertitle` action
	 * @see  slimline_login_headertitle()
	 */
	add_filter( 'login_headertitle', 'slimline_login_headertitle', 10 );

	/**
	 * Replace login logo url with home url
	 *
	 * @link https://developer.wordpress.org/reference/hooks/login_headerurl/
	 *       Description of `login_headerurl` action
	 * @see  slimline_login_headerurl()
	 */
	add_filter( 'login_headerurl', 'slimline_login_headerurl', 10 );
}

/**
 * Set up Schema.org structured data markup
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_schema_org()
 * @since 0.2.0
 */
function slimline_schema_org() {

	/**
	 * Don't continue if the theme doesn't support Schema.org markup
	 *
	 * @see slimline_use_schema_org()
	 */
	if ( ! slimline_use_schema_org() ) {
		return;
	} // if ( ! slimline_use_schema_org() )

	require_once( slimline_includes_directory() . 'schema.org.php' );

	/**
	 * Remove .hentry
	 */
	add_filter( 'post_class', 'slimline_schema_remove_hentry_class', 0 );

	/**
	 * HTML filters
	 */
	add_filter( 'slimline_html_attributes_pre', 'slimline_schema_add_itemscope',        10 );
	add_filter( 'slimline_html_attributes_pre', 'slimline_schema_add_itemtype_webpage', 10 );

	/**
	 * Site <header>
	 */
	add_filter( 'slimline_site-header_attributes_pre', 'slimline_schema_add_itemscope',         10 );
	add_filter( 'slimline_site-header_attributes_pre', 'slimline_schema_add_itemtype_wpheader', 10 );

	/**
	 * Site <main>
	 */
	add_filter( 'slimline_breadcrumb_attributes_pre', 'slimline_schema_add_itemprop_breadcrumb', 10 );

	/**
	 * 404.php filters
	 */
	add_filter( 'slimline_404-description_attributes_pre', 'slimline_schema_add_itemprop_description', 10 );
	add_filter( 'slimline_404-title_attributes_pre',       'slimline_schema_add_itemprop_headline',    10 );

	/**
	 * Index.php filters
	 */
	add_filter( 'slimline_index_attributes_pre',             'slimline_schema_add_itemprop_mainentity',  10 );
	add_filter( 'slimline_index_attributes_pre',             'slimline_schema_add_itemscope',            10 );
	add_filter( 'slimline_index_attributes_pre',             'slimline_schema_index_itemtype',           10 );
	add_filter( 'slimline_index-description_attributes_pre', 'slimline_schema_add_itemprop_description', 10 );
	add_filter( 'slimline_index-title_attributes_pre',       'slimline_schema_add_itemprop_headline',    10 );

	/**
	 * No posts for index
	 */
	add_filter( 'slimline_not-found-description_attributes_pre', 'slimline_schema_add_itemprop_text',     10 );
	add_filter( 'slimline_not-found-title_attributes_pre',       'slimline_schema_add_itemprop_headline', 10 );

	/**
	 * Entry filters
	 */
	add_filter( 'slimline_entry_attributes_pre',             'slimline_schema_entry_itemprop',           10 );
	add_filter( 'slimline_entry_attributes_pre',             'slimline_schema_add_itemscope',            10 );
	add_filter( 'slimline_entry_attributes_pre',             'slimline_schema_entry_itemtype',           10 );
	add_filter( 'slimline_entry-content_attributes_pre',     'slimline_schema_add_itemprop_text',        10 );
	add_filter( 'slimline_entry-description_attributes_pre', 'slimline_schema_add_itemprop_description', 10 );
	add_filter( 'slimline_entry-title_attributes_pre',       'slimline_schema_add_itemprop_headline',    10 );

	/**
	 * Comment filters
	 */
	add_filter( 'slimline_comment_attributes_pre', 'slimline_schema_add_itemprop_comment', 10 );
	add_filter( 'slimline_comment_attributes_pre', 'slimline_schema_add_itemscope',        10 );
	add_filter( 'slimline_comment_attributes_pre', 'slimline_schema_add_itemtype_comment', 10 );

	/**
	 * Primary Sidebar
	 */
	add_filter( 'slimline_sidebar-primary_attributes_pre', 'slimline_schema_add_itemscope',          10 );
	add_filter( 'slimline_sidebar-primary_attributes_pre', 'slimline_schema_add_itemtype_wpsidebar', 10 );

	/**
	 * Pre-footer
	 */
	add_filter( 'slimline_sidebar-footer_attributes_pre', 'slimline_schema_add_itemscope',          10 );
	add_filter( 'slimline_sidebar-footer_attributes_pre', 'slimline_schema_add_itemtype_wpsidebar', 10 );

	/**
	 * Site <footer>
	 */
	add_filter( 'slimline_site-footer_attributes_pre', 'slimline_schema_add_itemscope',         10 );
	add_filter( 'slimline_site-footer_attributes_pre', 'slimline_schema_add_itemtype_wpfooter', 10 );

}

/**
 * slimline_vendor function
 *
 * Conditional actions, filters and support for third-party plugins.
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_vendor()
 * @since 0.1.0
 */
function slimline_vendor() {

	/**
	 * Google Analytics by Yoast Support
	 *
	 * @link https://wordpress.org/plugins/googleanalytics/
	 */
	if ( defined( 'GAWP_VERSION' ) && ! is_admin() ) {

		/**
		 * @global object $yoast_ga_frontend The Front End object
		 */
		global $yoast_ga_frontend;

		/**
		 * Add Google Analytics filtering to slimline_content
		 */
		add_filter( 'slimline_content', array( $yoast_ga_frontend, 'the_content' ), 100 );

	} // if ( defined( 'GAWP_VERSION' ) && ! is_admin() )

	/**
	 * Gravity Forms Support
	 *
	 * @link https://www.gravityforms.com/
	 */
	if ( class_exists( 'GFForms' ) ) {

		/**
		 * Add "button" class to submit buttons
		 *
		 * @link https://www.gravityhelp.com/documentation/article/gform_submit_button/
		 *       Description of `gform_submit_button` filter
		 */
		add_filter( 'gform_submit_button', 'slimline_get_gform_submit_button_class', 10 );

		/**
		 * Remove tabindex for WAI-ARIA compliance
		 *
		 * Setting a tabindex on the form can conflict with the natural tabindex of
		 * the page and set focus to the form even when it should not receive it.
		 * Also, multiple Gravity Forms on the same page conflict with each other
		 * since all of them begin with the same tabindex. We are removing the
		 * tabindex here but doing it very early in the filter so it can be easily
		 * overridden by developer code.
		 *
		 * @link https://www.gravityhelp.com/documentation/article/gform_tabindex/
		 *       Description of `gform_tabindex` filter
		 * @link https://developer.wordpress.org/reference/functions/__return_false/
		 *       Description of `__return_false` helper function
		 */
		add_filter( 'gform_tabindex', '__return_false', 0 );

	} // if ( class_exists( 'GFForms' ) )

	/**
	 * Theme Hook Alliance Support
	 *
	 * Add support for Theme Hook Alliance actions. Theme developers may need to edit
	 * priorities and/or unhook some default Slimline hooks for these to perform as
	 * expected.
	 *
	 * NOTE: the hooks below are listed in the same order as in the
	 * tha-theme-hooks.php document.
	 *
	 * @link https://github.com/zamoose/themehookalliance
	 */
	if ( defined( 'THA_HOOKS_VERSION' ) ) {

		/**
		 * Declare THA hooks support
		 *
		 * @see slimline_tha_hooks_support_args()
		 */
		add_theme_support( 'tha_hooks', slimline_tha_hooks_support_args() );

		/**
		 * semantic <html> hooks
		 */
		if ( array_intersect( array( 'all', 'html' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_html', 'tha_html', 10 );
		} // if ( array_intersect( array( 'all', 'html' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * semantic <body> hooks
		 */
		if ( array_intersect( array( 'all', 'body' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_body_top',    'tha_body_top',    10 );
			add_action( 'slimline_body_bottom', 'tha_body_bottom', 10 );
		} // if ( array_intersect( array( 'all', 'body' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * semantic <head> hooks
		 */
		if ( array_intersect( array( 'all', 'head' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'wp_head', 'tha_head_top',    0 );
			add_action( 'wp_head', 'tha_head_bottom', 1000 );
		} // if ( array_intersect( array( 'all', 'head' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * semantic <header> hooks
		 */
		if ( array_intersect( array( 'all', 'header' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_header_before', 'tha_header_before', 10 );
			add_action( 'slimline_header_after',  'tha_header_after',  10 );
			add_action( 'slimline_header_top',    'tha_header_top',    10 );
			add_action( 'slimline_header_bottom', 'tha_header_bottom', 10 );
		} // if ( array_intersect( array( 'all', 'header' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * semantic <content> hooks
		 */
		if ( array_intersect( array( 'all', 'content' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_content_before',       'tha_content_before',       10 );
			add_action( 'slimline_content_after',        'tha_content_after',        10 );
			add_action( 'slimline_content_top',          'tha_content_top',          10 );
			add_action( 'slimline_content_bottom',       'tha_content_bottom',       10 );
			add_action( 'slimline_content_while_before', 'tha_content_while_before', 10 );
			add_action( 'slimline_content_while_after',  'tha_content_while_after',  10 );
		} // if ( array_intersect( array( 'all', 'content' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * semantic <entry> hooks
		 */
		if ( array_intersect( array( 'all', 'entry' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_entry_before',         'tha_entry_before',         10 );
			add_action( 'slimline_entry_after',          'tha_entry_after',          10 );
			add_action( 'slimline_entry_content_before', 'tha_entry_content_before', 10 );
			add_action( 'slimline_entry_content_after',  'tha_entry_content_after',  10 );
			add_action( 'slimline_entry_top',            'tha_entry_top',            10 );
			add_action( 'slimline_entry_bottom',         'tha_entry_bottom',         10 );
		} // if ( array_intersect( array( 'all', 'entry' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * comments block hooks
		 */
		if ( array_intersect( array( 'all', 'comments' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_comments_before', 'tha_comments_before', 10 );
			add_action( 'slimline_comments_after',  'tha_comments_after',  10 );
		} // if ( array_intersect( array( 'all', 'comments' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * semantic <sidebar> hooks
		 */
		if ( array_intersect( array( 'all', 'sidebars' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_sidebar_primary_before', 'tha_sidebars_before', 10 );
			add_action( 'slimline_sidebar_primary_after',  'tha_sidebars_after',  10 );
		} // if ( array_intersect( array( 'all', 'sidebars' ), get_theme_support( 'tha_hooks' ) ) )

		if ( array_intersect( array( 'all', 'sidebar' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_sidebar_primary_top',    'tha_sidebar_top',     10 );
			add_action( 'slimline_sidebar_primary_bottom', 'tha_sidebar_bottom',  10 );
		} // if ( array_intersect( array( 'all', 'sidebar' ), get_theme_support( 'tha_hooks' ) ) )

		/**
		 * semantic <footer> hooks
		 */
		if ( array_intersect( array( 'all', 'footer' ), get_theme_support( 'tha_hooks' ) ) ) {
			add_action( 'slimline_footer_before', 'tha_footer_before', 10 );
			add_action( 'slimline_footer_after',  'tha_footer_after',  10 );
			add_action( 'slimline_footer_top',    'tha_footer_top',    10 );
			add_action( 'slimline_footer_bottom', 'tha_footer_bottom', 10 );
		} // if ( array_intersect( array( 'all', 'footer' ), get_theme_support( 'tha_hooks' ) ) )

	} // if ( defined( 'THA_HOOKS_VERSION' ) )

	/**
	 * WooCommerce Support
	 *
	 * @link https://www.woothemes.com/woocommerce/
	 */
	if ( function_exists( 'WC' ) ) {

		/**
		 * WooCommerce has Schema.org markup baked in, so make sure we have it
		 * available even if we aren't using it anywhere else
		 */
		require_once( slimline_includes_directory() . 'schema.org.php' );

		/**
		 * Remove WooCommerce outputs that will interfere with Slimline markup
		 *
		 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
		 */
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',  20 );
		remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar', 10 );

		/**
		 * Edit WooCommerce outputs to fit with Slimline markup
		 *
		 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
		 */
		add_action( 'slimline_content_before',         'slimline_woocommerce_breadcrumb',                       10 );
		add_action( 'woocommerce_before_main_content', 'slimline_maybe_remove_woocommerce_content_wrapper',      0 );
		add_action( 'woocommerce_after_main_content',  'slimline_maybe_remove_woocommerce_content_wrapper_end',  0 );

		/**
		 * Add structured markup to default WooCommerce items
		 */
		add_filter( 'slimline_entry_attributes_pre',   'slimline_woocommerce_get_product_schema',        20, 1 );
		add_filter( 'slimline_index_attributes_pre',   'slimline_woocommerce_add_itemtype_offercatalog', 20, 1 );
		add_filter( 'woocommerce_breadcrumb_defaults', 'slimline_woocommerce_breadcrumb_args',           10, 1 );

		/**
		 * Add extra structured markup to product cats
		 */
		add_filter( 'slimline_woocommerce-product_cat_attributes_pre', 'slimline_schema_add_itemprop_itemlistelement', 10, 1 )
		add_filter( 'slimline_woocommerce-product_cat_attributes_pre', 'slimline_schema_add_itemscope',                10, 1 )
		add_filter( 'slimline_woocommerce-product_cat_attributes_pre', 'slimline_schema_add_itemtype_offercatalog',    10, 1 )

		/**
		 * Add default Schema.org attributes if not already being used
		 */
		if ( ! slimline_use_schema_org() ) {

			/**
			 * Product archive filters
			 */
			add_filter( 'slimline_index_attributes_pre', 'slimline_woocommerce_archive_add_itemscope',   10 );

			/**
			 * Product filters
			 */
			add_filter( 'slimline_entry_attributes_pre', 'slimline_woocommerce_product_itemprop_itemlistelement', 10 );
			add_filter( 'slimline_entry_attributes_pre', 'slimline_woocommerce_product_add_itemscope',            10 );

		} // if ( ! slimline_use_schema_org() )

	} // if ( function_exists( 'WC' ) )

	/**
	 * Yoast SEO Support
	 *
	 * @link https://wordpress.org/plugins/wordpress-seo/
	 */
	if ( defined( 'WPSEO_VERSION' ) ) {

		/**
		 * Automatically insert Yoast breadcrumbs
		 *
		 * @see slimline_yoast_breadcrumb()
		 */
		add_action( 'slimline_content_before', 'slimline_yoast_breadcrumb', 10 );

	} // if ( defined( 'WPSEO_VERSION' ) )
}