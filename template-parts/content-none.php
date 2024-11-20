<?php
/**
 * Template part for displaying a message that posts cannot be found.
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
					<header class="section-title mb-0">
						<h1 class="m-0 text-uppercase font-weight-bold"><?php esc_html_e( 'Nothing Found', 'school-education' ); ?></h1>
					</header>
					<div class="bg-white border border-top-0 p-4 mb-3">
						<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
							<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'school-education' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
						<?php elseif ( is_search() ) : ?>
							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'school-education' ); ?></p>
							<?php get_search_form(); ?>
						<?php else : ?>
							<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'school-education' ); ?></p>
							<?php get_search_form(); ?>

						<?php endif; ?>
					</div>
				</div>
			