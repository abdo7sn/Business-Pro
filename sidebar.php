<?php
/**
 * The Primary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business_pro
 */

?>      
  
            <?php $default_sidebar = apply_filters( 'business_pro_filter_default_sidebar_id', 'sidebar-1', 'primary' ); ?>
                <?php if ( is_active_sidebar( $default_sidebar ) ) : ?>
                    <div class="mb-3">
                        <div class="bg-white border border-top-0 p-3">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border">
                                <ul style="margin-top: 20px;">
                                    <?php dynamic_sidebar( $default_sidebar ); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php else : ?>

                    <!-- Search Start -->
                    <div class="mb-3">                        
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold"><?php esc_html_e('Search', 'business-pro'); ?></h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    <!-- Search End -->

                    <!-- Archive Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold"><?php esc_html_e('Archive', 'business-pro'); ?></h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border">
                                    <ul style="margin-top: 20px;">
                                        <?php $archives = wp_get_archives(array('type' => 'monthly', 'show_post_count' => true, 'echo' => false)); 

                                        $archives_items = explode('<br>', $archives);

                                        foreach ($archives_items as $item) {
                                            if (trim($item) !== '') {
                                                echo str_replace('<a', '<a class="h6 m-0 text-secondary text-uppercase font-weight-bold"', $item);
                                            }
                                        }
                                        
                                        ?>
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <!-- Archive End -->
                     
                    <!-- Recent Posts Start -->      
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold"><?php esc_html_e('Recent Posts', 'business-pro'); ?></h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border">
                                    <ul style="margin-top: 20px;">
                                        <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 5 );

                                            $recent_posts = new WP_Query($args);

                                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                                            ?>
                                            <li><a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                            <?php
                                            endwhile;
                                            wp_reset_postdata(); // Reset the query

                                        ?>
                                    </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Recent Posts End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold"><?php esc_html_e('Tags', 'school-education'); ?></h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <?php
                                $tags = get_tags(array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => true,
                                ));

                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="btn btn-sm btn-outline-secondary m-1">' . esc_html($tag->name) . '</a>';
                                    }
                                } else {
                                    echo  esc_html__('No tags found', 'school-education');
                                }
                            ?>
                        </div>
                    </div>
                    <!-- Tags End -->

                <?php endif ?>
         