<?php
/**
 * Customizer partials.
 *
 * @package business_pro
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function business_pro_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function business_pro_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Partial for copyright text.
 *
 * @since 1.0.0
 *
 * @return void
 */
function business_pro_render_partial_copyright_text() {

	$business_pro_copyright_text = business_pro_get_option( 'business_pro_copyright_text' );
	$business_pro_copyright_text = apply_filters( 'business_pro_filter_copyright_text', $business_pro_copyright_text );
	if ( ! empty( $business_pro_copyright_text ) ) {
		$business_pro_copyright_text = wp_kses_data( $business_pro_copyright_text );
	}
	echo $business_pro_copyright_text;

}
