<?php


/**
 * Team Post Type + Team Area Taxonomy
 */
function register_team_post_type_and_taxonomy() {

/* =========================
* Team Post Type
* ========================= */
register_post_type('team', array(
'labels' => array(
'name' => 'All Teams',
'singular_name' => 'Team Member',
'add_new_item' => 'Add New Member',
'edit_item' => 'Edit Team Member',
),
'public' => true,
'menu_icon' => 'dashicons-groups',
'supports' => array('title', 'thumbnail'), // Name + Photo
'has_archive' => true,
'rewrite' => array('slug' => 'team'),
'show_in_rest' => true,
));

/* =========================
* Team Area Taxonomy (Category)
* ========================= */
register_taxonomy('team_area', 'team', array(
'labels' => array(
'name' => 'Team Areas',
'singular_name' => 'Team Area',
'add_new_item' => 'Add New Practice Area',
'edit_item' => 'Edit Team Area',
'menu_name' => 'Area of practice',
),
'hierarchical' => true, // Category style
'public' => true,
'show_admin_column' => true,
'show_in_rest' => true,
'rewrite' => array('slug' => 'team-area'),
));
}
add_action('init', 'register_team_post_type_and_taxonomy');

/**
 * Team Member Designation (Post Meta)
 */

/* Add Meta Box */
function team_member_designation_meta_box()
{
    add_meta_box(
        'team_member_designation',
        'Member Designation',
        'team_member_designation_callback',
        'team',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'team_member_designation_meta_box');


/* Meta Box Field */
function team_member_designation_callback($post)
{

    $designation = get_post_meta($post->ID, '_team_member_designation', true);

    wp_nonce_field('team_designation_nonce_action', 'team_designation_nonce');

    echo '<input type="text" name="team_member_designation" value="' . esc_attr($designation) . '" />';
}


/* Save Meta */
function save_team_member_designation($post_id)
{

    if (
        !isset($_POST['team_designation_nonce']) ||
        !wp_verify_nonce($_POST['team_designation_nonce'], 'team_designation_nonce_action')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['team_member_designation'])) {
        update_post_meta(
            $post_id,
            '_team_member_designation',
            sanitize_text_field($_POST['team_member_designation'])
        );
    }
}
add_action('save_post_team', 'save_team_member_designation');