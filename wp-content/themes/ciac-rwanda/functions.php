<?php
/**
 * CIAC-Rwanda Theme Functions
 */

if ( ! function_exists( 'ciac_rwanda_setup' ) ) :
	function ciac_rwanda_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list',
			'gallery', 'caption', 'style', 'script',
		));

		// Register Navigation Menus
		register_nav_menus( array(
			'menu-1'               => esc_html__( 'Primary Menu', 'ciac-rwanda' ),
			'footer-menu-explore'  => esc_html__( 'Footer Explore Menu', 'ciac-rwanda' ),
			'footer-menu-patterns' => esc_html__( 'Footer Key Partners Menu', 'ciac-rwanda' ),
		));
	}
endif;
add_action( 'after_setup_theme', 'ciac_rwanda_setup' );

/**
 * Enqueue scripts and styles.
 */
function ciac_rwanda_scripts() {
	$version = wp_get_theme()->get( 'Version' );
	$uri     = get_template_directory_uri();

	// Theme stylesheet (style.css in root - needed for WP theme identification)
	wp_enqueue_style( 'ciac-rwanda-base', get_stylesheet_uri(), array(), $version );

	// Main stylesheet
	wp_enqueue_style( 'ciac-rwanda-main', $uri . '/assets/css/style.css', array(), $version );

	// Page-specific stylesheets
	if ( is_page_template( 'template-about.php' ) ) {
		wp_enqueue_style( 'ciac-rwanda-team', $uri . '/assets/css/team.css', array(), $version );
	}

	if ( is_page_template( 'template-team.php' ) ) {
		wp_enqueue_style( 'ciac-rwanda-team', $uri . '/assets/css/team.css', array(), $version );
	}

	if ( is_page_template( 'template-projects.php' ) || is_post_type_archive( 'project' ) || is_singular( 'project' ) || is_singular( 'post' ) ) {
		wp_enqueue_style( 'ciac-rwanda-projects', $uri . '/assets/css/projects.css', array(), $version );
	}

	if ( is_page_template( 'template-newsletter.php' ) ) {
		wp_enqueue_style( 'ciac-rwanda-newsletter', $uri . '/assets/css/newsletter.css', array(), $version );
	}

	if ( is_page_template( 'template-contact.php' ) ) {
		wp_enqueue_style( 'ciac-rwanda-contact', $uri . '/assets/css/contact.css', array(), $version );
	}

	if ( is_404() ) {
		wp_enqueue_style( 'ciac-rwanda-404', $uri . '/assets/css/404.css', array(), $version );
	}
}
add_action( 'wp_enqueue_scripts', 'ciac_rwanda_scripts' );

// Include Custom Post Types
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/acf-fields.php';

// Add ACF Options Page
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Global Settings',
		'menu_title' => 'Global Settings',
		'menu_slug'  => 'acf-options-global-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
	));
}

/**
 * Helper: get theme asset URL for images
 */
function ciac_asset( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * Helper: get field with fallback
 */
function ciac_field( $key, $default = '', $post_id = false ) {
	if ( function_exists( 'get_field' ) ) {
		$val = $post_id ? get_field( $key, $post_id ) : get_field( $key );
		return $val ?: $default;
	}
	return $default;
}

/**
 * Contact Form Handler
 */
function ciac_handle_contact_form() {
	if ( ! isset( $_POST['ciac_contact_nonce'] ) || ! wp_verify_nonce( $_POST['ciac_contact_nonce'], 'ciac_contact_form' ) ) {
		wp_send_json_error( array( 'message' => 'Security check failed.' ) );
	}
	$name    = sanitize_text_field( $_POST['name'] ?? '' );
	$email   = sanitize_email( $_POST['email'] ?? '' );
	$subject = sanitize_text_field( $_POST['subject'] ?? 'General Inquiry' );
	$message = sanitize_textarea_field( $_POST['message'] ?? '' );

	$to      = get_option( 'admin_email' );
	$headers = array( 'Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $email );
	$body    = "<p><strong>From:</strong> {$name} ({$email})</p><p><strong>Subject:</strong> {$subject}</p><p><strong>Message:</strong><br>{$message}</p>";

	$sent = wp_mail( $to, 'CIAC Website: ' . $subject, $body, $headers );
	if ( $sent ) {
		wp_send_json_success( array( 'message' => 'Message sent!' ) );
	} else {
		wp_send_json_error( array( 'message' => 'Failed to send email.' ) );
	}
}
add_action( 'admin_post_ciac_contact_form', 'ciac_handle_contact_form' );
add_action( 'admin_post_nopriv_ciac_contact_form', 'ciac_handle_contact_form' );

/**
 * Newsletter Subscription Handler
 */
function ciac_handle_newsletter_subscribe() {
	if ( ! isset( $_POST['ciac_nonce'] ) || ! wp_verify_nonce( $_POST['ciac_nonce'], 'ciac_newsletter_subscribe' ) ) {
		wp_send_json_error( array( 'message' => 'Security check failed.' ) );
	}
	$email = sanitize_email( $_POST['email'] ?? '' );
	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => 'Invalid email.' ) );
	}

	// Store subscriber (you can integrate with Mailchimp etc.)
	$subscribers   = get_option( 'ciac_newsletter_subscribers', array() );
	$subscribers[] = array( 'email' => $email, 'date' => current_time( 'mysql' ) );
	update_option( 'ciac_newsletter_subscribers', $subscribers );

	// Notify admin
	wp_mail( get_option( 'admin_email' ), 'New Newsletter Subscriber', "New subscriber: {$email}" );

	wp_send_json_success( array( 'message' => 'Subscribed!' ) );
}
add_action( 'admin_post_ciac_newsletter_subscribe', 'ciac_handle_newsletter_subscribe' );
add_action( 'admin_post_nopriv_ciac_newsletter_subscribe', 'ciac_handle_newsletter_subscribe' );

