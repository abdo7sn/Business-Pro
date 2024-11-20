<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business_pro
 */

?>
<br>
<div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <br>
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold"><?php printf( esc_html__( 'Search Results for: %s', 'school-education' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
                            </div>
                        </div>
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-lg-12">
                            <div class="position-relative mb-3">
                                <?php $business_pro_archive_layout = business_pro_get_option( 'business_pro_archive_layout' );
                                $business_pro_show_post_image = business_pro_get_option( 'business_pro_show_post_featured_image_setting' );
                                if ( true === $business_pro_show_post_image ) { ?>
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php
                                        $business_pro_archive_image           = business_pro_get_option( 'business_pro_archive_image' );
                                        $business_pro_archive_image_alignment = business_pro_get_option( 'business_pro_archive_image_alignment' );
                                        ?>
                                        <?php if ( 'disable' !== $business_pro_archive_image ) : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100', 'style' => 'object-fit: cover;')); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php }?>

                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <?php business_pro_entry_meta_date(); ?>
                                        <?php edit_post_link( esc_html__( 'Edit', 'business-pro' ), '<span class="edit-link"><i class="fas fa-edit" style="color: var(--primary-color);"></i>', '</span>' ); ?>
                                    </div>
                                    <?php $business_pro_show_post_heading = business_pro_get_option( 'business_pro_show_post_heading_setting' );
                                    if ( true === $business_pro_show_post_heading ) { ?>
                                        <header class="entry-header">
                                            <?php the_title( sprintf( '<a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
                                        </header>
                                    <?php } ?>

                                    <?php $business_pro_show_post_content = business_pro_get_option( 'business_pro_show_post_content_setting' );
                                    if ( true === $business_pro_show_post_content ) { ?>
                                        <div class="text-content">
                                            <?php if ( 'full' === $business_pro_archive_layout ) : ?>
                                                <?php
                                                    the_content( sprintf(
                                                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'your-text-domain' ), array( 'span' => array( 'class' => array() ) ) ),
                                                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                                    ) );
                                                ?>
                                                <?php
                                                    wp_link_pages( array(
                                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-education' ),
                                                        'after'  => '</div>',
                                                    ) );
                                                ?>
                                            <?php else : ?>
                                                <?php the_excerpt(); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="d-flex flex-column flex-md-row justify-content-between bg-white border border-top-0 p-4">
                                    <?php business_pro_entry_footer() ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>

                    </div>
                </div>
