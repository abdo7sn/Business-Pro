<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package business_pro
 */

get_header(); ?>

<?php $business_pro_404_page_title = business_pro_get_option( 'business_pro_404_page_title' ); ?>
<?php $business_pro_404_page_text = business_pro_get_option( 'business_pro_404_page_text' ); ?>

    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <?php
                    $business_pro_global_layout = business_pro_get_option( 'business_pro_global_layout' );
                    $business_pro_global_layout = apply_filters( 'business_pro_filter_theme_global_layout', $business_pro_global_layout );
                    if ( 'no-sidebar' !== $business_pro_global_layout ) {
                        echo '<div class="col-lg-8">';
                    }
                    elseif ( 'no-sidebar' == $business_pro_global_layout ) {
                        echo '<div class="col-lg-12">';
                    }
                ?>
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold"><?php echo esc_html($business_pro_404_page_title);?></h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <p ><?php echo esc_html($business_pro_404_page_text);?></p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>