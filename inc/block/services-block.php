<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'register_tnt_services_block');

function register_tnt_services_block()
{
    Block::make(__('Services Block', 'tnt-html'))
        ->set_description(__('Selected / Latest / All Services - switchable', 'tnt-html'))
        ->set_category('custom', __('Custom Blocks', 'tnt-html'), 'hammer')
        ->set_icon('images-alt2')

        ->add_fields([

            Field::make('checkbox', 'tnt_show_all_services', __('Show ALL services?', 'tnt-html'))
                ->set_option_value('yes')
                ->set_default_value(false),

            Field::make('text', 'view_button_text', __('Button Text', 'tnt-html'))
                ->set_default_value('View Details'),

            Field::make('text', 'tnt_custom_class', __('Custom CSS Class', 'tnt-html'))
                ->set_help_text(__('Add custom CSS class for services container', 'tnt-html')),

            Field::make('association', 'tnt_selected_services', __('Select Specific Services', 'tnt-html'))
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'service',
                    ]
                ])
                ->set_max(12)
                ->set_duplicates_allowed(false),

            Field::make('text', 'tnt_fallback_count', __('Fallback Count', 'tnt-html'))
                ->set_default_value('4'),

            // Show All Services button fields
            Field::make('checkbox', 'tnt_show_all_button', __('Show "All Services" Button?', 'tnt-html'))
                ->set_option_value('yes')
                ->set_default_value(true),

            Field::make('text', 'tnt_show_all_button_text', __('All Services Button Text', 'tnt-html'))
                ->set_default_value('Show All Services'),

            Field::make('text', 'tnt_show_all_button_url', __('All Services Button URL', 'tnt-html'))
                ->set_default_value(site_url('/services')),

        ])

        ->set_render_callback(function ($fields) {

            $show_all = !empty($fields['tnt_show_all_services']);
            $selected = $fields['tnt_selected_services'] ?? [];
            $fallback = max(1, min(12, intval($fields['tnt_fallback_count'] ?? 4)));
            $custom_class = !empty($fields['tnt_custom_class']) ? esc_attr($fields['tnt_custom_class']) : '';

            $button_text = !empty($fields['view_button_text'])
                ? esc_html($fields['view_button_text'])
                : __('View Details', 'tnt-html');

            // WP_Query arguments
            $args = [
                'post_type' => 'service',
                'post_status' => 'publish',
            ];

            if ($show_all) {
                $args['posts_per_page'] = -1;
                $args['orderby'] = 'menu_order title';
                $args['order'] = 'ASC';
            } else {
                if (!empty($selected)) {
                    $ids = [];
                    foreach ($selected as $item) {
                        if ($item['type'] === 'post' && $item['subtype'] === 'service') {
                            $ids[] = (int) $item['id'];
                        }
                    }
                    if ($ids) {
                        $args['post__in'] = $ids;
                        $args['orderby'] = 'post__in';
                        $args['posts_per_page'] = -1;
                    }
                } else {
                    $args['posts_per_page'] = $fallback;
                    $args['orderby'] = 'date';
                    $args['order'] = 'DESC';
                }
            }

            $query = new WP_Query($args);

            if ($query->have_posts()): ?>

            <section class="services-section <?php echo $custom_class; ?>">
                <div class="container">
                    <div class="service-post-container">

                        <?php if (have_posts()): ?>
                            <?php while ($query->have_posts()):
                                    $query->the_post(); ?>
                                <div class="service-post-content" data-aos="fade-up">
                                    <div class="service-image">
                                        <div class="post-thumbnail-img">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium_large'); ?>
                                            </a>
                                        </div>

                                        <div class="details-button">
                                            <a href="<?php the_permalink(); ?>" class="service-btn third-button">
                                                <?php echo $button_text; ?>
                                                <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="6" height="6" fill="#EE2C2C" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="service-info">
                                        <h3 class="service-title heading-four">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <p class="service-short-desc body-text">
                                            <?php
                                                $desc = carbon_get_post_meta(get_the_ID(), 'tnt_service_short_description');
                                                if (!empty($desc)) {
                                                    echo esc_html($desc);
                                                }
                                                ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>






                    </div>
                    <!-- Show All Services Button -->
                    <?php
                        $show_all_btn = !empty($fields['tnt_show_all_button']);
                        $show_all_btn_text = !empty($fields['tnt_show_all_button_text'])
                            ? esc_html($fields['tnt_show_all_button_text'])
                            : __('Show All Services', 'tnt-html');

                        $show_all_btn_url = !empty($fields['tnt_show_all_button_url'])
                            ? esc_url($fields['tnt_show_all_button_url'])
                            : site_url('/services');
                        ?>

                    <?php if ($show_all_btn && $show_all_btn_url): ?>
                        <div class="services-all-btn-wrap" data-aos="fade-up">
                            <a href="<?php echo $show_all_btn_url; ?>" class="primary-button services-all-btn">
                                <span>
                                    <?php echo $show_all_btn_text; ?>
                                </span>
                                <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="6" height="6" fill="white" />
                                </svg>

                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <?php
            endif;
            wp_reset_postdata();
        });
}
