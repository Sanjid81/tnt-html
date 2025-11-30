<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('carbon_fields_register_fields', function () {
    Container::make('theme_options', 'Header Options')
        ->set_icon('dashicons-admin-generic') // optional
        ->add_fields(array(
            Field::make('image', 'site_logo', 'Site Logo'),
            Field::make('text', 'facebook_link', 'Facebook URL'),
            Field::make('text', 'instagram_link', 'Instagram URL'),
            Field::make('text', 'linkedin_link', 'LinkedIn URL'),
            Field::make('text', 'button_text', 'Button Text'),
            Field::make('text', 'button_link', 'Button Link'),
        ));
});

// footer


add_action('carbon_fields_register_fields', 'footer_theme_options');
function footer_theme_options()
{
    Container::make('theme_options', __('Footer Settings'))
        ->set_icon('dashicons-editor-quote')
        ->add_fields(array(
            Field::make('image', 'footer_logo', 'Footer Logo'),
            Field::make('image', 'footer_mobile_logo', 'Footer Mobile Logo'),
            Field::make('text', 'footer_tagline', 'Footer Tagline'),
            Field::make('text', 'footer_address', 'Address'),
            Field::make('text', 'footer_email', 'Email'),
            Field::make('text', 'footer_copyright', 'Copyright Text'),
            Field::make('text', 'footer_site_name', 'Site Name'), 
            Field::make('text', 'footer_site_url', 'Site URL'),
            Field::make('text', 'footer_privacy_policy', 'Privacy Policy Page URL'),
            Field::make('text', 'footer_terms_conditions', 'Terms & Conditions Page URL'),
        ));
}

// .................................................

