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
            get_template_part('components/home/hero');
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
            Field::make('text', 'button_text', __('Button Text', 'textdomain')),
            Field::make('text', 'button_link', __('Button Link', 'textdomain'))
                ->set_attribute('type', 'url'),

            Field::make('text', 'extra_class', __('Extra CSS Class', 'textdomain'))
                ->set_help_text('Add any additional CSS classes for this block')
                ->set_width(50),
        ))
        ->set_category('custom-blocks', __('Custom Blocks', 'textdomain'))
        ->set_icon('admin-page')
        ->set_keywords(['who we are', 'about', 'section'])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
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
            // Extra Class field
            Field::make('text', 'extra_class', 'Extra CSS Class')
                ->set_help_text('Add custom CSS class to this block'),
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
                        ->set_default_value('Stat Description'),

                ]),
            Field::make('text', 'extra_class', 'Extra CSS Class')
                ->set_help_text('Add custom CSS class to this block'),
        ])
        ->set_render_callback(function ($fields) {
            $counters = $fields['counters'] ?? [];
            $extra_class = $fields['extra_class'] ?? '';

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
        ->add_fields([
            Field::make('text', 'extra_class', 'Extra CSS Class')
                ->set_help_text('Add custom CSS class to this block'),
        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $offsit_cleaning = $fields['offsit_cleaning'] ?? [];
            $extra_class = $fields['extra_class'] ?? '';

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



    // ================= comon banner =======================
// =================  =======================
    // Service
    Block::make(__('comon banner'))
        ->add_fields([
            Field::make('image', 'hero_image', 'Foreground Image'),

            Field::make('text', 'hero_title', 'Hero Title')
                ->set_default_value('Our Services'),

            Field::make('textarea', 'hero_subtitle', 'Hero Subtitle')
                ->set_help_text('You can use line breaks'),
            // Extra Class field
            Field::make('text', 'extra_class', 'Extra CSS Class')
                ->set_help_text('Add custom CSS class to this block'),


        ])
        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/comon-section/comon-banner.php';
        });


    // ============================================================
// ============================================================
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

    // ================= Our mission =====================
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



    // ================= Service Details FAQ =======================

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
                ->set_header_template('<%- faq_title %>'),
        ])
        ->set_render_callback(function ($fields) {
            $faq_items = $fields['faq_items'] ?? [];

            $template = get_stylesheet_directory() . '/components/service-details/service-details-faq.php';
            if (file_exists($template)) {
                include $template;
            }
        });

    // ================= Service Details overview =======================
    Block::make('details Overview')
        ->add_fields([

            // Left section
            Field::make('text', 'overview_tag', 'Overview Tag')
                ->set_default_value('• OVERVIEW'),

            Field::make('text', 'title', 'Title'),

            Field::make('textarea', 'description', 'Description'),

            // Right section – Specs
            Field::make('text', 'pressure_value', 'Pressure Value')
                ->set_default_value('40,000'),

            Field::make('text', 'pressure_unit', 'Pressure Unit')
                ->set_default_value('psi'),

            Field::make('text', 'flow_value', 'Flow Value')
                ->set_default_value('60'),

            Field::make('text', 'flow_unit', 'Flow Unit')
                ->set_default_value('GPM'),

            // Button
            Field::make('text', 'button_text', 'Button Text')
                ->set_default_value('Download our brochure'),

            Field::make('text', 'button_link', 'Button Link'),

        ])
        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/service-details/over-view.php';
        });


    // ================= Service Details key-features =======================
    // details key-features
    Block::make('Key Features')
        ->add_fields([

            // Section tag
            Field::make('text', 'section_tag', 'Section Tag')
                ->set_default_value('• KEY FEATURES'),

            // Features repeater
            Field::make('complex', 'features', 'Features')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'title', 'Feature Title'),
                    Field::make('textarea', 'description', 'Feature Description'),
                ])
                ->set_min(1),

        ])
        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/service-details/key-features.php';
        });




    // ==============================================================
    // ================= Service Details dynamic-paragraph =======================
    Block::make('Dynamic Paragraph')
        ->add_fields([
            Field::make('textarea', 'paragraph_text', 'Paragraph Text')
                ->set_default_value(
                    'Ultra high pressure water blasting is an accepted non destructive method for coating and paint removal, while sandblasting can "peen" surface area trapping contaminates, the use of ultra high pressure systems can produce white metal surfaces with no erosion or structural change to surfaces. With special rust inhibitors added to the water stream, "flash rusting" can be prolonged for up to two days.'
                ),
        ])
        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/service-details/dynamic-paragraph.php';
        });



    // contact us
    Block::make(__('Contact Us Section', 'your-text-domain'))
        ->set_icon('email')
        ->set_category('custom')
        ->set_description(__('Clean contact section with info cards + CF7 form – no fixed sizes', 'your-text-domain'))

        ->add_fields(array(
            Field::make('text', 'heading', __('Heading', 'your-text-domain')),

            Field::make('textarea', 'description', __('Description', 'your-text-domain'))
                ->set_rows(3),

            Field::make('text', 'address_label', __('Address Label', 'your-text-domain')),
            Field::make('textarea', 'address_content', __('Address', 'your-text-domain'))
                ->set_rows(3),

            Field::make('text', 'email_label', __('Email Label', 'your-text-domain')),
            Field::make('text', 'email_content', __('Email', 'your-text-domain')),

            Field::make('complex', 'phones', __('Phone Numbers', 'your-text-domain'))
                ->add_fields(array(
                    Field::make('text', 'phone_number', __('Phone', 'your-text-domain')),
                ))
                ->set_layout('tabbed-horizontal'),

            Field::make('text', 'form_shortcode', __('CF7 Shortcode', 'your-text-domain'))
                ->set_help_text(__('Example: [contact-form-7 id="123" title="Contact"]')),
        ))

        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/contact-us/contact-us.php';
        });


    // ===================================================
    Block::make(__('Dynamic Google Map', 'your-text-domain'))
        ->set_icon('location')
        ->set_category('custom')
        ->set_description(__('Google Maps iframe embed – paste full iframe code', 'your-text-domain'))

        ->add_fields([
            Field::make('textarea', 'map_iframe', __('Google Maps Embed Iframe', 'your-text-domain'))
                ->set_rows(6)
                ->set_help_text(__('Paste the complete <iframe>...</iframe> code from Google Maps embed option.'))
        ])

        ->set_render_callback(function ($fields, $attributes) {
            set_query_var('map_fields', $fields);
            set_query_var('map_attributes', $attributes);

            $template_path = get_template_directory() . '/components/contact-us/google-map.php';

            if (file_exists($template_path)) {
                include $template_path;
            } else {
                echo '<p style="color:#e74c3c; padding:2rem; text-align:center;">Template file missing: ' . esc_html(basename($template_path)) . '</p>';
            }
        });





    // /===========================================================
    Block::make(__('Certifications & Trainings'))
        ->add_fields([
            Field::make('text', 'section_title', __('Section Title'))
                ->set_default_value('CERTIFICATIONS & TRAININGS'),

            Field::make('complex', 'certificates', __('Certificates'))
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('image', 'certificate_image', __('Certificate Image'))
                        ->set_required(true),
                    Field::make('text', 'certificate_alt', __('Image Alt Text'))
                        ->set_default_value('Certificate'),
                ]),
        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $certificates = $fields['certificates'] ?? [];
            include get_template_directory() . '/components/safety/certification.php';
        });


    Block::make('Safety Resposibility')
        ->add_fields([

            // Section tag
            Field::make('text', 'section_tag', 'Section Tag')
                ->set_default_value('SAFETY FEATURES'),

            // Features repeater
            Field::make('complex', 'features', 'Features')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'title', 'Feature Title'),
                    Field::make('textarea', 'description', 'Feature Description'),
                ])
                ->set_min(1),

        ])
        ->set_render_callback(function ($fields) {
            set_query_var('fields', $fields);
            include get_template_directory() . '/components/safety/safety-responsibility.php';
        });
});

