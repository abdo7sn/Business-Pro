<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business_pro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>


        <div class="mb-3">
            <?php if ( have_comments() ) : ?>
                <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">
                            <?php
                                $comments_number = get_comments_number();
                                if ( '1' === $comments_number ) {
                                    printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'school-education' ), get_the_title() );
                                } else {
                                    printf(
                                        _nx(
                                            '%1$s Reply to &ldquo;%2$s&rdquo;',
                                            '%1$s Replies to &ldquo;%2$s&rdquo;',
                                            $comments_number,
                                            'comments title',
                                            'school-education'
                                        ),
                                        number_format_i18n( $comments_number ),
                                        get_the_title()
                                    );
                                }
                            ?>
                        </h4>
                </div>
                <div class="bg-white border border-top-0 p-4">
                    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                        <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'business-pro' ); ?></h2>
                            <div class="nav-links">
                                <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'sbusiness-pro' ) ); ?></div>
                                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'business-pro' ) ); ?></div>
                            </div>
                        </nav>
                    <?php endif; ?>
                        <ol class="comment-list">
                            <?php
                                wp_list_comments( array(
                                    'style'      => 'ol',
                                    'short_ping' => true,
                                ) );
                            ?>
                        </ol>
                    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'business-pro' ); ?></h2>
                            <div class="nav-links">
                                <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'business-pro' ) ); ?></div>
                                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'business-pro' ) ); ?></div>
                            </div>
                        </nav>
                    <?php endif;?>
                    </div>
                    
            <?php endif; ?>
                <?php
                if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
                ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'business-pro' ); ?></p>
                <?php endif; ?>
            <?php comment_form(); ?>
        </div>
    </div>