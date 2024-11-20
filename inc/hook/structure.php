<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package business_pro
 */

if ( ! function_exists( 'business_pro_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function business_pro_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'business_pro_action_doctype', 'business_pro_doctype', 10 );

if ( ! function_exists( 'business_pro_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function business_pro_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
	}
endif;
add_action( 'business_pro_action_head', 'business_pro_head', 10 );

if ( ! function_exists( 'business_pro_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function business_pro_page_start() {
	?>
    <div id="page" class="container-fluid mt-5 mb-3 pt-3">
    <?php
	}
endif;
add_action( 'business_pro_action_before', 'business_pro_page_start' );

if ( ! function_exists( 'business_pro_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function business_pro_page_end() {
	?></div><!-- #page --><?php
	}
endif;

add_action( 'business_pro_action_after', 'business_pro_page_end' );

if ( ! function_exists( 'business_pro_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function business_pro_header_start() {
		?> <div class=""><?php
	}
endif;
add_action( 'business_pro_action_before_header', 'business_pro_header_start' );

if ( ! function_exists( 'business_pro_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function business_pro_header_end() {
	?></div><?php
	}
endif;
add_action( 'business_pro_action_after_header', 'business_pro_header_end' );

if ( ! function_exists( 'business_pro_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function business_pro_footer_start() {
		$business_pro_footer_status = apply_filters( 'business_pro_filter_footer_status', true );
		if ( true !== $business_pro_footer_status ) {
			return;
		}
	?><?php
	}
endif;
add_action( 'business_pro_action_before_footer', 'business_pro_footer_start' );

if ( ! function_exists( 'business_pro_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function business_pro_footer_end() {
		$business_pro_footer_status = apply_filters( 'business_pro_filter_footer_status', true );
		if ( true !== $business_pro_footer_status ) {
			return;
		}
	?><?php
	}
endif;
add_action( 'business_pro_action_after_footer', 'business_pro_footer_end' );
