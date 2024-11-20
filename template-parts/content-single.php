<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business_pro
 */

?>

<div class="container-fluid" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
            <div class="row" style="display: flex; flex-wrap: nowrap;">
                <?php
                    $business_pro_global_layout = business_pro_get_option( 'business_pro_global_layout' );
                    $business_pro_global_layout = apply_filters( 'business_pro_filter_theme_global_layout', $business_pro_global_layout );
                    if ( 'no-sidebar' !== $business_pro_global_layout ) {
                        echo '<div class="col-lg-9"> ';
                    }
                    elseif ( 'no-sidebar' == $business_pro_global_layout ) {
                        echo '<div class="col-lg-12"> ';
                    }
                ?>
                    <br>
                    <div class="position-relative mb-3">
                        <?php do_action( 'business_pro_single_image' );?>
                        
                        <div class="bg-white border border-top-0 p-4">

                            <?php the_title( '<h1 class="mb-3 text-secondary text-uppercase font-weight-bold">', '</h1>' ); ?>

                            <?php the_content(); ?>

                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-education' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <?php business_pro_entry_footer() ?>
                            <?php edit_post_link( esc_html__( 'Edit', 'business-pro' ), '<span class="edit-link"><i class="fas fa-edit" style="color: var(--primary-color);"></i>', '</span>' ); ?>
                        </div>
                    </div>
                    
                
                
	
