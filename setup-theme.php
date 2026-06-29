<?php
// Load WordPress environment
require_once __DIR__ . '/wp-load.php';

echo "Setting up CIAC Rwanda theme...\n";

// 1. Activate Theme
switch_theme('ciac-rwanda');
echo "Theme activated.\n";

// 2. Create Pages
$pages = array(
    'About Us' => 'template-about.php',
    'Projects' => 'template-projects.php',
    'Our Team' => 'template-team.php',
    'Contact Us' => 'template-contact.php',
    'Newsletter' => 'template-newsletter.php',
    'Home' => 'front-page.php'
);

$created_pages = array();

foreach ($pages as $title => $template) {
    $page_check = get_page_by_title($title);
    if (!isset($page_check->ID)) {
        $page_id = wp_insert_post(array(
            'post_title' => $title,
            'post_type' => 'page',
            'post_status' => 'publish',
        ));
        echo "Created page: $title\n";
    } else {
        $page_id = $page_check->ID;
        echo "Page exists: $title\n";
    }
    
    // Set template
    if ($template !== 'front-page.php') {
        update_post_meta($page_id, '_wp_page_template', $template);
    }
    
    $created_pages[$title] = $page_id;
}

// 3. Set Homepage
if (isset($created_pages['Home'])) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $created_pages['Home']);
    echo "Homepage set to 'Home'.\n";
}

// 4. Create and Setup Menu
$menu_name = 'Primary Menu';
$menu_location = 'menu-1';

$menu_exists = wp_get_nav_menu_object($menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
    echo "Created menu: $menu_name\n";
    
    // Add items to menu
    $menu_items = array('Home', 'About Us', 'Projects', 'Our Team', 'Contact Us', 'Newsletter');
    foreach ($menu_items as $item_title) {
        if (isset($created_pages[$item_title])) {
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => $item_title,
                'menu-item-object-id' => $created_pages[$item_title],
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));
        }
    }
} else {
    $menu_id = $menu_exists->term_id;
    echo "Menu exists: $menu_name\n";
}

// Assign menu to location
$locations = get_theme_mod('nav_menu_locations');
$locations[$menu_location] = $menu_id;
set_theme_mod('nav_menu_locations', $locations);
echo "Menu assigned to primary location.\n";

echo "Setup complete!\n";
