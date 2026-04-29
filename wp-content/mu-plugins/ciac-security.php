<?php
/**
 * Plugin Name: CIAC Security Tweaks
 * Description: Security-related filters and headers moved out of wp-config.
 */

// Disable XML-RPC pingback methods (keeping XML-RPC functional)
add_filter('xmlrpc_methods', function($methods) {
    unset($methods['pingback.ping']);
    unset($methods['pingback.extensions.getPingbacks']);
    unset($methods['system.multicall']);
    return $methods;
});

// Add security headers
add_action('send_headers', function() {
    header('X-XSS-Protection: 1; mode=block');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
});

// Remove WordPress version from head and feeds
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

// Disable login error hints
add_filter('login_errors', function() {
    return 'Invalid username or password.';
});
