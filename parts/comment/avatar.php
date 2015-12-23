<?php
/**
 * Template for displaying the comment author avatar
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Output the comment author avatar
 *
 * @link https://developer.wordpress.org/reference/functions/get_avatar/
 *       Description of the `get_avatar` function
 * @link https://developer.wordpress.org/reference/functions/get_comment_author_email/
 *       Description of the `get_comment_author_email` function
 */
echo get_avatar( get_comment_author_email() );