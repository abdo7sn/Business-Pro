<?php
	
require get_template_directory() . '/inc/recommendations/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function business_pro_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Royal Elementor Addons and Templates', 'business-pro' ),
			'slug'             => 'royal-elementor-addons',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Ivory Search – WordPress Search Plugin', 'business-pro' ),
			'slug'             => 'add-search-to-menu',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'business-pro' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	school_education_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'business_pro_register_recommended_plugins' );