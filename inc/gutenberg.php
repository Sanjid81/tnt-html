<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

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

            // Field::make('complex', 'footer_expertise', 'Areas of Expertise')
            //     ->add_fields(array(
            //         Field::make('text', 'expertise_item', 'Expertise Item')
            //     )),

            // Field::make('complex', 'footer_quick_links', 'Quick Links')
            //     ->add_fields(array(
            //         Field::make('text', 'quicklinks_item', 'Quicklinks Item')

            //     )),

            Field::make('text', 'footer_address', 'Address'),
            Field::make('text', 'footer_email', 'Email'),
            Field::make('text', 'footer_copyright', 'Copyright Text')
        ));
}

// .................................................
// Hero slider

add_action('carbon_fields_register_fields', function () {
    Container::make('theme_options', __('Hero Section'))
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
        ));
});