add_action('carbon_fields_register_fields', function () {
    // ............// Home page..................
    // ............// Home page..................
    // Hero slider
    // .............
    Block::make('Hero section')
        ->add_fields(array(
            Field::make('complex', 'hero_slides', 'Hero Slides')
                ->add_fields(array(
                    Field::make('text', 'title', 'Slide Title'),
                    Field::make('text', 'highlight_text', 'Highlighted Text (inside <span>)'),
                    Field::make('textarea', 'description', 'Slide Description'),
                    Field::make('text', 'button_text', 'Button Text')->set_default_value('Get Started'),
                    Field::make('text', 'button_link', 'Button Link')->set_default_value('#contact'),
                    Field::make('image', 'image', 'Slide Image')
                ))
                ->set_layout('tabbed')

        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $slides = $fields['hero_slides'] ?? [];

            // Include hero template and pass variable
            set_query_var('slides', $slides);
            get_template_part('components/home/hero');
        });


    // .................News and insights.....................
    Block::make('News & Insights Section')
        ->add_fields(array(
            // Section Titles
            Field::make('text', 'news_title', 'News Section Title')
                ->set_default_value('News & Events'),
            Field::make('text', 'insights_title', 'Insights Section Title')
                ->set_default_value('Insights'),

            // News Cards
            Field::make('complex', 'news_cards', 'News Cards')
                ->set_layout('tabbed-horizontal')

                ->add_fields(array(
                    Field::make('image', 'image', 'Card Image'),
                    Field::make('text', 'meta', 'Meta Text')->set_default_value('NEWS • APRIL 28, 2025'),
                    Field::make('text', 'heading', 'Card Heading'),
                    Field::make('textarea', 'excerpt', 'Excerpt'),
                    Field::make('text', 'read_more_text', 'Read More Text')->set_default_value('Read More'),
                    Field::make('text', 'read_more_link', 'Read More URL')->set_default_value('#'),
                )),

            // Insights Cards
            Field::make('complex', 'insights_cards', 'Insights Cards')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('image', 'image', 'Card Image'),
                    Field::make('text', 'meta', 'Meta Text')->set_default_value('NEWS • APRIL 28, 2025'),
                    Field::make('text', 'heading', 'Card Heading'),
                    Field::make('textarea', 'excerpt', 'Excerpt'),
                    Field::make('text', 'read_more_text', 'Read More Text')->set_default_value('Read More'),
                    Field::make('text', 'read_more_link', 'Read More URL')->set_default_value('#'),
                )),

            // Buttons
            Field::make('text', 'news_button_text', 'News Button Text')->set_default_value('View more'),
            Field::make('text', 'news_button_link', 'News Button Link')->set_default_value('#'),
            Field::make('text', 'insights_button_text', 'Insights Button Text')->set_default_value('Get Started'),
            Field::make('text', 'insights_button_link', 'Insights Button Link')->set_default_value('#'),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            // Pass all fields to template
            set_query_var('news_insights_fields', $fields);
            get_template_part('components/home/news-and-insights');
        });


    // .....................Testimonials Section...................
    Block::make('Testimonials Section')
        ->add_fields(array(
            Field::make('complex', 'testimonials', 'Testimonials')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('textarea', 'text', 'Testimonial Text'),
                    Field::make('text', 'author', 'Author / Position'),
                )),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            set_query_var('testimonials', $fields['testimonials'] ?? []);

            get_template_part('components/home/home-testimonials');
        });


    // ......................Accolades.................

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
            include get_template_directory() . '/components/home/accolades.php';
        });


    // legal solutions
    Block::make('Legal Solutions Section')
        ->add_fields(array(
            Field::make('text', 'lead_text', 'Lead Text')
                ->set_help_text('Use <br> for line breaks if needed'),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            set_query_var('lead_text', $fields['lead_text'] ?? '');
            get_template_part('components/home/legal-solution');
        });



    // ===================About page========================
    // ===========================================

    // about-header
    Block::make('About Header Section')
        ->add_fields(array(
            Field::make('text', 'about_header_title', 'Header Title')
                ->set_default_value('Trusted Legal Excellence Since 1973'),

            Field::make('textarea', 'about_header_description', 'Header Description')
                ->set_default_value('Delivering innovative legal solutions with integrity, insight, and impact.'),

            // Button fields
            Field::make('checkbox', 'show_button', 'Show Button?'), // Check করলে button দেখাবে
            Field::make('text', 'button_text', 'Button Text')
                ->set_default_value('Learn More'),
            Field::make('text', 'button_link', 'Button Link')
                ->set_default_value('#'),
            // Single Banner Image
            Field::make('image', 'about_banner_image', 'Banner Image'),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            set_query_var('about_header_fields', $fields);
            get_template_part('components/about/about-header');
        });


    // about-our-story
    Block::make('Our Story Section')
        ->add_fields(array(
            Field::make('text', 'our_story_title', 'Section Title')
                ->set_default_value('Our Story'),

            Field::make('textarea', 'our_story_content', 'Section Content')
                ->set_default_value('Mahbub & Co. was founded with a vision to provide world-class legal services rooted in integrity, excellence, and client commitment.<br><br>Over the decades, the firm has evolved into one of Bangladesh’s most respected legal practices, representing leading corporations, institutions, and government entities.'),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            set_query_var('our_story_fields', $fields);
            get_template_part('components/about/about-our-story');
        });


    // /about counter
    Block::make('Counters Section')
        ->add_fields(array(
            Field::make('complex', 'counters', 'Counters')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'title', 'Title')
                        ->set_default_value('Counter Title'),
                    Field::make('text', 'number', 'Number')
                        ->set_attribute('type', 'number')
                        ->set_default_value('0'),
                    Field::make('text', 'suffix', 'Suffix (like + or k)')
                        ->set_default_value('+')
                )),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            set_query_var('counters_fields', $fields);
            get_template_part('components/about/about-counter'); // your template file
        });



    // mission vission
    Block::make('Mission & Vision Section')
        ->add_fields(array(
            Field::make('text', 'section_heading', 'Section Heading')
                ->set_default_value('Mission and Vision'),

            Field::make('text', 'mission_title', 'Mission Title')
                ->set_default_value('Mission'),

            Field::make('textarea', 'mission_content', 'Mission Content')
                ->set_default_value('Your mission content goes here.'),

            Field::make('text', 'vision_title', 'Vision Title')
                ->set_default_value('Vision'),

            Field::make('textarea', 'vision_content', 'Vision Content')
                ->set_default_value('Your vision content goes here.'),

            Field::make('image', 'about_middle_image', 'Middle Image'),
        ))
        ->set_render_callback(function ($fields) {

            set_query_var('mission_vision_fields', $fields);

            get_template_part('components/about/mission-vission');
        });



    // managing partner
    Block::make('Managing Partner Section')
        ->add_fields(array(

            Field::make('image', 'partner_image', 'Partner Image'),

            Field::make('text', 'partner_heading', 'Heading')
                ->set_default_value('Message from the Managing Partner'),

            Field::make('textarea', 'partner_message', 'Message')
                ->set_default_value('“At Mahbub & Co., our legacy is built on trust, teamwork, and tenacity. We believe in delivering not just legal solutions, but peace of mind for every client we serve. As we look to the future, our focus remains on combining global standards with local insight to create meaningful impact.”'),

            Field::make('text', 'partner_signature', 'Signature')
                ->set_default_value('— Mahbub Rahman, Managing Partner'),

        ))
        ->set_render_callback(function ($fields) {
            set_query_var('partner_fields', $fields);
            get_template_part('components/about/managing-partner');
        });

});



