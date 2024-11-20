<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business_pro
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<?php  ?>

				    <?php get_template_part( 'template-parts/content', 'search' ); ?>

                <div class="col-lg-4">
                    <br>
                    <?php do_action( 'business_pro_action_sidebar' ); ?>
                </div>

				<div class="navigation">
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
			    </div>
			<?php do_action( 'business_pro_action_posts_navigation' ); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</main>
	</div>
<?php get_footer(); ?>
