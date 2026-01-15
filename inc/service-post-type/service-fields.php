<?php
/**
 * Service Post Meta Fields using Carbon Fields
 * 
 * Adds a short description field to each 'service' post in admin
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'tnt_register_service_meta');

function tnt_register_service_meta()
{
    Container::make('post_meta', __('Service Details', 'tnt-html'))
        ->where('post_type', '=', 'service')
        ->set_priority('high')
        ->add_fields([
            Field::make('textarea', 'tnt_service_short_description', __('Short Description', 'tnt-html'))
                ->set_rows(4)
                ->set_width(100)
                ->set_help_text(__('This text will be displayed on the service card/list. Write a short description in 1–2 lines.', 'tnt-html')),
        ]);
}