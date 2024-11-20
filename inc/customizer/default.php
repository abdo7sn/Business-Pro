<?php
/**
 * Default theme options.
 *
 * @package business_pro
 */

if ( ! function_exists( 'business_pro_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function business_pro_get_default_theme_options() {

		$defaults = array();

		// General Option
        $defaults['business_pro_show_scroll_to_top']          = true;
        $defaults['business_pro_show_preloader_setting']      = false;
        $defaults['business_pro_show_data_sticky_setting']    = false;

		// Typography
		$defaults['business_pro_body_font_family']         = '';
		$defaults['business_pro_h1_font_family']          	= '';
		$defaults['business_pro_h1_font_size']         	= '';
		$defaults['business_pro_h2_font_family']          	= '';
		$defaults['business_pro_h2_font_size']         	= '';
		$defaults['business_pro_h3_font_family']          	= '';
		$defaults['business_pro_h3_font_size']         	= '';
		$defaults['business_pro_h4_font_family']          	= '';
		$defaults['business_pro_h4_font_size']         	= '';
		$defaults['business_pro_h5_font_family']          	= '';
		$defaults['business_pro_h5_font_size']         	= '';
		$defaults['business_pro_h6_font_family']          	= '';
		$defaults['business_pro_h6_font_size']         	= '';

		// Global Color
		$defaults['business_pro_first_color']          = '#FFCC00';

        // Post Option
        $defaults['business_pro_show_post_date_setting']         			 = true;
        $defaults['business_pro_show_post_heading_setting']      			 = true;
        $defaults['business_pro_show_post_content_setting']       			 = true;
        $defaults['business_pro_show_post_admin_setting']         		 = true;
        $defaults['business_pro_show_post_categories_setting']    		 = true;
        $defaults['business_pro_show_post_comments_setting']    	 	 = true;
        $defaults['business_pro_show_post_featured_image_setting']   	 = true;
        $defaults['business_pro_show_post_tags_setting']    			 = true;

		// Header.
		$defaults['business_pro_show_title']            = true;
		$defaults['business_pro_show_tagline']          = false;
		$defaults['business_pro_show_social_in_header'] = false;
		$defaults['business_pro_search_in_header']      = true;

		// Layout.
		$defaults['business_pro_global_layout']           = 'right-sidebar';
		$defaults['business_pro_archive_layout']          = 'excerpt';
		$defaults['business_pro_archive_image']           = 'large';
		$defaults['business_pro_archive_image_alignment'] = 'center';
		$defaults['business_pro_single_image']            = 'large';

		// Home Page.
		$defaults['business_pro_home_content_status'] = true;
		
		// 404 page
		$defaults['business_pro_404_page_title']  = esc_html__( 'Oops! That page can&rsquo;t be found.', 'business-pro' );
		$defaults['business_pro_404_page_text']  = esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'business-pro' );

		// Footer.
		$defaults['business_pro_copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'business-pro' );
		$defaults['business_pro_copyright_text_font_size'] = '18';
		$defaults['business_pro_copyright_text_align'] = 'center';

		// Pass through filter.
		$defaults = apply_filters( 'business_pro_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
