<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package business_pro
 */

if ( ! function_exists( 'business_pro_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function business_pro_implement_excerpt_length( $length ) {

		$excerpt_length = business_pro_get_option( 'business_pro_excerpt_length' );
		$excerpt_length = apply_filters( 'business_pro_filter_excerpt_length', $excerpt_length );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}

		return $length;

	}

endif;

if ( ! function_exists( 'business_pro_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function business_pro_implement_read_more( $more ) {

		$flag_apply_excerpt_read_more = apply_filters( 'business_pro_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more;
		}

		$output = $more;
		$read_more_text = business_pro_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$output = ' <a href="'. esc_url( get_permalink() ) . '" class="read-more">' . esc_html( $read_more_text ) . '</a>';
			$output = apply_filters( 'business_pro_filter_read_more_link' , $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'business_pro_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function business_pro_content_more_link( $more_link, $more_link_text ) {

		$flag_apply_excerpt_read_more = apply_filters( 'business_pro_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more_link;
		}

		$read_more_text = business_pro_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}
		return $more_link;

	}

endif;

if ( ! function_exists( 'business_pro_featured_image_instruction' ) ) :

	/**
	 * Message to show in the Featured Image Meta box.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Admin post thumbnail HTML markup.
	 * @param int    $post_id Post ID.
	 * @return string HTML.
	 */
	function business_pro_featured_image_instruction( $content, $post_id ) {

		$allowed = array( 'post', 'page' );
		if ( in_array( get_post_type( $post_id ), $allowed ) ) {
			$content .= '<strong>' . __( 'Recommended Image Sizes', 'business-pro' ) . ':</strong><br/>';
			$content .= __( 'Slider Image', 'business-pro' ) . ' : 1350px X 590px';
		}

		return $content;

	}

endif;
add_filter( 'admin_post_thumbnail_html', 'business_pro_featured_image_instruction', 10, 2 );

if ( ! function_exists( 'business_pro_custom_content_width' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.0.0
	 */
	function business_pro_custom_content_width() {

		global $post, $wp_query, $content_width;

		$business_pro_global_layout = business_pro_get_option( 'business_pro_global_layout' );
		$business_pro_global_layout = apply_filters( 'business_pro_filter_theme_global_layout', $business_pro_global_layout );

		// Check if single.
		if ( $post  && is_singular() ) {
		  $business_pro_post_options = get_post_meta( $post->ID, 'business_pro_theme_settings', true );
		  if ( isset( $business_pro_post_options['business_pro_post_layout'] ) && ! empty( $business_pro_post_options['business_pro_post_layout'] ) ) {
		    $business_pro_global_layout = esc_attr( $business_pro_post_options['business_pro_post_layout'] );
		  }
		}
		switch ( $business_pro_global_layout ) {

			case 'no-sidebar':
				$content_width = 1140;
				break;

			case 'three-columns':
				$content_width = 525;
				break;

			case 'four-columns':
				$content_width = 525;
				break;

			case 'left-sidebar':
			case 'right-sidebar':
				$content_width = 771;
				break;

			default:
				break;
		}

	}
endif;

add_filter( 'template_redirect', 'business_pro_custom_content_width' );

if ( ! function_exists( 'business_pro_hook_read_more_filters' ) ) :

	/**
	 * Hook read more filters.
	 *
	 * @since 1.0.0
	 */
	function business_pro_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() ) {

			add_filter( 'excerpt_length', 'business_pro_implement_excerpt_length', 999 );
			add_filter( 'the_content_more_link', 'business_pro_content_more_link', 10, 2 );
			add_filter( 'excerpt_more', 'business_pro_implement_read_more' );

		}
	}
endif;

add_action( 'wp', 'business_pro_hook_read_more_filters' );
