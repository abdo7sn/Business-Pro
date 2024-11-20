<?php
/**
 * Custom template tags for this theme.
 *
 * @package business_pro
 */

if ( ! function_exists( 'business_pro_entry_footer' ) ) :
    function business_pro_entry_footer() {
		$business_pro_show_meta_author = true;
		if ( 'post' === get_post_type() ) {
			$posted_on = '';
			if ( is_single() ) {
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
				}

				$time_string = sprintf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ),
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date() )
				);

				$posted_on = sprintf(
					'%s',
					'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
				);
			}
			if ( ! empty( $posted_on ) ) {
				echo '<span class="posted-on"><i class="far fa-clock mr-1" style="color: var(--primary-color);"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.
			}

			$byline = '';
			$business_pro_show_post_admin = business_pro_get_option( 'business_pro_show_post_admin_setting' );
			if ( true === $business_pro_show_meta_author ) {
				if ( true === $business_pro_show_post_admin ) { 
						$byline = sprintf(
							'%s',
							'<span class="author vcard"><i class="far fa-user mr-1" style="color: var(--primary-color);"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
						);
				}
			}
			if ( ! empty( $byline ) ) {
				echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
			}
		}

		// Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
			
			$business_pro_show_meta_categories = true;
			$business_pro_show_post_categories = business_pro_get_option( 'business_pro_show_post_categories_setting' );
			if ( true === $business_pro_show_post_categories) {
				if ( true === $business_pro_show_meta_categories ) {
					/* Translators: used between list items, there is a space after the comma. */
					$business_pro_categories_list = get_the_category_list( esc_html__( ', ', 'business-pro' ) );
					if ( $business_pro_categories_list && business_pro_categorized_blog() ) {
						printf( '<span class="cat-links"><i class="fas fa-folder-open mr-1" style="color: var(--primary-color);"></i>%1$s</span>', $business_pro_categories_list ); // WPCS: XSS OK.
					}
				}
			}
			$business_pro_show_meta_tags = true;
			$business_pro_show_meta_tags = business_pro_get_option( 'business_pro_show_post_tags_setting' );
			if ( true === $business_pro_show_meta_tags) {
				if ( true === $business_pro_show_meta_tags ) {
					/* Translators: used between list items, there is a space after the comma. */
					$business_pro_tags_list = get_the_tag_list( '', esc_html__( ', ', 'business-pro' ) );
					if ( $business_pro_tags_list ) {
						printf( '<span class="tags-links"><i class="fas fa-tags mr-1" style="color: var(--primary-color);"></i>%1$s</span>', $business_pro_tags_list ); // WPCS: XSS OK.
					}
				}
			}
			
        }

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			$business_pro_show_post_comments = business_pro_get_option( 'business_pro_show_post_comments_setting' );
			if ( true === $business_pro_show_post_comments) { 
				$business_pro_show_post_comments = true;
				if ( true === $business_pro_show_post_comments ) {
					echo '<div class="d-flex align-items-center">';
					printf(
						'<span class="ml-3 badge badge-primary p-2 mr-2 " style="color: #fff;"><i class="far fa-comment mr-2"></i><a class="url fn n" style="color: #fff;">%s</a></span>',
						esc_html( get_comments_number() )
					);
					echo '</div>';
				}
			}
		}

    }
endif;


if ( ! function_exists( 'business_pro_entry_meta_date' ) ) :

	/**
	 * Prints HTML with date meta.
	 */
	function business_pro_entry_meta_date() {
		?>
		<?php $business_pro_show_post_date = business_pro_get_option( 'business_pro_show_post_date_setting' );
		if ( true === $business_pro_show_post_date ) { ?>
			<div class="custom-entry-date badge badge-primary text-uppercase p-4 mr-3" style="color: #fff; font-size:20px;">
				<span class="entry-month"><?php the_time( _x( 'M', 'date format', 'business-pro' ) ); ?></span>
				<span class="entry-day"><?php the_time( _x( 'd', 'date format', 'business-pro' ) ); ?></span>
			</div>
		<?php } ?>
		<?php
	}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function business_pro_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'business_pro_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'business_pro_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so business_pro_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so business_pro_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in business_pro_categorized_blog.
 */
function business_pro_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'business_pro_categories' );
}
add_action( 'edit_category', 'business_pro_category_transient_flusher' );
add_action( 'save_post',     'business_pro_category_transient_flusher' );

/**
 * Display single taxonomy link.
 *
 * Used inside loop only.
 *
 * @since 1.0.0
 *
 * @param string $taxonomy Taxonomy slug.
 * @param string $before   HTML to place before.
 * @param string $after    HTML to place after.
 * @param int    $post_id  Post ID.
 */
function business_pro_the_term_link_single( $taxonomy = 'category', $before = '', $after = '', $post_id = false ) {

	// Bail if post is not related to taxonomy.
	if ( ! is_object_in_taxonomy( get_post_type( $post_id ), $taxonomy ) ) {
		return;
	}

	$post = get_post( $post_id );

	// Bail if not valid post.
	if ( ! is_a( $post, 'WP_Post' ) ) {
		return;
	}

	$terms = wp_get_post_terms( $post->ID, $taxonomy );

	// Bail if no terms available.
	if ( empty( $terms ) ) {
		return;
	}

	// Sort the terms by ID and get the first category.
	if ( function_exists( 'wp_list_sort' ) ) {
		$terms = wp_list_sort( $terms, 'term_id' );
	}
	else {
		usort( $terms, '_usort_terms_by_ID' );
	}

	$term = array_shift( $terms );

	$link = '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';

	$link = $before . $link . $after;

	echo $link;

}
