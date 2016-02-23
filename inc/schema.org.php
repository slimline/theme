<?php
/**
 * Schema.org support
 *
 * Functions for adding and working with Schema.org markup
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @see        https://schema.org/
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Add "breadcrumb" itemprop attribute
 *
 * Sets the itemprop attribute to "breadcrumb". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_breadcrumb()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_breadcrumb( $attributes = array() ) {

	/**
	 * Add "breadcrumb" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/breadcrumb Documentation of "breadcrumb" property
	 */
	$attributes['itemprop'] = 'breadcrumb';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "blogPost" itemprop attribute
 *
 * Sets the itemprop attribute to "blogPost". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_blogpost()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_blogpost( $attributes = array() ) {

	/**
	 * Add "blogPost" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/blogPost Documentation of "blogPost" property
	 */
	$attributes['itemprop'] = 'blogPost';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "comment" itemprop attribute
 *
 * Sets the itemprop attribute to "comment". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_comment()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_comment( $attributes = array() ) {

	/**
	 * Add "comment" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/comment Documentation of "comment" property
	 */
	$attributes['itemprop'] = 'comment';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "description" itemprop attribute
 *
 * Sets the itemprop attribute to "description". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_description()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_description( $attributes = array() ) {

	/**
	 * Add "description" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/description Documentation of "description" property
	 */
	$attributes['itemprop'] = 'description';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "headline" itemprop attribute
 *
 * Sets the itemprop attribute to "headline". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_headline()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_headline( $attributes = array() ) {

	/**
	 * Add "headline" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/headline Documentation of "headline" property
	 */
	$attributes['itemprop'] = 'headline';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "itemListElement" itemprop attribute
 *
 * Sets the itemprop attribute to "itemListElement". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_itemlistelement()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_itemlistelement( $attributes = array() ) {

	/**
	 * Add "itemListElement" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/itemListElement Documentation of "itemListElement" property
	 */
	$attributes['itemprop'] = 'itemListElement';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "mainEntity" itemprop attribute
 *
 * Sets the itemprop attribute to "mainEntity". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_mainentity()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_mainentity( $attributes = array() ) {

	/**
	 * Add "mainEntity" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/mainEntity Documentation of "mainEntity" property
	 */
	$attributes['itemprop'] = 'mainEntity';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add "text" itemprop attribute
 *
 * Sets the itemprop attribute to "text". Meant to be used with `slimline_attributes`
 * filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemprop_text()
 * @since  0.2.0
 */
function slimline_schema_add_itemprop_text( $attributes = array() ) {

	/**
	 * Add "text" itemprop
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemprop
	 *       Explanation of itemprop
	 * @link https://schema.org/text Documentation of "text" property
	 */
	$attributes['itemprop'] = 'text';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Add itemscope attribute
 *
 * Sets the itemscope attribute and value in an associative array. Meant to be used
 * with `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemscope added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemscope()
 * @since  0.2.0
 */
function slimline_schema_add_itemscope( $attributes = array() ) {

	/**
	 * Add itemscope
	 *
	 * Per WordPress HTML coding standards, boolean attributes like itemscope should
	 * have a value. For boolean attributes this value should be the name of the
	 * attribute.
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemscope
	 * @link https://make.wordpress.org/core/handbook/best-practices/coding-standards/html/#quotes
	 *       Description of HTML attribute coding standards
	 */
	$attributes['itemscope'] = 'itemscope';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "Blog"
 *
 * Sets the itemtype attribute to "Blog". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_blog()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_blog( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/Blog Documentation of "Blog" type
	 */
	$attributes['itemtype'] = 'https://schema.org/Blog';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "BlogPosting"
 *
 * Sets the itemtype attribute to "BlogPosting". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_blogposting()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_blogposting( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/BlogPosting Documentation of "BlogPosting" type
	 */
	$attributes['itemtype'] = 'https://schema.org/BlogPosting';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "Comment"
 *
 * Sets the itemtype attribute to "Comment". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_comment()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_comment( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/Comment Documentation of "Comment" type
	 */
	$attributes['itemtype'] = 'https://schema.org/Comment';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "CreativeWork"
 *
 * Sets the itemtype attribute to "CreativeWork". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_creativework()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_creativework( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/CreativeWork Documentation of "CreativeWork" type
	 */
	$attributes['itemtype'] = 'https://schema.org/CreativeWork';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "OfferCatalog"
 *
 * Sets the itemtype attribute to "OfferCatalog". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_offercatalog()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_offercatalog( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/OfferCatalog Documentation of "OfferCatalog" type
	 */
	$attributes['itemtype'] = 'https://schema.org/OfferCatalog';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "WebPage"
 *
 * Sets the itemtype attribute to "WebPage". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_webpage()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_webpage( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/WebPage Documentation of "WebPage" type
	 */
	$attributes['itemtype'] = 'https://schema.org/WebPage';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "WPFooter"
 *
 * Sets the itemtype attribute to "WPFooter". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_wpfooter()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_wpfooter( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/WPFooter Documentation of "WPFooter" type
	 */
	$attributes['itemtype'] = 'https://schema.org/WPFooter';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "WPHeader"
 *
 * Sets the itemtype attribute to "WPHeader". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_wpheader()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_wpheader( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/WPHeader Documentation of "WPHeader" type
	 */
	$attributes['itemtype'] = 'https://schema.org/WPHeader';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Set itemtype to "WPSidebar"
 *
 * Sets the itemtype attribute to "WPSidebar". Meant to be used with
 * `slimline_attributes` filters.
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_add_itemtype_wpsidebar()
 * @since  0.2.0
 */
function slimline_schema_add_itemtype_wpsidebar( $attributes = array() ) {

	/**
	 * Add itemtype
	 *
	 * @link https://schema.org/docs/gs.html#microdata_itemscope_itemtype
	 *       Explanation of itemtype
	 * @link https://schema.org/WPSidebar Documentation of "WPSidebar" type
	 */
	$attributes['itemtype'] = 'https://schema.org/WPSidebar';

	/**
	 * Return edited array
	 */
	return $attributes;
}

/**
 * Conditionally add itemprop attribute based on post type
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_entry_itemprop()
 * @since  0.2.0
 */
function slimline_schema_entry_itemprop( $attributes = array() ) {

	/**
	 * Only add itemprop if in the main loop
	 *
	 * @link https://developer.wordpress.org/reference/functions/is_main_query/
	 *       Description of `is_main_query` function
	 */
	if ( is_main_query() ) {

		/**
		 * Label as "mainEntity" if a singular post
		 */
		if ( is_singular() ) {

			return slimline_schema_add_itemprop_mainentity( $attributes );

		/**
		 * Label as "blogPost" if a blog post
		 *
		 * @see slimline_is_blog_post()
		 */
		} else if ( slimline_is_blog_post() ) { // if ( is_singular() )

			return slimline_schema_add_itemprop_blogpost( $attributes );

		} // if ( is_singular() )

	} // if ( is_main_query() )

	/**
	 * Otherwise return unchanged attributes
	 */
	return $attributes;

}

/**
 * Conditionally add itemtype attribute based on post type
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_entry_itemtype()
 * @since  0.2.0
 */
function slimline_schema_entry_itemtype( $attributes = array() ) {

	/**
	 * Label as "BlogPosting" if a blog post
	 *
	 * @see slimline_is_blog_post()
	 */
	if ( slimline_is_blog_post() ) {

		return slimline_schema_add_itemtype_blogposting( $attributes );

	/**
	 * Otherwise label as a "CreativeWork"
	 */
	} else { // slimline_is_blog_post()

		return slimline_schema_add_itemtype_creativework( $attributes );

	} // slimline_is_blog_post()

}

/**
 * Conditionally add itemtype attribute based on the type of page we are on
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @link   https://github.com/slimline/theme/wiki/slimline_schema_index_itemtype()
 * @since  0.2.0
 */
function slimline_schema_index_itemtype( $attributes = array() ) {

	/**
	 * Label as "Blog" if on a blog page
	 *
	 * @see slimline_is_blog()
	 */
	if ( slimline_is_blog() ) {

		return slimline_schema_add_itemtype_blog( $attributes );

	/**
	 * Otherwise label as a "CreativeWork"
	 */
	} else { // slimline_is_blog()

		return slimline_schema_add_itemtype_creativework( $attributes );

	} // slimline_is_blog()

}

/**
 * Remove "hentry" class
 *
 * The "hentry" class tells search engines that we are using the hAtom microformat
 * markup, which can cause confusion when we are also using Schema.org markup.
 *
 * Meant to be hooked to the `post_class` filter.
 *
 * @param  array $classes Array of post classes
 * @return array $classes Post classes with "hentry" removed
 * @since  0.2.0
 */
function slimline_schema_remove_hentry_class( $classes ) {

	/**
	 * Remove "hentry" and return
	 *
	 * @link http://php.net/manual/en/function.array-diff.php
	 *       Documentation of `array_diff` function
	 */
	return array_diff( $classes, array( 'hentry' ) );
}

/**
 * Conditionally add "itemListElement" itemprop
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemprop added
 * @uses   slimline_schema_add_itemprop_itemlistelement() to add the itemprop
 * @link   https://github.com/slimline/theme/wiki/slimline_woocommerce_product_itemprop_itemlistelement()
 * @since  0.2.0
 */
function slimline_woocommerce_product_itemprop_itemlistelement( $attributes ) {

	/**
	 * Only continue if WooCommerce is installed and active. This is because we will
	 * use WooCommerce conditionals to decide whether to add the itemtype.
	 */
	if ( function_exists( 'WC' ) ) {

		/**
		 * Add itemprop IF
		 * 1) we are in a WooCommerce product archive AND
		 * 2) we are currently in the main loop AND
		 * 3) the current post is a product
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_archive/
		 *       Description of the `is_archive` function
		 * @link https://docs.woothemes.com/wc-apidocs/function-is_woocommerce.html
		 *       Description of the `is_woocommerce` function
		 * @link https://developer.wordpress.org/reference/functions/in_the_loop/
		 *       Description of the `in_the_loop` function
		 * @link https://developer.wordpress.org/reference/functions/get_post_type/
		 *       Description of the `get_post_type` function
		 * @link https://developer.wordpress.org/reference/functions/get_the_ID/
		 *       Description of the `get_the_ID` function
		 */
		if ( ( is_archive() && is_woocommerce() ) && in_the_loop() && 'product' === get_post_type( get_the_ID() ) ) {

			$attributes = slimline_schema_add_itemprop_itemlistelement( $attributes );

		} // if ( ( is_archive() && is_woocommerce() ) && in_the_loop() && 'product' === get_post_type( get_the_ID() ) )

	} // if ( function_exists( 'WC' ) )

	return $attributes;
}

/**
 * Conditionally add "OfferCatalog" itemtype
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype added
 * @uses   slimline_schema_add_itemtype_offercatalog() to add the itemtype
 * @link   https://github.com/slimline/theme/wiki/slimline_woocommerce_add_itemtype_offercatalog()
 * @since  0.2.0
 */
function slimline_woocommerce_add_itemtype_offercatalog( $attributes ) {

	/**
	 * Only continue if WooCommerce is installed and active. This is because we will
	 * use WooCommerce conditionals to decide whether to add the itemtype.
	 */
	if ( function_exists( 'WC' ) ) {

		/**
		 * Add the itemtype IF:
		 * 1) we are on an archive page AND
		 * 2) the current page is a WooCommerce page
		 *
		 * (e.g., the main shop page, a product category or tag page, a product
		 * attributes page, etc.).
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_archive/
		 *       Description of the `is_archive` function
		 * @link https://docs.woothemes.com/wc-apidocs/function-is_woocommerce.html
		 *       Description of the `is_woocommerce` function
		 */
		if ( is_archive() && is_woocommerce() ) {

			$attributes = slimline_schema_add_itemtype_offercatalog( $attributes );

		} // is_archive() && is_woocommerce() )

	} // if ( function_exists( 'WC' ) )

	return $attributes;

}

/**
 * Add WooCommerce itemtype considerations to entry attributes
 *
 * @param  array $attributes The array of default attributes
 * @return array $attributes Array of attributes with itemtype replaced
 * @link   https://github.com/slimline/theme/wiki/slimline_woocommerce_get_product_schema()
 * @since  0.2.0
 */
function slimline_woocommerce_get_product_schema( $attributes ) {

	/**
	 * Make sure we are dealing with a product and the
	 * `woocommerce_get_product_schema` function is available.
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_post_type/
	 *       Description of the `get_post_type` function
	 * @link https://developer.wordpress.org/reference/functions/get_the_ID/
	 *       Description of the `get_the_ID` function
	 */
	if ( 'product' === get_post_type( get_the_ID() ) && function_exists( 'woocommerce_get_product_schema' ) ) {

		/**
		 * Replace the itemtype with the appropriate product type
		 *
		 * @link https://docs.woothemes.com/wc-apidocs/function-woocommerce_get_product_schema.html
		 *       Description of the `woocommerce_get_product_schema` function
		 */
		$attributes['itemtype'] = woocommerce_get_product_schema();

	} // if ( 'product' === get_post_type( get_the_ID() ) && function_exists( 'woocommerce_get_product_schema' ) )

	return $attributes;
}

function slimline_woocommerce_archive_add_itemscope( $attributes ) {

	/**
	 * Only continue if WooCommerce is installed and active. This is because we will
	 * use WooCommerce conditionals to decide whether to add the itemtype.
	 */
	if ( function_exists( 'WC' ) ) {

		/**
		 * Add the itemtype IF:
		 * 1) we are on an archive page AND
		 * 2) the current page is a WooCommerce page
		 *
		 * (e.g., the main shop page, a product category or tag page, a product
		 * attributes page, etc.).
		 *
		 * @link https://developer.wordpress.org/reference/functions/is_archive/
		 *       Description of the `is_archive` function
		 * @link https://docs.woothemes.com/wc-apidocs/function-is_woocommerce.html
		 *       Description of the `is_woocommerce` function
		 */
		if ( is_archive() && is_woocommerce() ) {

			$attributes = slimline_schema_add_itemscope( $attributes );

		} // is_archive() && is_woocommerce() )

	} // if ( function_exists( 'WC' ) )

	return $attributes;
}

function slimline_woocommerce_product_add_itemscope( $attributes ) {

	if ( in_the_loop() && 'product' === get_post_type( get_the_ID() ) ) {

		$attributes = slimline_schema_add_itemscope( $attributes );

	} // if ( in_the_loop() && 'product' === get_post_type( get_the_ID() ) )

	return $attributes;
}