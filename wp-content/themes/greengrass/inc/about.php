<?php
/**
 * Theme About Page
 *
 * @package Greengrass
 * @since 1.0
 */

function greengrass_theme_page_admin_style( $hook ) {
	if ( 'appearance_page_greengrass-theme' === $hook ) {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style(
			'greengrass-theme-admin-style',
			get_theme_file_uri( 'assets/css/about-admin.css' ),
			array(),
			$version_string
		);
	}
}
add_action( 'admin_enqueue_scripts', 'greengrass_theme_page_admin_style' );

/**
 * Add theme page
 */
function greengrass_menu() {
	add_theme_page( esc_html__( 'Greengrass', 'greengrass' ), esc_html__( 'Greengrass Theme Info', 'greengrass' ), 'edit_theme_options', 'greengrass-theme', 'greengrass_theme_page_display' );
}
add_action( 'admin_menu', 'greengrass_menu' );

/**
 * Display About page
 */
function greengrass_theme_page_display() {
	$theme = wp_get_theme();
	
	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	}
	?>
	
	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-header">
				<h2><?php echo esc_html( $theme->Name ); ?></h2>
				<p><?php esc_html_e( 'Free Full Site Editing WordPress Theme', 'greengrass' ); ?></p>
				<div class="logo-panel">
					<a href="<?php echo esc_url('https://flythemes.net/','greengrass'); ?>"><img src="<?php echo esc_url( get_template_directory_uri().'/images/flylogo.png' ); ?>"></a>
				</div>
			</div>
			
			<div class="welcome-panel-column-container">
				<div class="container-wrap">
					<div class="welcome-panel-column two-columns">
						<!-- <div class="welcome-panel-icon-pages"></div> -->
						<div class="welcome-panel-column-content">
							<h3><?php esc_html_e( 'Getting Started with Greengrass!', 'greengrass' ); ?></h3>
							<p><?php esc_html_e( 'Awesome! Greengrass has been installed and activated successfully. Now, you can start building your dream website with a wide range of highly-customizable block patterns, templates, and template parts available in this astounding theme.', 'greengrass' ); ?></p>
						</div>
					</div>
					
					<div class="welcome-panel-column two-columns">
						<div class="welcome-panel-column-content">
							<h3><?php esc_html_e( 'More Features with Greengrass Pro Theme', 'greengrass' ); ?></h3>
							<p><?php esc_html_e( 'To get more features and unique home page sections, we recommend you activate the Greengrass Pro. With the pro theme installed, get more options like google fonts, colors, sliders, page template, shortcodes and more.', 'greengrass' ); ?></p>
							<a target="_blank" class="button green button-primary button-hero green" href=<?php echo esc_url("https://flythemes.net/wordpress-themes/garden-wordpress-theme/"); ?>><?php esc_html_e( 'Buy Greengrass Pro', 'greengrass' ); ?></a>
						</div>
					</div>
					
				</div>
				<div class="sidebar">
					<div class="welcome-panel-column important-links">
					<!-- <div class="welcome-panel-icon-pages"></div> -->
					<div class="welcome-panel-column-content">
						<h3><?php esc_html_e( 'Important Links', 'greengrass' ); ?></h3>
						<a target="_blank" href="<?php echo esc_url( 'https://flythemes.net/wordpress-themes/garden-wordpress-theme/' ); ?>"><?php esc_html_e( 'Theme Info', 'greengrass' ); ?></a>
						<a target="_blank" href="http://flydemos.net/greengrass/"><?php esc_html_e( 'View Demo', 'greengrass' ); ?></a>
						<a target="_blank" href="<?php echo esc_url( 'https://flythemes.net/forums/' ); ?>"><?php esc_html_e( 'Support', 'greengrass' ); ?></a>
					</div>
				</div>
				
				<div class="welcome-panel-column review">
					<!-- <div class="welcome-panel-icon-pages"></div> -->
					<div class="welcome-panel-column-content">
						<h3><?php esc_html_e( 'Leave us a review', 'greengrass' ); ?></h3>
						<p><?php esc_html_e( 'Loved Greengrass? Feel free to leave your feedback. Your opinion helps us reach more audiences!', 'greengrass' ); ?></p>
						<a href="https://wordpress.org/support/theme/greengrass/reviews/" class="button button-primary button-hero" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Review', 'greengrass' ); ?></a>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
