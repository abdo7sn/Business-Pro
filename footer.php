<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business_pro
 */



	/**
	 * Hook - business_pro_action_after_content.
	 *
	 * @hooked business_pro_content_end - 10
	 */
	do_action( 'business_pro_action_after_content' );
?>

	<?php
	/**
	 * Hook - business_pro_action_before_footer.
	 *
	 * @hooked business_pro_add_footer_bottom_widget_area - 5
	 * @hooked business_pro_footer_start - 10
	 */
	do_action( 'business_pro_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - business_pro_action_footer.
	   *
	   * @hooked business_pro_footer_copyright - 10
	   */
	  do_action( 'business_pro_action_footer' );
	?>
	<?php
	/**
	 * Hook - business_pro_action_after_footer.
	 *
	 * @hooked business_pro_footer_end - 10
	 */
	do_action( 'business_pro_action_after_footer' );
	?>

<?php
	/**
	 * Hook - business_pro_action_after.
	 *
	 * @hooked business_pro_page_end - 10
	 * @hooked business_pro_footer_goto_top - 20
	 */
	do_action( 'business_pro_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
