<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business_pro
 */

?>
<?php
	/**
	 * Hook - business_pro_action_doctype.
	 *
	 * @hooked business_pro_doctype -  10
	 */
	do_action( 'business_pro_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - business_pro_action_head.
	 *
	 * @hooked business_pro_head -  10
	 */
	do_action( 'business_pro_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'wp_body_open' ); ?>

	<?php 
	$business_pro_show_preloader = business_pro_get_option( 'business_pro_show_preloader_setting' );
        if ( true === $business_pro_show_preloader ) : ?>
			<div id="preloader" class="loader-head">
				<div class="preloader">
				    <div class="spinner"></div>
				    <div class="spinner-2"></div>
				</div>
			</div>
	<?php endif; ?>

	<?php
	/**
	 * Hook - business_pro_action_before.
	 *
	 * @hooked business_pro_page_start - 10
	 * @hooked business_pro_skip_to_content - 15
	 */
	//do_action( 'business_pro_action_before' );
	?>

    <?php
	  /**
	   * Hook - business_pro_action_before_header.
	   *
	   * @hooked business_pro_header_start - 10
	   */
	  do_action( 'business_pro_action_before_header' );
	?>
		<?php
		/**
		 * Hook - business_pro_action_header.
		 *
		 * @hooked business_pro_site_branding - 10
		 */
		do_action( 'business_pro_action_header' );
		?>
    <?php
	  /**
	   * Hook - business_pro_action_after_header.
	   *
	   * @hooked business_pro_header_end - 10
	   */
	  do_action( 'business_pro_action_after_header' );
	?>

	<?php
	/**
	 * Hook - business_pro_action_before_content.
	 *
	 * @hooked business_pro_content_start - 10
	 */
	do_action( 'business_pro_action_before_content' );
	?>

	<!-- <?php
	  /**
	   * Hook - business_pro_action_content.
	   */
	  do_action( 'business_pro_action_content' );
	?> -->
