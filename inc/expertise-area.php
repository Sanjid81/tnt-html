<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {

    /**
     * ==============================
     * TEAM AREA (TERM META)
     * ==============================
     */
    Container::make('term_meta', __('Team Area Properties'))
        ->where('term_taxonomy', '=', 'team_area')
        ->add_fields(array(

            Field::make('text', 'crb_title', __('Title')),

            Field::make('image', 'crb_banner', __('Banner Image')),

            Field::make('rich_text', 'crb_description', __('Description')),

            Field::make('text', 'button_text', 'Back Button Text')
                ->set_default_value('Back'),


            Field::make('text', 'pdf_button_text', 'PDF Button Text')
                ->set_default_value('Download PDF'),

            Field::make('file', 'pdf_file', 'PDF File')
                ->set_type('application/pdf')
        ));

    /**
     * ==============================
     * TEAM MEMBER DETAILS
     * ==============================
     */
    Container::make('post_meta', 'Team Member Details')
        ->where('post_type', '=', 'team')
        ->add_fields(array(

            Field::make('text', 'team_email', 'Email'),

            Field::make('text', 'team_number', 'Phone Number'),
        ));

});
