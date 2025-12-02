<?php
// Exit if accessed directly
defined('ABSPATH') || exit;

/**
 * Theme Constants
 */
define('THEMEROOT', get_template_directory_uri());
define('IMG', THEMEROOT . '/dist/img');
define('ICON', THEMEROOT . '/dist/icons');
define('JS', THEMEROOT . '/dist/js');
define('CSS', THEMEROOT . '/dist/css');

/**
 * Theme Supports
 */
function theme_setup_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'theme_setup_supports');

/**
 * Load Carbon Fields
 */
add_action('after_setup_theme', 'crb_load_carbonfields');
function crb_load_carbonfields()
{
    if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
        require_once(get_template_directory() . '/vendor/autoload.php');
    }

    if (class_exists('\Carbon_Fields\Carbon_Fields')) {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    // Load custom fields & block definitions
    $cf = get_template_directory() . '/inc/gutenberg.php';
    if (file_exists($cf)) {
        require_once $cf;
    }
}



/**
 * Enqueue Theme Assets
 */
function theme_enqueue_assets()
{
    // Default style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Webpack compiled CSS & JS
    wp_enqueue_style('app-style', get_template_directory_uri() . '/dist/app.css', [], '1.0');
    wp_enqueue_script('app-js', get_template_directory_uri() . '/dist/app.js', [], '1.0', true);


    // Swiper & AOS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], null, true);





    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@next/dist/aos.css');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@next/dist/aos.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');







// Register dynamic menus
// Menus
function mytheme_setup()
{
    add_theme_support('menus');
    register_nav_menus(array(
        'main_menu' => __('Main Menu', 'mytheme'),
        'mobile_menu' => __('Mobile Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

// ....................................
// Footer menu register
function yourthemename_register_menus()
{
    register_nav_menus(array(
        'footer_expertise_col1' => __('Areas of Expertise Column 1', 'yourthemename'),
        'footer_expertise_col2' => __('Areas of Expertise Column 2', 'yourthemename'),
        'footer_quicklinks' => __('Quick Links', 'yourthemename'),
    ));

}
add_action('init', 'yourthemename_register_menus');
// .........................................



/**
 * Allow SVG Upload
 */
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/**
 * Disable Auto Updates (Optional)
 */
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');

/**
 * Remove Contact Form 7 auto <p> and <br>
 */
add_filter('wpcf7_autop_or_not', '__return_false');




// AOS script
function aos_init_script()
{
    echo '<script>
        AOS.init({
            duration: 1000, // animation duration in ms
            offset: 100,    // scroll offset before animation triggers
            once: false,    // true: animate only once, false: animate every scroll
        });
    </script>';
}
add_action('wp_footer', 'aos_init_script', 100);

// =====================================================================================
// =====================================================================================
// =====================================================================================
// =====================================================================================

// ...........Ajax.............
add_action('wp_enqueue_scripts', function () {
    // ensure path to your JS is correct
    wp_enqueue_script(
        'team-filter-js',
        get_template_directory_uri() . '/script/people/search-filte',
        array('jquery'),
        filemtime(get_template_directory() . '/script/people/search-filte'),
        true
    );

    wp_localize_script('team-filter-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
});



// ............AJAX............
add_action('wp_ajax_filter_team_members', 'filter_team_members');
add_action('wp_ajax_nopriv_filter_team_members', 'filter_team_members');

function filter_team_members() {
    // security: make sure request exists
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';

    $team_members = carbon_get_theme_option('team_members');

    $output = '';
    $category_tag = 'All Team Members';

    if ($category) {
        $category_tag = $category;
    } elseif ($search) {
        $category_tag = 'Search Result';
    }

    if ($team_members && is_array($team_members)) {
        foreach ($team_members as $member) {
            // ensure keys exist
            $name = isset($member['name']) ? $member['name'] : '';
            $member_cat = isset($member['category']) ? $member['category'] : '';
            $photo_id = isset($member['photo']) ? $member['photo'] : '';
            $link = isset($member['team_button_link']) ? $member['team_button_link'] : '#';
            $designation = isset($member['designation']) ? $member['designation'] : '';

            if ($search && stripos($name, $search) === false) {
                continue;
            }

            if ($category && $member_cat !== $category) {
                continue;
            }

            $img_url = $photo_id ? wp_get_attachment_url($photo_id) : '';

            $output .= '<div class="team-member" data-category="' . esc_attr($member_cat) . '">';

            if ($img_url) {
                $output .= '<div class="team-photo"><img src="' . esc_url($img_url) . '" alt="' . esc_attr($name) . '"></div>';
            } else {
                $output .= '<div class="team-photo"><img src="' . esc_url(get_template_directory_uri() . '/assets/images/placeholder.png') . '" alt="' . esc_attr($name) . '"></div>';
            }

            $output .= '<div class="team-details-btn-svg">';
            $output .= '<a href="' . esc_url($link) . '">';
            $output .= '<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">';
            $output .= '<rect width="38" height="38" rx="19" fill="#FFE6E9"/>';
            $output .= '<g clip-path="url(#clip0_927_12827)">';
            $output .= '<path d="M14.5 23.5L23.5 14.5" stroke="#BC001A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />';
            $output .= '<path d="M16.1875 14.5H23.5V21.8125" stroke="#BC001A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />';
            $output .= '</g>';
            $output .= '<defs><clipPath id="clip0_927_12827"><rect width="18" height="18" fill="white" transform="translate(10 10)" /></clipPath></defs>';
            $output .= '</svg>';
            $output .= '</a>';
            $output .= '</div>';

            $output .= '<div class="team-info">';
            $output .= '<h4 class="body-text-two">' . esc_html($name) . '</h4>';
            $output .= '<span class="member-position">' . esc_html($designation) . '</span>';
            $output .= '</div>';

            $output .= '</div>';
        }
    }

    if (empty($output)) {
        $output = '<p>No team members found.</p>';
    }

    wp_send_json(array(
        'html' => $output,
        'category_tag' => $category_tag
    ));

    wp_die();
}


