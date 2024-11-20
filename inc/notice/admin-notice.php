<?php
$theme = wp_get_theme();

$screen = get_current_screen();
if ( ! empty( $screen->base ) && 'appearance_page_business-pro-getting-started' === $screen->base ) {
	return false;
}

?>
<div class="notice notice-success is-dismissible business-pro-admin-notice">
	<div class="business-pro-admin-notice-wrapper">
		<h2><?php esc_html_e( 'Thank you for selecting ', 'business-pro' ); ?> <?php echo $theme->get( 'Name' ); ?> <?php esc_html_e( 'Theme!', 'business-pro' ); ?></h2>
		<p><?php esc_html_e( 'Explore the benefits of our simple Demo Importer and automatic Plugin Installation. Click the button below to begin.', 'business-pro' ); ?></p>
		<span class="admin-2-btn" >
			<a class="button-secondary" style="margin-bottom: 15px; margin-right: 10px; " href="<?php echo esc_url( admin_url( 'themes.php?page=business-pro-getting-started' ) ); ?>"><?php esc_html_e( 'Import Theme Demo', 'business-pro' ); ?></a>
	        <a class="button-primary" style="margin-bottom: 15px; " href="<?php echo esc_url('https://abdou.7sn.co/'); ?>" target="_blank"><?php esc_html_e('Get School Education Pro', 'business-pro'); ?></a>
        </span>
	</div>
</div>