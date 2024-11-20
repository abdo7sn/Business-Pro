<?php
/**
 * The Secondary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business_pro
 */

?>
<?php $business_pro_default_sidebar = apply_filters( 'business_pro_filter_default_sidebar_id', 'sidebar-2', 'secondary' ); ?>
	<?php if ( is_active_sidebar( $business_pro_default_sidebar ) ) : ?>

            <div class="mb-3">
                <div class="bg-white border border-top-0 p-3">
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border">
                        <ul style="margin-top: 20px;">
                            <?php dynamic_sidebar( $business_pro_default_sidebar ); ?>
                        </ul>
                    </div>
                </div>
            </div>
           

	<?php else : ?>
		<?php
			do_action( 'business_pro_action_default_sidebar', $business_pro_default_sidebar, 'secondary' );
		?>
	<?php endif ?>

<?php $business_pro_default_sidebar1 = apply_filters( 'business_pro_filter_default_sidebar_id1', 'sidebar-3', 'secondary' ); ?>
	<?php if ( is_active_sidebar( $business_pro_default_sidebar1 ) ) : ?>
                <div class="mb-3">
                    <div class="bg-white border border-top-0 p-3">
                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border">
                            <ul style="margin-top: 20px;">
                                <?php dynamic_sidebar( $business_pro_default_sidebar1 ); ?>
                            </ul>
                        </div>
                    </div>
                </div>
		   
	<?php else : ?>
		<?php
			do_action( 'business_pro_action_default_sidebar1', $business_pro_default_sidebar1, 'secondary' );
		?>
	<?php endif ?>
