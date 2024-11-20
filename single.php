<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business_pro
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'single' ); ?>
            <?php
                the_post_navigation( array(
                    'next_text' => '<div class="section-title">' .
                                    '<h4 class="m-0 text-uppercase font-weight-bold">' . __( 'Next', 'business-pro' ) . '</h4>' .
                                    '<div class="taxonomy-description screen-reader-text">' . __( 'Next post:', 'business-pro' ) . '</div>' .
                                    '<h6 class="m-0 text-uppercase font-weight-bold post-title">%title</h6>' .
                                    '</div>',
                    'prev_text' => '<div class="section-title">' .
                                    '<h4 class="m-0 text-uppercase font-weight-bold">' . __( 'Previous', 'business-pro' ) . '</h4>' .
                                    '<div class="taxonomy-description screen-reader-text">' . __( 'Previous post:', 'sbusiness-pro' ) . '</div>' .
                                    '<h6 class="m-0 text-uppercase font-weight-bold post-title">%title</h6>' .
                                    '</div>',
                ) );
            ?>
            <?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
            <div class="col-lg-4">
                <br>
                <?php do_action( 'business_pro_action_sidebar' );?>
            </div>
            
        <?php endwhile; // End of the loop. ?>
        </main>
    </div>
    
<?php get_footer(); ?>
