<?php
$fields = get_query_var('about_header_fields', []);

// Fields
$about_header_title = $fields['about_header_title'];
$about_header_description = $fields['about_header_description'];

// Button
$show_button = !empty($fields['show_button']);
$button_text = $fields['button_text'] ?? 'Learn More';
$button_link = $fields['button_link'] ?? '#';

$banner_id = $fields['about_banner_image'] ?? '';

?>

<section class="about-header-section">
    <div class="container">
        <div class="about-header-wraper">

            <h1 class="heading-one">
                <?php echo esc_html($about_header_title); ?>
            </h1>

            <?php if (!empty($about_header_description)): ?>
                <p class="body-text-two">
                    <?php echo esc_html($about_header_description); ?>
                </p>
            <?php endif; ?>

            <?php if ($show_button): ?>
               
                <div class="button-wraper">
                    <div class="primary-button">
                        <a href="<?php echo esc_url($button_link); ?>" class="primary-button">
                        <?php echo esc_html($button_text); ?>
                    </a>

                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="44" height="44" rx="22" fill="#BC001A" />
                            <g clip-path="url(#clip0_642_270)">
                                <path d="M16.166 17H26.9993V27.8333" stroke="white" stroke-width="2"
                                    stroke-miterlimit="10" />
                                <path d="M16 28L27 17" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                            </g>
                            <defs>
                                <clipPath id="clip0_642_270">
                                    <rect width="20" height="20" fill="white" transform="translate(12 12)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <?php if ($banner_id): ?>
        <div class="about-banner-wraper">
            <?php echo wp_get_attachment_image($banner_id, 'full', false, ['class' => 'banner-image']); ?>
        </div>
    <?php endif; ?>
</section>