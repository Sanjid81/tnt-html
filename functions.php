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
function theme_setup_supports() {
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
function crb_load_carbonfields() {
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
function theme_enqueue_assets() {
    // Default style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Compiled CSS & JavaScript
    wp_enqueue_style('app-style', THEMEROOT . '/dist/app.css', [], '1.0');
    wp_enqueue_script('app-js', THEMEROOT . '/dist/app.js', ['jquery'], '1.0', true);

    // Swiper (only if needed)
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

/**
 * Allow SVG Upload
 */
add_filter('upload_mimes', function($mimes) {
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
