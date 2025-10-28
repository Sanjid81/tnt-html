<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'nh_register_components');

function nh_register_components()
{
    // Hero Section as Gutenberg Block
    Block::make('Hero Section')
        ->set_icon('star-filled')
        ->set_keywords(['hero', 'banner'])
        ->set_description('Custom Hero Block')
        ->add_fields([
            Field::make('text', 'hero_title', 'Hero Title'),
            Field::make('text', 'hero_subtitle', 'Hero Subtitle'),
            Field::make('image', 'hero_background', 'Background Image'),
        ])
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            // Pass $fields to template
            get_template_part('components/test', null, ['fields' => $fields]);
        });
}

