<?php

$label = $fields['oc_label'] ?? '';
$heading = $fields['oc_heading'] ?? '';
$description = $fields['oc_description'] ?? '';
$button_text = $fields['oc_button_text'] ?? '';
$button_link = $fields['oc_button_link'] ?? '#';
$image_url = $fields['oc_image'] ?? '';
?>
<section class="cleaning-section">
    <div class="container">
        <div class="content-wrapper">
            <div class="text-content">
                <?php if ($label): ?>
                    <div class="label" data-aos="fade-up">
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                        </svg>
                        <p class="button-text">
                            <?php echo esc_html($label); ?>
                        </p>

                    </div>
                <?php endif; ?>

                <?php if ($heading): ?>
                    <h1 class="heading heading-two" data-aos="fade-up">
                        <?php echo esc_html($heading); ?>
                    </h1>
                <?php endif; ?>

                <?php if ($description): ?>
                    <p class="description body-text-two" data-aos="fade-up">
                        <?php echo esc_html($description); ?>
                    </p>
                <?php endif; ?>

                <?php if ($button_text && $button_link): ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="primary-button" data-aos="fade-up">
                        <?php echo esc_html($button_text); ?>
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ($image_url): ?>
                <div class="image-wrapper" data-aos="fade-up">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($heading); ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>