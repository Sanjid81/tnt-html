<?php
/**
 * Service Post Type + Service Area Taxonomy
 */
function register_service_post_type_and_taxonomy()
{

    // ── Service Post Type ────────────────────────────────────────
    register_post_type('service', [
        'labels' => [
            'name' => 'Services',
            'singular_name' => 'Service',
            'menu_name' => 'All Services',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Service',
            'edit_item' => 'Edit Service',
            'new_item' => 'New Service',
            'view_item' => 'View Service',
            'search_items' => 'Search Services',
            'not_found' => 'No services found',
            'not_found_in_trash' => 'No services found in Trash',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-hammer',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'], 
        'has_archive' => true,
        'rewrite' => ['slug' => 'service'],
        'show_in_rest' => true,
    ]);

    // ── Service Category / Type Taxonomy ─────────────────────────
    register_taxonomy('service_type', 'service', [
        'labels' => [
            'name' => 'Service Categories',
            'singular_name' => 'Service Category',
            'menu_name' => 'Categories',
            'search_items' => 'Search Service Categories',
            'all_items' => 'All Service Categories',
            'parent_item' => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item' => 'Edit Service Category',
            'update_item' => 'Update Service Category',
            'add_new_item' => 'Add New Service Category',
            'new_item_name' => 'New Service Category Name',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'service-category'], 
    ]);
}

add_action('init', 'register_service_post_type_and_taxonomy');