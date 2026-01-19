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
    $cf = get_template_directory() . '/inc/theme-option.php';
    if (file_exists($cf)) {
        require_once $cf;
    }
    $cf = get_template_directory() . '/inc/service-post-type/service-fields.php';
    if (file_exists($cf)) {
        require_once $cf;
    }
    $cf = get_template_directory() . '/inc/service-post-type/service-post-type.php';
    if (file_exists($cf)) {
        require_once $cf;
    }

    $cf = get_template_directory() . '/inc/block/services-block.php';
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



// menu svg
class Custom_Menu_With_SVG extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $class_names = esc_attr(implode(' ', $classes));

        $output .= '<li class="' . $class_names . '">';

        // ✅ শুধু main menu item-এ SVG
        if ($depth === 0) {
            $output .= '
                <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="menu-dot">
                    <rect width="4" height="4" fill="white"/>
                </svg>
            ';
        }

        // তারপর <a> tag
        $atts = !empty($item->url) ? 'href="' . esc_url($item->url) . '"' : '';
        $output .= '<a ' . $atts . '>';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';
    }
}






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
        'footer_services' => __('Footer Services', 'yourthemename'),
        'footer_quicklinks' => __('Footer Quick Links', 'yourthemename'),
        'footer_legal' => __('Footer Legal', 'yourthemename'),
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





// ====================================register custon post=================================================

// =====================================================================================
// =====================================================================================
// =====================================================================================
























