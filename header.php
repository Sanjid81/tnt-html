<?php
// Exit if accessed directly
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo THEMEROOT; ?>/dist/app.css">
    <?php wp_head(); ?>
</head>

<body class="body-main-class" <?php body_class(); ?>>


    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-wraper">
                <div class="nav-first-half">
                    <!-- Logo -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <?php
                        $nav_logo_id = carbon_get_theme_option('site_logo');
                        if ($nav_logo_id):
                            $nav_logo_alt = get_bloginfo('name');
                            if (empty($nav_logo_alt)) {
                                $nav_logo_alt = get_post_meta($nav_logo_id, '_wp_attachment_image_alt', true);
                            }
                            echo wp_get_attachment_image($nav_logo_id, 'full', false, [
                                'class' => 'h-10',
                                'alt' => esc_attr($nav_logo_alt),
                                'loading' => 'lazy',
                            ]);
                        else:
                            ?>
                            <img src="<?php echo esc_url(IMG . '/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>"
                                class="h-10">
                        <?php endif; ?>
                    </a>

                    <!-- Desktop Menu -->
                    <div class="nav-menu desktop-menu">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'main_menu',
                            'container' => false,
                            'menu_class' => 'main-menu-list',
                            'walker' => new Custom_Menu_With_SVG(),
                        ]);
                        ?>
                    </div>
                </div>
                <div class="nav-sec-half">
                    <?php
                    $btn_text = carbon_get_theme_option('header_button_text');
                    $btn_link = carbon_get_theme_option('header_button_link');

                    if (!empty($btn_text) && !empty($btn_link)):
                        ?>
                        <a href="<?php echo esc_url($btn_link); ?>" class="primary-button">
                            <div class="button-text">
                                <?php echo esc_html($btn_text); ?>
                            </div>
                            <svg width="6" height="6" aria-hidden="true">
                                <rect width="6" height="6" fill="white"></rect>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>


            </div>

            <!-- Hamburger -->
            <button class="hamburger" id="hamburger">
                <div class="hamburger-icon">
                    <svg width="40" height="40">
                        <rect width="40" height="40" rx="20" fill="#EE2C2C" />
                        <rect x="9" y="16.5" width="22" height="1" fill="white" />
                        <rect x="9" y="22.5" width="22" height="1" fill="white" />
                    </svg>
                </div>
                <div class="cross">
                    <svg width="40" height="40">
                        <rect width="40" height="40" rx="20" fill="#EE2C2C" />
                        <rect x="12.9999" y="12" width="22" height="1" transform="rotate(45 12.9999 12)" fill="white" />
                        <rect x="12" y="28" width="22" height="1" transform="rotate(-45 12 28)" fill="white" />
                    </svg>
                </div>
            </button>

            <!-- Mobile Menu -->
            <div class="small-nav-wraper">
                <div class="small-nav-container">
                    <div class="small-nav-first-half">
                        <div class="nav-menu mobile-menu">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'main_menu',
                                'container' => false,
                                'menu_class' => 'main-menu-list',
                                'walker' => new Custom_Menu_With_SVG(),
                            ]);
                            ?>
                        </div>
                    </div>

                    <div class="nav-sec-half">
                        <?php
                        $btn_text = carbon_get_theme_option('header_button_text');
                        $btn_link = carbon_get_theme_option('header_button_link');

                        if (!empty($btn_text) && !empty($btn_link)):
                            ?>
                            <a href="<?php echo esc_url($btn_link); ?>" class="primary-button">
                                <div class="button-text">
                                    <?php echo esc_html($btn_text); ?>
                                </div>
                                <svg width="6" height="6" aria-hidden="true">
                                    <rect width="6" height="6" fill="white"></rect>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </nav>





    <div class="body-outlines">
        <div class="container">
            <div class="outline-container">
                <div class="outline-wrapper">
                    <div class="outline-one"></div>
                    <div class="outline-one"></div>
                    <div class="outline-one"></div>
                    <div class="outline-one"></div>
                    <div class="outline-one"></div>
                </div>
            </div>
        </div>
    </div>