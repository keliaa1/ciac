<?php
/**
 * Register Custom Post Types and Taxonomies
 */

function ciac_rwanda_register_cpts() {
    // Services CPT
    $labels_services = array(
        'name'                  => _x( 'Services', 'Post type general name', 'ciac-rwanda' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'ciac-rwanda' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'ciac-rwanda' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'ciac-rwanda' ),
        'add_new'               => __( 'Add New', 'ciac-rwanda' ),
        'add_new_item'          => __( 'Add New Service', 'ciac-rwanda' ),
        'new_item'              => __( 'New Service', 'ciac-rwanda' ),
        'edit_item'             => __( 'Edit Service', 'ciac-rwanda' ),
        'view_item'             => __( 'View Service', 'ciac-rwanda' ),
        'all_items'             => __( 'All Services', 'ciac-rwanda' ),
        'search_items'          => __( 'Search Services', 'ciac-rwanda' ),
        'not_found'             => __( 'No services found.', 'ciac-rwanda' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'ciac-rwanda' ),
    );

    $args_services = array(
        'labels'             => $labels_services,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type( 'service', $args_services );

    // Team CPT
    $labels_team = array(
        'name'                  => _x( 'Team', 'Post type general name', 'ciac-rwanda' ),
        'singular_name'         => _x( 'Team Member', 'Post type singular name', 'ciac-rwanda' ),
        'menu_name'             => _x( 'Team', 'Admin Menu text', 'ciac-rwanda' ),
        'name_admin_bar'        => _x( 'Team Member', 'Add New on Toolbar', 'ciac-rwanda' ),
        'add_new'               => __( 'Add New', 'ciac-rwanda' ),
        'add_new_item'          => __( 'Add New Team Member', 'ciac-rwanda' ),
        'new_item'              => __( 'New Team Member', 'ciac-rwanda' ),
        'edit_item'             => __( 'Edit Team Member', 'ciac-rwanda' ),
        'view_item'             => __( 'View Team Member', 'ciac-rwanda' ),
        'all_items'             => __( 'All Team Members', 'ciac-rwanda' ),
        'search_items'          => __( 'Search Team', 'ciac-rwanda' ),
        'not_found'             => __( 'No team members found.', 'ciac-rwanda' ),
    );

    $args_team = array(
        'labels'             => $labels_team,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );

    register_post_type( 'team', $args_team );

    // Projects CPT
    $labels_projects = array(
        'name'                  => _x( 'Projects', 'Post type general name', 'ciac-rwanda' ),
        'singular_name'         => _x( 'Project', 'Post type singular name', 'ciac-rwanda' ),
        'menu_name'             => _x( 'Projects', 'Admin Menu text', 'ciac-rwanda' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'ciac-rwanda' ),
        'add_new'               => __( 'Add New', 'ciac-rwanda' ),
        'add_new_item'          => __( 'Add New Project', 'ciac-rwanda' ),
        'new_item'              => __( 'New Project', 'ciac-rwanda' ),
        'edit_item'             => __( 'Edit Project', 'ciac-rwanda' ),
        'view_item'             => __( 'View Project', 'ciac-rwanda' ),
        'all_items'             => __( 'All Projects', 'ciac-rwanda' ),
        'search_items'          => __( 'Search Projects', 'ciac-rwanda' ),
        'not_found'             => __( 'No projects found.', 'ciac-rwanda' ),
    );

    $args_projects = array(
        'labels'             => $labels_projects,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 22,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type( 'project', $args_projects );

    // Register Custom Taxonomy for Projects: Project Category
    $labels_tax = array(
        'name'              => _x( 'Project Categories', 'taxonomy general name', 'ciac-rwanda' ),
        'singular_name'     => _x( 'Project Category', 'taxonomy singular name', 'ciac-rwanda' ),
        'search_items'      => __( 'Search Categories', 'ciac-rwanda' ),
        'all_items'         => __( 'All Categories', 'ciac-rwanda' ),
        'parent_item'       => __( 'Parent Category', 'ciac-rwanda' ),
        'parent_item_colon' => __( 'Parent Category:', 'ciac-rwanda' ),
        'edit_item'         => __( 'Edit Category', 'ciac-rwanda' ),
        'update_item'       => __( 'Update Category', 'ciac-rwanda' ),
        'add_new_item'      => __( 'Add New Category', 'ciac-rwanda' ),
        'new_item_name'     => __( 'New Category Name', 'ciac-rwanda' ),
        'menu_name'         => __( 'Categories', 'ciac-rwanda' ),
    );

    $args_tax = array(
        'hierarchical'      => true,
        'labels'            => $labels_tax,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-category' ),
    );

    register_taxonomy( 'project_category', array( 'project' ), $args_tax );
}
add_action( 'init', 'ciac_rwanda_register_cpts' );
