<?php
get_header();

// Current service type (taxonomy term)
$term = get_queried_object();

// Carbon Fields meta for this service type term
$title = carbon_get_term_meta($term->term_id, 'crb_title');
$banner = carbon_get_term_meta($term->term_id, 'crb_banner');
$description = carbon_get_term_meta($term->term_id, 'crb_description');
$button_text = carbon_get_term_meta($term->term_id, 'button_text');

$pdf_btn_text = carbon_get_term_meta($term->term_id, 'pdf_button_text');
$pdf_id = carbon_get_term_meta($term->term_id, 'pdf_file');
$pdf_url = $pdf_id ? wp_get_attachment_url($pdf_id) : '';

// Query all 'service' posts in this service_type term
$services_query = new WP_Query([
    'post_type' => 'service',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'service_type',
            'field' => 'term_id',
            'terms' => $term->term_id,
        ],
    ],
    'orderby' => 'title',
    'order' => 'ASC',
]);
?>

<section class="service-type-details-section">

    <div class="service-type-header">
        <button class="back-btn" onclick="history.back()">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.4693 6.99962C12.4693 7.17366 12.4001 7.34058 12.2771 7.46365C12.154 7.58672 11.9871 7.65587 11.813 7.65587H3.77396L6.59145 10.4728C6.71474 10.5961 6.784 10.7633 6.784 10.9377C6.784 11.112 6.71474 11.2792 6.59145 11.4025C6.46817 11.5258 6.30096 11.5951 6.12661 11.5951C5.95226 11.5951 5.78505 11.5258 5.66177 11.4025L1.72427 7.46501C1.66309 7.40404 1.61454 7.33159 1.58142 7.25182C1.5483 7.17206 1.53125 7.08653 1.53125 7.00016C1.53125 6.91379 1.5483 6.82827 1.58142 6.7485C1.61454 6.66873 1.66309 6.59629 1.72427 6.53532L5.66177 2.59782C5.72281 2.53677 5.79528 2.48835 5.87504 2.45531C5.9548 2.42228 6.04028 2.40527 6.12661 2.40527C6.21294 2.40527 6.29843 2.42228 6.37818 2.45531C6.45794 2.48835 6.53041 2.53677 6.59145 2.59782C6.6525 2.65886 6.70092 2.73133 6.73396 2.81109C6.767 2.89085 6.784 2.97633 6.784 3.06266C6.784 3.14899 6.767 3.23448 6.73396 3.31423C6.70092 3.39399 6.6525 3.46646 6.59145 3.52751L3.77396 6.34337H11.813C11.9871 6.34337 12.154 6.41251 12.2771 6.53558C12.4001 6.65865 12.4693 6.82557 12.4693 6.99962Z"
                    fill="white" />
            </svg>
            <?php echo esc_html($button_text ?: 'Back'); ?>
        </button>

        <?php if ($title): ?>
            <h1 class="service-type-title">
                <?php echo esc_html($title); ?>
            </h1>
        <?php else: ?>
            <h1 class="service-type-title">
                <?php echo esc_html($term->name); ?>
            </h1>
        <?php endif; ?>
    </div>

    <?php if ($banner): ?>
        <div class="service-type-banner">
            <img src="<?php echo esc_url(wp_get_attachment_url($banner)); ?>"
                alt="<?php echo esc_attr($title ?: $term->name); ?>" class="w-full object-contain object-top">
        </div>
    <?php endif; ?>

    <div class="service-type-description-container">
        <div class="service-type-description-content-wrapper">
            <?php if ($description): ?>
                <div class="service-type-description-content">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>

            <?php if ($pdf_url): ?>
                <a href="<?php echo esc_url($pdf_url); ?>" class="pdf-download-btn" download>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 17.5H2.5M15 9.16667L10 14.1667M10 14.1667L5 9.16667M10 14.1667V2.5" stroke="#BC001A"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <?php echo esc_html($pdf_btn_text ?: 'Download PDF'); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if ($services_query->have_posts()): ?>
            <div class="service-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                <?php while ($services_query->have_posts()):
                    $services_query->the_post(); ?>
                    <div class="service-item bg-white shadow-md rounded-lg overflow-hidden">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="service-thumb">
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?>
                            </div>
                        <?php endif; ?>

                        <div class="p-5">
                            <h3 class="text-xl font-semibold mb-2">
                                <a href="<?php the_permalink(); ?>" class="hover:text-red-600 transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php if (has_excerpt()): ?>
                                <div class="text-gray-600 text-sm line-clamp-3">
                                    <?php echo wp_kses_post(get_the_excerpt()); ?>
                                </div>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>"
                                class="mt-4 inline-block text-red-600 font-medium hover:underline">
                                Learn More →
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else: ?>
            <div class="no-results mt-10 text-center text-gray-500 py-10">
                <p>No services found in this category.</p>
            </div>
        <?php endif; ?>
    </div>

</section>

<?php get_footer(); ?>