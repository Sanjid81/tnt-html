<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;






// .................................................

add_action('carbon_fields_register_fields', function () {
    // ............// Home page..................
    // ............// Home page..................
    // Hero slider

    // -----------------------------
    // Hero Section
    Block::make('Hero Section')
        ->set_description('Dynamic Hero Section with Services Menu, Main Content, and Company Info')
        ->set_category('custom-blocks')
        ->set_icon('format-image')
        ->add_fields([
            // Background
            Field::make('image', 'bg_image', 'Background Image')
                ->set_value_type('url')
                ->set_default_value('https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=1920&q=80'),

            // Main Heading
            Field::make('text', 'heading', 'Main Heading')
                ->set_default_value('Delivering Industrial Cleaning with Experience, Quality, and Expertise.'),

            // Company Info Text
            Field::make('textarea', 'company_info', 'Company Info')
                ->set_default_value('TnT High Pressure Waterworks Ltd. delivers industry-leading high-pressure cleaning, chemical cleaning, vacuum services and more.'),

            // Button 1
            Field::make('text', 'btn_one_text', 'Button One Text')
                ->set_default_value('REQUEST A QUOTE'),
            Field::make('text', 'btn_one_link', 'Button One Link')
                ->set_default_value('#'),

            // Button 2
            Field::make('text', 'btn_two_text', 'Button Two Text')
                ->set_default_value('EXPLORE SERVICES'),
            Field::make('text', 'btn_two_link', 'Button Two Link')
                ->set_default_value('#'),

        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            set_query_var('fields', $fields);
            get_template_part('components/home/hero'); // your hero template
        });





    // -----------------------------
    // who we are Section
    // -----------------------------
    Block::make(__('Who We Are Section', 'textdomain'))
        ->add_fields(array(
            Field::make('text', 'small_title', __('Small Title (e.g. WHO WE ARE)', 'textdomain'))
                ->set_default_value('WHO WE ARE')
                ->set_width(50),
            Field::make('text', 'main_title', __('Main Title', 'textdomain'))
                ->set_default_value("Western Canada's Leader in Industrial Cleaning Solutions"),
            Field::make('rich_text', 'description', __('Description', 'textdomain'))
                ->set_default_value('TnT High Pressure Waterworks Ltd. delivers industry-leading high-pressure cleaning, chemical cleaning, vacuum services, and specialized industrial solutions for the oil & gas, petrochemical, pulp & paper, mining, and power generation sectors. Trusted for over decades—equipped to perform in the toughest environments.'),
            Field::make('text', 'button_text', __('Button Text', 'textdomain'))
                ->set_default_value('MORE ABOUT US'),
            Field::make('text', 'button_link', __('Button Link', 'textdomain'))
                ->set_default_value('#')
                ->set_attribute('type', 'url'),

            Field::make('text', 'extra_class', __('Extra CSS Class', 'textdomain'))
                ->set_help_text('Add any additional CSS classes for this block')
                ->set_width(50),
        ))
        ->set_category('custom-blocks', __('Custom Blocks', 'textdomain'))
        ->set_icon('admin-page')
        ->set_keywords(['who we are', 'about', 'section'])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            // template এ পাঠানো
            set_query_var('fields', $fields);
            get_template_part('components/home/who-we-are');
        });









    // -----------------------------
    // clients Section
    // -----------------------------

    Block::make('Accolades Section')
        ->add_fields(array(
            Field::make('text', 'accolades_title', 'Accolades Section Title')
                ->set_default_value('News & Events'),
            Field::make('complex', 'companies', 'Companies')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('image', 'logo', 'Company Logo'),
                    Field::make('text', 'alt', 'Alt Text'),
                )),
            // Buttons
            Field::make('text', 'acolades_button_text', 'Acolades Button Text')->set_default_value('View more'),
            Field::make('text', 'acolades_button_link', 'Acolades Button Link')->set_default_value('#'),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $companies = $fields['companies'] ?? [];
            include get_template_directory() . '/components/home/clients.php';
        });



    // -----------------------------
    // single img Section
    // -----------------------------
    Block::make('Single Image Block')
        ->add_fields(array(
            Field::make('image', 'single_image', 'Image')
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            include get_template_directory() . '/components/comon-section/single-img.php';
        });



    // -----------------------------
    // Home counter Section
    // -----------------------------
    Block::make('Counter Section')
        ->set_description('Statistics counter section')
        ->set_category('layout', 'Layout')
        ->set_icon('chart-bar')
        ->add_fields([
            Field::make('complex', 'counters', 'Counters')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'stat_number', 'Target Number')
                        ->set_attribute('type', 'number')
                        ->set_default_value('0'),

                    Field::make('text', 'suffix', 'Suffix (e.g. +, %, /7, K)')
                        ->set_default_value(''),

                    Field::make('text', 'description', 'Description')
                        ->set_default_value('Stat Description')
                ])
        ])
        ->set_render_callback(function ($block) {
            $counters = $block['counters'] ?? [];
            include get_template_directory() . '/components/home/numbers-counter.php';
        });



    // ------------------------------------------
    // Offsite Cleaning Section
    // ------------------------------------------


    Block::make('Offsite Cleaning Section')
        ->set_description('Specialized Offsite Cleaning Solutions Section')
        ->set_category('custom-blocks')
        ->set_icon('admin-tools')
        ->add_fields([
            Field::make('text', 'oc_label', 'Label')
                ->set_default_value('Offsite Cleaning Services'),

            Field::make('text', 'oc_heading', 'Heading')
                ->set_default_value('Specialized Offsite Cleaning Solutions for Every Industrial Need'),

            Field::make('textarea', 'oc_description', 'Description')
                ->set_default_value('Our offsite cleaning facilities are designed to handle equipment that requires specialized, controlled-environment cleaning. With advanced high-pressure systems, expert technicians, and strict safety standards, we restore equipment to peak condition while minimizing downtime for your operations.'),

            Field::make('text', 'oc_button_text', 'Button Text')
                ->set_default_value('VIEW DETAILS'),

            Field::make('text', 'oc_button_link', 'Button Link')
                ->set_default_value('#'),

            Field::make('image', 'oc_image', 'Right Section Image')
                ->set_value_type('url')
                ->set_default_value('https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80'),
        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $offsit_cleaning = $fields['offsit_cleaning'] ?? [];
            include get_template_directory() . '/components/home/cleaning-solution.php';
        });


    // =================footer-top-section=======================
    Block::make('footer-top Section')
        ->set_description('Full-screen Hero Section with Background, Heading, and CTA Button')
        ->set_category('custom-blocks')
        ->set_icon('format-image')
        ->add_fields([
            Field::make('image', 'hero_bg', 'Background Image')
                ->set_value_type('url')
                ->set_default_value('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1920&q=80'),

            Field::make('text', 'hero_heading', 'Heading')
                ->set_default_value("Built on Sustainability.<br>Driven by Safety."),

            Field::make('text', 'hero_button_text', 'Button Text')
                ->set_default_value('Explore Our Safety'),

            Field::make('text', 'hero_button_link', 'Button Link')
                ->set_default_value('#'),

            // ✅ Extra Class field
            Field::make('text', 'extra_class', 'Extra CSS Class')
                ->set_help_text('Add custom CSS class to this block'),
        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/comon-section/footer-top-full-screen.php';
        });




    // Service
    Block::make(__('comon banner'))
        ->add_fields([
            Field::make('image', 'hero_image', 'Foreground Image'),

            Field::make('text', 'hero_title', 'Hero Title')
                ->set_default_value('Our Services'),

            Field::make('textarea', 'hero_subtitle', 'Hero Subtitle')
                ->set_help_text('You can use line breaks'),
        ])
        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/comon-section/comon-banner.php';
        });



    // About Us – Our Values Block
    Block::make(__('Our Values', 'tnt-html'))
        ->set_description(__('Dynamic values cards grid', 'tnt-html'))
        ->set_category('custom', __('Custom Blocks', 'tnt-html'), 'heart')
        ->set_icon('heart')
        ->add_fields([
            Field::make('complex', 'tnt_values', __('Core Values', 'tnt-html'))
                ->add_fields([
                    Field::make('text', 'value_title', __('Title', 'tnt-html'))
                        ->set_width(50),
                    Field::make('textarea', 'value_description', __('Description', 'tnt-html'))
                        ->set_rows(4)
                        ->set_width(50),
                ])
                ->set_max(6)
                ->set_collapsed(true)
                ->set_header_template('<%- value_title %>'),
        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            // Block data
            $values = $fields['tnt_values'] ?? [];

            // Template file
            $template_path = get_stylesheet_directory() . '/components/about-us/our-values.php';

            if (file_exists($template_path)) {
                include $template_path;
            }
        });

    // Service
    Block::make(__('our mission'))
        ->add_fields([

            Field::make('text', 'hero_title', 'Hero Title')
                ->set_default_value('Our Mission'),

            Field::make('textarea', 'hero_subtitle', 'Hero Subtitle')
                ->set_help_text('You can use line breaks'),
        ])
        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/about-us/our-mission.php';
        });




    Block::make(__('FAQ Section', 'tnt-html'))
        ->set_description(__('Dynamic FAQ Accordion Section', 'tnt-html'))
        ->set_category('custom', __('Custom Blocks', 'tnt-html'), 'editor-help')
        ->set_icon('editor-help')
        ->add_fields([
            Field::make('complex', 'faq_items', __('FAQ Items', 'tnt-html'))
                ->add_fields([
                    Field::make('text', 'faq_title', __('Title', 'tnt-html')),
                    Field::make('textarea', 'faq_description', __('Description', 'tnt-html'))
                        ->set_rows(5),
                    Field::make('image', 'faq_image', __('Image', 'tnt-html'))
                        ->set_value_type('url'),
                ])
                ->set_min(1)
                ->set_collapsed(true)
                ->set_header_template('<%- faq_title %>')
                // ->set_add_button_text(__('Add FAQ', 'tnt-html')),
        ])
        ->set_render_callback(function ($fields) {
            $faq_items = $fields['faq_items'] ?? [];

            $template = get_stylesheet_directory() . '/components/service-details/service-details-faq.php';
            if (file_exists($template)) {
                include $template;
            }
        });


});



