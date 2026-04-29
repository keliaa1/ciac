<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_ecology_nature_dismissed_notice_handler', 'ecology_nature_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function ecology_nature_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function ecology_nature_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {?>

            <?php
            $current_screen = get_current_screen();
				if ( $current_screen->id !== 'appearance_page_ecology-nature-guide-page' && $current_screen->id != 'migy_image_gallery_page_migy_templates' ) {
             $ecology_nature_comments_theme = wp_get_theme(); ?>
            <div class="ecology-nature-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
			<div class="ecology-nature-notice">
				<div class="ecology-nature-notice-img">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'ecology-nature'); ?>">
				</div>
				<div class="ecology-nature-notice-content">
					<div class="ecology-nature-notice-heading"><?php esc_html_e('Thanks for installing ','ecology-nature'); ?><?php echo esc_html( $ecology_nature_comments_theme ); ?></div>
					<p><?php printf(__('To avail the benefits of the premium edition, kindly click on <a href="%s">More Options</a>.', 'ecology-nature'), esc_url(admin_url('themes.php?page=ecology-nature-guide-page'))); ?></p>
					<?php if (is_child_theme()) { ?>
						<?php $child_theme = wp_get_theme(); ?>
						<?php printf(esc_html__('You\'re using %1$s theme, It\'s a child theme of %2$s.', 'ecology-nature'), '<strong>' . $child_theme->Name . '</strong>', '<strong>' . esc_html__('Ecology Nature', 'ecology-nature') . '</strong>'); 
						?>
						
					<?php } ?>
				</div>
			</div>
		</div>
        <?php }
	}
}

add_action( 'admin_notices', 'ecology_nature_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'ecology_nature_getting_started' );
function ecology_nature_getting_started() {
	add_theme_page( esc_html__('Get Started', 'ecology-nature'), esc_html__('Get Started', 'ecology-nature'), 'edit_theme_options', 'ecology-nature-guide-page', 'ecology_nature_test_guide');
	wp_enqueue_script( 'ecology-nature-admin-script', get_template_directory_uri() . '/js/ecology-nature-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'ecology-nature-admin-script', 'ecology_nature_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}

function ecology_nature_admin_enqueue_scripts() {
	wp_enqueue_style( 'ecology-nature-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'ecology_nature_admin_enqueue_scripts' );

if (! defined( 'ECOLOGY_NATURE_DOCS_FREE' ) ){
define('ECOLOGY_NATURE_DOCS_FREE',__('https://demo.misbahwp.com/docs/ecology-nature-free-docs/','ecology-nature'));
}
if (! defined( 'ECOLOGY_NATURE_DOCS_PRO' ) ){
define('ECOLOGY_NATURE_DOCS_PRO',__('https://demo.misbahwp.com/docs/ecology-nature-pro-docs','ecology-nature'));
}
if (! defined( 'ECOLOGY_NATURE_BUY_NOW' ) ){
define('ECOLOGY_NATURE_BUY_NOW',__('https://www.misbahwp.com/products/ecology-nature-wordpress-theme','ecology-nature'));
}
if (! defined( 'ECOLOGY_NATURE_SUPPORT_FREE' ) ){
define('ECOLOGY_NATURE_SUPPORT_FREE',__('https://wordpress.org/support/theme/ecology-nature','ecology-nature'));
}
if (! defined( 'ECOLOGY_NATURE_REVIEW_FREE' ) ){
define('ECOLOGY_NATURE_REVIEW_FREE',__('https://wordpress.org/support/theme/ecology-nature/reviews/#new-post','ecology-nature'));
}
if (! defined( 'ECOLOGY_NATURE_DEMO_PRO' ) ){
define('ECOLOGY_NATURE_DEMO_PRO',__('https://demo.misbahwp.com/ecology-nature-pro/','ecology-nature'));
}
if (! defined( 'ECOLOGY_NATURE_THEME_NAME' ) ){
define('ECOLOGY_NATURE_THEME_NAME',__('Upgrade to Ecology Nature PRO','ecology-nature'));
}
if ( ! defined( 'ECOLOGY_NATURE_DEMO_LINK_URL' ) ) {
    define( 'ECOLOGY_NATURE_DEMO_LINK_URL', 'https://demo.misbahwp.com/ecology-nature-pro/' );
}	
if( ! defined( 'ECOLOGY_NATURE_THEME_BUNDLE' ) ) {
define('ECOLOGY_NATURE_THEME_BUNDLE',__('https://www.misbahwp.com/products/wordpress-bundle','ecology-nature'));
}

function ecology_nature_test_guide() { ?>
	<?php $ecology_nature_theme = wp_get_theme(); ?>
	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( ECOLOGY_NATURE_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'ecology-nature' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'ecology-nature' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( ECOLOGY_NATURE_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'ecology-nature' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( ECOLOGY_NATURE_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'ecology-nature' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','ecology-nature'); ?><?php echo esc_html( $ecology_nature_theme ); ?>  <span><?php esc_html_e('Version: ', 'ecology-nature'); ?><?php echo esc_html($ecology_nature_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $ecology_nature_theme->get_screenshot() ); ?>" />
				<div id="description-insidee">
					<?php
						$ecology_nature_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $ecology_nature_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>
		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'ecology-nature' ); ?></h3>
				<div class="insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','ecology-nature'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( ECOLOGY_NATURE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'ecology-nature' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( ECOLOGY_NATURE_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'ecology-nature' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( ECOLOGY_NATURE_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'ecology-nature' ) ?></a>
					</div>
				</div>
				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'ecology-nature' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $99."','ecology-nature'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 80+ WordPress Themes At 15% Off','ecology-nature'); ?><span class="coupon-code"><?php esc_html_e('"Bundleup15"','ecology-nature'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( ECOLOGY_NATURE_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'ecology-nature' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','ecology-nature'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','ecology-nature'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','ecology-nature'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Secton Reordering','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple HomePage','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','ecology-nature'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
