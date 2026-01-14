<?php
// inc/blocks/services-block.php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'register_tnt_services_block');

function register_tnt_services_block()
{
    Block::make(__('Services Block', 'tnt-html'))
        ->set_description(__('Selected / Latest / All Services - switchable', 'tnt-html'))
        ->set_category('custom', __('Custom Blocks', 'tnt-html'), 'hammer')
        ->set_icon('images-alt2')

        ->add_fields(array(
                Field::make('checkbox', 'tnt_show_all_services', __('Show ALL services?', 'tnt-html'))
                    ->set_option_value('yes')
                    ->set_default_value(false)
                    ->set_help_text(__('Check this on Service Landing Page to display every published service. Uncheck on homepage for limited/selected view.', 'tnt-html'))
                    ->set_width(100),

                Field::make('text', 'view_button_text', __('Button Text', 'tnt-html'))
                    ->set_default_value('View Details')
                    ->set_help_text(__('Custom text for the button on each service card (e.g. "Read More", "Learn More")', 'tnt-html'))
                    ->set_width(50),

                Field::make('association', 'tnt_selected_services', __('Select Specific Services', 'tnt-html'))
                    ->set_types(array(
                            array(
                                'type' => 'post',
                                'post_type' => 'service',
                            )
                        ))
                    ->set_max(12)
                    ->set_duplicates_allowed(false)
                    ->set_help_text(__('Drag & drop to reorder. Only used when "Show ALL" is unchecked.', 'tnt-html'))
                    ->set_width(100),

                Field::make('text', 'tnt_fallback_count', __('Fallback: Number of latest services', 'tnt-html'))
                    ->set_default_value('4')
                    ->set_help_text(__('Enter a number between 1 and 12. Only used when no specific services are selected and "Show ALL" is unchecked.', 'tnt-html'))
                    ->set_width(50),

                Field::make('text', 'tnt_category_slugs', __('Fallback Category Slugs (comma separated)', 'tnt-html'))
                    ->set_help_text(__('Only used if no specific services selected and "Show ALL" is unchecked.', 'tnt-html'))
                    ->set_width(50),

                Field::make('text', 'tnt_extra_class', __('Extra CSS Class(es)', 'tnt-html'))
                    ->set_help_text(__('Space-separated custom classes for the main section (e.g. bg-dark text-white pt-5 pb-5)', 'tnt-html'))
                    ->set_width(100),
            ))

        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $show_all = !empty($fields['tnt_show_all_services']);
            $selected = $fields['tnt_selected_services'] ?? array();
            $fallback_count_raw = $fields['tnt_fallback_count'] ?? '4';
            $fallback_count = max(1, min(12, intval($fallback_count_raw)));
            $cat_slugs = !empty($fields['tnt_category_slugs']) ? array_map('trim', explode(',', $fields['tnt_category_slugs'])) : [];

            $button_text = !empty($fields['view_button_text'])
                ? esc_html($fields['view_button_text'])
                : __('View Details', 'tnt-html');

            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
            );

            if ($show_all) {
                $args['posts_per_page'] = -1;
                $args['orderby'] = 'menu_order title';
                $args['order'] = 'ASC';
            } else {
                if (!empty($selected)) {
                    $post_ids = array();
                    foreach ($selected as $item) {
                        if (
                            isset($item['type'], $item['subtype'], $item['id']) &&
                            $item['type'] === 'post' && $item['subtype'] === 'service'
                        ) {
                            $post_ids[] = (int) $item['id'];
                        }
                    }
                    if (!empty($post_ids)) {
                        $args['post__in'] = $post_ids;
                        $args['posts_per_page'] = -1;
                        $args['orderby'] = 'post__in';
                    } else {
                        $args['posts_per_page'] = $fallback_count;
                        $args['orderby'] = 'date';
                        $args['order'] = 'DESC';
                    }
                } else {
                    $args['posts_per_page'] = $fallback_count;
                    $args['orderby'] = 'date';
                    $args['order'] = 'DESC';

                    if (!empty($cat_slugs)) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'service_type',
                                'field' => 'slug',
                                'terms' => $cat_slugs,
                            ),
                        );
                    }
                }
            }

            $query = new WP_Query($args);

            if (current_user_can('edit_posts') && is_admin()) {
                echo '<pre style="background:#fff3cd; padding:15px; border:1px solid #ffeeba; margin:20px 0; font-family:monospace; white-space: pre-wrap;">';
                echo "Show All: " . ($show_all ? 'YES' : 'NO') . "\n";
                echo "Selected services count: " . count($selected) . "\n";
                echo "Fallback count: " . $fallback_count . " (raw: " . $fallback_count_raw . ")\n";
                echo "Category slugs: " . implode(', ', $cat_slugs) . "\n";
                echo "Button Text: " . $button_text . "\n";
                echo "Query args: " . print_r($args, true) . "\n";
                echo "Found posts: " . ($query->found_posts ?? 'Query not executed yet') . "\n";
                echo '</pre>';
            }

            if ($query->have_posts()): ?>
            <section class="services-section " data-aos="fade-up">
               <div class="container">
                 <div class=" service-post-container">
                    <?php while ($query->have_posts()):
                            $query->the_post(); ?>
                        <div class="service-post-content">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="service-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                
                            <div class="p-6">
                                <h3 class=" service-title heading-four">
                                    <a href="<?php the_permalink(); ?>" >
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                
                                <!-- Dynamic Button (error-free version) -->
                                <a href="<?php the_permalink(); ?>"
                                    class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition-colors">
                                    <?php echo $button_text; ?>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
               </div>
            </section>
        <?php else: ?>
            <p class="text-center text-xl py-12 text-gray-600"><?php _e('No services found.', 'tnt-html'); ?></p>
        <?php endif;

            wp_reset_postdata();
        });
}