<?php
require_once __DIR__ . '/wp-load.php';

// Check theme
echo "Current theme: " . get_stylesheet() . "<br>";

// 1. Activate Theme
switch_theme('ciac-rwanda');
echo "Theme activated.<br>";

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
        if (is_wp_error($page_id)) {
            echo "Failed to create page $title: " . $page_id->get_error_message() . "<br>";
        } else {
            echo "Created page: $title ($page_id)<br>";
            $created_pages[$title] = $page_id;
        }
    } else {
        $page_id = $page_check->ID;
        echo "Page exists: $title ($page_id)<br>";
        $created_pages[$title] = $page_id;
    }
    
    if ($template !== 'front-page.php') {
        update_post_meta($page_id, '_wp_page_template', $template);
    }
}

// 3. Set Homepage
if (isset($created_pages['Home'])) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $created_pages['Home']);
    echo "Homepage set to 'Home'.<br>";
}

// 4. Create and Setup Menu
$menu_name = 'Primary Menu';
$menu_location = 'menu-1';

$menu_exists = wp_get_nav_menu_object($menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
    echo "Created menu: $menu_name ($menu_id)<br>";
} else {
    $menu_id = $menu_exists->term_id;
    echo "Menu exists: $menu_name ($menu_id)<br>";
}

// Add items to menu
$menu_items = wp_get_nav_menu_items($menu_id);
$existing_item_titles = array();
if ($menu_items !== false) {
    foreach ($menu_items as $item) {
        $existing_item_titles[] = $item->title;
    }
}

$items_to_add = array('Home', 'About Us', 'Projects', 'Our Team', 'Contact Us', 'Newsletter');
foreach ($items_to_add as $item_title) {
    if (isset($created_pages[$item_title]) && !in_array($item_title, $existing_item_titles)) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $item_title,
            'menu-item-object-id' => $created_pages[$item_title],
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
        ));
        echo "Added $item_title to menu.<br>";
    }
}

// Assign menu to location
$locations = get_theme_mod('nav_menu_locations');
if (!is_array($locations)) {
    $locations = array();
}
$locations[$menu_location] = $menu_id;
set_theme_mod('nav_menu_locations', $locations);
echo "Menu assigned to primary location.<br>";

// 5. Create Footer Explore Menu
$footer_explore_name = 'Explore';
$footer_explore_exists = wp_get_nav_menu_object($footer_explore_name);
if (!$footer_explore_exists) {
    $explore_id = wp_create_nav_menu($footer_explore_name);
    wp_update_nav_menu_item($explore_id, 0, array('menu-item-title' => 'About Us', 'menu-item-object-id' => $created_pages['About Us'], 'menu-item-object' => 'page', 'menu-item-status' => 'publish', 'menu-item-type' => 'post_type'));
    wp_update_nav_menu_item($explore_id, 0, array('menu-item-title' => 'Government Website', 'menu-item-url' => '#', 'menu-item-status' => 'publish', 'menu-item-type' => 'custom'));
    wp_update_nav_menu_item($explore_id, 0, array('menu-item-title' => 'Ministry of Environment', 'menu-item-url' => '#', 'menu-item-status' => 'publish', 'menu-item-type' => 'custom'));
    wp_update_nav_menu_item($explore_id, 0, array('menu-item-title' => 'Ministry of Agriculture', 'menu-item-url' => '#', 'menu-item-status' => 'publish', 'menu-item-type' => 'custom'));
} else {
    $explore_id = $footer_explore_exists->term_id;
}
$locations['footer-menu-explore'] = $explore_id;

// 6. Create Footer Patterns Menu
$footer_patterns_name = 'Key Patterns';
$footer_patterns_exists = wp_get_nav_menu_object($footer_patterns_name);
if (!$footer_patterns_exists) {
    $patterns_id = wp_create_nav_menu($footer_patterns_name);
    wp_update_nav_menu_item($patterns_id, 0, array('menu-item-title' => 'Wageningen ndiza Foundation', 'menu-item-url' => '#', 'menu-item-status' => 'publish', 'menu-item-type' => 'custom'));
    wp_update_nav_menu_item($patterns_id, 0, array('menu-item-title' => 'DIBcoop', 'menu-item-url' => '#', 'menu-item-status' => 'publish', 'menu-item-type' => 'custom'));
    wp_update_nav_menu_item($patterns_id, 0, array('menu-item-title' => 'AgroPlast Ltd', 'menu-item-url' => '#', 'menu-item-status' => 'publish', 'menu-item-type' => 'custom'));
    wp_update_nav_menu_item($patterns_id, 0, array('menu-item-title' => 'IFFS International', 'menu-item-url' => '#', 'menu-item-status' => 'publish', 'menu-item-type' => 'custom'));
} else {
    $patterns_id = $footer_patterns_exists->term_id;
}
$locations['footer-menu-patterns'] = $patterns_id;

set_theme_mod('nav_menu_locations', $locations);
echo "Footer menus created and assigned.<br>";

echo "DONE!";
