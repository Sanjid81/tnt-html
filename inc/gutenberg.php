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
            Field::make('text', 'footer_copyright', 'Copyright Text')
        ));
}

// .................................................
// Home page
add_action('carbon_fields_register_fields', function () {
    // ..............................
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








         Block::make('Accolades Section')
        ->add_fields(array(
            Field::make('complex', 'companies', 'Companies')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('image', 'logo', 'Company Logo'),
                    Field::make('text', 'alt', 'Alt Text'),
                )),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            set_query_var('companies', $fields['companies'] ?? []);
            get_template_part('components/home/accolades'); 
        });

});



