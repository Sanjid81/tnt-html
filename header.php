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
    <nav class="navbar">
        <!-- <div class="container"> -->
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
                    <div class="nav-menu" id="navMenu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main_menu',
                            'container' => false,
                            'menu_class' => 'main-menu-list',
                            'walker' => new Custom_Menu_With_SVG(),

                        ));

                        ?>
                    </div>
                </div>

                <div class="nav-sec-half">
                    <!-- Social Media Icons -->


                    <!-- Primary Button -->
                    <?php if ($btn_text = carbon_get_theme_option('button_text')):
                        $btn_link = carbon_get_theme_option('button_link'); ?>
                        <a href="<?php echo esc_url($btn_link); ?>" class="primary-button">
                            <div class="button-text">
                                <?php echo esc_html($btn_text); ?>
                            </div>
                            <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="6" height="6" fill="white" />
                            </svg>


                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Hamburger -->
            <button class="hamburger" id="hamburger">
                <div class="hamburger-icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.5 21.6667C18.3034 21.6667 17.3333 20.6966 17.3333 19.5C17.3333 18.3034 18.3034 17.3333 19.5 17.3333C20.6966 17.3333 21.6667 18.3034 21.6667 19.5C21.6667 20.6966 20.6966 21.6667 19.5 21.6667ZM19.5 13C18.3034 13 17.3333 12.0299 17.3333 10.8333C17.3333 9.63671 18.3034 8.66667 19.5 8.66667C20.6966 8.66667 21.6667 9.63671 21.6667 10.8333C21.6667 12.0299 20.6966 13 19.5 13ZM19.5 4.33333C18.3034 4.33333 17.3333 3.36328 17.3333 2.16667C17.3333 0.97005 18.3034 0 19.5 0C20.6966 0 21.6667 0.97005 21.6667 2.16667C21.6667 3.36328 20.6966 4.33333 19.5 4.33333ZM10.8333 21.6667C9.63671 21.6667 8.66667 20.6966 8.66667 19.5C8.66667 18.3034 9.63671 17.3333 10.8333 17.3333C12.0299 17.3333 13 18.3034 13 19.5C13 20.6966 12.0299 21.6667 10.8333 21.6667ZM10.8333 13C9.63671 13 8.66667 12.0299 8.66667 10.8333C8.66667 9.63671 9.63671 8.66667 10.8333 8.66667C12.0299 8.66667 13 9.63671 13 10.8333C13 12.0299 12.0299 13 10.8333 13ZM10.8333 4.33333C9.63671 4.33333 8.66667 3.36328 8.66667 2.16667C8.66667 0.97005 9.63671 0 10.8333 0C12.0299 0 13 0.97005 13 2.16667C13 3.36328 12.0299 4.33333 10.8333 4.33333ZM2.16667 21.6667C0.97005 21.6667 0 20.6966 0 19.5C0 18.3034 0.97005 17.3333 2.16667 17.3333C3.36328 17.3333 4.33333 18.3034 4.33333 19.5C4.33333 20.6966 3.36328 21.6667 2.16667 21.6667ZM2.16667 13C0.97005 13 0 12.0299 0 10.8333C0 9.63671 0.97005 8.66667 2.16667 8.66667C3.36328 8.66667 4.33333 9.63671 4.33333 10.8333C4.33333 12.0299 3.36328 13 2.16667 13ZM2.16667 4.33333C0.97005 4.33333 0 3.36328 0 2.16667C0 0.97005 0.97005 0 2.16667 0C3.36328 0 4.33333 0.97005 4.33333 2.16667C4.33333 3.36328 3.36328 4.33333 2.16667 4.33333Z"
                            fill="white" />
                    </svg>

                </div>
                <div class="cross">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23 3L3 23" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M23 23L3 3" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </button>
            <!-- Mobile Menu -->

            <div class="small-nav-wraper">
                <div class="small-nav-container">
                    <div class="small-nav-first-half">
                        <!-- < ?php mytheme_nav_menu(); ?> -->
                        <div class="nav-menu" id="navMenu">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'main_menu',
                                'container' => false,
                                'menu_class' => 'main-menu-list',
                                'walker' => new Custom_Menu_With_SVG(),

                            ));

                            ?>
                        </div>
                    </div>

                    <div class="nav-sec-half">

                        <!-- Primary Button -->
                        <?php if ($btn_text = carbon_get_theme_option('button_text')):
                            $btn_link = carbon_get_theme_option('button_link'); ?>
                            <a href="<?php echo esc_url($btn_link); ?>" class="primary-button">
                                <div class="button-text">
                                    <?php echo esc_html($btn_text); ?>
                                </div>
                                <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="6" height="6" fill="white" />
                                </svg>


                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- </div> -->
    </nav>




    <div class="body-outlines">
        <div class="container">
           <div class="outline-container">
             <div class="outline-one"></div>
            <div class="outline-one"></div>
            <div class="outline-one"></div>
            <div class="outline-one"></div>
            <div class="outline-one"></div>
           </div>
        </div>
    </div>