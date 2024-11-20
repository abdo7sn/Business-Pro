<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package business_pro
 */

if ( ! function_exists( 'business_pro_skip_to_content' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function business_pro_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-pro' ); ?></a><?php
	}
endif;

add_action( 'business_pro_action_before', 'business_pro_skip_to_content', 15 );

// Middle Header

if ( ! function_exists( 'business_pro_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function business_pro_site_branding() {
		$business_pro_header_top_text = business_pro_get_option( 'business_pro_header_top_text' );
		$business_pro_header_top_button_text = business_pro_get_option( 'business_pro_header_top_button_text' );
		$business_pro_header_top_button_link = business_pro_get_option( 'business_pro_header_top_button_link' );

		$business_pro_header_top_myacount_btn_link = business_pro_get_option( 'business_pro_header_top_myacount_btn_link' );
	
		$business_pro_data_sticky = business_pro_get_option( 'business_pro_show_data_sticky_setting' );

		?>
		
		<div class="topheader">
			<div class="container">
				<?php if( !empty($business_pro_header_top_text) || !empty($business_pro_header_top_button_text) || !empty($business_pro_header_top_button_text) ):?>
					<p class="mb-0"><?php echo esc_html($business_pro_header_top_text);?>           
					<a href="<?php echo esc_url($business_pro_header_top_button_link);?>"><?php echo esc_html($business_pro_header_top_button_text);?></a></p>
				<?php endif; ?>
			</div>
		</div>
		<!-- Topbar Start -->
		<div class="container-fluid d-none d-lg-block">
			<div class="row align-items-center bg-white py-3 px-3 px-lg-5">
					<?php $business_pro_show_title = business_pro_get_option( 'business_pro_show_title' ); ?>
					<?php $business_pro_show_tagline = business_pro_get_option( 'business_pro_show_tagline' ); ?>
					<?php if ( true === $business_pro_show_title || true === $business_pro_show_tagline ) :  ?>
						<div class="col-12 col-sm-6 text-center">
							<?php if ( true === $business_pro_show_title ) :  ?>
								<?php if ( is_front_page() ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand p-0 d-none d-lg-block" style="margin-left: 550px;">
										<h1 class="m-0 display-4 text-uppercase text-primary site-title"><?php bloginfo( 'name' ); ?></h1>
									</a>
								<?php else : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand p-0 d-none d-lg-block" style="margin-left: 550px;">
										<h1 class="m-0 display-4 text-uppercase text-primary site-title"><?php bloginfo( 'name' ); ?></h1>
									</a>				    
								<?php endif; ?>
							<?php endif; ?>
							<?php if ( true === $business_pro_show_tagline ) :  ?>
									<p class="site-description "><?php bloginfo( 'description' ); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>
			</div>
		</div>
        <!-- Topbar End -->
    
		<!-- Navbar Start -->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
                <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
					<div class="navbar-nav mr-auto py-0" style="margin-left: 50px;">
						<?php 
							$pages = get_pages();
							$menu_items = array();

							foreach ($pages as $page) {
								$menu_items[$page->post_title] = get_permalink($page->ID);
							}

							foreach ($menu_items as $title => $link) {
								$active_class = (is_page($title)) ? ' active' : '';
								echo '<a href="' . esc_url($link) . '" class="nav-item nav-link' . esc_attr($active_class) . '">' . esc_html($title) . '</a>';
							}
						?>
					</div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

	    <?php
	}

endif;

add_action( 'business_pro_action_header', 'business_pro_site_branding' );

/////////////////////////////////// copyright start /////////////////////////////

if ( ! function_exists( 'business_pro_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function business_pro_footer_copyright() {

		// Check if footer is disabled.
		$business_pro_footer_status = apply_filters( 'business_pro_filter_footer_status', true );
		if ( true !== $business_pro_footer_status ) {
			return;
		}

		// Copyright content.
		$business_pro_copyright_text = business_pro_get_option( 'business_pro_copyright_text' );
		$business_pro_copyright_text = apply_filters( 'business_pro_filter_copyright_text', $business_pro_copyright_text );
		if ( ! empty( $business_pro_copyright_text ) ) {
			$business_pro_copyright_text = wp_kses_data( $business_pro_copyright_text );
		}

		// Powered by content.
		$business_pro_powered_by_text = sprintf( __( 'Business Pro by %s', 'business-pro' ), '<span>' . __( 'Abdou7sn', 'business-pro' ) . '</span>' );
		?>

		<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
		    <?php if ( ! empty( $business_pro_copyright_text ) ) : ?>
			    <p class="m-0 text-center copyright-text"><?php echo $business_pro_copyright_text; ?>
		    <?php endif; ?>

		    <?php if ( ! empty( $business_pro_powered_by_text ) ) : ?>
				<a href="<?php echo esc_url('https://','business-pro'); ?>"><?php echo $business_pro_powered_by_text; ?></a></p>
		    <?php endif; ?>

		</div>

		
	    <?php
	}

endif;

add_action( 'business_pro_action_footer', 'business_pro_footer_copyright', 10 );

//////////////////////////////////////// sidebar /////////////////////////////////

if ( ! function_exists( 'business_pro_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function business_pro_add_sidebar() {

		global $post;

		$business_pro_global_layout = business_pro_get_option( 'business_pro_global_layout' );
		$business_pro_global_layout = apply_filters( 'business_pro_filter_theme_global_layout', $business_pro_global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$business_pro_post_options = get_post_meta( $post->ID, 'business_pro_theme_settings', true );
			if ( isset( $business_pro_post_options['post_layout'] ) && ! empty( $business_pro_post_options['business_pro_post_layout'] ) ) {
				$business_pro_global_layout = $business_pro_post_options['business_pro_post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $business_pro_global_layout ) {
			get_sidebar();
		}
		
		// Include Secondary sidebar.
		switch ( $business_pro_global_layout ) {
			case 'three-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

		// Include Secondary sidebar 1.
		switch ( $business_pro_global_layout ) {
			case 'four-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

	}

endif;

add_action( 'business_pro_action_sidebar', 'business_pro_add_sidebar' );

//////////////////////////////////////// single page //////////////////////////////

if ( ! function_exists( 'business_pro_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function business_pro_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'business_pro_theme_settings', true );
			$business_pro_theme_settings_single_image = isset( $values['business_pro_single_image'] ) ? esc_attr( $values['business_pro_single_image'] ) : '';

			if ( ! $business_pro_theme_settings_single_image ) {
				$business_pro_theme_settings_single_image = business_pro_get_option( 'business_pro_single_image' );
			}

			if ( 'disable' !== $business_pro_theme_settings_single_image ) {
				// Get the image URL
				$image_url = get_the_post_thumbnail_url( $post->ID, 'full' );

				// Output the custom HTML structure for the image
				if ( $image_url ) {
					echo '<img class="img-fluid w-100" src="' . esc_url( $image_url ) . '" style="object-fit: cover;">';
				}
			}
		}

	}

endif;

add_action( 'business_pro_single_image', 'business_pro_add_image_in_single_display' );

if ( ! function_exists( 'business_pro_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function business_pro_footer_goto_top() {
        
        $business_pro_show_scroll_to_top = business_pro_get_option( 'business_pro_show_scroll_to_top' );
        if ( true === $business_pro_show_scroll_to_top ) :
		echo '<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up">' . esc_html__( '', 'business-pro' ) . '</i></a>';
		
		endif;

	}

endif;

add_action( 'business_pro_action_after', 'business_pro_footer_goto_top', 20 );
