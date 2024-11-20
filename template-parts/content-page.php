<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business_pro
 */

?>

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
					<?php the_title( '<h4 class="m-0 text-uppercase font-weight-bold">', '</h4>' ); ?>
                </div>
				<div class="bg-white border border-top-0 p-4 mb-3">
					<div class="single-post-footer">
						<?php
						do_action( 'business_pro_single_image' );
						?>
					</div>
					<div class="entry-content-wrapper">
						<div class="entry-content">
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-pro' ),
									'after'  => '</div>',
								) );
							?>
						</div>
					</div>
					<footer class="entry-footer">
						<?php edit_post_link( esc_html__( 'Edit', 'business-pro' ), '<span class="edit-link"><i class="fas fa-edit" style="color: var(--primary-color);"></i>', '</span>' ); ?>
					</footer>
				</div>
			</div>
